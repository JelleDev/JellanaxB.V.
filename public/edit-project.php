<?php
require 'header.php';
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
                        <form>
                            <div class="form-group">
                                <label for="exampleInputCompanyname">Companyname*</label>
                                <input type="text" class="form-control" id="exampleInputCompanyname" placeholder="Companyname" name="companyname">
                                </div>
                            <div class="form-group">
                                <label for="exampleInputProjectname">Projectname*</label>
                                <input type="text" class="form-control" id="exampleInputProjectname" placeholder="Projectname" name="Projectname">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputDeadline">Deadline</label>
                                <input type="text" class="form-control" id="exampleInputDeadline" placeholder="Deadline" name="Deadline">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputMaintenencecontract">Maintenence contract*</label>
                                <input type="text" class="form-control" id="exampleInputMaintenencecontract" placeholder="Maintenencecontract" name="Maintenencecontract">
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
                            <input type="submit" class="btn btn-primary" value="Save changes    ">
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
