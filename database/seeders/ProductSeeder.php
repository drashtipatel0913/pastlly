<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 20; $i++) {
            $category = Category::all()->random();
            Product::create([
                'name' => fake()->word(),
                'slug' => 'SLUG-' . $i,
                'details' => fake()->sentence(),
                'product_code' => $category->category_code . '00' . $i,
                'price' => rand(500, 999),
                'isAvailable' => fake()->boolean(90),
            ])->categories()->attach($category);
        }
    }
}
