getProducts();

function getProducts() {
    getSubCategories();
    getRealStateProducts();
}


function getSubCategories() {
    $.ajax({
        url: base_url + 'sub-category ',
        type: 'post',
        data: { id: 1 },
        success: function (response) {
            console.log(response);
            var sub_categories = '';
            var multi_tab = '';
            var json_string = JSON.stringify({"dots": false, "arrows": true, "fade": false, "draggable":true, "slidesToShow": 4, "slidesToScroll": 2});
            if (response.status == "success") {
                $.each(response.data, function (key, value) {
                    sub_categories += ' <li role="presentation"><a href="#sab_cat' + value.id + '" aria-controls="sab_cat' + value.id + '"" role="tab" data-toggle="tab" class="bg-colored border-colored white sub-category" data-id="' + value.id + '">' + value.name + '</a></li>';
                    multi_tab += '<div id="sab_cat' + value.id + '" role="tabpanel" class="tab-pane">\n\
                    <div class="tab-container">\n\
                       <div class="custom-slider container block-img qdr-controls c-grab" id="product_'+ value.id + '" data-slick='+json_string+'></div>\n\
                    </div>\n\
                </div>'
                });
                $('.dynamic_tab').append(multi_tab);
                $('.sub_cat').append(sub_categories);

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
                        if (value.photo != '') {
                            project_photo = media_url + 'project_photo/' + value.photo;
                        }
                        real_product += '<div class="gap-10"><img src="' + project_photo + '" alt="">\n\
                        <h4><strong>'+ value.name + '</strong></h4>\n\
                            <p>'+ value.description + '.</p>\n\
                        </div>';
                    });
                });
                $('#real-state').append(real_product);
            }
        }
    });
}
$(document).ready(function () {

    $(document).on('click', '.sub-category', function (e) {
        var sub_cat_id = $(this).attr("data-id");
        $.ajax({
            url: base_url + 'all-products-goods',
            type: 'post',
            data: { sub_category_id: sub_cat_id },
            success: function (response) {
                console.log(response);
                var goods_products = '<button type="button" data-role="none" class="slick-prev slick-arrow" role="button" style=""></button>';
                var image_name ='';
                if (response.status == "success") {
                    //goods_products+=' <div aria-live="polite" class="slick-list draggable">';
                    //goods_products+=' <div class="slick-track" style="opacity: 1; width: 4230px; transform: translate3d(-2350px, 0px, 0px);" role="listbox">';
                    $.each(response.data, function (key, val) {
                       
                        if (val.images.length > 0) 
                        {
                            image_name = media_url + 'product_images/' +val.images[0].file_name;
                        }
                        else
                        {
                            image_name = media_url + 'project_photo/no_image.jpg';
                        }
                        goods_products += '<div class="gap-10 slick-slide slick-cloned" data-slick-index="-3" aria-hidden="true" style="width: 235px;" tabindex="-1"><img src="' +image_name+ '" alt="">\n\
                        <h4><strong>'+ val.name + '</strong></h4>\n\
                            <p>'+ val.description + '.</p>\n\
                        </div>';

                    });
                    //goods_products+='</div></div>';
                    goods_products+=' <button type="button" data-role="none" class="slick-next slick-arrow" role="button" style=""></button>';
                    console.log(goods_products);
                    $('#product_'+sub_cat_id).append(goods_products);
                    //$('#product_'+sub_cat_id+'.draggable').childern().append(goods_products);
                }
            }
        });

    });
});