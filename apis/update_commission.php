<?php

include_once 'connection.php';
//$query = "select memid, totleft, totright, matchAmt from payout_cal order by pid limit 0,10";
$query = "SELECT memid, SUM(comm) AS commission FROM payout_cal GROUP BY TRIM(memid) HAVING commission > 0";
$data = mysqli_query($live, $query) or die(mysqli_error($live));
if (mysqli_num_rows($data) > 0) {
    $i = 1;
    while ($row = mysqli_fetch_assoc($data)) {
        $memid = trim($row['memid']);
        $commission = $row['commission'];

        $query1 = "select id from users where trim(old_username) = '" . $memid . "' ";
        $username = mysqli_query($stage, $query1) or die(mysqli_error($stage));
        $userdata = mysqli_fetch_assoc($username);
        if (!empty($userdata) && !empty($userdata['id'])) {
            $user_id = $userdata['id'];

            $q1 = "update user_businesses set income_fund='$commission', total_income_fund='$commission' where user_id = '$user_id'";
            $q2 = "update user_business_histories set income_fund='$commission' where user_id = '$user_id'";
            $desc = 'Income fund account has been credited with Rs. ' . $commission . '.';
            $q3 = "update income_fund_transactions set income_fund='$commission', description='$desc' where user_id = '$user_id'";

            echo $q1 . '<br/>' . $q2 . '<br/>' . $q3 . '<br/>';

            mysqli_query($stage, $q1);
            mysqli_query($stage, $q2);
            mysqli_query($stage, $q3);
            echo '<hr/>';
        }
        $i++;
    }
}
?>