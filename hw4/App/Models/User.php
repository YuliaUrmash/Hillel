<?php

namespace App\Models;
class User
{
    public function __construct()
    {
        echo get_class($this);
    }
}