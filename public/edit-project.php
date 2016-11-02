<?php
require 'header.php';

$project = new Project();

$project_id = $_GET['id'];

$projectInfo = $project->getProjectInfo($project_id);

$companyInfo = $project->getCompanyName();
?>

<div class="container">
    <div class="main-part col-md-9">
        <header class="col-md-12">
            <div class="info-bar">
                <div class="col-md-12">
                    <h2>Edit Project</h2>
                </div>
                <div class="col-md-12">
                    <h3><a href="projects.php">< Go back</a></h3>
                </div>
            </div>
        </header>
        <section class="editclientphp">
        	<div class="clients-edit">                 
                    <div class="information-client-add col-md-12">
                        <form action="<?php echo BASE_URL; ?>/app/controller/projectcontroller.php" method="POST">
                            <div class="form-group">
                                <label class="sr-only" for="hiddenid">Project_id</label>
                                <input type="hidden" id="hiddenid" name="Project_id" value="<?php echo $project_id; ?>">
                                <label for="exampleInputCompanyname">Companyname*</label>
                                <select class="form-control" id="exampleInputCompanyname" name="Client_id">
                                    <?php
                                    foreach($companyInfo as $info){
                                        if($projectInfo['companyname'] == $info['companyname']){
                                            echo "<option value='" . $info['client_id'] . "'selected>" . $info['companyname'] . "</option>";
                                        }
                                        else {
                                            echo "<option value='" . $info['client_id'] . "'>" . $info['companyname'] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputProjectname">Projectname*</label>
                                <input type="text" class="form-control" id="exampleInputProjectname" placeholder="Projectname" name="Projectname" value="<?php echo $projectInfo['projectname']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputMaintenencecontract">Maintenance contract*</label>
                                <select class="form-control" id="exampleInputMaintenencecontract" name="Maintenencecontract">
                                    <?php
                                    $maintenance = $projectInfo['maintenance_contract'];
                                    if($maintenance == 1){
                                     echo "<option value='Yes'>Yes</option>
                                        <option value='No'>No</option>";
                                    }
                                    else {
                                        echo "<option value='Yes'>Yes</option>
                                            <option value='No' selected>No</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group relative">
                                <label for="datepicker">Deadline*</label>
                                <script>chooseDate();</script>
                                <input type="text" class="form-control chooseDate" placeholder="Deadline" name="Deadline" id="datepicker" value="<?php echo date('m-d-Y', strtotime($projectInfo['deadline'])); ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputHardware">Hardware</label>
                                <input type="text" class="form-control" id="exampleInputHardware" placeholder="Hardware" name="InputHardware" value="<?php echo $projectInfo['hardware']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputOperating-system">Operating-system</label>
                                <input type="text" class="form-control" id="exampleInputOperating-system" placeholder="Operating-system" name="Operating-system" value="<?php echo $projectInfo['operating_system']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputApplication">Application</label>
                                <input type="text" class="form-control" id="exampleInputApplication" placeholder="Application" name="Application" value="<?php echo $projectInfo['application']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputOffernumber">Offernumber*</label>
                                <input type="text" class="form-control" id="exampleInputOffernumber" placeholder="Offernumber" name="Offernumber" value="<?php echo $projectInfo['offernumber']; ?>">
                            </div>
                             <div class="form-group">
                                <label for="exampleInputOfferstatus">Offerstatus*</label>
                                <select class="form-control" id="exampleInputOfferstatus" name="Offerstatus">
                                    <?php
                                    $status = $projectInfo['offerstatus'];
                                    if($status == 1){
                                        echo "<option value='Active'>Active</option>
                                        <option value='Inactive'>Inactive</option>";
                                    }
                                    else {
                                        echo "<option value='Active'>Active</option>
                                            <option value='Inactive' selected>Inactive</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputSubject">Subject*</label>
                                <textarea class="form-control" id="exampleInputSubject" placeholder="Subject" name="Subject"><?php echo $projectInfo['project_subject']; ?></textarea>
                            </div>
                            <input type="submit" class="btn btn-primary" name="type" value="Save changes">
                    </div>
                </ul>
                  
        		
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
