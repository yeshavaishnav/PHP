<?php

namespace App\Controllers;

use Core\View;
use \App\Models\Database;
session_start();

class Show
{
    public function showProduct()
    {
        $category = $_GET['category'];
        $_SESSION['category'] = $category;
        $header = Database::getDistinct('categories', 'parent');
        $footer = Database::getAll('cms_pages');
        $products = Database::getAll('products', "WHERE category = '" . $category . "'");
        $categories = Database::getAll('categories');
        
        View::renderTemplate('showproducts.html', ['header' => $header, 'products' => $products, 'footer' => $footer, 'categories' => $categories]);
    }
    public function product()
    {
        $product = $_GET['product'];
        $header = Database::getDistinct('categories', 'parent');
        $footer = Database::getAll('cms_pages');
        $products = Database::getAll('products', "WHERE productName = '" . $product . "'");
        $categories = Database::getAll('categories');
        View::renderTemplate('productDisplay.html', ['header' => $header, 'products' => $products, 'footer' => $footer,'categories'=>$categories]);
    }
}
