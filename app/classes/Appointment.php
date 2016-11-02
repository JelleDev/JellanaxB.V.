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
            FROM `tbl_clients`
            INNER JOIN `tbl_projects`
            ON tbl_clients.`client_id` = tbl_projects.`client_id`
            INNER JOIN `tbl_appointments`
            ON tbl_clients.`client_id` = tbl_appointments.`client_id`
            ")
            ->fetchAll(PDO::FETCH_ASSOC);

        return $appointmentData;
    }

    public function getAppointmentInfo($id){
        $sql = "SELECT tbl_clients.`client_id`, tbl_clients.`companyname`,
                tbl_clients.`initials`, tbl_clients.`contactperson`,
                tbl_clients.`phonenumber1`, tbl_clients.`emailadress`
                tbl_projects.`projectname`, tbl_projects.`project_id`,
                tbl_appointments.*
                FROM `tbl_clients`
                INNER JOIN `tbl_projects`
                ON tbl_clients.`client_id` = tbl_projects.`client_id`
                INNER JOIN `tbl_appointments`
                ON tbl_clients.`client_id` = :id";

        $stmt = $this->db->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }
}