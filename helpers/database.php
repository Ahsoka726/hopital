<?php
require_once (__DIR__ . '/../config/constants.php');
class Database
{

    public static function getInstance()
    {

        $pdo = new PDO(DATABASE_NAME, DATABASE_USER, DATABASE_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

        return $pdo;
    }
}
