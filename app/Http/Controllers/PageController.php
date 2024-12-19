<?php

namespace App\Http\Controllers;

use App\Http\Services\CategoryService;
use App\Http\Services\PageService;
use App\Http\Services\TagService;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $categories[] = new CategoryService('category example one - 1');
        $categories[] = new CategoryService('category example one - 2');
        $categories[] = new CategoryService('category example one - 3');
        
        $tags[] = new TagService('tag example one - 1');
        $tags[] = new TagService('tag example one - 2');
        $tags[] = new TagService('tag example one - 3');

        $page = new PageService('some title', 'some content', $categories, $tags);

        $pageClone = clone $page;

        echo $pageClone->getContent();
    }
}
