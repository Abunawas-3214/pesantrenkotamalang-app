<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('post', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('featured_image')->nullable();
            $table->text('content')->comment('Content of the post');
            $table->string('user_id');
            $table->string('status');
            $table->string('category'); // Nama kolom disesuaikan dengan yang diberikan pada struktur tabel
            $table->timestamps();

            // Menambahkan indeks dan kunci asing
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // Jika menggunakan model Category, tambahkan juga kunci asing untuk category
            // $table->foreign('category')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post');
    }
};
