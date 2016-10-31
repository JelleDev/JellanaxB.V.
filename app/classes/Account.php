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
}