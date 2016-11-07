<?php
require 'header.php';

if(!$user->canModifyProjects()){
    $user->redirect('projects.php', 'NotPermitted');
}

$project = new Project();

$clientInfo = $project->getCompanyName();
?>

<div class="container">
    <div class="main-part col-md-9">
        <header class="col-md-12">
            <div class="info-bar">
                <div class="col-md-12">
                    <h2>Add a Project</h2>
                </div>
                <div class="col-md-12">
                    <h3><a href="projects.php">< Go back</a></h3>
                </div>
            </div>
        </header>
        <section class="editclientphp">
        	<div class="clients-edit">                 
                    <div class="information-client-add col-md-12">
                        <form action="<?php echo BASE_URL;?>/app/controller/projectcontroller.php" method="post">
                            <div class="form-group">
                                <label for="exampleInputCompanyname">Companyname*</label>
                                <select class="form-control" id="exampleInputCompanyname" name="Client_id">
                                    <option></option>
                                    <?php
                                    foreach($clientInfo as $info){
                                        echo "<option value='" . $info['client_id'] . "'>" . $info['companyname'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputProjectname">Projectname*</label>
                                <input type="text" class="form-control" id="exampleInputProjectname" placeholder="Projectname" name="Projectname">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputMaintenencecontract">Maintenance contract*</label>
                                <select class="form-control" id="exampleInputMaintenancecontract" name="Maintenencecontract">
                                    <option></option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="form-group relative">
                                <label for="datepicker">Deadline*</label>
                                <script>chooseDate();</script>
                                <input type="text" class="form-control chooseDate" placeholder="Deadline" name="Deadline" id="datepicker">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputHardware">Hardware</label>
                                <input type="text" class="form-control" id="exampleInputHardware" placeholder="Hardware" name="InputHardware">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputOperating-system">Operating-system</label>
                                <input type="text" class="form-control" id="exampleInputOperating-system" placeholder="Operating-system" name="Operating-system">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputApplication">Application</label>
                                <input type="text" class="form-control" id="exampleInputApplication" placeholder="Application" name="Application">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputOffernumber">Offernumber*</label>
                                <input type="text" class="form-control" id="exampleInputOffernumber" placeholder="Offernumber" name="Offernumber">
                            </div>
                             <div class="form-group">
                                <label for="exampleInputOfferstatus">Offerstatus*</label>
                                <select class="form-control" id="exampleInputOfferstatus" name="Offerstatus">
                                    <option></option>
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputSubject">Subject*</label>
                                <textarea class="form-control" id="exampleInputSubject" placeholder="Subject" name="Subject"></textarea>
                            </div>
                             <p class="disclaimer">* Fields are required.</p>
                            <input type="submit" class="btn btn-primary" name="type" value="Add project">
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
