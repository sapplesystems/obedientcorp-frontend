$(document).ready(function () {
    getCategoryList();

    $(document).on("click", "#submit_category", function (e) {
        e.preventDefault();
        $("#create_category").validate({
            rules: {
                title: "required",
                image: "required",
                description: "required",
            }
        });
        if ($("#create_category").valid()) {
            showLoader();
            var params = new FormData();
            var url=base_url + 'category/add';
            params.append('name', $('#title').val());
            params.append('description', $('#description').val());
            params.append('image', $('#image')[0].files[0]);
            params.append('created_by', user_id);
            if($('#category_id').val())
            {
                url = base_url + 'category/update';
                params.append('parent_id', $('#category-id').val());
            }
            //console.log(url);return false;
            $.ajax({
                url: url,
                type: 'post',
                data: params,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.status == "success") {
                        getCategoryList();
                        showSwal('success', 'Category Added', 'Category added successfully.');
                        document.getElementById('create_category').reset();
                        hideLoader();
                    }
                    else {
                        showSwal('error', 'Failed', 'Category could not be added.');
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
        success: function (response) {
            console.log(response);
            var html = '<tr>\n\
            <th>Title</th>\n\
            <th>Description</th>\n\
            </tr>';

            if (response.status == "success") {
                //console.log(response.data);
                var data = response.data;
                var tr_html = '';
                var i = 1;
                var x = 1;
                $.each(data, function (key, val) {
                    var class_name = 'odd';
                    if (x % 2 == 0) {
                        class_name = 'even';
                    }
                    tr_html += '<tr id="tr_' + val.id + '" role="row" class="' + class_name + '">\n\
                                    <td class="sorting_1">' + i + '</td>\n\
                                    <td>' + val.name + '</td>\n\
                                    <td>' + val.description + '</td>\n\
                                    <td><a href="javascript:void(0);" onclick="updateCategory(event, ' + val.id + ');"> <i class="mdi mdi-pencil text-info"></i></a> &nbsp <a href="javascript:void(0);" onclick="deleteCategory(event, ' + val.id + ');"><i class="mdi mdi-delete text-danger"></i></a> </td>\n\
                                </tr>';
                                i = i + 1;
                                x++;
                });
                $('#category_list').html(tr_html);

            }

        }
    });
}//get category listing function

//function for update category
function updateCategory(e, category_id) {
    e.preventDefault();
    showLoader();
    $.ajax({
        url: base_url + 'category',
        type: 'post',
        data: { id: category_id },
        success: function (response) {
            if (response.status == "success") {
                var data = response.data;
                console.log(data);
                $('#category_id').val(data.id);
                $('#title').val(data.name);
                $('#description').val(data.description);
                if (data.image) {
                    var photo_src = media_url + 'category_images/' + data.image;
                    $('#photo_id').attr('src', photo_src);
                    $('#photo_id').css('display', 'block');
                }
            }
            hideLoader();
        }
    });
}//end function for update category

//function for delete category
function deleteCategory(e, category_id) {
    e.preventDefault();
    console.log(category_id);return false;
    var result = confirm("Are you sure you want to delete this project?");
    if (result == true) {
        showLoader();
        $.ajax({
            url: base_url + 'project/delete',
            type: 'post',
            data: { id: category_id },
            success: function (response) {
                if (response.status == "success") {
                    $("#tr_" + project_id).remove();
                    hideLoader();
                }
            }
        });
    }
}//end function for category