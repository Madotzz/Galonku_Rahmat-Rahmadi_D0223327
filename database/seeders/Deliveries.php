<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Deliveries extends Seeder
{
    public function run(): void
    {
        DB::table('deliveries')->insert([
            [
                'order_id' => 1,
                'kurir_id' => 2, // Kurir Satu
                'status' => 'on_the_way',
                'created_at' => now(), 'updated_at' => now(),
            ]
        ]);
    }
}
