<?php
require 'header.php';


$project = new Project();

$project_id = $_GET['id'];

$projectInfo = $project->getProjectInfo($project_id);

$notRequired = [
    $projectInfo['hardware'],
    $projectInfo['operating_system'],
    $projectInfo['application']
];

if($projectInfo['maintenance_contract'] == 1){
    $projectInfo['maintenance_contract'] = 'Yes';
}
else {
    $projectInfo['maintenance_contract'] = 'No';
}

if($projectInfo['offerstatus'] == 1){
    $projectInfo['offerstatus'] = 'Active';
}
else {
    $projectInfo['offerstatus'] = 'Inactive';
}
?>

<div class="container">
    <div class="main-part col-md-9">
        <header class="col-md-12">
            <div class="info-bar">
                <div class="col-md-12">
                    <h2>Projects</h2>
                </div>
                <div class="col-md-12">
                    <h3><a href="projects.php">< Go back</a></h3>
                </div>
            </div>
        </header>
        <section class="editclientphp">
        	<div class="clients-edit">
                <ul class="information-clients col-md-12">
                    <div class="information-client col-md-3">
                        <p>Companyname</p>
                        <p>Projectname</p>
                        <p>Deadline</p>
                        <p>Maintenance contract</p>

                        <?php
                        $notRequiredLabel = [
                            'Hardware',
                            'Operating System',
                            'Application'
                        ];
                        for($i = 0; $i < count($notRequired); $i++){
                            if(!empty($notRequired[$i])){
                                echo "<p>" . $notRequiredLabel[$i] . "</p>";
                            }
                        }
                        ?>
                        <p>Offernumber</p>
                        <p>Offerstatus</p>
                        <p>Subject</p>
                    </div>
                    <div class="information-client col-md-8">
                        <li><?php echo $projectInfo['companyname']; ?></li>
                        <li><?php echo $projectInfo['projectname']; ?></li>
                        <li><?php echo date('m-d-Y', strtotime($projectInfo['deadline'])); ?></li>
                        <li><?php echo $projectInfo['maintenance_contract']; ?></li>

                        <?php
                        foreach($notRequired as $info){
                            if(!empty($info)){
                                echo "<li>" . $info . "</li>";
                            }
                        }
                        ?>
                        <li><?php echo $projectInfo['offernumber']; ?></li>
                        <li><?php echo $projectInfo['offerstatus']; ?></li>
                        <li><?php echo $projectInfo['project_subject']; ?></li>
                    </div>
                </ul>
                <?php
                if($user->canModifyProjects()){
                    echo "<div class='editclients-button'><a href='edit-project.php?id=" . $project_id . "'>Modify</a></div>";
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