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
                    <ul class="information-client col-md-3">
                        <p>Companyname</p>
                        <p>Clientname</p>
                        <p>Invoice Nr.</p>
                        <p>Date</p>
                        <p>Contactperson</p>
                        <p>Project</p>
                        <p>Phonenumber</p>
                        <p>limit</p>
                        <p>Price</p>
                        <p>Explanation</p>
                        <p>TAX-code</p>
                        <p>Paid (Y/N)</p>
                        <p>Payment Date</p>
                        <p>Terms (Y/N)</p>
                    </ul>
                    <ul class="information-client col-md-8">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
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
