<?php
require 'header.php';
use Respect\Validation\Validator as Validator;

$invoice = new Invoice();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $input = $_POST['searchInput'];
    if(!Validator::notEmpty()->validate($input)){
        $user->redirect('invoices.php', 'EmptySearchfield');
    }
    $invoiceInfo = $invoice->searchInInvoices($input);

    if(empty($invoiceInfo)){
        $user->redirect('invoices.php', 'NoResultsFound');
    }
}
else {
    $invoiceInfo = $invoice->getAllInvoices();
}

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
                        echo "<div class='col-md-8'>
                                <h3>
                                    <a href='add-invoice.php'>Add an invoice</a>
                                </h3>
                            </div>";
                    }
                    ?>
                    <form class="form-inline col-md-4" action="invoices.php" method="POST">
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
                                <a href='" . BASE_URL . "/app/controller/invoicecontroller.php?id=" . $info['invoice_id'] . "'>
                                    <span class='glyphicon glyphicon-ok'></span>
                                </a>
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
                <li><a href="appointments.php">Appointments</a></li>
                <li><a href="projects.php">Projects</a></li>
                <li class="active"><a href="invoices.php">Invoices</a></li>
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
