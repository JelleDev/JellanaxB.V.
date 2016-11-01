<?php
/**
 * Created by PhpStorm.
 * User: Jelle
 * Date: 24-10-2016
 * Time: 12:01
 */

require realpath(__DIR__ . '/../init.php');
use Respect\Validation\Validator as Validator;

$project = new Project();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $requiredInfo = [
        $_POST['Client_id'],
        $_POST['Projectname'],
        $_POST['Maintenencecontract'],
        $_POST['Offernumber'],
        $_POST['Offerstatus'],
        $_POST['Subject'],
        $_POST['Deadline']
    ];

    $allInfo = [
        'Client_id' => $_POST['Client_id'],
        'Projectname' => $_POST['Projectname'],
        'Maintenencecontract' => $_POST['Maintenencecontract'],
        'Offernumber' => $_POST['Offernumber'],
        'Offerstatus' => $_POST['Offerstatus'],
        'Deadline' => $_POST['Deadline'],
        'InputHardware' => $_POST['InputHardware'],
        'Operating-system' => $_POST['Operating-system'],
        'Application' => $_POST['Application'],
        'Subject' => $_POST['Subject']
    ];

    if($_POST['type'] == 'Add project'){
        foreach ($requiredInfo as $info){
            if(!Validator::notEmpty()->validate($info)){
                $user->redirect('add-project.php', 'Empty required field');
            }
        }

        $project->addProject($allInfo);
        $user->redirect('projects.php', 'AddedProject');
    }
}