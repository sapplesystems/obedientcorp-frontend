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
                        <h4 class="card-title mb-4">Upload Landing Image</h4>
                        <div id="errors_div"></div>
                        <form class="forms-sample" id="upload-image-form" name="upload-image-form" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Upload Image</label>
                                <div class="input-group col-sm-4">
                                    <input type="file" name="landing-image" class="file-upload-default required" id="landing-image">
                                    <input type="text" class="form-control file-upload-info " disabled placeholder="Choose File">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                                    </span>
                                   
                                </div>
                                <img src="" style="display:none;width:100px;" id="uploded_image" />
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-gradient-primary mr-2" id="upload_form">Submit</button>
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
    <script type="text/javascript">
        get_landing_image();
        $(document).ready(function() {

            $("#upload-image-form").submit(function(e) {
                e.preventDefault();
                var upload_image_form = $("#upload-image-form");
                upload_image_form.validate({
                    rules: {},
                    errorPlacement: function errorPlacement(error, element) {
                        element.before(error);
                    }
                });
                if ($("#upload-image-form").valid()) {
                    showLoader();
                    var params = new FormData();
                    params.append('landing_image', $('#landing-image')[0].files[0]);
                    $.ajax({
                        url: base_url + 'upload-landing-image ',
                        type: 'post',
                        data: params,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            console.log(response);
                            if (response.status == "success") {
                                showSwal('success', 'Image Uploded', response.data);
                                document.getElementById('upload-image-form').reset();
                                get_landing_image();
                            } else {
                                showSwal('error', 'Image Not Uploded', 'Image not uploded');
                            }
                            hideLoader();
                        }
                    });
                }
            });


        }); //document

        function get_landing_image() {
            showLoader();
            $.ajax({
                url: base_url + 'get-landing-image ',
                type: 'post',
                data: {
                    dashboard: 1
                },
                success: function(response) {
                    console.log(response);
                    if (response.status == "success") {
                        if (response.image_path) {
                            $('#uploded_image').attr('src', response.image_path);
                            $('#uploded_image').css('display', 'block');
                        }
                    }
                    else
                    {
                        console.log("Not any image");
                    }
                    hideLoader();
                }
            });

        } //end function for get_landing_image
    </script>