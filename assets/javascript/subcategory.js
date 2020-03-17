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
            var params = new FormData();
            params.append('parent_id', $('#categories').val());
            params.append('name', $('#sub_category_title').val());
            params.append('description', $('#sub_category_description').val());
            params.append('image', $('#sub_category_image')[0].files[0]);
            params.append('created_by', user_id);

            $.ajax({
                url: base_url + 'category/add',
                type: 'post',
                data: params,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status == "success") {
                        getSubCategoryList(category_id);
                        showSwal('success', 'SubCategory Added', 'SubCategory added successfully.');
                        document.getElementById('create-sub-category').reset();
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
                var option = '<option value="">Select Categories</option>';
                var x = 1;
                $.each(data, function(key, val) {
                    console.log(val);
                    var class_name = 'odd';
                    if (x % 2 == 0) {
                        class_name = 'even';
                    }
                    tr_html += '<tr role="row" class="' + class_name + '">\n\
                                    <td class="sorting_1">' + val.name + '</td>\n\
                                    <td>' + val.description + '</td>\n\
                                </tr>';

                    x++;

                });
                $('#sub_category_list').html(tr_html);


            }

        }
    });
}