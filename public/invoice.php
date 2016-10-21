<?php
/**
 * Created by PhpStorm.
 * User: axelw
 * Date: 21-10-2016
 * Time: 10:15
 */

require 'header.php';

$client = new Client();

$clients = $client->getAllClients();
?>

<div class="container">
    <div class="main-part col-md-9">
        <header class="col-md-12">
            <div class="info-bar">
                <div class="col-md-12">
                    <h2>0 Results found</h2>
                </div>
                <div class="col-md-12">
                    <h3><a href="add-customer">Add a Client</a></h3>
                </div>
            </div>
        </header>
        <section class="information">
            <div class="clients">
                <ul class="client col-md-12">
                    <li class="col-md-3 bold">Companyname</a></li>
                    <li class="col-md-3 bold">Telephonenumber</li>
                    <li class="col-md-3 bold">Customername</li>
                    <li class="col-md-3 bold">E-mail adress</li>
                </ul>
                <?php
                foreach ($clients as $customer){
                    $client_id = $customer['client_id'];
                    echo "<ul class='client col-md-12'>
						<li class='col-md-3'><a href='http://localhost/JellanaxB.V/public/customer.php?id=" . $client_id ."'>" . $customer['companyname'] . "</a></li>
						<li class='col-md-3'>" . $customer['phonenumber1'] . "</li>
						<li class='col-md-3'>" . $customer['contactperson'] . "</li>
						<li class='col-md-3'>" . $customer['emailadress'] . "</li>
						</ul>";
                }
                ?>
            </div>
        </section>
    </div>
    <aside class="col-md-3">
        <div class="aside-clients">
            <ul class="aside-client">
                <li class="logged_in_as">Admin</li>
                <li class="active"><a href="customers.php">Clients</a></li>
                <li><a href="users.php">Users</a></li>
                <li><a href="appointments.php">Appointments</a></li>
                <li><a href="projects.php">Projects</a></li>
            </ul>
        </div>
    </aside>
</div>

<?php
require 'footer.php';
?>