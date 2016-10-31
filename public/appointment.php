<?php
require 'header.php';
?>

<div class="container">
    <div class="main-part col-md-9">
        <header class="col-md-12">
            <div class="info-bar">
                <div class="col-md-12">
                    <h2>Appointment info</h2>
                </div>
                <div class="col-md-12">
                    <h3><a href="appointments.php">< Go back</a></h3>
                </div>
            </div>
        </header>
        <section class="editclientphp">
        	<div class="clients-edit">
                <ul class="information-clients col-md-12">
                    <div class="information-client col-md-6">
                        <li>Companyname</li>
                        <li>Customername</li>
                        <li>Location</li>
                        <li>Date</li>
                        <li>Time</li>
                        <li>Contactname</li>
                        <li>Project</li>
                        <li>Telephonenumber</li>
                        <li>E-mail adress</li>
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
                        <li><div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam facilis molestiae deleniti accusantium earum eligendi. Veritatis tempora consequuntur dolorem repudiandae iusto sit fugit quo fuga odit, eaque! Unde asperiores, dicta.</div>
                        <div>Officia dolor, possimus repellendus vero ducimus explicabo obcaecati unde, soluta reprehenderit vel, similique quibusdam, deleniti eaque ipsa. Adipisci cupiditate quaerat repellat maiores fuga architecto, quos mollitia fugiat, nemo commodi ut?</div></li>
                    </div>
                </ul>
                <div class="editclients-button"><a href="edit-appointment.php">Modify</a></div>
                  
        		
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
                <li class="active"><a href="appointments.php">Appointments</a></li>
                <li><a href="projects.php">Projects</a></li>
    		</ul>
    	</div>
    </aside>
</div>

<?php
require 'footer.php';
?>