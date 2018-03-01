<?php 
	if(!empty($_POST)){
		include_once '../model/index.php';
		if($wpdb->insert( 'products', $_POST)){
			header('location: ../view/products.php?status=inserted&slug=Product');
		}else{
			header('location: ../view/products.php?status=error&slug=Product');
		}
	}
	