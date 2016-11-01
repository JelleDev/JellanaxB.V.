<?php
require 'header.php';
?>

<div class="container">
    <div class="main-part col-md-9">
        <header class="col-md-12">
            <div class="info-bar">
                <div class="col-md-12">
                    <h2>Projects</h2>
                </div>
                <div class="col-md-12">
                    <h3><a href="projects.php">< Go back</a></h3>
                </div>
            </div>
        </header>
        <section class="editclientphp">
        	<div class="clients-edit">
                <ul class="information-clients col-md-12">
                    <div class="information-client col-md-6">
                        <li>Companyname</li>
                        <li>Projectname</li>
                        <li>Deadline</li>
                        <li>date</li>
                        <li>Time</li>
                        <li>maintenence contract</li>
                        <li>hardware</li>
                        <li>Operating system</li>
                        <li>Application</li>
                        <li>Offernumber</li>
                        <li>Offerstatus</li>
                        <li>Subject</li>
                    </div>
                    <div class="information-client col-md-6">
                        <li>anne</li>
                        <li>is</li>
                        <li>leuk</li>
                        <li>l</li>
                        <li>h</li>
                        <li>h</li>
                        <li>h</li>
                        <li>h</li>
                        <li>h</li>
                        <li>h</li>
                        <li>h</li>
                        <li><div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius provident molestiae tempora ipsa atque magnam culpa aut sunt temporibus eos adipisci ratione placeat natus ipsum, odit aperiam praesentium, quod cupiditate.</div>
                        <div>Praesentium vero voluptatum fugiat aliquid, iure a vel, nesciunt, doloremque qui doloribus aperiam ducimus deleniti, veniam dignissimos! Tempore voluptate consequuntur rem itaque vitae ducimus blanditiis totam, provident corporis excepturi, laborum!</div></li>
                    </div>
                </ul>
                <div class="editclients-button"><a href="edit-project.php">Modify</a></div>
                  
        		
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
                <li class="active"><a href="projects.php">Projects</a></li>
                <li><a href="invoices.php">Invoices</li>
    		</ul>
    	</div>
    </aside>
</div>

<?php
require 'footer.php';
?>