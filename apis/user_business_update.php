<?php

include_once 'connection.php';
//$query = "select memid, totleft, totright, matchAmt from payout_cal order by pid limit 0,10";
$query = " SELECT pid, memid, balleft, balright, matchAmt, caldate FROM payout_cal
            WHERE pid IN(
                    SELECT MAX(pid)
                FROM payout_cal
                GROUP BY trim(memid)
            )";
$data = mysqli_query($live, $query) or die(mysqli_error($live));
if (mysqli_num_rows($data) > 0) {
    $i = 1;
    while ($row = mysqli_fetch_assoc($data)) {
        $caldate = '2020-03-16 00:00:00';
        if (!empty($row['caldate'])) {
            $caldate = date('Y-m-d', strtotime($str)) . ' 00:00:00';
        }
        $memid = trim($row['memid']);
        $query2 = "SELECT SUM(matchAmt) as matchAmt, SUM(comm) as comm FROM payout_cal WHERE trim(memid) ='" . $memid . "'";
        $tol_matching_amount = mysqli_query($live, $query2) or die(mysqli_error($live));
        $matching_amount = mysqli_fetch_assoc($tol_matching_amount);
        $matchAmt = $matching_amount['matchAmt'];
        $comm = $matching_amount['comm'];

        $total_left_business = $matchAmt + $row['balleft'];
        $total_right_business = $matchAmt + $row['balright'];
        $query1 = "select id from users where trim(username) = '" . $memid . "' ";
        $username = mysqli_query($stage, $query1) or die(mysqli_error($stage));
        $userdata = mysqli_fetch_assoc($username);
        if (!empty($userdata) && !empty($userdata['id'])) {
            $user_id = $userdata['id'];
            $remaining_left_business = $row['balleft'];
            $remaining_right_business = $row['balright'];
            
            echo $i.'=>'.$sql.'<br/>';
            echo "update income_funds set amount='$comm',created_at='$caldate' where user_id='$user_id'<br/>";
            echo "insert into income_fund_transactions (user_id,total_left_business,total_right_business,
                    remaining_left_business,remaining_right_business,amount,matching_amount,total_matching_amount,type,description,created_at) 
                    values('$user_id','$total_left_business','$total_right_business','$remaining_left_business','$remaining_right_business',
                    '$comm','$matchAmt','$matchAmt','Cr','$desc','$caldate')<br/>";
            echo '<hr/>';
            
            $sql = "update user_businesses set total_left_business='$total_left_business', total_right_business='$total_right_business', 
			remaining_left_business='$remaining_left_business', remaining_right_business='$remaining_right_business',
			matching_amount='$matchAmt',total_matching_amount='$matchAmt',created_at='$caldate' where user_id = '$user_id'";
            mysqli_query($stage, $sql);

            mysqli_query($stage, "update income_funds set amount='$comm',created_at='$caldate' where user_id='$user_id'");

            $desc = 'Income fund account has been credited with Rs. ' . $comm . '.';
            mysqli_query($stage, "insert into income_fund_transactions (user_id,total_left_business,total_right_business,
                    remaining_left_business,remaining_right_business,amount,matching_amount,total_matching_amount,type,description,created_at) 
                    values('$user_id','$total_left_business','$total_right_business','$remaining_left_business','$remaining_right_business',
                    '$comm','$matchAmt','$matchAmt','Cr','$desc','$caldate')");
        }
        $i++;
    }
}
?>