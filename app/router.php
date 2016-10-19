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
    case 'admin': $user->redirect('admin.php', 'role=admin');
        break;
    case 'development': $user->redirect('development.php', 'role=development');
        break;
    case 'sales': $user->redirect('sales.php', 'role=sales');
        break;
    case 'finance': $user->redirect('finance.php', 'role=finance');
        break;
    default: $user->redirect('index.php', 'role=notLogged');
}