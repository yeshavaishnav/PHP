<?php

namespace App\Controllers;

use \Core\View;

class Home{

    function index()
    {
        View::render('index.html');
    }
}


?>
