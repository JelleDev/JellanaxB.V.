<?php
require 'header.php';
?>

<div class="container">
    <div class="main-part col-md-9">
        <header class="col-md-12">
            <div class="info-bar">
                <div class="col-md-12">
                    <h2>Add a user</h2>
                </div>
                <div class="col-md-12">
                    <h3><a href="customers.php">< Go back</a></h3>
                </div>
            </div>
        </header>
        <section class="editclientphp">
        	<div class="clients-edit">                 
                    <div class="information-client-add col-md-12">
                        <form>
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputCompanyname">Username</label>
                                <input type="text" class="form-control" id="exampleInputCompanyname" placeholder="Username" name="username">
                                </div>
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputAdress1">Password</label>
                                <input type="text" class="form-control" id="exampleInputAdress1" placeholder="Password" name="password">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputHousenumber1">Department</label>
                                <input type="text" class="form-control" id="exampleInputHousenumber1" placeholder="Department" name="department">
                            </div>
                            <input type="submit" class="btn btn-primary" value="add user">
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
                <li class="active"><a href="users.php">Users</a></li>
                <li><a href="appointments.php">Appointments</a></li>
                <li><a href="projects.php">Projects</a></li
    		</ul>
    	</div>
    </aside>
</div>

<?php
require 'footer.php';
?>
