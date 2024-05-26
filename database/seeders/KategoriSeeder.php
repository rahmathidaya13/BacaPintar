<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategori')->insert([
            [
                'nama' => 'Fiksi',
                'deskripsi' => 'Buku yang mengandung cerita imajinatif atau tidak berdasarkan kejadian nyata.',
            ],
            [
                'nama' => 'Non-Fiksi',
                'deskripsi' => 'Buku yang berdasarkan fakta dan informasi nyata.',
            ],
            [
                'nama' => 'Sains',
                'deskripsi' => 'Buku yang membahas tentang ilmu pengetahuan dan penelitian ilmiah.',
            ],
            [
                'nama' => 'Sejarah',
                'deskripsi' => 'Buku yang menceritakan peristiwa dan kejadian penting dari masa lalu.',
            ],
            [
                'nama' => 'Biografi',
                'deskripsi' => 'Buku yang menceritakan kisah hidup seseorang, biasanya tokoh terkenal.',
            ],
            [
                'nama' => 'Fantasi',
                'deskripsi' => 'Buku yang mengandung unsur-unsur magis, dunia imajinatif, dan makhluk fantastis.',
            ],
            [
                'nama' => 'Misteri',
                'deskripsi' => 'Buku yang berfokus pada cerita detektif atau pemecahan teka-teki.',
            ],
            [
                'nama' => 'Romansa',
                'deskripsi' => 'Buku yang mengisahkan tentang hubungan asmara dan percintaan.',
            ],
            [
                'nama' => 'Petualangan',
                'deskripsi' => 'Buku yang menceritakan tentang perjalanan dan pengalaman seru.',
            ],
            [
                'nama' => 'Teknologi',
                'deskripsi' => 'Buku yang membahas tentang perkembangan dan penerapan teknologi.',
            ],
            [
                'nama' => 'Agama',
                'deskripsi' => 'Buku yang membahas tentang ajaran dan praktik keagamaan.',
            ],
            [
                'nama' => 'Seni',
                'deskripsi' => 'Buku yang berkaitan dengan seni, seperti musik, lukisan, dan sastra.',
            ],
            [
                'nama' => 'Psikologi',
                'deskripsi' => 'Buku yang membahas tentang ilmu psikologi dan perilaku manusia.',
            ],
            [
                'nama' => 'Pendidikan',
                'deskripsi' => 'Buku yang digunakan untuk tujuan pendidikan dan pembelajaran.',
            ],
            [
                'nama' => 'Kuliner',
                'deskripsi' => 'Buku yang berisi resep dan cara memasak berbagai jenis makanan.',
            ],
        ]);
    }
}
