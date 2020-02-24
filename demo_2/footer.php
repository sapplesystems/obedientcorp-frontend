<!-- partial:partials/_footer.html -->
<footer class="footer ">
    <div class="d-sm-flex justify-content-center justify-content-sm-between ">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block ">Copyright © 2020 Obedient Infra Development Pvt. Ltd. All rights reserved. <a href="https://obedientcorp.com/" target="_blank ">OBEDIENT GROUP</a></span>

    </div>
</footer>
<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="../assets/vendors/js/vendor.bundle.base.js "></script>
<script src="../assets/vendors/chart.js/Chart.min.js "></script>
<script src="../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js "></script>
<script src="../assets/vendors/jquery-validation/jquery.validate.min.js"></script>
<script src="../assets/js/off-canvas.js "></script>
<script src="../assets/js/hoverable-collapse.js "></script>
<script src="../assets/js/misc.js "></script>
<script src="../assets/js/settings.js "></script>
<script src="../assets/js/todolist.js "></script>
<script src="../assets/js/dashboard.js "></script>
<script type="text/javascript">
    var user_id = 0;
    var user_left_node_id = 0;
    var user_right_node_id = 0;
    var user_email = '';
    var UserCookieData;
    checkCookie();

    function checkCookie() {
        var UserCookie = getCookie("UserCookie");
        if (UserCookie == "") {
            console.log("cookie not set please login first");
            window.location.href = "login.php"
        } else {
            UserCookieData = JSON.parse(UserCookie);
            if (UserCookieData) {
                $("#user_login").html(UserCookieData.name);
            }
        }
        console.log(UserCookieData);
        if (UserCookieData.id != "" && UserCookieData.email != "") {
            user_id = UserCookieData.id;
            user_left_node_id = UserCookieData.left_node_id;
            user_right_node_id = UserCookieData.right_node_id;
            user_email = UserCookieData.email;
        }
    }

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
</script>
</body>

</html>