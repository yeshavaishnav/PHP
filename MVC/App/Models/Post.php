<?php

namespace App\Models;

use PDO;

class Post extends \Core\Model
{
    public static function getAll($condition = "")
    {

        try
        {
            $db = static::getDB();
            $stmt = $db->query("SELECT id, title, content FROM posts $condition");
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

    }
    public static function insertData($values)
    {
        try
        {
            $db = static::getDB();
            $stmt = $db->query("SELECT * FROM posts $condition");
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (!$result) {
                $stmt = "ALTER TABLE posts AUTO_INCREMENT = 1";
                $db->exec($stmt);
            }

            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = "INSERT INTO posts (title,content) VALUES (" . $values . ")";
            $db->exec($stmt);

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public static function deleteData($id)
    {
        try
        {
            $db = static::getDB();
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = "DELETE FROM posts where id = " . $id;
            $db->exec($stmt);

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public static function updateData($id, $title, $content)
    {
        try
        {
            $db = static::getDB();
            $stmt = "UPDATE posts SET title = '$title', content = '$content' WHERE id = $id";
            $db->exec($stmt);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
