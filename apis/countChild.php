<?php
error_reporting(1);
set_time_limit(0);

$mysqli = new mysqli("18.213.130.18", "obedent_usr", "obedient@123", "obedient_stage");


if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
$dataAll = array();
$data = array("'" . $_REQUEST['id'] . "'");


countChild($data, $mysqli, $dataAll);

function countChild($data, $mysqli, $dataAll) {
    $qry = "SELECT left_node,right_node FROM `users` WHERE `username` in(" . implode(',', $data) . ")";
    $result = $mysqli->query($qry);
    $rows = $result->fetch_all();

    $newResult = array();
    foreach ($rows as $row) {

        if ($row[0] != '') {
            $newResult[] = "'" . $row[0] . "'";
        }
        if ($row[1] != '') {
            $newResult[] = "'" . $row[1] . "'";
        }
    }
    //echo '<pre>';print_r($newResult);print_r($data);
    $diffData = array_diff($newResult, $data);
    $dataAll = array_unique(array_merge($dataAll, $newResult));
    //print_r($dataAll);
    if (count($diffData)) {
       // print_r($diffData);
        countChild($diffData, $mysqli, $dataAll);
    } else {
        echo 'Staging DB result:' . count($dataAll);
    }
}