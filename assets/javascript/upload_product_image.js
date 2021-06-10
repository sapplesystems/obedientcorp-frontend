get_product_image();
var product_img = '';
$(document).ready(function() {

    //croper size for slider
    $product_image_crop = $('#product_image').croppie({
        enableOrientation: true,

        viewport: {
            width: 550,
            height:650,
            type: 'square' //circle
        },
        boundary: {
            width: 650,
            height: 750
        }
    });

    $('.product_crop_image').click(function(event) {
        $product_image_crop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function(response) {
            if($('#product-image').val()!='')
            {
                product_img = response; 
            }
            $('#uploadproductModal').modal('hide');
            //$('#uploaded_image').html(data);

        })
    });
    $(document).on('click', '.close_product_image', function() {
        $('.file-upload-info').val('');
    });
    //get size of image
    $(".product_image").change(function() {
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
            if (imgwidth < 550 || imgheight < 650) {
                showSwal('error', 'Image dimension should be at least 550 x 650');
                $('#' + file_id).val('');
                $('#' + file_id).siblings('.file-upload-info').val('');
                return false;
            } else {
                crop_image(file_id);
            }
        };
    });//end
    //form submit
    $("#upload-product-form").submit(function(e) {
        e.preventDefault();
        var upload_product_form = $("#upload-product-form");
        upload_product_form.validate({
            rules: {},
            errorPlacement: function errorPlacement(error, element) {
                element.before(error);
            }
        });
        if ($("#upload-product-form").valid()) {
            showLoader();
            var params = new FormData();
            params.append('home_product_ad', product_img);
            $.ajax({
                url: base_url + 'upload-homeproduct-image',
                type: 'post',
                data: params,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status == "success") {
                        showSwal('success', 'Image Uploded', 'Product homepage image upload successfully');
                        document.getElementById('upload-product-form').reset();
                        get_product_image();
                    } else {
                        showSwal('error', 'Image Not Uploded', 'Image not uploded');
                    }
                    hideLoader();
                }
            });
        }
    });


}); //document

function get_product_image() {
    showLoader();
    $.ajax({
        url: base_url + 'get-homeproduct-image',
        type: 'post',
        data: {
            dashboard: 1
        },
        success: function(response) {
            if (response.status == "success") {
                if (response.image_path) {
                    $('#product_uploded_image').attr('src', response.image_path);
                    $('#product_uploded_image').css('display', 'block');
                }
            }
            hideLoader();
        }
    });

} //end function for get_landing_image

  //crop function
  function crop_image(file_id) {
    var file = $('#' + file_id)[0].files[0];
    var reader = new FileReader();
    reader.onload = function(event) {
        $product_image_crop.croppie('bind', {
            url: event.target.result
        }).then(function() {
            console.log('jQuery bind complete');
        });

    }
    reader.readAsDataURL(file);
    $('#uploadproductModal').modal('show');

}