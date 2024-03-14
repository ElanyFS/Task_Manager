<?php

namespace app\Models\Database;

use PDO;

class Connection{
    public static function connect(){
        $pdo = new PDO("mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']}", "{$_ENV['DB_NAME']}", "{$_ENV['DB_PASSWORD']}");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

        return $pdo;
    }
}