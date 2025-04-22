<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Category::factory()->create(
            [
                'name' => 'Notebook',
            ]
        );

        Category::factory()->create(
            [
                'name' => 'Smartphone',
            ]
        );

        Category::factory()->create(
            [
                'name' => 'Tablets',
            ]
        );

        Category::factory()->create(
            [
                'name' => 'Desktops',
            ]
        );

        Category::factory()->create(
            [
                'name' => 'Monitors',
            ]
        );
    }
}
