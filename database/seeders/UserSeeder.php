<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test 1  ',
            'email' => 'test@prueba.com',
        ]);
        User::factory()->create([
            'name' => 'Test 2',
            'email' => 'neuquen@prueba.com',
        ]);
        User::factory()->create([
            'name' => 'Test 3',
            'email' => 'argentina@prueba.com',
        ]);
        User::factory()->create([
            'name' => 'Test 4',
            'email' => 'EEUU@prueba.com',
        ]);
        User::factory()->create([
            'name' => 'Test 5',
            'email' => 'EUROPA@prueba.com',
        ]);


    }
}
