<?php
require 'header.php';

$invoice = new Invoice();

$invoiceInfo = $invoice->getAllInvoices();

$amountInvoices = count($invoiceInfo);
?>

<div class="container">
    <div class="main-part col-md-9">
        <header class="col-md-12">
            <div class="info-bar">
                <div class="col-md-12">
                    <h2><?php echo $amountInvoices; ?> Results found</h2>
                </div>
                <div class="col-md-12">
                    <?php
                    if($user->canModifyInvoices()){
                        echo "<h3><a href='search_companyname_invoice.php'>Add an invoice</a></h3>";
                    }
                    ?>
                </div>
            </div>
        </header>
        <section class="information">
        	<div class="clients">
        		<ul class="client col-md-12">
        			<li class="col-md-3 bold">Companyname</li>
                    <li class="col-md-3 bold">Project</li>
                    <li class="col-md-2 bold">Invoice number</li>
                    <li class="col-md-2 bold">Date send</li>
                    <li class="col-md-2 bold">Amount</li>
        		</ul>
                <?php
                foreach($invoiceInfo as $info){
                    echo "<ul class='client col-md-12'>
                            <li class='col-md-3'><a href='invoice.php?id=" . $info['invoice_id'] . "'>" . $info['companyname'] . "</a></li>
                            <li class='col-md-3'>" . $info['projectname'] . "</li>
                            <li class='col-md-2'>" . $info['invoice_nr'] . "</li>
                            <li class='col-md-2'>" . date('m-d-Y', strtotime($info['date_send'])) . "</li>
                            <li class='col-md-2'>
                               <span class='glyphicon glyphicon-ok'></span>
                                € " . $info['price'] . ",00
                            </li>
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
                 <?php
                if($user->canAccesUsers()){
                    echo "<li><a href='users.php'>Users</a></li>";
                }
                ?>
                <li><a href="appointments.php">Appointments</a></li>
                <li><a href="projects.php">Projects</a></li>
                <li class="active"><a href="invoices.php">Invoices</li>
            </ul>
        </div>
    </aside>
</div>

<?php
require 'footer.php';
?>
