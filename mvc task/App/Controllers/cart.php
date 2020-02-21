<?php

namespace App\Controllers;

session_start();
use \App\Models\Database;

class Cart
{

    public function addtocart()
    {
        $id = $_GET['id'];
        $data = Database::getAll('products', "WHERE id = $id");
        if (!$_SESSION['cart']) {
            $_SESSION['cart'] = array();
        }

        array_push($_SESSION['cart'], $data);
        $params = "user_id,product_id";
        $values = "'" . $_SESSION['user_id'] . "','" . $id . "'";
        Database::insertdata('cart', $params, $values);

        $params = "user_id,productName,price,quantity";
        $values = "'" . $_SESSION['user_id'] . "','" . $data[0]['productName'] . "','" . $data[0]['price'] . "','1'";
        $id = Database::insertdata('orders', $params, $values);
        $data = Database::getAll('orders',"WHERE id = ".$id);
        echo json_encode($data);

    }
    public function displayCart()
    {

        $data = Database::getAll('orders', "WHERE user_id = " . $_SESSION['user_id']);
        echo json_encode($data);

    }
    public function deleteItem()
    {
       $id =  $_GET['id'];
        Database::deleteData('orders',$id);
        header('Location:/show/showproduct?category='.$_SESSION["category"]);

    }
    public function deleteCart()
    {
        Database::deleteData('orders','1  OR 1 = 1');
        header('Location:/show/showproduct?category='.$_SESSION["category"]);

    }


}
