<?php

namespace App\Controllers;

use \App\Models\Database;
use \Core\View;

class Home
{

    public function index()
    {
        $header = Database::getDistinct('categories','parent');
        $footer = Database::getAll('cms_pages');
        $content = Database::getAll('cms_pages', "WHERE urlKey = 'homepage'");
        View::renderTemplate('cms/page.html', ['header' => $header, 'content' => $content, 'footer' => $footer]);
        //View::render('index.html');

    }
}
