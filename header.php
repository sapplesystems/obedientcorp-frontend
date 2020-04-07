<?php
session_start();
if (!$_SESSION['login_resp']['id'] || $_SESSION['login_resp']['id'] == '' || empty($_SESSION['login_resp']['id'])) {
    echo '<script type="text/javascript">window.location.href = "login";</script>';
    exit;
}
$base_url = 'http://demos.sappleserve.com/obedient_api/public/api/';
$media_url = 'http://demos.sappleserve.com/obedient_api/public/uploads/';
$user_id = $_SESSION['login_resp']['id'];
$user_email = $_SESSION['login_resp']['email'];
$associate_name = $_SESSION['login_resp']['associate_name'];
$user_type = $_SESSION['login_resp']['user_type'];
$left_node_id = $_SESSION['login_resp']['left_node_id'];
$right_node_id = $_SESSION['login_resp']['right_node_id'];
$photo = $_SESSION['login_resp']['photo'];
$user_active_range = $_SESSION['login_resp']['configurations']['user_active_range'];
include_once 'common_html.php';
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Obedient</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <link rel="stylesheet" href="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
        <!-- Plugin css for this page -->
        <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
        <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <!-- endinject -->
        <!-- Layout styles -->
        <link rel="stylesheet" href="assets/css/style.css">
        <!-- End layout styles -->
        <link rel="shortcut icon" href="assets/images/favicon.png" />
        <link rel="stylesheet" href="assets/css/croppie.css" />
    </head>

    <body>
        <div id="loader_bg">
            <div class="flip-square-loader mx-auto" id="loader_div"></div>
        </div>
        <div class="container-scroller">
            <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
                <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo" href="<?php echo $home_url; ?>"><img src="images/logo_header.png" alt="logo" /></a>
                    <a class="navbar-brand brand-logo-mini" href="<?php echo $home_url; ?>"><img src="images/footer_logo.png" alt="logo" /></a>
                </div>
                <div class="navbar-menu-wrapper d-flex align-items-stretch">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                        <span class="mdi mdi-menu"></span>
                    </button>


                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item nav-profile dropdown">
                            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                                <div class="nav-profile-img">
                                    <img src="<?php echo $media_url . 'profile_photo/' . $photo; ?>" alt="image" id="user_photo">
                                    <span class="availability-status"></span>
                                </div>
                                <div class="nav-profile-text">
                                    <p class="mb-1" id="user_login"><?php echo $associate_name; ?></p>
                                </div>
                            </a>
                            <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="mdi mdi-cached mr-2 text-success"></i> Activity Log </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" onclick="logout()">
                                    <i class="mdi mdi-logout mr-2 text-primary"></i> Signout </a>
                            </div>
                        </li>
                        <li class="nav-item nav-logout d-none d-lg-block">
                            <a class="nav-link" href="#" onclick="logout()">
                                <i class="mdi mdi-power"></i>
                            </a>
                        </li>
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
                            <a class="nav-link" href="profile">
                                <span class="menu-title">Profile</span>
                                <i class="mdi mdi-account menu-icon"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="change-password">
                                <span class="menu-title">Change Password</span>
                                <i class="mdi mdi-account menu-icon"></i>
                            </a>
                        </li>
                        <?php if ($user_type == 'ADMIN') { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="agent-list">
                                    <span class="menu-title">Agent List</span>
                                    <i class="mdi mdi-settings menu-icon"></i>
                                </a>
                            </li>
                        <?php } ?>
                        <li class="nav-item">
                            <a class="nav-link" href="customer-list">
                                <span class="menu-title">Customer List</span>
                                <i class="mdi mdi-settings menu-icon"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="manage-customer">
                                <span class="menu-title">Manage Customer</span>
                                <i class="mdi mdi-settings menu-icon"></i>
                            </a>
                        </li>
                        <?php if ($user_type == 'ADMIN') { ?>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="collapse" href="#project" aria-expanded="false" aria-controls="project">
                                    <span class="menu-title">Manage Project</span>
                                    <i class="menu-arrow"></i>
                                    <i class="mdi mdi-wrench menu-icon"></i>
                                </a>
                                <div class="collapse" id="project">
                                    <ul class="nav flex-column sub-menu">
                                        <li class="nav-item"> <a class="nav-link" href="project-list">Project List</a></li>
                                        <li class="nav-item"> <a class="nav-link" href="plot-list">Plot List</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="collapse" href="#category" aria-expanded="false" aria-controls="category">
                                    <span class="menu-title">Manage Products</span>
                                    <i class="menu-arrow"></i>
                                    <i class="mdi mdi-view-grid menu-icon"></i>
                                </a>
                                <div class="collapse" id="category">
                                    <ul class="nav flex-column sub-menu">
                                        <li class="nav-item"> <a class="nav-link" href="category-list">Category List</a></li>
                                        <li class="nav-item"> <a class="nav-link" href="product-list">Product List</a></li>
                                    </ul>
                                </div>
                            </li>
                        <?php } ?>
                        <li class="nav-item">
                            <a class="nav-link" href="team">
                                <span class="menu-title">Your Team</span>
                                <i class="mdi mdi-format-title menu-icon"></i>
                            </a>
                        </li>
                        <?php if ($user_type == 'ADMIN') { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="agent-business">
                                    <span class="menu-title">Agent Business</span>
                                    <i class="mdi mdi-wallet menu-icon"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="add-money-to-wallet">
                                    <span class="menu-title">Add Money to Wallet</span>
                                    <i class="mdi mdi-wallet menu-icon"></i>
                                </a>
                            </li>
                        <?php } ?>
                        <li class="nav-item">
                            <a class="nav-link" href="manage-coupon">
                                <span class="menu-title">Manage Coupons</span>
                                <i class="mdi mdi-wallet-giftcard menu-icon"></i>
                            </a>
                        </li>
                        <?php if ($user_type == 'ADMIN') { ?>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="collapse" href="#approve_request" aria-expanded="false" aria-controls="category">
                                    <span class="menu-title">Approve Requests</span>
                                    <i class="menu-arrow"></i>
                                    <i class="mdi mdi-view-grid menu-icon"></i>
                                </a>
                                <div class="collapse" id="approve_request">
                                    <ul class="nav flex-column sub-menu">
                                        <li class="nav-item"> <a class="nav-link" href="real-state-request">Real State Requests</a></li>
                                        <li class="nav-item"> <a class="nav-link" href="fmcg-request">FMCG Requests</a></li>
                                    </ul>
                                </div>
                            </li>
                            <!--li class="nav-item">
                                <a class="nav-link" href="make-payment-request-admin">
                                    <span class="menu-title">Approve EMI Payments</span>
                                    <i class="mdi mdi-checkbox-marked-circle-outline menu-icon"></i>
                                </a>
                            </li-->
                        <?php } ?>
                        <?php if ($user_type != 'ADMIN') { ?>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="collapse" href="#make_request_nav" aria-expanded="false" aria-controls="category">
                                    <span class="menu-title">Requests</span>
                                    <i class="menu-arrow"></i>
                                    <i class="mdi mdi-view-grid menu-icon"></i>
                                </a>
                                <div class="collapse" id="make_request_nav">
                                    <ul class="nav flex-column sub-menu">
                                        <li class="nav-item"> <a class="nav-link" href="collect-emi">Collect EMI</a></li>
                                        <li class="nav-item"> <a class="nav-link" href="wallet-request">Make Request to Wallet</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="wallet-to-wallet-transfer">
                                    <span class="menu-title">Wallet to Wallet Transfer</span>
                                    <i class="mdi mdi-repeat menu-icon"></i>
                                </a>
                            </li>
                        <?php } ?>
                        <li class="nav-item">
                            <a class="nav-link" href="income-fund-history">
                                <span class="menu-title">Income Fund History</span>
                                <i class="mdi mdi-repeat menu-icon"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="ewallet-history">
                                <span class="menu-title">E-Wallet History</span>
                                <i class="mdi mdi-repeat menu-icon"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pin-bonus">
                                <span class="menu-title">Pin Bonus History</span>
                                <i class="mdi mdi-repeat menu-icon"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="matching-income">
                                <span class="menu-title">Matching Income History</span>
                                <i class="mdi mdi-repeat menu-icon"></i>
                            </a>
                        </li>
                        <?php if ($user_type == 'ADMIN') { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="contact-request">
                                    <span class="menu-title">Contact Requests</span>
                                    <i class="mdi mdi-settings menu-icon"></i>
                                </a>
                            </li>
                        <?php } ?>
                        <!--li class="nav-item">
                            <a class="nav-link" href="#" onclick="logout();">
                                <span class="menu-title">Logout</span>
                                <i class="mdi mdi-logout menu-icon"></i>
                            </a>
                        </li-->

                    </ul>
                </nav>