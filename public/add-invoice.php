<?php
require 'header.php';
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
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputClientname">Clientname*</label>
                                <input type="text" class="form-control" id="exampleInputClientname" placeholder="Clientname" name="Clientname">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputDate">Date*</label>
                                <input type="text" class="form-control" id="exampleInputDate" placeholder="Date" name="Date">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputContactperson">Contactperson*</label>
                                <input type="text" class="form-control" id="exampleInputContactperson" placeholder="Contactperson" name="Contactperson">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputProject">Project*</label>
                                <input type="text" class="form-control" id="exampleInputProject" placeholder="Project" name="Project">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPhonenumber">Phonenumber*</label>
                                <input type="text" class="form-control" id="exampleInputPhonenumber" placeholder="Phonenumber" name="Phonenumber">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputLimit">Limit*</label>
                                <input type="text" class="form-control" id="exampleInputLimit" placeholder="Limit" name="Limit">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputAmount">Amount*</label>
                                <input type="text" class="form-control" id="exampleInputAmount" placeholder="Amount" name="Amount">
                            </div>
                             <div class="form-group">
                                <label for="exampleInputPayment Date">Payment Date*</label>
                                <input type="text" class="form-control" id="exampleInputPayment Date" placeholder="Payment Date" name="Payment Date">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputTerms">Terms (Y/N)*</label>
                                <input class="form-control" id="exampleInputTerms" placeholder="Terms (Y/N)" name="Terms">
                            </div>
                            <input type="submit" class="btn btn-primary" value="Save">
                    </div>                        		
        	</div>
        </section>
    </div>
    <aside class="col-md-3">
    	<div class="aside-clients">
    		<ul class="aside-client">
    			<li class="logged_in_as">Admin</li>
                <li><a href="customers.php">Clients</a></li>
                <li><a href="appointments.php">Appointments</a></li>
                <li><a href="projects.php">Projects</a></li>
                <li class="active"><a href="invoices.php">Invoices</li>
    		</ul>
    	</div>
    </aside>
</div>

<?php
require 'footer.php';
?>
