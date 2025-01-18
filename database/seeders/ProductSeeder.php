<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Corater',
            'image' => 'images/shoe_1.jpg',
            'category_id' => 1,
            'short_description'  => 'Finding perfect products',
            'price' => 100,
            'size' => 'Small',
            'color' => 'navy blue',
            'quantity' => 2,
            'status' => '1',
            'content' => '<p>Product is really good.</p>'
        ]);

        Product::create([
            'name' => 'Tank Top',
            'image' => 'images/cloth_1.jpg',
            'category_id' => 4,
            'short_description'  => 'Finding perfect t-shirt',
            'price' => 20,
            'size' => 'medium',
            'color' => 'White',
            'quantity' => 1,
            'status' => '1',
            'content' => '<p>Product is really good.</p>'
        ]);

        Product::create([
            'name' => 'Polo Shirt',
            'image' => 'images/cloth_2.jpg',
            'category_id' => 1,
            'short_description'  => 'Finding perfect t-shirt',
            'price' => 20,
            'size' => 'medium',
            'color' => 'White',
            'quantity' => 1,
            'status' => '1',
            'content' => '<p>Product is really good.</p>'
        ]);

        Product::create([
            'name' => 'T-Shirt Kid',
            'image' => 'images/cloth_3.jpg',
            'category_id' => 7,
            'short_description'  => 'Finding perfect t-shirt',
            'price' => 10,
            'size' => 'small',
            'color' => 'Blue',
            'quantity' => 4,
            'status' => '1',
            'content' => '<p>Product is really good.</p>'
        ]);
    }
}
