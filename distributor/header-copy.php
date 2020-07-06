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
$address = $_SESSION['distributor_login_resp']['address'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Obedient</title>
  <link rel="shortcut icon" href="<?php echo $home_url; ?>assets/images/favicon.png" />

  <link rel="stylesheet" href="<?php echo $home_url; ?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $home_url; ?>assets/javascript/distributor/css/all.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo $home_url; ?>assets/javascript/distributor/css/flatpickr.css" />
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo $home_url; ?>assets/css/style-theme.css">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="javscript:void(0);" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="javscript:void(0);" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
              <img alt="image" src="<?php echo $home_url; ?>assets/images/avatar-1.png" class="rounded-circle mr-1">
              <div class="d-sm-none d-lg-inline-block"><?php echo $name; ?></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="javscript:void(0);" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="change-password" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Change Password
              </a>
              <div class="dropdown-divider"></div>
              <a href="javscript:void(0);" onclick="logout();" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="dashboard"><img style="height:80px;" src="<?php echo $home_url; ?>assets/images/obedient-logo.png" /></a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="dashboard"><img style="height:40px;" src="<?php echo $home_url; ?>assets/images/obedient-logo.png" /></a>
          </div>
          <ul class="sidebar-menu">
            <li class="nav-item active">
              <a href="dashboard" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="nav-item">
              <a href="distributor-inovice" class="nav-link"><i class="fas fa-columns"></i> <span>POS</span></a>
            </li>
            <li class="nav-item">
              <a href="item-received-list" class="nav-link"><i class="far fa-square"></i> <span>Recieve Items</span></a>
            </li>
            <li class="nav-item">
              <a href="dispatch-list" class="nav-link"><i class="fas fa-th"></i> <span>Dispatches</span></a>
            </li>
            <li class="nav-item">
              <a href="item-return-list" class="nav-link"><i class="fas fa-th-large"></i> <span>Return Items</span></a>
            </li>
            <li class="nav-item dropdown">
              <a href="javascript:void(0);" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Reports</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="current-stock">Current Stock</a></li>
                <li><a class="nav-link" href="stock-flow">Stock Flow</a></li>
                <li><a class="nav-link" href="sales-report">Sales Report</a></li>
                <li><a class="nav-link" href="invoice-detail">Invoice Details</a></li>
              </ul>
            </li>
          </ul>
        </aside>
      </div>