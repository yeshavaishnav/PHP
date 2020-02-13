<?php

namespace App\Controllers;

session_start();

use App\Models\Post;
use \Core\View;

class Posts extends \Core\Controller
{
    public function index()
    {
        $posts = Post::getAll();

        View::renderTemplate('Posts/index.html', ['posts' => $posts]);
    }
    public function add()
    {
        View::render('form.html');
    }
    public function insert()
    {

        $valueArray = array("'" . $_POST['title'] . "'", "'" . $_POST['content'] . "'");
        $values = implode(',', $valueArray);
        Post::insertData($values);
        header('Location: index');
    }
    public function delete()
    {
        $id = $_GET['id'];
        Post::deleteData($id);
        header('Location: /posts/index');
    }
    public function edit()
    {
        $_SESSION['id'] = $_GET['id'];
        $posts = Post::getAll('WHERE id = ' . $_GET['id']);
        View::renderTemplate('edit.html', ['posts' => $posts]);

    }
    public function update()
    {
        Post::updateData($_SESSION['id'], $_POST['title'], $_POST['content']);
        header('Location: /posts/index');
    }

}
