<?php
	include_once '../model/index.php';
	include_once 'header.php'; 
 ?>
 	<h3>Master Products</h3>
 	<hr style="border-top: 1px solid #191616">
	<form method="post" action="../controller/add_product_controller.php">
		<div class="row">
			<div class="col-sm-3">
    			<input type="text" name="product_name" class="form-control" placeholder="Product Name" required autofocus>
			</div>
			<div class="col-sm-3">
    			<input type="number" name="product_price" class="form-control" placeholder="Price" required>
			</div>
			<div class="col-sm-3">
    			<input type="text" name="product_hsn" class="form-control" placeholder="HSN Code" required>
			</div>
			<div class="col-sm-3">
    			<input type="number" name="tax_percentage" class="form-control" placeholder="Tax Percentage" required autofocus>
			</div>
		</div>
		<br>
		<input type="submit" class="form-control btn btn-primary" value="Add Product">
    </form>
    <hr style="border-top: 1px solid #191616">
    <?php 
    	$products = $wpdb->get_results("SELECT * FROM products",ARRAY_A);
    	if(!empty($products)){
     ?>
    <table class="table text-center table-hover">
		<thead>
			<tr>
				<th>Product Name</th>
				<th>Price</th>
				<th>HSN Code</th>
				<th>Tax Percentage</th>
				<th>Action</th>			
			</tr>
		</thead>
		<tbody>
		<?php 
		foreach ($products as $key => $product) {
			echo "<tr><td>".$product['product_name']."</td><td>".$product['product_price']."</td><td>".$product['product_hsn']."</td><td>".$product['tax_percentage']."%</td><td><a href='edit_products.php?id=".$product['id']."'><button class='btn btn-warning'>Edit</button></a>&nbsp;<a href='../controller/delete.php?id=".$product['id']."&slug=products'><button class='btn btn-danger'>Delete</button></a></td></tr>";
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