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

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public static function updateData($tableName, $preparedString, $id)
    {
        try
        {
            $db = static::getDB();
            $stmt = "UPDATE $tableName SET $preparedString WHERE id = $id";
            $db->exec($stmt);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public static function deleteData($tableName, $id)
    {
        try
        {
            $db = static::getDB();
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = "DELETE FROM $tableName WHERE id = " . $id;
            $db->exec($stmt);

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
