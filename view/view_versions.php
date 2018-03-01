<?php
	include_once '../model/index.php';
	include_once 'header.php';
	$project_id  = $_GET['id'];
 ?>
	<form action="../controller/add_version_controller.php?project_id=<?php echo $project_id;?>" method="post" enctype="multipart/form-data">
		<p>Upload File</p>
		<input type="file" name="project_name" class="form-control" required autofocus><br />
		<input type="submit" name="">
	</form>
	<br>
	<hr>
	<?php 
	$projects = $wpdb->get_results($wpdb->prepare( "SELECT * FROM groot_versions WHERE user_id = %d",$_SESSION['user_details']['id']),ARRAY_A);
	if(!empty($projects)){

	 ?>
	<table class="table text-center table-hover">
		<thead>
			<tr>
				<th>Project Name</th>
				<th>Action</th>			
			</tr>
		</thead>
		<tbody>
	<?php 
		
		foreach ($projects as $key => $project) {
			echo "<tr><td><a href='../view/view_versions.php?id=".$project['id']."'>".$project['project_name']."</a></td><td><a href='../controller/delete_project.php?id=".$project['id']."'><button class='btn btn-danger'>delete</button></a></td></tr>";
		}

	 ?>
	 	</tbody>
	</table>
	<?php }else{
		echo "No Versions added till now, please add something!";
	} ?>

<?php include_once 'footer.php'; ?>