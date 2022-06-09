<?php

namespace App\Models;
class Product
{
    public function __construct()
    {
        echo get_class($this);
    }
}