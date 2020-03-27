<?php
 include_once 'header.php'; 
 $category_id='';
 $sub_category_id='';
 if (isset($_REQUEST['cid']) && isset($_REQUEST['scid'])) {
    $category_id = $_REQUEST['cid'];
    $sub_category_id = $_REQUEST['scid'];

}

 
 ?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper ">
        <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <form class="forms-sample" id="create-sub-category" name="create-sub-category" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <h4 class="card-title mb-4 col-md-6">Create Sub-Category</h4>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control" id="categories" name="categories"></select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control" placeholder="Title" id="sub_category_title" name="sub_category_title">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <div class="input-group">
                                            <input type="file" name="img[]" class="file-upload-default" id="sub_category_image" name="sub_category_image">
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
                                        <textarea class="form-control" rows="7" id="sub_category_description" name="sub_category_description"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-gradient-primary mr-2" id="submit_sub_category" value="submitsubcategory">Submit</button>
                                    <input type="hidden" id="subcategory_id" value="<?php echo $sub_category_id ?>">
                                    <input type="hidden" id="category_id" value="<?php echo $category_id ?>">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-4">Categories</h4>
                        <div class="overflowAuto">
                            <table class="table table-bordered custom_action" id="order-listing">
                                <thead>
                                    <tr>
                                        <th width="15%">Sr No.</th>
                                        <th width="15%"> Title </th>
                                        <th> Description </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="sub_category_list">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div-->
    </div>
    <!-- content-wrapper ends -->
    <?php include_once 'footer.php'; ?>
    <script src="assets/javascript/subcategory.js"></script>