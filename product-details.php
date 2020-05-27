<?php
include_once 'common_html.php';
include_once 'header_frontend.php';
$product_id = '';
if(isset($_REQUEST['pid']))
{
    $product_id=$_REQUEST['pid'];
}
?>


<?php echo $common['main_container_navigation']; ?>

<!-- Dotted Navigation -->
<?php echo $common['dotted_navigation']; ?>
<!-- End Dotted Navigation -->
<!-- Page Title -->
<section id="home" class="xl-py t-center white fullwidth">
    <!-- Background image - you can choose parallax ratio and offset -->
    <div class="bg-parallax skrollr" data-anchor-target="#home" data-0="transform:translate3d(0, 0px, 0px);" data-900="transform:translate3d(0px, 200px, 0px);" data-background="images/landing_image.jpg" style="background-position: center 89%; height: 50vh;min-height: 100%;"></div>
</section>
<!-- End Page Title --> 
<!-- GALLERY -->


  <!-- CONTENT -->
    <section id="home" class="bg-gray pt-3 pb-3 bb-1 bt-1 border-gray solid dark2 fullwidth mt-4">
        <!-- Container -->
        <div class="container">
            <div class="row">
                <div class="t-left t-center-xs col-sm-12 col-xs-12">
                    <ol class="breadcrumb transparent no-pm mt-12 font-12 mt-0">
                        <li class="breadcrumb-item black-hover slow"><a href="index">Home</a></li>
						<li class="breadcrumb-item black-hover slow"><a href="products">Our Products</a></li>
                        <li class="breadcrumb-item c-default">Product</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- End Container -->
    </section>
    <!-- END CONTENT -->



    <!-- Product -->
    <section id="shop" class="sm-pb pt-5 container shop-single mb-5">

        <div class="row">

            <!-- Slider -->
            <div class="col-md-6 col-12 opacity-hover-links">
                <div id="images" class="cbp lightbox_gallery pro_list">
                    <div class="cbp-item">
                        <a href="images/01.jpg" class="cbp-caption slow">
                            <!-- Mark -->
                            <div class="cbp-caption-defaultWrap">
                                <img src="images/01.jpg" alt="">
                            </div>
                        </a>
                    </div>

                    <div class="cbp-item">
                        <a href="images/02.jpg" class="cbp-caption slow">
                            <!-- Mark -->
                            <div class="cbp-caption-defaultWrap">
                                <img src="images/02.jpg" alt="">
                            </div>
                        </a>
                    </div>
                    <div class="cbp-item">
                        <a href="images/03.jpg" class="cbp-caption slow">
                            <!-- Mark -->
                            <div class="cbp-caption-defaultWrap">
                                <img src="images/03.jpg" alt="">
                            </div>
                        </a>
                    </div>
                    <div class="cbp-item">
                        <a href="images/04.jpg" class="cbp-caption slow">
                            <!-- Mark -->
                            <div class="cbp-caption-defaultWrap">
                                <img src="images/04.jpg" alt="">
                            </div>
                        </a>
                    </div>
                </div>

                <div id="thumbnails">
                    <div class="cbp-pagination-item cbp-pagination-active">
                        <img src="images/01.jpg" alt="">
                    </div>
                    <div class="cbp-pagination-item">
                        <img src="images/02.jpg" alt="">
                    </div>
                    <div class="cbp-pagination-item">
                        <img src="images/03.jpg" alt="">
                    </div>
                    <div class="cbp-pagination-item">
                        <img src="images/04.jpg" alt="">
                    </div>
                </div>
            </div>

            <!-- Details -->
            <div class="col-md-6 col-12 details">
                <!-- Product Name -->
                <h2 class="light">Emulsion Moisturizing Cream with Almond & Vitamin E</h2>

                <!-- Price -->
                <div class="xxs-mt">
                    <span class="h1 bold-title xxs-mr">&#8377;2,399</span>
                     / Price
                </div>

                <div class="mt-3 clearfix">

                    <!-- Quantity of product -->

                    <div>
                        <h5><span class="bold">Product Code:</span> 016</h5>
                        <h5 class="mt-2"><span class="bold">Description:</span> Creative, electronic, computing, gray, macbook</h5>
                    </div>
                </div>
            </div>

        </div>

    </section>
    <!-- END Product -->

<div class="clearfix"></div>
<!-- END GALLERY -->
<!-- FOOTER -->
<?php include_once 'footer_frontend.php'; ?>  
<!-- END FOOTER -->
 

<!-- SEARCH FORM FOR NAV -->
<?php echo $common['search_form']; ?>

<script type='text/javascript' src='js/jquery.js'></script>
<script>
    var product_id = "<?php echo $product_id; ?>";
    if(product_id)
    {
        getProductList(product_id);
    }
function getProductList(product_id) {
    
    var url = base_url + 'product';
    $.ajax({
        url: url,
        type: 'post',
        data: {id: product_id},
        success: function (response) {
            console.log(response);
            if (response.status == "success") 
            {
                var pro_html='';
                var pro_slider='';
                $.each(response.data.images,function(key,value){
                    pro_html+='<div class="cbp-item">\n\
                        <a href="images/01.jpg" class="cbp-caption slow">\n\
                            <!-- Mark -->\n\
                            <div class="cbp-caption-defaultWrap">\n\
                                <img src="images/01.jpg" alt="">\n\
                            </div>\n\
                        </a>\n\
                    </div>';

                });
                //$('.pro_list').html(pro_html);
               
            } else {
                
            }
        }
    });
}
</script>

<!-- jQuery -->
<script src="js/jquery.min.js?v=2.3"></script>
<!-- MAIN SCRIPTS - Classic scripts for all theme -->
<script src="js/scripts.js?v=2.3.1"></script>
<!-- END JS FILES -->
<script src="assets/javascript/our_products.js"></script>
<script type='text/javascript' src='js/site.js'></script>

    <script type="text/javascript">
        (function($, window, document, undefined) {
            'use strict';

            // init cubeportfolio
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
        })(jQuery, window, document);
    </script>


</body>
<!-- Body End -->

</html>