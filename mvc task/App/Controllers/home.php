<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\Database;
class Home{

    function index()
    {
        $header = Database::getAll('categories');
        $footer = Database::getAll('cms_pages');
        $content = Database::getAll('cms_pages',"WHERE urlKey = 'homepage'");
        View::renderTemplate('cms/page.html',['header'=>$header,'content'=>$content,'footer'=>$footer]);
        //View::render('index.html');
        
    }
}
?>
