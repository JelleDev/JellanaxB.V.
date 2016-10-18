<?php
/**
 * Created by PhpStorm.
 * User: Jelle
 * Date: 12-10-2016
 * Time: 12:23
 */

require realpath(__DIR__ . '/init.php');

$role = $user->getRole();

switch ($role){
    case 'admin': $user->redirect('admin.php', 'Admin');
        break;
    case 'development': $user->redirect('development.php', 'Development');
        break;
    case 'sales': $user->redirect('sales.php', 'Sales');
        break;
    case 'finance': $user->redirect('finance.php', 'Finance');
        break;
    default: $user->redirect('index.php', 'notLogged');
}