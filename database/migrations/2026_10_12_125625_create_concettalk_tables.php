<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Tabel Posts
        Schema::create('concettalk_posts', function (Blueprint $table) {
            $table->id();
            $table->string('image_path');
            $table->text('caption')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Tabel Comments (Mendukung Anonymous & Balasan/Reply)
        Schema::create('concettalk_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('concettalk_post_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete(); // Null jika anonymous
            $table->string('guest_name')->nullable(); // Nama untuk anonymous
            $table->foreignId('parent_id')->nullable()->constrained('concettalk_comments')->cascadeOnDelete(); // Untuk fitur Reply
            $table->text('content');
            $table->timestamps();
        });

        // Tabel Likes
        Schema::create('concettalk_likes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('concettalk_post_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('ip_address')->nullable(); // Mencegah 1 anonim like berkali-kali
            $table->timestamps();

            // Mencegah duplikasi like
            $table->unique(['concettalk_post_id', 'user_id', 'ip_address'], 'unique_like');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('concettalk_likes');
        Schema::dropIfExists('concettalk_comments');
        Schema::dropIfExists('concettalk_posts');
    }
};