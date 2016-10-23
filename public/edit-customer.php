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
                    <h3><a href="customer.php<?php echo '?id=' . $client_id; ?>">< Go back</a></h3>
                </div>
            </div>
        </header>
        <section class="editclientphp">
        	<div class="clients-edit">                 
                <div class="information-client-add col-md-12">
                    <form action="<?php echo BASE_URL ?>/app/controller/clientcontroller.php" method="post">
                        <div class="form-group">
                            <label for="exampleInputCompanyname">Companyname*</label>
                            <input type="text" class="form-control" id="exampleInputCompanyname" value="<?php echo $customerData['companyname']; ?>" placeholder="Companyname"  name="companyname">
                        </div>
                        <div class="form-group">

                            <label for="exampleInputAdress1">Adress*</label>
                            <input type="text" class="form-control" id="exampleInputAdress1" value="<?php echo $customerData['adress1']; ?>" placeholder="Adress" name="Adress1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputZipcode1">Zipcode*</label>
                            <input type="text" class="form-control" id="exampleInputZipcode1" value="<?php echo $customerData['zipcode1']; ?>" placeholder="Zipcode" name="Zipcode1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputCity1">City*</label>
                            <input type="text" class="form-control" id="exampleInputCity1" value="<?php echo $customerData['residence1']; ?>" placeholder="City" name="InputCity1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputTelephonenumber1">Telephonenumber*</label>
                            <input type="text" class="form-control" id="exampleInputTelephonenumber1" value="<?php echo $customerData['phonenumber1']; ?>" placeholder="Phonenumber" name="Telephonenumber1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputAdress2">Adress 2</label>
                            <input type="text" class="form-control" id="exampleInputAdress2" value="<?php echo $customerData['adress2']; ?>" placeholder="Adress 2" name="Adress2">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputZipcode2">Zipcode 2</label>
                            <input type="text" class="form-control" id="exampleInputZipcode2" value="<?php echo $customerData['zipcode2']; ?>" placeholder="Zipcode 2" name="Zipcode2">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputCity2">City 2</label>
                            <input type="text" class="form-control" id="exampleInputCity2" value="<?php echo $customerData['residence2']; ?>" placeholder="City 2" name="City2">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputTelephonenumber2">Telephonenumber 2</label>
                            <input type="text" class="form-control" id="exampleInputTelephonenumber2" value="<?php echo $customerData['phonenumber2']; ?>" placeholder="Phonenumber 2" name="Telephonenumber2">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputContactPerson">ContactPerson*</label>
                            <input type="text" class="form-control" id="exampleInputContactPerson" value="<?php echo $customerData['contactperson']; ?>" placeholder="Contactperson" name="Contactperson">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputInitials">Initials</label>
                            <input type="text" class="form-control" id="exampleInputInitials" value="<?php echo $customerData['initials']; ?>" placeholder="Initials" name="Initials">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputE-mailadress">E-mailadress*</label>
                            <input type="email" class="form-control" id="exampleInputE-mailadress" value="<?php echo $customerData['emailadress']; ?>" placeholder="Emailadress" name="E-mailadress">
                        </div>
                        <p class="disclaimer">* Fields are required.</p>
                        <input type="submit" class="btn btn-primary" value="Save changes">
                    </form>
                </div>
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
