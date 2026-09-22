# Panduan Deployment Mobil 1 Team RG ke Railway

File ini menjelaskan langkah-langkah untuk melakukan deployment aplikasi Laravel **Mobil 1 Team RG** Anda ke platform **Railway**.

## Langkah 1: Persiapan Repositori GitHub
1. Buat repositori baru di GitHub (misal: `mobil1-team-rg`).
2. Lakukan inisialisasi Git lokal dan commit seluruh kode Anda:
   ```bash
   git init
   git add .
   git commit -m "Initial commit - Slipstream Theme & Railway Config"
   ```
3. Hubungkan repositori lokal Anda ke GitHub dan push:
   ```bash
   git remote add origin https://github.com/USERNAME/NAMA_REPOSITORI.git
   git branch -M main
   git push -u origin main
   ```

## Langkah 2: Deployment di Railway
1. Buka dashboard [Railway](https://railway.app/) dan buat akun/login.
2. Klik **New Project** -> pilih **Deploy from GitHub repo** -> pilih repositori `mobil1-team-rg` Anda.
3. Railway akan mendeteksi aplikasi secara otomatis menggunakan builder Nixpacks.

## Langkah 3: Tambahkan Database MySQL
1. Di proyek Railway Anda, klik **+ Add** -> pilih **Database** -> pilih **MySQL**.
2. Railway secara otomatis membuatkan server MySQL kosong untuk Anda.

## Langkah 4: Konfigurasi Environment Variables (Variabel Lingkungan)
Pilih service aplikasi Laravel Anda di Railway, masuk ke tab **Variables**, dan tambahkan variabel berikut:

| Nama Variabel | Nilai (Value) | Keterangan |
| --- | --- | --- |
| `APP_ENV` | `production` | Lingkungan aplikasi |
| `APP_DEBUG` | `false` | Matikan debug untuk keamanan |
| `APP_KEY` | `base64:xxxx...` | Salin kunci aplikasi dari file `.env` lokal Anda |
| `DB_CONNECTION` | `mysql` | Jenis koneksi database |
| `DB_HOST` | `${{MySQL.MYSQL_RAW_HOST}}` | Otomatis terhubung dengan database Railway |
| `DB_PORT` | `${{MySQL.MYSQL_PORT}}` | Otomatis terhubung dengan port Railway |
| `DB_DATABASE` | `${{MySQL.MYSQL_DATABASE}}` | Otomatis terhubung dengan nama database Railway |
| `DB_USERNAME` | `${{MySQL.MYSQL_USER}}` | Otomatis terhubung dengan user Railway |
| `DB_PASSWORD` | `${{MySQL.MYSQL_PASSWORD}}` | Otomatis terhubung dengan password Railway |

## Langkah 5: Migrasi & Seeding Database Pertama Kali
Karena file `railway.json` sudah disiapkan di root proyek, Railway akan otomatis menjalankan `php artisan migrate --force` pada saat deploy untuk membuat tabel-tabel database.

Jika Anda ingin mengisi database pertama kali dengan data awal pembalap (seeder), jalankan perintah berikut sekali saja melalui terminal Railway (di menu **Shell** / tab **Deployments**):
```bash
php artisan db:seed --class=RgrCompleteSeeder --force
```

Aplikasi Anda kini aktif di Railway dan siap diakses melalui URL publik yang disediakan!
