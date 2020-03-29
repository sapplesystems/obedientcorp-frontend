$(document).ready(function () {
    $(document).on('change', '#categories', function (e) {
        e.preventDefault();
        var category_id = $(this).val();
        if (category_id != '') {
            getSubCategoryList(category_id);
        } else {
            $('#sub_categories').css('display', 'none');
            getGoodsProducts();
        }
    });
    $(document).on('change', '#sub_categories', function (e) {
        e.preventDefault();
        var sub_category_id = $(this).val();
        if (sub_category_id != '') {
            getProductsList(sub_category_id);
        }
    });
});

getCategoryList();
getGoodsProducts();
//get categories
function getCategoryList() {
    $('.sub-category').css('display', 'none');
    $.ajax({
        url: 'http://demos.sappleserve.com/obedient_api/public/api/categories ',
        type: 'post',
        data: {},
        success: function (response) {
            var category = '<option value="">Select Category</option>';
            if (response.status == "success") {
                $.each(response.data, function (key, value) {
                    category += ' <option id="category_' + value.id + '" value="' + value.id + '">' + value.name + '</option>';
                });
                $('#categories').html(category)
            }
        }
    });
} //end function category list

function getSubCategoryList(category_id) {

    var url = 'http://demos.sappleserve.com/obedient_api/public/api/sub-category';
    $.ajax({
        url: url,
        type: 'post',
        dataType: 'json',
        data: {id: category_id},
        success: function (response) {
            if (response.status == "success") {
                if (response.data.length > 0) {
                    var data = response.data;
                    var sub_category = '<option value="">Select Sub-Category</option>';
                    $.each(data, function (key, value) {
                        sub_category += '<option id="category_' + value.id + '" value="' + value.id + '">' + value.name + '</option>';

                    });
                    $('#sub_categories').css('display', 'block');
                    $('#sub_categories').html(sub_category);
                }
                else {
                    $('#sub_categories').css('display', 'none');

                    getProductsList(category_id);
                }

            }

        }
    });
} //endsubcategorylist

function getProductsList(id) {
    var url = 'http://demos.sappleserve.com/obedient_api/public/api/category/products';
    $.ajax({
        url: url,
        type: 'post',
        dataType: 'json',
        data: {id: id},
        success: function (response) {
            if (response.status == "success") {
                var products = '';
                if (response.data.length > 0) {
                    $.each(response.data, function (key, value) {
                        products += '<li>\n\
                                        <div class="product_info">\n\
                                            <img src="http://demos.sappleserve.com/obedient_api/public/uploads/product_images/' + value.image[0].file_name + '"" alt="' + value.image[0].file_name + '" />\n\
                                             <div class="info_hover"><a href="javascript:void(0);">Add to cart</a></div>\n\
                                        </div>\n\
                                        <div class="title">' + value.name + '</div>\n\
                                        <div class="price">\n\
                                            <span class="old">' + value.market_price + '</span>\n\
                                            <span class="new">' + value.dealer_price + '</span>\n\
                                        </div>\n\
                                    </li>';
                    });
                    $('#product_list').html(products);
                } else {
                    $('#product_list').html('No Products Available');
                }
            } else {
                $('#product_list').html(response.data);
            }

        }
    });

}


function getGoodsProducts() {
    $.ajax({
        url: 'http://demos.sappleserve.com/obedient_api/public/api/dashboard-products-goods',
        type: 'post',
        success: function (response) {
            if (response.status == "success") {
                var products = '';
                var image_name;
                $.each(response.data, function (key, value) {
                    image_name = '';
                    if (value.images[0]) {
                        image_name = value.images[0].file_name;
                    }
                    products += '<li>\n\
                                        <div class="product_info">\n\
                                            <img src="http://demos.sappleserve.com/obedient_api/public/uploads/product_images/' + image_name + '"" alt="' + image_name + '" />\n\
                                             <div class="info_hover"><a href="javascript:void(0);">Add to cart</a></div>\n\
                                        </div>\n\
                                        <div class="title">' + value.name + '</div>\n\
                                        <div class="price">\n\
                                            <span class="old">' + value.market_price + '</span>\n\
                                            <span class="new">' + value.dealer_price + '</span>\n\
                                        </div>\n\
                                    </li>';
                });
                $('#product_list').html(products);
            } else {
                $('#product_list').html('No Products Available');
            }
        }
    });
}