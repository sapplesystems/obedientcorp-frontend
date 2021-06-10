<?php

include_once 'apis/connection.php';

$query = "select id, username from users";
$data = mysqli_query($stage, $query);
$i = 0;
while ($row = mysqli_fetch_assoc($data)) {
    $i++;
    $user_id = $row['id'];
    $old_username = $row['username'];
    $user_id_len = strlen($user_id);
    if ($user_id_len == '1') {
        $rand_start = 11111;
        $rand_limit = 99999;
    } else if ($user_id_len == '2') {
        $rand_start = 1111;
        $rand_limit = 9999;
    } else if ($user_id_len == '3') {
        $rand_start = 111;
        $rand_limit = 999;
    } else if ($user_id_len == '4') {
        $rand_start = 11;
        $rand_limit = 99;
    }
    $username = 'OG' . $user_id . rand($rand_start, $rand_limit);
    $update_username = "update users set username='$username' where username='$old_username'";
    $update_introducer_code = "update users set introducer_code='$username' where introducer_code='$old_username'";
    $update_parent_node = "update users set parent_node='$username' where parent_node='$old_username'";
    $update_left_node = "update users set left_node='$username' where left_node='$old_username'";
    $update_right_node = "update users set right_node='$username' where right_node='$old_username'";
    mysqli_query($stage, $update_username);
    mysqli_query($stage, $update_introducer_code);
    mysqli_query($stage, $update_parent_node);
    mysqli_query($stage, $update_left_node);
    mysqli_query($stage, $update_right_node);
    echo $i . '. $old_username - ' . $old_username . ', $username - ' . $username . '<hr/>';
}

?>