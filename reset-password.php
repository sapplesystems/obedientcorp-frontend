<?php
session_start();
if (isset($_SESSION['login_resp']['id']) && !empty($_SESSION['login_resp']['id'])) {
    echo '<script type="text/javascript">window.location.href = "dashboard.php";</script>';
    exit;
}
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
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <!-- endinject -->
        <!-- Layout styles -->
        <link rel="stylesheet" href="assets/css/style.css">
        <!-- End layout styles -->
        <link rel="shortcut icon" href="assets/images/favicon.png" />
    </head>

    <body>
        <!--<div id="loader_bg">
            <div class="flip-square-loader mx-auto" id="loader_div"></div>
        </div>-->
        <div class="container-scroller">
            <div class="container-fluid page-body-wrapper full-page-wrapper">
                <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
                    <div class="row flex-grow">
                        <div class="col-lg-6 d-flex align-items-center justify-content-center">
                            <div class="auth-form-transparent text-left p-3">
                                <div class="brand-logo">
                                    <a href="index.html"><img src="assets/images/logo.png" alt="logo"></a>
                                </div>
                                <h4>Reset Password</h4>
                                <h6 class="font-weight-light">Enter your new password.</h6>
                                <form class="pt-3" id="resetpassword_form">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend bg-transparent">
                                                <span class="input-group-text bg-transparent border-right-0">
                                                    <i class="mdi mdi-lock-outline menu-icon text-primary"></i>
                                                </span>
                                            </div>
                                            <input type="password" class="form-control form-control-lg border-left-0" id="new_password" name="new_password" placeholder="New password">
                                        </div>
                                    </div>
									<div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend bg-transparent">
                                                <span class="input-group-text bg-transparent border-right-0">
                                                    <i class="mdi mdi-lock-outline menu-icon text-primary"></i>
                                                </span>
                                            </div>
                                            <input type="password" class="form-control form-control-lg border-left-0" id="confirm_password" name="confirm_password" placeholder="Confirm password">
                                        </div>
                                    </div>
                                    <div class="my-3">
                                        <button class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" id="submitPassword" name="submitPassword" value="submitPassword">Reset my password</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 register-half-bg d-flex flex-row bgImageNone">
                            <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2018 All rights reserved.</p>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="assets/vendors/js/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="assets/js/off-canvas.js"></script>
        <script src="assets/js/hoverable-collapse.js"></script>
        <script src="assets/js/misc.js"></script>
        <script src="assets/js/settings.js"></script>
        <script src="assets/js/todolist.js"></script>
        <!-- endinject -->
        <script src="assets/vendors/sweetalert/sweetalert.min.js "></script>
        <script src="assets/js/alerts.js "></script>
        <!--Validate jquery-->
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    </body>

</html>
<script>
    var base_url = 'http://demos.sappleserve.com/obedient_api/public/api/';


    $(document).on("click", "#submitPassword", function (e) {
        e.preventDefault();
        $("#resetpassword_form").validate({
            rules: {
                new_password: "required",
                confirm_password: "required",

            }
        });
        if ($("#resetpassword_form").valid()) {
            var params = new FormData();
            params.append('password', $('#new_password').val());
            params.append('password_confirmation', $('#confirm_password').val());
            params.append("token",'0619717e7bab2d98a5a980538a64d8c51976d7fa06e979ec48a304664bd5aa8d')
            $.ajax({
                url: base_url + 'reset-password',
                type: 'post',
                headers: {"token":'0619717e7bab2d98a5a980538a64d8c51976d7fa06e979ec48a304664bd5aa8d'},
                data: params,
                contentType: false,
                processData: false,
                success: function (response) {
                    debugger
                    if (response.status == "success") {
                        //showSwal('success', 'Email Added', 'Correct Email Enetered.');
                        //document.getElementById('forgetpassword_form').reset();
                    }
                    else {
                        //showSwal('error', 'Failed', 'Wrong Email.');
                    }

                }
            });

        }
    });
    
</script>