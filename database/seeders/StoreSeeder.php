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
            'store_name' => 'Croma',
            'store_description' => 'retail shop that sells electrical appliances, gadgets, and equipment, such as refrigerators, washing machines, televisions, and lighting fixtures.',
            'store_Image' => 'public/images/stores/store1.jpg',
        ]);
        Db::table('stores')->insert([
            'store_name' => 'Coffee Zone',
            'store_description' => 'Coffee Zone is a popular coffee shop or café chain known for offering a variety of coffee beverages, including espresso-based drinks, iced coffees, and specialty brews.',
            'store_Image' => 'public/images/stores/store2.jpg',
        ]);
        Db::table('stores')->insert([
            'store_name' => 'Duchess',
            'store_description' => 'It offers a variety of menu options, ranging from casual meals to fine dining, in a setting designed for comfort and service',
            'store_Image' => 'public/images/stores/store3.jpg',
        ]);
        Db::table('stores')->insert([
            'store_name' => 'Aura',
            'store_description' => ' It offers different styles, sizes, and brands, catering to various fashion preferences and needs.',
            'store_Image' => 'public/images/stores/store4.jpg',
        ]);
    }
}
