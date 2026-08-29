<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('blog_newsletter_deliveries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('blog_id')->constrained()->cascadeOnDelete();
            $table->foreignId('newsletter_subscriber_id')->constrained('new_newsletters')->cascadeOnDelete();
            $table->string('email');
            $table->string('status', 24)->default('queued')->index();
            $table->timestamp('sent_at')->nullable();
            $table->text('failure_message')->nullable();
            $table->timestamps();

            $table->unique(['blog_id', 'newsletter_subscriber_id'], 'blog_newsletter_subscriber_unique');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blog_newsletter_deliveries');
    }
};
