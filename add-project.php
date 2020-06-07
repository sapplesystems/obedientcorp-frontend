<?php
include_once 'header.php';
$pid = '';
if (isset($_REQUEST['pid'])) {
    $pid = $_REQUEST['pid'];
}
?>
<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-4">Add Project</h4>
                        <div id="errors_div"></div>
                        <form class="forms-sample" id="project-form" name="project-form" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Project Name</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control required" id="project_name" name="project_name" placeholder="Project Name">
                                </div>
                                <label class="col-sm-2 col-form-label">Project Image</label>
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
                                <label class="col-sm-2 col-form-label">Project Map</label>
                                <div class="input-group col-sm-4">
                                    <input type="file" name="mapphoto" class="file-upload-default" id="mapphoto">
                                    <input type="text" class="form-control file-upload-info " disabled placeholder="Choose File">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                                    </span>
                                    <p id="mapphoto_id" class="mt-2"></p>
                                </div>
                                <label class="col-sm-2 col-form-label">Unit Price</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control required" placeholder="Unit Price" id="unit_price" name="unit_price">
                                </div>
                            </div>
                            <div class="form-group row" style="display: none;">
                                <label class="col-sm-2 col-form-label">Area</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" placeholder="Area" id="area" name="area">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="7" id="description" name="description"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-gradient-primary mr-2" id="project_form">Submit</button>
                                    <input type="hidden" id="project_id" value="<?php echo $pid; ?>">
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div> <!-- crop photo -->
    <!-- crop photo -->
    <div id="uploadmapModal" class="modal" role="dialog">
        <div class="modal-dialog mt-5">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Upload & Crop Image</h4>
                    <button type="button" class="close text-white close_map_image" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div id="image_demo_map"></div>
                        </div>
                        <div class="col-md-12 text-center mt-3">
                            <button class="btn btn-gradient-primary crop_map_image">Crop & Upload Image</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- crop photo -->
    <!-- content-wrapper ends -->
    <?php include_once 'footer.php'; ?>
    <script src="assets/javascript/project_validation.js"></script>