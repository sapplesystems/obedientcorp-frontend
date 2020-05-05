<?php
include_once 'common_html.php';
include_once 'header_frontend.php';
?>


<?php echo $common['main_container_navigation']; ?>

<!-- Dotted Navigation -->
<?php echo $common['dotted_navigation']; ?>
<!-- End Dotted Navigation -->
<!-- Page Title -->
<section id="home" class="xl-py t-center white fullwidth">
    <!-- Background image - you can choose parallax ratio and offset -->
    <div class="bg-parallax skrollr" data-anchor-target="#home" data-0="transform:translate3d(0, 0px, 0px);" data-900="transform:translate3d(0px, 200px, 0px);" data-background="images/product-banner.jpg" style="background-position: center 19%;"></div>
</section>
<!-- End Page Title --> 
<!-- GALLERY -->
<section id="shop" class="sm-pt container t-left shop shop-styled minHeight200">
    <!-- Filters -->
    <div class="row">
        <div class="col-sm-4">
            <select class="form-control" id="categories">
                <option value="">Select Category</option>
            </select>
        </div>
        <div class="col-sm-4">
            <select id="sub_categories" class="form-control" style="display: none;">
                <option value="">Select Sub-Category</option>
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
<!-- END GALLERY -->
<!-- FOOTER -->
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

</body>
<!-- Body End -->

</html>