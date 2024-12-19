<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Page;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([
            PageSeeder::class,
            CategorySeeder::class,
            TagSeeder::class,
        ]);

        // Link categories and tags to the page created
        $page = Page::first();
        $page->categories()->sync( Category::take(2)->pluck('id')->toArray() );
        $page->tags()->sync( Tag::take(2)->pluck('id')->toArray() );
    }
}
