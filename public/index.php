<?php
/**
 * Created by PhpStorm.
 * User: Jelle
 * Date: 13-10-2016
 * Time: 09:27
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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
    <link rel="stylesheet" href="../css/jquery-ui.structure.min.css">
    <link rel="stylesheet" href="../css/jquery-ui.theme.min.css">
    <link rel="stylesheet" href="https://bootswatch.com/cosmo/bootstrap.min.css">
    <script src="../js/jquery.min.js"></script>
</head>
    <body>
        <div class="container">
            <header>
                <h1>Barroc-IT</h1>
            </header>
            <section class="login">
                <form class="col-md-4 col-md-offset-4" action="../app/controller/authcontroller.php" method="POST">
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