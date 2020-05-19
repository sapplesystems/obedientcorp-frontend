<?php
session_start();
if (isset($_SESSION['login_resp']['id']) && !empty($_SESSION['login_resp']['id'])) {
    echo '<script type="text/javascript">window.location.href = "dashboard";</script>';
    exit;
}
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
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <!-- endinject -->
        <!-- Layout styles -->
        <link rel="stylesheet" href="assets/css/style.css">
        <!-- End layout styles -->
        <link rel="shortcut icon" href="assets/images/favicon.png" />
    </head>

    <body>
        <div id="loader_bg">
            <div class="flip-square-loader mx-auto" id="loader_div"></div>
        </div>
        <div class="container-scroller">
            <div class="container-fluid page-body-wrapper full-page-wrapper">
                <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
                    <div class="row flex-grow">
                        <div class="col-lg-6 d-flex align-items-center justify-content-center">
                            <div class="auth-form-transparent text-left p-3">
                                <div class="brand-logo">
                                    <a href="<?php echo $home_url; ?>"><img src="assets/images/logo.png" alt="logo"></a>
                                </div>
                                <h4>Welcome back!</h4>
                                <h6 class="font-weight-light">Happy to see you again!</h6>
                                <form class="pt-3" id="login_form">
                                    <div class="form-group">
                                        <label for="exampleInputEmail"></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend bg-transparent">
                                                <span class="input-group-text bg-transparent border-right-0">
                                                    <i class="mdi mdi-account-outline text-primary"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control form-control-lg border-left-0" id="username" name="username" placeholder="User ID">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword"></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend bg-transparent">
                                                <span class="input-group-text bg-transparent border-right-0">
                                                    <i class="mdi mdi-lock-outline text-primary"></i>
                                                </span>
                                            </div>
                                            <input type="password" class="form-control form-control-lg border-left-0" id="password" name="password" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="my-2 d-flex justify-content-between align-items-center">
                                        <div class="form-check">
                                            <label class="form-check-label text-muted">
                                                <input type="checkbox" class="form-check-input"> Keep me signed in </label>
                                        </div>
                                        <a href="forgot-password" class="auth-link">Forgot Password?</a>
                                    </div>
                                    <div class="my-3">
                                        <button class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" id="login">LOGIN</button>
                                    </div>
                                    <div class="text-center mt-4 font-weight-light"> Don't have an account? <a href="register" class="text-primary">Create</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 login-half-bg d-flex flex-row bg_none">
                            <p class="text-white font-weight-medium text-center flex-grow align-self-end">
                                &copy; 2020 Obedient Marketing Universal Private Limited. All rights reserved | Design by Obedient Group
                            </p>
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
    var base_url = "<?php echo $base_url; ?>";
    //function for login
    $(function () {

        //checkCookie();
        $("#login").click(function (e) {
            e.preventDefault();
            $("#login_form").validate({
                rules: {
                    username: {
                        required: true,
                    },
                    password: {
                        required: true,
                    },
                },
            });
            if ($("#login_form").valid()) {
                showLoader();
                var url = base_url + 'login';
                var params = {
                    username: $("#username").val(),
                    password: $("#password").val(),
                };
                $.ajax({
                    url: url,
                    type: 'post',
                    data: params,
                    success: function (response) {
                        console.log(response);
                        if (response.status == "success") {
                            $.post('localapi.php', {
                                create_session: 1,
                                login_resp: JSON.stringify(response.data)//response.data
                            }, function (resp) {
                                var customObject = {};
                                customObject.id = response.data.id;
                                customObject.name = response.data.associate_name;
                                customObject.email = response.data.email;
                                customObject.token = response.data.token;
                                customObject.user_type = response.data.user_type;
                                customObject.left_node_id = response.data.left_node_id;
                                customObject.right_node_id = response.data.right_node_id;
                                if (response.data.photo) {
                                    customObject.photo = response.data.photo;
                                }
                                var jsonString = JSON.stringify(customObject);
                                setCookie(jsonString);
                                hideLoader();
                            });
                        }
                        else
                        {
                            var error = response.data;
                            showSwal('error', 'Login Failed', error);
                            hideLoader();
                        }
                    }, //success function
                    error: function (response) {
                        error_html = '';
                        var error_object = JSON.parse(response.responseText);
                        var message = error_object.message;
                        var errors = error_object.errors;
                        $.each(errors, function (key, value) {
                            error_html += '<div class="alert alert-danger" role="alert">' + value[0] + '</div>';
                        });
                        $('#errors_div').html(error_html);
                        hideLoader();
                    }

                }); //ajax 
            } //end if
        });

        //function for set cookies
        function setCookie(jsonString) {
            var d = new Date();
            var cname = "UserCookie";
            d.setTime(d.getTime() + (1 * 60 * 60 * 1000));
            var expires = "expires=" + d.toGMTString();
            document.cookie = cname + "=" + jsonString + ";" + expires + ";path=/";
            checkCookie();
        } //end function set cookies

        //function for checkcookies
        function checkCookie() {

            var UserCookie = getCookie("UserCookie");
            if (UserCookie !== '') {
                console.log('in if');
                var data = JSON.parse(UserCookie);
                window.location.href = "dashboard";
            } else {
                console.log('in else');
                logout();
            }
        } //end function checkcookies

        //function for get cookies
        function getCookie(cname) {

            var name = cname + "=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }

    });

    function showLoader() {
        $('#loader_bg').css('display', 'block');
    }

    function hideLoader() {
        $('#loader_bg').css('display', 'none');
    }

    function logout() {
        $.post('localapi.php', {
            destroy_session: 1
        }, function (resp) {
            document.cookie = 'UserCookie=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
            //window.location.href = 'login';
        });
    }

    hideLoader();
</script>