<?php 
	if(!empty($_POST)){
		include_once '../model/index.php';
		$data = process_array($_POST);
		$bill_data = $wpdb->get_results("SELECT bill_no FROM bills WHERE '1' ORDER BY bill_no DESC LIMIT 1",ARRAY_A);
		$data['bill_no'] = process_bill_no($bill_data);
		$cus_id = $data['company_name'];
		$customer_name = $wpdb->get_results("SELECT company_name FROM customers WHERE id=$cus_id",ARRAY_A)[0];
		$data['company_name'] = $customer_name['company_name'];
		if($wpdb->insert( 'bills', $data)){
			header('location: ../view/add_bill.php?status=inserted&slug=Bill');
		}else{
			header('location: ../view/add_bill.php?status=error&slug=Bill');
		}
	}

	function process_array($value)
	{
		$raw_data = $value;
		$process_data = $value;
		unset($process_data['company_name'],$process_data['address'],$process_data['gst_number'],$process_data['contact_person'],$process_data['contact_number'],$process_data['grand_total']);
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

	function process_bill_no($bill_data)
	{
		$year = date('Y');
		$month = date('m');
		if (empty($bill_data)) {
			$bill_no = $year.$month.'-1';
		}
		else{
			if (empty($bill_data['0']['bill_no'])) {
				$bill_no = $year.$month.'-1';
			}
			else{
				$last_bill_no = $bill_data['0']['bill_no'];
				$bill_no_split = explode('-', $last_bill_no);
				$bill_no = $bill_no_split['1']+1;
				$bill_no = $year.$month.'-'.$bill_no;
			}
		}
		return $bill_no;
	}