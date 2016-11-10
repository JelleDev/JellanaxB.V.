<?php
require 'header.php';
use Respect\Validation\Validator as Validator;

$appointment = new Appointment();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $input = $_POST['searchInput'];
    if(!Validator::notEmpty()->validate($input)){
        $user->redirect('appointments.php', 'EmptySearchfield');
    }
    $appointmentInfo = $appointment->searchInAppointments($input);

    if(empty($appointmentInfo)){
        $user->redirect('appointments.php', 'NoResultsFound');
    }
}
else {
    $appointmentInfo = $appointment->getMainAppointmentInfo();
}

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
                    <?php
                    if($user->canModifyCustomer()){
                        echo "<div class='col-md-8'>
                                <h3>
                                    <a href='add-appointment.php'>Add a client</a>
                                </h3>
                            </div>";
                    }
                    ?>
                    <form class="form-inline col-md-4" action="appointments.php" method="POST">
                        <div class="form-group">
                            <label class="sr-only" for="searchbar"></label>
                            <input type="text" name="searchInput" id="searchbar" placeholder="Companyname">
                        </div>
                        <input type="submit" class="btn btn-primary" name="type" value="Search">
                    </form>
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
        			$dateTime = date("m-d-Y, H:i", strtotime($info['date_time']));
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
