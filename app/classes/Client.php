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
        $sql = "SELECT * FROM `tbl_clients` WHERE `client_id` = :id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function addClient($clientInfo){
        $sql = "INSERT INTO `tbl_clients` 
                (`companyname`, `adress1`, `zipcode1`, `residence1`, `adress2`,
                `zipcode2`, `residence2`, `initials`, `contactperson`, `phonenumber1`,
                `phonenumber2`, `emailadress`, `bank_account_number`, `ledger_account_number`, `payment_limit`)
                VALUES (:companyname, :adress1, :zipcode1, :residence1, :adress2, :zipcode2,
                :residence2, :initials, :contactperson, :phonenumber1, :phonenumber2, :emailadress,
                :bankaccountnumber, :ledgeraccountnumber, :limit)";

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
        $stmt->bindParam(':bankaccountnumber', $clientInfo['bank_account_number']);
        $stmt->bindParam(':ledgeraccountnumber', $clientInfo['ledger_account_number']);
        $stmt->bindParam(':limit', $clientInfo['payment_limit']);
        $stmt->execute();

        header('location: ' . BASE_URL . '/public/customers.php');
        exit;
    }

    public function modifyClient($id, $clientInfo, $role){
        if($role == 'admin'){
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
                `emailadress` = :emailadress,
                `bank_account_number` = :bankaccountnumber,
                `ledger_account_number` = :ledgeraccountnumber,
                `payment_limit` = :limit,
                `creditworthy` = :creditworthy
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
            $stmt->bindParam(':bankaccountnumber', $clientInfo['bank_account_number']);
            $stmt->bindParam(':ledgeraccountnumber', $clientInfo['ledger_account_number']);
            $stmt->bindParam(':limit', $clientInfo['payment_limit']);
            $stmt->bindParam(':creditworthy', $clientInfo['creditworthy']);
            $stmt->bindParam(':client_id', $id);
            $stmt->execute();
        }

        if($role == 'sales'){
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
                `emailadress` = :emailadress,
                `bank_account_number` = :bankaccountnumber,
                `ledger_account_number` = :ledgeraccountnumber,
                `payment_limit` = :limit
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
            $stmt->bindParam(':bankaccountnumber', $clientInfo['bank_account_number']);
            $stmt->bindParam(':ledgeraccountnumber', $clientInfo['ledger_account_number']);
            $stmt->bindParam(':limit', $clientInfo['payment_limit']);
            $stmt->bindParam(':client_id', $id);
            $stmt->execute();
        }

        if($role == 'finance'){
            $sql = "UPDATE `tbl_clients`
                SET `creditworthy` = :creditworthy
                WHERE `client_id` = :client_id
            ";

            $stmt = $this->db->pdo->prepare($sql);
            $stmt->bindParam(':creditworthy', $clientInfo['creditworthy']);
            $stmt->bindParam(':client_id', $id);
            $stmt->execute();
        }

        header('location: ' . BASE_URL . '/public/customer.php?id=' . $id);
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
}