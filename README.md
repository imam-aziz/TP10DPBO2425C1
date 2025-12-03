# 💻 TP10 DPBO C1 - Imam Azizun Hakim - [2404420]

## 🤝 Janji
"Saya Imam Azizun Hakim dengan NIM 2404420 mengerjakan Tugas Praktikum 10 dalam mata kuliah Desain Pemrograman Berorientasi Objek untuk keberkahan-Nya maka saya tidak akan melakukan kecurangan seperti yang telah di spesifikasikan. Aamiin."

## 🔀 Penjelasan Desain dan Flow Program (MVVM)

Website **Bengkel Motor Azul** ini dibangun menggunakan arsitektur **MVVM (Model-View-ViewModel)**. Pola ini dipilih untuk memisahkan secara tegas antara logika bisnis (Model), logika presentasi (ViewModel), dan antarmuka pengguna (View).

### Penjelasan Class

#### Class Pelanggan (Model)
<pre>
  ● id (PK)           <strong>berupa int sebagai Primary Key tabel pelanggan</strong>
  ● nama_pelanggan    <strong>berupa varchar sebagai nama lengkap</strong>
  ● kontak            <strong>berupa varchar sebagai nomor hp</strong>
</pre>

#### Class Mekanik (Model)
<pre>
  ● id (PK)           berupa int sebagai Primary Key tabel mekanik
  ● nama_mekanik      berupa varchar nama mekanik
  ● spesialisasi      berupa varchar keahlian (Mesin, Kelistrikan)
</pre>

#### Class Servis (Model)
<pre>
  ● id (PK)           berupa int sebagai Primary Key tabel servis
  ● jenis_servis      berupa varchar nama layanan
  ● biaya             berupa int harga jasa
</pre>

#### Class PesananServis (Model Transaksi)
<pre>
  ● id (PK)           berupa int Primary Key
  ● id_pelanggan (FK) berupa int Foreign Key ke Pelanggan
  ● id_mekanik (FK)   berupa int Foreign Key ke Mekanik
  ● id_servis (FK)    berupa int Foreign Key ke Servis
  ● tgl_masuk         berupa date tanggal transaksi
  ● catatan           berupa catatan/keterangan tambahan
</pre>

### Penjelasan File Utama (Struktur MVVM)

#### 1. Models (Model Layer)
Bertanggung jawab sebagai representasi data dan logika bisnis database. Tidak boleh ada kode HTML di sini.
<pre>
● DB.php:             Koneksi database (Data Access).
● Pelanggan.php:      Objek yang merepresentasikan data pelanggan (CRUD).
● Mekanik.php:        Objek yang merepresentasikan data mekanik.
● PesananServis.php:  Objek transaksi yang menangani data gabungan (JOIN) dari DB.
</pre>

#### 2. ViewModels (Logic Layer)
Bertindak sebagai perantara. Mengambil data dari Model, memprosesnya, dan menyediakannya untuk View.
*(Note: Di struktur folder, file ini mengatur alur data agar View tinggal menampilkannya).*
<pre>
● PelangganViewModel.php:  Mengambil data pelanggan dari Model, menyiapkan data untuk tabel UI.
● MekanikViewModel.php:    Menangani logika penambahan dan validasi data mekanik.
● TransaksiViewModel.php:  Menggabungkan data Pelanggan, Mekanik, dan Servis agar siap ditampilkan.
</pre>

#### 3. Views (View Layer)
Bertanggung jawab HANYA untuk menampilkan data (User Interface). Tidak boleh ada query database di sini.
<pre>
● template/header.php:  Komponen UI Navigasi & Styling.
● pelanggan_list.php:   Menerima data dari ViewModel dan merender tabel HTML.
● mekanik_form.php:     Tampilan formulir input (Data Binding via Form).
● pesanan_list.php:     Menampilkan data transaksi yang sudah diproses ViewModel.
</pre>

#### index.php (Routing)
<pre>
● Bertindak sebagai entry point yang memanggil ViewModel yang sesuai berdasarkan request user.
</pre>

### Flow Program (Alur MVVM)
1. User meminta halaman (misal: Daftar Pesanan).
2. <strong>ViewModel</strong> dipanggil.
3. <strong>ViewModel</strong> meminta data mentah ke <strong>Model</strong>.
4. <strong>Model</strong> mengambil data dari Database dan mengembalikannya ke ViewModel.
5. <strong>ViewModel</strong> memproses data tersebut (format tanggal, hitung biaya, dll).
6. <strong>View</strong> menerima data matang dari ViewModel dan menampilkannya ke User.

### Connect Database
● Aplikasi terhubung ke database MySQL <strong>bengkel_azul</strong>.
● Menggunakan library <strong>mysqli</strong> di dalam class DB.php.
● Menggunakan konsep Relational Database dengan Foreign Key (Pelanggan -> Pesanan).

## 📋 Requirements

<pre>
● Arsitektur MVVM : Pemisahan jelas antara Model, View, dan ViewModel. ✅
● 5 Tabel dengan minimal 2 atribut : Pelanggan, Mekanik, Servis, Pesanan. ✅
● Relasi : One-to-Many dan Many-to-One terimplementasi. ✅
● CRUD : Sudah bisa melakukan tambah, edit dan hapus data. ✅
● data binding ✅
</pre>

## 📸 Dokumentasi

Berikut adalah Dokumentasi berupa ScreenRecord saat program dijalankan.


https://github.com/user-attachments/assets/dec56ad8-7b1f-4ab9-b38e-95a7916a3cf7

