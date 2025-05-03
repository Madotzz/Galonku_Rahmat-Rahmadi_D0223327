<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderDetails extends Seeder
{
    public function run(): void
    {
        DB::table('order_details')->insert([
            [
                'order_id' => 1,
                'product_id' => 1,
                'jumlah' => 2,
                'subtotal_harga' => 40000,
                'created_at' => now(), 'updated_at' => now(),
            ]
        ]);
    }
}
