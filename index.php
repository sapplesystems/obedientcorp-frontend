<?php
include_once 'common_html.php';
include_once 'header_frontend.php';
?>
<style>
    .Preloader { position:fixed; top:0; left:0; width:100%; height:100%; background:#040406; z-index:99999; display:flex; justify-content:center; align-items:center;}
    .Preloader__Spinner { width:300px; min-width:200px; max-width:80%; animation: Blink 1s ease-in-out infinite; -webkit-animation: Blink 1s ease-in-out infinite; }
    @keyframes Blink { 0% {opacity: 1} 50% {opacity: 0.5} 100% {opacity: 1}}
    @-webkit-keyframes Blink { 0% {opacity: 1} 50% {opacity: 0.5} 100% {opacity: 1}}

    @media (max-width:800px) and (orientation: portrait) {
        .Preloader__Spinner { width:10vw; display:block; }
    }
    #pop-on-load{display: none;}
    .tp-kbimg-wrap{display: none !important;}
    .display_none{
        display: none;
    }
</style>

<div id="Preloader" class="Preloader" /> <img style="height:200px;" class="Black" src="images/obedient-logo.png" alt="Logo" /> </div>

<!-- LOADER -->
<!-- <div class="page-loader bg-white">
     <div class="v-center">
         <div class="loader-square bg-colored"></div>
     </div>
 </div> -->

<!-- Wrapper -->
<?php echo $common['main_container_navigation']; ?>


<section id="wrapper">
    <?php echo $common['dotted_navigation']; ?>
    <!-- End Dotted Navigation -->

    <!-- ALL SECTIONS -->
    <section id="content">
        <!-- HOME SECTION -->

<!--<a href="index.php" class="logoHeaderMain"><img style="height:120px;" src="images/obedient-logo.png" alt="" /></a>-->
       

        <!-- Hero Slider -->
		<div>
        <div class="hero-slider height-760 custom-slider qdr-controls" data-slick='{"dots": true, "arrows": true, "autoplay": true, "autoplaySpeed": 3000, "speed": 700, "slidesToShow": 1, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 1}}]}'>
            <!-- Slide -->
            <div class="slide moving-container">
                <!-- Your Image -->
                <div class="slide-img bg-soft bg-soft-dark2" data-background="images/slider_image_1.jpg"></div>
                <!-- Details -->
                <div class="details">
                    <!-- Centered Container -->
                    <div class="container v-center">
                        <div class="skrollr moving" data-0="opacity:1;" data-200="opacity:0;">
                            <div class="translatez-sm">
                                <h4 class="playfair italic animated font-14-mobile custom_subheading" data-animation="fadeInUp" data-animation-delay="600">
                                    Real Estate & Consumer Goods
                                </h4>
                            </div>
                            <div class="translatez-xs">
                                <h1 class="bold-title mini-mt animated font-16-mobile custom_heading" data-animation="fadeInUp" data-animation-delay="800">
                                    Welcome to Obedient Group
                                </h1>
                            </div>
                            <div class="translatez-md">
                                <a href="products/" class="hero-slider-next lg-btn xxs-mt inline-block border-btn border-dashed border-gray3 radius-lg bold-subtitle font-12 white animated bg-colored1-hover border-colored1-hover slow bg_purple" data-animation="fadeInUp" data-animation-delay="1000">
                                    OUR PRODUCTS
                                </a>&nbsp;
								<a href="login/" class="hero-slider-next lg-btn xxs-mt inline-block border-btn border-dashed border-gray3 radius-lg bold-subtitle font-12 white animated bg-colored1-hover border-colored1-hover slow bg_purple" data-animation="fadeInUp" data-animation-delay="1000">
                                    LOGIN
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Details -->
            </div>
            <!-- End Slide -->
            <!-- Slide -->
            <div class="slide moving-container">
                <!-- Your Image -->
                <div class="slide-img bg-soft bg-soft-dark2" data-background="images/slider_image_2.jpg"></div>
                <!-- Details -->
                <div class="details">
                    <!-- Centered Container -->
                    <div class="container v-center">
                        <div class="skrollr moving" data-0="opacity:1;" data-200="opacity:0;">
                            <div class="translatez-sm">
                                <h4 class="playfair italic animated font-14-mobile custom_subheading" data-animation="fadeInUp" data-animation-delay="600">
                                    Real Estate & Consumer Goods
                                </h4>
                            </div>
                            <div class="translatez-xs">
                                <h1 class="bold-title mini-mt animated font-16-mobile custom_heading" data-animation="fadeInUp" data-animation-delay="800">
                                    Welcome to Obedient Group
                                </h1>
                            </div>
                            <div class="translatez-md">
                                <a href="products" class="hero-slider-next lg-btn xxs-mt inline-block border-btn border-dashed border-gray3 radius-lg bold-subtitle font-12 white animated bg-colored1-hover border-colored1-hover slow bg_purple" data-animation="fadeInUp" data-animation-delay="1000">
                                    OUR PRODUCTS
                                </a>&nbsp;
								<a href="login" class="hero-slider-next lg-btn xxs-mt inline-block border-btn border-dashed border-gray3 radius-lg bold-subtitle font-12 white animated bg-colored1-hover border-colored1-hover slow bg_purple" data-animation="fadeInUp" data-animation-delay="1000">
                                    LOGIN
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Details -->
            </div>
            <!-- End Slide -->
        </div>
        <!-- End Hero Slider -->
		<div class="icon_scroll"></div/>
		</div>

        <!-- END HOME SECTION -->

        <!-- FACTS -->
        <section id="facts" class="clearfix ">
            <!-- Left Texts, buttons and facts -->
            <div class="left-details bg-gradient white">
                <!-- Texts -->
                
                <div class="display_none">
                <h2 class="white no-pm uppercase">Who are we? What we do?
                    <div>
                        <a href="#" data-toggle="modal" data-target="#modal-11" id="pop-on-load" class="lg-btn bg-colored1 white radius-lg slow bs-lg-hover"> </a>
                    </div>
                </h2>
                <h2 class="white no-pm uppercase light">Read more about us.</h2>
                </div>
                <h4 class="description white light">We are customer oriented organization with high moral values and global vision, we started our operation in 2018, in a very short span of time we have grown fast and rising rapidly, this reflect the  quality of our products, services and excellent team work.</h4>
                <!-- Buttons -->
                <div class="buttons light">
                    <!-- Button -->
                    <a href="#about" class="click-effect dark-effect">
                        About Us
                    </a>
                    <!-- Button -->
                    <a href="#about" class="click-effect dark-effect">
                        Our Values
                    </a>
                    <!-- Button -->
                    <a href="#about" class="click-effect dark-effect">
                       Vision & Mission
                    </a>
                </div>
                <div class="facts-container light">
                    <!-- Item -->
                    <div class="fact" id="real_estate_locations" data-source="0">
                        <div class="texts">
                            <div>
                                <h1 class="factor">0</h1>
                                <h3>Real Estate Running Projects</h3>
                                <p>At Affordable & Great Locations</p>
                            </div>
                        </div>
                    </div>
                    <!-- Item -->
                    <div class="fact" id="consumer_goods_products" data-source="0">
                        <div class="texts">
                            <div>
                                <h1 class="factor">0</h1>
                                <h3>Consumer Good Products</h3>
                                <p> With Best Quality </p>
                            </div>
                        </div>
                    </div>
                    <!-- Item -->
                    <div class="fact" id="total_members" data-source="0">
                        <div class="texts">
                            <div>
                                <h1 class="factor">0</h1>
                                <h3> Happy Obedient family</h3>
                                <p>&nbsp;</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Right image -->
            <div class="right-image" style="background-size:100% 100%; background-repeat:no-repeat; opacity:1;"></div>
        </section>

        <!-- WORKS -->
        <section id="works" class="mb-5">
            <!-- Container for all works section -->
            <div class="container-fluid">
			<div class="row mb-5 custom_CareImgs">
			<div class="col-md-4"><div class="bg_careImg imgCare1"></div></div>
			<div class="col-md-4"><div class="bg_careImg imgCare2"></div></div>
			<div class="col-md-4"><div class="bg_careImg imgCare3 bgPosition"></div></div>
			</div>
				</div>
                <!-- Titles -->
				<div class="text-center t-center">
                <h1 class="extrabold-title">See our Products.</h2>
                <!--<h2 class="uppercase light">creative &amp; high quality.</h2>-->
                <div class="title-strips-over dark marginAuto"></div>
				</div>
                <h4 class="light"></h4>
                <div id="project_product_slider"></div>

            </div>
        </section>

        <!-- FOOTER -->
        <?php include_once 'footer_frontend.php'; ?>
        <!-- END FOOTER -->

    </section>
    <!-- END ALL SECTIONS -->

</section>
<!-- END WRAPPER -->
<!-- SEARCH FORM FOR NAV -->
<?php echo $common['search_form']; ?>

<!-- Modal 11 -->
<div id="modal-11" class="modal middle-modal fade" tabindex="-1" role="dialog">
    <!-- Container -->
    <div class="modal-dialog modal-lg bg-white clearfix radius o-hidden" role="document">
        <!-- Modal Content -->
        <div class="modal-content">
            <!-- Close Button for modal -->
            <div class="close fa fa-close" data-dismiss="modal"></div>
            <!-- Left, Image area -->
            <div class="block-img">
                <img id="uploded_image" src="">
            </div>
            <!-- End Left, Image area -->
        </div>
        <!-- End Modal Content -->
    </div>
</div>
<!-- End Modal 11 -->

<script type='text/javascript' src='js/jquery.js'></script>
<script src="assets/javascript/dashboard_products.js"></script>
<script type='text/javascript' src='js/owl.carousel.min.js'></script> 
<script type='text/javascript' src='js/scrollreveal.min.js'></script> 

<script type='text/javascript' src='js/autoptimize_single_44a4fedab4312ace693cdb9756957b7a.js'></script> 
<script type='text/javascript' src='js/autoptimize_single_3b0c16349a3b099ab8231a1ea46adc2c.js'></script> 

<!-- jQuery -->
<script src="js/jquery.min.js?v=2.3"></script>
<!-- REVOLUTION SLIDER -->
<script src="js/revolutionslider/jquery.themepunch.revolution.min.js"></script>
<script src="js/revolutionslider/jquery.themepunch.tools.min.js"></script>
<!-- END REVOLUTION SLIDER -->
<!-- PAGE OPTIONS - You can find sliders, portfolio and other scripts for business -->
<script src="js/plugins.js"></script>
<!-- MAIN SCRIPTS - Classic scripts for all theme -->
<script src="js/scripts.js?v=2.3.1"></script>
<!-- END JS FILES -->

<!-- slider smooth -->
<script src="js/projectHomeSlider.js"></script>
<script src="js/sappleslider.multi.js"></script>
<script type='text/javascript' src='js/site.js'></script>

<script type="text/javascript">
    $('.featured_project_slide').css('display', 'none');
    $('.featured_project_slide:first').css({'display': 'block', 'opacity': '0'});
    var slider = $('.slider-single').sappleSingleSlider();
    var slider = $('.slider-multi').sappleMultiSlider();

</script>
<!-- Slider Calling -->
<script type="text/javascript">
    var tpj = jQuery;
    var revapi1066;
    tpj(document).ready(function () {
        if (tpj("#rev_slider_1066_1").revolution == undefined) {
            revslider_showDoubleJqueryError("#rev_slider_1066_1");
        } else {
            revapi1066 = tpj("#rev_slider_1066_1").show().revolution({
                sliderType: "standard",
                jsFileLocation: "revolution/js/",
                sliderLayout: "fullscreen",
                dottedOverlay: "none",
                delay: 9000,
                navigation: {
                    keyboardNavigation: "off",
                    keyboard_direction: "horizontal",
                    mouseScrollNavigation: "off",
                    mouseScrollReverse: "default",
                    onHoverStop: "off",
                    touch: {
                        touchenabled: "on",
                        swipe_threshold: 75,
                        swipe_min_touches: 1,
                        swipe_direction: "horizontal",
                        drag_block_vertical: false
                    }
                },
                responsiveLevels: [1240, 1024, 778, 480],
                visibilityLevels: [1240, 1024, 778, 480],
                gridwidth: [1240, 1024, 778, 480],
                gridheight: [868, 768, 960, 720],
                lazyType: "none",
                parallax: {
                    type: "mouse",
                    origo: "slidercenter",
                    speed: 2000,
                    levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50, 46, 47, 48, 49, 50, 55],
                    type:"mouse",
                            disable_onmobile: "on"
                },
                shadow: 0,
                spinner: "off",
                stopLoop: "on",
                stopAfterLoops: 0,
                stopAtSlide: 1,
                shuffle: "off",
                autoHeight: "off",
                fullScreenAutoWidth: "off",
                fullScreenAlignForce: "off",
                fullScreenOffsetContainer: ".header",
                fullScreenOffset: "60px",
                disableProgressBar: "on",
                hideThumbsOnMobile: "off",
                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLilmit: 0,
                debugMode: false,
                fallbacks: {
                    simplifyAll: "off",
                    nextSlideOnWindowFocus: "off",
                    disableFocusListener: false,
                }
            });
        }
    });	/*ready*/

