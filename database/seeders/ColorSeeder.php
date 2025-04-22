<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{

    public function run(): void
    {
        Color::factory()->create([
            'name' => 'Red',
        ]);
        Color::factory()->create([
            'name' => 'Black',
        ]);
        Color::factory()->create([
            'name' => 'Gray',
        ]);
        Color::factory()->create([
            'name' => 'Yellow',
        ]);
        Color::factory()->create([
            'name' => 'Purple',
        ]);
        Color::factory()->create([
            'name' => 'Blue',
        ]);
    }
}
