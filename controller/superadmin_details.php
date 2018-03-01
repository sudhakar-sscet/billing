<?php
	session_start();
	include_once '../model/db.php';
	$phone_number=$_REQUEST['phone_no'];
	if($phone_number=='9842972047'||$phone_number=='9698969480'||$phone_number=='8526462226'){
		$_SESSION["user_details"]['username'] = "Admin";
		$_SESSION["user_details"]['phone_no'] = $phone_number;
		echo "success";
	}else{
		echo "error";
	}


