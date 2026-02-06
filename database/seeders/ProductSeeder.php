<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::insert([
        [
            'name' => 'Laptop',
            'price' => 50000,
            'category_id' => 1,
            'description' => 'High performance laptop',
            'image' => 'laptop.jpg'
        ],
        [
            'name' => 'Smartphone',
            'price' => 30000,
            'category_id' => 1,
            'description' => 'Latest smartphone',
            'image' => 'phone.jpg'
        ],
        [
            'name' => 'T-Shirt',
            'price' => 999,
            'category_id' => 2,
            'description' => 'Cotton T-shirt',
            'image' => 'tshirt.jpg'
        ],
        [
            'name' => 'Anxious People',
            'price' => 589,
            'category_id' => 3,
            'description' => 'Novel by Fredrik Backman',
            'image' => 'book1.jpg'
        ],
        [
            'name' => 'IKIGAI',
            'price' => 939,
            'category_id' => 3,
            'description' => 'Japanese Secret to a Long and Happy Life',
            'image' => 'book2.jpg'
        ],
        [
            'name' => 'Vacuum Cleaner',
            'price' => 9999,
            'category_id' => 4,
            'description' => 'Vacuum Cleaner with 1200 Watts Powerful Suction Control',
            'image' => 'cleaner.jpg'
        ],
        [
            'name' => 'Electric Multicooker',
            'price' => 999,
            'category_id' => 4,
            'description' => 'Wattage: 600 Watts | Capacity: 1.2L',
            'image' => 'cooker.jpg'
        ],
        [
            'name' => 'Earbuds',
            'price' => 3999,
            'category_id' => 1,
            'description' => 'TWS Ear Buds Wireless Earphones with mic',
            'image' => 'earbuds.jpg'
        ],
        [
    'name' => 'Gaming Mouse',
    'price' => 2499,
    'category_id' => 1,
    'description' => 'RGB Gaming Mouse with 16000 DPI',
    'image' => 'mouse.jpg'
],
[
    'name' => 'Wireless Keyboard',
    'price' => 3499,
    'category_id' => 1,
    'description' => 'Slim Wireless Keyboard with long battery life',
    'image' => 'keyboard.jpg'
],
[
    'name' => 'Men Jeans',
    'price' => 1999,
    'category_id' => 2,
    'description' => 'Regular fit denim jeans',
    'image' => 'jeans.jpg'
],
[
    'name' => 'Women Kurti',
    'price' => 1499,
    'category_id' => 2,
    'description' => 'Cotton printed kurti',
    'image' => 'kurti.jpg'
],
[
    'name' => 'Atomic Habits',
    'price' => 699,
    'category_id' => 3,
    'description' => 'An Easy & Proven Way to Build Good Habits',
    'image' => 'book3.jpg'
],
[
    'name' => 'Rich Dad Poor Dad',
    'price' => 499,
    'category_id' => 3,
    'description' => 'Personal finance book by Robert Kiyosaki',
    'image' => 'book4.jpg'
],
[
    'name' => 'Air Fryer',
    'price' => 11999,
    'category_id' => 4,
    'description' => 'Oil-free air fryer with digital display',
    'image' => 'airfryer.jpg'
],
[
    'name' => 'Mixer Grinder',
    'price' => 5499,
    'category_id' => 4,
    'description' => '750W mixer grinder with 3 jars',
    'image' => 'mixer.jpg'
],
[
    'name' => 'Running Shoes',
    'price' => 3999,
    'category_id' => 5,
    'description' => 'Lightweight running shoes for men',
    'image' => 'shoes.jpg'
],
[
    'name' => 'Cricket Bat',
    'price' => 5999,
    'category_id' => 5,
    'description' => 'English willow cricket bat',
    'image' => 'bat.jpg'
],
[
    'name' => 'Face Wash',
    'price' => 299,
    'category_id' => 6,
    'description' => 'Gentle face wash for daily use',
    'image' => 'facewash.jpg'
],
[
    'name' => 'Perfume',
    'price' => 2499,
    'category_id' => 6,
    'description' => 'Long-lasting fragrance perfume',
    'image' => 'perfume.jpg'
],
[
    'name' => 'Remote Control Car',
    'price' => 1999,
    'category_id' => 7,
    'description' => 'Rechargeable RC toy car for kids',
    'image' => 'toycar.jpg'
],
[
    'name' => 'Building Blocks Set',
    'price' => 1499,
    'category_id' => 7,
    'description' => 'Creative building blocks for kids',
    'image' => 'blocks.jpg'
],
        ]);
    }
}
