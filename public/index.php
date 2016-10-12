<?php
/**
 * Created by PhpStorm.
 * User: Jelle
 * Date: 11-10-2016
 * Time: 11:13
 */

require 'header.php';

?>


<div class="container">
    <div class="main-page">
        <nav>
            <h1 class="title">Barroc-IT</h1>
        </nav>
        <section class="login flex">
            <div class="login-box">
                <form action="" method="POST">
                    <div class="form-group login-field flex">
                        <label hidden for="username">Username</label>
                        <input type="text" id="username" name="username" placeholder="Username">
                    </div>
                    <div class="form-group login-field flex">
                        <label hidden for="password">Password</label>
                        <input type="text" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="form-group login-field flex">
                        <input type="submit" name="login" value="Log in">
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>

<?php
require 'footer.php';
?>