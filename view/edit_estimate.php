<?php
	include_once '../model/index.php';
	include_once 'header.php';
	$id = $_GET['id'];
	$estimate = $wpdb->get_results("SELECT * FROM estimates WHERE id=$id",ARRAY_A)[0];
	$products = $wpdb->get_results("SELECT * FROM products",ARRAY_A);
	$i=1;
	foreach ($products as $key => $value) {
		if ($i == 1) {
			$autocomplete_data = '{value:"'.$value['product_name'].'",data:'.$value['product_price'].',tax:'.$value['tax_percentage'].'}';
			$i++;
		}
		else{
			$autocomplete_data = $autocomplete_data.',{value:"'.$value['product_name'].'",data:'.$value['product_price'].',tax:'.$value['tax_percentage'].'}';
		}
	}
 ?>
 	<div class="container">
	 	<h3 class="text-center">Update Bill</h3>
		<form method="post" action="../controller/edit_estimate_controller.php">
		<div class="row form-group">
			<div class="col-sm-6">
				<input type="text" name="estimate_no" class="form-control" value="<?php echo $estimate['estimate_no']; ?>">
			</div>
			<div class="col-sm-6">
    			<input type="text" id="company_name" name="company_name" class="form-control" placeholder="Company name" value="<?php echo $estimate['company_name']; ?>" required>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 form-group">
    			<input type="text" name="address" class="form-control" placeholder="Address" value="<?php echo $estimate['address']; ?>" required>
			</div>
			<div class="col-sm-6 form-group">
    			<input type="text" name="gst_number" class="form-control" placeholder="GST Number" value="<?php echo $estimate['gst_number']; ?>" required>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 form-group">
    			<input type="text" name="contact_person" class="form-control" placeholder="Contact person" value="<?php echo $estimate['contact_person']; ?>" required>
			</div>
			<div class="col-sm-6 form-group">
    			<input type="number" name="contact_number" class="form-control" placeholder="Contact Number" value="<?php echo $estimate['contact_number']; ?>" required>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="box">
				<div class="box-header">
					<h3>Bill</h3>
				</div>
				<div class="box-body table-responsive no-padding">
					<table class="table">
						<thead>
							<tr>
								<td>Product</td>
								<td>Price</td>
								<td>Qty</td>
								<td>Total</td>
								<td>Action</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php 
								$products = unserialize($estimate['estimate_list']);
								if (!empty($products)) {
									$i = 1;
									foreach ($products as $key => $value) {
									echo '<tr>
											<td>
											<input type="text" id="est_product_name_comp_'.$i.'" name="product_name[]" class="form-control product_name_comp" value="'.$value['product_name'].'" autofocus required>
											</td>';
									echo '<td>
											<input type="text" id="est_price_'.$i.'" name="price[]" class="form-control" value="'.$value['price'].'" required>
										</td>';
									echo '<td>
											<input type="number" id="est_qty_'.$i.'" name="qty[]" class="form-control est_qty" value="'.$value['qty'].'" autofocus required>
										</td>';
									echo '<td><input type="text" id="est_total_'.$i.'" name="total[]" class="form-control" value="'.$value['total'].'" required></td><td><a class="btn btn-danger remove_tr" id="remove_tr_2"><i class="fa fa-close"></i></a></td></tr>';
									}
								}
							?>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="box-footer">
					<div class="row">
						<div class="col-sm-3">
							<button id="add_est_list" class="form-control btn btn-danger">Add <i class="fa fa-clone"></i></button>	
						</div>
						<div class="col-sm-6">
							<button class="btn btn-info form-control" type="submit">Save <i class="fa fa-save"></i></button>
						</div>
						<div class="col-sm-3 form-group">
							<label>Grand Total</label>
							<input type="text" id="est_bill_total" name='grand_total' class="form-control" required placeholder="Total" value='<?php echo $estimate['grand_total']; ?>' readonly>
						</div>
					</div>
				</div>
			</div>
		</div>
    </form>
 	</div>
<?php include_once 'footer.php'; ?>