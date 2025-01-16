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

        //stor 1
        Db::table('products')->insert([
            'store_id' => 1,
            'product_name' => 'Apple Watch',
            'product_description' => 'LEAVE YOUR PHONE IN YOUR POCKET: Apple Watch SE GPS Model lets you call, text, and get directions from your wrist. ',
            'available_quantity' => 50,
            'price' =>3000,
            'product_Image' => 'public/images/store1/1.png',
        ]);
        Db::table('products')->insert([
            'store_id' => 1,
            'product_name' => 'Apple iPad',
            'product_description' => '(10th Generation): with A14 Bionic chip, 10.9-inch Liquid Retina Display, 64GB, Wi-Fi 6, 12MP front/12MP Back Camera, Touch ID, All-Day Battery Life',
            'available_quantity' => 55,
            'price' =>5000,
            'product_Image' => 'public/images/store1/2.png',
        ]);
        Db::table('products')->insert([
            'store_id' => 1,
            'product_name' => '15 ProMax Smartphone',
            'product_description' => '6+256GB Unlocked Phone, Android 13.0, 48+108MP Zoom Camera, Mobile Phone with Build-in Pen,Long Battery Life 6800mAh, Dual SIM, 6.7“ HD Screen.',
            'available_quantity' => 44,
            'price' =>4500,
            'product_Image' => 'public/images/store1/3.png',
        ]);
        Db::table('products')->insert([
            'store_id' => 1,
            'product_name' => 'INIU Portable Charger',
            'product_description' => '22.5W 20000mAh USB C in & Out Power Bank Fast Charging, PD 3.0+QC 4.0 LED Display Phone Battery Pack Compatible.',
            'available_quantity' => 35,
            'price' =>2000,
            'product_Image' => 'public/images/store1/4.png',
        ]);
        Db::table('products')->insert([
            'store_id' => 1,
            'product_name' => 'Apple Laptop',
            'product_description' => 'Ninth-generation 6-Core Intel Core i7 Processor Stunning 16-inch Retina Display.',
            'available_quantity' => 20,
            'price' =>10000,
            'product_Image' => 'public/images/store1/5.png',
        ]);


        // store2
        Db::table('products')->insert([
            'store_id' => 2,
            'product_name' => 'Coffee Latte',
            'product_description' => 'creamy drink made with espresso and steamed milk, topped with a small amount of milk foam',
            'available_quantity' => 14,
            'price' =>1000,
            'product_Image' => 'public/images/store2/1.png',
        ]);
        Db::table('products')->insert([
            'store_id' => 2,
            'product_name' => 'Cappuccino',
            'product_description' => 'A cappuccino is a coffee drink made with equal parts espresso, steamed milk, and milk foam. It has a rich, bold flavor with a creamy texture and a frothy.',
            'available_quantity' => 25,
            'price' =>1500,
            'product_Image' => 'public/images/store2/2.png',
        ]);
        Db::table('products')->insert([
            'store_id' => 2,
            'product_name' => 'Hot Chocolate',
            'product_description' => 'Hot chocolate is a warm, sweet beverage made from melted chocolate or cocoa powder.',
            'available_quantity' => 20,
            'price' =>2000,
            'product_Image' => 'public/images/store2/3.png',
        ]);
        Db::table('products')->insert([
            'store_id' => 2,
            'product_name' => 'Milk shake',
            'product_description' => 'A milkshake is a creamy, sweet beverage made by blending milk, ice cream, and often flavored syrups or fruits. Milkshakes can be customized with various toppings.',
            'available_quantity' => 12,
            'price' =>1200,
            'product_Image' => 'public/images/store2/4.png',
        ]);
        Db::table('products')->insert([
            'store_id' => 2,
            'product_name' => 'Ice Coffee',
            'product_description' => "Iced coffee is a chilled coffee beverage made by brewing coffee and then cooling it down with ice.",
            'available_quantity' => 15,
            'price' =>1400,
            'product_Image' => 'public/images/store2/5.png',
        ]);
        Db::table('products')->insert([
            'store_id' => 2,
            'product_name' => 'Turkish Coffee',
            'product_description' => 'Turkish coffee is a traditional coffee made by boiling finely ground coffee beans with water and sugar in a special pot called a cezve.',
            'available_quantity' => 10,
            'price' =>2200,
            'product_Image' => 'public/images/store2/6.jpg',
        ]);

        // store3
        Db::table('products')->insert([
            'store_id' => 3,
            'product_name' => 'Burger',
            'product_description' => 'A burger is a popular sandwich consisting of a cooked patty, typically made from ground beef.',
            'available_quantity' => 22,
            'price' =>3000,
            'product_Image' => 'public/images/store3/1.png',
        ]);
        Db::table('products')->insert([
            'store_id' => 3,
            'product_name' => 'Fries',
            'product_description' => 'Fries, or French fries, are thinly sliced potatoes that are deep-fried until crispy and golden. Often served as a side dish or snack.',
            'available_quantity' => 25,
            'price' =>2500,
            'product_Image' => 'public/images/store3/2.png',
        ]);
        Db::table('products')->insert([
            'store_id' => 3,
            'product_name' => 'Broasted Chicken',
            'product_description' => 'Broasted chicken is a style of fried chicken that is pressure-cooked in a special broasting machine, combining frying and steaming.',
            'available_quantity' => 11,
            'price' =>2200,
            'product_Image' => 'public/images/store3/3.png',
        ]);
        Db::table('products')->insert([
            'store_id' => 3,
            'product_name' => 'Tacos',
            'product_description' => 'Tacos are a traditional Mexican dish consisting of a soft or crunchy tortilla filled with various ingredients such as seasoned meat, seafood, beans, cheese, lettuce, tomatoes, and salsa.',
            'available_quantity' => 10,
            'price' =>1500,
            'product_Image' => 'public/images/store3/4.png',
        ]);
        Db::table('products')->insert([
            'store_id' => 3,
            'product_name' => 'Pizza',
            'product_description' => 'Pizza is a popular dish made with a round, flat dough base topped with tomato sauce, cheese, and various toppings such as meats, vegetables, and herbs.',
            'available_quantity' => 16,
            'price' =>3000,
            'product_Image' => 'public/images/store3/5.png',
        ]);
        Db::table('products')->insert([
            'store_id' => 3,
            'product_name' => 'chicken nuggets',
            'product_description' => 'Chicken nuggets are bite-sized pieces of chicken, typically coated in a seasoned breading and deep-fried until crispy. They are often served with dipping sauces like ketchup.',
            'available_quantity' => 12,
            'price' =>2300,
            'product_Image' => 'public/images/store3/6.png',
        ]);
        
        // store4
        Db::table('products')->insert([
            'store_id' => 4,
            'product_name' => 'Pullovers',
            'product_description' => "Cold weather's no match for great fits. Stay warm in seasonal essentials from our collection.",
            'available_quantity' => 20,
            'price' =>3000,
            'product_Image' => 'public/images/store4/1.png',
        ]);
        Db::table('products')->insert([
            'store_id' => 4,
            'product_name' => 'jacket',
            'product_description' => "Women's Fur-Trimmed Brow Jacket With Suit Collar",
            'available_quantity' => 33,
            'price' =>4000,
            'product_Image' => 'public/images/store4/2.png',
        ]);
        Db::table('products')->insert([
            'store_id' => 4,
            'product_name' => 'Trench Coat',
            'product_description' => 'Long sleeve trench coat with a classic design and a water-repellent finish.',
            'available_quantity' => 15,
            'price' =>5000,
            'product_Image' => 'public/images/store4/3.png',
        ]);
        Db::table('products')->insert([
            'store_id' => 4,
            'product_name' => 'Winter Coat',
            'product_description' => 'Relaxiva Lapel Neck Double Breasted Overcoat',
            'available_quantity' => 25,
            'price' =>6000,
            'product_Image' => 'public/images/store4/4.png',
        ]);
        Db::table('products')->insert([
            'store_id' => 4,
            'product_name' => 'Hopo bag',
            'product_description' => 'Funky and fashionable bag with a unique design.',
            'available_quantity' => 30,
            'price' =>2000,
            'product_Image' => 'public/images/store4/5.png',
        ]);
        Db::table('products')->insert([
            'store_id' => 4,
            'product_name' => 'Block boot',
            'product_description' => "New Arrival Women's Pointed Toe Chunky Heel Booties With Elasticity, Fashionable Black Ankle Boots Shorts",
            'available_quantity' => 20,
            'price' =>3000,
            'product_Image' => 'public/images/store4/6.png',
        ]);


    }
}
