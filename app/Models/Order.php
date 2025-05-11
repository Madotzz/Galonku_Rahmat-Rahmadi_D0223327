<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = ['user_id', 'address', 'total_harga', 'status'];

    /**
     * Relasi banyak ke satu (many to one)
     * Order ini dimiliki oleh satu user (customer)
     */
    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function transactions() {
        return $this->hasMany(Transaction::class, 'order_id', 'id');
    }

    public function delivery() {
        return $this->hasOne(Delivery::class, 'order_id', 'id');
    }
    /**
     * Relasi many-to-many dengan model Product melalui tabel pivot 'transactions'
     * Menyertakan kolom tambahan dari tabel pivot seperti 'jumlah' dan 'subtotal_harga'
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'transactions')
            ->withPivot('jumlah', 'subtotal_harga')
            ->withTimestamps();
    }
}
