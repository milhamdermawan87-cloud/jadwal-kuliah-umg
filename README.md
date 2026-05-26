# 📚 Jadwal Mata Kuliah - UMG

Aplikasi **Jadwal Mata Kuliah Mahasiswa** berbasis **Full Stack Laravel 13 + PHP 8.4** dengan tampilan modern, futuristik, dan responsif.

**Universitas Muhammadiyah Gresik - Program Studi Informatika**

---

## ✨ Fitur

- ✅ **Authentication** - Login, Register, Logout, Edit Profile, Upload Foto
- ✅ **Role User** - Admin & Mahasiswa
- ✅ **Dashboard Modern** - Realtime clock, Particle effect, Animated background, Glassmorphism UI
- ✅ **CRUD Jadwal** - Create, Read, Update, Delete dengan Search & Filter
- ✅ **Jadwal Interaktif** - Timeline, Card animasi, Glow effect, Countdown kelas
- ✅ **Dark/Light Mode** - Toggle theme
- ✅ **Export PDF** - Download jadwal sebagai PDF
- ✅ **Print Jadwal** - Cetak jadwal langsung
- ✅ **QR Code Profile** - QR code untuk profil mahasiswa
- ✅ **Responsive Mobile** - Bottom navigation, sidebar mobile
- ✅ **Animated UI** - Fade in, Slide up, Floating particles, Blob background

---

## 🚀 Teknologi

| Teknologi | Versi |
|-----------|-------|
| Laravel | 13.x |
| PHP | ^8.3 |
| MySQL | 8.0 |
| Tailwind CSS | 3.4.x |
| Alpine.js | 3.14.x |
| Vite | 5.4.x |
| DOMPDF | 3.x |
| Simple QR Code | 4.x |
| Font Awesome | 6.5.x |

---

## 📋 Data Jadwal (Seeder Otomatis)

| Kode | Mata Kuliah | Kelas | SKS | Jadwal | Dosen |
|------|------------|-------|:---:|--------|-------|
| 2406022110 | KEWARGANEGARAAN | A-PG | 2 | Kamis 12:50-14:30 | ARYA MAULANA P. |
| 2406022211 | ENGLISH FOR INFORMATIC ENGINEERING | A-PG | 2 | Selasa 12:00-14:30 | TIM BAHASA INGGRIS LC |
| 2406022214 | AIK - IBADAH, AKHLAK, DAN MUAMALAH | A-PG | 2 | Selasa 07:50-09:30 | Drs. MOH. IN AM, M.Pd.I |
| 2406022215 | TECHNOPRENEURSHIP | A-PG | 3 | Rabu 10:20-12:50 | PUTRI AISYIYAH RAKHMA DEVI, S.Pd., M.Kom |
| 2406022309 | ALGORITMA DAN STRUKTUR DATA | A-PG | 4 | Senin 08:40-12:00 | DENI SUTAJI, S.Kom., M.Kom |
| 2406022312 | SISTEM OPERASI | A-PG | 3 | Kamis 10:20-12:50 | Muhammad Nasyitul Ibad, S.Kom., M.Kom |
| 2406022313 | MATEMATIKA DISKRIT | A-PG | 3 | Selasa 09:30-12:00 | NADYA HUSENTI, S.Pd., M.Pd |

**Total SKS: 19 / 20 SKS**

---

## 🔧 Instalasi Lokal (Laragon)

### Prasyarat
- Laragon (PHP 8.3+, MySQL, Node.js 18+)
- Composer

### Langkah-langkah

```bash
# 1. Clone project ke folder Laragon
cd C:\laragon\www
git clone <repo-url> "Jadwal Mata Kuliah"
cd "Jadwal Mata Kuliah"

# 2. Install dependencies PHP
composer install

# 3. Copy & konfigurasi environment
copy .env.example .env
# Edit .env:
#   DB_CONNECTION=mysql
#   DB_HOST=127.0.0.1
#   DB_PORT=3306
#   DB_DATABASE=jadwal_kuliah_umg
#   DB_USERNAME=root
#   DB_PASSWORD=

# 4. Generate key
php artisan key:generate

# 5. Buat database
# Buka Laragon > MySQL > Create Database "jadwal_kuliah_umg"

# 6. Migrasi & Seeder
php artisan migrate:fresh --seed

# 7. Storage link
php artisan storage:link

# 8. Install JS dependencies & build
npm install
npm run build

# 9. Jalankan server
php artisan serve
# Buka http://localhost:8000
```

### Akun Dummy

