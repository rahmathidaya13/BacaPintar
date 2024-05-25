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
        Schema::table('buku', function(Blueprint $table){
            $table->unsignedBigInteger('id_kategori')->after('id_buku');
            $table->foreign('id_kategori')->references('id_kategori')->on('kategori')->cascadeOnDelete();
        });
        Schema::table('peminjaman', function(Blueprint $table){
            $table->unsignedBigInteger('id_user')->after('id_peminjaman');
            $table->unsignedBigInteger('id_buku')->after('id_user');
            $table->foreign('id_user')->references('id_user')->on('users')->cascadeOnDelete();
            $table->foreign('id_buku')->references('id_buku')->on('buku')->cascadeOnDelete();
        });
        Schema::table('reservation', function(Blueprint $table){
            $table->unsignedBigInteger('id_user')->after('id_reservasi');
            $table->unsignedBigInteger('id_buku')->after('id_user');
            $table->foreign('id_user')->references('id_user')->on('users')->cascadeOnDelete();
            $table->foreign('id_buku')->references('id_buku')->on('buku')->cascadeOnDelete();
        });
        Schema::table('pengembalian_buku', function(Blueprint $table){
            $table->unsignedBigInteger('id_peminjaman')->after('id_pengembalian');
            $table->foreign('id_peminjaman')->references('id_peminjaman')->on('peminjaman')->cascadeOnDelete();
        });
        Schema::table('ulasan', function(Blueprint $table){
            $table->unsignedBigInteger('id_user')->after('id_ulasan');
            $table->unsignedBigInteger('id_buku')->after('id_user');
            $table->foreign('id_user')->references('id_user')->on('users')->cascadeOnDelete();
            $table->foreign('id_buku')->references('id_buku')->on('buku')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku');
        Schema::dropIfExists('peminjaman');
        Schema::dropIfExists('reservation');
        Schema::dropIfExists('pengembalian_buku');
        Schema::dropIfExists('ulasan');
    }
};
