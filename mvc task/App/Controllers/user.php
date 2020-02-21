<?php

namespace App\Controllers;

use \App\Models\Database;
use \Core\View;
session_start();

class User
{
    public function index()
    {
        View::render('userLogin.html');
    }
    public function login()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $result = Database::getAll('user',"WHERE email = '".$email."'");
        if($email == $result[0]['email'] && $password == $result[0]['password'])
        {
          $obj = new Page();
          $obj->display('homepage');
          $_SESSION['user_id'] = $result[0]['id'];
            
        }
    }
    public function register()
    {
        View::render('register.html');
    }
    public function registerUser()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $params = "name,email,password";
        $values = "'$name','$email','$password'";
        $user_id = Database::insertData('user',$params,$values);
        $obj = new Page();
          $obj->display('homepage');
          $_SESSION['user_id'] = $user_id;
          $_SESSION['user'] = $name;
    }
    public function logout()
    {
        session_destroy();
        User::index();
    }
}