</script>
<script type="text/javascript">
//*********************************************
    //  CLIENTS
    //*********************************************
    // init cubeportfolio
    $('#js-grid-clients').cubeportfolio({
        layoutMode: 'slider',
        drag: true,
        auto: true,
        autoTimeout: 3000,
        autoPauseOnHover: true,
        showNavigation: false,
        showPagination: true,
        rewindNav: true,
        scrollByPage: false,
        gridAdjustment: 'responsive',
        mediaQueries: [{
                width: 1500,
                cols: 5,
            }, {
                width: 1100,
                cols: 5,
            }, {
                width: 800,
                cols: 4,
            }, {
                width: 480,
                cols: 1,
            }],
        gapHorizontal: 10,
        gapVertical: 5,
        caption: 'opacity',
        displayType: 'fadeIn',
        displayTypeSpeed: 100,
    });


    //*********************************************
    //  PORTFOLIO SECTION
    //*********************************************

    // init cubeportfolio
    $('#work-items').cubeportfolio({
        layoutMode: 'slider',
        defaultFilter: '*',
        animationType: 'fadeOutTop',
        gapHorizontal: 0,
        gapVertical: 0,
        showNavigation: false,
        showPagination: false,
        gridAdjustment: 'responsive',
        mediaQueries: [{
                width: 1500,
                cols: 4,
            }, {
                width: 1100,
                cols: 4,
            }, {
                width: 750,
                cols: 2,
            }, {
                width: 480,
                cols: 1,
                options: {
                    caption: '',
                }
            }],
        caption: 'zoom',
        displayType: 'fadeIn',
        displayTypeSpeed: 100,
        // lightbox
        lightboxDelegate: '.cbp-lightbox',
        lightboxGallery: true,
        lightboxTitleSrc: 'data-title',
    });

    setTimeout(function () {
        document.getElementById('pop-on-load').click();
    }, 5000);
</script>
</body>
<!-- Body End -->
</html>
