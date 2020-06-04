$(document).ready(function () {
    $(document).on('change', '#sub_categories', function (e) {
        e.preventDefault();
        var sub_category_id = $(this).val();
        getProductsList(sub_category_id);
    });
});

getCategoryList();
getProductsList('');
//get categories
function getCategoryList() {
    $('.sub-category').css('display', 'none');
    $.ajax({
        url: base_url + 'category-list2',
        type: 'post',
        data: {},
        success: function (response) {
            var category = '<option value="">Select Category</option>';
            if (response.status == "success") {
                $.each(response.data, function (key, value) {
                    category += ' <option id="category_' + value.id + '" value="' + value.id + '">' + value.name + '</option>';
                });
                $('#sub_categories').html(category)
            }
        }
    });
} //end function category list

function getProductsList(sub_category_id) {
    var url = base_url + 'category/products';
    $.ajax({
        url: url,
        type: 'post',
        dataType: 'json',
        data: { category_id: 1, sub_category_id: sub_category_id },
        success: function (response) {
            console.log(response);
            if (response.status == "success") {
                var products = '';
                if (response.data.length > 0) {
                    $.each(response.data, function (key, value) {
                        image_name = '';
                        if (value.image.length > 0) {
                            image_name = media_url + 'product_images/' + value.image[0].file_name;
                        }
                        else {
                            image_name = media_url + 'project_photo/no_image.jpg';
                        }
                        products += '<li>\n\
                                        <div class="product_info">\n\
                                        <a href="product-details.php?pid='+value.id+'">\n\
                                            <img src="'+image_name+'" alt="'+image_name+'" />\n\
                                            </a>\n\
                                             <!--div class="info_hover"><a href="javascript:void(0);">Add to cart</a></div-->\n\
                                        </div>\n\
                                        <div class="title">' + value.name + '</div>\n\
                                        <div class="product_code">Product Code: ' + value.sku + '</div>\n\
                                        <div class="price">\n\
                                            <span class="old">' + value.market_price + '</span>\n\
                                            <span class="new">' + value.dealer_price + '</span>\n\
                                        </div>\n\
                                    </li>';
                    });
                    $('#product_list').html(products);
                } else {
                    $('#product_list').html('');
                    showSwal('error', 'No Products Available', response.data);
                }
            } else {
                $('#product_list').html('');
                showSwal('error', 'No Products Available', response.data);
            }

        }
    });

}