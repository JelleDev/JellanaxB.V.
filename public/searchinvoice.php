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
                    <h3>Here you can search for a specific invoice</h3>
                </div>
            </div>
        </header>
        <section class="information col-md-12">
            <form class="search form-horizontal">
                <div class="form-group">
                    <label for="clientname" class="col-sm-2 control-label">Clientname</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="clientname" placeholder="Clientname">
                    </div>
                </div>
                <div class="form-group">
                    <label for="companyname" class="col-sm-2 control-label">Companyname</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="companyname" placeholder="Companyname">
                    </div>
                </div>
                <div class="form-group">
                    <label for="project" class="col-sm-2 control-label">Project</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="project" placeholder="Project">
                    </div>
                </div>

                <div class="form-group">
                    <input type="submit" value="Search" class="btn btn-primary col-md-2 col-md-offset-9">
                </div>
            </form>
        </section>
    </div>
    <aside class="col-md-2">
        <h3>Finance/Admin</h3>
        <div class="invoices active-tab">
            <h2>Facturen</h2>
        </div>

    </aside>
</div>

<?php require_once 'footer.php'; ?>
