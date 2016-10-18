<?php

/**
 * Created by PhpStorm.
 * User: Jelle
 * Date: 18-10-2016
 * Time: 09:39
 */
class Database
{
    private static $instance = Null;
    public $pdo;

    private function __construct() {
        $this->pdo = new PDO("mysql:host=localhost;dbname=barroc-it", "root", "" );
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance(){
        if(is_null(self::$instance)){
            self::$instance = new Database();
        }
        return self::$instance;
    }
}