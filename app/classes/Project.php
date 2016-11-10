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
                    ON tbl_clients.`client_id` =  tbl_projects.`client_id`
                    ORDER BY tbl_projects.`deadline`, tbl_clients.`companyname`")
            ->fetchAll(PDO::FETCH_ASSOC);
        return $clientData;
    }

    public function getProjectInfo($id){
        $sql = "SELECT tbl_clients.`companyname`, tbl_projects.*
                    FROM `tbl_projects`
                    INNER JOIN `tbl_clients`
                    ON tbl_clients.`client_id` = tbl_projects.`client_id`
                    WHERE tbl_projects.`project_id` = :id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function getCompanyName(){
        $clientData = $this->db->pdo
            ->query("SELECT `client_id`, `companyname` FROM `tbl_clients` ORDER BY `companyname` ASC")
            ->fetchAll(PDO::FETCH_ASSOC);
        return $clientData;
    }

    public function searchInProjects($searchInput){
        $searchInput = '%' . $searchInput . '%';
        $sql = "SELECT tbl_projects.*, tbl_clients.`companyname`
                FROM `tbl_projects`
                INNER JOIN `tbl_clients`
                ON tbl_clients.`client_id` = tbl_projects.`client_id`
                WHERE tbl_projects.`projectname` LIKE :searchInput
                ORDER BY  tbl_projects.`deadline`, tbl_clients.`companyname`";

        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':searchInput', $searchInput);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getCreditWorthy($client_id){
        $sql = "SELECT `creditworthy`
                FROM `tbl_clients`
                WHERE `client_id` = :client_id";

        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':client_id', $client_id);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_COLUMN);

        return $result;
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

        header('location: ' . BASE_URL . '/public/projects.php');
        exit;
    }

    public function modifyProject($projectInfo, $id){
        $sql = "UPDATE `tbl_projects`
                SET `client_id` = :client_id, `projectname` = :projectname, `project_subject` = :subject,
                    `deadline` = :deadline, `maintenance_contract` = :maintenance,
                    `hardware` = :hardware, `operating_system` = :operatingsystem, `application` = :application,
                    `offernumber` = :offernumber, `offerstatus` = :offerstatus
                WHERE `project_id` = :id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':client_id', $projectInfo['Client_id']);
        $stmt->bindParam(':projectname', $projectInfo['Projectname']);
        $stmt->bindParam(':subject', $projectInfo['Subject']);
        $stmt->bindParam(':deadline', $projectInfo['Deadline']);
        $stmt->bindParam(':maintenance', $projectInfo['Maintenencecontract']);
        $stmt->bindParam(':hardware', $projectInfo['InputHardware']);
        $stmt->bindParam(':operatingsystem', $projectInfo['Operating-system']);
        $stmt->bindParam(':application', $projectInfo['Application']);
        $stmt->bindParam(':offernumber', $projectInfo['Offernumber']);
        $stmt->bindParam(':offerstatus', $projectInfo['Offerstatus']);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        header('location: ' . BASE_URL . '/public/project.php?id=' . $id);
        exit;
    }
}