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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('deskripsi');
            $table->integer('jumlah');
            $table->string('file_buku')->nullable();
            $table->string('cover_buku')->nullable();
            $table->unsignedBigInteger('kategori_id');
            $table->timestamps();

            $table->foreign('kategori_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
