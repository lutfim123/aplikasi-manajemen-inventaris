# Aplikasi Manajemen Inventaris Toko Komputer

Aplikasi web sederhana untuk manajemen inventaris toko perlengkapan komputer yang dibangun menggunakan **Laravel** dan database relasional **MySQL/MariaDB**. Proyek ini dibuat untuk memenuhi Ujian Live Coding Case Study Pengembangan Aplikasi Web.

## Identitas Pengembang

* **Nama Mahasiswa**: Muhammad Lutfi Maulana

* **NIM**: 2495114039

* **Kelas**: TI-A

* **Mata Kuliah**: Pemrograman Web Lanjut

## Fitur Aplikasi

1. **Sistem Autentikasi**:

   * Pembatasan hak akses halaman inventaris menggunakan Middleware `auth`.

   * Penyimpanan kata sandi dengan enkripsi hash (`Hash::make`).

   * Fitur login dan proteksi pembatalan sesi saat logout.

2. **Database Relasional & Eloquent**:

   * Tabel `categories` berelasi *one-to-many* (`hasMany`) ke tabel `items`.

   * Tabel `items` memiliki *foreign key* `category_id` (`belongsTo`) dengan aturan integritas `restrictOnDelete`.

3. **CRUD Kategori & Barang**:

   * Pengelolaan data barang dengan penampil nama kategori relasi.

   * Pilihan kategori menggunakan *dropdown* dinamis.

   * Penolakan penghapusan kategori jika masih memiliki keterikatan data barang.

4. **Validasi Data**:

   * Validasi nama barang dan kategori wajib diisi.

   * Validasi harga (numerik $> 0$) dan stok (bilangan bulat $\ge 0$).

   * Validasi keberadaan `category_id` pada database.

## Kebutuhan Sistem

* PHP >= 8.1

* Composer

* MySQL atau MariaDB

* Git

## Panduan Instalasi dan Menjalankan Aplikasi

Ikuti langkah-langkah berikut untuk menjalankan aplikasi pada lingkungan lokal:

### 1. Kloning Repositori

```
git clone https://github.com/lutfim123/aplikasi-manajemen-inventaris.git
cd aplikasi-manajemen-inventaris

```

### 2. Instalasi Dependensi Composer

```
composer install

```

### 3. Konfigurasi File Lingkungan (.env)

Salin template berkas `.env.example` menjadi `.env`:

```
cp .env.example .env

```

Buka file `.env` dan sesuaikan pengaturan database Anda:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_inventaris
DB_USERNAME=root
DB_PASSWORD=

```

### 4. Buat Application Key

```
php artisan key:generate

```

### 5. Menjalankan Database Migration dan Seeder

Jalankan migrasi tabel database:

```
php artisan migrate

```

Jalankan seeder untuk mengisi data awal (akun pengujian, kategori, dan barang):

```
php artisan db:seed

```

> **Catatan Pengujian:**
>
> Untuk membangun ulang database dari awal (menghapus seluruh tabel dan melakukan seeding ulang secara otomatis), gunakan perintah:
>
> ```
> php artisan migrate:fresh --seed
> 
> ```
>
> *(Perhatian: Perintah `migrate:fresh` hanya digunakan pada database pengembangan/pengujian).*

### 6. Menjalankan Server Lokal

```
php artisan serve

```

Buka peramban (*browser*) dan akses aplikasi melalui URL: `http://127.0.0.1:8000`.

## Akun Pengujian (Hasil Seeder)

Gunakan kredensial berikut untuk menguji fitur login:

* **Email**: admin@inventaris.com

* **Password**: `password`

## Struktur Data Awal (Seeder)

* **Kategori**:

  1. Aksesori

  2. Perangkat Komputer

  3. Penyimpanan

* **Barang Bawaan**:

  1. Keyboard (Aksesori) - Rp 150.000 (Stok: 10)

  2. Mouse (Aksesori) - Rp 75.000 (Stok: 20)

  3. Monitor (Perangkat Komputer) - Rp 1.500.000 (Stok: 5)

  4. Headset (Aksesori) - Rp 250.000 (Stok: 8)

  5. Flashdisk (Penyimpanan) - Rp 85.000 (Stok: 15)
