<?php

namespace Core;

use App\Config;


abstract class Model
{
    protected static function getDB()
    {
        static $db = null;

        if ($db == null) {

            try
            {
                $db = new \PDO("mysql:host=".Config::DB_HOST. ";dbname=".Config::DB_NAME, Config::DB_USER, Config::DB_PASSWORD);
                return $db;
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }

    }
}
