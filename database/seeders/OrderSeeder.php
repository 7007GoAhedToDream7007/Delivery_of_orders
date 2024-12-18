<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Db::table('orders')->insert([
            'user_id' => 2,
            'order_date' => '2024-12-05 14:30:45.123',
            'status' => 'pending',
            'total_price' => 6000,
            'address' => 'address1',
        ]);

        Db::table('orders')->insert([
            'user_id' => 2,
            'order_date' => '2024-12-05 14:30:45.123',
            'status' => 'pending',
            'total_price' => 5600,
            'address' => 'address2',
        ]);

        Db::table('orders')->insert([
            'user_id' => 3,
            'order_date' => '2024-12-05 14:30:45.123',
            'status' => 'pending',
            'total_price' => 34400,
            'address' => 'address3',
        ]);
    }
}
