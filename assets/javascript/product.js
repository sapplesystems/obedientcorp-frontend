getCategoryList();
getProductList();
var today = new Date();
var todays_date = today.getDate() + '-' + (today.getMonth() + 1) + '-' + today.getFullYear();
$(document).ready(function () {
    $(":input").inputmask();
    if ($(".datepicker").length) {
        $('.datepicker').datepicker({
            enableOnReadonly: true,
            todayHighlight: true,
            format: 'dd-mm-yyyy',
            autoclose: true,
            endDate: todays_date
        });
    }

    $(document).on('change', '#categories', function () {
        $('#subcategory_div').css('display', 'none');
        if ($(this).val()) {
            getSubCategoryList($(this).val());
        }
    });


    //form submit
    $("#create_product").submit(function (e) {
        e.preventDefault();
        var product_frm = $("#create_product");
        product_frm.validate({
            rules: {
            },
            errorPlacement: function errorPlacement(error, element) {
                element.before(error);
            }
        });


        if ($("#create_product").valid()) {
            showLoader();
            var params = new FormData();
            var image_file = document.getElementsByClassName('input-images-1')[0];
            var doc_file = document.getElementsByClassName('input-images-2')[0];
            var totalfiles = image_file.children[0].children[0].files.length;
            var docfiles = doc_file.children[0].children[0].files.length;
            for (var index = 0; index < totalfiles; index++) {
                params.append("image[]", image_file.children[0].children[0].files[index]);
            }
            for (var index = 0; index < docfiles; index++) {
                params.append("document[]", doc_file.children[0].children[0].files[index]);
            }
            var category_id = $('#categories').val();
            if ($('#subcategory').val()) {
                category_id = $('#subcategory').val();
            }
            params.append('category_id', category_id);
            params.append('name', $('#title').val());
            params.append('dealer_price', $('#dealer_price').val());
            params.append('market_price', $('#market_price').val());
            params.append('bar_code', $('#bar_code').val());
            params.append('sku', $('#sku').val());
            params.append('expiry_date', $('#expiry_date').val());
            params.append('quantity', $('#quantity').val());
            //params.append('short_description', $('#nomineesname').val());
            params.append('description', $('#description').val());
            params.append('created_by', user_id);

            var url = base_url + 'product/add';
            if ($('#product_id').val()) {
                url = base_url + 'product/update';
                params.append('updated_by', user_id);
                params.append('id', $('#product_id').val());
            }

            $.ajax({
                url: url,
                type: 'post',
                data: params,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.status == "success") {
                        resetForm();
                        console.log(response.data);
                        hideLoader();
                        getProductList();
                    } else {
                        resetForm();
                        console.log(response.data);
                        hideLoader();
                    }
                }
            });
        }

    });
}); //end document ready

function getCategoryList() {
    $.ajax({
        url: base_url + 'categories',
        type: 'post',
        data: {},
        success: function (response) {
            var option = '<option value="">Select Category</option>';
            if (response.status == "success") {
                $.each(response.data, function (key, value) {
                    option += '<option value="' + value.id + '">' + value.name + '</option>';
                });

                $('#categories').html(option)
            }
        }
    });
} //end function category list

function getSubCategoryList(category_id) {
    var url = base_url + 'sub-category';
    $.ajax({
        url: url,
        type: 'post',
        dataType: 'json',
        data: {id: category_id},
        success: function (response) {
            if (response.status == "success") {
                if (response.data) {
                    var data = response.data;
                    var option = '<option value="">Select Subcategory</option>';
                    $.each(data, function (key, value) {
                        option += '<option value="' + value.id + '">' + value.name + '</option>';

                    });
                    $('#subcategory_div').css('display', 'block');
                    $('#subcategory').html(option);
                }

            }

        }
    });
} //endsubcategorylist

function getProductList() {
    var url = base_url + 'products';
    $.ajax({
        url: url,
        type: 'post',
        data: {},
        success: function (response) {
            if (response.status == "success") {
                if (response.data) {
                    var data = response.data;
                    var tbody = '';
                    $.each(data, function (key, val) {
                        tbody += '<tr id="prod_tr_' + val.id + '">\n\
                                        <td>' + val.name + '</td>\n\
                                        <td>' + val.description + '</td>\n\
                                        <td>\n\
                                            <i class="mdi mdi-pencil text-info" onclick="editProduct(event, ' + val.id + ');"></i> &nbsp \n\
                                            <i class="mdi mdi-delete text-danger" onclick="deleteProduct(event, ' + val.id + ');"></i>\n\
                                        </td>\n\
                                    </tr>';
                    });
                    $('#product_list').html(tbody);
                }

            }

        }
    });
}

function deleteProduct(e, product_id) {
    showLoader();
    var url = base_url + 'product/delete';
    $.ajax({
        url: url,
        type: 'post',
        data: {id: product_id},
        success: function (response) {
            if (response.status == "success") {
                $('#prod_tr_' + product_id).remove();
                hideLoader();
            } else {
                hideLoader();
            }
        }
    });
}

function editProduct(e, product_id) {
    showLoader();
    var url = base_url + 'product';
    $.ajax({
        url: url,
        type: 'post',
        data: {id: product_id},
        success: function (response) {
            if (response.status == "success") {
                var product = response.data;
                $('#product_id').val(product_id);
                $('#category_id').val(product.category_id);
                $('#title').val(product.name);
                $('#dealer_price').val(product.dealer_price);
                $('#market_price').val(product.market_price);
                $('#bar_code').val(product.bar_code);
                $('#sku').val(product.sku);
                $('#expiry_date').val(product.expiry_date);
                $('#description').val(product.description);
                $('#updated_by').val(user_id);
                hideLoader();
            } else {
                hideLoader();
            }
        }
    });
}

function resetForm() {
    document.getElementById('create_product').reset();
    $('#product_id').val('');
}