<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Db::table('order_items')->insert([
            'order_id' => 1,
            'product_id' => 1,
            'quantity' => 2,
            'price' => 1000,
        ]);
        Db::table('order_items')->insert([
            'order_id' => 1,
            'product_id' => 2,
            'quantity' => 1,
            'price' => 5000,
        ]);
        Db::table('order_items')->insert([
            'order_id' => 2,
            'product_id' => 3,
            'quantity' => 1,
            'price' => 5600,
        ]);
        Db::table('order_items')->insert([
            'order_id' => 3,
            'product_id' => 3,
            'quantity' => 4,
            'price' => 22400,
        ]);
        Db::table('order_items')->insert([
            'order_id' => 3,
            'product_id' => 4,
            'quantity' => 2,
            'price' => 12000,
        ]);
    }
}
