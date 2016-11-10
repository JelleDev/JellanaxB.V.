<?php
require 'header.php';

if(!$user->canAccesAll()){
    $user->redirect('customers.php', 'NotPermitted');
}

$account = new Account();

?>

<div class="container">
    <div class="main-part col-md-9">
        <header class="col-md-12">
            <div class="info-bar">
                <div class="col-md-12">
                    <h2>Add a user</h2>
                </div>
                <div class="col-md-12">
                    <h3><a href="users.php">< Go back</a></h3>
                </div>
            </div>
        </header>
        <section class="editclientphp">
        	<div class="clients-edit">                 
                    <div class="information-client-add col-md-12">
                        <form action="<?php echo BASE_URL . '/app/controller/accountcontroller.php'; ?>" method="POST">
                            <div class="form-group">
                                <label for="exampleInputCompanyname">Username</label>
                                <input type="text" class="form-control" id="exampleInputCompanyname" placeholder="Username" name="username">
                                </div>
                            <div class="form-group">
                                <label for="exampleInputAdress1">Password</label>
                                <input type="password" class="form-control" id="exampleInputAdress1" placeholder="Password" name="password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputHousenumber1">Department</label>
                                <select class="form-control" name="department" id="exampleInputHousenumber1">
                                    <option></option>
                                    <option value="1">Admin</option>
                                    <option value="2">Sales</option>
                                    <option value="3">Finance</option>
                                    <option value="4">Development</option>
                                </select>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Add user">
                    </div>
                </ul>
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
