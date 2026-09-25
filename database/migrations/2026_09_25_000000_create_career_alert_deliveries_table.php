<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * One row per (job posting, subscriber) pair. Mirrors the blog newsletter
     * delivery table so the careers broadcast reports the same metrics:
     * what was sent, what was opened and who actually opened the vacancy.
     */
    public function up(): void
    {
        Schema::create('career_alert_deliveries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('career_id')->constrained()->cascadeOnDelete();
            $table->foreignId('newsletter_subscriber_id')->constrained('new_newsletters')->cascadeOnDelete();
            $table->string('email');
            $table->string('status', 24)->default('queued')->index();
            $table->timestamp('sent_at')->nullable();
            $table->timestamp('opened_at')->nullable();
            $table->timestamp('last_opened_at')->nullable();
            $table->unsignedInteger('open_count')->default(0);
            $table->timestamp('viewed_at')->nullable();
            $table->timestamp('last_viewed_at')->nullable();
            $table->unsignedInteger('view_count')->default(0);
            $table->boolean('resend_enabled')->default(true);
            $table->text('failure_message')->nullable();
            $table->timestamps();

            $table->unique(['career_id', 'newsletter_subscriber_id'], 'career_alert_subscriber_unique');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('career_alert_deliveries');
    }
};
