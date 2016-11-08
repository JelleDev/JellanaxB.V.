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

    public function getCreditBalance($client_id){
        $sql = "SELECT tbl_clients.`payment_limit`, SUM(tbl_invoices.`price`) AS total
                FROM `tbl_projects`
                INNER JOIN `tbl_clients`
                ON tbl_clients.`client_id` = tbl_projects.`client_id`
                INNER JOIN `tbl_invoices`
                ON tbl_invoices.`project_id` = tbl_projects.`project_id`
                WHERE tbl_clients.`client_id` = :id AND tbl_invoices.`paid` = 0";

        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':id', $client_id);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function calculateCreditBalance($client_id){
        $creditInfo = $this->getCreditBalance($client_id);

        $paymentLimit = $creditInfo['payment_limit'];
        $total = $creditInfo['total'];

        $creditBalance = $paymentLimit - $total;

        return $creditBalance;
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

    public function canEditClient(){
        if($this->getRole() == 'sales' && $this->logged){
            return true;
        }
        return false;

    }

    public function canModifyCreditworthy(){
        if($this->getRole() == 'finance' && $this->logged){
            return true;
        }
        return false;
    }

    public function canAccesAll(){
        if($this->getRole() == 'admin' && $this->logged){
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