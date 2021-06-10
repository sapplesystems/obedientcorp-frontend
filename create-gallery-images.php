<?php
include_once 'header.php';
$galleryid = '';
if (isset($_REQUEST['gallery_id']) && isset($_REQUEST['title'])) {
    $galleryid = $_REQUEST['gallery_id'];
    $title = $_REQUEST['title'];
}
?>
<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-4">Create Gallery Images</h4>
                        <form class="forms-sample" id="gallery-images-form" name="gallery-images-form" method="post" enctype="multipart/form-data">
                            <h3 class="mb-4">Gallery Title: <span id="gallery-title" name="gallery-title"><?php echo $title; ?></span></h3>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Upload Images</label>
                                <div class="col-sm-4">
                                    <div class="input-images-1" id="product_images"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2"></label>
                                <div class="col-sm-10 text-right">
                                    <a class="btn btn-gradient-danger" href="gallery-list">Back</a>
									<input type="hidden" id="gallery-id" value="<?php echo $galleryid; ?>">
                                    <button type="submit" class="btn btn-gradient-success ml-2" id="gallery_images_submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-4">View Gallery Images</h4>
                        <div class="overflowAuto" id="gallery_images_list_data"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- content-wrapper ends -->
    <?php include_once 'footer.php'; ?>
    <script src="assets/javascript/gallery.js"></script>
    <script src="assets/javascript/image-uploader.min.js"></script>