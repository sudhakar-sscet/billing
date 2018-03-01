<?php 
	if(!empty($_POST)){
		include_once '../model/index.php';
		$where = array('id' => $_POST['id']);
		unset($_POST['id']);
		if($wpdb->update( 'products', $_POST,$where)){
			header('location: ../view/products.php?status=updated&slug=Product');
		}else{
			header('location: ../view/products.php?status=error&slug=Product');
		}
	}
	