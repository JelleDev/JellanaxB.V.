<?php
require 'header.php';

$appointment = new Appointment();

$appointment_id = $_GET['id'];

$appointmentInfo = $appointment->getAppointmentInfo($appointment_id);
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
                        <li>Project</li>
                        <li>Date</li>
                        <li>Time</li>
                        <li>Location</li>
                        <li>Initials</li>
                        <li>Contactperson</li>
                        <li>Telephonenumber</li>
                        <li>E-mail adress</li>
                        <?php
                        if(!empty($appointmentInfo['appointment_subject'])){
                            echo "<li>Subject</li>";
                        }
                        ?>
                    </div>
                    <div class="information-client col-md-6">
                        <li><?php echo $appointmentInfo['companyname']; ?></li>
                        <li><?php echo $appointmentInfo['projectname']; ?></li>
                        <li><?php echo date("m-d-Y", strtotime($appointmentInfo['date_time'])); ?></li>
                        <li><?php echo date("H:i", strtotime($appointmentInfo['date_time'])); ?></li>
                        <li><?php echo $appointmentInfo['location'] ?></li>
                        <li><?php echo $appointmentInfo['initials']; ?></li>
                        <li><?php echo $appointmentInfo['contactperson']; ?></li>
                        <li><?php echo $appointmentInfo['phonenumber1']; ?></li>
                        <li><?php echo $appointmentInfo['emailadress']; ?></li>
                        <?php
                        if(!empty($appointmentInfo['appointment_subject'])){
                            echo "<li>" . $appointmentInfo['appointment_subject'] . "</li>";
                        }
                        ?>
                    </div>
                </ul>
                <?php
                if($user->canModifyCustomer()){
                    echo "<div class='editclients-button'><a href='edit-appointment.php?id=" . $appointment_id . "'>Modify</a></div>";
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