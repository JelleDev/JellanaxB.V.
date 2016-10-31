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
                    <h3><a href="adduser.php">Add User</a></h3>
                </div>
            </div>
        </header>
        <section class="information">
        	<div class="clients">
        		<ul class="client col-md-12">
        			<li class="col-md-6 bold">Username</a></li>
        			<li class="col-md-6 bold">Department</li>
        		</ul>
                <ul class="client col-md-12">
                    <li class="col-md-6">Jeljor12</a></li>
                    <li class="col-md-6">Sales</li>
                </ul>
        	</div>
        </section>
    </div>
    <aside class="col-md-3">
    	<div class="aside-clients">
    		<ul class="aside-client">
    			<li class="logged_in_as">Admin</li>
				<li><a href="customers.php">Clients</a></li>
                <li class="active"><a href="users.php">Users</a></li>
                <li><a href="appointments.php">Appointments</a></li>
                <li><a href="projects.php">Projects</a></li>
    		</ul>
    	</div>
    </aside>
</div>

<?php
require 'footer.php';
?>
