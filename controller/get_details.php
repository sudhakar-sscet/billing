<?php 
	if(!empty($_POST)){
		include_once '../model/index.php';
		$id = $_POST['id'];
		$customers = $wpdb->get_results("SELECT * FROM customers WHERE id = '$id'",ARRAY_A)[0];
		echo json_encode($customers);
	}