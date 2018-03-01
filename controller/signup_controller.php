<?php 
	include_once '../model/index.php';
	if(!empty($_POST)){
		if($wpdb->insert('groot_users', $_POST)){
			header("location: ../login?status=done");
		}else{
			header("location: ../login?status=error");
		}
	}
	