get_slider_image();
$(document).ready(function() {
   
    $("#upload-slider-form").submit(function(e) {
        e.preventDefault();
        showLoader();

        var params = new FormData();
        params.append('slider_image_1', $('#slider-image1')[0].files[0]);
        params.append('slider_image_2', $('#slider-image2')[0].files[0]);
        params.append('slider_image_3', $('#slider-image3')[0].files[0]);
        params.append('slider_image_4', $('#slider-image4')[0].files[0]);
        params.append('slider_image_5', $('#slider-image5')[0].files[0]);
        $.ajax({
            url: base_url + 'upload-sliding-image',
            type: 'post',
            data: params,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response);
                if (response.status == "success") {
                    showSwal('success', 'Image Uploded', " Homepage slider images uplode successfully");
                    document.getElementById('upload-slider-form').reset();
                    get_slider_image();
                } else {
                    showSwal('error', 'Image Not Uploded', 'Image not uploded');
                }
                hideLoader();
            }
        });
    }); //form submit

    $(".slider_images").change(function() {
        var _URL = window.URL || window.webkitURL;
        var file_id = $(this).attr('id');
        var file = $(this)[0].files[0];
        var img = new Image();
        var imgwidth = 0;
        var imgheight = 0;
        var currentObj = this;
        img.src = _URL.createObjectURL(file);
        img.onload = function() {
            imgwidth = this.width;
            imgheight = this.height;
            console.log('Image dimension must be at least ' + imgwidth + ' ' + imgheight + '(Width X Height)');
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
        success: function(response) {
            if (response.status == "success") {
                $.each(response.data, function(key, value) {
                    var url = media_url + 'sliding_image/' + value.value;
                    if (value.key == 'slider_image_1') {
                        $('#uploded_image1').attr('src', url);
                        $('#uploded_image1').css('display', 'block');
                    } else if (value.key == 'slider_image_2') {
                        $('#uploded_image2').attr('src', url);
                        $('#uploded_image2').css('display', 'block');

                    } else if (value.key == 'slider_image_3') {
                        $('#uploded_image3').attr('src', url);
                        $('#uploded_image3').css('display', 'block');

                    } else if (value.key == 'slider_image_4') {
                        $('#uploded_image4').attr('src', url);
                        $('#uploded_image4').css('display', 'block');
                    } else if (value.key == 'slider_image_5') {
                        $('#uploded_image5').attr('src', url);
                        $('#uploded_image5').css('display', 'block');
                    }
                });
            } else {
                console.log("Not any image");
            }
            hideLoader();
        }
    });

} //end function for get_landing_image