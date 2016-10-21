<?php
/**
 * Created by PhpStorm.
 * User: Jelle
 * Date: 18-10-2016
 * Time: 12:16
 */

require_once __DIR__ . '/header.php';

if(!$user->isLoggedIn()){
    $user->redirect('index.php', 'notLogged');
}

if(!isset($_SESSION['uid']) || $_SESSION['department_id'] != '1'){
    $user->redirect('index.php', 'no_session');
}
?>

Welkom u bent ingelogd als <?php echo $user->getRole(); ?>.
Wilt u <a href="<?php echo BASE_URL; ?>/app/controller/authcontroller.php?type=logout">uitloggen?</a>