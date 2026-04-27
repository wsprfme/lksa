<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id('id_produk');
            $table->string('nama_produk', 100);
            $table->string('kategori', 50);
            $table->integer('harga');
            $table->integer('stok');
            $table->text('deskripsi');
            $table->string('foto', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
