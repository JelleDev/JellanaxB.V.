<?php
/**
 * Created by PhpStorm.
 * User: Jelle
 * Date: 12-10-2016
 * Time: 12:21
 */

require realpath(__DIR__ . '/../init.php');
use Respect\Validation\Validator as Validator;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];

    var_dump($_POST);
    if(!Validator::notEmpty()->validate($username) || !Validator::notEmpty()->validate($password)){
        header('location: ../../public/index.php');
    }
}