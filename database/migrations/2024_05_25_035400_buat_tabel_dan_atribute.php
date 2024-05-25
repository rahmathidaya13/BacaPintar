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
        Schema::create('buku', function(Blueprint $table){
            $table->id('id_buku');
            $table->string('judul',50);
            $table->string('pengarang',50);
            $table->string('penerbit',50);
            $table->date('tahun_terbit');
            $table->integer('stok_buku');
            $table->timestamps();
        });

        Schema::create('kategori', function(Blueprint $table){
            $table->id('id_kategori');
            $table->string('nama',100)->unique();
            $table->text('deskripsi');
            $table->timestamps();
        });
        Schema::create('peminjaman', function(Blueprint $table){
            $table->id('id_peminjaman');
            $table->date('tgl_peminjaman');
            $table->date('tgl_pengembalian');
            $table->string('status', 50);
            $table->timestamps();
        });
        Schema::create('pengembalian_buku', function(Blueprint $table){
            $table->id('id_pengembalian');
            $table->date('tgl_pengembalian');
            $table->decimal('denda');
            $table->timestamps();
        });
        Schema::create('ulasan', function(Blueprint $table){
            $table->id('id_ulasan');
            $table->integer('rating');
            $table->text('komentar')->nullable(true);
            $table->date('tgl_ulasan');
            $table->timestamps();
        });
        Schema::create('reservation', function(Blueprint $table){
            $table->id('id_reservasi');
            $table->date('tgl_reservasi');
            $table->enum('status',['aktif','selesai'])->default('aktif');
            $table->timestamps();
        });




    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku');
        Schema::dropIfExists('kategori');
        Schema::dropIfExists('peminjaman');
        Schema::dropIfExists('pengembalian_buku');
        Schema::dropIfExists('ulasan');
        Schema::dropIfExists('reservation');
    }
};
