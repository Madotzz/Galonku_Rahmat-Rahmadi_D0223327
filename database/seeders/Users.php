<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Users extends Seeder
{
    public function run(): void
    {
        DB::table('userss')->insert([
            [
                'name' => 'Admin Galon',
                'email' => 'admin@galonku.test',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'name' => 'Kurir Satu',
                'email' => 'kurir1@galonku.test',
                'password' => Hash::make('kurir123'),
                'role' => 'kurir',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'name' => 'Customer Biasa',
                'email' => 'customer1@galonku.test',
                'password' => Hash::make('customer123'),
                'role' => 'customer',
                'created_at' => now(), 'updated_at' => now(),
            ],
        ]);
    }
}
