# Cara Membuat Frontend Laravel Menggunakan Laragon Quick App

Panduan ini menjelaskan cara membuat project frontend Laravel menggunakan fitur Quick App di Laragon, dimulai dari clone backend via terminal VS Code, import database backend, membuat frontend via Laragon, membuka proyek frontend di VS Code lewat terminal Laragon, hingga menampilkan halaman menggunakan controller dan blade view.

---

## 📦 Persiapan

Pastikan kamu sudah menginstal:
- Laragon
- Git
- Visual Studio Code (VS Code)
- Composer (biasanya sudah include di Laragon)

---

## 🔁 Langkah 1: Clone Backend Lewat VS Code

1. Buka **Visual Studio Code**
2. Buat folder kerja baru (misalnya: `projekku`)
   - Klik `File > Open Folder...`
3. Buka terminal di VS Code (`Ctrl + ``)
4. Jalankan perintah berikut:
```bash
git clone https://github.com/kristiandimasadiwicaksono/SI-KRS-Backend.git backend
```
> Gantilah URL di atas dengan repository backend milikmu

5. Masuk ke folder backend:
```bash
cd backend
```

6. Install dependency Laravel:
```bash
composer install
```

---

## 🗃️ Langkah 2: Import Database Backend

1. Import database dari https://github.com/WindyAnggitaPutri/SI_KRS_Database.git, kemuadian buka **phpMyAdmin** dari menu Laragon, kemudian klik database
2. Buat database baru, misalnya:
   ```
   backend_db
   ```
3. Klik tab **Import**, lalu pilih file `.sql` 
4. Klik **Go** untuk import

---

## ⚙️ Langkah 3: Atur File `.env` Backend

Jika backend blm memiliki file `.env` di folder backend:

```env
cp env .env
```
Edit file `.env` di folder backend:

```env
DB_DATABASE=db_uas_230202067
DB_USERNAME=root
DB_PASSWORD=
```

Jalankan backend:
```bash
php spark serve
```

---
# 📌 API Endpoint List

Gunakan endpoint di bawah ini untuk pengujian API melalui Postman atau tools lainnya.

## 🔧 Buat Request Baru

### 📁 Kelas
- **GET** → `http://localhost:8080/kelas`
- **GET** → `http://localhost:8080/kelas/{id}`
- **POST** → `http://localhost:8080/kelas`
- **PUT** → `http://localhost:8080/kelas/{id}`
- **DELETE** → `http://localhost:8080/kelas/{id}`

### 📘 Matkul
- **GET** → `http://localhost:8080/matkul`
- **GET** → `http://localhost:8080/matkul/{id}`
- **POST** → `http://localhost:8080/matkul`
- **PUT** → `http://localhost:8080/matkul/{id}`
- **DELETE** → `http://localhost:8080/matkul/{id}`

### 🏫 Prodi
- **GET** → `http://localhost:8080/prodi`
- **GET** → `http://localhost:8080/prodi/{id}`
- **POST** → `http://localhost:8080/prodi`
- **PUT** → `http://localhost:8080/prodi/{id}`
- **DELETE** → `http://localhost:8080/prodi/{id}`

### 👨‍🎓 Mahasiswa
- **GET** → `http://localhost:8080/mahasiswa`
- **GET** → `http://localhost:8080/mahasiswa/{id}`
- **POST** → `http://localhost:8080/mahasiswa`
- **PUT** → `http://localhost:8080/mahasiswa/{id}`
- **DELETE** → `http://localhost:8080/mahasiswa/{id}`

### 📄 KRS
- **GET** → `http://localhost:8080/krs`
- **GET** → `http://localhost:8080/krs/{id}`
- **POST** → `http://localhost:8080/krs`
- **PUT** → `http://localhost:8080/krs/{id}`
- **DELETE** → `http://localhost:8080/krs/{id}`

### 👤 User
- **GET** → `http://localhost:8080/user`
- **GET** → `http://localhost:8080/user/{id}`


## 🖥️ Langkah 4: Buat Frontend via Laragon Quick App

1. Jalankan **Laragon**
2. Klik kanan di area kosong Laragon, pilih:
   ```
   Quick app > Laravel
   ```
3. Masukkan nama proyek frontend, misalnya:
   ```
   uas-frontend-230202067
   ```
4. Laragon akan otomatis:
   - Membuat folder `frontend` di `C:\laragon\www`
   - Menginstal Laravel
   - Membuka CMD otomatis di folder tersebut

> Tutup CMD yang muncul, karena kita akan buka lewat terminal Laragon

---

## 📂 Langkah 5: Buka Frontend di VS Code via Terminal Laragon

1. Klik `Menu > Terminal` di Laragon untuk buka terminal internal Laragon
2. Jalankan:
```bash
code frontend
```
> Ini akan membuka folder frontend langsung di Visual Studio Code

---

## ⚙️ Langkah 6: Atur File `.env` Frontend

Edit file `.env` di proyek frontend (kalau tidak pakai database, kamu bisa lewati bagian DB):

```env
APP_NAME=LaravelFrontend
APP_URL=http://localhost:8000

SESSION_DRIVER=file
```

Lalu jalankan:
```bash
composer install
```

---

## 🧱 Langkah 7: Buat Tampilan Menggunakan Controller

### 7.1 Buat Controller
```bash
php artisan make:controller HomeController
```

### 7.2 Tambahkan Fungsi di Controller

Edit file `app/Http/Controllers/HomeController.php`:

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }
}
```

### 7.3 Buat Folder dan View

Buat folder dan file untuk view:
```bash
php artisan make:view home
```

Lalu buat file `resources/views/home/index.blade.php` dan isi seperti berikut:

```blade
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sistem Informasi Kampus</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

  <div class="flex min-h-screen">
  <!-- Sidebar -->
  <aside class="w-64 bg-gray-800 text-gray-100 shadow-lg flex flex-col">
      <!-- Link ke homepage -->
      <a href="{{ route('homepage')}}" class="p-5 text-2xl font-semibold border-b border-gray-700 hover:bg-gray-700 transition">SI Kampus🏫</a>
      <!-- Navigasi sidebar -->
      <nav class="flex-1 p-5">
        <ul class="space-y-3">
         <!-- Navigasi ke halaman Dashboard -->
         <li>
        <a href="{{ route('homepage')}}" class="flex items-center gap-2 px-4 py-3 rounded-md hover:bg-gray-700 transition">📌Dashboard</a>
        </li>
         <!-- Navigasi ke halaman Data Prodi -->
         <li>
            <a href="{{ route('prodi.index')}}" class="flex items-center gap-2 px-4 py-3 rounded-md hover:bg-gray-700 transition">📋Data Prodi</a>
          </li>
          <!-- Navigasi ke halaman Data Mahasiswa-->
          <li>
            <a href="{{ route('mahasiswa.index')}}" class="flex items-center gap-2 px-4 py-3 rounded-md hover:bg-gray-700 transition">👩‍🎓Data Mahasiswa</a>
          </li>
      </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
      <!-- Header -->
      <header class="bg-white shadow p-5 flex items-center justify-center border-b border-gray-200">
        <h1 class="text-gray-800 text-2xl font-semibold tracking-wide">Sistem Informasi Kampus</h1>
      </header>
      <!-- Content -->
      <main class="p-6">
        <div class="bg-white p-6 rounded shadow-md">
          <h2 class="text-xl font-semibold mb-4">Selamat Datang di Sistem Informasi</h2>
          <p class="text-gray-600">Gunakan menu di samping untuk mengelola Data Prodi dan Mahasiswa.</p>
        </div>
      </main>
    </div>
  </div>
