# Web Elearning Tekno

## Cara Install
1. Clone repo
2. Jalankan composer install
3. Copy .env.example ke .env
4. Set nama database dengan user dan password yang benar di .env
5. php artisan key:generate
6. php artisan migrate
***
## Code Convention
Hal yang harus diperhatikan dalam kodingan, untuk mempermudah pembacaan.
- Class: PascalCase
- Function: camelCase
- Variable: snake_case
- diroute jangan ada return langsung passing ke controller dulu
- pakai use jangan akses langsung pada direktorinya 
- Buat branch tiap fitur yang dikerjakan, jangan kerjakan fitur di branch master
***
## Struktur DB
![alt](cdm_db.PNG)

Ada sedikit perbedaan nama tabel/attribut, akan yang diikuti yang ada pada migration.
***
## Hal yang harus dilakukan jika tidak mengerti
Lihat Model dan Controller  
Lihat Routingan  
Google
***
## To Do List
 - Untuk siraj

Buat middleware untuk verifikasi admin

### Fitur fitur
- Modul  
CRUD Modul  
Menggunakan wysiwyg

- Komunitas  
CRUD Komunitas  
CRUD Pengunguman

- User  
    * User biasa  
    Bisa pilih komunitas  
    Bisa daftar

    * Admin komunitas  
    Bisa menerima request masuk komunitas  

    * Ganen  
    Bisa assign admin
