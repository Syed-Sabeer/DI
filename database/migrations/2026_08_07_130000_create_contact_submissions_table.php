<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('contact_submissions', function (Blueprint $table) {
            $table->id();
            $table->uuid('submission_token')->unique();
            $table->string('fullname');
            $table->string('phone')->nullable();
            $table->string('email');
            $table->string('subject');
            $table->text('message');
            $table->string('ip_address', 45)->nullable()->index();
            $table->string('country', 100)->nullable()->index();
            $table->string('state', 150)->nullable()->index();
            $table->string('city', 150)->nullable()->index();
            $table->string('area', 190)->nullable()->index();
            $table->timestamps();
            $table->index('email');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_submissions');
    }
};
