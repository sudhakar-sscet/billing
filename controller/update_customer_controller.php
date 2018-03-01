<?php 
	if(!empty($_POST)){
		include_once '../model/index.php';
		$where = array('id' => $_POST['id']);
		unset($_POST['id']);
		if($wpdb->update( 'customers', $_POST,$where)){
			header('location: ../view/customers.php?status=updated&slug=Product');
		}else{
			header('location: ../view/customers.php?status=error&slug=Product');
		}
	}
	