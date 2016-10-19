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
        $_SESSION['department_id'] = $account['department_id'];
        header('location: ' . BASE_URL . '/app/router.php');
        exit;
    }

    public function logout(){
        if(isset($_SESSION)){
            session_destroy();
        }
    }

    public function isLoggedIn(){
        if($this->logged){
            return true;
        }
        return false;
    }

    public function redirect($path, $message){
        header('location: ' . BASE_URL . '/public/' . $path . '?' . $message);
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