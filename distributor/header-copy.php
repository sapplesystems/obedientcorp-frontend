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
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Obedient</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="<?php echo $home_url; ?>assets/vendors/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="<?php echo $home_url; ?>assets/vendors/css/vendor.bundle.base.css">
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <link rel="stylesheet" href="<?php echo $home_url; ?>assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
        <!-- Plugin css for this page -->
        <link rel="stylesheet" href="<?php echo $home_url; ?>assets/vendors/font-awesome/css/font-awesome.min.css" />
        <link rel="stylesheet" href="<?php echo $home_url; ?>assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
        <link rel="stylesheet" href="<?php echo $home_url; ?>assets/vendors/lightgallery/css/lightgallery.css">
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <!-- endinject -->
        <!-- Layout styles -->
        <link rel="stylesheet" href="<?php echo $home_url; ?>assets/css/style.css">
        <!-- End layout styles -->
        <link rel="shortcut icon" href="<?php echo $home_url; ?>assets/images/favicon.png" />
        <link rel="stylesheet" href="<?php echo $home_url; ?>assets/css/croppie.css" />
        <link rel="stylesheet" href="<?php echo $home_url; ?>assets/css/image-uploader.min.css">
        <!--Css for autocomplete search -->
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    </head>

    <body>
        <div id="loader_bg">
            <div class="flip-square-loader mx-auto" id="loader_div"></div>
        </div>
        <div class="container-scroller">
            <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
                <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo" href="javascript:void();"><img src="<?php echo $home_url; ?>images/logo_header.png" alt="logo" /></a>
                    <a class="navbar-brand brand-logo-mini" href="javascript:void();"><img src="<?php echo $home_url; ?>images/footer_logo.png" alt="logo" /></a>
                </div>
                <div class="navbar-menu-wrapper d-flex align-items-stretch">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                        <span class="mdi mdi-menu"></span>
                    </button>


                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item nav-profile dropdown">
                            <a class="dropdown-item" href="#" onclick="logout()">
                                <?php echo $name . ' (' . $username . ')'; ?> <i class="mdi mdi-logout mr-2 text-primary"></i> Signout </a>
                        </li>
                        <!--li class="nav-item nav-logout d-none d-lg-block">
                                <a class="nav-link" href="#" onclick="logout()">
                                    <i class="mdi mdi-power"></i>
                                </a>
                            </li-->
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                        <span class="mdi mdi-menu"></span>
                    </button>
                </div>
            </nav>
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <nav class="sidebar sidebar-offcanvas" id="sidebar">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard">
                                <span class="menu-title">Dashboard</span>
                                <i class="mdi mdi-home menu-icon"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="distributor-inovice">
                                <span class="menu-title">POS</span>
                                <i class="mdi mdi-wallet-giftcard menu-icon"></i>
                            </a>
                        </li>
                        <!--li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#manage-inventory" aria-expanded="false" aria-controls="category">
                                <span class="menu-title">Manage Inventory</span>
                                <i class="menu-arrow"></i>
                                <i class="mdi mdi-view-grid menu-icon"></i>
                            </a>
                            <div class="collapse" id="manage-inventory" class="collapse show">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link" href="item-received-list">Recieve Items</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="dispatch-list">Dispatch Items</a></li>
                                    <li class="nav-item"> <a class="nav-link" href="#">Return Items</a></li>
                                </ul>
                            </div>
    </li>
                        <li class="nav-item">
                            <a class="nav-link" href="dispatch-generation">
                                <span class="menu-title">Dispatch Generation</span>
                                <i class="mdi mdi-repeat menu-icon"></i>
                            </a>
                        </li-->
                        <li class="nav-item">
                            <a class="nav-link" href="item-received-list">
                                <span class="menu-title">Recieve Items</span>
                                <i class="mdi mdi-view-grid menu-icon"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="dispatch-list">
                                <span class="menu-title">Dispatches</span>
                                <i class="mdi mdi-view-grid menu-icon"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <span class="menu-title">Return Items</span>
                                <i class="mdi mdi-view-grid menu-icon"></i>
                            </a>
                        </li>
                        <!--li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="menu-title">Reports</span>
                                <i class="mdi mdi-wallet menu-icon"></i>
                            </a>
                        </li-->
                        <li class="nav-item">
                            <a class="nav-link" href="current-stock">
                                <span class="menu-title">Current Stock</span>
                                <i class="mdi mdi-wallet menu-icon"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="stock-flow">
                                <span class="menu-title">Stock Flow</span>
                                <i class="mdi mdi-wallet menu-icon"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="sales-report">
                                <span class="menu-title">Sales Report</span>
                                <i class="mdi mdi-wallet menu-icon"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="invoice-detail">
                                <span class="menu-title">Invoice Details</span>
                                <i class="mdi mdi-wallet menu-icon"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <span class="menu-title">Profile</span>
                                <i class="mdi mdi-account menu-icon"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="change-password">
                                <span class="menu-title">Change Password</span>
                                <i class="mdi mdi-lock menu-icon"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="logout();">
                                <span class="menu-title">Logout</span>
                                <i class="mdi mdi-settings menu-icon"></i>
                            </a>
                        </li>
                    </ul>
                </nav>