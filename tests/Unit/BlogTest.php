<?php

namespace Tests\Unit;

use App\Models\Blog;
use PHPUnit\Framework\TestCase;

class BlogTest extends TestCase
{
    public function test_blog_model_accepts_summary_note_on_mass_assignment(): void
    {
        $blog = new Blog([
            'title' => 'Sample blog',
            'summary_note' => 'A short summary note for the blog.',
        ]);

        $this->assertSame('A short summary note for the blog.', $blog->summary_note);
    }
}
