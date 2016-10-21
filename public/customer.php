<?php
require 'header.php';

$client = new Client();

$client_id = $_GET['id'];

$customerData = $client->getClient($client_id);

$secondInfo = [
    $customerData['adress2'],
    $customerData['zipcode2'],
    $customerData['residence2'],
    $customerData['phonenumber2']
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
                    <ul class="information-client col-md-6">
                        <li>Companyname</li>
                        <li>Adress</li>
                        <li>Zip code</li>
                        <li>City</li>
                        <li>Telephonenumber</li>

                        <?php
                        $infoFields = [
                            'Adress 2',
                            'Zipcode 2',
                            'Residence 2',
                            'Telephonenumber 2'
                        ];

                        for($i = 0; $i < 4; $i++){
                            if(!is_null($secondInfo[$i])){
                                echo "<li>" . $infoFields[$i] . "</li>";
                            }
                        }
                        ?>

                        <li>Contact Person</li>
                        <li>E-mail adress</li>
                    </ul>
                    <ul class="information-client col-md-6">
                        <li><?php echo $customerData['companyname']; ?></li>
                        <li><?php echo $customerData['adress1']; ?></li>
                        <li><?php echo $customerData['zipcode1']; ?></li>
                        <li><?php echo $customerData['residence1']; ?></li>
                        <li><?php echo $customerData['phonenumber1']; ?></li>

                        <?php
                        for($i = 0; $i < 4; $i++){
                            if(!is_null($secondInfo[$i])){
                                echo "<li>" . $secondInfo[$i] . "</li>";
                            }
                        }
                        ?>
                        <li><?php echo $customerData['contactperson']; ?></li>
                        <li><?php echo $customerData['emailadress']; ?></li>
                    </ul>
                </div>
                <div class="editclients-button"><a href="#">Modify</a></div>
                  
        		
        	</div>
        </section>
    </div>
    <aside class="col-md-3">
    	<div class="aside-clients">
    		<ul class="aside-client">
    			<li class="logged_in_as">Admin</li>
    			<active><li><a href="customers.php">Clients</a></li></active>
    			<li>Users</li>
    			<li>Appointments</li>
    			<li>Projects</li>
    		</ul>
    	</div>
    </aside>
</div>

<?php
require 'footer.php';
?>
