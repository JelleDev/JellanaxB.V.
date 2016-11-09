<?php
/**
 * Created by PhpStorm.
 * User: Jelle
 * Date: 3-11-2016
 * Time: 12:33
 */

require realpath(__DIR__ . '/../init.php');
use Respect\Validation\Validator as Validator;

$invoice = new Invoice();

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $invoice_id = $_GET['id'];

    if(!isset($invoice_id) || empty($invoice_id)){
        $user->redirect('invoices.php', 'Id was nog recognized');
    }

    $invoice->setPaid($invoice_id);
    $user->redirect('invoices.php', 'Invoice paid');
}


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $allInfo = [
        'project_id' => $_POST['projectid'],
        'invoice_nr' => $_POST['Invoicenr'],
        'price' => $_POST['Amount'],
        'tax_code' => $_POST['Tax_code'],
    ];

    if($_POST['type'] == 'Add invoice'){
        foreach ($allInfo as $info) {
            if (!Validator::notEmpty()->validate($info)) {
                $user->redirect('search_companyname_invoice.php', 'Empty required field');
            }

            if(!Validator::numeric()->validate($allInfo['price']) || !Validator::numeric()->validate($allInfo['tax_code'])){
                $user->redirect('search_companyname_invoice.php', 'Not a number');
            }
        }

        $allInfo['explanation'] = $_POST['Explanation'];

        $invoice->addInvoice($allInfo);
    }

    if($_POST['type'] == 'Save changes'){
        $invoice_id = $_POST['invoice_id'];

        foreach ($allInfo as $info) {
            if (!Validator::notEmpty()->validate($info)) {
                $user->redirect('edit-invoice.php?id=' . $invoice_id, 'Empty required field');
            }

            if(!Validator::numeric()->validate($allInfo['price']) || !Validator::numeric()->validate($allInfo['tax_code'])){
                $user->redirect('edit-invoice.php?id=' . $invoice_id, 'Not a number');
            }
        }

        $allInfo['explanation'] = $_POST['Explanation'];

        $invoice->modifyInvoice($invoice_id, $allInfo);
    }
}