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

                <form class="login100-form validate-form" id="forgot_password_form">
                    <span class="login100-form-title">
                        Forgot Password
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" id="username" name="username" placeholder="Type Your Username">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" id="forgot">
                            Send Request
                        </button>
                    </div>
					
					<div class="text-center mt-3">
                        <span class="txt1">
                            Back to
                        </span>
                        <a class="txt2" href="login">
                            Login
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
        $("#forgot").click(function(e) {
            e.preventDefault();
            $("#forgot_password_form").validate({
                rules: {
                    username: {
                        required: true,
                    },
                    password: {
                        required: true,
                    },
                },
            });
            if ($("#forgot_password_form").valid()) {
                showLoader();
                var url = base_url + 'distributor/forget-password';
                var params = {
                    username: $("#username").val(),

                };
                $.ajax({
                    url: url,
                    type: 'post',
                    data: params,
                    success: function(response) {
                        console.log(response);
                        if (response.status == "success") {
                            document.getElementById('forgot_password_form').reset();
                            showSwal('success', 'Mail Send', response.data);
                            hideLoader();
                          
                            
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
    });
    function showLoader() {
        $('#loader_bg').css('display', 'block');
    }

    function hideLoader() {
        $('#loader_bg').css('display', 'none');
    }

    hideLoader();
</script>