get_all_products();

$(document).ready(function () {

});

function get_all_products() {
    get_all_goods_products();
    get_all_real_state_products();
}


function get_all_goods_products() {
    $.ajax({
        url: 'http://demos.sappleserve.com/obedient_api/public/api/dashboard-products-goods',
        type: 'post',
        success: function (response) {
            if (response.status == "success") {
                var goods_products = '';
                var active_class = 'cbp-slider-item--active';
                $.each(response.data, function (key, val) {
                    /*var product_images = '';
                    if (val.images.length && val.images.length > 0) {
                        for (var x = 0; x < val.images.length; x++) {
                            if (val.images[x].file_type == 'image') {
                                product_images += '<div class="cbp-slider-item ' + active_class + '">\n\
                                                            <a href="images/works_04_b.jpg" class="lightbox_item" data-title="Festival Time">\n\
                                                                <img src="images/03.jpg" alt="">\n\
                                                            </a>\n\
                                                        </div>';
                                active_class = '';
                            }
                        }
                    }*/
                    goods_products += '<div class="item cbp-item design">\n\
                                                <div class="cbp-slider-inline">\n\
                                                    <div class="cbp-slider-wrapper">\n\
                                                        <div class="cbp-slider-item cbp-slider-item--active">\n\
                                                            <a href="images/works_04_b.jpg" class="lightbox_item" data-title="Festival Time">\n\
                                                                <img src="images/03.jpg" alt="">\n\
                                                            </a>\n\
                                                        </div>\n\
                                                    </div>\n\
                                                </div>\n\
                                                <a href="https://themeforest.net/item/quadra-creative-multipurpose-template/21409528" class="cbp-l-grid-masonry-projects-title" rel="nofollow">\n\
                                                    Product 4\n\
                                                </a>\n\
                                                <div class="cbp-l-grid-masonry-projects-desc">Healthcare</div>\n\
                                            </div>';

                });

                $('#good_products_div').html(goods_products);


            }
        }
    });
}
function get_all_real_state_products() {
    $.ajax({
        url: 'http://demos.sappleserve.com/obedient_api/public/api/dashboard-products-real-state',
        type: 'post',
        success: function (response) {
            var real_product = '';
            if (response.status == "success") {
                $.each(response, function (key, val) {
                    $.each(val.data, function (key1, value) {
                        real_product += '<div class="item cbp-item coding" id="real_' + value.id + '">\n\
                                            <div class="cbp-caption">\n\
                                                <div class="cbp-caption-defaultWrap">\n\
                                                    <!-- Image -->\n\
                                                    <img src="http://demos.sappleserve.com/obedient_api/public/uploads/project_photo/' + value.photo + '" alt="Works image">\n\
                                                </div>\n\
                                                <!-- Details area, visible when mouseover -->\n\
                                                <div class="cbp-caption-activeWrap">\n\
                                                    <div class="cbp-l-caption-alignCenter">\n\
                                                        <div class="cbp-l-caption-body">\n\
                                                            <a href="#" class="works-link" target="_blank"><i class="fa fa-external-link-square"></i></a>\n\
                                                            <a href="http://demos.sappleserve.com/obedient_api/public/uploads/project_photo/' + value.photo + '" class="works-link lightbox_item" data-title="Beautiful girl in train station">\n\
                                                                <i class="fa fa-expand"></i>\n\
                                                                <!-- This image for only gallery in lightbox - This is not visible -->\n\
                                                                <img src="http://demos.sappleserve.com/obedient_api/public/uploads/project_photo/' + value.photo + '" alt="" class="none">\n\
                                                            </a>\n\
                                                            <a href="#" class="works-link external-link"><i class="fa fa-plus"></i></a>\n\
                                                        </div>\n\
                                                    </div>\n\
                                                </div>\n\
                                            </div>\n\
                                            <!-- Titles and links -->\n\
                                            <a href="#" class="cbp-l-grid-masonry-projects-title" rel="nofollow">' + value.name + '</a>\n\
                                            <div class="cbp-l-grid-masonry-projects-desc">realstate</div>\n\
                                        </div>';
                    });
                });
                $('#reat_state_products').html(real_product);

            }
        }
    });
}