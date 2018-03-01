<?php
	include_once '../model/index.php';
	include_once 'header.php';
	$customers_name = $wpdb->get_results("SELECT * FROM customers",ARRAY_A);
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
	// print_r($customers_name);
 ?>
 	<div class="container">
	 	<h3 class="text-center">Add Bill</h3>
		<form method="post" action="../controller/add_bill_controller.php">
		<div class="row form-group">
			<div class="col-sm-12">
				<label>Select Name:</label>
    			<select type="text" id="company_name" name="company_name" class="form-control" placeholder="Company name" required>
    				<option>...</option>
    				<?php 
    					if (!empty($customers_name)) {
    						foreach ($customers_name as $key => $value) {
    							echo " <option value='".$value['id']."'>".$value['company_name']."</option>";
    						}
    					}
    				 ?>
    			</select>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 form-group">
    			<input type="text" name="address" class="form-control" placeholder="Address" required>
			</div>
			<div class="col-sm-6 form-group">
    			<input type="text" name="gst_number" class="form-control" placeholder="GST Number" required>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 form-group">
    			<input type="text" name="contact_person" class="form-control" placeholder="Contact person" required>
			</div>
			<div class="col-sm-6 form-group">
    			<input type="number" name="contact_number" class="form-control" placeholder="Contact Number" required>
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
								<td>SGST</td>
								<td>CGST</td>
								<td>Total</td>
								<td>Action</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><input type="text" id="product_name_comp_1" name="product_name[]" class="form-control product_name_comp" autofocus required></td>
								<td><input type="text" id="price_1" name="price[]" class="form-control" required></td>
								<td><input type="number" id="qty_1" name="qty[]" class="form-control qty" autofocus required></td>
								<td><input type="text" id="sgst_1" name="sgst[]" class="form-control" required></td>
								<td><input type="text" id="cgst_1" name="cgst[]" class="form-control" required></td>
								<td><input type="text" id="total_1" name="total[]" class="form-control" required></td>
								<td>...</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="box-footer">
					<div class="row">
						<div class="col-sm-3">
							<button id="add_bill_list" class="form-control btn btn-danger">Add <i class="fa fa-clone"></i></button>	
						</div>
						<div class="col-sm-6">
							<button class="btn btn-info form-control" type="submit">Save <i class="fa fa-save"></i></button>
						</div>
						<div class="col-sm-3 form-group">
							<label>Grand Total</label>
							<input type="text" id="bill_total" name='grand_total' class="form-control" required placeholder="Total" readonly>
						</div>
					</div>
				</div>
			</div>
		</div>
    </form>
 	</div>
<?php include_once 'footer.php'; ?>