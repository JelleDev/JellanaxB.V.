<?php
/**
 * Created by PhpStorm.
 * User: Jelle
 * Date: 12-10-2016
 * Time: 12:21
 */

require realpath(__DIR__ . '/../init.php');
use Respect\Validation\Validator as Validator;

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    if($_GET['type'] == 'logout'){
        $user->logout();
        $user->redirect('index.php', 'logout');
    }
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(!Validator::notEmpty()->validate($username) || !Validator::notEmpty()->validate($password)){
        $user->redirect('index.php', 'wrong_usage');
        exit;
    }

    $db = Database::getInstance();
    $sql = "SELECT * 
            FROM `tbl_users`
            WHERE `username` = :username";
    $stmt = $db->pdo->prepare($sql);
    $stmt->bindParam(':username', $_POST['username']);
    $stmt->execute();

    $result = $stmt->rowCount();

    if($result != 1){
        $user->redirect('index.php', 'invalid_username');
        exit;
    }

    $data = $stmt->fetch(PDO::FETCH_OBJ);
    $dbpass = $data->password;

    if($password != $dbpass){
        $user->redirect('index.php', 'invalid_password');
        exit;
    }

    $account = [
        'uid' => $data->user_id,
        'username' => $data->username,
    ];

    $user->login($account);
}