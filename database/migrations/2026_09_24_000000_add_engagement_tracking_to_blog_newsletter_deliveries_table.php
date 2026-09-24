<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('blog_newsletter_deliveries', function (Blueprint $table) {
            $table->timestamp('opened_at')->nullable()->after('sent_at');
            $table->timestamp('last_opened_at')->nullable()->after('opened_at');
            $table->unsignedInteger('open_count')->default(0)->after('last_opened_at');
            $table->timestamp('viewed_at')->nullable()->after('open_count');
            $table->timestamp('last_viewed_at')->nullable()->after('viewed_at');
            $table->unsignedInteger('view_count')->default(0)->after('last_viewed_at');
        });
    }

    public function down(): void
    {
        Schema::table('blog_newsletter_deliveries', function (Blueprint $table) {
            $table->dropColumn([
                'opened_at',
                'last_opened_at',
                'open_count',
                'viewed_at',
                'last_viewed_at',
                'view_count',
            ]);
        });
    }
};
