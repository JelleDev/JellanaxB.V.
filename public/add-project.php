<?php
require 'header.php';

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
                        <form>
                            <div class="form-group">
                                <label for="exampleInputCompanyname">Companyname*</label>
                                <select class="form-control" id="exampleInputCompanyname" name="companyname">
                                    <option></option>
                                    <?php
                                    foreach($clientInfo as $info){
                                        $companyname = $info['companyname'];
                                        echo "<option value='" . $companyname . "'>" . $companyname . "</option>";
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
                                <input type="text" class="form-control" id="exampleInputMaintenancecontract" placeholder="Maintenance contract" name="Maintenencecontract">
                            </div>
                            <div class="form-group relative">
                                <label for="datepicker">Deadline</label>
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
                                <input type="text" class="form-control" id="exampleInputOfferstatus" placeholder="Offerstatus" name="Offerstatus">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputSubject">Subject</label>
                                <textarea class="form-control" id="exampleInputSubject" placeholder="Subject" name="Subject"></textarea>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Save changes">
                    </div>                        		
        	</div>
        </section>
    </div>
    <aside class="col-md-3">
    	<div class="aside-clients">
    		<ul class="aside-client">
    			<li class="logged_in_as">Admin</li>
                <li><a href="customers.php">Clients</a></li>
                <li><a href="users.php">Users</a></li>
                <li><a href="appointments.php">Appointments</a></li>
                <li class="active"><a href="projects.php">Projects</a></li>
    		</ul>
    	</div>
    </aside>
</div>

<?php
require 'footer.php';
?>
