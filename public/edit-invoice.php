<?php
require 'header.php';

$invoice_id = $_GET['id'];

if(!isset($invoice_id) || empty($invoice_id)){
    $user->redirect('invoices.php', 'NotPermitted');
}

$invoice = new Invoice();
$appointment = new Appointment();

$invoiceInfo = $invoice->getInvoice($invoice_id);

$invoice_id = $invoiceInfo['invoice_id'];
$client_id = $invoiceInfo['client_id'];

$projectnames = $appointment->getProjectNames($client_id);

?>

<div class="container">
    <div class="main-part col-md-9">
        <header class="col-md-12">
            <div class="info-bar">
                <div class="col-md-12">
                    <h2>Edit Invoice</h2>
                </div>
                <div class="col-md-12">
                    <h3><a href="invoices.php">< Go back</a></h3>
                </div>
            </div>
        </header>
        <section class="editclientphp">
            <div class="clients-edit">
                <div class="information-client-add col-md-12">
                    <form action="<?php echo BASE_URL; ?>/app/controller/invoicecontroller.php" method="POST">
                        <label class="sr-only" for="invoice_id">Invoiceid</label>
                        <input type="hidden" id="invoice_id" name="invoice_id" value="<?php echo $invoice_id; ?>">
                        <div class="form-group">
                            <label for="exampleInputCompanyname">Companyname*</label>
                            <input type="text" class="form-control" id="exampleInputCompanyname" placeholder="Companyname" name="companyname" value="<?php echo $invoiceInfo['companyname']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputProject">Project*</label>
                            <select class="form-control" id="exampleInputProject" name="projectid">
                                <?php
                                foreach($projectnames as $projectname) {
                                    if ($projectname['projectname'] == $invoiceInfo['projectname']) {
                                        echo "<option value='" . $projectname['project_id'] . "' selected>" . $projectname['projectname'] . "</option>";
                                    } else {
                                        echo "<option value='" . $projectname['project_id'] . "'>" . $projectname['projectname'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="invoicenr">Invoice number*</label>
                            <input type="text" class="form-control" id="invoicenr" placeholder="Invoice number" name="Invoicenr" value="<?php echo $invoiceInfo['invoice_nr']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputAmount">Price (€)*</label>
                            <input type="text" class="form-control" id="exampleInputAmount" placeholder="Amount" name="Amount" value="<?php echo $invoiceInfo['price']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputtax">TAX-code (%)*</label>
                            <input type="text" class="form-control" id="exampleInputtax" placeholder="TAX-code" name="Tax_code" value="<?php echo $invoiceInfo['tax_code']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="Explanation">Explanation</label>
                            <textarea class="form-control" name="Explanation" id="Explanation" placeholder="Explanation"><?php echo $invoiceInfo['explanation']; ?></textarea>
                        </div>
                        <input type="submit" class="btn btn-primary" name="type" value="Save changes">
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
