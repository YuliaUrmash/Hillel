<?php

namespace Models;
class Product
{
    public function __construct()
    {
        echo get_class($this).'</br>';
    }
}