<?php

require_once 'vendor/autoload.php';
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\MainController;
use App\Http\Helpers\ImageHelper;
use Models\Order;
use Models\Product;
use Models\User;

new DashboardController;
new OrdersController;
new MainController;
new ImageHelper;
new Order;
new Product;
new User;



