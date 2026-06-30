# TechNews Portal

Portal berita teknologi berbasis Laravel — menyajikan berita seputar AI, smartphone, laptop, PC hardware, gaming, software, dan cyber security. Proyek ini mencakup **website publik** untuk pembaca dan **panel admin** untuk mengelola konten.

**Status:** MVP  
**Dokumen:** [`docs/prd.md`](docs/prd.md) · [`docs/design.md`](docs/design.md)

---

## Fitur

### Website Publik

- Homepage dengan hero, breaking news, latest, trending, dan seksi per kategori
- Detail berita (thumbnail, penulis, tanggal, konten, tags, related news, share)
- Halaman kategori dan tag
- Pencarian berita (judul, konten, kategori, tag)
- Halaman About
- Desain responsif (mobile-first) dengan gaya editorial cream/coral

### Panel Admin (`/admin`)

- Login, logout, remember me (Laravel Breeze)
- Dashboard statistik + grafik berita per kategori
- CRUD berita (draft/publish, slug otomatis, CKEditor 5, upload thumbnail)
- CRUD kategori dan tag
- Media library (upload & kelola gambar)
- Manajemen user admin/editor (hanya role `admin`)
- Profil akun

---

## Tech Stack

| Layer | Teknologi |
|-------|-----------|
| Backend | Laravel 13, PHP 8.3+ |
| Frontend | Blade, Tailwind CSS, Alpine.js, Vite |
| Database | MySQL |
| Auth | Laravel Breeze |
| Rich Text | CKEditor 5 (CDN) |
| Charts | Chart.js (CDN) |
| Testing | Pest |

---

## Persyaratan

- PHP >= 8.3
- Composer
- Node.js & npm
- MySQL
- Extension PHP: `pdo_mysql`, `mbstring`, `openssl`, `tokenizer`, `xml`, `ctype`, `json`, `fileinfo`

---

## Instalasi (Laragon)

### 1. Clone & masuk ke folder proyek

```bash
cd C:\laragon\www\JARKOM\Portal-Berita
```

### 2. Install dependensi

```bash
composer install
npm install
```

### 3. Environment

```bash
copy .env.example .env
php artisan key:generate
```

Pastikan konfigurasi database di `.env`:

```env
APP_NAME="TechNews Portal"
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=portal_berita
DB_USERNAME=root
DB_PASSWORD=
```

Buat database `portal_berita` di phpMyAdmin atau HeidiSQL sebelum migrate.

### 4. Database & storage

```bash
php artisan migrate --seed
php artisan storage:link
```

### 5. Build assets

```bash
npm run build
```

### 6. Jalankan aplikasi

**Opsi A — satu perintah (server + queue + Vite):**

```bash
composer dev
```

**Opsi B — manual:**

```bash
php artisan serve
npm run dev
```

Buka [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## Akun Demo

| Role | Email | Password |
|------|-------|----------|
| Admin | `admin@technews.test` | `password` |
| Editor | `editor@technews.test` | `password` |

Login admin: [http://127.0.0.1:8000/login](http://127.0.0.1:8000/login)  
Dashboard: [http://127.0.0.1:8000/admin](http://127.0.0.1:8000/admin)

> Registrasi publik dinonaktifkan. User baru hanya bisa ditambahkan oleh admin.

---

## URL Utama

| URL | Keterangan |
|-----|------------|
| `/` | Homepage |
| `/news/{slug}` | Detail berita |
| `/category/{slug}` | Berita per kategori |
| `/tag/{slug}` | Berita per tag |
| `/search?q=` | Pencarian |
| `/about` | Tentang portal |
| `/login` | Login admin |
| `/admin` | Dashboard admin |

---

## Struktur Proyek

```
app/
├── Http/Controllers/       # Public & Admin controllers
├── Http/Middleware/        # Role: admin, editor
├── Http/Requests/          # Form validation (News)
├── Models/                 # User, News, Category, Tag, Media
├── Observers/              # Auto-slug & publish date
└── Services/               # NewsService (search, trending, related)

resources/views/
├── components/             # Blade components (news-card, layouts, dll.)
├── public/                 # Halaman publik
├── admin/                  # Panel admin
└── auth/                   # Login Breeze

database/
├── migrations/
├── factories/
└── seeders/                # Kategori, berita demo, user admin
```

---

## Testing

```bash
php artisan test
```

Atau via Composer:

```bash
composer test
```

---

## Perintah Berguna

```bash
php artisan migrate:fresh --seed   # Reset database + seed ulang
php artisan route:list             # Daftar route
php artisan storage:link           # Symlink storage publik
npm run build                      # Build production assets
```

---

## Lisensi

Proyek ini menggunakan [MIT License](https://opensource.org/licenses/MIT). Framework Laravel dilisensikan secara terpisah oleh Taylor Otwell.
