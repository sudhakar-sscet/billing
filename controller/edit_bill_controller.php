<?php 
	if(!empty($_POST)){
		include_once '../model/index.php';
		$data = process_array($_POST);
		$cus_id = $data['company_name'];
		$where  = array('bill_no' => $data['bill_no']);
		if($wpdb->update( 'bills', $data,$where)){
			header('location: ../view/generate_bill.php?status=inserted&slug=Bill');
		}else{
			header('location: ../view/generate_bill.php?status=error&slug=Bill');
		}
	}

	function process_array($value)
	{
		$raw_data = $value;
		$process_data = $value;
		unset($process_data['company_name'],$process_data['address'],$process_data['gst_number'],$process_data['contact_person'],$process_data['contact_number']);
		unset($raw_data['product_name'],$raw_data['price'],$raw_data['qty'],$raw_data['sgst'],$raw_data['cgst'],$raw_data['total']);
		foreach ($process_data as $key => $value) {
			for ($i=0; $i < count($value) ; $i++) { 
				$product_list[$i]['sno'] = $i + 1;
				$product_list[$i][$key] = $value[$i];
			}
		}
		$raw_data['product_list'] = serialize($product_list);
		return $raw_data;
	}