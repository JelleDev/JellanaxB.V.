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
                        <li>Adress 1</li>
                        <li>Zip code 1</li>
                        <li>City 1</li>
                        <li>Adress 2</li>
                        <li>Zip code 2</li>
                        <li>City 2</li>
                        <li>Contact Person</li>
                        <li>Initials</li>
                        <li>Telephonenumber 1</li>
                        <li>Telephonenumber 2</li>
                        <li>Faxnumber</li>
                        <li>E-mail adress</li>
                    </ul>
                    <ul class="information-client col-md-6">
                        <li><?php echo $customerData['companyname']; ?></li>
                        <li><?php echo $customerData['adress1']; ?></li>
                        <li>l</li>
                        <li>h</li>
                        <li>h</li>
                        <li>h</li>
                        <li>h</li>
                        <li>h</li>
                        <li>h</li>
                        <li>h</li>
                        <li>h</li>
                        <li>h</li>
                        <li>h</li>
                        <li>h</li>
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