| Role | Email | Password |
|------|-------|----------|
| **Admin** | admin@umg.ac.id | password |
| **Mahasiswa** | mahasiswa@umg.ac.id | password |

---

## 🚀 Deployment ke Vercel

### Persiapan

1. **Push ke GitHub**
```bash
git init
git add .
git commit -m "Initial commit"
git remote add origin https://github.com/username/jadwal-kuliah-umg.git
git push -u origin main
```

2. **Deploy ke Vercel**
   - Install Vercel CLI: `npm i -g vercel`
   - Login: `vercel login`
   - Deploy: `vercel --prod`

   Atau melalui Vercel Dashboard:
   - Import repository dari GitHub
   - Framework: **Other**
   - Root Directory: `./`
   - Build Command: `composer install --no-dev && npm install && npm run build`
   - Output Directory: `public`

3. **Environment Variables di Vercel**
   ```
   APP_ENV=production
   APP_DEBUG=false
   APP_KEY=base64:... (generate dengan php artisan key:generate)
   APP_URL=https://jadwal-kuliah-umg.vercel.app
   DB_CONNECTION=mysql
   DB_HOST=your-database-host.railway.app
   DB_PORT=3306
   DB_DATABASE=railway
   DB_USERNAME=root
   DB_PASSWORD=your-password
   SESSION_DRIVER=cookie
   ```

### Database Online (Railway/Supabase)

#### Railway MySQL:
```bash
# 1. Daftar di railway.app
# 2. Buat project MySQL
# 3. Copy koneksi database
# 4. Isi environment variables di Vercel
# 5. Import database lokal:
mysqldump -u root jadwal_kuliah_umg > db.sql
mysql -h <host> -u <user> -p<password> <database> < db.sql
```

---

## 📁 Struktur Folder

```
├── api/
│   └── index.php              # Vercel entry point
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AuthController.php
│   │   │   ├── DashboardController.php
│   │   │   ├── JadwalController.php
│   │   │   ├── ProfileController.php
│   │   │   └── ExportController.php
│   │   ├── Middleware/
│   │   │   └── RoleMiddleware.php
│   │   └── Requests/
│   │       └── JadwalRequest.php
│   └── Models/
│       ├── User.php
│       └── Jadwal.php
├── database/
│   ├── migrations/
│   │   ├── 0001_01_01_000000_create_users_table.php
│   │   └── 2025_05_26_000001_create_jadwals_table.php
│   ├── seeders/
│   │   ├── DatabaseSeeder.php
│   │   ├── UserSeeder.php
│   │   └── JadwalSeeder.php
│   └── factories/
│       └── UserFactory.php
├── resources/
│   ├── css/app.css
│   ├── js/app.js
│   └── views/
│       ├── layouts/
│       │   ├── app.blade.php
│       │   └── guest.blade.php
│       ├── auth/
│       │   ├── login.blade.php
│       │   └── register.blade.php
│       ├── dashboard/
│       │   └── index.blade.php
│       ├── jadwal/
│       │   ├── index.blade.php
│       │   ├── create.blade.php
│       │   ├── edit.blade.php
│       │   ├── show.blade.php
│       │   ├── pdf.blade.php
│       │   └── print.blade.php
│       └── profile/
│           ├── index.blade.php
│           └── edit.blade.php
├── routes/
│   └── web.php
├── public/
│   └── storage/  (symlink)
├── vercel.json
└── .vercelignore
```

---

## 🎨 Fitur UI/UX

- **Dark Mode** - Toggle theme dengan localStorage persistence
- **Glassmorphism** - Efek kaca modern dengan backdrop blur
- **Gradient Neon** - Gradient warna biru-ungu yang futuristik
- **Animated Blob** - Background bergerak dengan 3 blob shapes
- **Floating Particles** - Efek partikel interaktif
- **Real-time Clock** - Jam digital realtime
- **Smooth Animations** - Fade in, slide up, hover effects
- **Responsive** - Desktop sidebar + Mobile bottom navigation
- **Countdown** - Hitung mundur ke kelas selanjutnya
- **Progress Bar** - Visual progress SKS

---

## 📱 Akses Mobile

Aplikasi sudah responsive dan mobile-friendly:
- **Bottom Navigation** muncul di layar kecil
- **Sidebar** berubah menjadi overlay
- Touch-friendly buttons dan cards
- Safe area support untuk notch HP

---

## 🧑‍💻 Developer

Dibuat untuk tugas presentasi kampus.
**Universitas Muhammadiyah Gresik - Program Studi Informatika**

---

## 📄 License

MIT
