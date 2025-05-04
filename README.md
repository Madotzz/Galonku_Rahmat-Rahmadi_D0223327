# GalonKu

## Nama

Rahmat Rahmadi  
D0223327  

## Mata Kuliah

Framework Web Based
Tahun: 2025

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
| id         | BIGINT       | Primary Key              |
| name       | VARCHAR(255) | Nama pengguna            |
| email      | VARCHAR(255) | Email unik               |
| password   | VARCHAR(255) | Password terenkripsi     |
| role       | ENUM         | admin / kurir / customer |
| created_at | TIMESTAMP    | Waktu dibuat             |
| updated_at | TIMESTAMP    | Waktu diubah             |

### 2. orders

| Field       | Tipe Data    | Keterangan                      |
|-------------|--------------|----------------------------------|
| id          | BIGINT       | Primary Key                     |
| user_id     | BIGINT       | Relasi ke tabel users           |
| address     | TEXT         | Alamat pengiriman               |
| total_harga | DECIMAL(10,2)| Total harga pesanan             |
| status      | ENUM         | pending / konfirmasi / dikirim / selesai |
| created_at  | TIMESTAMP    |                                  |
| updated_at  | TIMESTAMP    |                                  |

### 3. products

| Field      | Tipe Data     | Keterangan         |
|------------|---------------|--------------------|
| id         | BIGINT        | Primary Key        |
| name       | VARCHAR(255)  | Nama produk        |
| stock      | INTEGER       | Stok tersedia      |
| harga      | DECIMAL(10,2) | Harga satuan       |
| created_at | TIMESTAMP     |                    |
| updated_at | TIMESTAMP     |                    |

### 4. order_details

| Field          | Tipe Data     | Keterangan                        |
|----------------|---------------|------------------------------------|
| id             | BIGINT        | Primary Key                        |
| order_id       | BIGINT        | Relasi ke tabel orders             |
| product_id     | BIGINT        | Relasi ke tabel products           |
| jumlah         | INTEGER       | Jumlah produk yang dipesan         |
| subtotal_harga | DECIMAL(10,2) | Harga subtotal (jumlah * harga)    |
| created_at     | TIMESTAMP     |                                    |
| updated_at     | TIMESTAMP     |                                    |

### 5. deliveries

| Field      | Tipe Data     | Keterangan                           |
|------------|---------------|---------------------------------------|
| id         | BIGINT        | Primary Key                           |
| order_id   | BIGINT        | Relasi ke tabel orders                |
| kurir_id   | BIGINT        | Relasi ke tabel users (kurir)         |
| status     | ENUM          | on_the_way / delivered                |
| created_at | TIMESTAMP     |                                       |
| updated_at | TIMESTAMP     |                                       |

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
