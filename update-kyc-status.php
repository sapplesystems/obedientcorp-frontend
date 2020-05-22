<?php
include_once 'header.php';
$associate_id = '';
if (isset($_REQUEST['associate_id'])) {
    $associate_id = $_REQUEST['associate_id'];
}
?>
<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-4">Update Kyc Status</h4>
                        <h3 class="mb-4">Kyc Status: <span id="kyc-status"></span></h3>
                        <h5 class="mb-4">Aadhaar Number: <span id="aadhaar_number"></span></h5>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Aadhaar Image 1</label>
                            <div class="col-sm-4">
                                <div class="signature_img row lightGallery lightgallery-without-thumb" id="status-adhar1">
                                    <a href="#" class="image-tile" id="aadhar_upload1">
                                        <img src="" style="width:100px;" id="aadhar_image1" />
                                    </a>
                                </div>
                            </div>
                            <label class="col-sm-2 col-form-label">Aadhaar Image 2</label>
                            <div class="input-group col-sm-4">
                                <div class="signature_img row lightGallery lightgallery-without-thumb" id="status-adhar2">
                                    <a href="#" class="image-tile" id="aadhar_upload2">
                                        <img src="" style="width:100px;" id="aadhar_image2" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <h5 class="mb-4">Pan Card Number: <span id="pan_number" name="pan_number"></span></h3>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Pan Card Image 1</label>
                                <div class="col-sm-4">
                                    <div class="signature_img row lightGallery lightgallery-without-thumb" id="status-pan">
                                        <a href="#" class="image-tile" id="pancard_upload1">
                                            <img src="" style="width:100px;" id="pancard_image1" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <h5 class="mb-4">Passport Number: <span id="passport_number" name="passport_number"></span></h3>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Passport Image 1</label>
                                    <div class="col-sm-4">
                                        <div class="signature_img row lightGallery lightgallery-without-thumb" id="status-pass1">
                                            <a href="#" class="image-tile" id="passport_upload1">
                                                <img src="" style="width:100px;" id="passport_image1" />
                                            </a>
                                        </div>
                                    </div>
                                    <label class="col-sm-2 col-form-label">Passport Image 2</label>
                                    <div class="input-group col-sm-4">
                                        <div class="signature_img row lightGallery lightgallery-without-thumb" id="status-pass2">
                                            <a href="#" class="image-tile" id="passport_upload2">
                                                <img src="" style="width:100px;" id="passport_image2" />
                                            </a>
                                        </div>

                                    </div>
                                </div>
                                <h5 class="mb-4">Driving Licence Number: <span id="dl_number" name="dl_number"></span></h3>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Driving Licence Image 1</label>
                                        <div class="col-sm-4">
                                            <div class="signature_img row lightGallery lightgallery-without-thumb" id="status-dl1">
                                                <a href="#" class="image-tile" id="dl_upload1">
                                                    <img src="" style="width:100px;" id="dl_image1" />
                                                </a>
                                            </div>
                                        </div>
                                        <label class="col-sm-2 col-form-label">Driving Licence Image 2</label>
                                        <div class="input-group col-sm-4">
                                            <div class="signature_img row lightGallery lightgallery-without-thumb" id="status-dl2">
                                                <a href="#" class="image-tile" id="dl_upload2">
                                                    <img src="" style="width:100px;" id="dl_image2" />
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="mb-4">Voter Id: <span id="voter_id" name="voter_id"></span></h3>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Voter Id Image 1</label>
                                            <div class="col-sm-4">
                                                <div class="signature_img row lightGallery lightgallery-without-thumb" id="status-voter1">
                                                    <a href="#" class="image-tile" id="voter_upload1">
                                                        <img src="" style="width:100px;" id="voter_image1" />
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2"></label>
                                            <div class="col-sm-10">
                                                <button type="button" class="btn btn-gradient-danger mr-2" id="reject">Reject</button>
                                                <button type="button" class="btn btn-gradient-primary mr-2" id="approve">Approve</button>
                                                <a href="associate-list" class="btn btn-gradient-info mr-2">Back</a>
                                                <input type="hidden" id="associate_id" value="<?php echo $associate_id; ?>">
                                            </div>
                                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- content-wrapper ends -->
    <?php include_once 'footer.php'; ?>
    <script src="assets/javascript/update-kyc-status.js"></script>