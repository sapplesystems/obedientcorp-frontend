getProducts();

function getProducts() {
    getGoodsProducts();
    getRealStateProducts();
}


function getGoodsProducts() {
    $.ajax({
        url: base_url + 'dashboard-products-goods',
        type: 'post',
        success: function (response) {
            if (response.status == "success") {
                var goods_products = '';
                var image_name = '';
                var active_class = 'cbp-slider-item--active';
                $.each(response.data, function (key, val) {
                    if (val.images[0])
                    {
                        image_name = val.images[0].file_name;
                    }
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
                                                            <a href="' + media_url + 'product_images/' + image_name + '" class="lightbox_item" data-title="Festival Time">\n\
                                                                <img src="' + media_url + 'product_images/' + image_name + '" alt="">\n\
                                                            </a>\n\
                                                        </div>\n\
                                                    </div>\n\
                                                </div>\n\
                                                <a href="#" class="cbp-l-grid-masonry-projects-title" rel="nofollow">' + val.name + '</a>\n\
                                                <div class="cbp-l-grid-masonry-projects-desc">' + val.description + '</div>\n\
                                            </div>';

                });
                $('.cbp-wrapper').append(goods_products);
            }
        }
    });
}
function getRealStateProducts() {
    $.ajax({
        url: base_url + 'dashboard-products-real-state',
        type: 'post',
        success: function (response) {
            var real_product = '';
            if (response.status == "success") {
                $.each(response, function (key, val) {
                    $.each(val.data, function (key1, value) {
                        var project_photo = media_url + 'project_photo/no_image.jpg';
                        if(value.photo != ''){
                            project_photo = media_url + 'project_photo/' + value.photo;
                        }
                        real_product += '<div class="item cbp-item coding" id="real_' + value.id + '">\n\
                                            <div class="cbp-caption">\n\
                                                <div class="cbp-caption-defaultWrap">\n\
                                                    <img src="' + project_photo + '" alt="Works image" style="width: 100%;">\n\
                                                </div>\n\
                                                <div class="cbp-caption-activeWrap">\n\
                                                    <div class="cbp-l-caption-alignCenter">\n\
                                                        <div class="cbp-l-caption-body">\n\
                                                            <a href="#" class="works-link" target="_blank"><i class="fa fa-external-link-square"></i></a>\n\
                                                            <a href="' + project_photo + '" class="works-link lightbox_item" data-title="Beautiful girl in train station">\n\
                                                                <i class="fa fa-expand"></i>\n\
                                                                <img src="' + project_photo + '" alt="" class="none">\n\
                                                            </a>\n\
                                                            <a href="#" class="works-link external-link"><i class="fa fa-plus"></i></a>\n\
                                                        </div>\n\
                                                    </div>\n\
                                                </div>\n\
                                            </div>\n\
                                            <a href="#" class="cbp-l-grid-masonry-projects-title" rel="nofollow">' + value.name + '</a>\n\
                                            <div class="cbp-l-grid-masonry-projects-desc" style="height:40px; line-height:40px;">' + value.description + '</div>\n\
                                        </div>';
                    });
                });
                $('.cbp-wrapper').append(real_product);
            }
        }
    });
}