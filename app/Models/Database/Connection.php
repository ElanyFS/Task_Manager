<?php

namespace app\Models\Database;

use PDO;
use PDOException;

class Connection
{
    public static function connect()
    {
        try {
            // mysql:host=localhost;dbname=task_manager", "root", "root"
            $pdo = new PDO("mysql:host=localhost;dbname=task_manager", "root", "root");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

            return $pdo;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
