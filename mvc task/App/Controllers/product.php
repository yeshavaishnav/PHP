<?php

namespace App\Controllers;

use Core\View;
use \App\Models\Database;

class Show
{
    public function showProduct()
    {
        $category = $_GET['category'];
        $header = Database::getAll('categories');
        $footer = Database::getAll('cms_pages');
        $products = Database::getAll('products', "WHERE category = '" . $category . "'");
        View::renderTemplate('showproducts.html', ['header' => $header, 'products' => $products, 'footer' => $footer]);
    }
    public function showCategories()
    {
        $category = $_GET['category'];
        $header = Database::getAll('categories');
        $footer = Database::getAll('cms_pages');
        $categories = Database::getAll('categories', "WHERE parent = '" . $category . "'");
        echo $categories;
       // View::renderTemplate('showproducts.html', ['header' => $header, 'products' => $products, 'footer' => $footer]);
    }
}