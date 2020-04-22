<?php
include_once 'connection.php';
//$query = "select memid, totleft, totright, matchAmt from payout_cal order by pid limit 0,10";
$query = " SELECT pid, memid, totleft, totright, matchAmt FROM payout_cal
WHERE pid IN(
	SELECT MAX(pid)
    FROM payout_cal
    GROUP BY memid
)";
$data = mysqli_query($live, $query) or die(mysqli_error($live));
if (mysqli_num_rows($data) > 0) {
	$i = 1;
	while ($row = mysqli_fetch_assoc($data)) {
		
		$query1 = "select id from users where username = '".$row['memid']. "' ";
		$username = mysqli_query($stage, $query1) or die(mysqli_error($stage));
		$userdata = mysqli_fetch_assoc($username);
		if(!empty($userdata) && !empty($userdata['id']))
		{
			$user_id = $userdata['id'];
			$total_left_business = $row['totleft'];
			$total_right_business = $row['totright'];
			$matching_amount = $row['matchAmt'];
			$total_matching_amount = $row['matchAmt'];
			$sql = "update user_businesses set total_left_business='$total_left_business', total_right_business='$total_right_business', 
			matching_amount='$matching_amount',total_matching_amount='$total_matching_amount' where user_id = '$user_id'";
			mysqli_query($stage, $sql);
			echo $i . ' - ' . $sql . '<hr/><hr/><hr/>';
		}
		$i++;
	}
}
?>