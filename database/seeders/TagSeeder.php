<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TagSeeder extends Seeder
{
    public $tags = [
        "Healthy Snacks",
        "Quick Meals",
        "Seasonal Recipes",
        "Vegetarian",
        "Vegan",
        "Gluten-Free",
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach($this->tags as $tag) {
            Tag::factory()->create(['name' => $tag]);
        }
    }
}
