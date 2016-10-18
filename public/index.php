<?php
/**
 * Created by PhpStorm.
 * User: Jelle
 * Date: 13-10-2016
 * Time: 09:27
 */

require realpath(__DIR__ . '/header.php');

?>

<div class="container">
    <header>
        <h1>Barroc-IT</h1>
    </header>
    <section class="login">
        <form class="col-md-4 col-md-offset-4" action="<?php echo BASE_URL ?>/app/controller/authcontroller.php" method="POST">
            <div class="form-group">
                <label class="sr-only" for="username">Username</label>
                <input class="form-control" type="text" name="username" id="username" placeholder="Username">
            </div>
            <div class="form-group">
                <label class="sr-only" for="password">Password</label>
                <input class="form-control" type="password" name="password" id="password" placeholder="Password">
            </div>
            <input class="btn btn-primary col-md-4 col-md-offset-4" type="submit" value="Log in">
        </form>
    </section>
</div>

<?php
require realpath(__DIR__ . '/footer.php');
?>