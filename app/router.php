<?php
/**
 * Created by PhpStorm.
 * User: Jelle
 * Date: 12-10-2016
 * Time: 12:23
 */

require realpath(__DIR__ . '/init.php');

?>

<p>U bent ingelogt als <?php echo $user->getRole(); ?></p>
<p>Wilt u <a href="http://localhost/JellanaxB.V/app/controller/authcontroller.php?type=logout">Uitloggen?</a></p>
