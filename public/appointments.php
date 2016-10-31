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
                    <h3><a href="add-appointment.php">Add an appointment</a></h3>
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
						<li class='col-md-3'><a href='appointment.php'>" . $info['companyname'] . "</a></li>
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
    			<li class="logged_in_as">Admin</li>
    			<li><a href="customers.php">Clients</a></li>
    			<li><a href="users.php">Users</a></li>
    			<li class="active"><a href="appointments.php">Appointments</a></li>
    			<li><a href="projects.php">Projects</a></li>
    		</ul>
    	</div>
    </aside>
</div>

<?php
require 'footer.php';
?>
