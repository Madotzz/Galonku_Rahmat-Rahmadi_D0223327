<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Delivery extends Model
{
    use HasFactory;
    protected $table = 'deliveries';
    protected $fillable = ['order_id', 'kurir_id', 'status'];

    /**
     * Relasi banyak ke satu (many to one)
     * Pengiriman ini terkait dengan satu order
     */
    public function order() {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    /**
     * Relasi banyak ke satu (many to one)
     * Pengiriman ini dilakukan oleh satu user (sebagai kurir)
     */
    public function kurir() {
        return $this->belongsTo(User::class, 'kurir_id');
    }
}
