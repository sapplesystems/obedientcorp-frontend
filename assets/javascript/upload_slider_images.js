get_slider_image();
$(document).ready(function () {

    $("#upload-slider-form").submit(function (e) {
        e.preventDefault();
        showLoader();

        var params = new FormData();
        params.append('slider_image_1', $('#slider-image1')[0].files[0]);
        params.append('title1', $('#title-1').val());
        params.append('sub_title1', $('#subtitle-1').val());
        params.append('slider_image_2', $('#slider-image2')[0].files[0]);
        params.append('title2', $('#title-2').val());
        params.append('sub_title2', $('#subtitle-2').val());
        params.append('slider_image_3', $('#slider-image3')[0].files[0]);
        params.append('title3', $('#title-3').val());
        params.append('sub_title3', $('#subtitle-3').val());
        params.append('slider_image_4', $('#slider-image4')[0].files[0]);
        params.append('title4', $('#title-4').val());
        params.append('sub_title4', $('#subtitle-4').val());
        params.append('slider_image_5', $('#slider-image5')[0].files[0]);
        params.append('title5', $('#title-5').val());
        params.append('sub_title5', $('#subtitle-5').val());
        $.ajax({
            url: base_url + 'upload-sliding-image',
            type: 'post',
            data: params,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.status == "success") {
                    showSwal('success', 'Slider Updated', " Homepage slider updated successfully");
                    document.getElementById('upload-slider-form').reset();
                    get_slider_image();
                } else {
                    showSwal('error', 'Slider Not Updated', 'Slider not updated');
                }
                hideLoader();
            }
        });
    }); //form submit

    $(".slider_images").change(function () {
        var _URL = window.URL || window.webkitURL;
        var file_id = $(this).attr('id');
        var file = $(this)[0].files[0];
        var img = new Image();
        var imgwidth = 0;
        var imgheight = 0;
        var currentObj = this;
        img.src = _URL.createObjectURL(file);
        img.onload = function () {
            imgwidth = this.width;
            imgheight = this.height;
            if (imgwidth < 1366 || imgheight < 768) {
                showSwal('error', 'Image dimension should be at least 1366 x 768');
                $('#' + file_id).val('');
                $('#' + file_id).siblings('.file-upload-info').val('');
                return false;
            }
        };
    });

}); //document

function get_slider_image() {
    showLoader();
    $.ajax({
        url: base_url + 'get-sliding-image  ',
        type: 'post',
        data: {
            dashboard: 1
        },
        success: function (response) {
            if (response.status == "success") {
                $.each(response.data, function (key, value) {

                    var url = media_url + 'sliding_image/' + value.slider_image;
                    var id = value.id;
                    $('#uploded_image'+id).attr('src', url);
                    $('#uploded_image'+id).css('display', 'block');
                    $('#title-'+id).val(value.slider_title);
                    $('#subtitle-'+id).val(value.slider_sub_title);
                });
            }
            hideLoader();
        }
    });

} //end function for get_landing_image