<!-- partial:partials/_footer.html -->
<footer class="footer ">
    <div class="d-sm-flex justify-content-center justify-content-sm-between ">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block ">&copy; 2020 Obedient Marketing Universal Private Limited. All rights reserved | Design by Obedient Group</span>

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
<!--script src="assets/vendors/datatables.net/jquery.dataTables.js"></script>
<script src="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script-->
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<!-- Plugin js for this page -->
<script src="assets/vendors/chart.js/Chart.min.js "></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js "></script>
<script src="assets/vendors/sweetalert/sweetalert.min.js "></script>
<script src="assets/vendors/jquery.avgrund/jquery.avgrund.min.js"></script>
<script src="assets/vendors/lightgallery/js/lightgallery-all.min.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="assets/js/light-gallery.js"></script>
<script src="assets/js/off-canvas.js"></script>
<script src="assets/js/hoverable-collapse.js"></script>
<script src="assets/js/misc.js"></script>
<script src="assets/js/settings.js"></script>
<script src="assets/js/todolist.js"></script>
<!-- endinject -->
<script src="assets/js/file-upload.js"></script>
<!-- Custom js for this page -->
<script src="assets/js/alerts.js"></script>
<script src="assets/js/avgrund.js"></script>
<script src="assets/js/dashboard.js"></script>
<!-- End custom js for this page -->
<!-- Custom js for this page -->

<!--script src="assets/js/data-table.js"></script-->
<script src="assets/vendors/jquery-validation/jquery.validate.min.js"></script>
<script src="assets/vendors/inputmask/jquery.inputmask.bundle.js"></script>
<script src="assets/javascript/croppie.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>

<script type="text/javascript">
    /*var base_url = "<?php //echo $base_url; ?>";
     var media_url = "<?php //echo $media_url; ?>";
     var user_id = 0;
     var user_type = 'AGENT';
     var user_left_node_id = 0;
     var user_right_node_id = 0;
     var user_email = '';
     var UserCookieData;
     var photo_src = 'assets/images/default-img.png';*/

    var base_url = "<?php echo $base_url; ?>";
    var media_url = "<?php echo $media_url; ?>";
    var user_id = "<?php echo $user_id; ?>";
    var username = "<?php echo $username; ?>";
    var user_type = "<?php echo $user_type; ?>";
    var user_left_node_id = "<?php echo $left_node_id; ?>";
    var user_left_node_username = "<?php echo $left_node; ?>";
    var user_right_node_id = "<?php echo $right_node_id; ?>";
    var user_right_node_username = "<?php echo $right_node; ?>";
    var user_email = "<?php echo $user_email; ?>";
    var UserCookieData;
    var photo_src = 'assets/images/default-img.png';
    var user_active_range = "<?php echo $user_active_range; ?>";
    var payment_detail_screen = 0;
</script>

<!--Down the line member drop donw typing search start here-->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.min.js"></script>
<!--Down the line member drop donw typing search end here-->
<script type="text/javascript" src="assets/javascript/global.js" /></script>
<script src="assets/js/mBox.js"></script>
<script>
  $('.mBox').mBox();
</script>
        
<script type="text/javascript">
/*if ("serviceWorker" in navigator) {
    window.addEventListener("load", function() {
      navigator.serviceWorker
        .register("sw.js")
        .then(res => console.log("service worker registered"))
        .catch(err => console.log("service worker not registered", err))
    })
  }*/
</script>
</body>

</html>