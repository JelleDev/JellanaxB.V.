<?php
/**
 * Created by PhpStorm.
 * User: Jelle
 * Date: 12-10-2016
 * Time: 12:22
 */

session_start();

require realpath(__DIR__ . '/config.php');

/*
 *  Require all vendor classes (from composer)
 *
 * */

require realpath(__DIR__ . '/../vendor/autoload.php');

/*
 * Require all classes
 *
 * */

spl_autoload_register(function($class){
    if(file_exists(__DIR__ . '/classes/' . $class . '.php')){
        require realpath(__DIR__ . '/classes/' . $class . '.php');
    }
});

$user = new User;
if(isset($_SESSION['uid'])) {
    $id = $_SESSION['uid'];
    $userData = Database::getInstance()->pdo
        ->query("SELECT tbl_users.`username`, tbl_departments.`name` AS department
                 FROM `tbl_users`
                 INNER JOIN `tbl_departments`
                 ON tbl_users.`department_id` = tbl_departments.`department_id`
                 WHERE tbl_users.`user_id` = '$id'")
        ->fetch(PDO::FETCH_ASSOC);

    $user->logged = true;
    $user->setUsername($userData['username']);
    $user->setRole($userData['department']);
    var_dump($user);

    echo "Wilt u <a href='" . BASE_URL . "/app/controller/authcontroller.php?type=logout'>Uitloggen</a>";
}