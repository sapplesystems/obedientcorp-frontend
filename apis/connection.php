<?php

error_reporting(E_ALL ^ E_NOTICE);
set_time_limit (0);
$username = 'joomlasa_obident';
$password = 'obident@123';
$host = 'sappleserve.com';
$database = 'joomlasa_obident';
$port = 3306;
$live = mysqli_connect($host . ':' . $port, $username, $password, $database);
//echo '<pre>';print_r($live);echo '</pre>';

$username = 'obedent_usr';
$password = 'obedient@123';
$host = '18.213.130.18';
$database = 'obedient_stage';
$port = 3306;
$stage = mysqli_connect($host . ':' . $port, $username, $password, $database);
//echo '<pre>';print_r($stage);echo '</pre>';exit;