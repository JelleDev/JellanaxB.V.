<?php
require 'header.php';

$appointment = new Appointment();

$appointment_id = $_GET['id'];

if(!isset($appointment_id) || empty($appointment_id)){
    $user->redirect('appointments.php', 'NotPermitted');
}


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
                    <div class="information-client col-md-3">
                        <p>Companyname</p>
                        <p>Project</p>
                        <p>Date</p>
                        <p>Time</p>
                        <p>Location</p>
                        <p>Initials</p>
                        <p>Contactperson</p>
                        <p>Telephonenumber</p>
                        <p>E-mail adress</p>
                        <?php
                        if(!empty($appointmentInfo['appointment_subject'])){
                            echo "<p>Subject</p>";
                        }
                        ?>
                    </div>
                    <div class="information-client col-md-8">
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
                <li class="active"><a href="appointments.php">Appointments</a></li>
                <li><a href="projects.php">Projects</a></li>
                <li><a href="invoices.php">Invoices</li>
                <?php
                if($user->canAccesAll()){
                    echo "<li><a href='users.php'>Users</a></li>
                              <li><a href='inactive.php'>Inactive</a></li>";
                }
                ?>
    		</ul>
    	</div>
    </aside>
</div>

<?php
require 'footer.php';
?>