<?php
include_once 'header.php';
$payment_id = 0;
$id = 0;
if (isset($_REQUEST['pid']) && isset($_REQUEST['uid'])) {
    $payment_id = $_REQUEST['pid'];
    $id = $_REQUEST['uid'];
}
?>
<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="card-title mb-4">Approval Details</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 customTabs">

                                <table class="table table-striped payment_request_details" id="admin-payment-detail"></table>
                                <div class="row mt-5">
                                    <div class="col-md-6">
                                        <div class="form-group row mb-0">
                                            <label class="col-form-label col-sm-4 text-right">Payment:</label>
                                            <div class="col-sm-8">
                                                <label class="col-form-label card-description mb-0" id="payment_rs"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row mb-0">
                                            <label class="col-form-label col-sm-4 text-right">Payment Mode:</label>
                                            <div class="col-sm-8">
                                                <label class="col-form-label card-description mb-0" id="payment_mode"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row mb-0">
                                            <label class="col-form-label col-sm-4 text-right cheque-number">Cheque Number:</label>
                                            <div class="col-sm-8">
                                                <label class="col-form-label card-description mb-0" id="cheque_number"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 bank-name">
                                        <div class="form-group row mb-0 ">
                                            <label class="col-form-label col-sm-4 text-right ">Bank Name:</label>
                                            <div class="col-sm-8">
                                                <label class="col-form-label card-description mb-0" id="bank_name"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row mb-0">
                                            <label class="col-form-label col-sm-4 text-right">Uploaded Image:</label>
                                            <div class="col-sm-8 signature_img row lightGallery lightgallery-without-thumb">
                                                <a href="#" class="image-tile" id="a_photo">
                                                    <img src="" class="upload_img" id="photo" style="display: none;" />
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row mb-0">
                                            <label class="col-form-label col-sm-4 text-right">Date Of Payment:</label>
                                            <div class="col-sm-8">
                                                <label class="col-form-label card-description mb-0" id="date_of_payment"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row mb-0">
                                            <label class="col-form-label col-sm-4 text-right">Status:</label>
                                            <div class="col-sm-8">
                                                <label class="col-form-label card-description mb-0" id="status"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row mb-0">
                                            <label class="col-form-label col-sm-4 text-right">Associate Comment:</label>
                                            <div class="col-sm-8">
                                                <label class="col-form-label card-description mb-0" id="comment"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row mb-0" id="admincomment"></div>
                                    </div>
                                </div>
                                <?php if (isset($_REQUEST['flag']) && $_REQUEST['flag'] == 'rs') { ?>
                                    <div class="row mt-3" id="action_div" style="display: none;">
                                        <div class="col-md-12 text-right">
										<a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="btn btn-gradient-danger">Back</a>
										<input type="button" class="btn btn-gradient-warning ml-2" value="Reject" onclick="paymentReject(<?php echo $payment_id; ?>,<?php echo $id; ?>);" />
                                            <input type="button" class="btn btn-gradient-success ml-2" value="Approve" onclick="paymentApprove(<?php echo $payment_id; ?>,<?php echo $id; ?>);" />
                                        </div>
                                    </div>
                                <?php } else if (isset($_REQUEST['flag']) && $_REQUEST['flag'] == 'f') { ?>
                                    <div class="row mt-3" id="action_div" style="display: none;">
                                        <div class="col-md-12 text-right">
										<a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="btn btn-gradient-danger">Back</a>
										<input type="button" class="btn btn-gradient-danger ml-2" value="Reject" onclick="rejectRequest(<?php echo $payment_id; ?>,<?php echo $id; ?>);" />
                                            <input type="button" class="btn btn-gradient-success ml-2" value="Approve" onclick="approveRequest(<?php echo $payment_id; ?>,<?php echo $id; ?>);" />
                                        </div>
                                    </div>
                                <?php } else { ?>
                                    <div class="row mt-3">
                                        <div class="col-md-12 text-right">
                                            <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="btn btn-gradient-danger">Back</a>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- content-wrapper ends -->
    <?php include_once 'footer.php'; ?>
    <script type="text/javascript">
        var payment_master_id = "<?php echo $payment_id; ?>";
        var agent_id = "<?php echo $id; ?>";
        payment_detail_screen = 1;
    </script>
    <script src="assets/javascript/admin_payment_detail.js"></script>
    <?php if (isset($_REQUEST['flag']) && $_REQUEST['flag'] == 'rs') { ?>
        <script src="assets/javascript/admin_payment_approved.js"></script>
    <?php } else if (isset($_REQUEST['flag']) && $_REQUEST['flag'] == 'f') { ?>
        <script src="assets/javascript/add_money_to_wallet.js"></script>
    <?php } ?>