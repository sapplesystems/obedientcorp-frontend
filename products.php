<?php include_once 'common_html.php'; ?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>Obedient</title>
            <meta name="description" content="Quadra is a super easy customizing, creative, professional design, bootstrap responsive and high performance website template and 700+ pages for multi-purpose using to agencies, portfolio, photographers and your all wishes." />
            <!--Keywords -->
            <meta name="keywords" content="modern, creative, website, html5, bootstrap responsive, parallax, soft, front-end, designer, coming soon, account, portfolio, photographer, grid, social, modules, design, personal, faq, one page, multi-purpose, branding, studio, agency, templates, css3, carousel, slider, corporate, theme, quadra, demos, blog, shop" />
            <meta name="author" content="GoldEyes" />
            <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
            <!--Favicon -->
            <link rel="icon" type="image/png" href="images/favicon.png" />
            <!-- Apple Touch Icon -->
            <link rel="apple-touch-icon" href="images/apple-touch-icon.png" />

            <!-- CSS Files -->
            <link rel="stylesheet" href="css/plugins.css?v=2.3.1" />
            <!-- Main Styles -->
            <!-- Page Styles -->
            <link rel="stylesheet" href="css/athena.css" />

            <link rel="stylesheet" href="css/theme.css?v=2.3.1" />
            <!-- End Page Styles -->
            <link rel="stylesheet" href="css/main.css" />
            <link rel="stylesheet" href="css/animate.min.css" />

            <!-- Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
                <link href="https://fonts.googleapis.com/css?family=Merriweather:300i" rel="stylesheet">
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
                    </head>

                    <!-- BODY START -->

                    <body>

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
                        <footer id="footer" class="classic_footer">
                            <!-- Container -->
                            <div class="container footer-body">
                                <div class="row clearfix">
                                    <!-- Column -->
                                    <div class="col-md-3 col-sm-6 col-xs-12 sm-mb-mobile">
                                        <!-- Title -->
                                        <h6 class="uppercase white extrabold">Quadra Exclusive Theme</h6>
                                        <h6 class="sm-mt bold gray8">ABOUT US</h6>
                                        <p class="mini-mt">It is a long established fact that a read page when looking at its layout. </p>
                                        <h6 class="xs-mt bold gray8"><i class="fa fa-map-marker mini-mr"></i>OUR ADDRESS</h6>
                                        <p class="mini-mt">PO Box 16122 Collins Street West <br class="hidden-xs"> Victoria 8007 Australia</p>
                                        <!-- Google Map -->
                                        <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.9916256937586!2d2.2922926156743895!3d48.858370079287475!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e2964e34e2d%3A0x8ddca9ee380ef7e0!2sEyfel+Kulesi!5e0!3m2!1str!2s!4v1491905379246" data-iframe="true" class="lightbox underline-hover colored-hover">
                                            Find us on Google Map
                                        </a>
                                        <h6 class="xs-mt bold gray8"><i class="fa fa-envelope mini-mr"></i>CONTACT US</h6>
                                        <p class="mini-mt">Pbx: <a href="tel:+0123456790" class="underline-hover colored-hover">+0123456789</a></p>
                                        <a href="mailto:goldeyestheme@gmail.com" class="underline-hover colored-hover">example@example.com</a>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-md-3 col-sm-6 col-xs-12 all-block-links sm-mb-mobile">
                                        <h6 class="uppercase white extrabold sm-mb">Latest News</h6>
                                        <!-- You can edit footer-news.html file in js/ajax folder. Will be changed on all website -->
                                        <div data-ajax-load="js/ajax/footer-news.html"><i class="fa fa-refresh fa-2x fa-spin"></i></div>
                                    </div>
                                    <!-- End Column -->
                                    <!-- Column -->
                                    <div class="col-md-3 col-sm-6 col-xs-12 sm-mb-mobile">
                                        <h6 class="uppercase white extrabold sm-mb">recent Comments</h6>
                                        <!-- Clients Slider one - You can find details in footer-client-comments.html file, #post1 div -->
                                        <!-- When you edit ajax file, the details will be changed on all website -->
                                        <div data-ajax-load="js/ajax/footer-client-comments.html #post1" class="ajax-slider"></div>
                                        <!-- Clients Slider two -->
                                        <div data-ajax-load="js/ajax/footer-client-comments.html #post2" class="ajax-slider"></div>
                                        <!-- Sub Title -->
                                        <h6 class="xxs-mt bold gray8">ADD YOUR COMMENT</h6>
                                        <p class="mini-mt gray8"><a href="http://goldeyestheme.com/envato/quadra/wishbox.html" target="_blank" class="mini-mt underline-hover gray6-hover gray7">Drop us your comment!</a> All images are placeholders.</p>
                                    </div>
                                    <!-- End Column -->
                                    <!-- Column -->
                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                        <!-- Title -->
                                        <h5 class="uppercase white extrabold no-pm">SUBSCRIBE US</h5>
                                        <!-- Sub Title -->
                                        <h6 class="sm-mt bold gray8">GET UPDATED</h6>
                                        <p class="mini-mt">The standard chunk of Lorem Ipsum used.</p>
                                        <div id="newsletter-form" class="footer-newsletter clearfix xs-mt">
                                            <form id="newsletter_form" name="newsletter_form" method="post" action="#">
                                                <input type="email" name="n-email" id="n-email" required placeholder="Add your E-Mail address" class="font-12 radius-lg form-control">
                                                    <button type="submit" id="n-submit" name="submit" class="btn-lg fullwidth radius-lg bg-colored2 gray4 qdr-hover-6 click-effect bold font-12">SUBSCRIBE</button>
                                            </form>
                                        </div>
                                        <!-- End Form -->
                                        <h6 class="xs-mt xxs-mb bold gray8">FOLLOW US</h6>
                                        <a href="#" class="icon-xs radius bg-dark facebook white-hover slow1"><i class="fa fa-facebook"></i></a>
                                        <a href="#" class="icon-xs radius bg-dark twitter white-hover slow1"><i class="fa fa-twitter"></i></a>
                                        <a href="#" class="icon-xs radius bg-dark instagram white-hover slow1"><i class="fa fa-instagram"></i></a>
                                        <a href="#" class="icon-xs radius bg-dark pinterest white-hover slow1"><i class="fa fa-pinterest"></i></a>
                                    </div>
                                    <!-- End Column -->
                                </div>
                            </div>
                            <!-- End Container -->
                            <!-- Footer Bottom -->
                            <div class="footer-bottom">
                                <div class="container">
                                    <div class="row clearfix calculate-height t-center-xs">
                                        <div class="col-sm-6 col-xs-12 table-im t-left height-auto-mobile t-center-xs">
                                            <div class="v-middle">
                                                <img src="images/logos/icon_02_b.png" alt="logo icon" class="logo">
                                            </div>
                                        </div>
                                        <!-- Bottom Note -->
                                        <div class="col-sm-6 col-xs-12 table-im t-right height-auto-mobile t-center-xs xxs-mt-mobile">
                                            <p class="v-middle">
                                                <a href="#" target="_blank" class="gray6-hover underline-hover">Term and Condition</a> |
                                                <a href="#" target="_blank" class="gray6-hover underline-hover">Privacy Policy</a> <br class="hidden-xs">
                                                    © 2018. Powered By
                                                    <a href="https://themeforest.net/item/quadra-creative-multipurpose-template/21409528" target="_blank" class="colored-hover underline-hover">Elite Themeforest Author</a>.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </footer>
                        <!-- END FOOTER -->
                        <!-- Quick Contact Form -->
                        <div class="quick-contact-form border-colored">
                            <h5 class="uppercase t-center extrabold">Drop us a message</h5>
                            <p class="t-center normal">You're in the right place! Just drop us a message. How can we help?</p>
                            <!-- Contact Form -->
                            <form class="quick_form" name="quick_form" method="post" action="#">
                                <!-- Name -->
                                <input type="text" name="qname" id="qname" required placeholder="Name" class="no-mt">
                                    <!-- Email -->
                                    <input type="email" name="qemail" id="qemail" required placeholder="E-Mail">
                                        <!-- Message -->
                                        <textarea name="qmessage" id="qmessage" required placeholder="Message"></textarea>
                                        <!-- Send Button -->
                                        <button type="submit" id="qsubmit" class="bg-colored white qdr-hover-6 extrabold">SEND</button>
                                        <!-- End Send Button -->
                                        </form>
                                        <!-- End Form -->
                                        <a href="https://themeforest.net/user/goldeyes#contact" target="_blank" class="inline-block colored-hover uppercase extrabold h6 no-pm qdr-hover-5">Or see contact page</a>
                                        </div>
                                        <!-- Contact us button -->
                                        <a href="#" class="drop-msg click-effect dark-effect"><i class="fa fa-envelope-o"></i></a>
                                        <!-- Back To Top -->
                                        <a id="back-to-top" href="#top"><i class="fa fa-angle-up"></i></a>





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