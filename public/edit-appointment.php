<?php
require 'header.php';
?>

<div class="container">
    <div class="main-part col-md-9">
        <header class="col-md-12">
            <div class="info-bar">
                <div class="col-md-12">
                    <h2>Edit Appointment</h2>
                </div>
                <div class="col-md-12">
                    <h3><a href="appointment.php">< Go back</a></h3>
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
                                <label for="exampleInputCustomername">Customername*</label>
                                <input type="text" class="form-control" id="exampleInputCustomername" placeholder="Customername" name="Customername">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputLocation">Location*</label>
                                <input type="text" class="form-control" id="exampleInputLocation" placeholder="Location" name="Location">
                            </div>
                            <div class="form-group relative">
                                <label for="datepicker">Date*</label>
                                <script>chooseDate();</script>
                                <input type="text" class="form-control chooseDate" placeholder="Date" name="Date" id="datepicker">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputTime">Time*</label>
                                <input type="text" class="form-control" id="exampleInputTime" placeholder="Time" name="Time">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputContactperson">Contactperson*</label>
                                <input type="text" class="form-control" id="exampleInputContactperson" placeholder="Contactperson" name="InputContactperson">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputProject">Project*</label>
                                <input type="text" class="form-control" id="exampleInputProject" placeholder="Project" name="Project">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputTelephonenumber">Telephonenumber*</label>
                                <input type="text" class="form-control" id="exampleInputTelephonenumber" placeholder="Telephonenumber" name="Telephonenumber">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputE-mail">E-mail*</label>
                                <input type="text" class="form-control" id="exampleInputE-mail" placeholder="E-mail" name="E-mail">
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
    			<li class="logged_in_as">Admin</li>
                <li><a href="customers.php">Clients</a></li>
                <li><a href="users.php">Users</a></li>
                <li class="active"><a href="appointments.php">Appointments</a></li>
                <li><a href="projects.php">Projects</a></li>
    		</ul>
    	</div>
    </aside>
</div>

<?php
require 'footer.php';
?>
