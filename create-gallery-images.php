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
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-gradient-primary mr-2" id="gallery_images_submit">Submit</button>
                                    <input type="hidden" id="gallery-id" value="<?php echo $galleryid; ?>">
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
                        <div class="overflowAuto">
                            <table class="table table-bordered custom_action " id="order-listing">
                                <thead><tr>
                                        <th width="10%">Sr No.</th>
                                        <th width="20%">Gallery Name</th>
                                        <th width="10%">Photo</th>
                                        <th width="10%">Action</th>
                                    </tr></thead>
                                <tbody id="gallery_images_list">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- content-wrapper ends -->
    <?php include_once 'footer.php'; ?>
    <script src="assets/javascript/gallery.js"></script>
    <script src="assets/javascript/image-uploader.min.js"></script>