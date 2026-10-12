# Course Online

Course Online merupakan aplikasi berbasis web yang dikembangkan menggunakan Laravel 12 untuk mengelola data kursus secara terstruktur. Aplikasi ini menerapkan arsitektur Model-View-Controller (MVC) serta berbagai mekanisme keamanan, seperti autentikasi pengguna, otorisasi berbasis role, pengelolaan session, validasi input, dan perlindungan CSRF.

Project ini dikembangkan sebagai bagian dari tugas Evaluasi Tengah Semester (ETS) mata kuliah Pemrograman Framework.

## Teknologi yang Digunakan

- PHP 8.3
- Laravel 12
- SQLite
- Blade Template Engine
- HTML dan CSS
- Composer
- Laragon (Local Development Environment)

## Fitur Aplikasi

### 1. Autentikasi Pengguna
- Registrasi akun pengguna.
- Login menggunakan email dan password.
- Logout untuk mengakhiri session pengguna.

### 2. Manajemen Course
- Menampilkan daftar course.
- Melihat detail course.
- Menambahkan course baru.
- Mengedit data course.
- Menghapus course.

### 3. Hak Akses Pengguna

Aplikasi menerapkan dua jenis role, yaitu Admin dan User.

**Admin**
- Melihat daftar dan detail course.
- Menambahkan course baru.
- Mengedit data course.
- Menghapus course.

**User**
- Melihat daftar course.
- Melihat detail course.
- Tidak memiliki akses untuk menambahkan, mengedit, atau menghapus course.

Pembatasan hak akses diterapkan menggunakan middleware Laravel.

## Pengaturan Role Admin

Secara default, pengguna yang melakukan registrasi memiliki role `user`. Untuk memberikan hak akses Admin, role pengguna perlu diubah secara manual melalui database.

### Langkah Mengatur Akun Admin

1. Jalankan aplikasi Course Online.
2. Lakukan registrasi akun melalui halaman Register.
3. Buka database aplikasi menggunakan database management tool.
4. Pilih tabel `users`.
5. Cari akun yang akan diberikan hak akses Admin.
6. Ubah nilai kolom `role` dari `user` menjadi `admin`.
7. Simpan perubahan pada database.
8. Login menggunakan akun tersebut.

Setelah role berhasil diubah menjadi `admin`, pengguna dapat mengakses seluruh fitur manajemen course, termasuk menambahkan, mengedit, dan menghapus data.

**Catatan:** Pengaturan role Admin dilakukan secara manual melalui database untuk keperluan pengujian dan demonstrasi aplikasi. Pengguna tidak dapat memilih role Admin melalui halaman registrasi.

## Implementasi Keamanan

### 1. Authentication

Autentikasi dilakukan menggunakan fitur bawaan Laravel untuk memverifikasi email dan password pengguna melalui `Auth::attempt()`.

### 2. Authorization

Pembatasan hak akses diterapkan menggunakan middleware `auth` dan `admin`.

- Middleware `auth` memastikan pengguna telah melakukan login.
- Middleware `admin` membatasi akses pengelolaan course hanya untuk pengguna dengan role Admin.

### 3. Session Security

Keamanan session diterapkan melalui beberapa mekanisme berikut:

- Regenerasi session setelah login menggunakan `session()->regenerate()`.
- Invalidasi session setelah logout menggunakan `session()->invalidate()`.
- Regenerasi CSRF token setelah logout menggunakan `session()->regenerateToken()`.

### 4. Form Validation

Validasi input diterapkan pada proses registrasi, login, serta penambahan dan perubahan data course.

Contoh validasi data course:

- `title`: wajib diisi, maksimal 255 karakter.
- `description`: wajib diisi.
- `instructor`: wajib diisi, maksimal 255 karakter.
- `price`: wajib berupa angka dan tidak boleh bernilai negatif.

### 5. CSRF Protection

Form yang menggunakan metode POST dilengkapi dengan directive `@csrf` untuk memanfaatkan mekanisme perlindungan CSRF bawaan Laravel.

### 6. Password Hashing

Password pengguna disimpan menggunakan mekanisme hashing Laravel agar tidak tersimpan dalam bentuk teks biasa.

## Struktur Direktori Utama

```text
course-app/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AuthController.php
│   │   │   └── CourseController.php
│   │   └── Middleware/
│   │       └── AdminMiddleware.php
│   └── Models/
│       ├── User.php
│       └── Course.php
├── bootstrap/
│   └── app.php
├── config/
├── database/
│   ├── migrations/
│   └── seeders/
├── public/
├── resources/
│   └── views/
│       ├── auth/
│       ├── courses/
│       ├── layouts/
│       └── dashboard.blade.php
├── routes/
│   └── web.php
├── storage/
├── tests/
├── .env.example
├── composer.json
├── artisan
└── README.md
```

## Cara Menjalankan Aplikasi

### 1. Clone Repository

```bash
git clone https://github.com/24081010011-art/course-app.git
```

### 2. Masuk ke Direktori Project

```bash
cd course-app
```

### 3. Install Dependencies

Pastikan PHP dan Composer sudah terinstal, kemudian jalankan:

```bash
composer install
```

### 4. Konfigurasi Environment

Salin file `.env.example` menjadi `.env`.

Untuk Windows PowerShell:

```powershell
Copy-Item .env.example .env
```

Kemudian sesuaikan konfigurasi database pada file `.env`.

Untuk SQLite, gunakan:

```env
DB_CONNECTION=sqlite
```

Pastikan file `database/database.sqlite` tersedia. Jika belum ada, buat file SQLite kosong tersebut.

### 5. Generate Application Key

```bash
php artisan key:generate
```

### 6. Jalankan Migration

```bash
php artisan migrate
```

Perintah ini digunakan untuk membuat tabel database berdasarkan file migration yang tersedia.

### 7. Jalankan Server

```bash
php artisan serve
```

Buka alamat berikut melalui browser:

http://127.0.0.1:8000

### 8. Registrasi dan Login

1. Buka halaman registrasi.
2. Buat akun pengguna baru.
3. Login menggunakan email dan password yang telah didaftarkan.
4. Akun baru secara default memiliki role `user`.
5. Untuk mengakses fitur Admin, ubah role pengguna melalui database sesuai petunjuk pada bagian Pengaturan Role Admin.

## Dokumentasi

Repository ini digunakan sebagai dokumentasi source code untuk tugas ETS Pemrograman Framework.

Fokus implementasi meliputi:
- Penerapan arsitektur MVC.
- Autentikasi dan otorisasi pengguna.
- Keamanan session.
- Validasi input.
- Perlindungan CSRF.
- Pengelolaan data course menggunakan operasi CRUD.

## Pengembang

**Sarirotun Ni'mah**  
24081010011
Program Studi Informatika  
Fakultas Ilmu Komputer  
Universitas Pembangunan Nasional "Veteran" Jawa Timur

## Lisensi

Project ini dikembangkan untuk keperluan pembelajaran dan tugas akademik.