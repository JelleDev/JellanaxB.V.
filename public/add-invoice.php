<?php
require 'header.php';

if(!$user->canModifyInvoices()){
    $user->redirect('invoices.php', 'NotPermitted');
}

if(!$_SERVER['REQUEST_METHOD'] == 'POST'){
    $user->redirect('invoices.php', 'NotPermitted');
}

$client_id = $_POST['client_id'];

if(empty($client_id)){
    $user->redirect('search_companyname_invoice.php', 'EmptyCompanyname');
}

$appointment = new Appointment();

$companyname = $appointment->getCompanyName($client_id);
$projectnames = $appointment->getProjectNames($client_id);

?>

<div class="container">
    <div class="main-part col-md-9">
        <header class="col-md-12">
            <div class="info-bar">
                <div class="col-md-12">
                    <h2>Add a Invoice</h2>
                </div>
                <div class="col-md-12">
                    <h3><a href="projects.php">< Go back</a></h3>
                </div>
            </div>
        </header>
        <section class="editclientphp">
        	<div class="clients-edit">                 
                    <div class="information-client-add col-md-12">
                        <form action="<?php echo BASE_URL; ?>/app/controller/invoicecontroller.php" method="POST">
                            <div class="form-group">
                                <label for="exampleInputCompanyname">Companyname*</label>
                                <input type="text" class="form-control" name="client_id" id="exampleInputCompanyname" placeholder="Companyname" value="<?php echo $companyname; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputProject">Project*</label>
                                <select class="form-control" id="exampleInputProject" name="projectid">
                                    <option></option>
                                    <?php foreach($projectnames as $projectname){
                                        echo "<option value='" . $projectname['project_id'] . "'>" .  $projectname['projectname'] . "</option>";
                                    } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputInvoicenr">Invoice number*</label>
                                <input type="text" class="form-control" id="exampleInputInvoicenr" placeholder="Invoice number" name="Invoicenr">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputAmount">Price (€)*</label>
                                <input type="text" class="form-control" id="exampleInputAmount" placeholder="Price" name="Amount">
                            </div>
                             <div class="form-group">
                                <label for="exampleInputTax">TAX-code (%)*</label>
                                <input type="text" class="form-control" id="exampleInputTax" placeholder="TAX-code" name="Tax_code">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputExplanation">Explanation</label>
                                <input class="form-control" id="exampleInputExplanation" placeholder="Explanation" name="Explanation">
                            </div>
                            <input type="submit" class="btn btn-primary" name="type" value="Add invoice">
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
