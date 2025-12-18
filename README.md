# Lab11Web

# Nama : Fitri Ramadhani
# NIM : 312410085
# Kelas : TI.24.A.1
# Mata Kuliah : Pemrograman Web 1 (Tugas Pert-13)
# Dosen Pengampu : Agung Nugroho, S.Kom., M.Kom.

# Lab11Web – PHP OOP, Modular Routing, Authentication & Session

## 📌 Deskripsi Project
Project ini merupakan hasil implementasi **Praktikum 11 dan Praktikum 12** pada mata kuliah **Pemrograman Web**.  
Aplikasi dibangun menggunakan **PHP berbasis Object Oriented Programming (OOP)** dengan konsep **modularisasi**, **routing**, serta **autentikasi dan session**.

Pada praktikum ini, aplikasi tidak lagi menggunakan satu file PHP, melainkan dibagi ke dalam beberapa modul agar lebih terstruktur, mudah dikembangkan, dan mudah dipelihara.

---

## 🎯 Tujuan Praktikum
- Memahami konsep **PHP OOP lanjutan**
- Menerapkan **framework modular sederhana**
- Mengimplementasikan **routing URL**
- Membuat sistem **login, logout, dan session**
- Melakukan **proteksi halaman** menggunakan session
- Mengelola password dengan **enkripsi (password_hash)**

---

## 📂 Struktur Folder Project
```
lab11_php_oop/
├── .htaccess
├── config.php
├── index.php
├── class/
│ ├── Database.php
│ └── Form.php
├── module/
│ └── artikel/
│ ├── index.php
│ ├── tambah.php
│ └── ubah.php
├── template/
│ ├── header.php
│ ├── footer.php
│ └── sidebar.php
```
---

## 🔁 Routing Aplikasi
Routing dilakukan melalui file `index.php` yang berfungsi sebagai **gerbang utama aplikasi**.

Contoh URL:
- `http://localhost/lab11_php_oop/home/index`
- `http://localhost/lab11_php_oop/artikel/index`
- `http://localhost/lab11_php_oop/user/login`

File `.htaccess` digunakan untuk mengaktifkan URL rewrite agar routing dapat berjalan dengan baik.

---

## 🧱 Implementasi OOP
### Class Database
Digunakan untuk:
- Koneksi database
- Query data
- Insert dan update data

### Class Form
Digunakan untuk:
- Membuat form input secara dinamis
- Mengurangi penulisan kode HTML berulang

---

## 📰 Modul Artikel (CRUD)
Modul artikel digunakan untuk mengelola data artikel:
- **index.php** → menampilkan data artikel
- **tambah.php** → menambah artikel
- **ubah.php** → mengubah artikel

Seluruh proses CRUD menggunakan class `Database`.

---

## 🔐 Autentikasi & Session (Praktikum 12)

### Fitur Login
- User login menggunakan **username dan password**
- Password disimpan dalam database menggunakan **password_hash**
- Validasi login menggunakan **password_verify**

### Proteksi Halaman
- Halaman artikel hanya dapat diakses setelah login
- Jika user belum login, otomatis diarahkan ke halaman login

### Logout
- Menghapus session menggunakan `session_destroy`
- User dikembalikan ke halaman login

---

## 👤 Fitur Profil (Tugas Tambahan)
Fitur profil memungkinkan user untuk:
- Melihat data user yang sedang login
- Mengubah password
- Password baru disimpan dengan enkripsi

---

## 🧪 Cara Menjalankan Aplikasi
1. Jalankan **XAMPP** dan aktifkan Apache & MySQL
2. Letakkan folder `lab11_php_oop` ke dalam `htdocs`
3. Buat database `latihan_oop`
4. Import tabel `users` dan `artikel`
5. Akses melalui browser:

http://localhost/lab11_php_oop/home/index

---

## 🔑 Akun Login (Default)
```
Username : admin
Password : admin123
```

---

## 📸 Dokumentasi
Setiap tahapan praktikum disertai dengan **screenshot hasil implementasi**, meliputi:
- Struktur folder
- Routing
- CRUD artikel
- Halaman login
- Session aktif
- Logout
- Halaman profil

---
<img width="1366" height="672" alt="image" src="https://github.com/user-attachments/assets/a152eeec-f589-4236-952c-ca960c9b5ef1" />
<img width="1366" height="686" alt="image" src="https://github.com/user-attachments/assets/2480c830-163c-493d-b1ce-56d90e741175" />
<img width="1366" height="681" alt="image" src="https://github.com/user-attachments/assets/ae3b63eb-b563-4db5-8b77-74d4d60f30a8" />
<img width="1365" height="678" alt="image" src="https://github.com/user-attachments/assets/a8fee1f5-3b9b-4783-ae79-0cbfd128c4c3" />
<img width="1365" height="677" alt="image" src="https://github.com/user-attachments/assets/703b0ffc-413f-4f8e-a71f-1ee3ea871ffc" />
