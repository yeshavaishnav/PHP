<?php

namespace App\Controllers;
session_start();
use \App\Models\Database;
use \Core\View;

class Admin
{
    public function index()
    {
        $registration = Database::getAll('service_registration');
        View::renderTemplate('adminDashboard.html', ['registration' => $registration]);
    }

    public function status()
    {
        $id = $_GET['id'];
        $preparedString = "status = 'Approved'";
        Database::updateData('service_registration',$preparedString,"WHERE service_id = ".$id);
        $registration = Database::getAll('service_registration');
        View::renderTemplate('adminDashboard.html', ['registration' => $registration]);
    }
    public function edit()
    {
        $id = $_GET['id'];
        $_SESSION['service_id'] = $id;
        $result = Database::getAll('service_registration',"WHERE service_id = $id");
        View::renderTemplate('editUser.html',['result'=>$result]);
    }
    function editUser()
    {
        $preparedString = [];
        
        foreach ($_POST['service'] as $key => $value) {
            array_push($preparedString, $key." = '".$value."'");
          
        }
        $preparedString = implode(',',$preparedString);
         Database::updateData('service_registration',$preparedString,"WHERE service_id = ".$_SESSION['service_id']);
         $registration = Database::getAll('service_registration');
        View::renderTemplate('adminDashboard.html', ['registration' => $registration]);

    }
}

