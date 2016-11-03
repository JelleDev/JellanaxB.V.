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
                     ")
            ->fetchAll(PDO::FETCH_ASSOC);

        return $invoiceData;
    }
}