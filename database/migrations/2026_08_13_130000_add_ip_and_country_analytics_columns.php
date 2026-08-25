<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (! Schema::hasColumn('contact_submissions', 'ip_address')) {
            Schema::table('contact_submissions', function (Blueprint $table) {
                $table->string('ip_address', 45)->nullable()->after('message')->index();
            });
        }
        if (! Schema::hasColumn('contact_submissions', 'country')) {
            Schema::table('contact_submissions', function (Blueprint $table) {
                $table->string('country', 100)->nullable()->after('ip_address')->index();
            });
        }
        if (! Schema::hasColumn('visitors', 'country')) {
            Schema::table('visitors', function (Blueprint $table) {
                $table->string('country', 100)->nullable()->after('ip_address')->index();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('contact_submissions', 'country')) {
            Schema::table('contact_submissions', function (Blueprint $table) {
                $table->dropIndex(['country']);
                $table->dropColumn('country');
            });
        }
        if (Schema::hasColumn('visitors', 'country')) {
            Schema::table('visitors', function (Blueprint $table) {
                $table->dropIndex(['country']);
                $table->dropColumn('country');
            });
        }
    }
};
