<?php
include_once 'header.php';
$bvid = '';
if (isset($_REQUEST['bvid'])) {
    $bvid = $_REQUEST['bvid'];
}
?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper ">
        <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <form class="forms-sample" id="shopping_card_bv_frm" name="shopping_card_bv_frm" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <h4 class="card-title mb-4 col-md-6"><?php echo ($bvid) ? 'Update' : 'Add'; ?> Shopping Card Business Value</h4>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" placeholder="Name" id="name" name="name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Business Value</label>
                                        <input type="text" class="form-control" placeholder="Business Value" id="business_value" name="business_value">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <div class="input-group">
                                            <input type="file" class="file-upload-default" id="image" name="image">
                                            <input type="text" class="form-control file-upload-info" disabled placeholder="Choose File">
                                            <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                                            </span>
                                            <img src="" style="display:none;width:100px;" id="uploaded_image" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 mt-4">
                                    <label>&nbsp;</label>
                                    <button type="submit" class="btn btn-gradient-primary mr-2" id="shopping_card_bv_frm_submit">Submit</button>
                                    <input type="hidden" id="bvid" value="<?php echo $bvid ?>" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once 'footer.php'; ?>

    <script type="text/javascript">
        var bvid = "<?php echo $bvid ?>";
        if (bvid && bvid != '') {
            getBvInfo(bvid);
        }
        $(document).ready(function () {
            $(document).on("click", "#shopping_card_bv_frm_submit", function (e) {
                e.preventDefault();
                $("#shopping_card_bv_frm").validate({
                    rules: {
                        name: "required",
                        business_value: {
                            required: true,
                            number: true
                        },
                    }
                });
                if ($("#shopping_card_bv_frm").valid()) {
                    showLoader();
                    var url = base_url + 'coupon-business-value/add';
                    var params = new FormData();
                    params.append('name', $('#name').val());
                    params.append('business_value', $('#business_value').val());
                    if ($('#image').val() != '') {
                        params.append('image', $('#image')[0].files[0]);
                    }
                    if ($('#bvid').val()) {
                        url = base_url + 'coupon-business-value/update';
                        params.append('id', $('#bvid').val());
                    }

                    $.ajax({
                        url: url,
                        type: 'post',
                        data: params,
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            showSwal(response.status, response.data, response.data);
                            document.getElementById('shopping_card_bv_frm').reset();
                            $('#uploaded_image').attr('src', '');
                            $('#uploaded_image').css('display', 'none');
                            window.location.href = 'shopping-cards-business-value';
                            hideLoader();
                        }
                    });

                }
            });
        });

        function getBvInfo(bvid) {
            $.ajax({
                url: base_url + 'coupon-business-values',
                type: 'post',
                data: {id: bvid},
                async: false,
                success: function (response) {
                    if (response.status == "success") {
                        var data = response.data;
                        $('#name').val(data.name);
                        $('#business_value').val(data.business_value);
                        if (data.image != '' && data.image != null) {
                            var img_url = media_url + 'coupon_bv/' + data.image;
                            $('#uploaded_image').attr('src', img_url);
                            $('#uploaded_image').css('display', 'block');
                        }
                    }
                }
            });
        }
    </script>