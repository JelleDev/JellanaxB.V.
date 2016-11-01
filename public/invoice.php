<?php
require 'header.php';

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
                    <ul class="information-client col-md-6">
                        <li>Companyname</li>
                        <li>Clientname</li>
                        <li>Invoice Nr.</li>
                        <li>Date</li>
                        <li>Contactperson</li>
                        <li>Project</li>
                        <li>Phonenumber</li>
                        <li>Limit</li>
                        <li>Price</li>
                        <li>Explanation</li>
                        <li>TAX-code</li>
                        <li>Paid (Y/N)</li>
                        <li>Payment Date</li>
                        <li>Terms (Y/N)</li>
                    </ul>
                </div>
                <div class="editclients-button"><a href="edit-invoice.php">Modify</a></div>
                  
        		
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
