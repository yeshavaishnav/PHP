<?php

namespace Core;

abstract class Model
{
    protected static function getDB()
    {
        static $db = null;

        if ($db == null) {
            $host = "localhost";
            $dbname = "mvc";
            $username = "root";
            $password = "";

            try
            {
                $db = new \PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                return $db;
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }

    }
}
