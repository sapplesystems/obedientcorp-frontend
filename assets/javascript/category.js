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
            var params = new FormData();
            params.append('name', $('#title').val());
            params.append('description', $('#description').val());
            params.append('image', $('#image')[0].files[0]);
            params.append('created_by', user_id);

            $.ajax({
                url: 'http://localhost/obedientcorp/public/api/category/add',
                type: 'post',
                data: params,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.status == "success") {
                        getCategoryList();
                        showSwal('success', 'Category Added', 'Category added successfully.');
                        document.getElementById('create_category').reset();
                    }
                    else {
                        showSwal('error', 'Failed', 'Category could not be added.');
                    }

                }
            });

        }
    });
});

function getCategoryList() {
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
                $.each(data, function (key, val) {
                    tr_html += '<tr>\n\
                                    <td>'+ val.name + '</td>\n\
                                    <td>'+ val.description + '</td>\n\
                                </tr>';
                });
                $('#category_list').html(tr_html);

            }

        }
    });
}