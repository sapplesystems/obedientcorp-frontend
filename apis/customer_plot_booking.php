<?php
include_once 'connection.php';
$query = "SELECT * FROM customer
		JOIN project ON project.pro_id = customer.plan_type
		WHERE agentCode != '' AND plan_no!= ''AND plan_type!= 31;";
$data = mysqli_query($live, $query) or die(mysqli_error($live));
if (mysqli_num_rows($data) > 0) {
	$i = 1;
	while ($row = mysqli_fetch_assoc($data)) {
		
		$query1 = "select plot_no from plot where plot_no = '".$row['plan_no']. "' ";
		$plot = mysqli_query($live, $query1) or die(mysqli_error($live));
		$plot_no = mysqli_fetch_assoc($plot);
		if(!empty($plot_no) && !empty($plot_no['plot_no']))
		{
			$query2 = "select id from users where username = '".$row['agentCode']. "' ";
			$agent_id = mysqli_query($stage, $query2) or die(mysqli_error($stage));
			$user_id = mysqli_fetch_assoc($agent_id);
			if(!empty($user_id) && !empty($user_id['id']))
			{
				$customer['user_id'] = $user_id['id'];
				$customer['id'] = $row['id'];
				$customer['name'] = $row['appcl_name'];
				$customer['username'] = $row['form_no'];
				$customer['fathers_name'] = $row['father'];
				$timestamp = strtotime($row['dob']);
				$new_date = date("Y-m-d", $timestamp);
				$customer['dob'] = $new_date;
				$customer['age'] = $row['age'];
				$customer['sex'] = $row['sex'];
				$customer['nationality'] = 'Indian';
				$customer['mobile'] = $row['mobile'];
				$customer['email'] = $row['email'];
				$customer['address'] = $row['add'];
				$customer['photo'] = $row['photo'];
				$customer['nominee_name'] = $row['nominee_name'];
				$customer['nominee_age'] = $row['nominee_age'];
				$customer['nominee_dob'] = '';
				$customer['nominee_relation'] = $row['relation_appl'];
				$customer['nominee_sex'] = $row['nominee_sex'];
				$customer['nominee_address'] = $row['add1'];
				$customer['payment_mode'] = $row['payment_mode'];
				$customer['account_number'] = $row['acc_number'];
				$customer['branch_name'] = $row['branch'];
				$customer['ifsc_code'] = $row['ifsc_code'];
				$customer['account_holder_name'] = $row['holder_name'];
				$customer['bank_name'] = $row['bank_name'];
				$customer['created_by'] = $user_id['id'];
				//insert here
				insertQuery($customer, 'customers',$i);
			}
			
		
			//echo $i;print_r($customer);echo '<hr/>';
		}
		
		
		
		$i++;
		
	}
}

function insertQuery($input, $table,$i){
	global $stage;
    $keys = '';
    $values = '';
	foreach ($input as $key => $value) {
        $keys .= $key . ',';
        $values .= "'" . $value . "',";
    }
	$keys = ' (' . substr($keys, 0, -1) . ') ';
    $values = ' values (' . substr($values, 0, -1) . ') ';
    echo $i.'--'. 'insert into ' . $table . $keys . $values . '<br/><br/><hr/>';
	mysqli_query($stage, 'insert into ' . $table . ' ' . $keys . ' ' . $values);
	
}
?>