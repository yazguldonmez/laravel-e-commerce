<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\About;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        About::create([
            'title' => 'How We Started',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius repellat, dicta at laboriosam, nemo exercitationem itaque eveniet architecto cumque, deleniti commodi molestias repellendus quos sequi hic fugiat asperiores illum. Atque, in, fuga excepturi corrupti error corporis aliquam unde nostrum quas.

Accusantium dolor ratione maiores est deleniti nihil? Dignissimos est, sunt nulla illum autem in, quibusdam cumque recusandae, laudantium minima repellendus.',
            'text_1_icon' => 'icon-truck',
            'text_1_title' => 'Free Shipping',
            'text_1_content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer accumsan tincidunt fringilla.',
            'text_2_icon' => 'icon-refresh2',
            'text_2_title' => 'Free Returns',
            'text_2_content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer accumsan tincidunt fringilla.',
            'text_3_icon' => 'icon-help',
            'text_3_title' => 'Customer Support',
            'text_3_content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer accumsan tincidunt fringilla.'
        ]);
    }
}
