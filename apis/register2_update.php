<?php

include_once 'connection.php';

$query = "select id, introducer_code, parent_node, left_node, right_node from users order by id";
$data = mysqli_query($stage, $query);
while ($row = mysqli_fetch_assoc($data)) {
    $id = $row['id'];
    $introducer_code = $row['introducer_code'];
    $parent_node = $row['parent_node'];
    $left_node = $row['left_node'];
    $right_node = $row['right_node'];

    $q1 = "select id from users where username = '$introducer_code'";
    $d1 = mysqli_query($stage, $q1);
    $r1 = mysqli_fetch_assoc($d1);
    $referral_id = $r1['id'];

    $left_node_id = 0;
    if (!empty($left_node)) {
        $q2 = "select id from users where username = '$left_node'";
        $d2 = mysqli_query($stage, $q2);
        $r2 = mysqli_fetch_assoc($d2);
        $left_node_id = $r2['id'];
    }

    $right_node_id = 0;
    if (!empty($right_node)) {
        $q3 = "select id from users where username = '$right_node'";
        $d3 = mysqli_query($stage, $q3);
        $r3 = mysqli_fetch_assoc($d3);
        $right_node_id = $r3['id'];
    }

    $sql = "update users set referral_id='$referral_id', left_node_id='$left_node_id', right_node_id='$right_node_id' where id='$id'";
    mysqli_query($stage, $sql);

    echo $sql . '<hr/><hr/><hr/>';
}
?>
