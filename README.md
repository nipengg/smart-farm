## Smart Farm

## Instalasi

### Spesifikasi
- PHP ^8.1
- Database MySQL atau MariaDB
- SQlite (untuk `automated testing`)

### Cara Install

1. Clone atau download source code
    - Para terminal, clone repo `git clone https://github.com/nipengg/smart-farm.git`
    - Jika tidak menggunakan Git, silakan **Download Zip** dan *extract* pada direktori web server (misal: xampp/htdocs)
    - Jika menggunakan laragon silakan extract pada direktori laragon/www
2. `cd smart-farm`
3. `composer install`
4. `npm install` lalu `npm run dev``
5. `cp .env.example .env`
    - Jika tidak menggunakan Git, bisa copy file `.env.example` paste menjadi `.env`
6. Pada terminal `php artisan key:generate`
7. Buat **database pada mysql** untuk aplikasi ini
8. **Setting database** pada file `.env`
9. `php artisan serve`
10. Selesai