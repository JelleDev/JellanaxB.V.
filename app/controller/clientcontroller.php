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

$allInfo = [];

$requiredInfo = [];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if($user->canEditClient()){
        $requiredInfo = [
            $_POST['companyname'],
            $_POST['Adress1'],
            $_POST['Zipcode1'],
            $_POST['InputCity1'],
            $_POST['Telephonenumber1'],
            $_POST['Contactperson'],
            $_POST['E-mailadress'],
            $_POST['Bank-account-number'],
            $_POST['Payment-limit']
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
            'phonenumber2' => $_POST['Telephonenumber2'],
            'bank_account_number' => $_POST['Bank-account-number'],
            'ledger_account_number' => $_POST['Ledger-account-number'],
            'payment_limit' => $_POST['Payment-limit']
        ];
    }

    if($user->canAccesAll()){
        $requiredInfo = [
            $_POST['companyname'],
            $_POST['Adress1'],
            $_POST['Zipcode1'],
            $_POST['InputCity1'],
            $_POST['Telephonenumber1'],
            $_POST['Contactperson'],
            $_POST['E-mailadress'],
            $_POST['Bank-account-number'],
            $_POST['Payment-limit']
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
            'phonenumber2' => $_POST['Telephonenumber2'],
            'bank_account_number' => $_POST['Bank-account-number'],
            'ledger_account_number' => $_POST['Ledger-account-number'],
            'payment_limit' => $_POST['Payment-limit'],
            'creditworthy' => $_POST['creditworthy']
        ];
    }

    if($user->canModifyCreditworthy()){
        $allInfo = [
            'creditworthy' => $_POST['creditworthy']
        ];
    }

    if($_POST['type'] == 'Add customer'){
        $requiredInfo = [
            $_POST['companyname'],
            $_POST['Adress1'],
            $_POST['Zipcode1'],
            $_POST['InputCity1'],
            $_POST['Telephonenumber1'],
            $_POST['Contactperson'],
            $_POST['E-mailadress'],
            $_POST['Bank-account-number'],
            $_POST['Payment-limit']
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
            'phonenumber2' => $_POST['Telephonenumber2'],
            'bank_account_number' => $_POST['Bank-account-number'],
            'ledger_account_number' => $_POST['Ledger-account-number'],
            'payment_limit' => $_POST['Payment-limit']
        ];

        for ($i = 0; $i < count($requiredInfo); $i++) {
            if (!Validator::notEmpty()->validate($requiredInfo[$i])) {
                $user->redirect('add-customer.php', 'Empty Required Field');
            }
        }

        if (!Validator::email()->validate($requiredInfo[6])) {
            $user->redirect('add-customer.php', 'Invalid emailadress');
        }

        if(!Validator::numeric()->validate($allInfo['payment_limit'])){
            $user->redirect('add-customer.php', 'Payment Limit is not a number');
        }

        $client->addClient($allInfo);
    }

    if($_POST['type'] == 'Save changes') {
        $id = $_POST['client_id'];

        if($user->canEditClient() || $user->canAccesAll()){
            for ($i = 0; $i < count($requiredInfo); $i++) {
                if (!Validator::notEmpty()->validate($requiredInfo[$i])) {
                    $user->redirect('edit-customer.php', 'id=' . $id . '&Empty Required Field');
                }
            }

            if (!Validator::email()->validate($requiredInfo[6])) {
                $user->redirect('edit-customer.php', 'id=' . $id . '&Invalid emailadress');
            }

            if(!Validator::numeric()->validate($allInfo['payment_limit'])){
                $user->redirect('edit-customer.php', 'id=' . $id . '&Payment Limit is not a number');
            }
        }

        $client->modifyClient($id, $allInfo, $user->getRole());
    }
}