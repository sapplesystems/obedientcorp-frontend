
getgalleryList();
var photo_image = '';
$(document).ready(function () {

    if ($('#gallery-id').val() && $('#gallery-id').val() != '') {
        $('#product_images').imageUploader();
        getGalleryImages($('#gallery-id').val());
    }


    if ($('#gallery_id').val() && $('#gallery_id').val() != '') {
        updategallery($('#gallery_id').val());
    }
    $("#gallery-form").submit(function (e) {
        e.preventDefault();
        var gallery_frm = $("#gallery-form");
        gallery_frm.validate({
            rules: {
            },
            errorPlacement: function errorPlacement(error, element) {
                element.before(error);
            }
        });
        if ($("#gallery-form").valid()) {
            showLoader();
            var params = new FormData();
            var name = $('#gallery_name').val();
            var photo = $('#photo')[0].files[0];
            params.append('title', name);
            params.append('photo', photo);
            update_or_insert_gallery(params);

        }//end if
    });
    //multiple gallery images upload 
    $("#gallery-images-form").submit(function (e) {
        e.preventDefault();
        var gallery_images_frm = $("#gallery-images-form");
        gallery_images_frm.validate({
            rules: {
            },
            errorPlacement: function errorPlacement(error, element) {
                element.before(error);
            }
        });
        if ($("#gallery-images-form").valid()) {
            var params = new FormData();
            params.append('gallery_id', $('#gallery-id').val());
            var image_file = document.getElementById('product_images');
            var totalfiles = image_file.children[0].children[0].files.length;
            var filesie = 0;
            for (var index = 0; index < totalfiles; index++) {
                filesie = (filesie + image_file.children[0].children[0].files[index].size / 1024 / 1024);
                params.append("photo[]", image_file.children[0].children[0].files[index]);
            }
            /*if (filesie >= 10) {
                showSwal('error', 'Image Size Limit Exceeds', 'You can only upload 10MB at one time');
                return false;
            }*/
            showLoader();
            $.ajax({
                url: base_url + 'gallery-image-upload',
                type: 'post',
                data: params,
                contentType: false,
                processData: false,
                success: function (response) {
                    console.log(response);
                    if (response.status == 'success') {
                        showSwal('success', 'Gallery Saved', response.data);
                        document.getElementById('gallery-images-form').reset();
                        $(".uploaded").children(".uploaded-image").remove();
                        //setTimeout(function () { location.reload(); }, 2000);
                        getGalleryImages($('#gallery-id').val());
                        hideLoader();
                    } else {
                        showSwal('error', 'Gallery Not Saved', 'Gallery not saved successfully');
                        hideLoader();
                    }
                }
            });


        }//end if
    });

    //end gallery images form submit
    $("#photo").change(function () {
        var file = $(this)[0].files[0];
        var totalSizeMB = (file.size / Math.pow(1024, 2));
        console.log(totalSizeMB);
        if (totalSizeMB > 10) {
            showSwal('error', 'Image Size Limit Exceeds', 'You can only upload 10MB at one time');
            return false;
        } else {
            console.log("you can upload image");
        }

    });

});//document ready

function update_or_insert_gallery(params) {
    var url = base_url + 'gallery-add';
    var gallery_id = $('#gallery_id').val();
    if (gallery_id) {
        params.append('id', gallery_id);
        url = base_url + 'gallery-update';
    }
    $.ajax({
        url: url,
        type: 'post',
        data: params,
        contentType: false,
        processData: false,
        success: function (response) {
            error_html = '';
            if (response.status == 'success') {
                showSwal('success', 'gallery Added', 'gallery added successfully');
                document.getElementById('gallery-form').reset();
                $('#mapphoto_id,#photo_id').attr('src', '');
                $('#mapphoto_id,#photo_id').css('display', 'none');
                location.href = 'gallery-list';
                //getgalleryList();
                hideLoader();
            } else {
                showSwal('error', 'gallery Not Added', 'gallery not added successfully');
                hideLoader();
            }

            $('#errors_div').html(error_html);

        },
        error: function (response) {
            console.log(response);
            error_html = '';
            var error_object = JSON.parse(response.responseText);
            var message = error_object.message;
            var errors = error_object.errors;
            $.each(errors, function (key, value) {
                error_html += '<div class="alert alert-danger" role="alert">' + value[0] + '</div>';
            });
            $('#errors_div').html(error_html);
            hideLoader();
        }
    });//ajax

}//end update_or_insert_function

