# Activity Manager

Aplikasi Laravel untuk mencatat kegiatan dengan status `Planned`, `Ongoing`, dan `Done`.

## Fitur

- Daftar kegiatan berurutan menurut tanggal, halaman detail, dan filter status melalui query string.
- CRUD kegiatan dengan route resource, route model binding, dan validasi server melalui Form Request.
- Aturan perpindahan status: `Planned → Ongoing → Done`; status boleh tetap sama dan tidak boleh mundur.
- Seeder idempoten dengan lima contoh kegiatan.

## Menjalankan aplikasi

Pastikan PHP sesuai `composer.json` (PHP 8.3+) dengan ekstensi SQLite, Composer, Node.js, dan npm tersedia.

```powershell
Copy-Item .env.example .env
composer install
php artisan key:generate
php artisan migrate --seed
npm install
npm run build
php artisan serve
```

Buka `http://127.0.0.1:8000/activities`. Untuk pengembangan aset, gunakan `npm run dev` di terminal terpisah.

## Struktur inti

| Komponen | Lokasi | Tanggung jawab |
| --- | --- | --- |
| Route | `routes/web.php` | Mendefinisikan endpoint resource kegiatan. |
| Controller | `app/Http/Controllers/ActivityController.php` | Mengatur request dan response. |
| Form Request | `app/Http/Requests` | Memvalidasi input judul, tanggal, deskripsi, dan status. |
| Service | `app/Services/ActivityService.php` | Menegakkan transisi status dan menyimpan perubahan. |
| Model | `app/Models/Activity.php` | Menghubungkan data dengan tabel `activities`. |
| Migration / seeder | `database/migrations`, `database/seeders` | Membuat struktur tabel dan data awal. |
| Blade | `resources/views/activities` | Menampilkan daftar, detail, dan form CRUD. |

## Acceptance criteria untuk pemeriksaan manual

1. `/activities` menampilkan lima kegiatan setelah `migrate --seed`; detail ID yang tidak ada menghasilkan 404.
2. Judul di bawah 5 karakter, tanggal kosong/tidak valid, dan status di luar pilihan ditolak server.
3. Create, edit, dan delete bekerja; refresh setelah submit tidak mengirim ulang data karena redirect.
4. Filter `?status=Ongoing` menampilkan subset yang sesuai; nilai filter tak dikenal kembali menampilkan semua kegiatan.
5. Perubahan `Planned → Ongoing` dan `Ongoing → Done` diterima; transisi mundur ditolak dengan pesan validasi.
6. Form dapat dioperasikan dengan keyboard dan menampilkan ringkasan error.

## Kualitas kode

Format PHP menggunakan Laravel Pint yang tersedia di project: `vendor/bin/pint --test` untuk pemeriksaan atau `vendor/bin/pint` untuk format. Jalankan `php artisan test` setelah lingkungan PHP aktif. SonarQube tidak dikonfigurasi pada repository ini; buat project key dan konfigurasi server sesuai instance yang digunakan, lalu simpan tanggal scan dan temuan pada worksheet.

## Catatan penggunaan AI

AI membantu menyusun CRUD, validasi, aturan transisi, tampilan, dan dokumentasi berdasarkan worksheet Modul 3. Pemilik repository perlu menjalankan aplikasi, memeriksa route dan database, menguji acceptance criteria, serta mengisi bukti praktikum dan worksheet sesuai hasil verifikasi sendiri.
