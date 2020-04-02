var cat_image='';

$(document).ready(function () {
    getCategoryList();
    //crop image
    $image_crop = $('#image_demo').croppie({
        enableExif: true,
        viewport: {
          width:200,
          height:200,
          type:'square' //circle
        },
        boundary:{
          width:300,
          height:300
        }
      });
      $('#image').on('change', function(){
        var reader = new FileReader();
        reader.onload = function (event) {
          $image_crop.croppie('bind', {
            url: event.target.result
          }).then(function(){
            console.log('jQuery bind complete');
          });
        }
        reader.readAsDataURL(this.files[0]);
        $('#uploadimageModal').modal('show');
      });

      $('.crop_image').click(function(event){
        $image_crop.croppie('result', {
          type: 'canvas',
          size: 'viewport'
        }).then(function(response)
        {

            if($('#image').val() != '')
            {
                cat_image = response;
            }
            $('#uploadimageModal').modal('hide');

        })
      });
      //crop image




    if ($('#category_id').val() && $('#category_id').val() != '') {
        updateCategory($('#category_id').val());
    }

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
            var url = base_url + 'category/add';
            params.append('name', $('#title').val());
            params.append('description', $('#description').val());
            params.append('image', cat_image);
            if ($('#category_id').val()) {
                url = base_url + 'category/update';
                params.append('updated_by', user_id);
                params.append('id', $('#category_id').val());
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
                        getCategoryList();
                        showSwal('success', 'Category Added', 'Category added successfully.');
                        document.getElementById('create_category').reset();
                        window.location.href = 'category-list';
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
            if (response.status == "success") {
                var data = response.data;
                var tr_html = '';
                var i = 1;
                var x = 1;
                var edit_url = '';
                $.each(data, function (key, val) {
                    edit_url = 'create-category.php?cid=' + val.id;
                    if (val.parent_category_name != '' && val.parent_id > 0) {
                        edit_url = 'create-sub-category.php?cid=' + val.parent_id + '&scid=' + val.id;
                    }
                    tr_html += '<tr id="tr_' + val.id + '" role="row" >\n\
                                    <td class="sorting_1">' + i + '</td>\n\
                                    <td>' + val.name + '</td>\n\
                                    <td>' + val.parent_category_name + '</td>\n\
                                    <td>' + val.description + '</td>\n\
                                    <td><a href="' + edit_url + '"> <i class="mdi mdi-pencil text-info"></i></a> &nbsp <a href="javascript:void(0);" onclick="deleteCategory(event, ' + val.id + ');"><i class="mdi mdi-delete text-danger"></i></a> </td>\n\
                                </tr>';
                    i = i + 1;
                    x++;
                });
                $('#category_list').html(tr_html);
                initDataTable();

            }

        }
    });
}//get category listing function

//function for update category
function updateCategory(category_id) {
    //e.preventDefault();
    showLoader();
    $.ajax({
        url: base_url + 'category',
        type: 'post',
        data: {id: category_id},
        success: function (response) {
            if (response.status == "success") {
                var data = response.data;
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
    var result = confirm("Are you sure you want to delete this category?");
    if (result == true) {
        showLoader();
        $.ajax({
            url: base_url + 'category/delete',
            type: 'post',
            data: {id: category_id},
            success: function (response) {
                if (response.status == "success") {
                    showSwal('success', 'Category Deleted', response.data);
                    getCategoryList();
                    hideLoader();
                }
            }
        });
    }
}//end function for category