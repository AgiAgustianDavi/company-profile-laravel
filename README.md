# Website Profil Perusahaan — Laravel

Website company profile lengkap dengan **frontend publik** (beranda, tentang kami, layanan, portofolio, kontak) dan **backend/admin panel** (autentikasi, CRUD layanan & portofolio, kelola pesan masuk, pengaturan profil perusahaan).

> **Catatan:** Sampai saat ini belum ada rilis resmi "Laravel 13" — proyek ini dibangun mengikuti struktur **Laravel 11/12** (skeleton terbaru dengan `bootstrap/app.php` gaya baru). Struktur ini akan tetap kompatibel bila Anda menjalankan `composer create-project` dengan versi Laravel terbaru saat Anda membaca ini — cukup jalankan `composer update` setelahnya.

## Fitur

- **Frontend (publik)**: Beranda, Tentang Kami, Layanan, Portofolio, Kontak (form tersimpan ke database)
- **Autentikasi**: Login & Register (Laravel session auth bawaan, tanpa package tambahan)
- **Role**: `admin` dan `user` (kolom `role` di tabel `users`)
- **Admin Panel** (`/admin`, hanya untuk role `admin`):
  - Dashboard ringkasan (jumlah layanan, portofolio, pesan, pengguna)
  - CRUD Layanan (dengan upload gambar)
  - CRUD Portofolio (dengan upload gambar)
  - Kelola pesan masuk dari form kontak
  - Pengaturan profil perusahaan (nama, tagline, visi misi, kontak, sosial media)
- **Database**: SQLite (tanpa perlu install MySQL/PostgreSQL)
- **Tampilan**: Blade biasa (tanpa Livewire/Vue/React), Bootstrap 5 via CDN (tidak perlu `npm install`/build)

## Struktur Folder Penting

```
app/
  Http/Controllers/          -> Controller frontend & auth
  Http/Controllers/Admin/    -> Controller khusus admin panel
  Http/Middleware/AdminMiddleware.php
  Models/                    -> User, Service, Portfolio, ContactMessage, Setting
database/
  migrations/                -> Struktur tabel
  seeders/                   -> Data awal (akun admin, contoh layanan/portofolio)
resources/views/
  layouts/                   -> layout frontend (app.blade.php) & admin (admin.blade.php)
  pages/                     -> halaman publik
  auth/                      -> login & register
  admin/                     -> halaman admin panel
routes/web.php                -> semua route
```

## Cara Instalasi (Lokal)

**Kebutuhan:** PHP >= 8.2, Composer, ekstensi `pdo_sqlite` aktif.

1. Masuk ke folder project:
   ```bash
   cd company-profile
   ```

2. Install dependency PHP:
   ```bash
   composer install
   ```

3. Salin file environment:
   ```bash
   cp .env.example .env
   ```

4. Generate application key:
   ```bash
   php artisan key:generate
   ```

5. Buat file database SQLite:
   ```bash
   touch database/database.sqlite
   ```
   *(Windows PowerShell: `New-Item database/database.sqlite -ItemType File`)*

6. Jalankan migrasi + seeder (mengisi data contoh & akun admin):
   ```bash
   php artisan migrate --seed
   ```

7. Buat symbolic link storage (agar gambar upload bisa diakses publik):
   ```bash
   php artisan storage:link
   ```

8. Jalankan server:
   ```bash
   php artisan serve
   ```

9. Buka `http://127.0.0.1:8000` di browser.

## Akun Default (hasil seeder)

| Role  | Email                        | Password   |
|-------|-------------------------------|------------|
| Admin | admin@karyadigital.test       | password   |
| User  | user@karyadigital.test        | password   |

Login sebagai admin lalu buka menu **Panel Admin** di navbar (atau langsung ke `/admin/dashboard`) untuk mengelola layanan, portofolio, pesan masuk, dan profil perusahaan.

## Kustomisasi

- **Ganti nama & tema perusahaan**: login sebagai admin → menu **Pengaturan** (`/admin/settings`), atau edit langsung di `database/seeders/DatabaseSeeder.php` lalu jalankan ulang `php artisan migrate:fresh --seed`.
- **Ganti warna tema**: edit `public/css/app.css` (variabel warna primer di bagian atas file).
- **Tambah field baru**: buat migration baru dengan `php artisan make:migration`, lalu tambahkan field di form Blade & controller terkait.

## Troubleshooting

- **Error "could not find driver" saat migrate**: aktifkan ekstensi `pdo_sqlite` di `php.ini` Anda.
- **Gambar upload tidak muncul**: pastikan sudah menjalankan `php artisan storage:link`.
- **403 saat akses `/admin`**: pastikan Anda login menggunakan akun dengan `role = admin`.
