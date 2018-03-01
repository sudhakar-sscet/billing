<?php
	session_start();
	$phone_number=$_REQUEST['phone_no'];
	if($phone_number=='9842972047'||$phone_number=='9698969480'||$phone_number=='8526462226'){
		$string = '0123456789';
		$string_shuffled = str_shuffle($string);
		$otp_code = substr($string_shuffled, 1, 4);
		$message = 'Your OTP for Login is '.$otp_code;
		send_message($phone_number,$message);
		echo $otp_code;
	}else{
		echo "error";
	}
	function send_message($phone_number,$message){
        $url = 'http://greefitech.siegsms.in/PostSms.aspx';
        $fields_string ="";
        $fields = array( 'userid' =>urlencode('greefitech'), 'pass'=>urlencode('madhuMitha123.'), 'phone'=>urlencode($phone_number), 'msg'=>urlencode($message));
        //url-ify
        foreach($fields as $key=>$value){
            $fields_string .= $key.'='.$value.'&'; rtrim($fields_string,'&');
        }
        rtrim($fields_string,'&');
        $url_final = $url.'?'.$fields_string;
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url_final);
        $result = curl_exec($ch);
        curl_close($ch);
    }

