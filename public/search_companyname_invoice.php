<?php
require 'header.php';

if(!$user->canModifyInvoices()){
    $user->redirect('invoices.php', 'NotPermitted');
}

$companyinfo = new Appointment();

$companynames = $companyinfo->getCompanyNames();

?>

<div class="container">
    <div class="main-part col-md-9">
        <header class="col-md-12">
            <div class="info-bar">
                <div class="col-md-12">
                    <h2>Add an invoice</h2>
                </div>
                <div class="col-md-12">
                    <h3><a href="invoices.php">< Go back</a></h3>
                </div>
            </div>
        </header>
        <section class="editclientphp">
        	<div class="clients-edit">                 
                    <div class="information-client-add col-md-12">
                        <form action="add-invoice.php" method="POST">
                            <div class="form-group edit">
                                <label for="exampleInputCompanyname">Please select a company name.</label>
                                <select class="form-control" id="exampleInputCompanyname" name="client_id">
                                    <option></option>
                                    <?php
                                    foreach($companynames as $companyname){
                                        echo "<option value='" . $companyname['client_id'] . "'>" . $companyname['companyname'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Continue">
                        </form>
                    </div>                        		
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
                <li class="active"><a href="invoices.php">Invoices</li>
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
