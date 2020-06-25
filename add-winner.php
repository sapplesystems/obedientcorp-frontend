<?php
include_once 'header.php';
$wid = '';
if (isset($_REQUEST['wid'])) {
    $wid = $_REQUEST['wid'];
}
?>
<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-4">Add Winner</h4>
                        <div id="errors_div"></div>
                        <form class="forms-sample" id="winner-form" name="winner-form" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Winner Name</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control required" id="winner_name" name="winner_name" placeholder="Name">
                                </div>
                                <label class="col-sm-2 col-form-label">Winner Photo</label>
                                <div class="input-group col-sm-4">
                                    <input type="file" name="photo" class="file-upload-default required" id="photo">
                                    <input type="text" class="form-control file-upload-info " disabled placeholder="Choose File">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                                    </span>
                                    <img class="mBox" src="" style="display:none;width:100px;" id="photo_id" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Plot No.</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" placeholder="Plot No" id="plot_no" name="plot_no">
                                </div>
                                <label class="col-sm-2 col-form-label">Plot Area</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" placeholder="Plot Area" id="plot_area" name="plot_area" onkeypress="return isNumberKey(event);">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Plot Unit.</label>
                                <div class="col-sm-4">
                                    <select class="form-control" id="plot_unit" name="plot_unit">
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2"></label>
                                <div class="col-sm-10 text-right">
								<a href="winners-list" class="btn btn-gradient-danger">Back</a>
								<input type="hidden" id="winner_id" value="<?php echo $wid; ?>">
                                    <button type="submit" class="btn btn-gradient-success ml-2" id="winner_form">Submit</button>
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
    <script src="assets/javascript/winner.js"></script>