<?php
require 'header.php';

$appointment = new Appointment();

$appointmentInfo = $appointment->getMainAppointmentInfo();

$amountAppointments = count($appointmentInfo);
?>

<div class="container">
    <div class="main-part col-md-9">
        <header class="col-md-12">
            <div class="info-bar">
                <div class="col-md-12">
                    <h2><?php echo $amountAppointments; ?> Results found</h2>
                </div>
                <div class="col-md-12">
                    <h3><a href="search_companyname.php">Add an appointment</a></h3>
                </div>
            </div>
        </header>
        <section class="information">
        	<div class="clients">
        		<ul class="client col-md-12">
        			<li class="col-md-3 bold">Companyname</li>
        			<li class="col-md-3 bold">Project</li>
        			<li class="col-md-3 bold">Location</li>
        			<li class="col-md-3 bold">Date and time</li>
        		</ul>
        		<?php
				foreach($appointmentInfo as $info){
        			$dateTime = date("m-d-Y, g:ia", strtotime($info['date_time']));
        			echo "<ul class='client col-md-12'>
						<li class='col-md-3'><a href='appointment.php?id=" . $info['appointment_id'] . "'>" . $info['companyname'] . "</a></li>
						<li class='col-md-3'>" . $info['projectname'] . "</li>
						<li class='col-md-3'>" . $info['location'] . "</li>
						<li class='col-md-3'>" . $dateTime . "</li>
						</ul>";
				}
				?>
        	</div>
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
    			<li class="active"><a href="appointments.php">Appointments</a></li>
    			<li><a href="projects.php">Projects</a></li>
                <li><a href="invoices.php">Invoices</li>
    		</ul>
    	</div>
    </aside>
</div>

<?php
require 'footer.php';
?>
