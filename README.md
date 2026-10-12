# Course Online

Course Online merupakan aplikasi pengelolaan kursus berbasis web yang dikembangkan menggunakan Laravel 12 dengan arsitektur Model-View-Controller (MVC). Aplikasi ini dibuat untuk memenuhi tugas ETS mata kuliah Pemrograman Framework A, dengan fokus pada implementasi dan pengujian keamanan aplikasi.

## Teknologi
- Laravel 12 dan PHP 8.3
- MySQL (Laragon)
- Blade Template Engine
- HTML dan CSS
- Eloquent ORM

## Fitur Aplikasi
- Registrasi, login, dan logout pengguna.
- Dashboard berdasarkan role pengguna.
- Pengelolaan course menggunakan fitur CRUD.
- Pembatasan hak akses Admin dan User.

**Hak Akses:**
- **Admin:** Melihat, menambahkan, mengedit, dan menghapus course.
- **User:** Hanya dapat melihat daftar dan detail course.

## Implementasi Keamanan
- **Authentication:** Verifikasi pengguna menggunakan autentikasi Laravel.
- **Authorization:** Pembatasan akses menggunakan middleware `auth` dan `admin`.
- **Session Security:** Regenerasi session setelah login dan invalidasi session saat logout.
- **Form Validation:** Validasi input registrasi, login, dan data course.
- **CSRF Protection:** Penggunaan directive `@csrf` pada formulir.
- **Password Hashing:** Penyimpanan password dalam bentuk hash.
- **Mass Assignment Protection:** Pembatasan atribut menggunakan `$fillable`.
- **Database Security:** Penggunaan Eloquent ORM untuk mengelola data.

## Cara Menjalankan Aplikasi

**1. Clone repository**
```bash
git clone https://github.com/24081010011-art/course-app.git
cd course-app
```

**2. Install dependencies**
```bash
composer install
```

**3. Konfigurasi environment**

Salin `.env.example` menjadi `.env`, kemudian sesuaikan konfigurasi MySQL:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=course_app
DB_USERNAME=root
DB_PASSWORD=
```

Nama database dan kredensial disesuaikan dengan konfigurasi MySQL pada Laragon.

**4. Buat database**

Jalankan MySQL melalui Laragon, kemudian buat database `course_app` menggunakan HeidiSQL.

**5. Jalankan aplikasi**
```bash
php artisan key:generate
php artisan migrate
php artisan serve
```

Akses aplikasi melalui `http://127.0.0.1:8000`.

## Pengaturan Role Admin

Akun yang dibuat melalui registrasi secara default memiliki role `user`.

Untuk memberikan akses Admin:
1. Registrasi akun melalui aplikasi.
2. Buka database MySQL menggunakan HeidiSQL di Laragon.
3. Pilih tabel `users`.
4. Ubah nilai kolom `role` dari `user` menjadi `admin`.
5. Simpan perubahan, kemudian login menggunakan akun tersebut.

Pengaturan role Admin dilakukan secara manual melalui database untuk keperluan pengujian aplikasi.

## Pengembang

**Sarirotun Ni'mah**  
NPM: 24081010011  
Informatika — UPN "Veteran" Jawa Timur

Project ini dikembangkan untuk keperluan akademik pada mata kuliah Pemrograman Framework A.