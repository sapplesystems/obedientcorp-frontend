<?php
include_once 'header.php';
$customer_id = '';
$agent_id = '';
$status = '';

if (isset($_REQUEST['customer_id']) && isset($_REQUEST['agent_id']) && isset($_REQUEST['f'])) {
    $customer_id = $_REQUEST['customer_id'];
    $agent_id = $_REQUEST['agent_id'];
    $status = $_REQUEST['f'];
}
?>
<style>
    .overflowAuto_d {
        overflow: auto;
        width: 100%;
    }

    .add-customer_heading {
        width: 100%;
        background-color: #b66dff;
        padding: 10px 10px;
        margin-bottom: 0px;
    }

    .border-div {
        border: 1px solid #555555;
        padding: 15px;
        margin-bottom: 20px;
    }

    .customer-details-icon {
        font-size: 40px;
        vertical-align: middle;
    }
</style>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper ">
        <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-2"><i class="mdi mdi-account customer-details-icon"></i> Customer Details</h4>
                        <form class="forms-sample customer-booking-form" id="customer_add_form_submit" name="customer_add_form_submit" method="post" enctype="multipart/form-data">
                            <h5 class="add-customer_heading">Personal Details</h5>
                            <div class="border-div">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Select Agent :</label>
                                    <div class="col-sm-4">
                                        <select class="form-control required" id="agent_id" name="agent_id" onchange="getCustomersList(this.value)"></select>
                                    </div>
                                    <?php if (!empty($customer_id)) { ?>
                                        <label class="col-sm-2 col-form-label">Select Customer :</label>
                                        <div class="col-sm-4">
                                            <select class="form-control " id="customer-list-select" name="customer_list_select"></select>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Customer Name :</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control required" id="customername" name="customername" value="">
                                    </div>
                                    <label class="col-sm-2 col-form-label">Father/Husband/Wife :</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control required" id="fatherhusbandwife" name="fatherhusbandwife" placeholder="Enter Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Date Of Birth :</label>
                                    <div class="col-sm-4">
                                        <div class="input-group date datepicker">
                                            <input type="text required" class="form-control required" id="dateofbirth" name="dateofbirth" placeholder="Enter Date Of Birth" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd-mm-yyyy" readonly>
                                            <span class="input-group-addon input-group-append border-left">
                                                <span class="mdi mdi-calendar input-group-text bg-dark"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <label class="col-sm-2 col-form-label">Age :</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control required" id="age" name="age" placeholder="Enter Age">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Sex :</label>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="form-check d-inline-block">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input disable-elm required" name="customer_sex" id="customer_male" value="Male"> Male <i class="input-helper"></i></label>
                                            </div>
                                            <div class="form-check d-inline-block ml-3 mr-3">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input disable-elm required" name="customer_sex" id="customer_female" value="Female"> Female <i class="input-helper"></i></label>
                                            </div>
                                        </div>
                                    </div>
                                    <label class="col-sm-2 col-form-label">Nationality :</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control required" id="nationality" name="nationality" placeholder="Enter Nationality">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Mobile :</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control required" id="mobile" name="mobile" placeholder="Enter Branch Mobile Number" data-inputmask-alias="9999999999" im-insert="true">
                                    </div>
                                    <label class="col-sm-2 col-form-label">Email :</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control required" id="email" name="email" placeholder="Enter Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Address :</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control required" id="customer_address" name="customer_address" placeholder="Enter Addess">
                                    </div>
                                    <label class="col-sm-2 col-form-label">Photo :</label>
                                    <div class="col-sm-4">
                                        <input type="file" name="photo" class="file-upload-default" id="photo">
                                        <div class="input-group">
                                            <input type="text" class="form-control file-upload-info" disabled placeholder="Enter Photo">
                                            <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-gradient-primary btn-sm" type="button">Upload</button>
                                            </span>
                                            <img src="" style="display:none;width:100px;" id="upload_photo" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--personal details end-->
                            <h5 class="add-customer_heading nominee">Nomination</h5>
                            <div class="border-div nominee">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nominee's Name :</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control required" id="nomineesname" name="nomineesname" placeholder="Enter Nominee Name">
                                    </div>
                                    <label class="col-sm-2 col-form-label">Age :</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control required" id="ageN" name="ageN" placeholder="Enter Nominee Age">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Date of birth :</label>
                                    <div class="col-sm-4">
                                        <div class="input-group date datepicker">
                                            <input type="text" class="form-control required" id="date_of_birth_nominee" name="date_of_birth_nominee" placeholder="Enter Age" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd-mm-yyyy" readonly>
                                            <span class="input-group-addon input-group-append border-left">
                                                <span class="mdi mdi-calendar input-group-text bg-dark"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <label class="col-sm-2 col-form-label">Relationship With Customer :</label>
                                    <div class="col-sm-4">
                                        <select id="relationship" name="relationship" class="form-control required">
                                            <option value="">Select Relation</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Sex :</label>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="form-check d-inline-block">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input disable-elm required" name="nominee_sex" id="nominee_male" value="Male"> Male <i class="input-helper"></i></label>
                                            </div>
                                            <div class="form-check d-inline-block ml-3 mr-3">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input disable-elm required" name="nominee_sex" id="nominee_female" value="Female"> Female <i class="input-helper"></i></label>
                                            </div>
                                        </div>
                                    </div>
                                    <label class="col-sm-2 col-form-label">Address :</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control required" id="addressnominee" name="addressnominee" placeholder="Enter Addess">
                                    </div>
                                </div>
                            </div>
                            <!--nominee details end -->

                            <!--plan details -->
                            <h5 class="add-customer_heading plan_details">Plan Details</h5>
                            <div class="border-div plan_details">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Project Name :</label>
                                    <div class="col-sm-4">
                                        <select class="form-control required" id="project_name" name="project_name"></select>
                                    </div>
                                    <label class="col-sm-2 col-form-label sub_project_div" style="display:none;">Sub Project Name :</label>
                                    <div class="col-sm-4 sub_project_div" style="display:none;">
                                        <select class="form-control required" id="sub_projects" name="sub_projects "></select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label plot_name_div" style="display:none;">Plot Name :</label>
                                    <div class="col-sm-4 plot_name_div" style="display:none;">
                                        <select class="form-control required" id="plot_name" name="plot_name"></select>
                                    </div>
                                    <label class="col-sm-2 col-form-label">Reference :</label>
                                    <div class="col-sm-4">
                                        <input class="form-control required" type="text" id="reference" name="reference" placeholder="Enter reference">
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Registration Number :</label>
                                    <div class="col-sm-4">
                                        <input class="form-control required" type="text" id="registration_num" name="registration_num" placeholder="Enter registration number" />
                                    </div>
                                    <label class="col-sm-2 col-form-label">Plot Area :</label>
                                    <div class="col-sm-4">
                                        <input class="form-control required" type="text" id="plot_area" name="plot_area" placeholder="Enter plot area">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Unit Rate :</label>
                                    <div class="col-sm-4">
                                        <input class="form-control required" type="text" id="unit_rate" name="unit_rate" placeholder="Enter unit rate" onkeypress="return isNumberKey(event);">
                                    </div>
                                    <label class="col-sm-2 col-form-label">Discount Rate :</label>
                                    <div class="col-sm-4">
                                        <input class="form-control required" type="text" id="discount_rate" name="discount_rate" placeholder="Enter discount rate" onkeypress="return isNumberKey(event);">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Installment :</label>
                                    <div class="col-sm-4">
                                        <select class="form-control required" id="installment" name="installment">
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
                                    <label class="col-sm-2 col-form-label">Received Booking Amount :</label>
                                    <div class="col-sm-4">
                                        <input class="form-control required" type="text" id="received_booking_amount" name="received_booking_amount" placeholder="Enter received booking amount" onkeypress="return isNumberKey(event);">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Total Amount :</label>
                                    <div class="col-sm-4">
                                        <input class="form-control required" type="text" id="total_amount" name="total_amount" placeholder="Enter total amount" onkeypress="return isNumberKey(event);">
                                    </div>
                                </div>
                            </div>
                            <!--end plain details-->
                            <h5 class="add-customer_heading payment_details">Payment Details</h5>
                            <div class="border-div payment_details">
                                <!--payment-details-->
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Payment Mode :</label>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="form-check d-inline-block">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input payment_mode required" id="payment_cheque" name="payment_mode" value="Cheque"> Cheque/UTR <i class="input-helper"></i></label>
                                            </div>
                                            <div class="form-check d-inline-block ml-3 mr-3">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input payment_mode required" id="payment_cash" name="payment_mode" value="Cash"> Cash <i class="input-helper"></i></label>
                                            </div>
                                            <div class="form-check d-inline-block ">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input payment_mode required" id="payment_online" name="payment_mode" value="Online">Online <i class="input-helper"></i></label>
                                            </div>
                                        </div>
                                    </div>
                                    <label class="col-sm-2 col-form-label branch" style="display:none;">Branch : </label>
                                    <div class="col-sm-4 branch" style="display:none;">
                                        <input type="text" class="form-control required" id="branch" name="branch" placeholder="Enter Branch">
                                    </div>
                                </div>
                                <div id="payment_details">

                                </div>
                            </div>
                            <!--end payment details-->
                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <input type="hidden" id="customer_id" value="<?php echo $customer_id; ?>" />
                                    <input type="hidden" id="agent-id" value="<?php echo $agent_id; ?>"/>
                                    <input type="hidden" id="status" value="<?php echo $status; ?>"/>
                                    <input type="submit" class="btn btn-info btn-sm" id="customer_add_submit_button" name="customer_add_submit_button" value="Submit" />&nbsp;
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--class card-->
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <?php include_once 'footer.php'; ?>
    <script src="assets/javascript/add_customer.js"></script>