<?php
require 'header.php';
use Respect\Validation\Validator as Validator;

$client = new Client();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['type'])){
        $input = $_POST['searchInput'];
        if(!Validator::notEmpty()->validate($input)){
            $user->redirect('customers.php', 'EmptySearchfield');
        }
        $clients = $client->searchInClients($input);

        if(empty($clients)){
            $user->redirect('customers.php', 'NoResultsFound');
        }
    }
    else {
        $clients = [];
        $clientInfo = $client->getAllClients();
        foreach($clientInfo as $client){
            $creditBalance = $user->calculateCreditBalance($client['client_id']);
            if($creditBalance < 0){
                array_push($clients, $client);
            }
        }
    }
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
                    <div class="col-md-8">
                    <?php
                    if($user->canModifyCustomer()){
                        echo "<h3 class='col-md-5'>
                                <a href='add-customer.php'>Add a client</a>
                            </h3>";
                    }
                    ?>
                        <form action="" method="POST" class="col-md-offset-3 col-md-4">
                            <input type="submit" class="btn btn-warning" name="overLimit" value="Clients over limit">
                        </form>
                    </div>
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
