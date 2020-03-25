<?php
include_once 'common_html.php';
include_once 'header_frontend.php';
?>

<style>
    * {
        box-sizing:border-box;
    }
    body {
        margin:0px;
        padding:0px;
    }

    ul.product_list{list-style:none; padding:0px; margin:0px;}
    ul.product_list li{float:left; width:25%; padding:0 20px; margin:20px 0;}
    ul.product_list li img{max-width:100%; height:200px;}
    ul.product_list li .product_info{position:relative;}
    ul.product_list li .product_info .info_hover{display:none; position:absolute; bottom:0px; left:0px; background-color:rgba(0,0,0,0.7); padding:15px 10px; width:100%;}
    ul.product_list li .product_info:hover .info_hover{display:block;}
    ul.product_list li .product_info:hover .info_hover a{color:#ffffff; padding:5px 10px; background-color:#b66dff; text-decoration:none; border:0px; border-radius:4px;}
    .minHeight200{min-height:200px;}
</style>

<?php echo $common['main_container_navigation']; ?>


<!-- Dotted Navigation -->
<?php echo $common['dotted_navigation']; ?>
<!-- End Dotted Navigation -->
<!-- Page Title -->
<section id="home" class="xl-py t-center white fullwidth">
    <!-- Background image - you can choose parallax ratio and offset -->
    <div class="bg-parallax skrollr" data-anchor-target="#home" data-0="transform:translate3d(0, 0px, 0px);" data-900="transform:translate3d(0px, 200px, 0px);" data-background="images/product_bg.jpg" style="background-position: center 90%;"></div>
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