<?php

/**
 * Created by PhpStorm.
 * User: Jelle
 * Date: 3-11-2016
 * Time: 12:33
 */
class Invoice
{
    private $db;

    public function __construct(){
        $this->db = Database::getInstance();
    }

    public function getAllInvoices(){
        $invoiceData = $this->db->pdo
            ->query("SELECT tbl_invoices.*, 
                    tbl_clients.`client_id`, tbl_clients.`companyname`,
                    tbl_projects.`projectname`
                     FROM `tbl_projects`
                     INNER JOIN `tbl_clients`
                     ON tbl_clients.`client_id` = tbl_projects.`client_id`
                     INNER JOIN `tbl_invoices`
                     ON tbl_invoices.`project_id` = tbl_projects.`project_id`
                     WHERE tbl_invoices.`paid` = 0;
                     ORDER BY tbl_clients.`companyname`, tbl_projects.`projectname`,
                     tbl_invoices.`invoice_nr`
                     ")
            ->fetchAll(PDO::FETCH_ASSOC);

        return $invoiceData;
    }

    public function getInvoice($invoice_id){
        $sql = "SELECT tbl_invoices.*,
                tbl_clients.`client_id`, tbl_clients.`companyname`,
                tbl_projects.`projectname`
                FROM `tbl_projects`
                INNER JOIN `tbl_clients`
                ON tbl_clients.`client_id` = tbl_projects.`client_id`
                INNER JOIN `tbl_invoices`
                ON tbl_invoices.`project_id` = tbl_projects.`project_id`
                WHERE tbl_invoices.`invoice_id` = :id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':id', $invoice_id);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function addInvoice($invoiceInfo){
        $sql = "INSERT INTO `tbl_invoices`
                (`project_id`, `invoice_nr`, `explanation`, `price`, `tax_code`)
                VALUES (:project_id, :invoice_nr, :explanation, :price, :tax_code)";

        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':project_id', $invoiceInfo['project_id']);
        $stmt->bindParam(':invoice_nr', $invoiceInfo['invoice_nr']);
        $stmt->bindParam(':explanation', $invoiceInfo['explanation']);
        $stmt->bindParam(':price', $invoiceInfo['price']);
        $stmt->bindParam(':tax_code', $invoiceInfo['tax_code']);
        $stmt->execute();

        header('location: ' . BASE_URL . '/public/invoices.php');
        exit;
    }

    public function modifyInvoice($invoice_id, $invoiceInfo){
        $sql = "UPDATE `tbl_invoices`
                SET `project_id` = :project_id, `invoice_nr` = :invoicenr,
                `explanation` = :explanation, `price` = :price,
                `tax_code` = :tax_code
                WHERE `invoice_id` = :invoice_id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':project_id', $invoiceInfo['project_id']);
        $stmt->bindParam(':invoicenr', $invoiceInfo['invoice_nr']);
        $stmt->bindParam(':explanation', $invoiceInfo['explanation']);
        $stmt->bindParam(':price', $invoiceInfo['price']);
        $stmt->bindParam(':tax_code', $invoiceInfo['tax_code']);
        $stmt->bindParam(':invoice_id', $invoice_id);
        $stmt->execute();

        header('location: ' . BASE_URL . '/public/invoice.php?id=' . $invoice_id);
        exit;
    }

    public function setPaid($invoice_id){
        $sql = "UPDATE `tbl_invoices`
                SET `paid` = 1
                WHERE `invoice_id` = :invoice_id";

        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':invoice_id', $invoice_id);
        $stmt->execute();
    }
}