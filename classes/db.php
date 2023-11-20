<?php
namespace app\classes;
use PDO;

class db {
    public function connectToTestDb()
    {
        try {
            $pdo = new PDO('mysql:host=127.0.0.1;dbname=test;', 'root', '');
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        }
        catch (\PDOException $e) {
            echo $e->getMessage();
            die();
        }

    }
}