


getCategoryList();

$(document).ready(function () {



});
//get categories
function getCategoryList() {
    $('.sub-category').css('display', 'none');
    $.ajax({
        url: 'http://demos.sappleserve.com/obedient_api/public/api/categories ',
        type: 'post',
        data: {},
        success: function (response) {
            var category = '';
            if (response.status == "success") {
                $.each(response.data, function (key, value) {
                    category += ' <li class="cbp-filter-item-active cbp-filter-item" id="category_' + value.id + '" onclick="getSubCategoryList(' + value.id + ');"><div class="link">' + value.name + '</div></li>';
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
        data: { id: category_id },
        success: function (response) {
            if (response.status == "success") {
                if (response.data.length > 0) {
                    var data = response.data;
                    var sub_category = ' ';
                    $.each(data, function (key, value) {
                        sub_category += '<li class="cbp-filter-item-active cbp-filter-item" id="category_' + value.id + '" onclick="getProductsList(' + value.id + ');"><div class="link">' + value.name + '</div></li>';

                    });
                    $('.sub-category').css('display', 'block');
                    $('#subcategory').html(sub_category);
                }
                else {
                    $('.sub-category').css('display', 'none');

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
        data: { id: id },
        success: function (response) {
            console.log(response);
            if (response.status == "success") {
                var products = '';
                if (response.data.length > 0) {
                    console.log(response.data);
                    $.each(response.data, function (key, value) {
                        products += ' <div class="cbp-item item  filter-gray filter-black">\n\
                        <!-- Mark -->\n\
                        <div class="basic-mark to-left bold uppercase font-10 radius bg-danger white">Available!</div>\n\
                        <a href="shop-single.html" class="cbp-caption">\n\
                            <div class="cbp-caption-defaultWrap product-image">\n\
                                <img src="http://demos.sappleserve.com/obedient_api/public/uploads/product_images/'+value.image[0].file_name+'" alt="">\n\
                            </div>\n\
                            <div class="cbp-caption-activeWrap details">\n\
                                <div class="title">'+ value.name + '</div>\n\
                                <div class="price">\n\
                                    <span class="old">'+ value.market_price + '</span>\n\
                                    <span class="new">'+ value.dealer_price + '</span>\n\
                                </div>\n\
                                <a href="#" class="add-to-cart"><i class="fa fa-shopping-cart"></i>Add To Cart</a>\n\
                            </div>\n\
                        </a>\n\
                    </div>';
                    });
                    //products+='</div></div>';
                    $('.products').html(products);
                    $('#products').cubeportfolio({
                        filters: '#filter1, #filter2',
                        loadMoreAction: 'click',
                        layoutMode: 'grid',
                        mediaQueries: [{
                            width: 920,
                            cols: 4,
                        }, {
                            width: 800,
                            cols: 3,
                        }, {
                            width: 480,
                            cols: 2,
                        }, {
                            width: 320,
                            cols: 1,
                            options: {
                                caption: '',
                            }
                        }],
                        defaultFilter: '*',
                        animationType: 'rotateSides',
                        gapHorizontal: 10,
                        gapVertical: 10,
                        gridAdjustment: 'responsive',
                        caption: '',
                        displayType: 'sequentially',
                        displayTypeSpeed: 100,

                        // lightbox
                        lightboxDelegate: '.cbp-lightbox',
                        lightboxGallery: true,
                        lightboxTitleSrc: 'data-title',
                        lightboxCounter: '<div class="cbp-popup-lightbox-counter">{{current}} of {{total}}</div>',

                        // singlePageInline
                        singlePageInlineDelegate: '.cbp-singlePageInline',
                        singlePageInlinePosition: 'top',
                        singlePageInlineInFocus: true,
                        /* singlePageInlineCallback: function(url, element) {
                             // to update singlePageInline content use the following method: this.updateSinglePageInline(yourContent)
                             var t = this;
             
                             $.ajax({
                                     url: url,
                                     type: 'GET',
                                     dataType: 'html',
                                     timeout: 30000
                                 })
                                 .done(function(result) {
             
                                     t.updateSinglePageInline(result);
             
                                 })
                                 .fail(function() {
                                     t.updateSinglePageInline('AJAX Error! Please refresh the page!');
                                 });
                         },*/
                    });
                }
                else {
                    console.log("")
                    $('.products').html('No Products Available');
                }
            }
            else
            {
                console.log("response.data");
                $('.products').html(response.data);
            }

        }
    });

}
