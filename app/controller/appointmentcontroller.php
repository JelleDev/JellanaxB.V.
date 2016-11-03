<?php
/**
 * Created by PhpStorm.
 * User: Jelle
 * Date: 27-10-2016
 * Time: 12:24
 */

require realpath(__DIR__ . '/../init.php');
use Respect\Validation\Validator as Validator;

$appointment = new Appointment();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $allInfo = [
        'companyname' => $_POST['companyname'],
        'project_id' => $_POST['Project'],
        'date' => $_POST['Date'],
        'time' => $_POST['Time'],
        'location' => $_POST['Location']
    ];

    if($_POST['type'] == 'Add appointment'){
        foreach ($allInfo as $info) {
            if (!Validator::notEmpty()->validate($info)) {
                $user->redirect('add-appointment.php', 'Empty required field');
            }
        }

        $allInfo['subject'] = $_POST['Subject'];
        $glue = [
            $allInfo['date'],
            $allInfo['time']
        ];
        $allInfo['date_time'] = implode(' ', $glue);

        $appointment->addAppointment($allInfo);
    }

    if($_POST['type'] == 'Save changes'){
        $client_id = $_POST['client_id'];
        $appointment_id = $_POST['appointment_id'];
        $companyname = $appointment->getCompanyName($client_id);

        if($companyname != $allInfo['companyname']){
            $user->redirect('edit-appointment.php?id=' . $appointment_id, 'Invalid Companyname');
        }

        foreach ($allInfo as $info) {
            if (!Validator::notEmpty()->validate($info)) {
                $user->redirect('edit-appointment.php?id=' . $appointment_id, 'Empty required field');
            }
        }

        $allInfo['subject'] = $_POST['Subject'];
        $glue = [
            $allInfo['date'],
            $allInfo['time']
        ];
        $allInfo['date_time'] = implode(' ', $glue);

        $appointment->editAppointment($appointment_id, $allInfo);
    }
}