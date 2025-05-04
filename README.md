# GalonKu

## Nama

Rahmat Rahmadi  
D0223327  

## Mata Kuliah

Framework Backend  
Tahun: 2025

---

## Role dan Fitur-fiturnya

### Admin

- Manajemen data galon
- CRUD User (Kurir, Customer)
- Lihat dan Kelola Transaksi

### Kurir

- Melihat pesanan masuk
- Update status pengiriman

### Customer

- Registrasi & Login
- Pemesanan galon
- Lihat riwayat transaksi

---

## Tabel-tabel database beserta field dan tipe datanya

### 1. users

| Field        | Tipe Data    | Keterangan             |
|--------------|--------------|------------------------|
| id           | BIGINT       | Primary Key            |
| name         | VARCHAR(255) | Nama pengguna          |
| email        | VARCHAR(255) | Email unik             |
| password     | VARCHAR(255) | Password terenkripsi   |
| role         | ENUM         | admin / kurir / customer |
| created_at   | TIMESTAMP    | Waktu dibuat           |
| updated_at   | TIMESTAMP    | Waktu diubah           |

### 2. orders

| Field        | Tipe Data    | Keterangan             |
|--------------|--------------|------------------------|
| id           | BIGINT       | Primary Key            |
| user_id      | BIGINT       | Relasi ke tabel users  |
| total_price  | INTEGER      | Total harga pesanan    |
| status       | ENUM         | pending / delivering / done |
| created_at   | TIMESTAMP    |                        |
| updated_at   | TIMESTAMP    |                        |

---

## Jenis relasi dan tabel yang berelasi

- **users** ↔ **orders** (One to Many)  
  Satu user bisa punya banyak pesanan.
