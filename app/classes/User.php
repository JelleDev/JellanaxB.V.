<?php

/**
 * Created by PhpStorm.
 * User: Jelle
 * Date: 18-10-2016
 * Time: 09:34
 */
class User
{
    private $db;
    private $username;
    private $password;
    private $role;

    public function __construct() {
        $this->db = Database::getInstance();

    }
}