<?php

namespace App\Controllers;

use \App\Models\Database;
use \Core\View;

session_start();
class Admin extends \Core\Controller
{
    public function index()
    {
        View::render('index.html');
    }
    public function login()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if ($username == 'admin' && $password == 'admin123') {
            View::render('dashboard.html');
        }
    }
    public function products()
    {
        $product = Database::getAll('products');
        View::renderTemplate('product.html', ['products' => $product]);
    }
    public function categories()
    {
        $category = Database::getAll('categories');
        View::renderTemplate('category.html', ['category' => $category]);
    }
    public function cmsPages()
    {
        $cms = Database::getAll('cms_pages');
        View::renderTemplate('cms.html', ['cms' => $cms]);
    }
    public function addProduct()
    {
        $category = Database::getAll('categories');
        View::renderTemplate('addProduct.html',['categories'=>$category]);
    }
    public function addCategory()
    {
        View::renderTemplate('addCategory.html');
    }
    public function addcms()
    {
        View::renderTemplate('addCMS.html');
    }
    public function insertcms()
    {
        $params = array('pageTitle', 'urlKey', 'status', 'content');
        $values = array();
        foreach ($params as $item) {
            array_push($values, "'" . $_POST[$item] . "'");
        }
        $params = implode(',', $params);
        $values = implode(',', $values);
        Database::insertData('cms_pages', $params, $values);
        header('Location:cmspages');
    }
    public function insertCategory()
    {
        $params = array('categoryName', 'urlKey', 'image', 'status', 'description', 'parent');
        $values = array();
        foreach ($params as $item) {
            $val = $_POST[$item];

            if (is_array($val)) {
                $val = implode(',', $val);
            }
            array_push($values, "'" . $val . "'");
        }
        $params = implode(',', $params);
        $values = implode(',', $values);
        $category_id = Database::insertData('categories', $params, $values);

        header('Location:categories');
    }
    public function insertProduct()
    {
        $params = array('productName', 'category', 'SKU', 'urlKey', 'image', 'status', 'description', 'shortDescription', 'price', 'stock');
        $values = array();
        foreach ($params as $item) {
            $val = $_POST[$item];

            if (is_array($val)) {
                $val = implode(',', $val);
            }
            array_push($values, "'" . $val . "'");
        }

        $params = implode(',', $params);
        $values = implode(',', $values);
        $product_id = Database::insertData('products', $params, $values);
        
       header('Location:products');
    }
    public function editc()
    {
        $_SESSION['category_id'] = $_GET['id'];
        $category = Database::getAll('categories', 'WHERE id = ' . $_GET['id']);
        View::renderTemplate('editCategory.html', ['category' => $category]);
    }
    public function editCategory()
    {
        $params = array('categoryName', 'urlKey', 'image', 'status', 'description', 'parent');
        $values = array();
        foreach ($params as $item) {
            array_push($values, "'" . $_POST[$item] . "'");
        }
        $preparedString = array();
        foreach ($params as $key => $value) {
            $str = $params[$key] . " = " . $values[$key];
            array_push($preparedString, $str);
        }
        $timestamp = date('d:m:Y H:i:s', time());
        array_push($preparedString, "updatedAt = '" . $timestamp . "'");
        $preparedString = implode(',', $preparedString);
        Database::updateData('categories', $preparedString, $_SESSION['category_id']);

        header('Location:categories');
    }
    public function deletec()
    {
        $id = $_GET['id'];
        Database::deleteData('categories', $id);
        header('Location: categories');
    }
    public function editp()
    {
        $_SESSION['product_id'] = $_GET['id'];
        $category = Database::getAll('categories');
        $product = Database::getAll('products', 'WHERE id = ' . $_GET['id']);
        View::renderTemplate('editProduct.html', ['product' => $product, 'categories'=>$category]);
    }
    public function editProduct()
    {
        $params = array('productName', 'category', 'SKU', 'urlKey', 'image', 'status', 'description', 'shortDescription', 'price', 'stock');
        $values = array();
        foreach ($params as $item) {
            $val = $_POST[$item];
            if (is_array($val)) {
                $val = implode(',', $val);
            }
            array_push($values, "'" . $val . "'");
        }
        $preparedString = array();
        foreach ($params as $key => $value) {
            $val = $values[$key];
            $str = $params[$key] . " = " . $values[$key];
            array_push($preparedString, $str);
        }
        $timestamp = date('d:m:Y H:i:s', time());
        array_push($preparedString, "updatedAt = '" . $timestamp . "'");
        $preparedString = implode(',', $preparedString);
        Database::updateData('products', $preparedString, $_SESSION['product_id']);
        header('Location:products');
    }
    public function deletep()
    {
        $id = $_GET['id'];
        Database::deleteData('products', $id);
        header('Location: products');
    }
    public function editcms()
    {
        $_SESSION['cms_id'] = $_GET['id'];
        $cms = Database::getAll('cms_pages', 'WHERE id = ' . $_SESSION['cms_id']);
        View::renderTemplate('editCMS.html', ['cms' => $cms]);
    }
    public function editcmspage()
    {
        $params = array('pageTitle', 'urlKey', 'status', 'content');
        $values = array();
        foreach ($params as $item) {
            array_push($values, "'" . $_POST[$item] . "'");
        }
        $preparedString = array();
        foreach ($params as $key => $value) {
            $str = $params[$key] . " = " . $values[$key];
            array_push($preparedString, $str);
        }
        $timestamp = date('d:m:Y H:i:s', time());
        array_push($preparedString, "updatedAt = '" . $timestamp . "'");
        $preparedString = implode(',', $preparedString);
        Database::updateData('cms_pages', $preparedString, $_SESSION['cms_id']);
        header('Location:cmspages');
    }
    public function deletecms()
    {
        $id = $_GET['id'];
        Database::deleteData('cms_pages', $id);
        header('Location: cmspages');
    }

}
