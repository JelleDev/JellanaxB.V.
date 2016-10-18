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
    private $role;
    public $logged;

    public function __construct() {
        $this->db = Database::getInstance();
        $this->logged = false;
    }

    public function login($account){
        $_SESSION['uid'] = $account['uid'];
        $_SESSION['departmentid'] = $account['departmentid'];
        header('location: ' . BASE_URL . '/app/router.php');
        exit;
    }

    public function redirect($path, $message){
        header('location: ' . BASE_URL . '/public/' . $path . '?=' . $message);
    }

    public function logout(){
        if(isset($_SESSION)){
            session_destroy();
        }
    }

    /*
     * GETTERS AND SETTERS
     * */

    public function setUsername($username){
        $this->username = $username;
    }

    public function setRole($role){
        $this->role = $role;
    }

    public function getRole(){
        return $this->role;
    }
}