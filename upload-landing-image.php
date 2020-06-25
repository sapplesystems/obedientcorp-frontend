
        <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-4">Upload Landing Image</h4>
                        <div id="errors_div"></div>
                        <form class="forms-sample" id="upload-image-form" name="upload-image-form" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Upload Image</label>
                                <div class="input-group col-sm-4">
                                    <input type="file" name="landing-image" class="file-upload-default landing_image required" id="landing-image">
                                    <input type="text" class="form-control file-upload-info " disabled placeholder="Choose File">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                                    </span>

                                </div>
                                <img class="mBox" src="" style="display:none;width:100px;" id="uploded_image" />
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-gradient-success" id="upload_form">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
    <!-- content-wrapper ends -->

    <style>
        #uploadlandingModal .modal-dialog{max-width: 800px; margin-top: 50px;}
        #uploadlandingModal .modal-header{display:block;}
        #uploadlandingModal .landing_close{float:right;}
        #uploadlandingModal .modal-title{float:left;}
    </style>

    <!--CROP POPUP FOR LANDING IMAGE-->
    <div id="uploadlandingModal" class="modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="landing_close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Upload & Crop Image</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div id="landing_image"></div>
                        </div>
                        <div class="col-md-12 text-center" style="padding-top:20px;">
                            <button class="btn btn-success landing_crop_image">Crop & Upload Image</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--END CROP POPUP FOR SLIDER IMAGE-->