<?php
include_once 'connection.php';
//$query = "select memid, totleft, totright, matchAmt from payout_cal order by pid limit 0,10";
$query = " SELECT pid, memid, balleft, balright, matchAmt FROM payout_cal
WHERE pid IN(
	SELECT MAX(pid)
    FROM payout_cal
    GROUP BY memid
)";
$data = mysqli_query($live, $query) or die(mysqli_error($live));
if (mysqli_num_rows($data) > 0) {
	$i = 1;
	while ($row = mysqli_fetch_assoc($data)) {
		$query2 = "SELECT SUM(matchAmt) as matchAmt FROM payout_cal WHERE memid ='".$row['memid']."'";
		$tol_matching_amount = mysqli_query($live, $query2) or die(mysqli_error($live));
		$matching_amount = mysqli_fetch_assoc($tol_matching_amount);
		$matchAmt = $matching_amount['matchAmt'];
		$total_left_business = $matchAmt + $row['balleft'];
		$total_right_business = $matchAmt + $row['balright'];
		$query1 = "select id from users where username = '".$row['memid']. "' ";
		$username = mysqli_query($stage, $query1) or die(mysqli_error($stage));
		$userdata = mysqli_fetch_assoc($username);
		if(!empty($userdata) && !empty($userdata['id']))
		{
			$user_id = $userdata['id'];
			$remaining_left_business = $row['balleft'];
			$remaining_right_business = $row['balright'];
			$sql = "update user_businesses set total_left_business='$total_left_business', total_right_business='$total_right_business', 
			remaining_left_business='$remaining_left_business', remaining_right_business='$remaining_right_business',
			matching_amount='$matchAmt',total_matching_amount='$matchAmt' where user_id = '$user_id'";
			//mysqli_query($stage, $sql);
			echo $i . ' - ' . $sql . '<hr/><hr/><hr/>';
			exit;
		}
		$i++;
	}
}
?>