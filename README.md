# Yuvalay - Individual Development Center (Option 3 Web Portal)

Modern, semi-dynamic, SEO-optimized web application for **Yuvalay Individual Development Center (Vadodara, Gujarat)** built with **PHP Laravel 9**, Tailwind CSS, and a Bento Grid UI layout.

---

## 🚀 Features

- **Modern Bento Grid UI**: Intuitive, high-impact card layout showcasing Yuvalay's mission ("Where Young Minds Discover Their Potential"), core pillars (01 Learn, 02 Connect, 03 Grow, 04 Lead), and live impact statistics.
- **Dynamic Events & RSVP Engine**:
  - Live events listing with category tags and RSVP capacity tracking.
  - Dual Image Pipeline: Add event banners via direct web image URLs (e.g. from Google Images) or local file upload (`public/uploads/events`).
  - Seamless RSVP registration with confirmation badges.
- **5-Channel Enquiry Management**:
  - Structured routing for Students, Colleges, Corporate Partners, Mentors, and Volunteers.
  - Custom anti-spam & anti-fake validation (`ValidRealPhoneNumber`) rejecting numbers under 10 digits, dummy sequences (`12345...`), and repeating digits.
- **Admin CMS Dashboard**:
  - Protected administrative area (`/admin/login`).
  - Dynamic Event Creator, Editor & RSVP Viewer.
  - Enquiries management with quick status updates.
  - **Live Impact Statistics Hub**: Dual-pane editor with live synchronized Bento preview card and pillar summaries.
- **Enterprise SEO & Legacy Support**:
  - Automated 301 redirects preserving all legacy `yuvalay.org` URLs.
  - Dynamic XML Sitemap (`/sitemap.xml`).
  - Schema.org JSON-LD structured data for NGO, Event, and Educational Course rich snippets.

---

## 🛠️ Tech Stack

- **Framework**: Laravel 9.x
- **Backend**: PHP 8.0+
- **Database**: SQLite (default zero-config) / MySQL ready
- **Styling**: Tailwind CSS & Lucide Icons
- **Server**: Artisan Serve / Apache / Nginx

---

## 📦 Getting Started

### 1. Prerequisites
- PHP >= 8.0 with `pdo_sqlite`, `pdo_mysql`, `mbstring`, `openssl` extensions.
- [Composer](https://getcomposer.org/)

### 2. Clone Repository
```bash
git clone <your-repository-url>
cd yuvalay1
```

### 3. Setup Environment
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Database Setup & Seeding
```bash
# Run migrations & populate authentic Vadodara programs, events, mentors, and initial impact metrics
php artisan migrate:fresh --seed
```

### 5. Launch Local Server
```bash
php artisan serve
```
Visit `http://127.0.0.1:8000` in your web browser.

---

## 🔐 Default Admin Credentials

- **URL**: `http://127.0.0.1:8000/admin/login`
- **Email**: `admin@yuvalay.org`
- **Password**: `yuvalay2026`

---

## 📂 Project Structure

```
├── app/
│   ├── Http/Controllers/    # PageController, DashboardController, EventController, etc.
│   ├── Models/              # Event, Enquiry, Program, Mentor, ImpactStat, etc.
│   └── Rules/               # ValidRealPhoneNumber anti-fake validation
├── database/
│   ├── migrations/          # Schema migrations for all models
│   └── seeders/             # YuvalayDatabaseSeeder with realistic data
├── resources/views/
│   ├── layouts/             # app.blade.php & admin.blade.php master layouts
│   ├── pages/               # 11 public pages + sitemap
│   └── admin/               # CMS management & live impact stats views
└── routes/web.php           # Public routes, admin CMS routes, and 301 legacy redirects
```

---

## 📄 License
This project is open-source and developed for Yuvalay Individual Development Center.
