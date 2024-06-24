# Proyek Akhir: Sistem Backend Website Fashion Shop


## Fitur Sistem Backend Berbasis Web Online Fashion Shop

### - Manajemen User
Sistem ini akan menyimpan informasi pengguna, termasuk peran mereka sebagai 'owner' atau 'admin', dengan kedua peran tersebut memiliki hak akses penuh untuk melihat, menambahkan, mengubah, dan menghapus informasi pengguna dalam sistem.

- GET /api/user: Membaca semua data user yang ada pada database
- POST /api/user: Menambahkan data user yang baru 
- PUT /api/user: Memperbarui data user
- DELETE /api/user: Menghapus data user yang sudah tidak aktif lagi

### - Manajemen Product
Sistem akan menyimpan informasi detail produk sepatu (nama, deskripsi, harga, gambar, stok, kategori) yang dapat dikelola oleh pemilik dan admin. Pengunjung website dapat melihat daftar produk di halaman utama, menjelajahi produk berdasarkan kategori, dan mengakses halaman detail produk dengan informasi lengkap. Fitur ini memungkinkan manajemen produk yang efisien serta pengalaman belanja yang informatif bagi pengunjung.

- GET /api/product: Membaca semua data product yang ada pada database
- POST /api/product: Menambahkan data product baru 
- PUT /api/product: Memperbarui data product
- DELETE /api/product: Menghapus data product yang sudah tidak aktif lagi

### - Manajemen Category
Sistem ini akan menyimpan informasi mengenai berbagai kategori fashion yang tersedia, seperti sepatu, pakaian pria, pakaian wanita, aksesoris, dan kategori lainnya. Dengan pemilik dan admin memiliki kemampuan penuh untuk menambahkan kategori baru, mengubah nama kategori yang ada, memperbaruinya atau menghapus kategori yang sudah tidak diperlukan lagi.

- GET /api/category: Membaca semua data category yang ada pada database
- POST /api/category: Menambahkan data category yang baru 
- PUT /api/category: Memperbarui data category
- DELETE /api/category: Menghapus data category yang sudah tidak aktif lagi

### - Manajemen Order
Sistem akan mencatat detail pesanan pelanggan, termasuk informasi produk, pelanggan, dan status pesanan. Pemilik dan admin dapat mengelola pesanan melalui panel admin, memperbarui status, dan melihat riwayat transaksi. Pengunjung dapat mengakses informasi kontak toko untuk pemesanan offline. Fitur pembaruan status pesanan memungkinkan pelacakan real-time dari 'pending' hingga 'selesai', meningkatkan transparansi bagi pelanggan.

- GET /api/order: Membaca semua data order yang ada pada database
- POST /api/order: Menambahkan data order yang baru 
- PUT /api/order: Memperbarui data order
- DELETE /api/order: Menghapus data order yang sudah tidak aktif lagi

## Skema Tech Stack
![tech_stack](media/image.png)

- **Backend**: Bagian dari aplikasi web toko baju yang menangani logika bisnis, operasi data, dan komunikasi dengan basis data.
- **PHP**: Bahasa pemrograman untuk membangun backend aplikasi web, termasuk RESTful API untuk pengelolaan produk, kategori, users, dan pesanan.
- **Apache**: Server web open-source untuk menghosting aplikasi web berbasis PHP.
- **RESTful API**: Dibangun menggunakan PHP untuk menyediakan antarmuka pemrograman aplikasi yang memungkinkan pertukaran data dalam format JSON atau XML.
- **MySQL**: Sistem manajemen basis data relasional (RDBMS) open-source untuk menyimpan dan mengelola data aplikasi web toko baju online.