<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SiteSetting;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SiteSetting::create([
            'title' => 'address',
            'data' => '203 Fake St. Mountain View, San Francisco, California, USA',
        ]);


        SiteSetting::create([
            'title' => 'phone',
            'data' => '+2 392 3929 210',
        ]);


        SiteSetting::create([
            'title' => 'email',
            'data' => 'test@domain.com',
        ]);

        SiteSetting::create([
            'title' => 'map',
            'data' => null,
        ]);
    }
}
