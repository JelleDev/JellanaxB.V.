<?php

/**
 * Created by PhpStorm.
 * User: Jelle
 * Date: 31-10-2016
 * Time: 09:03
 */
class Account
{
    private $db;

    public function __construct(){
        $this->db = Database::getInstance();
    }

    public function getUserData(){
        $userData = $this->db->pdo
            ->query("SELECT tbl_users.`username`, tbl_departments.`name` AS department
                     FROM `tbl_users`
                     INNER JOIN `tbl_departments`
                     ON tbl_users.`department_id` = tbl_departments.`department_id`")
            ->fetchAll(PDO::FETCH_ASSOC);
        return $userData;
    }

    public function addUser($userData){
        $sql = "INSERT INTO `tbl_users`
                (`username`, `password`, `department_id`, active)
                VALUES (:username, :password, :departmentid, :active)";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':username', $userData['username']);
        $stmt->bindParam(':password', $userData['password']);
        $stmt->bindParam(':departmentid', $userData['departmentid']);
        $stmt->bindParam(':active', $userData['active']);
        $stmt->execute();

        header('location: ' . BASE_URL . '/public/users.php');
        exit;
    }
}