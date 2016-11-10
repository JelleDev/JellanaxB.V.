<?php
require 'header.php';

?>

<div class="container">
    <div class="main-part col-md-9">
        <header class="col-md-12">
            <div class="info-bar">
                <div class="col-md-12">
                    <h2>Barroc-IT System</h2>
                </div>
            </div>
        </header>
        <section class="information">
            <a href="paidinvoice.php">Paid invoices</a>
        </section>
    </div>
    <aside class="col-md-3">
    	<div class="aside-clients">
    		<ul class="aside-client">
    			<li class="logged_in_as">Admin</li>
				<li><a href="customers.php">Clients</a></li>
                <li><a href="appointments.php">Appointments</a></li>
                <li><a href="projects.php">Projects</a>
                    <?php
                    if($user->canAccesAll()){
                        echo "<li><a href='users.php'>Users</a></li>
                              <li><a href='inactive.php' class='active'>Inactive</a></li>";
                    }
                    ?>
    		</ul>
    	</div>
    </aside>
</div>

<?php
require 'footer.php';
?>
