getCategoryList();
getProductList();
bvListing();
var today = new Date();
var todays_date = today.getDate() + '-' + (today.getMonth() + 1) + '-' + today.getFullYear();
$(document).ready(function () {
    if (document.getElementById('description')) {
        tinymce.init({
            selector: '#description',
            width: '100%',
            height: 300,
            plugins: 'image code',
            browser_spellcheck: true,
            menu: {
                file: {
                    title: 'File',
                    items: 'newdocument restoredraft | preview | print'
                },
                edit: {
                    title: 'Edit',
                    items: 'undo redo | cut copy paste | selectall | searchreplace'
                },
                view: {
                    title: 'View',
                    items: 'code | visualaid visualchars visualblocks | preview fullscreen'
                },
                insert: {
                    title: 'Insert',
                    items: 'image link media template codesample inserttable | charmap emoticons hr | pagebreak nonbreaking anchor toc | insertdatetime'
                },
                format: {
                    title: 'Format',
                    items: 'bold italic underline strikethrough superscript subscript codeformat | formats blockformats fontformats fontsizes align | forecolor backcolor | removeformat'
                },
                tools: {
                    title: 'Tools',
                    items: 'code wordcount'
                },
                table: {
                    title: 'Table',
                    items: 'inserttable | cell row column | tableprops deletetable'
                },
                help: {
                    title: 'Help', items: 'help'
                }
            },
            branding: false,
            mobile: {
                menubar: true
            },
            // upload image functionality
            images_upload_url: 'upload.php',
            images_upload_handler: function (blobInfo, success, failure) {
                var xhr, formData;
                xhr = new XMLHttpRequest();
                xhr.withCredentials = false;
                xhr.open('POST', 'upload.php');
                xhr.onload = function () {
                    var json;
                    if (xhr.status != 200) {
                        failure('HTTP Error: ' + xhr.status);
                        return;
                    }
                    json = JSON.parse(xhr.responseText);
                    if (!json || typeof json.location != 'string') {
                        failure('Invalid JSON: ' + xhr.responseText);
                        return;
                    }
                    success(json.location);
                };
                formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());
                xhr.send(formData);
            },
        });
    }

    if ($('#product_id').val() && $('#product_id').val() != '') {
        editProduct($('#product_id').val());
    }

    $('#product_images').imageUploader();
    $('#product_docs').imageUploader();

    $(document).on('change', '#categories', function () {
        $('#subcategory_div').css('display', 'none');
        $('#subcategory').html('');
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
            var params = new FormData();
            var image_file = document.getElementById('product_images');
            var doc_file = document.getElementById('product_docs');
            var totalfiles = image_file.children[0].children[0].files.length;
            if ($('#product_id').val() == '' && totalfiles == 0)
            {
                showSwal('error', 'Upload Product Image', 'Please upload product image first.');
                return false;
            }
            var docfiles = doc_file.children[0].children[0].files.length;
            for (var index = 0; index < totalfiles; index++) {
                params.append("image[]", image_file.children[0].children[0].files[index]);
            }
            for (var index = 0; index < docfiles; index++) {
                params.append("document[]", doc_file.children[0].children[0].files[index]);
            }
            var category_id = $('#categories').val();
            var sub_category_id = 0;
            if ($('#subcategory').val()) {
                sub_category_id = $('#subcategory').val();
            }
            params.append('category_id', category_id);
            params.append('sub_category_id', sub_category_id);
            params.append('name', $('#title').val());
            params.append('dealer_price', $('#dealer_price').val());
            params.append('market_price', $('#market_price').val());
            params.append('bar_code', $('#bar_code').val());
            params.append('sku', $('#sku').val());
            params.append('contents', $('#contents').val());
            params.append('expiry_date', $('#expiry_date').val());
            params.append('quantity', $('#quantity').val());
            //params.append('short_description', $('#nomineesname').val());
            params.append('description', $('#description').val());
            params.append('cgst', $('#cgst').val());
            params.append('sgst', $('#sgst').val());
            params.append('igst', $('#igst').val());
            params.append('bv_type', $('#bv_type').val());
            params.append('created_by', user_id);

            var url = base_url + 'product/add';
            if ($('#product_id').val()) {
                url = base_url + 'product/update';
                params.append('updated_by', user_id);
                params.append('id', $('#product_id').val());
            }
            showLoader();
            $.ajax({
                url: url,
                type: 'post',
                data: params,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.status == "success") {
                        showSwal('success', 'Product Added', 'Product added successfully.');
                        window.location.href = 'product-list';
                        hideLoader();
                        //getProductList();
                        if ($('#product_id').val() == '')
                        {
                            resetForm();
                            setTimeout(function () {
                                window.location.href = 'product-list';
                            }, 2000);

                        }

                    } else {
                        showSwal('error', 'Failed', 'Product could not be added.');
                        hideLoader();
                        if ($('#product_id').val() == '')
                        {
                            resetForm();

                        }
                    }
                }
            });
        }

    });
    
    /*$(document).on('blur', '#cgst', function () {
        $('#igst').val(0);
        $('#sgst').val($(this).val());
    });
    $(document).on('blur', '#sgst', function () {
        $('#igst').val(0);
        $('#cgst').val($(this).val());
    });
    $(document).on('blur', '#igst', function () {
        $('#cgst').val(0);
        $('#sgst').val(0);
    });*/

    $(document).on('blur', '#igst', function () {
        var igst = Number($(this).val());
        var half = igst/2;
        $('#cgst').val(half);
        $('#sgst').val(half);
    });
}); //end document ready

