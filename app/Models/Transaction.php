<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    protected $fillable = ['order_id', 'product_id', 'jumlah', 'subtotal_harga'];

    /**
     * Relasi banyak ke satu (many to one)
     * Transaksi ini termasuk dalam satu order
     */
    public function order() {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    /**
     * Relasi banyak ke satu (many to one)
     * Transaksi ini terkait dengan satu produk
     */
    public function product() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
