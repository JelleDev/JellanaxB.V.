<?php
require 'header.php';

$client = new Client();

$client_id = $_GET['id'];

$customerData = $client->getClient($client_id);
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
                                <label for="exampleInputCompanyname">Companyname*</label>
                                <input type="text" class="form-control" id="exampleInputCompanyname" value="<?php echo $customerData['companyname']; ?>" placeholder="Companyname"  name="companyname">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputAdress1">Adress1*</label>
                                <input type="text" class="form-control" id="exampleInputAdress1" value="<?php echo $customerData['adress1']; ?>" name="Adress1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputZipcode1">Zipcode1*</label>
                                <input type="text" class="form-control" id="exampleInputZipcode1" value="<?php echo $customerData['zipcode1']; ?>" name="Zipcode1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputCity1">City1*</label>
                                <input type="text" class="form-control" id="exampleInputCity1" value="<?php echo $customerData['residence1']; ?>" name="InputCity1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputAdress2">Adress2</label>
                                <input type="text" class="form-control" id="exampleInputAdress2" value="<?php echo $customerData['adress2']; ?>" name="Adress2">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputZipcode2">Zipcode2</label>
                                <input type="text" class="form-control" id="exampleInputZipcode2" value="<?php echo $customerData['zipcode2']; ?>" name="Zipcode2">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputCity2">City2</label>
                                <input type="text" class="form-control" id="exampleInputCity2" value="<?php echo $customerData['residence2']; ?>" name="City2">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputContactPerson">ContactPerson*</label>
                                <input type="text" class="form-control" id="exampleInputContactPerson" value="<?php echo $customerData['contactperson']; ?>" name="Contactperson">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputInitials">Initials</label>
                                <input type="text" class="form-control" id="exampleInputInitials" value="<?php echo $customerData['initials']; ?>" name="Initials">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputTelephonenumber1">Telephonenumber1*</label>
                                <input type="text" class="form-control" id="exampleInputTelephonenumber1" value="<?php echo $customerData['phonenumber1']; ?>" name="Telephonenumber1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputTelephonenumber2">Telephonenumber2</label>
                                <input type="text" class="form-control" id="exampleInputTelephonenumber2" value="<?php echo $customerData['phonenumber2']; ?>" name="Telephonenumber2">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputE-mailadress">E-mailadress*</label>
                                <input type="email" class="form-control" id="exampleInputE-mailadress" value="<?php echo $customerData['emailadress']; ?>" name="E-mailadress">
                            </div>
                            <p class="disclaimer">* Fields are required.</p>
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
