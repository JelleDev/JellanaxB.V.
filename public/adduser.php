<?php
/**
 * Created by PhpStorm.
 * User: Jelle
 * Date: 13-10-2016
 * Time: 09:15
 */

require_once 'header.php';

?>

<div class="container">
    <div class="main-part col-md-10">
        <header class="col-md-12">
            <div class="info-bar">
                <div class="col-md-12">
                    <h2>Barroc-IT system</h2>
                </div>
                <div class="col-md-12">
                    <h3>Here you can add a new user</h3>
                </div>
            </div>
        </header>
        <section class="information col-md-12">
            <form class="search form-horizontal">
                <div class="form-group">
                    <label for="username" class="col-sm-2 control-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" placeholder="Username">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="department" class="col-sm-2 control-label">Department</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="department" placeholder="Department">
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" value="Save" class="btn btn-primary col-md-2 col-md-offset-9">
                </div>

            </form>
        </section>
    </div>
    <aside class="col-md-2">
        <h2>Admin</h2>
        <div class="clients">
            <h2>Clients</h2>
            <h3>Appointments</h3>
            <h2>Invoices</h2>
            <h2>Projects</h2>
            <div class="active-tab">
                <h2>Users</h2>
            </div>

        </div>

    </aside>
</div>

<?php require_once 'footer.php'; ?>
