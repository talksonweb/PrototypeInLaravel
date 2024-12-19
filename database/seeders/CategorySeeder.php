<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    protected $categories = [
        "Recipes",
        "Cuisines",
        "Healthy Eating",
        "Drinks & Beverages",
        "Restaurant Guides"
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->categories as $category) {
            Category::factory()->create(['name' => $category]);
        }
    }
}
