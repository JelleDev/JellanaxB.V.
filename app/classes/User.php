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

    public function login($uid){
        $_SESSION['uid'] = $uid;
        header('location: ' . BASE_URL . '/public/customers.php');
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
        exit;
    }

    public function canModifyCustomer(){
        if(($this->getRole() == 'sales' || $this->getRole() == 'admin') && $this->logged){
            return true;
        }
        return false;
    }

    public function canAccesUsers(){
        if($this->getRole() == 'admin' && $this->logged){
            return true;
        }
        return false;
    }

    public function canModifyProjects(){
        if(($this->getRole() == 'development' || $this->getRole() == 'admin') && $this->logged){
            return true;
        }
        return false;
    }

    public function canModifyInvoices(){
        if(($this->getRole() == 'finance' || $this->getRole() == 'admin') && $this->logged){
            return true;
        }
        return false;
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