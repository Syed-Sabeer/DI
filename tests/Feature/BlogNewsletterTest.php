<?php

namespace Tests\Feature;

use App\Http\Controllers\Admin\AdminBlogController;
use App\Jobs\QueueBlogNewsletter;
use App\Jobs\SendBlogNewsletterEmail;
use App\Mail\BlogNewsletterMail;
use App\Models\Blog;
use App\Models\BlogNewsletterDelivery;
use App\Models\NewNewsletter;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class BlogNewsletterTest extends TestCase
{
    use DatabaseTransactions;

    public function test_checked_blog_form_queues_the_newsletter_coordinator(): void
    {
        Queue::fake();

        $request = Request::create('/admin/blog/store', 'POST', [
            'title' => 'Queued newsletter '.uniqid(),
            'content' => '<p>A useful product update for subscribers.</p>',
            'send_newsletter' => '1',
        ]);

        app(AdminBlogController::class)->store($request);

        Queue::assertPushed(QueueBlogNewsletter::class, function (QueueBlogNewsletter $job): bool {
            return $job->connection === 'database' && Blog::query()->whereKey($job->blogId)->exists();
        });
    }

    public function test_coordinator_creates_one_delivery_and_email_job_per_subscriber(): void
    {
        Queue::fake();

        $blog = Blog::create([
            'title' => 'Background campaign '.uniqid(),
            'content' => '<p>Campaign content.</p>',
            'visibility' => 1,
        ]);
        $subscriber = NewNewsletter::create(['email' => uniqid().'@example.com']);

        (new QueueBlogNewsletter($blog->id))->handle();
        (new QueueBlogNewsletter($blog->id))->handle();

        $this->assertDatabaseCount('blog_newsletter_deliveries', 1);
        $this->assertDatabaseHas('blog_newsletter_deliveries', [
            'blog_id' => $blog->id,
            'newsletter_subscriber_id' => $subscriber->id,
            'status' => 'queued',
        ]);
        Queue::assertPushed(SendBlogNewsletterEmail::class, 1);
    }

    public function test_delivery_job_sends_branded_mail_and_marks_it_sent(): void
    {
        Mail::fake();

        $blog = Blog::create([
            'title' => 'A new Deveon insight '.uniqid(),
            'content' => '<p>Here is the full story.</p>',
            'visibility' => 1,
        ]);
        $subscriber = NewNewsletter::create(['email' => uniqid().'@example.com']);
        $delivery = BlogNewsletterDelivery::create([
            'blog_id' => $blog->id,
            'newsletter_subscriber_id' => $subscriber->id,
            'email' => $subscriber->email,
            'status' => 'queued',
        ]);

        $html = (new BlogNewsletterMail($blog, $subscriber))->render();
        $this->assertStringContainsString($blog->title, $html);
        $this->assertStringContainsString('Unsubscribe', $html);

        (new SendBlogNewsletterEmail($delivery->id))->handle();

        Mail::assertSent(BlogNewsletterMail::class, function (BlogNewsletterMail $mail) use ($subscriber): bool {
            return $mail->hasTo($subscriber->email);
        });
        $this->assertSame('sent', $delivery->fresh()->status);
        $this->assertNotNull($delivery->fresh()->sent_at);
    }

    public function test_visible_unsubscribe_link_requires_confirmation_and_allows_resubscribing(): void
    {
        $subscriber = NewNewsletter::create(['email' => uniqid().'@example.com']);
        $confirmationPage = URL::signedRoute('newsletter.unsubscribe', [
            'subscriber' => $subscriber->id,
        ]);

        $this->get($confirmationPage)
            ->assertOk()
            ->assertSee('Yes, unsubscribe me');
        $this->assertDatabaseHas('new_newsletters', ['id' => $subscriber->id]);

        $unsubscribeAction = URL::signedRoute('newsletter.unsubscribe.confirm', [
            'subscriber' => $subscriber->id,
        ]);

        $this->post($unsubscribeAction)
            ->assertOk()
            ->assertSee('Subscribe again');
        $this->assertDatabaseMissing('new_newsletters', ['id' => $subscriber->id]);

        $this->post(route('newsletter.resubscribe'), ['email' => $subscriber->email])
            ->assertOk()
            ->assertSee('You are subscribed again');
        $this->assertDatabaseHas('new_newsletters', ['email' => $subscriber->email]);
    }
}
