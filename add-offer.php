<?php
include_once 'header.php';
$oid = '';
if (isset($_REQUEST['oid'])) {
    $oid = $_REQUEST['oid'];
}
?>
<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-4">Add Offer</h4>
                        <div id="errors_div"></div>
                        <form class="forms-sample" id="offer-form" name="offer-form" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Offer Name</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control required" id="offer_name" name="offer_name" placeholder="Offer Name">
                                </div>
                                <label class="col-sm-2 col-form-label">Image</label>
                                <div class="input-group col-sm-4">
                                    <input type="file" name="photo" class="file-upload-default" id="photo">
                                    <input type="text" class="form-control file-upload-info " disabled placeholder="Choose File">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                                    </span>
                                    <img src="" style="display:none;width:100px;" id="photo_id" />
                                </div>
                            </div>
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Offer Amount</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control required" placeholder="Amount" id="amount" name="amount" onkeypress="return isNumberKey(event);">
                                </div>
                                <label class="col-sm-2 col-form-label">Business Amount</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control required" placeholder="Business" id="business" name="business" onkeypress="return isNumberKey(event);">
                                </div>
                            </div>
                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Start Date</label>
                            <div class="col-sm-4">
                                <div class="input-group date datepicker">
                                <input type="text" class="form-control required" id="start-date" name="start-date" placeholder="From" readonly>
                                    <span class="input-group-addon input-group-append border-left">
                                        <span class="mdi mdi-calendar input-group-text bg-dark"></span>
                                    </span>
                                </div>
                                        </div>
                                <label class="col-sm-2 col-form-label">End Date</label>
                                <div class="col-sm-4">
                                <div class="input-group date datepicker">
                                <input type="text" class="form-control required" id="end-date" name="end-date" placeholder="To" readonly>
                                    <span class="input-group-addon input-group-append border-left">
                                        <span class="mdi mdi-calendar input-group-text bg-dark"></span>
                                    </span>
                                </div>
                                    </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-gradient-primary mr-2" id="offer_form">Submit</button>
                                    <input type="hidden" id="offer_id" value="<?php echo $oid; ?>">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- crop photo -->
    <div id="uploadphotoModal" class="modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Upload & Crop Image</h4>
                    <button type="button" class="close text-white close_photo_image" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div id="image_demo"></div>
                        </div>
                        <div class="col-md-12 text-center mt-3">
                            <button class="btn btn-gradient-primary crop_photo_image">Crop & Upload Image</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default close_photo_image" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div> <!-- crop photo -->
    <!-- content-wrapper ends -->
    <?php include_once 'footer.php'; ?>
    <script src="assets/javascript/offer.js"></script>