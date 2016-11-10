<?php
require 'header.php';


if(!$user->canModifyCustomer()){
    $user->redirect('appointments.php', 'NotPermitted');
}

if(!$_SERVER['REQUEST_METHOD'] == 'POST'){
    $user->redirect('appointments.php', 'NotPermitted');
}

$client_id = $_POST['client_id'];

if(empty($client_id)){
    $user->redirect('search_companyname.php', 'EmptyCompanyname');
}

$appointment = new Appointment();

$companyname = $appointment->getCompanyName($client_id);
$projectnames = $appointment->getProjectNames($client_id);

?>

<div class="container">
    <div class="main-part col-md-9">
        <header class="col-md-12">
            <div class="info-bar">
                <div class="col-md-12">
                    <h2>Add an appointment</h2>
                </div>
                <div class="col-md-12">
                    <h3><a href="search_companyname.php">< Go back</a></h3>
                </div>
            </div>
        </header>
        <section class="editclientphp">
        	<div class="clients-edit">                 
                    <div class="information-client-add col-md-12">
                        <form action="<?php echo BASE_URL; ?>/app/controller/appointmentcontroller.php" method="POST">
                            <div class="form-group">
                                <label for="exampleInputCompanyname">Companyname*</label>
                                <input type="text" class="form-control" id="exampleInputCompanyname" placeholder="Companyname" name="companyname" value="<?php echo $companyname; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputProject">Project*</label>
                                <select class="form-control" id="exampleInputProject" name="Project">
                                    <option></option>
                                    <?php
                                    foreach($projectnames as $projectname){
                                        echo "<option value='" . $projectname['project_id'] . "'>" . $projectname['projectname'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group relative">
                                <label for="datepicker">Date*</label>
                                <script>chooseDate();</script>
                                <input type="text" class="form-control chooseDate" placeholder="Date" name="Date" id="datepicker">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputTime">Time*</label>
                                <input type="time" class="form-control" id="exampleInputTime" placeholder="Time" name="Time">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputLocation">Location*</label>
                                <input type="text" class="form-control" id="exampleInputLocation" placeholder="Location" name="Location">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputSubject">Subject</label>
                                <textarea class="form-control" id="exampleInputSubject" placeholder="Subject" name="Subject"></textarea>
                            </div>
                             <p class="disclaimer">* Fields are required.</p>
                            <input type="submit" class="btn btn-primary" name="type" value="Add appointment">
                    </div>                        		
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
