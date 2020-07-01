<?php
session_start();
if (empty($_SESSION['distributor_login_resp']['id']) || $_SESSION['distributor_login_resp']['id'] == '') {
    echo '<script type="text/javascript">window.location.href = "login";</script>';
    exit;
}
include_once '../config.php';
$distributor_id = $_SESSION['distributor_login_resp']['id'];
$username = $_SESSION['distributor_login_resp']['username'];
$user_email = $_SESSION['distributor_login_resp']['email'];
$name = $_SESSION['distributor_login_resp']['name'];
$user_type = $_SESSION['distributor_login_resp']['user_type'];
$pan_image = $_SESSION['distributor_login_resp']['pan_image'];
$gst_image = $_SESSION['distributor_login_resp']['gst_image'];
?>

<!DOCTYPE html>
<html class="en_US responsive pt-cart" data-locale="en_US" lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">             
	
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Obedient
</title><!-- Version: fast, Revision: e3689977a Date: 3-6-2020 -->


<meta name="description" content="shopping.cart.page.desc"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $home_url; ?>assets/javascript/distributor/css/all.css" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $home_url; ?>assets/javascript/distributor/css/flatpickr.css" />
	</head>
	
    <body>

