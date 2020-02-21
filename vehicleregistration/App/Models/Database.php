<?php

namespace App\Models;

use PDO;

class Database extends \Core\Model
{
    public static function getAll($table, $condition = "")
    {
        try
        {
            $db = static::getDB();
            $stmt = $db->query("SELECT * FROM " . $table . " " . $condition);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public static function getDistinct($table, $param, $condition = "")
    {
        try
        {
            $db = static::getDB();
            $stmt = $db->query("SELECT DISTINCT $param FROM $table " . $condition);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public static function insertData($tableName, $params, $values)
    {
        try
        {
            $db = static::getDB();
            $stmt = $db->query("SELECT * FROM $tableName");
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (!$result) {
                $stmt = "ALTER TABLE $tableName AUTO_INCREMENT = 1";
                $db->exec($stmt);
            }

            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = "INSERT INTO " . $tableName . " (" . $params . ") VALUES (" . $values . ")";
            $db->exec($stmt);
            return $db->lastInsertId();

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public static function updateData($tableName, $preparedString, $condition)
    {
        try
        {
            $db = static::getDB();
            $stmt = "UPDATE $tableName SET $preparedString $condition";
           
            $db->exec($stmt);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public static function deleteData($tableName, $condition)
    {
        try
        {
            $db = static::getDB();
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if ($tableName == 'products_categories') {
                $stmt = "DELETE FROM $tableName $condition";
            } else {
                $stmt = "DELETE FROM $tableName $condition";
            }
            $db->exec($stmt);

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
