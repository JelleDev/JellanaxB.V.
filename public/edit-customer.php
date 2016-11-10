<?php
require 'header.php';


$client = new Client();

$client_id = $_GET['id'];

if(!isset($client_id) || empty($client_id)){
    $user->redirect('customers.php', 'NotPermitted');
}

if(!($user->canModifyCustomer() || $user->canModifyInvoices())){
    $user->redirect('customer.php', 'id=' . $client_id . '&NotPermitted');
}

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
                        <input type="hidden" name="client_id" value="<?php echo $client_id; ?>">
                        <?php
                        if($user->canModifyCreditworthy()){
                            $selected = '';
                            if($customerData['creditworthy'] == '0'){
                                $selected = 'selected';
                            }
                            echo "<div class='form-group'>
                                    <label for='creditworthy'>Creditworthy</label>
                                    <select class='form-control' name='creditworthy' id='creditworthy'>
                                        <option value='1'>Yes</option>
                                        <option value='0'" . $selected . ">No</option>
                                    </select>
                                </div>";
                        }
                        else {
                            echo "<div class='form-group'>
                                    <label for='exampleInputCompanyname'>Companyname*</label>
                                    <input type='text' class='form-control' id='exampleInputCompanyname' value='" . $customerData['companyname'] . "' placeholder='Companyname'  name='companyname'>
                                </div>
                                <div class='form-group'>
                                    <label for='exampleInputAdress1'>Adress*</label>
                                    <input type='text' class='form-control' id='exampleInputAdress1' value='" . $customerData['adress1'] . "' placeholder='Adress' name='Adress1'>
                                </div>
                                <div class='form-group'>
                                    <label for='exampleInputZipcode1'>Zipcode*</label>
                                    <input type='text' class='form-control' id='exampleInputZipcode1' value='" . $customerData['zipcode1'] . "' placeholder='Zipcode' name='Zipcode1'>
                                </div>
                                <div class='form-group'>
                                    <label for='exampleInputCity1'>City*</label>
                                    <input type='text' class='form-control' id='exampleInputCity1' value='" . $customerData['residence1'] . "' placeholder='City' name='InputCity1'>
                                </div>
                                <div class='form-group'>
                                    <label for='exampleInputTelephonenumber1'>Telephonenumber*</label>
                                    <input type='text' class='form-control' id='exampleInputTelephonenumber1' value='" . $customerData['phonenumber1'] . "' placeholder='Phonenumber' name='Telephonenumber1'>
                                </div>
                                <div class='form-group'>
                                    <label for='exampleInputAdress2'>Adress 2</label>
                                    <input type='text' class='form-control' id='exampleInputAdress2' value='" . $customerData['adress2'] . "' placeholder='Adress' name='Adress2'>
                                </div>
                                <div class='form-group'>
                                    <label for='exampleInputZipcode2'>Zipcode 2</label>
                                    <input type='text' class='form-control' id='exampleInputZipcode2' value='" . $customerData['zipcode2'] . "' placeholder='Zipcode' name='Zipcode2'>
                                </div>
                                <div class='form-group'>
                                    <label for='exampleInputCity2'>City 2</label>
                                    <input type='text' class='form-control' id='exampleInputCity2' value='" . $customerData['residence2'] . "' placeholder='City' name='City2'>
                                </div>
                                <div class='form-group'>
                                    <label for='exampleInputTelephonenumber2'>Telephonenumber 2</label>
                                    <input type='text' class='form-control' id='exampleInputTelephonenumber2' value='" . $customerData['phonenumber2'] . "' placeholder='Phonenumber' name='Telephonenumber2'>
                                </div>
                                <div class='form-group'>
                                    <label for='exampleInputInitials'>Initials</label>
                                    <input type='text' class='form-control' id='exampleInputInitials' value='" . $customerData['initials'] . "' placeholder='Initials' name='Initials'>
                                </div>
                                <div class='form-group'>
                                    <label for='exampleInputContactPerson'>Contactperson*</label>
                                    <input type='text' class='form-control' id='exampleInputContactPerson' value='" . $customerData['contactperson'] . "' placeholder='Contactperson' name='Contactperson'>
                                </div>
                                <div class='form-group'>
                                    <label for='exampleInputE-mailadress'>E-mailadress*</label>
                                    <input type='text' class='form-control' id='exampleInputE-mailadress' value='" . $customerData['emailadress'] . "' placeholder='Emailadress' name='E-mailadress'>
                                </div>
                                <div class='form-group'>
                                    <label for='exampleInputBank-account-number'>Bank-account-number*</label>
                                    <input type='text' class='form-control' id='exampleInputBank-account-number' value='" . $customerData['bank_account_number'] . "' placeholder='Bank-account-number' name='Bank-account-number'>
                                </div>
                                <div class='form-group'>
                                    <label for='exampleInputLedger-account-number'>Ledger-account-number</label>
                                    <input type='text' class='form-control' id='exampleInputLedger-account-number' value='" . $customerData['ledger_account_number'] . "' placeholder='Ledger-account-number' name='Ledger-account-number'>
                                </div>
                                <div class='form-group'>
                                    <label for='exampleInputPayment-limit'>Payment-limit*</label>
                                    <input type='text' class='form-control' id='exampleInputPayment-limit' value='" . $customerData['payment_limit'] . "' placeholder='Payment-limit' name='Payment-limit'>
                                </div>";
                                if($user->canAccesAll()){
                                    $selected = '';
                                    if($customerData['creditworthy'] == '0'){
                                        $selected = 'selected';
                                    }
                                    echo "<div class='form-group'>
                                            <label for='creditworthy'>Creditworthy</label>
                                            <select class='form-control' name='creditworthy' id='creditworthy'>
                                                <option value='1'>Yes</option>
                                                <option value='0'" . $selected . ">No</option>
                                            </select>
                                        </div>";
                                }
                        }
                        ?>
                        <p class="disclaimer">* Fields are required.</p>
                        <input type="submit" class="btn btn-primary" name="type" value="Save changes">
                    </form>
                </div>
        	</div>
        </section>
    </div>
    <aside class="col-md-3">
    	<div class="aside-clients">
    		<ul class="aside-client">
    			<li class="logged_in_as"><?php echo $user->getRole(); ?></li>
                <li class="active"><a href="customers.php">Clients</a></li>
                <li><a href="appointments.php">Appointments</a></li>
                <li><a href="projects.php">Projects</a></li>
                <li><a href="invoices.php">Invoices</li>
                <?php
                if($user->canAccesAll()){
                    echo "<li><a href='users.php'>Users</a></li>
                              <li><a href='inactive.php'>Inactive</a></li>";
                }
                ?>
    		</ul>
    	</div>
    </aside>
</div>

<?php
require 'footer.php';
?>
