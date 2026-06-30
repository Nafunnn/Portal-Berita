# Product Requirements Document (PRD)

# Portal Berita Teknologi

**Project Name**
TechNews Portal

**Version**
1.0

**Prepared By**
Naf'an

**Framework**
Laravel 12

**Project Type**
Website Portal Berita

**Status**
MVP (Minimum Viable Product)

---

# 1. Executive Summary

Portal Berita Teknologi merupakan website berita yang berfokus pada informasi terbaru seputar dunia teknologi, meliputi Artificial Intelligence (AI), Smartphone, Laptop, PC Hardware, Gaming, Software, Cyber Security, dan berbagai perkembangan teknologi lainnya.

Website ini bertujuan memberikan pengalaman membaca berita yang cepat, nyaman, modern, serta mudah digunakan baik melalui desktop maupun perangkat mobile.

Selain menyediakan portal berita untuk pengunjung, sistem juga menyediakan Dashboard Admin yang memungkinkan administrator mengelola seluruh konten secara efisien.

---

# 2. Product Vision

Menjadi portal berita teknologi sederhana yang modern, cepat, informatif, dan mudah dikelola menggunakan Laravel.

---

# 3. Product Goals

## Business Goals

* Menyediakan media publikasi berita teknologi.
* Mempermudah admin mengelola berita.
* Memiliki struktur website yang SEO Friendly.
* Menjadi project portfolio Laravel yang menerapkan best practice.

---

## User Goals

Pengunjung dapat:

* Membaca berita terbaru.
* Mencari berita tertentu.
* Menjelajah berdasarkan kategori.
* Menemukan berita terkait.

Admin dapat:

* Menulis berita.
* Mengedit berita.
* Menghapus berita.
* Mengelola kategori.
* Mengelola tag.
* Mengelola media.

---

# 4. Target Users

## Primary Users

* Mahasiswa IT
* Programmer
* Gamer
* Teknisi Komputer
* Pengguna Smartphone
* Penggemar AI

## Secondary Users

* Masyarakat umum
* Pengguna internet yang mengikuti perkembangan teknologi

---

# 5. User Persona

### Persona 1

Nama : Andi

Umur : 22 Tahun

Profesi : Mahasiswa Informatika

Goals

* Membaca berita AI
* Mengikuti perkembangan GPU terbaru
* Mencari rekomendasi laptop

Pain Points

* Banyak website penuh iklan
* Tampilan berantakan
* Berita sulit dicari

---

### Persona 2

Nama : Budi

Umur : 30 Tahun

Profesi : IT Support

Goals

* Membaca berita hardware
* Update teknologi server
* Update Windows & Linux

---

# 6. Scope

## MVP

### Public

* Homepage
* Detail Berita
* Kategori
* Search
* Trending News
* Latest News
* Related News
* Responsive

### Admin

* Login
* Dashboard
* CRUD Berita
* CRUD Kategori
* CRUD Tag
* Upload Thumbnail
* Publish / Draft

---

## Future Version

* Komentar
* Bookmark
* Newsletter
* Like
* Multi Author
* Analytics
* AI News Summary
* AI Recommendation

---

# 7. Features

## Public Website

### Homepage

Menampilkan

* Hero News
* Breaking News
* Latest News
* Popular News
* AI News
* Smartphone
* Laptop
* PC Hardware
* Gaming
* Software

---

### Detail Berita

Menampilkan

* Thumbnail
* Judul
* Penulis
* Tanggal
* Isi Berita
* Tags
* Related News
* Share Button

---

### Search

Pengguna dapat mencari berdasarkan

* Judul
* Isi berita
* Tag
* Kategori

---

### Category Page

Menampilkan seluruh berita berdasarkan kategori.

---

### Tag Page

Menampilkan seluruh berita berdasarkan tag.

---

# 8. Admin Features

## Dashboard

Menampilkan statistik

* Total Berita
* Published
* Draft
* Categories
* Tags
* Views (opsional)

---

## News Management

Admin dapat

* Create
* Read
* Update
* Delete
* Draft
* Publish
* Upload Thumbnail

---

## Category Management

CRUD Category

---

## Tag Management

CRUD Tag

---

## Media

Upload

* Thumbnail
* Banner

---

# 9. Functional Requirements

## Authentication

* Login
* Logout
* Remember Me

---

## News

Field

* Title
* Slug
* Thumbnail
* Category
* Tags
* Content
* Status
* Published Date

---

## Search

Search realtime menggunakan query database.

---

## Pagination

10 berita per halaman.

---

## SEO

Slug otomatis.

Contoh

```
www.technews.com/news/nvidia-launches-rtx-6090
```

---

# 10. Non Functional Requirements

## Performance

