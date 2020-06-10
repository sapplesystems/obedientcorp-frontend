var cubeportfolio_flag = 0;
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
        data: {category_id: 1, sub_category_id: sub_category_id},
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
                                        <a href="#" onclick="openProductDetail(event, ' + value.id + ');">\n\
                                            <img src="' + image_name + '" alt="' + image_name + '" />\n\
                                        </a>\n\
                                             <!--div class="info_hover"><a href="javascript:void(0);">Add to cart</a></div-->\n\
                                        </div>\n\
                                        <div class="title">' + value.name + '</div>\n\
                                        <div class="product_code">Product Code: ' + value.sku + '</div>\n\
                                        <div class="price">\n\
                                            <span class="old">' + value.market_price + '</span>\n\
                                            <span class="new">' + value.dealer_price + '</span>\n\
                                        </div>\n\
                                    </li>'; // product-details.php?pid='+value.id+'
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

function openProductDetail(e, product_id) {
    e.preventDefault();
    var url = base_url + 'product';
    $.ajax({
        url: url,
        type: 'post',
        data: {id: product_id},
        success: function (response) {
            if (response.status == "success")
            {
                var pro_html = '';
                var pro_slider = '';
                if (response.data.description)
                {
                    $('#description').html(response.data.description);
                }
                if (response.data.contents)
                {
                    $('#contents').html(response.data.contents);
                }
                if (response.data.sku)
                {
                    $('#sku-code').html(response.data.sku);
                }
                if (response.data.market_price)
                {
                    $('#price').html(response.data.market_price);
                }
                if (response.data.name)
                {
                    $('#product-name').html(response.data.name);
                }
                $.each(response.data.images, function (key, value) {
                    pro_html += '<div class="cbp-item">\n\
                        <a href="' + media_url + 'product_images/' + value.file_name + '" class="cbp-caption slow">\n\
                            <!-- Mark -->\n\
                            <div class="cbp-caption-defaultWrap">\n\
                                <img src="' + media_url + 'product_images/' + value.file_name + '" alt="">\n\
                            </div>\n\
                        </a>\n\
                    </div>';
                    pro_slider += '<div class="cbp-pagination-item ">\n\
                        <img src="' + media_url + 'product_images/' + value.file_name + '" alt="">\n\
                    </div>';

                });
                $('.pro_list').html(pro_html);
                $('.project_lst').html(pro_slider);
                if (cubeportfolio_flag == 0) {
                    cubeportfolio_flag = 1;
                    setProductDetailSlider();
                }
                $('#product_detail_modal').modal();
            }
        }
    });
}

function setProductDetailSlider() {
    $('#images').cubeportfolio({
        layoutMode: 'slider',
        drag: true,
        auto: false,
        autoTimeout: 5000,
        autoPauseOnHover: true,
        showNavigation: false,
        showPagination: false,
        rewindNav: true,
        scrollByPage: true,
        gridAdjustment: 'responsive',
        mediaQueries: [{
                width: 0,
                cols: 1,
            }],
        gapHorizontal: 0,
        gapVertical: 0,
        caption: '',
        displayType: 'fadeIn',
        displayTypeSpeed: 400,
        plugins: {
            slider: {
                pagination: '#thumbnails',
                paginationClass: 'cbp-pagination-active',
            }
        },
    });

    $('#recents').cubeportfolio({
        layoutMode: 'slider',
        drag: true,
        auto: false,
        autoTimeout: 5000,
        autoPauseOnHover: true,
        showNavigation: false,
        showPagination: true,
        rewindNav: false,
        scrollByPage: false,
        gridAdjustment: 'responsive',
        mediaQueries: [{
                width: 1500,
                cols: 5,
            }, {
                width: 1100,
                cols: 4,
            }, {
                width: 700,
                cols: 3,
            }, {
                width: 480,
                cols: 2,
            }, {
                width: 360,
                cols: 1,
                options: {
                    caption: '',
                    gapVertical: 10,
                }
            }],
        gapHorizontal: 0,
        gapVertical: 25,
        caption: '',
        displayType: 'fadeIn',
        displayTypeSpeed: 40,
    });
}