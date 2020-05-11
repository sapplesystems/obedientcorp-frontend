<?php
include_once 'header.php';
if ($user_type != 'ADMIN') {
    echo '<script type="text/javascript">window.location.href="dashboard";</script>';
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
                        <h4 class="card-title mb-2"><i class="mdi mdi-account customer-details-icon"></i>User Business</h4>
                        <form class="forms-sample customer-booking-form" id="user_business_form_submit" name="user_business_form_submit" method="post" enctype="multipart/form-data">
                            <h5 class="add-customer_heading">User Business Update</h5>
                            <div class="border-div">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Select Agent :<span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <select class="form-control required" id="agent_id" name="agent_id" ></select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Total Left Business :</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="total_left_business" name="total_left_business" value="0">
                                    </div>
                                    <label class="col-sm-2 col-form-label">Total Right Business:</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="total_right_business" name="total_right_business" value="0">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Remaining Left Business:</label>
                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <input type="text " class="form-control" id="remaining_left_business" name="remaining_left_business" value="0">

                                        </div>
                                    </div>
                                    <label class="col-sm-2 col-form-label">Remaining Right Business:</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="remaining_right_business" name="remaining_right_business" value="0">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Matching Amount :</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control " id="matching_amount" name="matching_amount" value="0">
                                    </div>
                                    <label class="col-sm-2 col-form-label">Total Earning :</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="total_earning" name="total_earning" value="0">
                                    </div>
                                </div>
                               
                            </div>
                            <!--personal details end-->
                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <input type="submit" class="btn btn-info btn-sm" id="user_business_submit_button" name="user_business_submit_button" value="Submit" />&nbsp;
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
    <script src="assets/javascript/user_business_update.js"></script>