* Loading < 2 detik
* Lazy Loading Image
* Pagination

---

## Security

* CSRF Protection
* Validation
* Password Hashing
* XSS Protection

---

## Compatibility

* Chrome
* Firefox
* Edge
* Safari

---

## Responsive

Desktop

Tablet

Mobile

---

# 11. Sitemap

```
Home

├── Latest News

├── AI

├── Smartphone

├── Laptop

├── PC Hardware

├── Gaming

├── Software

├── Search

├── Detail News

└── About
```

---

Dashboard

```
Dashboard

├── News

├── Categories

├── Tags

├── Media

├── Users

└── Profile
```

---

# 12. User Flow

Visitor

```
Open Website

↓

Homepage

↓

Search / Category

↓

News List

↓

Detail News

↓

Related News
```

---

Admin

```
Login

↓

Dashboard

↓

Create News

↓

Upload Thumbnail

↓

Publish

↓

News Appears
```

---

# 13. Database Overview

## Users

* id
* name
* email
* password

---

## Categories

* id
* name
* slug

---

## Tags

* id
* name
* slug

---

## News

* id
* category_id
* user_id
* title
* slug
* thumbnail
* content
* status
* published_at
* created_at

---

## News Tags

* news_id
* tag_id

---

# 14. Relationship

```
User

↓

1 : N

↓

News

↓

N : 1

↓

Category

↓

N : N

↓

Tags
```

---

# 15. UI Design Guidelines

## Design Style

Modern Technology News

Minimal

Clean

Professional

---

## Theme

Light Theme

Dark Theme (Future)

---

## Color

Primary

Blue

Secondary

White

Accent

Orange

Success

Green

Danger

Red

Background

Light Gray

---

## Typography

Heading

Bold

Body

Medium

Button

Semi Bold

---

## Component

Navbar

Hero Banner

News Card

Sidebar

Category Badge

Tag Badge

Footer

Pagination

Search Box

Breadcrumb

---

# 16. Homepage Layout

```
------------------------------------------------

Navbar

------------------------------------------------

Hero News

------------------------------------------------

Breaking News

------------------------------------------------

Latest News

------------------------------------------------

Trending News

------------------------------------------------

AI

------------------------------------------------

Smartphone

------------------------------------------------

Laptop

------------------------------------------------

PC Hardware

------------------------------------------------

Gaming

------------------------------------------------

Footer

------------------------------------------------
```

---

# 17. Dashboard Layout

```
Sidebar

Dashboard

News

Categories

Tags

Media

Users

Settings

-------------------------

Top Navbar

-------------------------

Statistic Cards

Recent News

Recent Activity
```

---

# 18. Validation Rules

Title

* Required
* Max 255

Category

* Required

Thumbnail

* Image
* Max 2 MB

Content

* Required

Status

* Draft / Published

---

# 19. Success Metrics

Target MVP

* CRUD berjalan 100%
* Responsive
* Search berfungsi
* Pagination berjalan
* Upload gambar berhasil
* Login aman
* Slug otomatis
* SEO URL

---

# 20. Future Roadmap

## Version 1.1

* Komentar
* Bookmark
* Dark Mode
* Newsletter

---

## Version 1.2

* AI Summary
* AI Generated Tags
* AI SEO Meta Generator
* AI Related News

---

## Version 2.0

* Multi Author
* User Login
* Push Notification
* Mobile App
* REST API
* Admin Analytics
* Dashboard Monitoring

---

# 21. Tech Stack

| Layer            | Technology                    |
| ---------------- | ----------------------------- |
| Backend          | Laravel 12                    |
| Frontend         | Blade + Tailwind CSS          |
| Database         | MySQL                         |
| Authentication   | Laravel Breeze                |
| File Storage     | Laravel Storage               |
| Rich Text Editor | TinyMCE / CKEditor 5          |
| Icons            | Lucide Icons                  |
| Charts           | Chart.js                      |
| Image Processing | Intervention Image (Opsional) |

---

# 22. Catatan Pengembangan

Agar project ini memberikan kesan profesional meskipun sederhana, beberapa prinsip berikut akan diterapkan:

* **SEO-friendly URL** dengan slug otomatis.
* **Status artikel** menggunakan alur *Draft → Published*.
* **Relasi Eloquent** yang jelas antara User, News, Category, dan Tag.
* **Reusable Blade Components** untuk kartu berita, badge kategori, dan pagination.
* **Responsive Design** dengan pendekatan mobile-first.
* **Dashboard** yang ringkas dengan statistik utama.
* **Code Structure** mengikuti konvensi Laravel (Controller → Service → Model bila diperlukan).
* **Seeders & Factories** untuk menghasilkan data dummy sehingga aplikasi siap didemokan.