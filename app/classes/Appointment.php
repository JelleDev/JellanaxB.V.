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
            tbl_appointments.`location`, tbl_appointments.`date_time` 
            FROM `tbl_clients`
            INNER JOIN `tbl_projects`
            ON tbl_clients.`client_id` = tbl_projects.`client_id`
            INNER JOIN `tbl_appointments`
            ON tbl_clients.`client_id` = tbl_appointments.`client_id`
            ")
            ->fetchAll(PDO::FETCH_ASSOC);

        return $appointmentData;
    }
}