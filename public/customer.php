<?php
require 'header.php';

$client = new Client();

$client_id = $_GET['id'];

if(!isset($client_id) || empty($client_id)){
    $user->redirect('customers.php', 'NotPermitted');
}

$customerData = $client->getClient($client_id);

$creditBalance = $user->calculateCreditBalance($client_id);

$secondInfo = [
    $customerData['adress2'],
    $customerData['zipcode2'],
    $customerData['residence2'],
    $customerData['phonenumber2'],
    $customerData['initials']
];

$extraInfo = [
    $customerData['bank_account_number'],
    $customerData['ledger_account_number'],
    $customerData['creditworthy'],
    '€ ' . $customerData['payment_limit'] . ',00',
];

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
                <div class="information-clients col-md-12">
                    <ul class="information-client col-md-3">
                        <p>Companyname</p>
                        <p>Adress</p>
                        <p>Zip code</p>
                        <p>City</p>
                        <p>Telephonenumber</p>

                        <?php
                        $infoFields = [
                            'Adress 2',
                            'Zipcode 2',
                            'Residence 2',
                            'Telephonenumber 2',
                            'Initials'
                        ];

                        for($i = 0; $i < 5; $i++){
                            if(!empty($secondInfo[$i])){
                                echo "<p>" . $infoFields[$i] . "</p>";
                            }
                        }
                        ?>

                        <p>Contact Person</p>
                        <p>E-mail adress</p>
                        <p>Bank account number</p>

                        <?php
                        if(!empty($extraInfo[1])){
                            echo "<p>Ledger account number</p>";
                        }
                        ?>

                        <p>Creditworthy</p>
                        <p>Payment limit</p>
                        <p>Credit balance</p>
                    </ul>
                    <ul class="information-client col-md-8">

                        <li><?php echo $customerData['companyname']; ?></li>
                        <li><?php echo $customerData['adress1']; ?></li>
                        <li><?php echo $customerData['zipcode1']; ?></li>
                        <li><?php echo $customerData['residence1']; ?></li>
                        <li><?php echo $customerData['phonenumber1']; ?></li>

                        <?php

                        for($i = 0; $i < 5; $i++){
                            if(!empty($secondInfo[$i])){
                                echo "<li>" . $secondInfo[$i] . "</li>";
                            }
                        }
                        ?>
                        <li><?php echo $customerData['contactperson']; ?></li>
                        <li><?php echo $customerData['emailadress']; ?></li>

                        <?php
                        for($i = 0; $i < count($extraInfo); $i++){
                            if($extraInfo[$i] == '0'){
                                $extraInfo[$i] = 'No';
                            }
                            if($extraInfo[$i] == '1'){
                                $extraInfo[$i] = 'Yes';
                            }

                            if(!empty($extraInfo[$i])){
                                echo "<li>" . $extraInfo[$i] . "</li>";
                            }
                        }
                        ?>

                        <li>€ <?php echo $creditBalance; ?>,00</li>
                    </ul>
                </div>
                <?php
                if($user->canModifyCustomer() || $user->canModifyInvoices()){
                    echo "<div class='editclients-button'><a href='edit-customer.php?id=" . $client_id . "'>Modify</a></div>";
                }
                ?>
        		
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
