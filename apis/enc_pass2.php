<?php

include_once 'connection.php';
$condition = '';
if (!empty($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $id2 = $id + 100;
    $condition .= " and id between $id and $id2 ";


    $sql = "SELECT id, org_password FROM users WHERE org_password !='' $condition";
    $data = mysqli_query($stage, $sql);
    $i = 0;
    while ($row = mysqli_fetch_assoc($data)) {
        $i++;
        $postData['user_id'] = $row['id'];
        $postData['password'] = trim($row['org_password']);
        echo $i . '-' . $row['id'] . ' => ';
        serviceApi($postData);
    }
}

function serviceApi($postData)
{
    $curlObj = curl_init();
    $options = array(
        CURLOPT_POST => 1,
        CURLOPT_HEADER => 0,
        CURLOPT_URL => 'http://demos.sappleserve.com/obedientcorpStagingApi/public/api/change-agent-password',
        CURLOPT_FRESH_CONNECT => 0,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_FORBID_REUSE => 0,
        CURLOPT_TIMEOUT => 300,
        CURLOPT_POSTFIELDS => $postData, //http_build_query($postData)
    );
    curl_setopt_array($curlObj, $options);
    $result = curl_exec($curlObj);
    curl_close($curlObj);
    echo '$result - ' . $result . '<hr/><hr/>';
}
