<?php 
	if(!empty($_POST)){
		include_once '../model/index.php';
		$data = process_array($_POST);
		$cus_id = $data['company_name'];
		$where  = array('estimate_no' => $data['estimate_no']);
		print_r($data);
		if($wpdb->update( 'estimates', $data,$where)){
			header('location: ../view/generate_estimate.php?status=inserted&slug=Bill');
		}else{
			header('location: ../view/generate_estimate.php?status=error&slug=Bill');
		}
	}

	function process_array($value)
	{
		$raw_data = $value;
		$process_data = $value;
		unset($process_data['company_name'],$process_data['address'],$process_data['gst_number'],$process_data['contact_person'],$process_data['contact_number'],$process_data['grand_total']);
		unset($raw_data['product_name'],$raw_data['price'],$raw_data['qty'],$raw_data['total']);
		foreach ($process_data as $key => $value) {
			for ($i=0; $i < count($value) ; $i++) { 
				$estimate_list[$i]['sno'] = $i + 1;
				$estimate_list[$i][$key] = $value[$i];
			}
		}
		$raw_data['estimate_list'] = serialize($estimate_list);
		return $raw_data;
	}