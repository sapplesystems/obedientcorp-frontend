<?php
include_once 'common_html.php';
include_once 'header_frontend.php';
?>


<?php echo $common['main_container_navigation']; ?>

<!-- Dotted Navigation -->
<?php echo $common['dotted_navigation']; ?>
<!-- End Dotted Navigation -->
<style>
    .bg_overlay_details{position:fixed; left:0; top:0; right:0; bottom:0; z-index:1; background-color:rgba(0,0,0,0.7);}
    .details_popup{max-width:1000px; width:100%; background-color:#ffffff; position:absolute; left:50%; top:50%; transform:translate(-50%, -50%); z-index:2; padding:15px;}
		.details_popup h2{padding-right: 50px;}
    .close_icon_popup{    opacity: 1;
                          display: block;
                          width: 40px;
                          height: 40px;
                          text-align: center;
                          border-radius: 100%;
                          position: absolute;
                          background-color: #d82950;
                          top: 15px;
                          right: 15px;
                          color: #ffffff;
                          z-index: 20;
                          line-height: 40px;
                          font-weight: 100;
                          font-size: 17px;
                          text-shadow: none; cursor:pointer; transition:0.4s;}
    .close_icon_popup:before{content: "\f00d";font: normal normal normal 17px/1 FontAwesome;
                             font-size: inherit;
                             text-rendering: auto;
                             -webkit-font-smoothing: antialiased;
                             -moz-osx-font-smoothing: grayscale;}
    .close_icon_popup:hover{ opacity: 0.6;}
</style>
<!-- Page Title -->
<section id="home" class="xl-py t-center white fullwidth">
    <!-- Background image - you can choose parallax ratio and offset -->
    <div class="bg-parallax skrollr" data-anchor-target="#home" data-0="transform:translate3d(0, 0px, 0px);" data-900="transform:translate3d(0px, 200px, 0px);" data-background="images/landing_image.jpg" style="background-position: center 89%;"></div>
</section>
<!-- End Page Title --> 
<!-- GALLERY -->
<section id="shop" class="sm-pt container t-left shop shop-styled minHeight200 py">
    <div class="t-center">
        <h1 class="extrabold-title">All Products</h1>
        <div class="title-strips-over dark"></div>
    </div>
    <!-- Filters -->
    <div class="row">
        <div class="col-sm-4">
            <select class="form-control" id="sub_categories">
                <option value="">Select Category</option>
            </select>
        </div>
        <div class="col-sm-4"></div>
    </div>
    <!-- Items -->
    <div class="row">
        <div class="col-sm-12">
            <ul class="product_list" id="product_list"></ul>
        </div>
    </div>
    <div class="clearfix"></div> 
</section>
<div class="clearfix"></div>

<div class="bg_overlay_details" id="product_detail_modal" style="display:none;">
    <div class="details_popup">
        <span class="close_icon_popup"></span>
        <div class="row">
            <div class="col-md-6 col-12 opacity-hover-links">
                <div id="images" class="cbp lightbox_gallery pro_list"></div>
                <div id="thumbnails" class="project_lst"></div>
            </div>
            <div class="col-md-6 col-12">
                <h2 class="light" id="product-name"></h2>
                <div class="xxs-mt">
                    <span class="h1 bold-title xxs-mr">&#8377;<span id="price"></span></span>
                    / Price
                </div>

                <div class="mt-3 clearfix">
                    <div>
                        <h5><span class="bold">Product Code:</span> <span id="sku-code"></span></h5>
                        <h5 class="mt-2"><span class="bold">Description:</span> <span id="contents"></span></h5>
                        <h5 class="mt-2"><span class="bold">Description:</span> <span id="description"></span></h5>
                    </div>
                </div> 				    
            </div>
        </div>
    </div>
</div>


<!-- Modal 1 -->
<!--<div class="modal middle-modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog container bg-white radius o-hidden maxWidth1000" role="document">
        <div class="modal-content">
            <div class="close fa fa-close" data-dismiss="modal"></div>
            <div class="modal-img col-md-6 col-12 opacity-hover-links">
                <div id="images" class="cbp lightbox_gallery pro_list"></div>
                <div id="thumbnails" class="project_lst"></div>
            </div>
            <div class="modal-details col-md-6 offset-md-6 col-12">
                <h2 class="light" id="product-name"></h2>
                <div class="xxs-mt">
                    <span class="h1 bold-title xxs-mr">&#8377;<span id="price"></span></span>
                    / Price
                </div>

                <div class="mt-3 clearfix">
                    <div>
                        <h5><span class="bold">Product Code:</span> <span id="sku-code"></span></h5>
                        <h5 class="mt-2"><span class="bold">Description:</span> <span id="contents"></span></h5>
                        <h5 class="mt-2"><span class="bold">Description:</span> <span id="description"></span></h5>
                    </div>
                </div> 				    
            </div>
        </div>
    </div>
</div>-->

<?php include_once 'footer_frontend.php'; ?>  
<!-- END FOOTER -->


<!-- SEARCH FORM FOR NAV -->
<?php echo $common['search_form']; ?>

<script type='text/javascript' src='js/jquery.js'></script>
<!-- jQuery -->
<script src="js/jquery.min.js?v=2.3"></script>
<!-- MAIN SCRIPTS - Classic scripts for all theme -->
<script src="js/scripts.js?v=2.3.1"></script>
<!-- END JS FILES -->
<script src="assets/javascript/our_products.js"></script>
<script type='text/javascript' src='js/site.js'></script>
<script>
    $(".close_icon_popup").click(function () {
        $("#product_detail_modal").hide();
    });
</script>

</body>
<!-- Body End -->

</html>