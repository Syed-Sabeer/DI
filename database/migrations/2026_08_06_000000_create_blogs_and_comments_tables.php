<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('blogs')) {
            Schema::create('blogs', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('slug')->unique();
                $table->longText('content');
                $table->string('meta_title')->nullable();
                $table->string('meta_description', 320)->nullable();
                $table->string('meta_keywords')->nullable();
                $table->string('category')->nullable()->index();
                $table->string('image')->nullable();
                $table->string('tags')->nullable();
                $table->string('min_read')->nullable();
                $table->boolean('visibility')->default(true)->index();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('comments')) {
            Schema::create('comments', function (Blueprint $table) {
                $table->id();
                $table->foreignId('blog_id')->constrained()->cascadeOnDelete();
                $table->string('name');
                $table->string('email')->index();
                $table->text('comment');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('comments');
        Schema::dropIfExists('blogs');
    }
};
