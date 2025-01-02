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
            'product_description' => 'LEAVE YOUR PHONE IN YOUR POCKET: Apple Watch SE GPS Model lets you call, text, and get directions from your wrist, while leaving your phone in your pocket. It offers multiple connectivity options, including: Bluetooth, Wi-Fi, and NFC to suit your needs, whatever they might be.',
            'available_quantity' => 50,
            'price' =>3000,
            'product_Image' => '1.jpg',
        ]);
        Db::table('products')->insert([
            'store_id' => 1,
            'product_name' => 'Apple iPad',
            'product_description' => '(10th Generation): with A14 Bionic chip, 10.9-inch Liquid Retina Display, 64GB, Wi-Fi 6, 12MP front/12MP Back Camera, Touch ID, All-Day Battery Life',
            'available_quantity' => 55,
            'price' =>5000,
            'product_Image' => '2.jpg',
        ]);
        Db::table('products')->insert([
            'store_id' => 1,
            'product_name' => '15 ProMax Smartphone',
            'product_description' => '6+256GB Unlocked Phone, Android 13.0, 48+108MP Zoom Camera, Mobile Phone with Build-in Pen,Long Battery Life 6800mAh, Dual SIM, 6.7“ HD Screen,5G/4G Phone (Blue Titanium)',
            'available_quantity' => 44,
            'price' =>4500,
            'product_Image' => '3.jpg',
        ]);
        Db::table('products')->insert([
            'store_id' => 1,
            'product_name' => 'INIU Portable Charger',
            'product_description' => '22.5W 20000mAh USB C in & Out Power Bank Fast Charging, PD 3.0+QC 4.0 LED Display Phone Battery Pack Compatible with iPhone 16 15 14 13 Pro Samsung S23 Google iPad Tablet, etc',
            'available_quantity' => 35,
            'price' =>2000,
            'product_Image' => '4.jpg',
        ]);
        Db::table('products')->insert([
            'store_id' => 1,
            'product_name' => 'Apple Laptop',
            'product_description' => 'Ninth-generation 6-Core Intel Core i7 Processor Stunning 16-inch Retina Display with True Tone technology Touch Bar and Touch ID Amd Radeon Pro 5300M Graphics with GDDR6 memory Ultrafast SSD',
            'available_quantity' => 20,
            'price' =>10000,
            'product_Image' => '5.jpg',
        ]);


        // store 2
        Db::table('products')->insert([
            'store_id' => 2,
            'product_name' => 'Coffee Latte',
            'product_description' => 'creamy drink made with espresso and steamed milk, topped with a small amount of milk foam',
            'available_quantity' => 14,
            'price' =>1000,
            'product_Image' => '1.jpg',
        ]);
        Db::table('products')->insert([
            'store_id' => 2,
            'product_name' => 'Cappuccino',
            'product_description' => 'A cappuccino is a coffee drink made with equal parts espresso, steamed milk, and milk foam. It has a rich, bold flavor with a creamy texture and a frothy, light top, offering a balanced taste between the strong espresso and smooth milk.',
            'available_quantity' => 25,
            'price' =>1500,
            'product_Image' => '2.jpg',
        ]);
        Db::table('products')->insert([
            'store_id' => 2,
            'product_name' => 'Hot Chocolate',
            'product_description' => 'Hot chocolate is a warm, sweet beverage made from melted chocolate or cocoa powder, mixed with milk or water. It has a rich, creamy texture and a comforting, chocolaty flavor, often topped with whipped cream or marshmallows.',
            'available_quantity' => 20,
            'price' =>2000,
            'product_Image' => '3.jpg',
        ]);
        Db::table('products')->insert([
            'store_id' => 2,
            'product_name' => 'Milk shake',
            'product_description' => 'A milkshake is a creamy, sweet beverage made by blending milk, ice cream, and often flavored syrups or fruits. It is typically thick and smooth, enjoyed as a refreshing treat or dessert. Milkshakes can be customized with various toppings like whipped cream, sprinkles, or chocolate chips.',
            'available_quantity' => 12,
            'price' =>1200,
            'product_Image' => '4.jpg',
        ]);
        Db::table('products')->insert([
            'store_id' => 2,
            'product_name' => 'Ice Coffee',
            'product_description' => "Iced coffee is a chilled coffee beverage made by brewing coffee and then cooling it down with ice. It's typically served sweetened and can be enhanced with milk, cream, or flavored syrups for added taste. It's a refreshing, cool alternative to hot coffee, perfect for warm weather.",
            'available_quantity' => 15,
            'price' =>1400,
            'product_Image' => '5.jpg',
        ]);
        Db::table('products')->insert([
            'store_id' => 2,
            'product_name' => 'Turkish Coffee',
            'product_description' => 'Turkish coffee is a traditional coffee made by boiling finely ground coffee beans with water and sugar in a special pot called a cezve. It is served in small cups without filtering, resulting in a rich, thick, and intense flavor. Often accompanied by a glass of water and sometimes Turkish delight, it is enjoyed slowly, offering a unique and cultural coffee experience.',
            'available_quantity' => 10,
            'price' =>2200,
            'product_Image' => '6.jpg',
        ]);

        // store 3
        Db::table('products')->insert([
            'store_id' => 3,
            'product_name' => 'Burger',
            'product_description' => 'A burger is a popular sandwich consisting of a cooked patty, typically made from ground beef, placed between two buns. It is often topped with a variety of ingredients such as lettuce, tomato, cheese, onions, pickles, and condiments like ketchup, mustard, or mayonnaise. Burgers are widely enjoyed as a fast-food item or casual meal.',
            'available_quantity' => 22,
            'price' =>3000,
            'product_Image' => '1.jpg',
        ]);
        Db::table('products')->insert([
            'store_id' => 3,
            'product_name' => 'Fries',
            'product_description' => 'Fries, or French fries, are thinly sliced potatoes that are deep-fried until crispy and golden. Often served as a side dish or snack, they are commonly seasoned with salt and can be paired with various dips like ketchup, mayo, or cheese. They are a popular fast-food item worldwide.',
            'available_quantity' => 25,
            'price' =>2500,
            'product_Image' => '2.jpg',
        ]);
        Db::table('products')->insert([
            'store_id' => 3,
            'product_name' => 'Broasted Chicken',
            'product_description' => 'Broasted chicken is a style of fried chicken that is pressure-cooked in a special broasting machine, combining frying and steaming. This method results in chicken that is crispy on the outside and tender on the inside. It is often seasoned with a blend of spices and served with sides like fries or salad.',
            'available_quantity' => 11,
            'price' =>2200,
            'product_Image' => '3.jpg',
        ]);
        Db::table('products')->insert([
            'store_id' => 3,
            'product_name' => 'Tacos',
            'product_description' => 'Tacos are a traditional Mexican dish consisting of a soft or crunchy tortilla filled with various ingredients such as seasoned meat, seafood, beans, cheese, lettuce, tomatoes, and salsa. They are often topped with fresh cilantro, onions, and lime, offering a delicious combination of flavors and textures.',
            'available_quantity' => 10,
            'price' =>1500,
            'product_Image' => '4.jpg',
        ]);
        Db::table('products')->insert([
            'store_id' => 3,
            'product_name' => 'Pizza',
            'product_description' => 'Pizza is a popular dish made with a round, flat dough base topped with tomato sauce, cheese, and various toppings such as meats, vegetables, and herbs. It is baked until the crust is golden and the cheese is melted, resulting in a flavorful and customizable meal enjoyed worldwide.',
            'available_quantity' => 16,
            'price' =>3000,
            'product_Image' => '5.jpg',
        ]);
        Db::table('products')->insert([
            'store_id' => 3,
            'product_name' => 'chicken nuggets',
            'product_description' => 'Chicken nuggets are bite-sized pieces of chicken, typically coated in a seasoned breading and deep-fried until crispy. They are often served with dipping sauces like ketchup, BBQ, or honey mustard and are a popular snack or fast-food item.',
            'available_quantity' => 12,
            'price' =>2300,
            'product_Image' => '6.jpg',
        ]);
        
        // store 4
        Db::table('products')->insert([
            'store_id' => 4,
            'product_name' => 'Pullovers',
            'product_description' => "Cold weather's no match for great fits. Stay warm in seasonal essentials from our collection.",
            'available_quantity' => 20,
            'price' =>3000,
            'product_Image' => '1.jpg',
        ]);
        Db::table('products')->insert([
            'store_id' => 4,
            'product_name' => 'jacket',
            'product_description' => "Women's Fur-Trimmed Brow Jacket With Suit Collar",
            'available_quantity' => 33,
            'price' =>4000,
            'product_Image' => '2.jpg',
        ]);
        Db::table('products')->insert([
            'store_id' => 4,
            'product_name' => 'Trench Coat',
            'product_description' => 'Long sleeve trench coat with a classic design and a water-repellent finish.',
            'available_quantity' => 15,
            'price' =>5000,
            'product_Image' => '3.jpg',
        ]);
        Db::table('products')->insert([
            'store_id' => 4,
            'product_name' => 'Winter Coat',
            'product_description' => 'Relaxiva Lapel Neck Double Breasted Overcoat',
            'available_quantity' => 25,
            'price' =>6000,
            'product_Image' => '4.jpg',
        ]);
        Db::table('products')->insert([
            'store_id' => 4,
            'product_name' => 'Hopo bag',
            'product_description' => 'Funky and fashionable bag with a unique design.',
            'available_quantity' => 30,
            'price' =>2000,
            'product_Image' => '5.jpg',
        ]);
        Db::table('products')->insert([
            'store_id' => 4,
            'product_name' => 'Block boot',
            'product_description' => "New Arrival Women's Pointed Toe Chunky Heel Booties With Elasticity, Fashionable Black Ankle Boots Shorts",
            'available_quantity' => 20,
            'price' =>3000,
            'product_Image' => '6.jpg',
        ]);


    }
}
