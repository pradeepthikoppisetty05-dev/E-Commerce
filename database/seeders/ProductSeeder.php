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
            'category_id' => 2,
            'description' => 'Wattage: 600 Watts | Capacity: 1.2L',
            'image' => 'cooker.jpg'
        ],
        [
            'name' => 'Earbuds',
            'price' => 3999,
            'category_id' => 2,
            'description' => 'TWS Ear Buds Wireless Earphones with mic',
            'image' => 'earbuds.jpg'
        ],
        ]);
    }
}
