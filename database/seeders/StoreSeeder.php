<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Db::table('stores')->insert([
            'store_name' => 'store1',
            'store_description' => 'des1',
            'store_Image' => 'im1',
        ]);
        Db::table('stores')->insert([
            'store_name' => 'store2',
            'store_description' => 'des2',
            'store_Image' => 'im2',
        ]);
        Db::table('stores')->insert([
            'store_name' => 'store2',
            'store_description' => 'des22',
            'store_Image' => 'im3',
        ]);
    }
}
