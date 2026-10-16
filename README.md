# DC Equipment (Dulichand Construction Equipment)
### Production-Ready Corporate Website & Filament v3 Admin Panel

**Established in 2016 in Jaipur, Rajasthan**, Dulichand Construction Equipment (**DC Equipment**) is a premier distributor and service engineering partner for heavy concrete machinery spares, mobile transit mixer rebuilds, hydraulic drive assemblies, and high-performance **DCP (Don Construction Products)** construction chemicals.

---

## 🌟 Key Features & Tech Stack

- **Framework**: Laravel 12 on PHP 8.2+ with MySQL.
- **Admin Panel**: **Filament v3** (`filament/filament:^3.3`) with full CRUD resources:
  - **Products Resource**: Full specs table, features list, applications, images, SEO meta, active/featured toggles.
  - **Categories Resource**: Equipment spares vs. DCP Construction Chemicals divisioning.
  - **Services Resource**: Complete scope of work, client benefits, procedure breakdown.
  - **Clients & Projects Resource**: Marquee partners (MEIL, JK Lakshmi Cement, KEC, Montecarlo, etc.), sectors, testimonials.
  - **Quotes & Leads (Enquiries) Resource**: Instant alert badge counter, status workflow (`new`, `contacted`, `quotation_sent`, `closed`), notes.
  - **SEO Meta Resource**: Per-page regional optimization targeting Jaipur and Rajasthan keywords.
  - **Company Settings Resource**: Dynamic contact details, director information, business hours, and operational milestones.
- **Custom Admin Widgets**:
  - `StatsOverviewWidget`: Live counters for Equipment Spares, DCP Chemical Solutions, Active Services, Client References, and Pending Quotes.
  - `LatestEnquiriesWidget`: Table widget showing latest quote requests with live modal detail viewer.
- **Frontend Stack**: Clean, modern industrial theme styled with **Tailwind CSS v4** and **Alpine.js**:
  - Corporate Blue (`#0F172A`, `#1E293B`, `#2563EB`) & Safety Accent Gold (`#F59E0B`, `#D97706`).
  - Mobile-responsive navigation drawer.
  - Asynchronous AJAX Quote / Lead Request form with instant feedback.
- **Branding & Logo**:
  - Standalone SVG logo component: `resources/views/components/logo.blade.php`.
  - Standalone vector assets: `public/images/logo.svg` and `public/images/logo-dark.svg`.
  - Heavy-duty geometric icon incorporating interlocking **"DC"** lines, safety accent chisel wedge, and bold typography.
- **Local SEO & Schema.org**:
  - Integrated `LocalBusiness` JSON-LD schema with exact coordinates for **Upasana 1st Avenue, Ajmer Road, Jaipur (302006)**.
  - Dynamic regional metadata targeting: *"Construction equipment spares Jaipur"*, *"DCP construction chemicals Rajasthan"*, *"Batching plant parts Ajmer Road"*.

---

## 🚀 Quick Start & Installation

### 1. Requirements
- PHP 8.2 or higher (with `pdo_mysql`, `intl`, `gd`, `zip`, `curl`, `mbstring`)
- MySQL 8.0+ / MariaDB
- Composer 2.x
- Node.js 18+ and NPM

### 2. Setup Environment
```bash
# 1. Configure environment file
cp .env.example .env

# 2. Configure your MySQL credentials in .env:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=dc_equipment
DB_USERNAME=root
DB_PASSWORD=your_password

# 3. Generate Application Encryption Key
php artisan key:generate
```

### 3. Install Dependencies & Build Frontend
```bash
# Install PHP dependencies (Filament, Livewire, etc.)
composer install --optimize-autoloader

# Install front-end dependencies and build assets
npm install
npm run build
```

### 4. Run Migrations & Seed Database
Pre-populates all company profile data, categories, products, DCP chemicals, services, client references, and admin user:
```bash
# Create database if not exists and run seeders:
php artisan migrate:fresh --seed
```

### 5. Launch Local Development Server
```bash
php artisan serve
```

---

## 🔐 Admin Panel Credentials

- **Admin Login URL**: `http://localhost:8000/admin`
- **Email**: `admin@dcequipment.in`
- **Password**: `password`
- **User**: Jitender Singh (Director)

---

## 🗂 Project Architecture

```
├── app/
│   ├── Filament/
│   │   ├── Resources/
│   │   │   ├── CategoryResource.php
│   │   │   ├── ProductResource.php
│   │   │   ├── ServiceResource.php
│   │   │   ├── ClientReferenceResource.php
│   │   │   ├── EnquiryResource.php
│   │   │   ├── SeoMetaResource.php
│   │   │   └── CompanySettingResource.php
│   │   └── Widgets/
│   │       ├── StatsOverviewWidget.php
│   │       └── LatestEnquiriesWidget.php
│   ├── Http/Controllers/
│   │   ├── PageController.php
│   │   └── EnquiryController.php
│   ├── Models/
│   │   ├── Category.php
│   │   ├── Product.php
│   │   ├── Service.php
│   │   ├── ClientReference.php
│   │   ├── Enquiry.php
│   │   ├── SeoMeta.php
│   │   └── CompanySetting.php
│   └── View/Components/
│       └── AppLayout.php
├── database/
│   ├── migrations/
│   └── seeders/
│       ├── DatabaseSeeder.php
│       ├── UserSeeder.php
│       ├── CompanySettingSeeder.php
│       ├── CategoryAndProductSeeder.php
│       ├── ServiceSeeder.php
│       ├── ClientReferenceSeeder.php
│       └── SeoMetaSeeder.php
├── public/
│   └── images/
│       ├── logo.svg
│       └── logo-dark.svg
├── resources/
│   ├── css/app.css
│   ├── js/app.js
│   └── views/
│       ├── components/
│       │   ├── logo.blade.php
│       │   └── quote-form.blade.php
│       ├── layouts/
│       │   └── app.blade.php
│       └── pages/
│           ├── home.blade.php
│           ├── about.blade.php
│           ├── products.blade.php
│           ├── product-detail.blade.php
│           ├── chemicals.blade.php
│           ├── services.blade.php
│           ├── service-detail.blade.php
│           ├── projects.blade.php
│           └── contact.blade.php
```

---

## 🏢 Company Profile Summary

- **Company**: DC Equipment (Dulichand Construction Equipment)
- **Established**: 2016
- **Director**: Jitender Singh
- **Corporate HQ**: Upasana 1st Avenue, Ajmer Road, Jaipur, Rajasthan - 302006
- **Phone / WhatsApp**: +91 86969 62600
- **Email**: info@dcequipment.in / sales@dcequipment.in
- **Principal Partner**: DCP (Don Construction Products)
- **Key Enterprise Clients**: MEIL, JK Lakshmi Cement, KEC International, ZIP Enterprises, AG Infra Ventures India, OM Metals Infraprojects, Ayoki Fabricon, Montecarlo Limited
