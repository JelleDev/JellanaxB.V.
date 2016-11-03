<?php
require 'header.php';

$appointment = new Appointment();

$appointment_id = $_GET['id'];

$appointmentInfo = $appointment->getAppointmentInfo($appointment_id);
$client_id = $appointmentInfo['client_id'];
$project_id = $appointmentInfo['project_id'];
$appointment_id = $appointmentInfo['appointment_id'];

$projectNames = $appointment->getProjectNames($client_id);

?>

<div class="container">
    <div class="main-part col-md-9">
        <header class="col-md-12">
            <div class="info-bar">
                <div class="col-md-12">
                    <h2>Edit Appointment</h2>
                </div>
                <div class="col-md-12">
                    <h3><a href="appointment.php?id=<?php echo $appointment_id; ?>">< Go back</a></h3>
                </div>
            </div>
        </header>
        <section class="editclientphp">
        	<div class="clients-edit">                 
                    <div class="information-client-add col-md-12">
                        <form action="<?php echo BASE_URL; ?>/app/controller/appointmentcontroller.php" method="POST">
                            <label class="sr-only">client_id</label>
                            <input type="hidden" name="client_id" value="<?php echo $client_id; ?>">
                            <label class="sr-only">appointment_id</label>
                            <input type="hidden" name="appointment_id" value="<?php echo $appointment_id; ?>">
                            <div class="form-group">
                                <label for="exampleInputCompanyname">Companyname*</label>
                                <input type="text" class="form-control" id="exampleInputCompanyname" placeholder="Companyname" name="companyname" value="<?php echo $appointmentInfo['companyname'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputProject">Project*</label>
                                <select class="form-control" id="exampleInputProject" name="Project">
                                    <?php
                                    foreach($projectNames as $projectName){
                                        if($project_id == $projectName['project_id']){
                                            echo "<option value='" . $projectName['project_id'] . "'selected>" . $projectName['projectname'] . "</option>";
                                        }
                                        else {
                                            echo "<option value='" . $projectName['project_id'] . "'>" . $projectName['projectname'] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group relative">
                                <label for="datepicker">Date*</label>
                                <script>chooseDate();</script>
                                <input type="text" class="form-control chooseDate" placeholder="Date" name="Date" id="datepicker" value="<?php echo date('Y-m-d', strtotime($appointmentInfo['date_time'])) ?>">
                            </div>
                            <div class="form-group">
                                <label for="time">Time*</label>
                                <input type="time" class="form-control" id="time" placeholder="Time" name="Time" value="<?php echo date("H:i", strtotime($appointmentInfo['date_time'])); ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputLocation">Location*</label>
                                <input type="text" class="form-control" id="exampleInputLocation" placeholder="Location" name="Location" value="<?php echo $appointmentInfo['location']; ?>">
                            </div>
                            <div class="form-group">
                            <div class="form-group">
                                <label for="exampleInputSubject">Subject</label>
                                <textarea class="form-control" id="exampleInputSubject" placeholder="Subject" name="Subject"><?php echo $appointmentInfo['appointment_subject']; ?></textarea>
                            </div>
                            <input type="submit" class="btn btn-primary" name="type" value="Save changes">
                    </div>
                </form>
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
