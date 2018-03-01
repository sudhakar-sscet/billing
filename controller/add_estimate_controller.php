<?php 
	if(!empty($_POST)){
		include_once '../model/index.php';
		$data = process_array($_POST);
		$estimate_data = $wpdb->get_results("SELECT estimate_no FROM estimates WHERE '1' ORDER BY estimate_no DESC LIMIT 1",ARRAY_A);
		$data['estimate_no'] = process_estimate_no($estimate_data);
		$cus_id = $data['company_name'];
		$customer_name = $wpdb->get_results("SELECT company_name FROM customers WHERE id=$cus_id",ARRAY_A)[0];
		$data['company_name'] = $customer_name['company_name'];
		if($wpdb->insert( 'estimates', $data)){
			header('location: ../view/add_estimate.php?status=inserted&slug=Bill');
		}else{
			header('location: ../view/add_estimate.php?status=error&slug=Bill');
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

	function process_estimate_no($estimate_data)
	{
		$year = date('Y');
		$month = date('m');
		if (empty($estimate_data)) {
			$estimate_no = $year.$month.'-1';
		}
		else{
			if (empty($estimate_data['0']['estimate_no'])) {
				$estimate_no = $year.$month.'-1';
			}
			else{
				$last_estimate_no = $estimate_data['0']['estimate_no'];
				$estimate_no_split = explode('-', $last_estimate_no);
				$estimate_no = $estimate_no_split['1']+1;
				$estimate_no = $year.$month.'-'.$estimate_no;
			}
		}
		return $estimate_no;
	}