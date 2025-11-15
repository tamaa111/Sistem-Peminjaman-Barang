# Sistem Peminjaman Barang

Aplikasi web berbasis Laravel untuk mengelola peminjaman barang di institusi atau organisasi.

## Fitur Utama

### Autentikasi & Otorisasi

-   Login menggunakan Laravel Breeze
-   Role-based access control (Super Admin, Admin, User)
-   Middleware untuk mengatur hak akses per halaman

### Untuk Admin & Super Admin

-   **Dashboard**: Statistik peminjaman, barang tersedia, dan riwayat
-   **Manajemen Barang**: CRUD barang dengan upload gambar
-   **Konfirmasi Peminjaman**: Menyetujui atau menolak pengajuan peminjaman
-   **Konfirmasi Pengembalian**: Validasi barang yang dikembalikan
-   **Manajemen User**: CRUD data user (khusus admin)
-   **Manajemen Admin**: CRUD data admin (khusus super admin)

### Untuk User

-   **Beranda**: Melihat daftar barang tersedia
-   **Ajukan Peminjaman**: Mengajukan peminjaman barang
-   **Riwayat Peminjaman**: Melihat status peminjaman
-   **Kembalikan Barang**: Mengembalikan barang yang dipinjam

## Teknologi yang Digunakan

-   **Framework**: Laravel 11
-   **Authentication**: Laravel Breeze
-   **UI Template**: AdminLTE 3
-   **Database**: MySQL
-   **Frontend**: jQuery, Bootstrap 4, DataTables, SweetAlert2

## Struktur Database

### Tabel users

-   id (PK)
-   nama
-   username (unique)
-   password
-   role (ENUM: 'super admin', 'admin', 'user')

### Tabel barang

-   id (PK)
-   nama_barang
-   kode_barang (unique)
-   jumlah
-   lokasi
-   gambar
-   status (ENUM: 'tersedia', 'tidak tersedia')

### Tabel peminjaman

-   id (PK)
-   user_id (FK)
-   barang_id (FK)
-   tanggal_pinjam
-   tanggal_kembali
-   jumlah_pinjam
-   status (ENUM: 'menunggu', 'dipinjam', 'dikembalikan', 'ditolak')
-   keperluan
-   alasan_penolakan

### Tabel pengembalian

-   id (PK)
-   peminjaman_id (FK)
-   tanggal_dikembalikan
-   status_barang (ENUM: 'tidak ada masalah', 'ada masalah', 'menunggu')

## Instalasi

1. Clone repository

```bash
git clone https://github.com/tamaa111/Sistem-Peminjaman-Barang.git
cd sistem-peminjaman-barang
```

2. Install dependencies

```bash
composer install
npm install
npm run build
```

3. Copy file environment

```bash
copy .env.example .env
```

4. Generate application key

```bash
php artisan key:generate
```

5. Konfigurasi database di file `.env`

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sistem_peminjaman_barang
DB_USERNAME=root
DB_PASSWORD=
```

6. Jalankan migration dan seeder

```bash
php artisan migrate:fresh --seed
```

7. Buat symbolic link untuk storage

```bash
php artisan storage:link
```

8. Jalankan aplikasi

```bash
php artisan serve
```

Aplikasi dapat diakses di `http://localhost:8000`

## Login Credentials

### Super Admin

-   Username: `superadmin`
-   Password: `password`

### Admin

-   Username: `admin`
-   Password: `password`

### User

-   Username: `user`
-   Password: `password`

## Controllers (Resource)

1. **DashboardController** - Mengelola dashboard admin
2. **BerandaController** - Mengelola beranda user
3. **BarangController** - CRUD barang (Resource)
4. **PeminjamanController** - CRUD & konfirmasi peminjaman (Resource)
5. **PengembalianController** - CRUD & konfirmasi pengembalian (Resource)
6. **UserController** - CRUD user (Resource)
7. **AdminController** - CRUD admin (Resource)
8. **ProfileController** - Manajemen profil user

## Halaman Aplikasi

1. Login
2. Dashboard (Admin/Super Admin)
3. Beranda (User)
4. Data Barang
5. Konfirmasi Peminjaman
6. Konfirmasi Pengembalian
7. Riwayat Peminjaman
8. Data User
9. Data Admin (Super Admin only)
10. Profil

## Workflow Utama

### Peminjaman Barang

1. User memilih barang dari halaman Beranda
2. User mengisi form peminjaman (tanggal, jumlah, keperluan)
3. Admin menerima notifikasi di halaman Konfirmasi Peminjaman
4. Admin menyetujui/menolak pengajuan
5. Jika disetujui, stok barang berkurang dan status menjadi "dipinjam"

### Pengembalian Barang

1. User mengembalikan barang melalui halaman Riwayat Peminjaman
2. Admin menerima notifikasi di halaman Konfirmasi Pengembalian
3. Admin memvalidasi kondisi barang
4. Jika tidak ada masalah, stok barang bertambah kembali

## Validasi

Semua form menggunakan Request Validation Classes:

-   StoreBarangRequest & UpdateBarangRequest
-   StorePeminjamanRequest & UpdatePeminjamanRequest
-   StorePengembalianRequest
-   StoreUserRequest & UpdateUserRequest

## Fitur Tambahan

-   Notifikasi real-time untuk peminjaman & pengembalian baru
-   DataTables untuk pencarian dan sorting data
-   SweetAlert2 untuk konfirmasi aksi
-   Upload gambar barang dengan validasi
-   Responsive design menggunakan AdminLTE

## Lisensi

MIT License

## Developer

Developed with ❤️ using Laravel & AdminLTE
