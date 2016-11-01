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
    <div class="main-part col-md-9">
        <header class="col-md-12">
            <div class="info-bar">
                <div class="col-md-12">
                    <h2>Barroc-IT system</h2>
                </div>
                <div class="col-md-12">
                    <h3>Edit an invoice</h3>
                </div>
            </div>
        </header>
        <section class="information col-md-12">
            <form class="search form-horizontal">
                <div class="form-group">
                    <label for="clientname" class="col-sm-2 control-label">Clientname</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="clientname" placeholder="Jan Jansen">
                    </div>
                </div>
                <div class="form-group">
                    <label for="companyname" class="col-sm-2 control-label">Companyname</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="companyname" placeholder="Firma Jansen">
                    </div>
                </div>
                <div class="form-group">
                    <label for="date" class="col-sm-2 control-label">Date</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="date" placeholder="22-09-2016">
                    </div>
                </div>
                <div class="form-group">
                    <label for="contactperson" class="col-sm-2 control-label">Contactperson</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="contactperson" placeholder="Jan Jansen">
                    </div>
                </div>
                <div class="form-group">
                    <label for="project" class="col-sm-2 control-label">Project</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="project" placeholder="Barroc-IT">
                    </div>
                </div>
                <div class="form-group">
                    <label for="phonenumber" class="col-sm-2 control-label">Phonenumber</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="phonenumber" placeholder="0166-556677">
                    </div>
                </div>
                <div class="form-group">
                    <label for="limit" class="col-sm-2 control-label">Limit</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="limit" placeholder="$500">
                    </div>
                </div>
                <div class="form-group">
                    <label for="amount" class="col-sm-2 control-label">Amount</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="amount" placeholder="$8000">
                    </div>
                </div>
                <div class="form-group">
                    <label for="paymentdate" class="col-sm-2 control-label">Payment Date</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="paymentdate" placeholder="30-01-2017">
                    </div>
                </div>
                <div class="form-group">
                    <label for="terms" class="col-sm-2 control-label">Terms (Y/N)</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="terms" placeholder="Y">
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
   <aside class="col-md-3">
        <div class="aside-clients">
            <ul class="aside-client">
                <li class="logged_in_as"><?php echo $user->getRole(); ?></li>
                <li><a href="customers.php">Clients</a></li>
                 <?php
                if($user->canAccesUsers()){
                    echo "<li><a href='users.php'>Users</a></li>";
                }
                ?>
                <li><a href="appointments.php">Appointments</a></li>
                <li><a href="projects.php">Projects</a></li>
                <li class="active"><a href="invoices.php">Invoices</li>
            </ul>
        </div>
    </aside>
</div>

<?php require_once 'footer.php'; ?>
