<?php

namespace App\Controllers;

use \Core\View;

class Error
{
    public function display()
    {
        View::render('error.html');
    }
}
