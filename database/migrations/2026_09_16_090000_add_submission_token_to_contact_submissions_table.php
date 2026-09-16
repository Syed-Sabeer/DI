<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (! Schema::hasColumn('contact_submissions', 'submission_token')) {
            Schema::table('contact_submissions', function (Blueprint $table) {
                // Existing submissions have no token; new requests supply a UUID.
                $table->uuid('submission_token')->nullable()->unique();
            });
        }
    }

    public function down(): void
    {
        // Preserve tokens: this column may predate this repair migration and
        // is also part of the original table definition on fresh installs.
    }
};
