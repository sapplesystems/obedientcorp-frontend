<?php include_once 'header.php'; 
$customer_id = '';
$agent_id = '';
if (isset($_REQUEST['customer_id']) && isset($_REQUEST['agent_id']) ) {
   $customer_id = $_REQUEST['customer_id'];
   $agent_id = $_REQUEST['agent_id'];
}

?>
<style>
.select2{display: none !important;}
</style>
<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row">
            <div class="col-12">
                <div class="form-group row">
                </div>
                <div class="card">
                    <div class="card-body p-3 custom_overflow">
                        <h4 class="card-title mb-4">View Plot Booking <a class="btn btn-danger btn-sm" href="manage-customer">Back</a></h4>
                        <h3 class="mb-4">Associate Name:  <span id="agent-name"></span></h3>
                        <div class="overflowAuto">
                            <table class="table table-bordered custom_action" id="order-listing">
                                <thead>
                                    <tr>
                                        <th>Customer Name</th>
                                        <th>Project Name</th>
                                        <th>Sub Project Name</th>
                                        <th>Plot Number</th>
                                        <th>Total Amount</th>
                                        <th>Booking Amount</th>
                                        <th>Date of Booking</th>
                                        <th>Overdue</th>
                                        <th>Total Paid</th>
                                        <th>Current Balance Amount</th>
                                        <th>EMI Amount</th>
                                        <th>EMI Tenure</th>
                                        <th>Action</th>
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