<?php
namespace App\Controllers;

use Core\View;
use \App\Models\Database;

class Page
{
    public function display($url)
    {
        $header = Database::getDistinct('categories', 'parent');
        $footer = Database::getAll('cms_pages');
        $data = Database::getAll('cms_pages', "WHERE urlKey = '" . $url . "'");
        if ($data) {
            if ($data[0]['status'] == 'available') {
                View::renderTemplate('cms\page.html', ['header' => $header, 'content' => $data, 'footer' => $footer]);
                return true;
            } else {
                return false;
            }

        } else {
            return false;
        }
    }

}
