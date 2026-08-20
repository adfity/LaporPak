# LaporPak

LaporPak adalah aplikasi web berbasis Laravel untuk **pelaporan kejadian darurat**, mencakup tiga kategori laporan:

- 🚑 **Medis**
- 🔥 **Kebakaran**
- 🕵️ **Pencurian**

Aplikasi ini memiliki dua peran pengguna:

| Role  | Akses |
|-------|-------|
| **Admin** | Melihat semua laporan (index), mengubah status laporan (update), serta memiliki akses penuh ke semua kategori. |
| **User**  | Membuat laporan baru (create/store), menghapus laporan (delete), dan melihat daftar laporan miliknya sendiri (`kebakaranU`, `medisU`, `pencurianU`). |

Autentikasi (login, register, logout) ditangani oleh `AuthController`, dengan middleware `role` untuk membatasi akses berdasarkan peran pengguna.

## Tech Stack

- **Backend:** Laravel 10 (PHP ^8.1)
- **Database:** MySQL 8.0 (dijalankan via Docker)
- **Frontend build tool:** Vite
- **Autentikasi:** Session-based (Laravel default) + middleware role custom

## Kebutuhan (Requirements)

Pastikan sudah terpasang di komputer kamu:

- [PHP](https://www.php.net/) >= 8.1
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/) & npm
- [Docker](https://www.docker.com/) & Docker Compose (untuk menjalankan database MySQL)

> Catatan: `docker-compose.yml` pada proyek ini hanya menjalankan container **database MySQL**. Aplikasi Laravel (PHP) dan proses build frontend (Vite) dijalankan secara lokal, bukan di dalam Docker.

## Instalasi

1. **Clone repository**

   ```bash
   git clone <url-repo-ini>
   cd LaporPak
   ```

2. **Salin file environment**

   Proyek ini sudah menyertakan `.env`. Jika belum ada, salin dari contoh:

   ```bash
   cp .env.example .env
   ```

   Pastikan konfigurasi database (`DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`, `DB_ROOT_PASSWORD`) di `.env` sudah sesuai dengan environment yang didefinisikan di `docker-compose.yml`.

3. **Jalankan database MySQL via Docker**

   ```bash
   docker compose up -d
   ```

   Cek apakah container sudah jalan:

   ```bash
   docker ps
   ```

4. **Install dependency PHP**

   ```bash
   composer install
   ```

5. **Generate application key** (lewati jika `.env` sudah punya `APP_KEY`)

   ```bash
   php artisan key:generate
   ```

6. **Jalankan migration & seeder**

   ```bash
   php artisan migrate --seed
   ```

   Perintah ini akan membuat semua tabel sekaligus menjalankan `UserSeeder`, yang membuat akun admin default:

   | Email | Password | Role |
   |-------|----------|------|
   | admin@gmail.com | admin | Admin |

   > ⚠️ Disarankan segera mengganti password akun admin ini setelah login pertama kali, terutama jika digunakan di luar lingkungan development.

7. **Install dependency JavaScript & build asset frontend**

   ```bash
   npm install
   npm run dev
   ```

   Gunakan `npm run build` jika ingin build untuk production.

8. **Jalankan server Laravel**

   Buka terminal baru (biarkan `npm run dev` tetap berjalan di terminal sebelumnya):

   ```bash
   php artisan serve
   ```

9. **Akses aplikasi**

   Buka browser dan kunjungi:

   ```
   http://localhost:8000
   ```

## Struktur Fitur Utama

- `AuthController` — login, register, logout
- `HomeController` — halaman utama setelah login
- `MedisController`, `KebakaranController`, `PencurianController` — CRUD laporan per kategori, dengan pembagian akses admin/user

## Lisensi

Proyek ini menggunakan framework [Laravel](https://laravel.com), yang dirilis di bawah lisensi [MIT](https://opensource.org/licenses/MIT).