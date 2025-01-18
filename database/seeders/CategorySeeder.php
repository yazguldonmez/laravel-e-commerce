<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $men = Category::create([
            'image' => null,
            'thumbnail' => null,
            'cat_ust' => null,
            'name' => 'Men',
            'content' => "Men's Clothing",
            'status' => '1'
        ]);

        Category::create([
            'image' => null,
            'thumbnail' => null,
            'cat_ust' => $men->id,
            'name' => 'Men Sweaters',
            'content' => 'Sweaters for Men',
            'status' => '1'
        ]);

        Category::create([
            'image' => null,
            'thumbnail' => null,
            'cat_ust' => $men->id,
            'name' => 'Men Trousers',
            'content' => 'Trousers for Men',
            'status' => '1'
        ]);

        $women = Category::create([
            'image' => null,
            'thumbnail' => null,
            'cat_ust' => null,
            'name' => 'Women',
            'content' => "Women's Clothing",
            'status' => '1'
        ]);

        Category::create([
            'image' => null,
            'thumbnail' => null,
            'cat_ust' => $women->id,
            'name' => 'Women Bags',
            'content' => 'Bags for Women',
            'status' => '1'
        ]);

        Category::create([
            'image' => null,
            'thumbnail' => null,
            'cat_ust' => $women->id,
            'name' => 'Women Trousers',
            'content' => 'Trousers for Women',
            'status' => '1'
        ]);

        $kids = Category::create([
            'image' => null,
            'thumbnail' => null,
            'cat_ust' => null,
            'name' => 'Kids',
            'content' => "Kids' Clothing",
            'status' => '1'
        ]);

        Category::create([
            'image' => null,
            'thumbnail' => null,
            'cat_ust' => $kids->id,
            'name' => 'Kids Toys',
            'content' => 'Toys for Kids',
            'status' => '1'
        ]);

        Category::create([
            'image' => null,
            'thumbnail' => null,
            'cat_ust' => $kids->id,
            'name' => 'Kids Trousers',
            'content' => 'Trousers for Kids',
            'status' => '1'
        ]);
    }
}
