<?php

namespace App\Controllers;

class Post extends \Core\Controller
{
    public function display()
    {
        echo "Hello from Post/display";
    }
    public function index()
    {
        echo "Query String parameters : ";
        print_r($_GET);
    }
    public function edit()
    {
        echo "Route Parameters : ";
        print_r($this->route_params);
    }
}
