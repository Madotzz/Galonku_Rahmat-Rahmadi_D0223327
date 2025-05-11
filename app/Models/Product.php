<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['name', 'stock', 'harga'];

    /**
     * Relasi satu ke banyak (one to many)
     * Satu produk bisa muncul di banyak transaksi
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    /**
     * Relasi many-to-many dengan model Order melalui tabel pivot 'transactions'
     */
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'transactions')
            ->withPivot('jumlah', 'subtotal_harga')
            ->withTimestamps();
    }
}
