<?php

/**
 * Created by PhpStorm.
 * User: Jelle
 * Date: 24-10-2016
 * Time: 12:00
 */
class Project {
    private $db;

    public function __construct(){
        $this->db = Database::getInstance();
    }

    public function getMainProjectInfo(){
        $clientData = $this->db->pdo
            ->query("SELECT tbl_projects.`projectname`, tbl_clients.`companyname`,
                            tbl_projects.`project_subject`, tbl_projects.`deadline`
                    FROM `tbl_clients`
                    INNER JOIN `tbl_projects`
                    ON tbl_clients.`client_id` =  tbl_projects.`client_id`")
            ->fetchAll(PDO::FETCH_ASSOC);
        return $clientData;
    }
}