<?php
require 'header.php';

if(!$user->canModifyCustomer()){
    $user->redirect('appointments.php', 'NotPermitted');
}

$appointment = new Appointment();

$appointmentInfo = $appointment->getCompanyNames();

?>

<div class="container">
    <div class="main-part col-md-9">
        <header class="col-md-12">
            <div class="info-bar">
                <div class="col-md-12">
                    <h2>Add an appointment</h2>
                </div>
                <div class="col-md-12">
                    <h3><a href="appointments.php">< Go back</a></h3>
                </div>
            </div>
        </header>
        <section class="editclientphp">
        	<div class="clients-edit">                 
                    <div class="information-client-add col-md-12">
                        <form action="add-appointment.php" method="POST">
                            <div class="form-group edit">
                                <label for="exampleInputCompanyname">Please select a company name.</label>
                                <select class="form-control" id="exampleInputCompanyname" name="client_id">
                                    <option></option>
                                    <?php
                                    foreach($appointmentInfo as $info){
                                        echo "<option value='" . $info['client_id'] . "'>" . $info['companyname'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Continue">
                        </form>
                    </div>                        		
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
