<?php
include_once 'header.php';
$associate_id = '';
if (isset($_REQUEST['associate_id'])) {
    $associate_id = $_REQUEST['associate_id'];
}
?>
<style>
    .col-form-label{font-size:14px;}
    .bb-1{border-bottom: 1px solid #322f2f;padding: 0 0 0.5rem 0;}
</style>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper ">
        <div class="row">
            <div class="col-12">
                <h3 class="mb-4">Kyc Status: <span id="kyc-status"></span></h3>
            </div>
        </div>
        <div class="row grid-margin">
            <div class="col-12">
                <div class="card mb-3">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-4">Update Kyc Status</h4>
                        <h5 class="mb-4 bb-1">Bank Details</h5>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Payee Name:</label>
                            <div class="col-sm-4 col-form-label text-secondary">
                                <span id="payee-name"></span>
                            </div>
                            <label class="col-sm-2 col-form-label">Bank Name:</label>
                            <div class="input-group col-sm-4 col-form-label text-secondary">
                                <span id="bank-name"></span>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Account Number:</label>
                            <div class="col-sm-4 col-form-label text-secondary">
                                <span id="ac-number"></span>
                            </div>
                            <label class="col-sm-2 col-form-label">Branch:</label>
                            <div class="input-group col-sm-4 col-form-label text-secondary">
                                <span id="branch"></span>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">IFSC Code:</label>
                            <div class="col-sm-4 col-form-label text-secondary">
                                <span id="ifsc-code"></span>
                            </div>
                            <label class="col-sm-2 col-form-label">Cancel Cheque/Bank Copy:</label>
                            <div class="input-group col-sm-4 col-form-label">
                                <div class="signature_img row lightGallery lightgallery-without-thumb" id="cancel_cheque">
                                    <a href="#" class="image-tile mb-0" id="bnk-copy">
                                        <img src="" style="width:100px;" id="bank_copy" />
                                    </a>
                                </div>
                                <div class="pdf_content" id="bank_copy_pdf"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-body p-3">
                        <h5 class="mb-4 bb-1">Aadhaar Number: <span id="aadhaar_number" class="text-primary"></span></h5>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Aadhaar Image 1:</label>
                            <div class="col-sm-4">
                                <div class="signature_img row lightGallery lightgallery-without-thumb" id="status-adhar1">
                                    <a href="#" class="image-tile" id="aadhar_upload1">
                                        <img src="" style="width:100px;" id="aadhar_image1" />
                                    </a>
                                </div>
                                <div class="pdf_content" id="aadhar_image1_pdf"></div>
                            </div>
                            <label class="col-sm-2 col-form-label">Aadhaar Image 2:</label>
                            <div class="input-group col-sm-4">
                                <div class="signature_img row lightGallery lightgallery-without-thumb" id="status-adhar2">
                                    <a href="#" class="image-tile" id="aadhar_upload2">
                                        <img src="" style="width:100px;" id="aadhar_image2" />
                                    </a>
                                </div>
                                <div class="pdf_content" id="aadhar_image2_pdf"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-body p-3">
                        <h5 class="mb-4 bb-1">Pan Card Number: <span id="pan_number" name="pan_number" class="text-primary"></span></h5>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Pan Card Image 1:</label>
                            <div class="col-sm-4">
                                <div class="signature_img row lightGallery lightgallery-without-thumb" id="status-pan">
                                    <a href="#" class="image-tile" id="pancard_upload1">
                                        <img src="" style="width:100px;" id="pancard_image1" />
                                    </a>
                                </div>
                                <div class="pdf_content" id="pancard_image1_pdf"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-body p-3">
                        <h5 class="mb-4 bb-1">Passport Number: <span id="passport_number" name="passport_number" class="text-primary"></span></h5>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Passport Image 1:</label>
                            <div class="col-sm-4">
                                <div class="signature_img row lightGallery lightgallery-without-thumb" id="status-pass1">
                                    <a href="#" class="image-tile" id="passport_upload1">
                                        <img src="" style="width:100px;" id="passport_image1" />
                                    </a>
                                </div>
                                <div class="pdf_content" id="passport_image1_pdf"></div>
                            </div>
                            <label class="col-sm-2 col-form-label">Passport Image 2:</label>
                            <div class="input-group col-sm-4">
                                <div class="signature_img row lightGallery lightgallery-without-thumb" id="status-pass2">
                                    <a href="#" class="image-tile" id="passport_upload2">
                                        <img src="" style="width:100px;" id="passport_image2" />
                                    </a>
                                </div>
                                <div class="pdf_content" id="passport_image2_pdf"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-body p-3">
                        <h5 class="mb-4 bb-1">Driving Licence Number: <span id="dl_number" name="dl_number" class="text-primary"></span></h5>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Driving Licence Image 1:</label>
                            <div class="col-sm-4">
                                <div class="signature_img row lightGallery lightgallery-without-thumb" id="status-dl1">
                                    <a href="#" class="image-tile" id="dl_upload1">
                                        <img src="" style="width:100px;" id="dl_image1" />
                                    </a>
                                </div>
                                <div class="pdf_content" id="dl_image1_pdf"></div>
                            </div>
                            <label class="col-sm-2 col-form-label">Driving Licence Image 2:</label>
                            <div class="input-group col-sm-4">
                                <div class="signature_img row lightGallery lightgallery-without-thumb" id="status-dl2">
                                    <a href="#" class="image-tile" id="dl_upload2">
                                        <img src="" style="width:100px;" id="dl_image2" />
                                    </a>
                                </div>
                                <div class="pdf_content" id="dl_image2_pdf"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-body p-3">
                        <h5 class="mb-4 bb-1">Voter Id: <span id="voter_id" name="voter_id" class="text-primary"></span></h5>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Voter Id Image 1:</label>
                            <div class="col-sm-4">
                                <div class="signature_img row lightGallery lightgallery-without-thumb" id="status-voter1">
                                    <a href="#" class="image-tile" id="voter_upload1">
                                        <img src="" style="width:100px;" id="voter_image1" />
                                    </a>
                                </div>
                                <div class="pdf_content" id="voter_image1_pdf"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <label class="col-sm-4"></label>
                    <div class="col-sm-8 text-right">
					<a href="associate-list" class="btn btn-gradient-danger">Back</a>
					<input type="hidden" id="associate_id" value="<?php echo $associate_id; ?>">
                        <button type="button" class="btn btn-gradient-warning ml-2" id="reject">Reject</button>
                        <button type="button" class="btn btn-gradient-success ml-2" id="approve">Approve</button>
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