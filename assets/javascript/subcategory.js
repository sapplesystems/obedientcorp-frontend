var sub_category_image = '';

$(document).ready(function () {
    getCategoryList();
    bvListing($('#subcategory_id').val());
    /*$(document).on('change', '#categories', function() {
     if ($(this).val()) {
     getSubCategoryList($(this).val());
     }
     });*/
    //crop image
    $image_crop = $('#image_demo').croppie({
        enableExif: true,
        viewport: {
            width: 1920,
            height: 306,
            type: 'square' //circle
        },
        boundary: {
            width: 2020,
            height: 406
        }
    });
    $('#sub_category_image').on('change', function () {
        var reader = new FileReader();
        reader.onload = function (event) {
            $image_crop.croppie('bind', {
                url: event.target.result
            }).then(function () {
                console.log('jQuery bind complete');
            });
        }
        reader.readAsDataURL(this.files[0]);
        $('#uploadimageModal').modal('show');
    });

    $('.crop_image').click(function (event) {
        $image_crop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function (response)
        {

            if ($('#image').val() != '')
            {
                sub_category_image = response;
            }
            $('#uploadimageModal').modal('hide');

        })
    });

    $(document).on('click', '.close_crop_image', function () {
        $('#image').val('');
        $('.file-upload-info').val('');
    });
    //crop image



    if ($('#category_id').val() != '' && $('#subcategory_id').val() != '') {
        updateSubCategory($('#subcategory_id').val());
    }

    $(document).on('blur', '#cgst', function () {
        $('#igst').val(0);
    });
    $(document).on('blur', '#sgst', function () {
        $('#igst').val(0);
    });
    $(document).on('blur', '#igst', function () {
        $('#cgst').val(0);
        $('#sgst').val(0);
    });

    $(document).on("click", "#submit_sub_category", function (e) {
        e.preventDefault();
        $("#create-sub-category").validate({
            rules: {
                categories: "required",
                sub_category_title: "required",
                sub_category_image: "required",
                sub_category_description: "required",
                bv_type: "required",
            }
        });
        if ($("#create-sub-category").valid()) {
            showLoader();
            var category_id = $('#categories').val();
            var url = base_url + 'category/add';
            var params = new FormData();
            params.append('parent_id', category_id);
            params.append('name', $('#sub_category_title').val());
            params.append('description', $('#sub_category_description').val());
            params.append('image', sub_category_image);
            params.append('cgst', $('#cgst').val());
            params.append('sgst', $('#sgst').val());
            params.append('igst', $('#igst').val());
            params.append('bv_type', $('#bv_type').val());
            if ($('#subcategory_id').val())
            {
                url = base_url + 'category/update';
                params.append('updated_by', user_id);
                params.append('id', $('#subcategory_id').val());
            } else {
                params.append('created_by', user_id);
            }

            $.ajax({
                url: url,
                type: 'post',
                data: params,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.status == "success") {
                        //getSubCategoryList(category_id);
                        showSwal('success', 'SubCategory Added', 'SubCategory added successfully.');
                        document.getElementById('create-sub-category').reset();
                        $('#photo_id').attr('src', '');
                        $('#photo_id').css('display', 'none');
                        location.href = 'category-list';
                        hideLoader();

                    } else {
                        showSwal('error', 'Failed', 'SubCategory could not be added.');
                        hideLoader();
                    }

                }
            });

        }
    });
});

function getCategoryList() {
    $.ajax({
        url: base_url + 'category-list',
        type: 'post',
        data: {},
        async: false,
        success: function (response) {
            var html = '<tr>\n\
            <th>Title</th>\n\
            <th>Description</th>\n\
            </tr>';

            if (response.status == "success") {
                var data = response.data;
                var tr_html = '';
                var option = '<option value="">Select Categories</option>';
                var x = 1;
                $.each(data, function (key, val) {
                    option += '<option value="' + val.id + '">' + val.name + '</option>';
                    x++;

                });
                $('#categories').html(option);

            }

        }
    });
}

function getSubCategoryList(category_id) {
    var url = base_url + 'sub-category';
    $.ajax({
        url: url,
        type: 'post',
        dataType: 'json',
        data: {id: category_id},
        success: function (response) {
            if (response.status == "success") {
                var data = response.data;
                var tr_html = '';
                var x = 1;
                var i = 1;
                $.each(data, function (key, val) {
                    var class_name = 'odd';
                    if (x % 2 == 0) {
                        class_name = 'even';
                    }
                    tr_html += '<tr id="tr_' + val.id + '" role="row" class="' + class_name + '">\n\
                                    <td class="sorting_1">' + i + '</td>\n\
                                    <td >' + val.name + '</td>\n\
                                    <td>' + val.description + '</td>\n\
                                    <td><a href="javascript:void(0);" onclick="updateSubCategory(event, ' + val.id + ');"> <i class="mdi mdi-pencil text-info"></i></a> &nbsp <a href="javascript:void(0);" onclick="deleteSubCategory(event, ' + val.id + ');"><i class="mdi mdi-delete text-danger"></i></a> </td>\n\
                                </tr>';

                    x++;
                    i++;

                });
                $('#sub_category_list').html(tr_html);
                initDataTable();

            }

        }
    });
}

//function for update subcategory
function updateSubCategory(category_id) {
    //e.preventDefault();
    showLoader();
    $.ajax({
        url: base_url + 'category',
        type: 'post',
        data: {id: category_id},
        success: function (response) {
            if (response.status == "success") {
                var data = response.data;
                $('#categories').val(data.parent_id);
                $('#subcategory_id').val(data.id);
                $('#sub_category_title').val(data.name);
                $('#sub_category_description').val(data.description);
                $('#cgst').val(data.cgst);
                $('#sgst').val(data.sgst);
                $('#igst').val(data.igst);
                document.getElementById('bv_type').selectedIndex = -1
                $('#bv_type').val(response.bv_type);
                if (data.image) {
                    var photo_src = media_url + 'category_images/' + data.image;
                    $('#photo_id').attr('src', photo_src);
                    $('#photo_id').css('display', 'block');
                }
            }
            hideLoader();
        }
    });
}//end function for update subcategory

//function for delete subcategory
function deleteSubCategory(e, category_id) {
    e.preventDefault();
    var result = confirm("Are you sure you want to delete this sub category?");
    if (result == true) {
        showLoader();
        $.ajax({
            url: base_url + 'category/delete',
            type: 'post',
            data: {id: category_id},
            success: function (response) {
                if (response.status == "error") {
                    getCategoryList();
                    hideLoader();
                }
            }
        });
    }
}//end function for subcategory

function bvListing(cid) {
    $.ajax({
        url: base_url + 'coupon-business-values',
        type: 'post',
        data: {},
        success: function (response) {
            if (response.status == "success") {
                var data = response.data;
                var list = '<option value="">Select Business Value</option>';
                var sel;
                $.each(data, function (key, val) {
                    sel = '';
                    if (val.business_value == 77 && cid == '') {
                        sel = 'selected';
                    }
                    list += '<option value="' + val.id + '" ' + sel + '>' + val.name + '</option>';
                });
                $('#bv_type').html(list);
            }

        }
    });
}