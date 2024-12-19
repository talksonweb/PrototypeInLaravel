<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    /** @use HasFactory<\Database\Factories\PageFactory> */
    use HasFactory;

    public function categories()
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
    
    public function replicate(?array $except = null)
    {
        $page = parent::replicate();
        $page->save();

        $this->categories()->each(function ($category) use($page) {
            $page->categories()->attach( $category );
        });

        $this->tags()->each(function ($tag) use($page) {
            $page->tags()->attach( $tag );
        }); 

        return $page;
    }

}
