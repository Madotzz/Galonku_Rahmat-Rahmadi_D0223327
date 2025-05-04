<h1 align="center">GALONKU</h1>

<hr/>

<h3 align="center">PLATFORM PENGIRIMAN DAN PEMESANAN GALON</h3>

---

<p align="center">
  <img src="https://github.com/user-attachments/assets/36f5b8ce-b59d-4c5d-892f-31a6f36b31b5" alt="Logo GalonKu" width="200"/>
</p>

<p align="center">
  <strong>RAHMAT RAHMADI</strong><br/><br/>
  <strong>D0223327</strong><br/><br/>
  <strong>Framework Web Based</strong><br/><br/>
  <strong>2025</strong>
</p>

---

## Role dan Fitur-fiturnya

### 🔧-Admin

- Manajemen data galon
- CRUD User (Kurir, Customer)
- Lihat dan Kelola Transaksi

### 🚚-Kurir

- Melihat pesanan masuk
- Update status pengiriman

### 🛒-Customer

- Registrasi & Login
- Pemesanan galon
- Lihat riwayat transaksi

---

## Tabel-tabel database beserta field dan tipe datanya

### 1. users

| Field      | Tipe Data    | Keterangan               |
|------------|--------------|--------------------------|
| id         | INT       | Primary Key              |
| name       | VARCHAR(255) | Nama pengguna            |
| email      | VARCHAR(255) | Email unik               |
| password   | VARCHAR(255) | Password terenkripsi     |
| role       | ENUM         | admin / kurir / customer |
| created_at | TIMESTAMP    | Waktu dibuat             |
| updated_at | TIMESTAMP    | Waktu diubah             |

### 2. orders

| Field       | Tipe Data    | Keterangan                      |
|-------------|--------------|----------------------------------|
| id          | INT       | Primary Key                     |
| user_id     | INT       | Relasi ke tabel users           |
| address     | TEXT         | Alamat pengiriman               |
| total_harga | DECIMAL(10,2)| Total harga pesanan             |
| status      | ENUM         | pending / konfirmasi / dikirim / selesai |
| created_at  | TIMESTAMP    | Waktu dibuat                    |
| updated_at  | TIMESTAMP    | Waktu diubah                    |

### 3. products

| Field      | Tipe Data     | Keterangan         |
|------------|---------------|--------------------|
| id         | INT        | Primary Key        |
| name       | VARCHAR(255)  | Nama produk        |
| stock      | INTEGER       | Stok tersedia      |
| harga      | DECIMAL(10,2) | Harga satuan       |
| created_at | TIMESTAMP     | Waktu dibuat       |
| updated_at | TIMESTAMP     | Waktu diubah       |

### 4. order_details

| Field          | Tipe Data     | Keterangan                        |
|----------------|---------------|------------------------------------|
| id             | INT        | Primary Key                        |
| order_id       | INT        | Relasi ke tabel orders             |
| product_id     | INT        | Relasi ke tabel products           |
| jumlah         | INTEGER       | Jumlah produk yang dipesan         |
| subtotal_harga | DECIMAL(10,2) | Harga subtotal (jumlah * harga)    |
| created_at     | TIMESTAMP     | Waktu dibuat                       |
| updated_at     | TIMESTAMP     | Waktu diubah                       |

### 5. deliveries

| Field      | Tipe Data     | Keterangan                           |
|------------|---------------|---------------------------------------|
| id         | INT        | Primary Key                           |
| order_id   | INT        | Relasi ke tabel orders                |
| kurir_id   | INT        | Relasi ke tabel users (kurir)         |
| status     | ENUM          | on_the_way / delivered                |
| created_at | TIMESTAMP     | Waktu dibuat                          |
| updated_at | TIMESTAMP     | Waktu diubah                          |

---

## Jenis relasi dan tabel yang berelasi

- **users** ↔ **orders** (One to Many)  
  Satu user (customer) bisa memiliki banyak pesanan.

- **orders** ↔ **order_details** (One to Many)  
  Satu pesanan bisa memiliki banyak detail produk.

- **products** ↔ **order_details** (One to Many)  
  Satu produk bisa muncul di banyak detail pesanan.

- **orders** ↔ **deliveries** (One to One)  
  Satu pesanan memiliki satu data pengiriman.

- **users (kurir)** ↔ **deliveries** (One to Many)  
  Satu kurir bisa menangani banyak pengiriman.
