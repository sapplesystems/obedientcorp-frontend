//getProducts();
get_homepage_images();
function getProducts() {
    getSubCategories();
    getRealStateProducts();
}


function getSubCategories() {
    $.ajax({
        url: base_url + 'category-and-products',
        type: 'post',
        data: {id: 1},
        success: function (response) {
            if (response.status == "success") {
                $('.sub_cat').append(response.data.li_tab_html);
                $('.dynamic_tab').append(response.data.div_product_html);
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
                                            <h4><strong>' + value.name + '</strong></h4>\n\
                                                <p>' + value.description + '.</p>\n\
                                            </div>';
                    });
                });
                $('#real-state').append(real_product);
            }
        }
    });
}

function get_homepage_images() {
    $.ajax({
        url: base_url + 'home-page-detail',
        type: 'post',
        async: false,
        success: function (response) {
            console.log(response);
            if (response.status == "success") {
                $('#real_estate_locations').attr('data-source', response.data.real_estate_locations);
                $('#consumer_goods_products').attr('data-source', response.data.consumer_goods_products);
                $('#total_members').attr('data-source', response.data.total_members);
                if (response.data.landing_image) {
                    var landing_path = media_url + 'landing_image/' + response.data.landing_image;
                    $('#uploded_image').attr('src', landing_path);
                    $('#uploded_image').css('display', 'block');
                } else {
                    $('#uploded_image').attr('src', 'images/pre.jpg');
                    $('#uploded_image').css('display', 'block');
                }
                if (response.data.home_product_ad) {
                    var path = media_url + 'home_product_ad/' + response.data.home_product_ad;
                    $('.right-image').attr('data-background', path);
                    $('.right-image').css('background-image', 'url(' + path + ')');
                }
                if (response.data.sliders.length > 0)
                {
                    $.each(response.data.sliders, function (key, value)
                    {
                        var id = value.id;
                        $('#slider_image_' + id + ' .defaultimg').css('background-image', 'url(' + media_url + 'sliding_image/' + value.slider_image + ')');
                        $('#slider_image_' + id + ' .defaultimg').attr('src', media_url + 'sliding_image/' + value.slider_image);
                        $('#slider_title_' + id).html(value.slider_title);
                        $('#slider_sub_title_' + id).html(value.slider_sub_title);
                    });
                }
                $('#project_product_slider').html(response.data.project_product_slider);
            } else {
                console.log("Not any image");
            }
        }
    });

}


/*$(document).ready(function () {
 
 $(document).on('click', '.sub-category', function (e) {
 var sub_cat_id = $(this).attr("data-id");
 $.ajax({
 url: base_url + 'all-products-goods',
 type: 'post',
 data: {sub_category_id: sub_cat_id},
 success: function (response) {
 console.log(response);
 var goods_products = '<button type="button" data-role="none" class="slick-prev slick-arrow" role="button" style=""></button>';
 var image_name = '';
 if (response.status == "success") {
 //goods_products+=' <div aria-live="polite" class="slick-list draggable">';
 //goods_products+=' <div class="slick-track" style="opacity: 1; width: 4230px; transform: translate3d(-2350px, 0px, 0px);" role="listbox">';
 $.each(response.data, function (key, val) {
 
 if (val.images.length > 0)
 {
 image_name = media_url + 'product_images/' + val.images[0].file_name;
 }
 else
 {
 image_name = media_url + 'project_photo/no_image.jpg';
 }
 goods_products += '<div class="gap-10 slick-slide slick-cloned" data-slick-index="-3" aria-hidden="true" style="width: 235px;" tabindex="-1"><img src="' + image_name + '" alt="">\n\
 <h4><strong>' + val.name + '</strong></h4>\n\
 <p>' + val.description + '.</p>\n\
 </div>';
 
 });
 //goods_products+='</div></div>';
 goods_products += ' <button type="button" data-role="none" class="slick-next slick-arrow" role="button" style=""></button>';
 console.log(goods_products);
 $('#product_' + sub_cat_id).append(goods_products);
 //$('#product_'+sub_cat_id+'.draggable').childern().append(goods_products);
 }
 }
 });
 
 });
 });*/