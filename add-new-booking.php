<?php
include_once 'header.php';
$customer_id = 0;
if (!empty($_REQUEST['customer_id']) && !empty($_REQUEST['agent'])) {
    $customer_id = $_REQUEST['customer_id'];
    $agent_id = $_REQUEST['agent'];
} else {
    echo '<script type="text/javascript">window.location.href="manage-customer.php";</script>';
}
?>
<style>
    .overflowAuto_d {
        overflow: auto;
        width: 100%;
    }
</style>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper ">
        <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-4">Add New Bookings</h4>
                        <form class="forms-sample" id="plotbooking_form" name="plotbooking_form" method="POST" action="">
                            <h5>Plan Details</h5>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Customers :</label>
                                <div class="col-sm-4">
                                    <input type="hidden" name="customer_id" id="customer_id" value="<?php echo $customer_id; ?>" />
                                    <input type="hidden" name="created_for" id="created_for" value="<?php echo $agent_id; ?>" />
                                    <span id="customer_name"></span>
                                </div>
                                <label class="col-sm-2 col-form-label">Project Name :</label>
                                <div class="col-sm-4">
                                    <select class="form-control" id="project_name" name="project_name"></select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label sub_project_div" style="display:none;">Sub Project Name :</label>
                                <div class="col-sm-4 sub_project_div" style="display:none;">
                                    <select class="form-control" id="sub_projects" name="sub_projects "></select>
                                </div>
                                <label class="col-sm-2 col-form-label plot_name_div" style="display:none;">Plot Name :</label>
                                <div class="col-sm-4 plot_name_div" style="display:none;">
                                    <select class="form-control" id="plot_name" name="plot_name"></select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Reference :</label>
                                <div class="col-sm-4">
                                    <input class="form-control" type="text" id="reference" name="reference" placeholder="Enter reference">
                                </div>
                                <label class="col-sm-2 col-form-label">Date Of Payment :</label>
                                <div class="col-sm-4 date datepicker">
                                    <input class="form-control" type="text" id="date_of_payment" name="date_of_payment" placeholder="Enter date of payment" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd-mm-yyyy">
                                    <span class="input-group-addon input-group-append border-left">
                                        <span class="mdi mdi-calendar input-group-text bg-dark"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Registration Number :</label>
                                <div class="col-sm-4">
                                    <input class="form-control" type="text" id="registration_num" name="registration_num" placeholder="Enter registration number" />
                                </div>
                                <label class="col-sm-2 col-form-label">Plot Area :</label>
                                <div class="col-sm-4">
                                    <input class="form-control" type="text" id="plot_area" name="plot_area" placeholder="Enter plot area">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Unit Rate :</label>
                                <div class="col-sm-4">
                                    <input class="form-control" type="text" id="unit_rate" name="unit_rate" placeholder="Enter unit rate" onkeypress="return isNumberKey(event);">
                                </div>
                                <label class="col-sm-2 col-form-label">Discount Rate :</label>
                                <div class="col-sm-4">
                                    <input class="form-control" type="text" id="discount_rate" name="discount_rate" placeholder="Enter discount rate" onkeypress="return isNumberKey(event);">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Total Amount :</label>
                                <div class="col-sm-4">
                                    <input class="form-control" type="text" id="total_amount" name="total_amount" placeholder="Enter total amount" onkeypress="return isNumberKey(event);">
                                </div>
                                <label class="col-sm-2 col-form-label">Received Booking Amount :</label>
                                <div class="col-sm-4">
                                    <input class="form-control" type="text" id="received_booking_amount" name="received_booking_amount" placeholder="Enter received booking amount" onkeypress="return isNumberKey(event);">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Installment :</label>
                                <div class="col-sm-4">
                                    <select class="form-control" id="installment" name="installment">
                                        <option value="">Please select</option>
                                        <option value="1">SINGLE PAYMENT</option>
                                        <option value="12">EMI-1 YEAR</option>
                                        <option value="24">EMI-2 YEAR</option>
                                        <option value="36">EMI-3 YEAR</option>
                                        <option value="60">EMI-5 YEAR</option>
                                        <option value="84">EMI-7 YEAR</option>
                                        <option value="120">EMI-10 YEAR</option>
                                    </select>
                                </div>
                            </div>
                            <h5>Payment Details</h5>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Payment Mode :</label>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-check d-inline-block">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input payment_mode" id="payment_cheque" name="payment_mode" value="Cheque"> Cheque/UTR <i class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check d-inline-block ">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input payment_mode" id="payment_cash" name="payment_mode" value="Cash"> Cash <i class="input-helper"></i></label>
                                        </div>
                                        <div class="form-check d-inline-block ">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input payment_mode" id="payment_online" name="payment_mode" value="Online">Online Transaction <i class="input-helper"></i></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row" id="payment_number_div">
                                <label class="col-sm-2 col-form-label">Cheque/UTR No :</label>
                                <div class="col-sm-4 payment_number_div">
                                    <input class="form-control" type="text" id="payment_number" name="payment_number" placeholder="Enter cheque number.">
                                </div>
                                <label class="col-sm-2 col-form-label">Account Holder Name :</label>
                                <div class="col-sm-4">
                                    <input class="form-control" type="text" id="account_holder_name" name="account_holder_name" placeholder="Enter account holder name ">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Dated :</label>
                                <div class="col-sm-4 date datepicker">
                                    <input class="form-control" type="text" id="dated" name="dated" placeholder="Enter date" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd-mm-yyyy">
                                    <span class="input-group-addon input-group-append border-left">
                                        <span class="mdi mdi-calendar input-group-text bg-dark"></span>
                                    </span>
                                </div>
                                <label class="col-sm-2 col-form-label bank_name">Bank Name :</label>
                                <div class="col-sm-4 bank_name">
                                    <input class="form-control" type="text" id="bank_name" name="bank_name" placeholder="Enter bank name">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <input type="hidden" id="plotbooking_id" value="" />
                                    <input class="btn btn-success btn-sm" type="submit" id="plotbooking_form_submit" name="plotbooking_form_submit" value="submit" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <?php include_once 'footer.php'; ?>
    <script type="text/javascript" src="assets/javascript/add_new_booking.js"></script>