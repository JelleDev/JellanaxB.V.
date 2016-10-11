<?php
/**
 * Created by PhpStorm.
 * User: Jelle
 * Date: 11-10-2016
 * Time: 11:13
 */

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Barroc-IT Web App</title>
    <link rel="stylesheet" href="../css/style.css" type="text/css">
</head>
<body>
    <div class="container">
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
</body>
</html>
