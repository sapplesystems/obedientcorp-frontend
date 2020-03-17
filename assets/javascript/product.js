getCategoryList();
var today = new Date();
var todays_date = today.getDate() + '-' + (today.getMonth() + 1) + '-' + today.getFullYear();
$(document).ready(function() {
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

    $(document).on('change', '#categories', function() {
        $('#subcategory_div').css('display', 'none');
        if ($(this).val()) {
            getSubCategoryList($(this).val());
        }
    });


    //form submit
    $("#create_product").submit(function(e) {
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
            var params = new FormData();
            var totalfiles = document.getElementById('files').files.length;
            var docfiles = document.getElementById('document').files.length;
            for (var index = 0; index < totalfiles; index++) {
                params.append("image[]", document.getElementById('files').files[index]);
            }
            for (var index = 0; index < docfiles; index++) {
                params.append("document[]", document.getElementById('files').files[index]);
            }
            var category_id = $('#categories').val();
            if ($('#subcategory').val()) {
                category_id = $('#subcategory').val();
            }
            params.append('category_id ', category_id);
            params.append('name', $('#title').val());
            params.append('dealer_price ', $('#dealer_price').val());
            params.append('market_price', $('#market_price').val());
            params.append('bar_code ', $('#bar_code').val());
            params.append('sku ', $('#sku').val());
            params.append('created_date', $('#entry_date').val());
            params.append('expiry_date ', $('#expiry_date').val());
            params.append('quantity ', $('#quantity').val());
            //params.append('short_description', $('#nomineesname').val());
            params.append('description ', $('#description').val());
            params.append('created_by ', user_id);
            console.log(base_url + 'product/add');
            $.ajax({
                url: base_url + 'product/add',
                type: 'post',
                data: params,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status == "success") {
                        console.log(response.data);

                        //hideLoader();
                    } else {
                        console.log(response.data);
                        //hideLoader();
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
        success: function(response) {
            var option = '<option value="">Select Category</option>';
            if (response.status == "success") {
                $.each(response.data, function(key, value) {
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
        data: { id: category_id },
        success: function(response) {
            if (response.status == "success") {
                if (response.data) {
                    var data = response.data;
                    var option = '<option value="">Select Subcategory</option>';
                    $.each(data, function(key, value) {
                        option += '<option value="' + value.id + '">' + value.name + '</option>';

                    });
                    $('#subcategory_div').css('display', 'block');
                    $('#subcategory').html(option);
                }

            }

        }
    });
} //endsubcategorylist