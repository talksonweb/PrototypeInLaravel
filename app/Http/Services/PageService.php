<?php

namespace App\Http\Services;

class PageService
{
    public function __construct(
        protected $title,
        protected $body,
        protected $categories,
        protected $tags)
    { }

    public function getContent()
    {
        $response = "Title: {$this->title} <br /> Body: {$this->title} <br />";
        
        foreach ($this->categories as $category) {
            $response .= $category->getName();
        }

        foreach ($this->tags as $tag) {
            $response .= $tag->getName();
        }

        return $response;
    }
}