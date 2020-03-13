<?php
session_start();
$base_url = 'http://localhost/obedientcorp/public/api/';
$media_url = 'http://localhost/obedientcorp/public/uploads/';
$user_id = $_SESSION['login_resp']['id'];
$user_email = $_SESSION['login_resp']['email'];
$associate_name = $_SESSION['login_resp']['associate_name'];
$user_type = $_SESSION['login_resp']['user_type'];
$left_node_id = $_SESSION['login_resp']['left_node_id'];
$right_node_id = $_SESSION['login_resp']['right_node_id'];
$photo = $_SESSION['login_resp']['photo'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Obedient</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/css/demo_2/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../assets/images/favicon.png" />
    <link rel="stylesheet" href="../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.php -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="login.php"><img src="../assets/images/logo.png" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="login.php"><img src="../assets/images/logo.png" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">


                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                            <div class="nav-profile-img">
                                <img src="<?php echo $media_url . 'profile_photo/' . $photo; ?>" alt="image" id="user_photo">
                                <span class="availability-status online"></span>
                            </div>
                            <div class="nav-profile-text">
                                <p class="mb-1" id="user_login"><?php echo $associate_name;  ?></p>
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
            <!-- partial:partials/_sidebar.php -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">
                            <span class="menu-title">Dashboard</span>
                            <i class="mdi mdi-home menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#profile" aria-expanded="false" aria-controls="profile">
                            <span class="menu-title">Profile</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-account menu-icon"></i>
                        </a>
                        <div class="collapse" id="profile">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="profile.php">Edit Profile</a></li>
                                <li class="nav-item"> <a class="nav-link" href="javascript:void(0);">Edit Bank Account</a></li>
                                <li class="nav-item"> <a class="nav-link" href="javascript:void(0);">Change Password</a></li>
                            </ul>
                        </div>
                    </li>
					<li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);">
                            <span class="menu-title">Manage Customer</span>
                            <i class="mdi mdi-settings menu-icon"></i>
                        </a>
                    </li>
					<li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#project" aria-expanded="false" aria-controls="project">
                            <span class="menu-title">Manage Project</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-wrench menu-icon"></i>
                        </a>
                        <div class="collapse" id="project">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="add-project.php">Add/View Project</a></li>
                                <li class="nav-item"> <a class="nav-link" href="add-sub-project.php">Add/View Sub-Project</a></li>
                                <li class="nav-item"> <a class="nav-link" href="add-plot.php">Add/View Plot</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="team.php">
                            <span class="menu-title">Your Team</span>
                            <i class="mdi mdi-format-title menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                       <a class="nav-link" href="wallet.php">
                            <span class="menu-title">Wallet</span>
                            <i class="mdi mdi-wallet menu-icon"></i>
                        </a>
                    </li>
					<li class="nav-item">
                        <a class="nav-link" href="manage-coupon.php">
                            <span class="menu-title">E-Wallet</span>
                            <i class="mdi mdi-wallet-giftcard menu-icon"></i>
                        </a>
                    </li>
					<li class="nav-item">
                        <a class="nav-link" href="payments-admin.php">
                            <span class="menu-title">Payments</span>
                            <i class="mdi mdi-currency-inr menu-icon"></i>
                        </a>
                    </li>
					<li class="nav-item">
                        <a class="nav-link" href="make-payment-request-admin.php">
                            <span class="menu-title">Approvals</span>
                            <i class="mdi mdi-checkbox-marked-circle-outline menu-icon"></i>
                        </a>
                    </li>
					<li class="nav-item">
                        <a class="nav-link" href="make-payment-request-agent.php">
                            <span class="menu-title">Make Request</span>
                            <i class="mdi mdi-repeat menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">
                            <span class="menu-title">Logout</span>
                            <i class="mdi mdi-logout menu-icon"></i>
                        </a>
                    </li>

                </ul>
            </nav>