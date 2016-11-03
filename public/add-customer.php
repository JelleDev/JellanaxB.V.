<?php
require 'header.php';

if(!$user->canModifyCustomer()){
    $user->redirect('customers.php', 'NotPermitted');
}

?>

<div class="container">
    <div class="main-part col-md-9">
        <header class="col-md-12">
            <div class="info-bar">
                <div class="col-md-12">
                    <h2>Client info</h2>
                </div>
                <div class="col-md-12">
                    <h3><a href="customers.php">< Go back</a></h3>
                </div>
            </div>
        </header>
        <section class="editclientphp">
        	<div class="clients-edit">                 
                    <div class="information-client-add col-md-12">
                        <form action="<?php echo BASE_URL . '/app/controller/clientcontroller.php'; ?>" method="POST">
                            <div class="form-group">
                                <label for="exampleInputCompanyname">Companyname*</label>
                                <input type="text" class="form-control" id="exampleInputCompanyname" placeholder="Companyname" name="companyname">
                                </div>
                            <div class="form-group">
                                <label for="exampleInputAdress1">Adress*</label>
                                <input type="text" class="form-control" id="exampleInputAdress1" placeholder="Adress" name="Adress1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputZipcode1">Zipcode*</label>
                                <input type="text" class="form-control" id="exampleInputZipcode1" placeholder="Zipcode" name="Zipcode1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputCity1">City*</label>
                                <input type="text" class="form-control" id="exampleInputCity1" placeholder="City" name="InputCity1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputTelephonenumber1">Phonenumber*</label>
                                <input type="text" class="form-control" id="exampleInputTelephonenumber1" placeholder="Phonenumber" name="Telephonenumber1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputAdress2">Adress 2</label>
                                <input type="text" class="form-control" id="exampleInputAdress2" placeholder="Adress" name="Adress2">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputZipcode2">Zipcode 2</label>
                                <input type="text" class="form-control" id="exampleInputZipcode2" placeholder="Zipcode" name="Zipcode2">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputCity2">City 2</label>
                                <input type="text" class="form-control" id="exampleInputCity2" placeholder="City" name="City2">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputTelephonenumber2">Phonenumber 2</label>
                                <input type="text" class="form-control" id="exampleInputTelephonenumber2" placeholder="Phonenumber" name="Telephonenumber2">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputInitials">Initials</label>
                                <input type="text" class="form-control" id="exampleInputInitials" placeholder="Initials" name="Initials">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputContactPerson">ContactPerson*</label>
                                <input type="text" class="form-control" id="exampleInputContactPerson" placeholder="ContactPerson" name="Contactperson">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputE-mailadress">Emailadress*</label>
                                <input type="email" class="form-control" id="exampleInputE-mailadress" placeholder="Emailadress" name="E-mailadress">
                            </div>
                             <div class="form-group">
                            <label for="exampleInputBank-account-number">Bank-account-number*</label>
                            <input type="email" class="form-control" id="exampleInputBank-account-number" placeholder="Bank-account-number" name="Bank-account-number">
                        </div>
                         <div class="form-group">
                            <label for="exampleInputPayment-limit">Payment-limit</label>
                            <input type="email" class="form-control" id="exampleInputPayment-limit" placeholder="Payment-limit" name="Payment-limit">
                        </div>
                         <div class="form-group">
                            <label for="exampleInputPotential-client">Potential-client</label>
                            <input type="email" class="form-control" id="exampleInputPotential-client" placeholder="Potential-client" name="Potential-client">
                        </div>
                         <div class="form-group">
                            <label for="exampleInputSales-person">Sales-person*</label>
                            <input type="email" class="form-control" id="exampleInputSales-person" placeholder="Sales-person" name="Sales-person">
                        </div>
                         <div class="form-group">
                            <label for="exampleInputLast-contact">Last-contact*</label>
                            <input type="email" class="form-control" id="exampleInputLast-contact" placeholder="Last-contact" name="Last-contact">
                        </div>
                         <div class="form-group">
                            <label for="exampleInputSales-percentage">Sales-percentage*</label>
                            <input type="email" class="form-control" id="exampleInputSales-percentage" placeholder="Sales-percentage" name="Sales-percentage">
                        </div>
                         <div class="form-group">
                            <label for="exampleInputCreditworthy">Creditworthy*</label>
                            <input type="email" class="form-control" id="exampleInputCreditworthy" placeholder="Creditworthy" name="Creditworthy">
                        </div>
                         <div class="form-group">
                            <label for="exampleInputCreditbalance">Creditbalance*</label>
                            <input type="email" class="form-control" id="exampleInputCreditbalance" placeholder="Creditbalance" name="Creditbalance">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputGrss-revenue">Grss-revenue*</label>
                            <input type="email" class="form-control" id="exampleInputGrss-revenue" placeholder="Grss-revenue" name="Grss-revenue">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputLedger-account-number">Ledger-account-number*</label>
                            <input type="email" class="form-control" id="exampleInputLedger-account-number" placeholder="Ledger-account-number" name="Ledger-account-number">
                        </div>

                            <p class="disclaimer">* Fields are required.</p>
                            <input type="submit" class="btn btn-primary" name="type" value="Add customer">
                    </div>
                </ul>
                  
        		
        	</div>
        </section>
    </div>
    <aside class="col-md-3">
    	<div class="aside-clients">
    		<ul class="aside-client">
    			<li class="logged_in_as"><?php echo $user->getRole(); ?></li>
                <li class="active"><a href="customers.php">Clients</a></li>
                <?php
                if($user->canAccesUsers()){
                    echo "<li><a href='users.php'>Users</a></li>";
                }
                ?>
                <li><a href="appointments.php">Appointments</a></li>
                <li><a href="projects.php">Projects</a></li>
                <li><a href="invoices.php">Invoices</li>
    		</ul>
    	</div>
    </aside>
</div>

<?php
require 'footer.php';
?>
