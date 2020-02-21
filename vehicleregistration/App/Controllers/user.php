<?php

namespace App\Controllers;

session_start();
use \App\Models\Database;
use \Core\View;

class User
{
    public function login()
    {
        View::render('login.html');
    }
    public function userLogin()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $result = Database::getAll('users', "WHERE email = '" . $email . "'");
        $_SESSION['user_id'] = $result[0]['user_id'];
        if ($email == $result[0]['email'] && $password == $result[0]['password']) {
            $res = Database::getAll('service_registration', "WHERE user_id = '" . $result[0]['user_id'] . "'");
            View::renderTemplate('\userDashboard.html', ['res' => $res]);
        }
    }
    public function register()
    {
        View::render('register.html');
    }
    public function userRegister()
    {
        $params = [];
        $values = [];
        foreach ($_POST['user'] as $key => $value) {
            array_push($params, $key);
            array_push($values, "'" . $value . "'");
        }
        $params = implode(',', $params);
        $values = implode(',', $values);
        
        $id = Database::insertdata('users', $params, $values);
        $params = [];
        $values = [];
        foreach ($_POST['address'] as $key => $value) {
            array_push($params, $key);
            array_push($values, "'" . $value . "'");
        }
        array_push($params, 'user_id');
        array_push($values, $id);
        $params = implode(',', $params);
        $values = implode(',', $values);
        Database::insertdata('user_address', $params, $values);
        User::login();
    }
    public function serviceRegister()
    {
        View::renderTemplate('\serviceRegister.html');
    }
    public function registerService()
    {
        $params = [];
        $values = [];

      
        foreach ($_POST['service'] as $key => $value) {
            array_push($params, $key);
            array_push($values, "'" . $value . "'");
        }
        array_push($params, 'user_id');
        array_push($values, $_SESSION['user_id']);
        $params = implode(',', $params);
        $values = implode(',', $values);

        $checkVehicle = Database::getAll('service_registration', "WHERE vehicleNo = " . $_POST['service']['vehicleNo']);
        $date = $_POST['service']['date'];
        $today = date('d:m:Y',time());
        
       
        $result = Database::getAll('service_registration', "WHERE date = " . $date . " AND timeslot = " . $_POST['service']['timeslot']);
        
        $checkLicense = Database::getAll('service_registration', "WHERE licenseNo = " . $_POST['service']['licenseNo']);
        if ($checkVehicle) {
            View::renderTemplate('/serviceRegister.html', ['error' => 'Vehicle Number must be unique']);
        } else if ($checkLicense) {
            View::renderTemplate('/serviceRegister.html', ['error' => 'License Number must be unique']);

        } else if (count($result)>=3) {
            View::renderTemplate('/serviceRegister.html', ['error' => 'Timeslot Unavailable']);
        }
        else if($date < $today)
        {
            View::renderTemplate('/serviceRegister.html', ['error' => 'You cannot enter past dates']);

        } else {
            Database::insertdata('service_registration', $params, $values);

            $res = Database::getAll('service_registration', "WHERE user_id = '" . $_SESSION['user_id'] . "'");
            View::renderTemplate('\userDashboard.html', ['res' => $res]);
        }

    }
}
