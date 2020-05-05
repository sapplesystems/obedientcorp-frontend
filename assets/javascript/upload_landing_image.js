get_landing_image();
var landing_img = '';
$(document).ready(function () {

    //croper size for slider
    $landing_image_crop = $('#landing_image').croppie({
        enableOrientation: true,
        viewport: {
            width: 600,
            height: 600,
            type: 'square' //circle
        },
        boundary: {
            width: 700,
            height: 700
        }
    });

    $('.landing_crop_image').click(function (event) {
        $landing_image_crop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function (response) {
            if ($('#landing-image').val() != '')
            {
                landing_img = response;
            }
            $('#uploadlandingModal').modal('hide');
            //$('#uploaded_image').html(data);

        })
    });
    $(document).on('click', '.close_landing_image', function () {
        $('.file-upload-info').val('');
    });
    //get size of image
    $(".landing_image").change(function () {
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
            if (imgwidth < 600 || imgheight < 600) {
                showSwal('error', 'Image dimension should be at least 600 x 600');
                $('#' + file_id).val('');
                $('#' + file_id).siblings('.file-upload-info').val('');
                return false;
            } else {
                landing_crop_image(file_id);
            }
        };
    });//end
    //form submit
    $("#upload-image-form").submit(function (e) {
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
            params.append('landing_image', landing_img);
            $.ajax({
                url: base_url + 'upload-landing-image ',
                type: 'post',
                data: params,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.status == "success") {
                        showSwal('success', 'Image Uploded', 'Homepage landing image upload successfully');
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
        success: function (response) {
            if (response.status == "success") {
                if (response.image_path) {
                    $('#uploded_image').attr('src', response.image_path);
                    $('#uploded_image').css('display', 'block');
                }
            }
            hideLoader();
        }
    });

} //end function for get_landing_image

//crop function
function landing_crop_image(file_id) {
    var file = $('#' + file_id)[0].files[0];
    var reader = new FileReader();
    reader.onload = function (event) {
        $landing_image_crop.croppie('bind', {
            url: event.target.result
        }).then(function () {
            console.log('jQuery bind complete');
        });

    }
    reader.readAsDataURL(file);
    $('#uploadlandingModal').modal('show');

}