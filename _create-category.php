<?php 
include_once 'header.php'; 
$cid = '';
if(isset($_REQUEST['cid'])){
    $cid = $_REQUEST['cid'];
}
?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper ">
        <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-4">Create Category</h4>
                        <form class="forms-sample" id="create_category" name="create_category" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control" placeholder="Title" id="title" name="title">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <div class="input-group">
                                            <input type="file" name="img[]" class="file-upload-default" id="image" name="image">
                                            <input type="text" class="form-control file-upload-info" disabled placeholder="Choose File">
                                            <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                                            </span>
                                            <img src="" style="display:none;width:100px;" id="photo_id" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" rows="7" id="description" name="description"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-gradient-primary mr-2" id="submit_category" value="submitcategory">Submit</button>
                                    <input type="hidden" id="category_id" value="<?php echo $cid; ?>">
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
    <script src="assets/javascript/category.js"></script>