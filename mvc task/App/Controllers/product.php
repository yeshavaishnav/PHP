<?php

namespace App\Controllers;

use Core\View;
use \App\Models\Database;

class Product
{
    public function showProduct()
    {
        $category = $_GET['category'];
        $header = Database::getAll('categories');
        $footer = Database::getAll('cms_pages');
        $products = Database::getAll('products', "WHERE category = '" . $category . "'");
        View::renderTemplate('showproducts.html', ['header' => $header, 'products' => $products, 'footer' => $footer]);
    }
}
