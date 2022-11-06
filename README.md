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
4. `cp .env.example .env`
    - Jika tidak menggunakan Git, bisa copy file `.env.example` paste menjadi `.env`
5. Pada terminal `php artisan key:generate`
6. Buat **database pada mysql** untuk aplikasi ini
7. **Setting database** pada file `.env`
8. `php artisan serve`
9. Selesai