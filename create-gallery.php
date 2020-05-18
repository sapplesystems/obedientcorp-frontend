<?php
include_once 'header.php';
$gid = '';
if (isset($_REQUEST['gid'])) {
    $gid = $_REQUEST['gid'];
}
?>
<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-4">Create Gallery</h4>
                        <div id="errors_div"></div>
                        <form class="forms-sample" id="gallery-form" name="gallery-form" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control required" id="gallery_name" name="gallery_name" placeholder="Name">
                                </div>
                                <label class="col-sm-2 col-form-label">Photo</label>
                                <div class="input-group col-sm-4">
                                    <input type="file" name="photo" class="file-upload-default required" id="photo">
                                    <input type="text" class="form-control file-upload-info " disabled placeholder="Choose File">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                                    </span>
                                    <img src="" style="display:none;width:100px;" id="photo_id" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-gradient-primary mr-2" id="gallery_form">Submit</button>
                                    <input type="hidden" id="gallery_id" value="<?php echo $gid; ?>">
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
    <script src="assets/javascript/gallery.js"></script>