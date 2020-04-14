<?php

include_once 'connection.php';

$sql = "SELECT id, org_password FROM users WHERE org_password !=''";
$data = mysqli_query($stage, $sql);
while ($row = mysqli_fetch_assoc($data)) {
    $postData['user_id'] = $row['id'];
    $postData['password'] = $row['org_password'];
    serviceApi($postData);
}

function serviceApi($postData) {
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

?>