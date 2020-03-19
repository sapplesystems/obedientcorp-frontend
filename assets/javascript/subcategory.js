$(document).ready(function() {
    getCategoryList();
    $(document).on('change', '#categories', function() {

        if ($(this).val()) {
            getSubCategoryList($(this).val());
        }
    });


    $(document).on("click", "#submit_sub_category", function(e) {
        e.preventDefault();
        $("#create-sub-category").validate({
            rules: {
                categories: "required",
                sub_category_title: "required",
                sub_category_image: "required",
                sub_category_description: "required",
            }
        });
        if ($("#create-sub-category").valid()) {
            showLoader();
            var category_id = $('#categories').val();
            var url=base_url + 'category/add';
            var params = new FormData();
            params.append('parent_id', category_id);
            params.append('name', $('#sub_category_title').val());
            params.append('description', $('#sub_category_description').val());
            params.append('image', $('#sub_category_image')[0].files[0]);
            if($('#subcategory_id').val())
            {
                url = base_url + 'category/update';
                params.append('updated_by', user_id);
                params.append('id', $('#subcategory_id').val());
            }else{
                params.append('created_by', user_id);
            }

            $.ajax({
                url: url,
                type: 'post',
                data: params,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status == "success") {
                        getSubCategoryList(category_id);
                        showSwal('success', 'SubCategory Added', 'SubCategory added successfully.');
                        document.getElementById('create-sub-category').reset();
                        $('#photo_id').attr('src', '');
                         $('#photo_id').css('display', 'none');
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
        url: base_url + 'categories',
        type: 'post',
        data: {},
        success: function(response) {
            console.log(response);
            var html = '<tr>\n\
            <th>Title</th>\n\
            <th>Description</th>\n\
            </tr>';

            if (response.status == "success") {
                //console.log(response.data);
                var data = response.data;
                var tr_html = '';
                var option = '<option value="">Select Categories</option>';
                var x = 1;
                $.each(data, function(key, val) {
                    console.log(key);
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
        data: { id: category_id },
        success: function(response) {
            console.log(response);
            if (response.status == "success") {
                //console.log(response.data);
                var data = response.data;
                var tr_html = '';
                var x = 1;
                var i = 1;
                $.each(data, function(key, val) {
                    console.log(val);
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
function updateSubCategory(e, category_id) {
    e.preventDefault();
    showLoader();
    $.ajax({
        url: base_url + 'category',
        type: 'post',
        data: { id: category_id },
        success: function (response) {
            if (response.status == "success") {
                var data = response.data;
                $('#subcategory_id').val(data.id);
                $('#sub_category_title').val(data.name);
                $('#sub_category_description').val(data.description);
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
            data: { id: category_id },
            success: function (response) {
                if (response.status == "error") {
                    $("#tr_" + category_id).remove();
                    hideLoader();
                }
            }
        });
    }
}//end function for subcategory