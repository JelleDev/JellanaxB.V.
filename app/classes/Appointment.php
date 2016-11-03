<?php

/**
 * Created by PhpStorm.
 * User: Jelle
 * Date: 27-10-2016
 * Time: 12:24
 */
class Appointment
{
    private $db;

    public function __construct(){
        $this->db = Database::getInstance();
    }

    public function getMainAppointmentInfo(){
        $appointmentData = $this->db->pdo
            ->query("               
            SELECT tbl_clients.`companyname`, tbl_projects.`projectname`, 
            tbl_appointments.`location`, tbl_appointments.`date_time`, 
            tbl_appointments.`appointment_id` 
            FROM `tbl_projects`
            INNER JOIN `tbl_clients`
            ON tbl_clients.`client_id` = tbl_projects.`client_id`
            INNER JOIN `tbl_appointments`
            ON tbl_projects.`project_id` = tbl_appointments.`project_id`
            ")
            ->fetchAll(PDO::FETCH_ASSOC);

        return $appointmentData;
    }

    public function getAppointmentInfo($appointment_id){
        $sql = "SELECT tbl_clients.`client_id`, tbl_clients.`companyname`,
                tbl_clients.`initials`, tbl_clients.`contactperson`,
                tbl_clients.`phonenumber1`, tbl_clients.`emailadress`,
                tbl_projects.`project_id`, tbl_projects.`projectname`,
                tbl_appointments.*
                FROM `tbl_projects`
                INNER JOIN `tbl_clients`
                ON tbl_clients.`client_id` = tbl_projects.`client_id`
                INNER JOIN `tbl_appointments`
                ON tbl_projects.`project_id` = tbl_appointments.`project_id`
                WHERE tbl_appointments.`appointment_id` = :id";

        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':id', $appointment_id);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function getProjectNames($client_id){
        $sql = "SELECT `projectname`, `project_id`
                FROM `tbl_projects`
                WHERE `client_id` = :client_id";

        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':client_id', $client_id);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function getCompanyNames(){
        $companyData = $this->db->pdo
            ->query("SELECT `companyname`, `client_id`
                     FROM `tbl_clients`")->fetchAll(PDO::FETCH_ASSOC);
        return $companyData;
    }

    public function getCompanyName($client_id){
        $sql = "SELECT `companyname` 
                FROM `tbl_clients` 
                WHERE `client_id` = :client_id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':client_id', $client_id);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_COLUMN);
        return $result;
    }

    public function addAppointment($appointmentInfo){
        $sql = "INSERT INTO `tbl_appointments`
                (`project_id`, `date_time`, `appointment_subject`, `location`)
                VALUES (:project_id, :date_time, :subject, :location)";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':project_id', $appointmentInfo['project_id']);
        $stmt->bindParam(':date_time', $appointmentInfo['date_time']);
        $stmt->bindParam(':subject', $appointmentInfo['subject']);
        $stmt->bindParam(':location', $appointmentInfo['location']);
        $stmt->execute();

        header('location: ' . BASE_URL . '/public/appointments.php');
        exit;
    }

    public function editAppointment($appointment_id, $appointmentInfo){
        $sql = "UPDATE `tbl_appointments`
                SET `project_id` = :project_id, `date_time` = :datetime, 
                `appointment_subject` = :subject, `location` = :location
                WHERE `appointment_id` = :id";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':project_id', $appointmentInfo['project_id']);
        $stmt->bindParam(':datetime', $appointmentInfo['date_time']);
        $stmt->bindParam(':subject', $appointmentInfo['subject']);
        $stmt->bindParam('location', $appointmentInfo['location']);
        $stmt->bindParam(':id', $appointment_id);
        $stmt->execute();

        header('location: ' . BASE_URL . '/public/appointment.php?id=' . $appointment_id);
        exit;
    }
}