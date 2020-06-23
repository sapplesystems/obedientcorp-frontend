<?php
include_once 'header.php';
?>
<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-4">News Update</h4>
                        <form class="forms-sample" id="news-update-form" name="news-update-form" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">News Title</label>
                                <div class="col-sm-4">
                                    <input class="form-control required" type="text" id="news_title" name="news_title" placeholder="Enter News Title">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-4">
                                    <textarea id="description" name="description" class="form-control required" placeholder="Enter Description"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Photo</label>
                                <div class="col-sm-4">
                                    <input type="file" name="photo" class="file-upload-default" id="photo">
                                    <div class="input-group">
                                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Photo">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-gradient-primary btn-sm" type="button">Upload</button>
                                        </span>
                                        <img src="" style="display:none;width:100px;" id="upload_photo" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-gradient-primary mr-2" id="news_update_submit">Submit</button>
                                    <input type="hidden" id="news-id" value=""/>
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
                        <h4 class="card-title mb-4">Edit/View Winner</h4>
                        <div class="overflowAuto">
                            <table class="table table-bordered custom_action " id="order-listing">
                                <thead><tr>
                                        <th width="10%">Sr No.</th>
                                        <th width="20%">News Title</th>
                                        <th width="10%">News Description</th>
                                        <th width="10%">Photo</th>
                                        <th width="10%">Action</th>
                                    </tr></thead>
                                <tbody id="news-listing">
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
    <script src="https://cdn.tiny.cloud/1/<?php echo $tiny_mce_key; ?>/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <!--script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.3.0/jquery.tinymce.min.js" referrerpolicy="origin"></script-->
    <script src="assets\javascript\news-update.js"></script>
