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
<?php echo $common['main_container_navigation']; ?>
<section id="wrapper">
    <?php echo $common['dotted_navigation']; ?>
    <section id="content">
        <div>
            <div id="home_page_sliders_div" class="hero-slider height-760 custom-slider qdr-controls" data-slick='{"dots": true, "arrows": true, "autoplay": true, "autoplaySpeed": 3000, "speed": 700, "slidesToShow": 1, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 1}}]}'></div>
            <div class="icon_scroll"></div>
        </div>
        <section id="facts" class="clearfix ">
            <div class="left-details bg-gradient white">
                <div class="display_none">
                    <h2 class="white no-pm uppercase">Who are we? What we do?
                        <div>
                            <a href="#" data-toggle="modal" data-target="#modal-11" id="pop-on-load" class="lg-btn bg-colored1 white radius-lg slow bs-lg-hover"> </a>
                        </div>
                    </h2>
                    <h2 class="white no-pm uppercase light">Read more about us.</h2>
                </div>
                <h4 class="description white light">We are customer oriented organization with high moral values and global vision, we started our operation in 2018, in a very short span of time we have grown fast and rising rapidly, this reflect the  quality of our products, services and excellent team work.</h4>
                <div class="buttons light">
                    <a href="#about" class="click-effect dark-effect">About Us</a>
                    <a href="#about" class="click-effect dark-effect">Our Values</a>
                    <a href="#about" class="click-effect dark-effect">Vision & Mission</a>
                </div>
                <div class="facts-container light">
                    <div class="fact" id="real_estate_locations" data-source="0">
                        <div class="texts">
                            <div>
                                <h1 class="factor">0</h1>
                                <h3>Real Estate Running Projects</h3>
                                <p>At Affordable & Great Locations</p>
                            </div>
                        </div>
                    </div>
                    <div class="fact" id="consumer_goods_products" data-source="0">
                        <div class="texts">
                            <div>
                                <h1 class="factor">0</h1>
                                <h3>Consumer Good Products</h3>
                                <p> With Best Quality </p>
                            </div>
                        </div>
                    </div>
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
            <div class="right-image" style="background-size:100% 100%; background-repeat:no-repeat; opacity:1;"></div>
        </section>
        <section id="works" class="mb-5">
            <div class="container-fluid">
                <div class="row mb-5 custom_CareImgs">
                    <div class="col-md-4"><div class="bg_careImg imgCare1"></div></div>
                    <div class="col-md-4"><div class="bg_careImg imgCare2"></div></div>
                    <div class="col-md-4"><div class="bg_careImg imgCare3 bgPosition"></div></div>
                </div>
            </div>
            <div class="text-center t-center">
                <h2 class="extrabold-title">See our Products.</h2>
                <div class="title-strips-over dark marginAuto"></div>
            </div>
            <h4 class="light"></h4>
            <div id="project_product_slider"></div>
        </section>
        <?php include_once 'footer_frontend.php'; ?>
    </section>
</section>
<?php echo $common['search_form']; ?>
<div id="modal-11" class="modal middle-modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg bg-white clearfix radius o-hidden" role="document">
        <div class="modal-content">
            <div class="close fa fa-close" data-dismiss="modal"></div>
            <div class="block-img">
                <img id="uploded_image" src="">
            </div>
        </div>
    </div>
</div>
<script type='text/javascript' src='js/jquery.js'></script>
<script src="assets/javascript/dashboard_products.js"></script>
<script type='text/javascript' src='js/owl.carousel.min.js'></script> 
<script type='text/javascript' src='js/scrollreveal.min.js'></script> 
<script type='text/javascript' src='js/autoptimize_single_44a4fedab4312ace693cdb9756957b7a.js'></script> 
<script type='text/javascript' src='js/autoptimize_single_3b0c16349a3b099ab8231a1ea46adc2c.js'></script> 
<script src="js/jquery.min.js?v=2.3"></script>
<script src="js/revolutionslider/jquery.themepunch.revolution.min.js"></script>
<script src="js/revolutionslider/jquery.themepunch.tools.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/scripts.js?v=2.3.1"></script>
<script type='text/javascript' src='js/site.js'></script>
<script type="text/javascript">
    //$('.featured_project_slide').css('display', 'none');
    //$('.featured_project_slide:first').css({'display': 'block', 'opacity': '0'});
    //var slider = $('.slider-single').sappleSingleSlider();
    //var slider = $('.slider-multi').sappleMultiSlider();
    setTimeout(function () {
        document.getElementById('pop-on-load').click();
    }, 2000);
</script>
</body>
</html>
