<?php
include_once 'common_html.php';
include_once 'header_frontend.php';
echo $common['main_container_navigation'];
echo $common['dotted_navigation'];
?>

<style>
.block-img img{width:auto; max-width:100%; height:300px;}
</style>

<!-- CONTENT -->
<section id="home" class="xl-py t-center fullwidth">
    <!-- Background image - you can choose parallax ratio and offset -->
    <div class="bg-parallax skrollr" data-anchor-target="#home" data-0="transform:translate3d(0, 0px, 0px);" data-900="transform:translate3d(0px, 150px, 0px);" data-background="images/legal1.jpg"></div>

</section>
<!-- END CONTENT -->

<div id="lightboxes" class="container mt t-center mb">
    <!-- Title -->
    <h1 class="extrabold-title">Legal Document's</h1>
    <div class="title-strips-over dark"></div>

    <!-- Image and Gallery -->
    <div class="qdr-col-1 sm-mt">
        <!-- Col -->
        <div class="qdr-col-4 gap-5 lightbox_gallery">
		<div>
                <a href="images/CERTIFICATE OF INCORPORATION2-page-001.jpg" class="thumbnail-img block-img">
                    <img src="images/CERTIFICATE OF INCORPORATION2-page-001.jpg" alt="">
                    <div class="img-overlay"><div class="overlay-wrap"><i class="fa fa-expand font-20"></i></div></div>
                </a>
            </div>
			<div>
                <a href="images/obedient-pan.jpg" class="thumbnail-img block-img">
                    <img src="images/obedient-pan.jpg" alt="">
                    <div class="img-overlay"><div class="overlay-wrap"><i class="fa fa-expand font-20"></i></div></div>
                </a>
            </div>
            <div>
                <a href="images/legal-1.jpg" class="thumbnail-img block-img">
                    <img src="images/legal-1.jpg" alt="">
                    <div class="img-overlay"><div class="overlay-wrap"><i class="fa fa-expand font-20"></i></div></div>
                </a>
            </div>
            <div>
                <a href="images/legal-2.jpg" class="thumbnail-img block-img">
                    <img src="images/legal-2.jpg" alt="">
                    <div class="img-overlay"><div class="overlay-wrap"><i class="fa fa-expand font-20"></i></div></div>
                </a>
            </div>
            <div>
                <a href="images/legal-3.jpg" class="thumbnail-img block-img">
                    <img src="images/legal-3.jpg" alt="">
                    <div class="img-overlay"><div class="overlay-wrap"><i class="fa fa-expand font-20"></i></div></div>
                </a>
            </div>
            <div>
                <a href="images/legal-4.jpg" class="thumbnail-img block-img">
                    <img src="images/legal-4.jpg" alt="">
                    <div class="img-overlay"><div class="overlay-wrap"><i class="fa fa-expand font-20"></i></div></div>
                </a>
            </div>
            <div>
                <a href="images/legal-5.jpg" class="thumbnail-img block-img">
                    <img src="images/legal-5.jpg" alt="">
                    <div class="img-overlay"><div class="overlay-wrap"><i class="fa fa-expand font-20"></i></div></div>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- FOOTER -->
<?php include_once 'footer_frontend.php'; ?>
<!-- SEARCH FORM FOR NAV -->
<?php echo $common['search_form']; ?>


<!-- jQuery -->
<script src="js/jquery.min.js?v=2.3"></script>
<!-- MAIN SCRIPTS - Classic scripts for all theme -->
<script src="js/scripts.js?v=2.3.1"></script>
<!-- END JS FILES -->
<script type='text/javascript' src='js/site.js'></script>
</body>
<!-- Body End -->
</html>
