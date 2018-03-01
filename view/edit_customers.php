<?php
	include_once '../model/index.php';
	include_once 'header.php';
	$where = $_REQUEST['id'];
    $customers = $wpdb->get_results("SELECT * FROM customers WHERE id = '$where'",ARRAY_A)[0];
    // print_r($customers);
 ?>
 	<h3>Edit Customers</h3>
 	<hr style="border-top: 1px solid #191616">
	<form method="post" action="../controller/update_customer_controller.php">
		<div class="">
			<input type="hidden" value="<?php echo $customers['id']; ?>" name='id'>
			<div class="form-group">
    			<input type="text" name="company_name" class="form-control" value="<?php echo $customers['company_name']; ?>" placeholder="Company name" required>
			</div>
			<div class="form-group">
    			<input type="text" name="address" class="form-control" value="<?php echo $customers['address']; ?>" placeholder="Address" required>
			</div>
			<div class="form-group">
    			<input type="text" name="gst_number" class="form-control" value="<?php echo $customers['gst_number']; ?>" placeholder="GST Number" required>
			</div>
			<div class="form-group">
    			<input type="text" name="contact_person" class="form-control" value="<?php echo $customers['contact_person']; ?>" placeholder="Contact person" required>
			</div>
			<div class="form-group">
    			<input type="number" name="contact_number" class="form-control" value="<?php echo $customers['contact_number']; ?>" placeholder="Contact Number" required>
			</div>
		</div>
		<br>
		<input type="submit" class="form-control btn btn-primary" value="Update Customer">
    </form>
    <hr style="border-top: 1px solid #191616">
<?php 
	include_once 'footer.php'; 
?>