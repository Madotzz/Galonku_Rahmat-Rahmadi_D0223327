<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Products extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            ['name' => 'Aqua 19L', 'stock' => 50, 'harga' => 20000, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Vit 19L', 'stock' => 70, 'harga' => 18000, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Le Minerale 19L', 'stock' => 60, 'harga' => 19000, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
