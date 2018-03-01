<?php
	include_once '../model/index.php';
	include_once '../controller/session_functions.php';
	include_once 'header.php';
	$options = nav_files();
 ?>
 	<h3 class="text-center">Add Staff</h3>
 	<hr>
 	<br>
 	<form action="../controller/add_staff_controller.php" method="POST">
	 	<input type="text" name="staff_name" placeholder="Staff Name" class="form-control" required>
	 	<br>
	 	<input type="text" name="role" placeholder="Staff Role" class="form-control" required>
	 	<br>
	 	<input type="phone" name="staff_number" placeholder="Staff Phonenumber" class="form-control" required>
	 	<br>
	 	<select multiple name="options[]" class="form-control" id="sel2">
	 		<?php foreach ($options as $key => $option) {
	 			echo "<option value='".$option."'>".$option."</option>";
	 		} ?>
	 	</select>
	 	<br>
	 	<input type="submit" class="btn btn-success form-control">
 	</form>


 	<hr>
 	<table class="table">
 		<tr>
 			<th>Staff Name</th>
 			<th>Staff Role</th>
 			<th>Action</th>
 		</tr>
 		<?php 
 			$staffs = $wpdb->get_results("SELECT * FROM staffs",ARRAY_A);
 			foreach ($staffs as $key => $staff) {
 				echo '<tr>
 			<td>'.$staff['staff_name'].'</td>
 			<td>'.$staff['role'].'</td>
 			<td><a href="../controller/delete_staff.php?id='.$staff['id'].'"><button class="btn btn-danger">Delete</button></a>&#32;<a href="../controller/edit_staff.php?id='.$staff['id'].'"><button class="btn btn-warning">Edit</button></a></td>
 		</tr>';
 			}
 		 ?>
 	</table>
 <?php 
	include_once 'footer.php'; 
?>