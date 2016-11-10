<?php
require 'header.php';
use Respect\Validation\Validator as Validator;

$project = new Project();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $input = $_POST['searchInput'];
    if(!Validator::notEmpty()->validate($input)){
        $user->redirect('projects.php', 'EmptySearchfield');
    }
    $projectInfo = $project->searchInProjects($input);

    if(empty($projectInfo)){
        $user->redirect('projects.php', 'NoResultsFound');
    }
}
else {
    $projectInfo = $project->getMainProjectInfo();
}

$amountResults = count($projectInfo);


?>

<div class="container">
	<div class="main-part col-md-9">
        <header class="col-md-12">
            <div class="info-bar">
                <div class="col-md-12">
                    <h2><?php echo $amountResults; ?> Results found</h2>
                </div>
                <div class="col-md-12">
                    <?php
                    if($user->canModifyProjects()){
                        echo "<div class='col-md-8'>
                                <h3>
                                    <a href='add-project.php'>Add a client</a>
                                </h3>
                            </div>";
                    }
                    ?>
                    <form class="form-inline col-md-4" action="projects.php" method="POST">
                        <div class="form-group">
                            <label class="sr-only" for="searchbar"></label>
                            <input type="text" name="searchInput" id="searchbar" placeholder="Projectname">
                        </div>
                        <input type="submit" class="btn btn-primary" name="type" value="Search">
                    </form>
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