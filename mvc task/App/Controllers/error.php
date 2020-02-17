<?php

namespace App\Controllers;

use \Core\View;

class Error
{
    function display()
    {
        View::render('error.html');
    }
}

?>