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
<script src="assets/vendors/js/vendor.bundle.base.js "></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="assets/vendors/datatables.net/jquery.dataTables.js"></script>
<script src="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<!-- Plugin js for this page -->
<script src="assets/vendors/chart.js/Chart.min.js "></script>
<script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js "></script>
<script src="assets/vendors/sweetalert/sweetalert.min.js "></script>
<script src="assets/vendors/jquery.avgrund/jquery.avgrund.min.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="assets/js/off-canvas.js "></script>
<script src="assets/js/hoverable-collapse.js "></script>
<script src="assets/js/misc.js "></script>
<script src="assets/js/settings.js "></script>
<script src="assets/js/todolist.js "></script>
<!-- endinject -->
<script src="assets/js/file-upload.js"></script>
<!-- Custom js for this page -->
<script src="assets/js/alerts.js "></script>
<script src="assets/js/avgrund.js "></script>
<script src="assets/js/dashboard.js "></script>
<!-- End custom js for this page -->
<!-- Custom js for this page -->

<script src="assets/js/data-table.js"></script>
<script src="assets/vendors/jquery-validation/jquery.validate.min.js"></script>
<script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="assets/vendors/inputmask/jquery.inputmask.bundle.js"></script>
<script type="text/javascript">
    var base_url = "<?php echo $base_url; ?>";
    var media_url = "<?php echo $media_url; ?>";
    var user_id = 0;
    var user_left_node_id = 0;
    var user_right_node_id = 0;
    var user_email = '';
    var UserCookieData;
    var photo_src = 'assets/images/default-img.png';

    var month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];

    checkCookie();

    function checkCookie() {
        var UserCookie = getCookie("UserCookie");
        if (UserCookie == "") {
            //console.log("cookie not set please login first");
            window.location.href = "login.php"
        } else {
            UserCookieData = JSON.parse(UserCookie);
            if (UserCookieData) {
                //$("#user_login").html(UserCookieData.name);
            }
        }
        //console.log(UserCookieData);
        if (UserCookieData.id != "" && UserCookieData.email != "") {
            user_id = UserCookieData.id;
            user_left_node_id = UserCookieData.left_node_id;
            user_right_node_id = UserCookieData.right_node_id;
            user_email = UserCookieData.email;
            if (UserCookieData.photo) {
                photo_src = media_url + 'profile_photo/' + UserCookieData.photo;
            }
            //$('#user_photo').attr('src', photo_src);

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

    function logout() {
        $.post('localapi.php', {
            destroy_session: 1
        }, function (resp) {
            document.cookie = 'UserCookie=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
            window.location.href = 'login.php';
        });
    }

    function showLoader() {
        $('#loader_bg').css('display', 'block');
    }

    function hideLoader() {
        $('#loader_bg').css('display', 'none');
    }
    
    hideLoader();
</script>
</body>

</html>