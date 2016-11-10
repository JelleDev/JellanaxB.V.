<?php
require 'header.php';
use Respect\Validation\Validator as Validator;

$client = new Client();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $input = $_POST['searchInput'];
    var_dump($input);
    if(!Validator::notEmpty()->validate($input)){
        $user->redirect('customers.php', 'EmptySearchfield');
    }
    $clients = $client->searchInClients($input);
}
else {
    $clients = $client->getAllClients();
}

$clientCount = count($clients);
?>

<div class="container">
    <div class="main-part col-md-9">
        <header class="col-md-12">
            <div class="info-bar">
                <div class="col-md-12">
                    <h2><?php echo $clientCount . ' Results found'; ?> </h2>
                </div>
                <div class="col-md-12">
                    <?php
                    if($user->canModifyCustomer()){
                        echo "<div class='col-md-8'>
                                <h3>
                                    <a href='add-customer.php'>Add a client</a>
                                </h3>
                            </div>";
                    }
                    ?>
                    <form class="form-inline col-md-4" action="customers.php" method="POST">
                        <div class="form-group">
                            <label class="sr-only" for="searchbar"></label>
                            <input type="text" name="searchInput" id="searchbar" placeholder="Companyname">
                        </div>
                        <input type="submit" class="btn btn-primary" name="type" value="Search">
                    </form>
                </div>
            </div>
        </header>
        <section class="information">
        	<div class="clients">
        		<ul class="client col-md-12">
        			<li class="col-md-3 bold">Companyname</li>
        			<li class="col-md-2 bold">Telephonenumber</li>
        			<li class="col-md-3 bold">Customername</li>
        			<li class="col-md-4 bold">E-mail adress</li>
        		</ul>
				<?php
				foreach ($clients as $customer){
					$client_id = $customer['client_id'];
					echo "<ul class='client col-md-12'>
						<li class='col-md-3'><a href='http://localhost/JellanaxB.V/public/customer.php?id=" . $client_id ."'>" . $customer['companyname'] . "</a></li>
						<li class='col-md-2'>" . $customer['phonenumber1'] . "</li>
						<li class='col-md-3'>" . $customer['contactperson'] . "</li>
						<li class='col-md-4'>" . $customer['emailadress'] . "</li>
						</ul>";
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
