<?php 
	if(!empty($_POST)){
		include_once '../model/index.php';
		if($wpdb->insert( 'customers', $_POST)){
			header('location: ../view/customers.php?status=inserted&slug=Product');
		}else{
			header('location: ../view/customers.php?status=error&slug=Product');
		}
	}