//get all gallery list
function getgalleryList() {
    showLoader();
    $.ajax({
        url: base_url + 'gallery-list',
        type: 'post',
        data: {},
        success: function (response) {
            var html = '';
            if (response.status == "success") {
                var i = 1;
                $.each(response.data, function (key, value) {
                    var edit_url;
                    edit_url = 'create-gallery.php?gid=' + value.id;
                    html += '<tr id="tr_' + value.id + '" role="row" >\n\
                                <td class="sorting_1">' + i + '</td>\n\
                                <td>' + value.title + '</td>\n\
                                <td><img src="'+ media_url + 'gallery_photo/' + value.photo + '" id="photo_id" /> </td>\n\
                                <td>\n\
                                <a href="' + edit_url + '"> <i class="mdi mdi-pencil text-info"></i></a> &nbsp\n\
                                <a href="javascript:void(0);" onclick="deletegallery(event, ' + value.id + ');"><i class="mdi mdi-delete text-danger"></i></a>&nbsp\n\
                                <a href="create-gallery-images.php?gallery_id=' + value.id + '&title=' + value.title + '" id="gallery-images" title="Upload Gallery Images"><i class="mdi mdi-open-in-new"></i></a>  \n\
                                </td>\n\
                            </tr>';
                    i = i + 1;

                });
                $('#gallery_list').html(html);
                initDataTable();
                hideLoader();
            }
            else {
                initDataTable();
                hideLoader();
            }
        }
    });
}//function end all gallery list

//function for edit gallery details
function updategallery(gallery_id) {
    //e.preventDefault();
    showLoader();
    $.ajax({
        url: base_url + 'gallery-detail',
        type: 'post',
        data: { id: gallery_id },
        success: function (response) {
            if (response.status == "success") {
                var data = response.data;
                $('#gallery_id').val(gallery_id);
                $('#gallery_name').val(data.title);
                if (data.photo) {
                    var photo_src = media_url + 'gallery_photo/' + data.photo;
                    $('#photo_id').attr('src', photo_src);
                    $('#photo_id').css('display', 'block');
                    $('#photo').removeClass('required');
                }
                else {
                    $('#photo_id').attr('src', '');
                    $('#photo_id').css('display', 'none');
                }

                hideLoader();
            }
        }
    });
}//End function for edit gallery details

//function for delete gallery 
function deletegallery(e, gallery_id) {
    e.preventDefault();
    showLoader();
    var result = confirm("Are you sure you want to delete this gallery?");
    if (result == true) {
        $.ajax({
            url: base_url + 'gallery-delete',
            type: 'post',
            data: { id: gallery_id },
            success: function (response) {
                if (response.status == "success") {
                    getgalleryList();
                    //$("#tr_" + project_id).remove();

                }
                hideLoader();
            }
        });
    }
}//end function for delete gallery

//function get gallery images 
function getGalleryImages(id) {
    $.ajax({
        url: base_url + 'gallery-image-list',
        type: 'post',
        data: { gallery_id: id },
        async: true,
        success: function (response) {
            console.log(response);
            if (response.status == "success") {
                var i = 1;
                var html = '<table class="table table-bordered custom_action" id="gallery_images_list_table">\n\
                                <thead>\n\
                                    <tr>\n\
                                        <th width="10%">Sr No.</th>\n\
                                        <th width="20%">Gallery Name</th>\n\
                                        <th width="10%">Photo</th>\n\
                                        <th width="10%">Action</th>\n\
                                    </tr>\n\
                                </thead>\n\
                                <tbody>';
                $.each(response.data, function (key, value) {
                    html += '<tr id="tr_' + value.id + '" role="row" >\n\
                                <td class="sorting_1">' + i + '</td>\n\
                                <td>' + response.gallery_title + '</td>\n\
                                <td><img src="'+ media_url + 'gallery_photo/' + value.file_name + '" id="photo_id" /> </td>\n\
                                <td>\n\
                                <a href="javascript:void(0);" onclick="deletegalleryImages(event, ' + value.id + ',' + id + ');"><i class="mdi mdi-delete text-danger"></i></a>&nbsp\n\
                                </td>\n\
                            </tr>';
                    i = i + 1;
                });
                html += '</tbody></table>';
                $('#gallery_images_list_data').html(html);
                generateDataTable('gallery_images_list_table');
                hideLoader();
            }
        }
    });

}//end function for get gallery images

//function for delete gallery multiple Images 
function deletegalleryImages(e, images_id, id) {

    e.preventDefault();
    showLoader();
    var result = confirm("Are you sure you want to delete this gallery image?");
    if (result == true) {
        $.ajax({
            url: base_url + 'gallery-image-delete',
            type: 'post',
            data: { image_id: images_id },
            success: function (response) {
                if (response.status == "success") {
                    getGalleryImages(id);
                }
                hideLoader();
            }
        });
    }
}//end function for delete gallery