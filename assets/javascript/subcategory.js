$(document).ready(function () {
    getSubCategoryList();

    $(document).on("click", "#submit_sub_category", function (e) {
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
            var params = new FormData();
            params.append('parent_id', $('#categories').val());
            params.append('name', $('#sub_category_title').val());
            params.append('description', $('#sub_category_description').val());
            params.append('image', $('#sub_category_image')[0].files[0]);
            params.append('created_by', user_id);

            $.ajax({
                url: 'http://localhost/obedientcorp/public/api/category/add',
                type: 'post',
                data: params,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.status == "success") {
                        getSubCategoryList();
                        showSwal('success', 'SubCategory Added', 'SubCategory added successfully.');
                        document.getElementById('create-sub-category').reset();
                    }
                    else {
                        showSwal('error', 'Failed', 'SubCategory could not be added.');
                    }

                }
            });

        }
    });
});

function getSubCategoryList() {
    $.ajax({
        url: 'http://localhost/obedientcorp/public/api/categories',
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
                var option = '<option value="">Select Categories</option>';
                var x = 1;
                $.each(data, function (key, val) {
                    console.log(key);
                    var class_name = 'odd';
                    if (x % 2 == 0) {
                        class_name = 'even';
                    }
                    tr_html += '<tr role="row" class="'+ class_name + '">\n\
                                    <td class="sorting_1">' + val.name + '</td>\n\
                                    <td>'+ val.description + '</td>\n\
                                </tr>';
                    option += '<option value="' + val.id + '">' + val.name + '</option>';
                    x++;

                });
                $('#sub_category_list').html(tr_html);
                $('#categories').html(option);

            }

        }
    });
}

