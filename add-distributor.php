<?php
include_once 'header.php';
if ($user_type != 'ADMIN') {
    echo '<script type="text/javascript">window.location.href="dashboard";</script>';
}
$distributor_id = '';
if (isset($_REQUEST['distributor_id'])) {
    $distributor_id = $_REQUEST['distributor_id'];
}
?>
<style>
    .overflowAuto_d {
        overflow: auto;
        width: 100%;
    }

    .add-distributor_heading {
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

    .distributor-details-icon {
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
                        <h4 class="card-title mb-2"><i class="mdi mdi-account distributor-details-icon"></i> Distributor Details</h4>
                        <form class="forms-sample distributor-booking-form" id="distributor_add_form_submit" name="distributor_add_form_submit" method="post" enctype="multipart/form-data">
                            <h5 class="add-distributor_heading">Personal Details</h5>
                            <div class="border-div">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Distributor Name :<span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="text" placeholder="Enter distributor Name" class="form-control required" id="distributorname" name="distributorname" value="" onkeypress="return isAlphabetKey(event);">
                                    </div>
                                    <label class="col-sm-2 col-form-label">Is Headquarter:<span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <div class="form-group mb-0">
                                            <div class="form-check d-inline-block">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input disable-elm required" name="dist_type" id="head_yes" value="1">Yes<i class="input-helper"></i></label>
                                            </div>
                                            <div class="form-check d-inline-block ml-3 mr-3">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input disable-elm required" name="dist_type" id="head_no" value="0"> No <i class="input-helper"></i></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Firm Name :<span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="text" placeholder="Enter Firm Name" class="form-control required" id="firm_name" name="firm_name" value="">
                                    </div>
                                    <label class="col-sm-2 col-form-label">Contact Name :<span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control required" id="contact_name" name="contact_name" placeholder="Enter Contact Name" onkeypress="return isAlphabetKey(event);">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Mobile :<span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control required" id="mobile" name="mobile" placeholder="Enter Mobile Number" onkeypress="return isNumberKey(event);">
                                    </div>
                                    <label class="col-sm-2 col-form-label">Email :<span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <span id="emailid-error" class="error" style="display:none">Enter valid email-id.</span>
                                        <input type="text" class="form-control required" id="email" name="email" placeholder="Enter Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Address :<span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control required" id="distributor_address" name="distributor_address" placeholder="Enter Address">
                                    </div>
                                    <label class="col-sm-2 col-form-label">Pin Code <span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control required" placeholder="Enter PinCode" id="pin_code" name="pin_code" onkeypress="return isNumberKey(event);">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">State <span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <select class="form-control required" id="states" name="states"> </select>
                                    </div>
                                    <label class="col-sm-2 col-form-label">District/City <span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <select class="form-control required " id="city" name="city"></select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Pan Number :<span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control required" id="pan_number" name="pan_number" placeholder="Enter Pan Number">
                                    </div>
                                    <label class="col-sm-2 col-form-label">Pan Image <span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="file" name="pan_image" class="file-upload-default required " id="pan_image">
                                        <div class="input-group">
                                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Pan Image">
                                            <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-gradient-primary btn-sm" type="button">Upload</button>
                                            </span>
                                            <img class="mBox" src="" style="display:none;width:100px;" id="upload_pan" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">GST Number :<span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control required" id="gst_number" name="gst_number" placeholder="Enter GST Number">
                                    </div>
                                    <label class="col-sm-2 col-form-label">GST Image <span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="file" name="gst_image" class="file-upload-default required" id="gst_image">
                                        <div class="input-group">
                                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload GST Image">
                                            <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-gradient-primary btn-sm" type="button">Upload</button>
                                            </span>
                                            <img class="mBox" src="" style="display:none;width:100px;" id="upload_gst" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row passwrd">
                                    <label class="col-sm-2 col-form-label">Password <span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="password" class="form-control required" placeholder="Enter Password" id="password" name="password">
                                    </div>
                                    <label class="col-sm-2 col-form-label">Confirm Password <span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="password" class="form-control required" placeholder="Enter Confirm Password" id="confirm_password" name="confirm_password">
                                    </div>
                                </div>
                                <?php if($distributor_id!=''){?>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Distributor Code :<span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control required" id="dist_code" name="dist_code" placeholder="Enter Code">
                                    </div>
                                    <label class="col-sm-2 col-form-label">Username<span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control required" placeholder="Enter Username" id="username" name="username">
                                    </div>
                                </div>
                                <?php }?>
                            </div>
                            <!--personal details end-->
                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <input type="hidden" id="distributor_id" value="<?php echo $distributor_id; ?>" />
                                    <a class="btn btn-gradient-danger" href="manage-distributor">Back</a>&nbsp;
                                    <input type="submit" class="btn btn-gradient-success" id="distributor_add_submit_button" name="distributor_add_submit_button" value="Submit" />&nbsp;
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
    <script src="<?php echo $home_url; ?>assets/javascript/distributor/add_distributor.js"></script>
