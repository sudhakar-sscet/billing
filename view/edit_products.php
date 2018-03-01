<?php
	include_once '../model/index.php';
	include_once 'header.php';
	$where = $_REQUEST['id'];
	$products = $wpdb->get_results("SELECT * FROM products WHERE id = '$where'",ARRAY_A)[0];
 ?>
 	<h3>Edit Products</h3>
 	<hr style="border-top: 1px solid #191616">
	<form method="post" action="../controller/update_product_controller.php">
		<div class="row">
			<input type="hidden" name="id" value="<?php echo $products['id']; ?>">
			<div class="form-group">
    			<input type="text" name="product_name" class="form-control" placeholder="Product Name" value="<?php echo $products['product_name']; ?>" required>
			</div>
			<div class="form-group">
    			<input type="number" name="product_price" class="form-control" placeholder="Price" value="<?php echo $products['product_price']; ?>"" required>
			</div>
			<div class="form-group">
    			<input type="text" name="product_hsn" class="form-control" placeholder="HSN Code" value="<?php echo $products['product_hsn']; ?>"" required>
			</div>
			<div class="form-group">
    			<input type="number" name="tax_percentage" class="form-control" placeholder="Tax Percentage" value="<?php echo $products['tax_percentage']; ?>"" required>
			</div>
		</div>
		<br>
		<input type="submit" class="form-control btn btn-primary" value="Add Product">
    </form>
    <hr style="border-top: 1px solid #191616">
<?php 
	include_once 'footer.php'; 
?>