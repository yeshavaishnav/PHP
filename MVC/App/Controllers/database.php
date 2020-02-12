<?php
namespace App\Controllers;
use PDO;
class Database
{
    public function data()
    {
        $host = "localhost";
        $db_name = "mvc";
        $username = "root";
        $password = "";

        $conn = new mysqli($host, $username, $password, $db_name);

        if ($conn->connect_error) {
            echo "Connection failed" . $conn->connect_error;
        } else {
            echo "Connection established succesfully";
        }
    }
}
