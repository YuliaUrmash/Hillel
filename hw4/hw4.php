<?php

/**
 * @throws Exception
 */
function myAutoLoader($className)
{
    $directory = '/' . str_replace('\\', '/', $className);
    $fileName = __DIR__ . $directory . '.php';
    if (file_exists($fileName)) {
        require_once $fileName;
    } else {
        throw new Exception('file' . $className . 'does not exist');
    }
}

spl_autoload_register('myAutoLoader');

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\MainController;
use App\Http\Helpers\ImageHelper;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

try {
    new DashboardController();
    new OrdersController();
    new MainController();
    new ImageHelper();
    new Order();
    new Product();
    new User();
} catch (Exception $exception) {
    echo $exception->getMessage();
}


