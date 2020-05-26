<?php
include_once 'header.php';
$plot_booking_id = '';
if (isset($_REQUEST['booking_id'])) {
    $plot_booking_id = $_REQUEST['booking_id'];
}
?>
<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3 custom_overflow">
                        <h4 class="card-title mb-4">View Payment Details</h4>
                        <div class="overflowAuto">
                        <table class="table table-bordered custom_action view_payment_detail " id="order-listing">
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="plot_booking_id" value="<?php echo $plot_booking_id;?>"/>
    <!-- content-wrapper ends -->
    <?php include_once 'footer.php'; ?>
    <script src="assets/javascript/view_booking_plot.js"></script>