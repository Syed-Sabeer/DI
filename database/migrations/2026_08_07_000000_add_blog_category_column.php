<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('blogs') && !Schema::hasColumn('blogs', 'category')) {
            Schema::table('blogs', function (Blueprint $table) {
                $table->string('category')->nullable()->after('content')->index();
            });
        }

        if (Schema::hasTable('blogs') && !Schema::hasColumn('blogs', 'summary_note')) {
            Schema::table('blogs', function (Blueprint $table) {
                $table->text('summary_note')->nullable()->after('content');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('blogs') && Schema::hasColumn('blogs', 'category')) {
            Schema::table('blogs', function (Blueprint $table) {
                $table->dropColumn('category');
            });
        }

        if (Schema::hasTable('blogs') && Schema::hasColumn('blogs', 'summary_note')) {
            Schema::table('blogs', function (Blueprint $table) {
                $table->dropColumn('summary_note');
            });
        }
    }
};
