<?php
require 'header.php';
?>

<div class="container">
    <div class="main-part col-md-9">
        <header class="col-md-12">
            <div class="info-bar">
                <div class="col-md-12">
                    <h2>0 Results found</h2>
                </div>
                <div class="col-md-12">
                    <h3><a href="add-invoice.php">Add an invoice</a></h3>
                </div>
            </div>
        </header>
        <section class="information">
        	<div class="clients">
        		<ul class="client col-md-12">
        			<li class="col-md-3 bold">Companyname</li>
        			<li class="col-md-3 bold">Date</li>
                    <li class="col-md-3 bold">Project</li>
                    <li class="col-md-3 bold">Amount</li>

        		</ul>
                <ul class="client col-md-12">
                    <li class="col-md-3"><a href="invoice.php">Bartels.B.V.</a></li>
                    <li class="col-md-3">22-10-2099</li>
                    <li class="col-md-3">Broodje pannenkoek</li>
                    <li class="col-md-3">$100.000</li>

                </ul>
        	</div>
        </section>
    </div>
    <aside class="col-md-3">
        <div class="aside-clients">
            <ul class="aside-client">
                <li class="logged_in_as">Admin</li>
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

<?php
require 'footer.php';
?>
