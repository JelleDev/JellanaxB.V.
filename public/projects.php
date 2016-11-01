<?php
require 'header.php';

$project = new Project();

$projectInfo = $project->getMainProjectInfo();
?>

<div class="container">
	<div class="main-part col-md-9">
        <header class="col-md-12">
            <div class="info-bar">
                <div class="col-md-12">
                    <h2><?php echo count($project->getMainProjectInfo()); ?> Results found</h2>
                </div>
                <div class="col-md-12">
                    <h3><a href="add-project.php">Add a project</a></h3>
                </div>
            </div>
        </header>
        <section class="information">
        	<div class="clients">
        		<ul class="client col-md-12">
        			<li class="col-md-3 bold">Projectname</li>
        			<li class="col-md-3 bold">Companyname</li>
        			<li class="col-md-3 bold">Subject</li>
        			<li class="col-md-3 bold">Deadline</li>
        		</ul>
				<?php
				foreach ($projectInfo as $info){
					echo "<ul class='client col-md-12'>
					<li class='col-md-3'><a href='project.php?id=" . $info['project_id'] . "'>" . $info['projectname'] . "</a></li>
					<li class='col-md-3'>" . $info['companyname'] . "</li>
					<li class='col-md-3'>" . $info['project_subject'] . "</li>
					<li class='col-md-3'>" . date('m-d-Y', strtotime($info['deadline'])) . "</li>";
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
                <li class="active"><a href="projects.php">Projects</a></li>
                <li><a href="invoices.php">Invoices</li>
    		</ul>
    	</div>
    </aside>
</div>


<?php
require 'footer.php';
?>