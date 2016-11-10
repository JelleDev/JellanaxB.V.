<?php
require 'header.php';

if(!$user->canAccesAll()){
    $user->redirect('customers.php', 'NotPermitted');
}

$account = new Account();

$accounts = $account->getUserData();

$countAccounts = count($accounts);

?>

<div class="container">
    <div class="main-part col-md-9">
        <header class="col-md-12">
            <div class="info-bar">
                <div class="col-md-12">
                    <h2><?php echo $countAccounts; ?> Results found</h2>
                </div>
                <div class="col-md-12">
                    <h3><a href='add-user.php'>Add User</a></h3>
                </div>
            </div>
        </header>
        <section class="information">
        	<div class="clients">
        		<ul class="client col-md-12">
        			<li class="col-md-6 bold">Username</li>
        			<li class="col-md-6 bold">Department</li>
        		</ul>
                <?php
                foreach($accounts as $account){
                    echo "<ul class='client col-md-12'>
                        <li class='col-md-6'>" . $account['username'] . "</li>
                        <li class='col-md-6'>" . $account['department'] . "</li>
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
				<li><a href="customers.php">Clients</a></li>
                <li><a href="appointments.php">Appointments</a></li>
                <li><a href="projects.php">Projects</a></li>
                <li><a href="invoices.php">Invoices</li>
                <?php
                if($user->canAccesAll()){
                    echo "<li><a href='users.php' class='active'>Users</a></li>
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
