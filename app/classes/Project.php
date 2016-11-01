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
            ->query("SELECT tbl_projects.`project_id`, tbl_projects.`projectname`, tbl_clients.`companyname`,
                            tbl_projects.`project_subject`, tbl_projects.`deadline`
                    FROM `tbl_clients`
                    INNER JOIN `tbl_projects`
                    ON tbl_clients.`client_id` =  tbl_projects.`client_id`")
            ->fetchAll(PDO::FETCH_ASSOC);
        return $clientData;
    }

    public function getProjectInfo($id){
        $clientData = $this->db->pdo
            ->query("SELECT tbl_clients.`companyname`, tbl_projects.*
                    FROM `tbl_projects`
                    INNER JOIN `tbl_clients`
                    ON tbl_clients.`client_id` = tbl_projects.`client_id`
                    WHERE tbl_projects.`project_id` = $id")
            ->fetch(PDO::FETCH_ASSOC);
        return $clientData;
    }

    public function getCompanyName(){
        $clientData = $this->db->pdo
            ->query("SELECT `client_id`, `companyname` FROM `tbl_clients` ORDER BY `companyname` ASC")
            ->fetchAll(PDO::FETCH_ASSOC);
        return $clientData;
    }

    public function addProject($projectInfo){
        $finished = 0;

        $sql = "INSERT INTO `tbl_projects`
                (`client_id`, `projectname`, `project_subject`, 
                `finished`, `deadline`, `maintenance_contract`, 
                `hardware`, `operating_system`, `application`, `offernumber`, `offerstatus`)
                VALUES (:client_id, :projectname, :project_subject,
                :finished, :deadline, :maintenance_contract,
                :hardware, :operating_system, :application, :offernumber, :offerstatus)";

        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':client_id', $projectInfo['Client_id']);
        $stmt->bindParam(':projectname', $projectInfo['Projectname']);
        $stmt->bindParam(':project_subject', $projectInfo['Subject']);
        $stmt->bindParam(':finished', $finished);
        $stmt->bindParam(':deadline', $projectInfo['Deadline']);
        $stmt->bindParam(':maintenance_contract', $projectInfo['Maintenencecontract']);
        $stmt->bindParam(':hardware', $projectInfo['InputHardware']);
        $stmt->bindParam(':operating_system', $projectInfo['Operating-system']);
        $stmt->bindParam(':application', $projectInfo['Application']);
        $stmt->bindParam(':offernumber', $projectInfo['Offernumber']);
        $stmt->bindParam(':offerstatus', $projectInfo['Offerstatus']);
        $stmt->execute();
    }

    public function modifyProject($projectInfo){
    }
}