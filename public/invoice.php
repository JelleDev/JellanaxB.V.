<?php
require 'header.php';

$invoice_id = $_GET['id'];

if(!isset($invoice_id) || empty($invoice_id)){
    $user->redirect('invoices.php', 'NotPermitted');
}

$invoice = new Invoice();

$invoiceInfo = $invoice->getInvoice($invoice_id);

?>

<div class="container">
    <div class="main-part col-md-9">
        <header class="col-md-12">
            <div class="info-bar">
                <div class="col-md-12">
                    <h2>Invoice info</h2>
                </div>
                <div class="col-md-12">
                    <h3><a href="invoices.php">< Go back</a></h3>
                </div>
            </div>
        </header>
        <section class="editclientphp">
        	<div class="clients-edit">
                <div class="information-clients col-md-12">
                    <ul class="information-client col-md-3">
                        <p>Companyname</p>
                        <p>Project</p>
                        <p>Invoice Nr.</p>
                        <p>Date send</p>
                        <p>Price</p>
                        <p>TAX-code</p>
                        <p>Explanation</p>
                    </ul>
                    <ul class="information-client col-md-8">
                        <li><?php echo $invoiceInfo['companyname']; ?></li>
                        <li><?php echo $invoiceInfo['projectname']; ?></li>
                        <li><?php echo $invoiceInfo['invoice_nr']; ?></li>
                        <li><?php echo date('m-d-Y', strtotime($invoiceInfo['date_send'])); ?></li>
                        <li>€ <?php echo $invoiceInfo['price']; ?>,00</li>
                        <li><?php echo $invoiceInfo['tax_code']; ?>%</li>
                        <li><?php echo $invoiceInfo['explanation']; ?></li>
                    </ul>
                </div>
                <?php
                if($user->canModifyInvoices()){
                    echo "<div class='editclients-button'><a href='edit-invoice.php?id=" . $invoiceInfo['invoice_id'] . "'>Modify</a></div>";
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
