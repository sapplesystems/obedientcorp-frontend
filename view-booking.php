<?php include_once 'header.php'; 
$customer_id = '';
$agent_id = '';
if (isset($_REQUEST['customer_id']) && isset($_REQUEST['agent_id']) ) {
   $customer_id = $_REQUEST['customer_id'];
   $agent_id = $_REQUEST['agent_id'];
}

?>
<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row">
            <div class="col-12">
                <div class="form-group row">
                </div>
                <div class="card">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-4">View Plot Booking</h4>
                        <h3 class="mb-4">Agent Name:  <span id="agent-name"></span></h3>
                        <div class="overflowAuto">
                            <table class="table table-bordered custom_action" id="order-listing">
                                <thead>
                                    <tr>
                                        <th>Customer Name</th>
                                        <th>Registration Number</th>
                                        <th>Reference</th>
                                        <th>Project Name</th>
                                        <th>Sub Project Name</th>
                                        <th>Plot Number</th>
                                        <th>Total Amount</th>
                                        <th>Booking Amount</th>
                                        <th>Date of Payment</th>
                                    </tr>

                                </thead>
                                <tbody id="plot_booking_list"></tbody>
                            </table>
                            <input type="hidden" id="customer_id" value="<?php echo $customer_id; ?>" />
                            <input type="hidden" id="agent_id" value="<?php echo $agent_id; ?>" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <?php include_once 'footer.php'; ?>
    <script src="assets/javascript/view_booking_plot.js"></script>