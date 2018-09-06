# Stockies Structure Apps

#### 1. Prepare

Setelah clone repository, jangan lupa lakukan perintah:
```sh
$ composer update
$ php artisan key:generate
$ php artisan config:cache
$ php artisan cache:clear
```
Selanjutnya buat database dengan nama "stockies" di MySQL
Lalu ubah file ".env.example" menjadi ".env", ganti config berikut:
```sh
APP_NAME=Stockies
DB_DATABASE=stockies
DB_USERNAME={sesuaikan dengan username database kamu}
DB_PASSWORD={sesuaikan dengan password database kamu}
```

#### 2. Struktur untuk Front End

Untuk bagian front end, terletak pada folder "resources > views". Berikut adalah struktur yang sudah dibuat:
  - admin -----> (menyimpan semua file untuk halaman admin)
  - auth -------> (menyimpan semua file untuk halaman login dan register)
  - errors ----->(halaman untuk menampilkan halaman error yang digunakan)
  - guest ------>(menyimpan semua file untuk halaman user yang belum login)
  - layouts ---->(menyimpan header, footer, sidebar, dan layout lainnya)
  - user ------->(menyimpan semua file untuk halaman user yang telah login)

#### 3. Data dari Back End

Untuk bagian data yang dikirim maupun yang direquest dari back end, cek di "github > issues" lihat semua yang di assign ke kamu
