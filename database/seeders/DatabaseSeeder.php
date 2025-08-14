<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Categories;
use App\Models\Currencies;
use App\Models\Expenses;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Categories::factory()->count(3)->create();
        Currencies::factory()->count(3)->create();
        Expenses::factory()->count(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
