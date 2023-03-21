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
        for ($i = 1; $i <= 5; $i++) {
            Category::create([
                'name' => fake()->word(),
                'slug' => 'C-00' . $i,
                'category_code' => 'CAT-' . $i,
                'isAvailable' => fake()->boolean(90),
            ]);
        }
    }
}
