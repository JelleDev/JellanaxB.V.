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
                <div class="col-md-12">
                    <h3><a href="edit-inactive.php">Edit inactive elements</a></h3>
                </div>
            </div>
        </header>
        <section class="information">
        	<div class="clients">
        		<ul class="client col-md-12">
        			<li class="col-md-3 bold">Projects</a></li>
                    <li class="col-md-3 bold">Invoice number</li>
                    <li class="col-md-3 bold">Users</li>
                    <li class="col-md-3 bold">Clients</li>
        		</ul>
                <ul class="client col-md-12">
                    <li class="col-md-3">Barroc-IT<input type="checkbox"></li>
                    <li class="col-md-3">20089<input type="checkbox"></li>
                    <li class="col-md-3">Jelle van Dijk<input type="checkbox"></li>
                    <li class="col-md-3">Jan Jansen<input type="checkbox"></li>
                </ul>
        	</div>
        </section>
    </div>
    <aside class="col-md-3">
    	<div class="aside-clients">
    		<ul class="aside-client">
    			<li class="logged_in_as">Admin</li>
				<li><a href="customers.php">Clients</a></li>
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
