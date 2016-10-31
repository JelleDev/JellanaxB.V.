<?php
/**
 * Created by PhpStorm.
 * User: Jelle
 * Date: 31-10-2016
 * Time: 09:03
 */

require realpath(__DIR__ . '/../init.php');
use Respect\Validation\Validator as Validator;

$account = new Account();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $userInfo = [
        'username' => $_POST['username'],
        'password' => $_POST['password'],
        'departmentid' => $_POST['department'],
        'active' => 1
    ];

    foreach($userInfo as $info){
        if(!Validator::notEmpty()->validate($info)){
            $user->redirect('add-user.php', 'Empty required field');
        }
    }

    $account->addUser($userInfo);
}