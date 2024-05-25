# Aplikasi Perpustakaan Berbasis Web

Ini adalah proyek aplikasi perpustakaan berbasis web yang dibuat menggunakan Laravel. Aplikasi ini memungkinkan pengguna untuk mengelola buku, peminjaman, pengembalian, reservasi, ulasan, dan lainnya.

## Fitur

- Manajemen Pengguna (Admin dan Anggota)
- Manajemen Buku
- Manajemen Kategori Buku
- Peminjaman dan Pengembalian Buku
- Reservasi Buku
- Ulasan Buku
- Notifikasi Pengguna
- Log Aktivitas Pengguna
- Manajemen Penulis dan Penerbit
- Pengelolaan Harga Peminjaman Buku

## Persyaratan

- PHP >= 7.4
- Composer
- MySQL atau database lainnya yang didukung oleh Laravel
- Node.js dan npm (untuk mengelola asset front-end)

## Instalasi

Ikuti langkah-langkah di bawah ini untuk mengatur proyek di mesin lokal Anda.

### 1. Clone repositori

```bash
git clone https://github.com/rahmathidaya13/BacaPintar.git
cd BacaPintar

```
### 2. Install Depedency

```bash
composer install
npm install
npm run dev

```
### 3. Konfigurasi lingkungan
Salin file .env.example menjadi .env dan sesuaikan pengaturan database dan konfigurasi lainnya.

```bash
cp .env.example .env

```
Setelah itu, buat kunci aplikasi Laravel:
```bash
php artisan key:generate

```
### 4. Migrasi dan Seed Database
Jalankan migrasi database dan seed data awal:
```bash
php artisan migrate
php artisan db:seed
```
### 5. Menjalankan Server
Jalankan server pengembangan Laravel:
```bash
php artisan serve

