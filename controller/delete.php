<?php 
	if(!empty($_GET)){
		include_once '../model/index.php';
		$table = $_GET['slug'];
		if($wpdb->delete($table, array( 'id' => $_GET['id'] ) )){
			if ($table == 'bills') {
				$table = 'generate_bill';
			}
			elseif ($table == 'estimates') {
				$table = 'generate_estimate';
			}
			header('location: ../view/'.$table.'.php?status=deleted&slug=Product');
		}else{
			header('location: ../view/'.$table.'.php?status=error&slug=Product');
		}
	}