</body>
</html>

```

### 7.4 Ubah Route

Edit file `routes/web.php`:

```php
<?php
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('homepage'); //supaya bisa balik ke halaman homepage selamat datang klo di klik
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
```

---

## 🚀 Langkah 8: Jalankan Frontend

Jalankan frontend kamu:

```bash
php artisan serve
```

Lalu buka di browser:
```
http://127.0.0.1:8000
```
jika muncul error tentang enkripsi APP_KEY, jalankan:
```bash
php artisan key:generate
```


---

## 📝 Catatan Tambahan

### ✔️ Beberapa Perintah `php artisan make:` yang Berguna

| Perintah                                | Fungsi                                      |
|----------------------------------------|---------------------------------------------|
| `php artisan make:controller Nama`     | Membuat controller baru                     |
| `php artisan make:view Nama`          | Membuat view baru                          |

---
### Catatan Tambahan - Fungsi Edit

Pada proses edit data, terdapat dua pendekatan tergantung pada format data yang diterima dari response:

- **Jika response berupa object:**  
  Gunakan pendekatan berikut:
  ```php
  if ($matkulResponse->successful()) {
      $matkul = $matkulResponse->json();
  }
  ```
  Cocok digunakan ketika response dari API mengembalikan data tunggal dalam bentuk object JSON.

- **Jika response berupa array:**  
  Gunakan pendekatan berikut:
  ```php
  if ($matkulResponse->successful() && !empty($matkulResponse[0])) {
      $matkul = $matkulResponse[0];
  }
  ```
  Pendekatan ini digunakan ketika API mengembalikan array data dan hanya ingin mengambil elemen pertama untuk diedit.

---
### 📋Langkah 9 : Buat Fitur Cetak
download 
````
composer require barryvdh/laravel-dompdf 
````
buat file view cetak, nambah fungsi cetak, dan route di web
