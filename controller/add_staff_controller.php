<?php 
	if(!empty($_POST)){
		include_once '../model/index.php';
		echo "<pre>";
		$_POST['options'] = serialize($_POST['options']);
		if($wpdb->insert( 'staffs', $_POST)){
			header('location: ../view/staffs.php?status=inserted&slug=Staff');
		}else{
			header('location: ../view/staffs.php?status=error&slug=Staff');
		}
	}
	


 ?>