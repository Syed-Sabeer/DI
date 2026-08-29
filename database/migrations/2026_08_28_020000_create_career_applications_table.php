<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('career_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('career_id')->constrained()->cascadeOnDelete();
            $table->uuid('submission_token')->nullable()->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->index();
            $table->string('phone', 30);
            $table->string('linkedin_url')->nullable();
            $table->string('github_url')->nullable();
            $table->string('current_workplace')->nullable();
            $table->string('current_position')->nullable();
            $table->string('years_experience');
            $table->string('current_salary')->nullable();
            $table->string('expected_salary')->nullable();
            $table->string('address', 500);
            $table->string('country', 120);
            $table->string('state', 120);
            $table->string('city', 120);
            $table->string('postal_code', 30);
            $table->string('resume_path');
            $table->string('resume_name');
            $table->string('cover_letter_path')->nullable();
            $table->string('cover_letter_name')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('career_applications');
    }
};
