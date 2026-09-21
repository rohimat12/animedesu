# 🎬 Animedesu v2.0

> **Platform Streaming & Download Anime Subtitle Indonesia Terlengkap**  
> Dibangun menggunakan **CodeIgniter 4 (PHP 8)** dengan arsitektur MVC modern, desain dark-mode elegan, pencarian real-time, serta sistem manajemen konten anime yang lengkap.

---

## ✨ Fitur Utama

### 🌐 Frontend Publik (Modern Dark Theme)
- **Desain Dark-Mode Premium:** Antarmuka modern dengan efek Glassmorphism, backdrop blur hero, glowing badges, dan tipografi Oswald & Mulish.
- **🔍 Real-Time Live Search:** Autocomplete pencarian instan dengan teknik *debounce* 280ms langsung dari navbar atas, lengkap dengan poster, rating bintang, dan status tayang.
- **🏷️ Filter Genre & Katalog Anime:** Direktori katalog lengkap dengan tombol pill genre interaktif, filter status tayang (*Ongoing* / *Completed*), dan opsi pengurutan (*Skor Tertinggi*, *Terbaru*, *Judul A-Z*).
- **📺 Detail Anime & Video Player:** Halaman detail anime sinematik dengan pemutar video responsif, daftar tombol episode cepat, dan tombol direct link unduhan berbagai kualitas (720p/1080p).
- **📱 100% Mobile Responsive:** Navigasi responsif dengan hamburger toggle yang halus pada perangkat smartphone dan tablet.

### 🛠️ Admin Control Panel
- **🔐 Keamanan & Autentikasi (Bcrypt):**
  - Akun admin diamankan dengan hashing `password_hash(..., PASSWORD_BCRYPT)`.
  - Semua URL `/admin/*` dilindungi otomatis oleh `AuthFilter`. Pengunjung tanpa sesi login otomatis dialihkan ke `/login`.
- **📺 Manajemen Anime & Episode:**
  - Tambah, ubah, dan hapus serial anime.
  - **Integrasi Jikan API v4:** Pengambilan metadata anime otomatis dari MyAnimeList cukup dengan memasukkan Anime ID.
  - Manajemen episode dengan dukungan embed player (iframe) dan link download.
- **📄 Manajemen Halaman Statis:** Pembuatan halaman informasi/kebijakan dinamis berbasis slug URL.
- **📊 Halaman Statistik & Analitik (`/admin/statistik`):**
  - Diagram donat (*Doughnut Chart*) rasio status Ongoing vs Completed via Chart.js.
  - Diagram batang (*Bar Chart*) distribusi genre terpopuler di database.
  - Tabel peringkat Top 5 anime dengan skor tertinggi.
  - Panel monitor kesehatan lingkungan server (Versi PHP, CodeIgniter, MySQL, Memory Limit, dan Batas Upload).
- **⚙️ Halaman Pengaturan Website & Akun (`/admin/setting`):**
  - Konfigurasi nama situs, deskripsi SEO, dan URL logo.
  - Perubahan profil admin dan fitur ganti password aman dengan validasi dan konfirmasi sandi.

---

## 🚀 Kredensial Default Admin

| Field | Nilai Default |
|---|---|
| **URL Login** | `http://localhost:8080/login` |
| **Username** | `admin` |
| **Password** | `admin123` |

> *Catatan: Password dapat diganti sewaktu-waktu melalui halaman Pengaturan di dalam Admin Panel.*

---

## 🛠️ Persyaratan Sistem & Teknologi

- **Bahasa Pemrograman:** PHP >= 8.0 (disertai ekstensi `intl`, `mbstring`, `mysqli`)
- **Framework:** CodeIgniter 4.1+
- **Database:** MySQL / MariaDB
- **Frontend Stack:** Bootstrap 4, FontAwesome 5, Chart.js, Google Fonts (Mulish, Oswald)
- **API Eksternal:** Jikan REST API v4 (MyAnimeList)

---

## 📦 Panduan Instalasi & Penggunaan

### 1. Clone Repository
```bash
git clone https://github.com/rohimat12/animedesu.git
cd animedesu
```

### 2. Konfigurasi Database
1. Buat database baru di MySQL dengan nama `animedesu`.
2. Import file [`database.sql`](database.sql) ke dalam database `animedesu`.
3. Pastikan konfigurasi database di file [`.env`](.env) sudah sesuai:
   ```env
   database.default.hostname = localhost
   database.default.database = animedesu
   database.default.username = root
   database.default.password = 
   database.default.DBDriver = MySQLi
   ```

### 3. Menjalankan Server Lokal
Cukup jalankan file batch:
```bash
serve.bat
```
*atau melalui terminal CodeIgniter CLI:*
```bash
php spark serve --port 8080
```

Buka browser dan akses:
- **Halaman Utama:** [http://localhost:8080/](http://localhost:8080/)
- **Katalog & Filter:** [http://localhost:8080/categories](http://localhost:8080/categories)
- **Login Admin:** [http://localhost:8080/login](http://localhost:8080/login)

---

## 📁 Struktur Direktori Utama

```
animedesu/
├── app/
│   ├── Config/          # Konfigurasi aplikasi, routing, dan filter keamanan
│   ├── Controllers/     # Admin.php, Auth.php, Home.php
│   ├── Filters/         # AuthFilter.php (Proteksi sesi admin)
│   ├── Models/          # AdminModel, AnimeModel, EpisodeModel, UserModel, WebModel
│   └── Views/           # admin/, auth/, home/, template/
├── public/              # Document Root publik (index.php, .htaccess, assets)
├── database.sql         # Skema database & data awal (seed)
├── serve.bat            # Launcher server lokal siap pakai
├── spark                # CodeIgniter CLI tool
└── README.md            # Dokumentasi project
```

---

## 📄 Lisensi
Project ini didistribusikan di bawah lisensi open-source [MIT License](LICENSE).
