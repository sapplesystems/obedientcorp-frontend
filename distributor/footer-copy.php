<!-- partial:partials/_footer.html -->
<footer class="main-footer">
    <div class="footer-left">
        &copy; 2020 Obedient Marketing Universal Private Limited. All rights reserved | Design by Obedient Group

    </div>
</footer>
<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
<!-- General JS Scripts -->
  <script src="<?php echo $home_url; ?>assets/js/jquery-3.3.1.min.js"></script>
  <script src="<?php echo $home_url; ?>assets/js/bootstrap.min.js"></script>
  <script src="<?php echo $home_url; ?>assets/js/jquery.nicescroll.min.js"></script>
  <script src="<?php echo $home_url; ?>assets/js/stisla.js"></script>
   <!-- Template JS File -->
  <script src="<?php echo $home_url; ?>assets/js/scripts.js"></script>

  <!-- Template JS File -->

<script type="text/javascript">

    var base_url = "<?php echo $base_url; ?>";
    var media_url = "<?php echo $media_url; ?>";
    var distributor_id = "<?php echo $distributor_id; ?>";
    var distributor_name = "<?php echo $name;?>";
    var distributor_address = "<?php echo $address;?>";
</script>
<script src="<?php echo $home_url; ?>assets/vendors/sweetalert/sweetalert.min.js "></script>
<script src="<?php echo $home_url; ?>assets/js/alerts.js"></script>
<script type="text/javascript" src="<?php echo $home_url; ?>assets/javascript/distributor/js/plugins.js"></script>
<script src="<?php echo $home_url; ?>assets/vendors/jquery-validation/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>
<script src="<?php echo $home_url; ?>assets/javascript/distributor/dist_global.js"></script>
<!-- JS for autocomplete search-->
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="<?php echo $home_url; ?>assets/javascript/distributor/js/flatpickr.js"></script>
<script>
$('body').on('click', 'li', function() {
      $('li.active').removeClass('active');
      $(this).addClass('active');
});
</script>
</body>

</html>