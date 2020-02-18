<?php

namespace App\Controllers;

use Core\View;
use \App\Models\Database;

class Show
{
    public function showProduct()
    {
        $category = $_GET['category'];
        $header = Database::getDistinct('categories','parent');
        $footer = Database::getAll('cms_pages');
        $products = Database::getAll('products', "WHERE category = '" . $category . "'");
        View::renderTemplate('showproducts.html', ['header' => $header, 'products' => $products, 'footer' => $footer]);
    }
    public function showCategories()
    {
        $category = $_GET['category'];
        $header = Database::getDistinct('categories','parent');
        $footer = Database::getAll('cms_pages');
        $categories = Database::getAll('categories', "WHERE parent = '" . $category . "'");
        View::renderTemplate('showCategories.html', ['header' => $header, 'categories' => $categories, 'footer' => $footer]);
    }
    public function product()
    {
        $product = $_GET['product'];
        $header = Database::getDistinct('categories','parent');
        $footer = Database::getAll('cms_pages');
        $products = Database::getAll('products', "WHERE productName = '" . $product . "'");
        View::renderTemplate('productDisplay.html', ['header' => $header, 'products' => $products, 'footer' => $footer]);
    }
}
