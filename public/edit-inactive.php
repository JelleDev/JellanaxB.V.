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
                    <h3><a href="inactive.php">< Go back</a></h3>
                </div>
            </div>
        </header>
        <section class="information col-md-12">
            <form class="search form-horizontal">
                <div class="form-group">
                    <label for="clientname" class="col-sm-2 control-label">Projects</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="clientname" placeholder="Jan Jansen">
                    </div>
                </div>
                <div class="form-group">
                    <label for="companyname" class="col-sm-2 control-label">Invoice number</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="companyname" placeholder="Firma Jansen">
                    </div>
                </div>
                <div class="form-group">
                    <label for="date" class="col-sm-2 control-label">Users</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="date" placeholder="22-09-2016">
                    </div>
                </div>
                <div class="form-group">
                    <label for="contactperson" class="col-sm-2 control-label">Clients</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="contactperson" placeholder="Jan Jansen">
                    </div>
                </div>

                <div class="edit-invoice-buttons flex">
                    <div class="form-group">
                        <input type="submit" value="Cancel" class="btn btn-primary">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Save" class="btn btn-primary">
                    </div>
                </div>

            </form>
        </section>
    </div>
    <aside class="col-md-2">
        <h3>Admin</h3>
        <div class="inactive active-tab">
            <h3>Inactive elements</h3>
        </div>

    </aside>
</div>

<?php require_once 'footer.php'; ?>
