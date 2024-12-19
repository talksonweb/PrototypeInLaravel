<?php

namespace App\Http\Services;

class TagService
{
    public function __construct(protected $name)
    { }

    public function getName()
    {
        return "<br />Name: {$this->name}";
    }
}