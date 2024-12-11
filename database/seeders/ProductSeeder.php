<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Db::table('products')->insert([
            'store_id' => 1,
            'product_name' => 'product1',
            'product_description' => 'desproduct1',
            'available_quantity' => 50,
            'price' =>500,
            'product_Image' => 'image1.jpg',
        ]);
        Db::table('products')->insert([
            'store_id' => 1,
            'product_name' => 'product2',
            'product_description' => 'desproduct2',
            'available_quantity' => 55,
            'price' =>5000,
            'product_Image' => 'image2.jpg',
        ]);
        Db::table('products')->insert([
            'store_id' => 2,
            'product_name' => 'product2',
            'product_description' => 'desproduct2',
            'available_quantity' => 44,
            'price' =>5600,
            'product_Image' => 'image2.jpg',
        ]);
        Db::table('products')->insert([
            'store_id' => 1,
            'product_name' => 'product3',
            'product_description' => 'desproduct3',
            'available_quantity' => 12,
            'price' =>6000,
            'product_Image' => 'image1.jpg',
        ]);

    }
}
