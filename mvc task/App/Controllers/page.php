<?php
namespace App\Controllers;
use Core\View;
use \App\Models\Database;
class Page 
{
    function display($url)
    {
        $header = Database::getAll('categories');
        $footer = Database::getAll('cms_pages');
        $data = Database::getAll('cms_pages',"WHERE urlKey = '".$url."'");
        if($data)
        {
        View::renderTemplate('cms\page.html',['header'=>$header,'content'=>$data,'footer'=>$footer]);
        return true;
        }
        else
        {
            return false;
        }
    }

}

?>