function getCategoryList() {
    $.ajax({
        url: base_url + 'category-list',
        type: 'post',
        async: false,
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
        async: false,
        data: {id: category_id},
        success: function (response) {
            if (response.status == "success") {
                if (response.data) {
                    var data = response.data;
                    if (data.length > 0) {
                        var option = '<option value="">Select Subcategory</option>';
                        $.each(data, function (key, value) {
                            option += '<option value="' + value.id + '">' + value.name + '</option>';

                        });
                        $('#subcategory_div').css('display', 'block');
                        $('#subcategory').html(option);
                    }
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
            console.log(response);
            if (response.status == "success") {
                if (response.data) {
                    var data = response.data;
                    var tbody = '';
                    var x = 1;
                    $.each(data, function (key, val) {
                        tbody += '<tr id="prod_tr_' + val.id + '">\n\
                                        <td>' + x + '</td>\n\
                                        <td>' + val.name + '</td>\n\
                                        <td>' + val.category_name + '</td>\n\
                                        <td>' + val.sub_category_name + '</td>\n\
                                        <td>' + val.sku + '</td>\n\
                                        <td>\n\
                                            <a href="create-product.php?pid=' + val.id + '"<i class="mdi mdi-pencil text-info"></i></a> &nbsp \n\
                                            <i class="mdi mdi-delete text-danger" onclick="deleteProduct(event, ' + val.id + ');"></i>\n\
                                        </td>\n\
                                    </tr>';
                        x++;
                    });
                    $('#product_list').html(tbody);
                    initDataTable();
                }

            }

        }
    });
}

function deleteProduct(e, product_id) {
    var url = base_url + 'product/delete';
    var result = confirm("Are you sure you want to delete this product?");
    if (result == true) {
        showLoader();
        $.ajax({
            url: url,
            type: 'post',
            data: {id: product_id},
            success: function (response) {
                if (response.status == "success") {
                    showSwal('success', 'Product Removed', 'Product removed successfully.');
                    getProductList();
                    hideLoader();
                } else {
                    showSwal('error', 'Failed', 'Product couold not be removed.');
                    hideLoader();
                }
            }
        });
    }

}

function editProduct(product_id) {
    showLoader();
    var url = base_url + 'product';
    $.ajax({
        url: url,
        type: 'post',
        data: {id: product_id},
        success: function (response) {
            if (response.status == "success") {
                var product = response.data;
                var attachment = product.images;
                var attachment_length = attachment.length;
                var img = '';
                var doc = '';
                if (attachment_length) {
                    var img_index = 0;
                    var doc_index = 0;
                    for (var i = 0; i < attachment_length; i++) {
                        if (attachment[i].file_type == 'image') {
                            img += '<div class="uploaded-image" id="attachment_' + attachment[i].id + '">\n\
                                        <img src="' + media_url + 'product_images/' + attachment[i].file_name + '">\n\
                                        <button class="delete-image" onclick="deleteProductAttachment(' + attachment[i].id + ');">\n\
                                            <i class="mdi mdi-close-circle icon_cancel"></i>\n\
                                        </button>\n\
                                    </div>';
                            img_index++;
                            $('.input-images-1 .upload-text').css('display', 'none');
                        }
                        if (attachment[i].file_type == 'file') {
                            doc += '<div class="uploaded-image" id="attachment_' + attachment[i].id + '">\n\
                                        <img src="' + media_url + 'product_images/' + attachment[i].file_name + '">\n\
                                        <button class="delete-image" onclick="deleteProductAttachment(' + attachment[i].id + ');">\n\
                                            <i class="mdi mdi-close-circle icon_cancel"></i>\n\
                                        </button>\n\
                                    </div>';
                            doc_index++;
                            $('.input-images-2 .upload-text').css('display', 'none');
                        }
                    }
                }
                $('#product_id').val(product_id);
                $('#categories').val(product.category_id);

                if (product.sub_category_id && product.sub_category_id != '') {
                    getSubCategoryList(product.category_id);
                    $('#subcategory_div').css('display', '');
                    $('#subcategory').val(product.sub_category_id);
                }

                $('#title').val(product.name);
                $('#dealer_price').val(product.dealer_price);
                $('#market_price').val(product.market_price);
                $('#bar_code').val(product.bar_code);
                $('#sku').val(product.sku);
                $('#contents').val(product.contents);
                $('#expiry_date').val(product.expiry_date);
                //$('#description').val(product.description);
                setTimeout(function () {
                    tinymce.get('description').setContent(product.description);
                }, 2000);
                $('#cgst').val(product.cgst);
                $('#sgst').val(product.sgst);
                $('#igst').val(product.igst);
                $('#bv_type').val(product.bv_type);
                $('#updated_by').val(user_id);
                $('.input-images-1 .uploaded').html(img);
                $('.input-images-2 .uploaded').html(doc);
                hideLoader();
            } else {
                hideLoader();
            }
        }
    });
}

function deleteProductAttachment(attachment_id) {
    showLoader();
    var url = base_url + 'product/image/delete';
    $.ajax({
        url: url,
        type: 'post',
        data: {id: attachment_id},
        success: function (response) {
            if (response.status == "success") {
                $('#attachment_' + attachment_id).remove();
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
    $('#categories').val('');
    $('#subcategory_div').css('display', 'none');
    $('#subcategory').html('');
    $(".uploaded").children(".uploaded-image").remove();
}

function bvListing() {
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
                    list += '<option value="' + val.name + '">' + val.name + '</option>';
                });
                $('#bv_type').html(list);
            }

        }
    });
}