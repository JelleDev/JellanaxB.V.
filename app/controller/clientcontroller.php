<?php
/**
 * Created by PhpStorm.
 * User: Jelle
 * Date: 21-10-2016
 * Time: 12:28
 */

require realpath(__DIR__ . '/../init.php');
use Respect\Validation\Validator as Validator;

$client = new Client();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $requiredInfo = [
        $_POST['companyname'],
        $_POST['Adress1'],
        $_POST['Zipcode1'],
        $_POST['InputCity1'],
        $_POST['Telephonenumber1'],
        $_POST['Contactperson'],
        $_POST['E-mailadress']
    ];

    $allInfo = [
        'companyname' => $_POST['companyname'],
        'adress1' => $_POST['Adress1'],
        'zipcode1' => $_POST['Zipcode1'],
        'residence1' => $_POST['InputCity1'],
        'phonenumber1' => $_POST['Telephonenumber1'],
        'contactperson' => $_POST['Contactperson'],
        'emailadress' => $_POST['E-mailadress'],
        'initials' => $_POST['Initials'],
        'adress2' => $_POST['Adress2'],
        'zipcode2' => $_POST['Zipcode2'],
        'residence2' => $_POST['City2'],
        'phonenumber2' => $_POST['Telephonenumber2']
    ];

    if($_POST['type'] == 'Add customer'){
        for ($i = 0; $i < count($requiredInfo); $i++) {
            if (!Validator::notEmpty()->validate($requiredInfo[$i])) {
                $user->redirect('add-customer.php', 'Empty Required Field');
            }
        }

        if (!Validator::email()->validate($requiredInfo[6])) {
            $user->redirect('add-customer.php', 'Invalid emailadress');
        }

        $client->addClient($allInfo);
    }

    if($_POST['type'] == 'Save changes') {
        $id = $_POST['client_id'];

        for ($i = 0; $i < count($requiredInfo); $i++) {
            if (!Validator::notEmpty()->validate($requiredInfo[$i])) {
                $user->redirect('edit-customer.php', 'id=' . $id . '&Empty Required Field');
            }
        }

        if (!Validator::email()->validate($requiredInfo[6])) {
            $user->redirect('edit-customer.php', 'id=' . $id . '&Invalid emailadress');
        }

        $client->modifyClient($id, $allInfo);
    }
}