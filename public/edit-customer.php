<?php
require 'header.php';
?>

<div class="container">
    <div class="main-part col-md-9">
        <header class="col-md-12">
            <div class="info-bar">
                <div class="col-md-12">
                    <h2>Edit Client Information</h2>
                </div>
                <div class="col-md-12">
                    <h3><a href="customer.php">< Go back</a></h3>
                </div>
            </div>
        </header>
        <section class="editclientphp">
        	<div class="clients-edit">                 
                    <div class="information-client-add col-md-12">
                        <form>
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputCompanyname">Email address</label>
                                <input type="text" class="form-control" id="exampleInputCompanyname" placeholder="Companyname" name="companyname">
                                </div>
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputAdress1">Adress1</label>
                                <input type="text" class="form-control" id="exampleInputAdress1" placeholder="Adress1" name="Adress1">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputHousenumber1">Housenumber1</label>
                                <input type="text" class="form-control" id="exampleInputHousenumber1" placeholder="Housenumber1" name="Housenumber1">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputZipcode1">Zipcode1</label>
                                <input type="text" class="form-control" id="exampleInputZipcode1" placeholder="Zipcode1" name="Zipcode1">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputCity1">City1</label>
                                <input type="text" class="form-control" id="exampleInputCity1" placeholder="City1" name="InputCity1">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputAdress2">Adress2</label>
                                <input type="text" class="form-control" id="exampleInputAdress2" placeholder="Adress2" name="Adress2">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputHousenumber2">Housenumber2</label>
                                <input type="text" class="form-control" id="exampleInputHousenumber2" placeholder="Housenumber2" name="Housenumber2">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputZipcode2">Zipcode2</label>
                                <input type="text" class="form-control" id="exampleInputZipcode2" placeholder="Zipcode2" name="Zipcode2">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputCity2">City2</label>
                                <input type="text" class="form-control" id="exampleInputCity2" placeholder="City2" name="City2">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputContactPerson">ContactPerson</label>
                                <input type="text" class="form-control" id="exampleInputContactPerson" placeholder="ContactPerson" name="Contactperson">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputInitials">Initials</label>
                                <input type="text" class="form-control" id="exampleInputInitials" placeholder="Initials" name="Initials">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputTelephonenumber1">Telephonenumber1</label>
                                <input type="text" class="form-control" id="exampleInputTelephonenumber1" placeholder="Telephonenumber1" name="Telephonenumber1">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputTelephonenumber2">Telephonenumber2</label>
                                <input type="text" class="form-control" id="exampleInputTelephonenumber2" placeholder="Telephonenumber2" name="Telephonenumber2">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputE-mailadress">E-mailadress</label>
                                <input type="email" class="form-control" id="exampleInputE-mailadress" placeholder="E-mailadress" name="E-mailadress">
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
                <li class="active"><a href="customers.php">Clients</a></li>
                <li><a href="users.php">Users</a></li>
                <li><a href="appointments.php">Appointments</a></li>
                <li><a href="projects.php">Projects</a></li
    		</ul>
    	</div>
    </aside>
</div>

<?php
require 'footer.php';
?>
