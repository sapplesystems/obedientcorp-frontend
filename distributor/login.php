<?php
include_once '../config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?php echo $home_url; ?>assets/images/favicon.png" />
    <!--===============================================================================================-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo $home_url; ?>assets/javascript/distributor/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $home_url; ?>assets/css/style.css">
    <!--===============================================================================================-->
</head>

<body>
    <div id="loader_bg">
        <div class="flip-square-loader mx-auto" id="loader_div"></div>
    </div>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="<?php echo $home_url; ?>assets/javascript/distributor/images/img-01.png" alt="IMG">
                </div>

                <form class="login100-form validate-form" id="login_form">
                    <span class="login100-form-title">
                        Member Login
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" id="username" name="username" placeholder="Email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" id="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" id="login">
                            Login
                        </button>
                    </div>

                    <div class="text-center mt-3">
                        <span class="txt1">
                            Forgot
                        </span>
                        <a class="txt2" href="javascript:void(0);">
                            Username / Password?
                        </a>
                    </div>

                    <div class="text-center mt-2">
                        <a class="txt2" href="javascript:void(0);">
                            Create your Account
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?php echo $home_url; ?>assets/vendors/sweetalert/sweetalert.min.js "></script>
<script src="<?php echo $home_url; ?>assets/js/alerts.js"></script>
<!--Validate jquery-->
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
    var base_url = "<?php echo $base_url; ?>";
    //function for login
    $(function() {

        //checkCookie();
        $("#login").click(function(e) {
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
                var url = base_url + 'distributor/login';
                var params = {
                    username: $("#username").val(),
                    password: $("#password").val(),
                };
                $.ajax({
                    url: url,
                    type: 'post',
                    data: params,
                    success: function(response) {
                        console.log(response);
                        if (response.status == "success") {
                            $.post('../localapi.php', {
                                create_distributor_session: 1,
                                distributor_login_resp: JSON.stringify(response.data) //response.data
                            }, function(resp) {
                                var customObject = {};
                                customObject.id = response.data.id;
                                customObject.username = response.data.username;
                                customObject.email = response.data.email;
                                customObject.name = response.data.name;
                                customObject.user_type = response.data.user_type;
                                customObject.pan_image = response.data.pan_image;
                                customObject.gst_image = response.data.gst_image;
                                if (response.data.photo) {
                                    customObject.photo = response.data.photo;
                                }
                                var jsonString = JSON.stringify(customObject);
                                setCookie(jsonString);
                                hideLoader();
                            });
                        } else {
                            var error = response.data;
                            showSwal('error', 'Login Failed', error);
                            hideLoader();
                        }
                    }, //success function
                    error: function(response) {
                        error_html = '';
                        var error_object = JSON.parse(response.responseText);
                        var message = error_object.message;
                        var errors = error_object.errors;
                        $.each(errors, function(key, value) {
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
        $.post('../localapi.php', {
            destroy_session: 1
        }, function(resp) {
            document.cookie = 'UserCookie=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
            //window.location.href = 'login';
        });
    }

    hideLoader();
</script>