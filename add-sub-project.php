<?php
include_once 'header.php';

$project_id = '';
$sub_project_id = '';
if (isset($_REQUEST['pid']) && isset($_REQUEST['spid'])) {
    $project_id = $_REQUEST['pid'];
    $sub_project_id = $_REQUEST['spid'];
}
?>
<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-4">Add Sub-project</h4>
                        <div id="errors_div"></div>
                        <form class="forms-sample" id="sub-project-form" name="sub-project-form" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Projects</label>
                                <div class="col-sm-4">
                                    <select class="form-control required" id="projects" name="projects">
                                    </select>
                                </div>
                                <label class="col-sm-2 col-form-label">Sub-project Name</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control required" id="sub_project_name" name="sub_project_name" placeholder="Sub-project Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Sub-project Image</label>
                                <div class="input-group col-sm-4">
                                    <input type="file" name="photo" id="photo" class="file-upload-default">
                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Choose File">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                                    </span>
                                    <img src="" style="display:none;width:100px;" id="photo_id" />
                                </div>
                                <label class="col-sm-2 col-form-label">Unit Price</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control required" id="unit_price"name="unit_price" placeholder="Unit Price">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Sub-project Map</label>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <input type="file" name="mapphoto" id="mapphoto" class="file-upload-default">
                                        <input type="text" class="form-control file-upload-info" disabled placeholder="Choose File">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                                        </span>
                                    </div>
                                    <p id="mapphoto_id" class="mt-2"></p>
                                </div>
                                <label class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-4">
                                    <textarea class="form-control" rows="7" name="description" id="description"></textarea>
                                </div>
                            </div>
                            <div class="form-group row" style="display: none;">
                                <label class="col-sm-2 col-form-label">Area</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" placeholder="Area" id="area" name="area">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-gradient-primary mr-2" id="sub_project_form">Submit</button>
                                    <input type="hidden" id="sub_project_id" value="<?php echo $sub_project_id; ?>" />
                                    <input type="hidden" id="project_id" value="<?php echo $project_id; ?>" />
                                    <a href="project-list" class="btn btn-gradient-danger mr-2">Back</a>
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
            </div>
        </div>
    </div> <!-- crop photo -->
    <!-- crop photo -->
    <div id="uploadmapModal" class="modal" role="dialog">
        <div class="modal-dialog">
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

    <?php include_once 'footer.php'; ?>
    <script src="assets/javascript/sub_project.js"></script>