<?php

namespace App\Controllers;

use \Core\View;

class Home
{
    public function index()
    {
        //View::render('Home/index.php',
        // ['name'=>'Yesha',
        // 'colors'=>['red','green','blue']]
        // );

        View::renderTemplate('Home/index.html',
            ['name' => 'Yesha',
                'colors' => ['red', 'green', 'blue']]
        );
    }
}
