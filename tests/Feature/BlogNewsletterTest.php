<?php

namespace Tests\Feature;

use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\AdminNewsletterSubmissionController;
use App\Jobs\QueueBlogNewsletter;
use App\Jobs\SendBlogNewsletterEmail;
use App\Mail\BlogNewsletterMail;
use App\Models\Blog;
use App\Models\BlogNewsletterDelivery;
use App\Models\NewNewsletter;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class BlogNewsletterTest extends TestCase
{
    use DatabaseTransactions;

    protected function setUp(): void
    {
        parent::setUp();

        config(['app.url' => 'http://localhost']);
        URL::forceRootUrl('http://localhost');
    }

    public function test_selected_subscribers_are_passed_to_the_coordinator(): void
    {
        Queue::fake();
        $subscriber = NewNewsletter::create(['email' => uniqid().'@example.com']);
        $request = Request::create('/admin/blog/store', 'POST', [
            'title' => 'Selected newsletter '.uniqid(),
            'content' => '<p>Article.</p>',
            'send_newsletter' => '1',
            'newsletter_audience' => 'selected',
            'newsletter_subscriber_ids' => [(string) $subscriber->id],
        ]);

        app(AdminBlogController::class)->store($request);

        Queue::assertPushed(QueueBlogNewsletter::class, fn ($job) => $job->subscriberIds === [$subscriber->id]);
    }

    public function test_invalid_selection_does_not_save_or_broadcast(): void
    {
        Queue::fake();
        foreach ([[], [0]] as $ids) {
            $title = 'Invalid recipients '.uniqid();
            app(AdminBlogController::class)->store(Request::create('/admin/blog/store', 'POST', [
                'title' => $title,
                'content' => '<p>Article.</p>',
                'send_newsletter' => '1',
                'newsletter_audience' => 'selected',
                'newsletter_subscriber_ids' => $ids,
            ]));
            $this->assertDatabaseMissing('blogs', ['title' => $title]);
        }
        Queue::assertNothingPushed();
    }

    public function test_selected_audience_never_delivers_to_other_subscribers(): void
    {
        Queue::fake();
        $blog = Blog::create(['title' => 'Targeted '.uniqid(), 'content' => 'Article', 'visibility' => 1]);
        $selected = NewNewsletter::create(['email' => uniqid().'@example.com']);
        $other = NewNewsletter::create(['email' => uniqid().'@example.com']);

        (new QueueBlogNewsletter($blog->id, []))->handle();
        Queue::assertNothingPushed();
        (new QueueBlogNewsletter($blog->id, [$selected->id]))->handle();
        (new QueueBlogNewsletter($blog->id, [$selected->id]))->handle();

        $this->assertDatabaseHas('blog_newsletter_deliveries', ['blog_id' => $blog->id, 'newsletter_subscriber_id' => $selected->id]);
        $this->assertDatabaseMissing('blog_newsletter_deliveries', ['blog_id' => $blog->id, 'newsletter_subscriber_id' => $other->id]);
        Queue::assertPushed(SendBlogNewsletterEmail::class, 1);
    }

    public function test_newsletter_contains_original_template_and_unsubscribe_headers(): void
    {
        $blog = Blog::create(['title' => 'Readable '.uniqid(), 'content' => '<p>Tips &amp; ideas</p>', 'visibility' => 1]);
        $subscriber = NewNewsletter::create(['email' => uniqid().'@example.com']);
        $delivery = BlogNewsletterDelivery::create([
            'blog_id' => $blog->id,
            'newsletter_subscriber_id' => $subscriber->id,
            'email' => $subscriber->email,
            'status' => 'queued',
        ]);
        $sent = Mail::mailer('array')->to($subscriber->email)->send(new BlogNewsletterMail($delivery));
        $message = $sent->getSymfonySentMessage()->getOriginalMessage();
        $this->assertStringContainsString('Read the article', $message->getHtmlBody());
        $this->assertStringContainsString('/newsletter/track/view/'.$delivery->id, $message->getHtmlBody());
        $this->assertStringContainsString('/newsletter/track/open/'.$delivery->id, $message->getHtmlBody());
        $this->assertSame($blog->title.' | Deveon Insights', $message->getSubject());
        $this->assertStringContainsString('You are receiving this email because you subscribed to Deveon Insights.', $message->getHtmlBody());
        $this->assertStringContainsString('signature=', $message->getHeaders()->get('List-Unsubscribe')->getBodyAsString());
        $this->assertSame('List-Unsubscribe=One-Click', $message->getHeaders()->get('List-Unsubscribe-Post')->getBodyAsString());
    }

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

        $html = (new BlogNewsletterMail($delivery))->render();
        $this->assertStringContainsString($blog->title, $html);
        $this->assertStringContainsString('Unsubscribe', $html);

        (new SendBlogNewsletterEmail($delivery->id))->handle();

        Mail::assertSent(BlogNewsletterMail::class, function (BlogNewsletterMail $mail) use ($subscriber): bool {
            return $mail->hasTo($subscriber->email);
        });
        $this->assertSame('sent', $delivery->fresh()->status);
        $this->assertNotNull($delivery->fresh()->sent_at);
    }

    public function test_valid_signed_open_url_tracks_each_detection_and_preserves_first_open(): void
    {
        Carbon::setTestNow('2026-09-24 10:00:00');
        $delivery = $this->createDelivery();
        $url = URL::signedRoute('newsletter.track.open', ['delivery' => $delivery->id]);

        $this->get($url)
            ->assertOk()
            ->assertHeader('Content-Type', 'image/gif');

        $firstOpenedAt = $delivery->fresh()->opened_at;
        $this->assertNotNull($firstOpenedAt);
        $this->assertSame(1, $delivery->fresh()->open_count);

        Carbon::setTestNow('2026-09-24 11:00:00');
        $this->get($url)->assertOk();

        $tracked = $delivery->fresh();
        $this->assertTrue($tracked->opened_at->equalTo($firstOpenedAt));
        $this->assertSame('2026-09-24 11:00:00', $tracked->last_opened_at->format('Y-m-d H:i:s'));
        $this->assertSame(2, $tracked->open_count);

        Carbon::setTestNow();
    }

    public function test_tampered_open_signature_does_not_update_delivery(): void
    {
        $delivery = $this->createDelivery();
        $url = URL::signedRoute('newsletter.track.open', ['delivery' => $delivery->id]);
        $tamperedUrl = preg_replace('/signature=./', 'signature=x', $url, 1);

        $this->get($tamperedUrl)->assertForbidden();

        $tracked = $delivery->fresh();
        $this->assertNull($tracked->opened_at);
        $this->assertSame(0, $tracked->open_count);
    }

    public function test_signed_article_url_tracks_repeat_visits_and_redirects_to_public_blog(): void
    {
        Carbon::setTestNow('2026-09-24 12:00:00');
        $delivery = $this->createDelivery();
        $url = URL::signedRoute('newsletter.track.view', ['delivery' => $delivery->id]);

        $this->get($url)->assertRedirect(route('blog.detail', $delivery->blog->slug));
        $firstViewedAt = $delivery->fresh()->viewed_at;

        Carbon::setTestNow('2026-09-24 13:00:00');
        $this->get($url)->assertRedirect(route('blog.detail', $delivery->blog->slug));

        $tracked = $delivery->fresh();
        $this->assertTrue($tracked->viewed_at->equalTo($firstViewedAt));
        $this->assertSame('2026-09-24 13:00:00', $tracked->last_viewed_at->format('Y-m-d H:i:s'));
        $this->assertSame(2, $tracked->view_count);
        $this->assertSame(1, BlogNewsletterDelivery::query()->whereKey($delivery->id)->count());

        Carbon::setTestNow();
    }

    public function test_tracking_one_delivery_never_updates_another_subscriber_delivery(): void
    {
        $trackedDelivery = $this->createDelivery();
        $otherDelivery = $this->createDelivery();

        $this->get(URL::signedRoute('newsletter.track.view', ['delivery' => $trackedDelivery->id]))
            ->assertRedirect();

        $this->assertSame(1, $trackedDelivery->fresh()->view_count);
        $this->assertSame(0, $otherDelivery->fresh()->view_count);
        $this->assertNull($otherDelivery->fresh()->viewed_at);
    }

    public function test_subscriber_and_blog_analytics_use_delivery_aggregates(): void
    {
        $delivery = $this->createDelivery();
        $delivery->update([
            'opened_at' => now(),
            'last_opened_at' => now(),
            'open_count' => 3,
            'viewed_at' => now(),
            'last_viewed_at' => now(),
            'view_count' => 2,
        ]);

        $subscriberView = app(AdminNewsletterSubmissionController::class)->activity(
            Request::create('/admin/newsletterlist/'.$delivery->subscriber->id.'/activity', 'GET'),
            $delivery->subscriber
        );
        $subscriberSummary = $subscriberView->getData()['summary'];
        $this->assertSame(1, (int) $subscriberSummary->emails_sent);
        $this->assertSame(1, (int) $subscriberSummary->emails_opened);
        $this->assertSame(1, (int) $subscriberSummary->blogs_viewed);
        $this->assertSame(2, (int) $subscriberSummary->total_blog_views);

        $blogView = app(AdminBlogController::class)->newsletterAnalytics(
            Request::create('/admin/blog/'.$delivery->blog->id.'/newsletter-analytics', 'GET'),
            $delivery->blog
        );
        $blogData = $blogView->getData();
        $this->assertSame(1, (int) $blogData['summary']->sent_count);
        $this->assertSame(3, (int) $blogData['summary']->total_open_events);
        $this->assertSame(100.0, $blogData['openRate']);
        $this->assertSame(100.0, $blogData['viewRate']);

        $filteredView = app(AdminBlogController::class)->newsletterAnalytics(
            Request::create('/admin/blog/'.$delivery->blog->id.'/newsletter-analytics', 'GET', [
                'search' => 'does-not-exist@example.com',
            ]),
            $delivery->blog
        );
        $this->assertSame(0, $filteredView->getData()['deliveries']->total());
        $this->assertSame(1, (int) $filteredView->getData()['summary']->sent_count);
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

    private function createDelivery(): BlogNewsletterDelivery
    {
        $blog = Blog::create([
            'title' => 'Tracked newsletter '.uniqid(),
            'content' => '<p>Tracked article.</p>',
            'visibility' => 1,
        ]);
        $subscriber = NewNewsletter::create(['email' => uniqid().'@example.com']);

        return BlogNewsletterDelivery::create([
            'blog_id' => $blog->id,
            'newsletter_subscriber_id' => $subscriber->id,
            'email' => $subscriber->email,
            'status' => 'sent',
            'sent_at' => now(),
        ]);
    }
}
