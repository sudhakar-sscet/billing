<?php
	include_once '../model/index.php';
	include_once 'header.php'; 
 ?>
 	<h3>Master Customers</h3>
 	<hr style="border-top: 1px solid #191616">
	<form method="post" action="../controller/add_customer_controller.php">
		<div class="row form-group">
			<div class="col-sm-4">
    			<input type="text" name="company_name" class="form-control" placeholder="Company name" required autofocus>
			</div>
			<div class="col-sm-4">
    			<input type="text" name="address" class="form-control" placeholder="Address" required>
			</div>
			<div class="col-sm-4">
    			<input type="text" name="gst_number" class="form-control" placeholder="GST Number" required>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
    			<input type="text" name="contact_person" class="form-control" placeholder="Contact person" required>
			</div>
			<div class="col-sm-6">
    			<input type="number" name="contact_number" class="form-control" placeholder="Contact Number" required autofocus>
			</div>
		</div>
		<br>
		<input type="submit" class="form-control btn btn-primary" value="Add Customer">
    </form>
    <hr style="border-top: 1px solid #191616">
    <?php 
    	$customers = $wpdb->get_results("SELECT * FROM customers",ARRAY_A);
    	if(!empty($customers)){
     ?>
    <table class="table text-center table-hover">
		<thead>
			<tr>
				<th>Company name</th>
				<th>Address</th>
				<th>GST No</th>
				<th>Contact Person</th>
				<th>Contact Number</th>
				<th>Action</th>			
			</tr>
		</thead>
		<tbody>
		<?php 
		foreach ($customers as $key => $customer) {
			echo "<tr><td>".$customer['company_name']."</td><td>".$customer['address']."</td><td>".$customer['gst_number']."</td><td>".$customer['contact_person']."</td><td>".$customer['contact_number']."</td><td><a href='edit_customers.php?id=".$customer['id']."'><button class='btn btn-warning'>Edit</button></a>&nbsp;<a href='../controller/delete.php?id=".$customer['id']."&slug=customers'><button class='btn btn-danger'>Delete</button></a></td></tr>";
		}

	 ?>
	 	</tbody>
	</table>
	<?php }else{?>
		<p>No Product till now added!</p>
	<?php } ?>
<?php 
	include_once 'footer.php'; 
?>