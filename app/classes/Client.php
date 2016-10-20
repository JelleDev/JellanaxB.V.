<?php

/**
 * Created by PhpStorm.
 * User: Jelle
 * Date: 20-10-2016
 * Time: 11:02
 */
class Client
{
    private $db;

    public function __construct(){
        $this->db = Database::getInstance();
    }

    public function getAllClients(){
        $clientData = $this->db->pdo
            ->query("SELECT * FROM `tbl_clients`")
            ->fetchAll(PDO::FETCH_ASSOC);
        return $clientData;
    }

    public function getClient($id){
        $clientData = $this->db->pdo
            ->query("SELECT * FROM `tbl_clients` WHERE `id` = $id")
            ->fetch(PDO::FETCH_ASSOC);
        return $clientData;
    }
}