<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->string('job_title');
            $table->string('slug')->unique();
            $table->longText('description');
            $table->string('experience')->nullable();
            $table->string('education')->nullable();
            $table->string('salary_range')->nullable();
            $table->string('job_type')->nullable();
            $table->string('location')->nullable();
            $table->string('work_schedule')->nullable();
            $table->string('position')->nullable();
            $table->string('workweek')->nullable();
            $table->date('application_deadline')->nullable();
            $table->text('responsibilities_description')->nullable();
            $table->json('responsibilities_points')->nullable();
            $table->text('qualifications_description')->nullable();
            $table->json('qualifications_points')->nullable();
            $table->text('experience_description')->nullable();
            $table->json('experience_points')->nullable();
            $table->boolean('visibility')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('careers');
    }
};
