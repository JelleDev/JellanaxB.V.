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
            ->query("SELECT * FROM `tbl_clients` WHERE `client_id` = $id")
            ->fetch(PDO::FETCH_ASSOC);
        return $clientData;
    }

    public function modifyClient($id, $clientInfo){
        $sql = "UPDATE `tbl_clients`
                SET `companyname` = :companyname,
                `adress1` = :adress1,
                `zipcode1` = :zipcode1,
                `residence1` = :residence1,
                `adress2` = :adress2,
                `zipcode2` = :zipcode2,
                `residence2` = :residence2,
                `initials` = :initials,
                `contactperson` = :contactperson,
                `phonenumber1` = :phonenumber1,
                `phonenumber2` = :phonenumber2,
                `emailadress` = :emailadress
                WHERE `client_id` = :client_id
            ";

        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':companyname', $clientInfo['companyname']);
        $stmt->bindParam(':adress1', $clientInfo['adress1']);
        $stmt->bindParam(':zipcode1', $clientInfo['zipcode1']);
        $stmt->bindParam(':residence1', $clientInfo['residence1']);
        $stmt->bindParam(':adress2', $clientInfo['adress2']);
        $stmt->bindParam(':zipcode2', $clientInfo['zipcode2']);
        $stmt->bindParam(':residence2', $clientInfo['residence2']);
        $stmt->bindParam(':initials', $clientInfo['initials']);
        $stmt->bindParam(':contactperson', $clientInfo['contactperson']);
        $stmt->bindParam(':phonenumber1', $clientInfo['phonenumber1']);
        $stmt->bindParam(':phonenumber2', $clientInfo['phonenumber2']);
        $stmt->bindParam(':emailadress', $clientInfo['emailadress']);
        $stmt->bindParam(':client_id', $id);
        $stmt->execute();

        header('location: ' . BASE_URL . '/public/customer.php?id=' . $id);
        exit;
    }
}