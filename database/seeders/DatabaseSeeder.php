<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Size;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Core\Color;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        $this->call([
            UserSeeder::class,
            ColorSeeder::class,
            BrandSeeder::class,
            SizeSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
        ]);


    }
}
