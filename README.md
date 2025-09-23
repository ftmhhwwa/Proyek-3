# Proyek-3
Pengembangan Perangkat Lunak Berbasis Web

# Sistem Akademik Sederhana

Proyek ini adalah implementasi sistem akademik sederhana yang dikembangkan menggunakan framework CodeIgniter 4. Aplikasi ini berfokus pada penerapan Authentication dan Authorization, serta meningkatkan interaktivitas antarmuka pengguna dengan JavaScript.

---

## Penjelasan Singkat Fitur

Aplikasi ini memiliki dua peran pengguna utama, yaitu **Admin/Operator** dan **Mahasiswa**, dengan fitur-fitur sebagai berikut:

### Fitur Admin
* **Manajemen Mahasiswa**: Admin memiliki hak penuh untuk menambah, melihat detail, mengedit, dan menghapus data mahasiswa (operasi CRUD).
* **Manajemen Mata Kuliah**: Admin memiliki hak penuh untuk menambah, melihat detail, mengedit, dan menghapus data mata kuliah (operasi CRUD).
* **Validasi Input**: Form pendaftaran mahasiswa dan mata kuliah memiliki validasi di sisi klien menggunakan JavaScript, dengan pesan error dan visualisasi yang jelas.

### Fitur Mahasiswa
* **Daftar Mata Kuliah**: Mahasiswa dapat melihat daftar mata kuliah yang tersedia.
* **Enrollment Interaktif**: Mahasiswa dapat memilih lebih dari satu mata kuliah menggunakan checklist. Total SKS akan terhitung secara dinamis di sisi klien.
* **Validasi Enroll**: Sistem mencegah Mahasiswa mengambil mata kuliah yang sama lebih dari satu kali.
* **Mata Kuliah Diambil**: Mahasiswa dapat melihat daftar mata kuliah yang telah mereka ambil.

### Fitur Umum
* **Autentikasi & Otorisasi**: Sistem menggunakan session untuk mengelola login dan logout. Hak akses pengguna diatur berdasarkan peran (role) menggunakan middleware.
* **Interaktivitas JS**: Sebagian besar interaksi form dan konfirmasi dijalankan di sisi klien menggunakan DOM Manipulation dan Event Handling, tanpa memuat ulang halaman.

---

## Teknologi yang Digunakan

* **Backend**: CodeIgniter 4 dan PHP
* **Database**: MySQL
* [cite_start]**Frontend**: HTML, CSS Kustom, dan JavaScript [cite: 286, 287, 288]
* [cite_start]**Library**: `session` dari CodeIgniter 4 untuk autentikasi [cite: 147]

---

