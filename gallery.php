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
            <link rel="apple-touch-icon" href="images/apple-touch-icon.png"/>

            <!-- CSS Files -->
            <link rel="stylesheet" href="css/plugins.css?v=2.3.1"/>
            <!-- Main Styles -->
            <!-- Page Styles -->
            <link rel="stylesheet" href="css/athena.css" />

            <link rel="stylesheet" href="css/theme.css?v=2.3.1"/>
            <!-- End Page Styles -->
            <link rel="stylesheet" href="css/main.css" />
            <link rel="stylesheet" href="css/animate.min.css" />
            <!-- Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
                <link href="https://fonts.googleapis.com/css?family=Merriweather:300i" rel="stylesheet">
                    </head>

                    <!-- BODY START -->
                    <body>


                        <?php echo $common['main_container_navigation']; ?>

                        <!-- Page Title -->
                        <section id="home" class="xl-py t-center white fullwidth">
                            <!-- Background image - you can choose parallax ratio and offset -->
                            <div class="bg-parallax skrollr" data-anchor-target="#home" data-0="transform:translate3d(0, 0px, 0px);" data-900="transform:translate3d(0px, 150px, 0px);" data-background="images/gallery-bg.jpeg"></div>

                        </section>
                        <!-- End Page Title -->


                        <!-- Dotted Navigation -->
                        <?php echo $common['dotted_navigation']; ?>
                        <!-- End Dotted Navigation -->






                        <!-- GALLERY -->
                        <section class="pb bt-1 border-gray t-center gallery-type-1 with-texts">

                            <!-- Filters -->
                            <div class="clearfix t-center sm-py">
                                <!-- Filters Category -->
                                <div id="gallery-filter1" class="dropdown drop-effect xxs-mt mb-4" style="display: none;">
                                    <button class="dropdown-toggle uppercase extrabold font-12 bg-colored-hover border-colored-hover white-hover slow" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Select Category
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu font-12 bold-subtitle" aria-labelledby="dropdownMenu1">
                                        <li data-filter="*" class="cbp-filter-item-active cbp-filter-item" ><div class="link">All</div></li>
                                        <li data-filter=".photography" class="cbp-filter-item" ><div class="link">Category 1</div></li>
                                        <li data-filter=".graphic" class="cbp-filter-item" ><div class="link">Category 2</div></li>
                                        <li data-filter=".design" class="cbp-filter-item" ><div class="link">Category 3</div></li>
                                        <li data-filter=".wordpress" class="cbp-filter-item" ><div class="link">Category 4</div></li>
                                    </ul>
                                </div>


                                <!-- Works -->
                                <div id="gallery" class="cbp lightbox_selected cbp-l-grid-masonry-projects">

                                    <!-- Item -->
                                    <div class="cbp-item graphic wordpress photography photo animated" data-animation="fadeIn" data-animation-delay="250">
                                        <div class="cbp-caption">
                                            <!-- IMG -->
                                            <div> <img src="images/gallery-1.jpg" alt="image gallery"> </div>
                                            <div class="cbp-caption-activeWrap">
                                                <div class="cbp-l-caption-alignCenter">
                                                    <!-- LINKS -->
                                                    <div class="cbp-l-caption-body">
                                                        <a href="images/gallery-1.jpg" class="works-link lightbox_item" data-title="Dashboard<br>by Paul Flavius Nechita">
                                                            <i class="icon-magnifier-add"></i>
                                                            <img src="images/gallery-1.jpg" alt="" class="none">
                                                        </a>
                                                        <a href="#" class="works-link external-link"><i class="icon-plus"></i></a>
                                                        <a href="#" class="works-link" target="_blank"><i class="icon-link"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#" class="title cbp-l-grid-masonry-projects-title" rel="nofollow">White Fashion</a>
                                        <div class="description cbp-l-grid-masonry-projects-desc">web design / identity</div>
                                    </div>

                                    <!-- Item -->
                                    <div class="cbp-item photography design wordpress video animated" data-animation="fadeIn" data-animation-delay="250">
                                        <div class="cbp-caption">
                                            <!-- IMG -->
                                            <div> <img src="images/gallery-2.jpg" alt="image gallery"> </div>
                                            <div class="cbp-caption-activeWrap">
                                                <div class="cbp-l-caption-alignCenter">
                                                    <!-- LINKS -->
                                                    <div class="cbp-l-caption-body">
                                                        <a href="images/gallery-2.jpg" class="works-link lightbox_item" data-title="Dashboard<br>by Paul Flavius Nechita">
                                                            <i class="icon-magnifier-add"></i>
                                                            <img src="images/gallery-2.jpg" alt="" class="none">
                                                        </a>
                                                        <a href="#" class="works-link external-link"><i class="icon-plus"></i></a>
                                                        <a href="#" class="works-link" target="_blank"><i class="icon-link"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#" class="title cbp-l-grid-masonry-projects-title" rel="nofollow">Blue Eyes</a>
                                        <div class="description cbp-l-grid-masonry-projects-desc">web design / identity</div>
                                    </div>

                                    <!-- Item -->
                                    <div class="cbp-item graphic design photography movie music animated" data-animation="fadeIn" data-animation-delay="250">
                                        <div class="cbp-caption">
                                            <!-- IMG -->
                                            <div> <img src="images/gallery-3.jpg" alt="image gallery"> </div>
                                            <div class="cbp-caption-activeWrap">
                                                <div class="cbp-l-caption-alignCenter">
                                                    <!-- LINKS -->
                                                    <div class="cbp-l-caption-body">
                                                        <a href="images/gallery-3.jpg" class="works-link lightbox_item" data-title="Dashboard<br>by Paul Flavius Nechita">
                                                            <i class="icon-magnifier-add"></i>
                                                            <img src="images/gallery-3.jpg" alt="" class="none">
                                                        </a>
                                                        <a href="#" class="works-link external-link"><i class="icon-plus"></i></a>
                                                        <a href="#" class="works-link" target="_blank"><i class="icon-link"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#" class="title cbp-l-grid-masonry-projects-title" rel="nofollow">Office Worker</a>
                                        <div class="description cbp-l-grid-masonry-projects-desc">Videography / Office</div>
                                    </div>

                                    <!-- Item -->
                                    <div class="cbp-item wordpress photography graphic article music animated" data-animation="fadeIn" data-animation-delay="250">
                                        <div class="cbp-caption">
                                            <!-- IMG -->
                                            <div> <img src="images/gallery-4.jpg" alt="image gallery"> </div>
                                            <div class="cbp-caption-activeWrap">
                                                <div class="cbp-l-caption-alignCenter">
                                                    <!-- LINKS -->
                                                    <div class="cbp-l-caption-body">
                                                        <a href="images/gallery-4.jpg" class="works-link lightbox_item" data-title="Dashboard<br>by Paul Flavius Nechita">
                                                            <i class="icon-magnifier-add"></i>
                                                            <img src="images/gallery-4.jpg" alt="" class="none">
                                                        </a>
                                                        <a href="# class="works-link external-link"><i class="icon-plus"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#" class="title cbp-l-grid-masonry-projects-title" rel="nofollow">Black&amp;White</a>
                                        <div class="description cbp-l-grid-masonry-projects-desc">Outdoor / Photography</div>
                                    </div>

                                    <!-- Item -->
                                    <div class="cbp-item graphic photography design video music animated" data-animation="fadeIn" data-animation-delay="250">
                                        <div class="cbp-caption">
                                            <!-- IMG -->
                                            <div> <img src="images/gallery-5.jpg" alt="image gallery"> </div>
                                            <div class="cbp-caption-activeWrap">
                                                <div class="cbp-l-caption-alignCenter">
                                                    <!-- LINKS -->
                                                    <div class="cbp-l-caption-body">
                                                        <a href="images/gallery-5.jpg" class="works-link lightbox_item" data-title="Dashboard<br>by Paul Flavius Nechita">
                                                            <i class="icon-magnifier-add"></i>
                                                            <img src="images/gallery-5.jpg" alt="" class="none">
                                                        </a>
                                                        <a href="#" class="works-link external-link"><i class="icon-plus"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#" class="title cbp-l-grid-masonry-projects-title" rel="nofollow">Blue Dress</a>
                                        <div class="description cbp-l-grid-masonry-projects-desc">Colors / Image</div>
                                    </div>

                                    <!-- Item -->
                                    <div class="cbp-item wordpress graphic design video photo animated" data-animation="fadeIn" data-animation-delay="250">
                                        <div class="cbp-caption">
                                            <!-- IMG -->
                                            <div> <img src="images/gallery-6.jpg" alt="image gallery"> </div>
                                            <div class="cbp-caption-activeWrap">
                                                <div class="cbp-l-caption-alignCenter">
                                                    <!-- LINKS -->
                                                    <div class="cbp-l-caption-body">
                                                        <a href="images/gallery-6.jpg" class="works-link lightbox_item" data-title="Dashboard<br>by Paul Flavius Nechita">
                                                            <i class="icon-magnifier-add"></i>
                                                            <img src="images/gallery-6.jpg" alt="" class="none">
                                                        </a>
                                                        <a href="#" class="works-link external-link"><i class="icon-plus"></i></a>
                                                        <a href="#" class="works-link" target="_blank"><i class="icon-link"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#" class="title cbp-l-grid-masonry-projects-title" rel="nofollow">Blue Accessories</a>
                                        <div class="description cbp-l-grid-masonry-projects-desc">web design / identity</div>
                                    </div>

                                    <!-- Item -->
                                    <div class="cbp-item design wordpress music article animated" data-animation="fadeIn" data-animation-delay="250">
                                        <div class="cbp-caption">
                                            <!-- IMG -->
                                            <div> <img src="images/gallery-7.jpg" alt="image gallery"> </div>
                                            <div class="cbp-caption-activeWrap">
                                                <div class="cbp-l-caption-alignCenter">
                                                    <!-- LINKS -->
                                                    <div class="cbp-l-caption-body">
                                                        <a href="images/gallery-7.jpg" class="works-link lightbox_item" data-title="Dashboard<br>by Paul Flavius Nechita">
                                                            <i class="icon-magnifier-add"></i>
                                                            <img src="images/gallery-7.jpg" alt="" class="none">
                                                        </a>
                                                        <a href="#" class="works-link external-link"><i class="icon-plus"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#" class="title cbp-l-grid-masonry-projects-title" rel="nofollow">Happy Couple</a>
                                        <div class="description cbp-l-grid-masonry-projects-desc">web design / identity</div>
                                    </div>

                                    <!-- Item -->
                                    <div class="cbp-item wordpress photography video animated" data-animation="fadeIn" data-animation-delay="250">
                                        <div class="cbp-caption">
                                            <!-- IMG -->
                                            <div> <img src="images/gallery-8.jpg" alt="image gallery"> </div>
                                            <div class="cbp-caption-activeWrap">
                                                <div class="cbp-l-caption-alignCenter">
                                                    <!-- LINKS -->
                                                    <div class="cbp-l-caption-body">
                                                        <a href="images/gallery-8.jpg" class="works-link lightbox_item" data-title="Dashboard<br>by Paul Flavius Nechita">
                                                            <i class="icon-magnifier-add"></i>
                                                            <img src="images/gallery-8.jpg" alt="" class="none">
                                                        </a>
                                                        <a href="#" class="works-link external-link"><i class="icon-plus"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#" class="title cbp-l-grid-masonry-projects-title" rel="nofollow">Health</a>
                                        <div class="description cbp-l-grid-masonry-projects-desc">Health / Photo</div>
                                    </div>

                                    <!-- Item -->
                                    <div class="cbp-item graphic design music animated" data-animation="fadeIn" data-animation-delay="250">
                                        <div class="cbp-caption">
                                            <!-- IMG -->
                                            <div> <img src="images/gallery-9.jpg" alt="image gallery"> </div>
                                            <div class="cbp-caption-activeWrap">
                                                <div class="cbp-l-caption-alignCenter">
                                                    <!-- LINKS -->
                                                    <div class="cbp-l-caption-body">
                                                        <a href="images/gallery-9.jpg" class="works-link lightbox_item" data-title="Dashboard<br>by Paul Flavius Nechita">
                                                            <i class="icon-magnifier-add"></i>
                                                            <img src="images/gallery-9.jpg" alt="" class="none">
                                                        </a>
                                                        <a href="#" class="works-link external-link"><i class="icon-plus"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#" class="title cbp-l-grid-masonry-projects-title" rel="nofollow">Sun Glasses</a>
                                        <div class="description cbp-l-grid-masonry-projects-desc">Mode / Photo</div>
                                    </div>

                                    <!-- Item -->
                                    <div class="cbp-item wordpress movie animated" data-animation="fadeIn" data-animation-delay="250">
                                        <div class="cbp-caption">
                                            <!-- IMG -->
                                            <div> <img src="images/gallery-10.png" alt="image gallery"> </div>
                                            <div class="cbp-caption-activeWrap">
                                                <div class="cbp-l-caption-alignCenter">
                                                    <!-- LINKS -->
                                                    <div class="cbp-l-caption-body">
                                                        <a href="images/gallery-10.png" class="works-link lightbox_item" data-title="Dashboard<br>by Paul Flavius Nechita">
                                                            <i class="icon-magnifier-add"></i>
                                                            <img src="images/gallery-10.png" alt="" class="none">
                                                        </a>
                                                        <a href="#" class="works-link external-link"><i class="icon-plus"></i></a>
                                                        <a href="#" class="works-link" target="_blank"><i class="icon-link"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#" class="title cbp-l-grid-masonry-projects-title" rel="nofollow">Talking Phone</a>
                                        <div class="description cbp-l-grid-masonry-projects-desc">web design / identity</div>
                                    </div>

                                </div>
                                <!-- End container for works -->

                        </section>
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
                                            <form id="newsletter_form" name="newsletter_form" method="post" action="php/newsletter.php">
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
                            <form class="quick_form" name="quick_form" method="post" action="php/quick-contact-form.php">
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


                                        <!-- jQuery -->
                                        <script src="js/jquery.min.js?v=2.3"></script>
                                        <!-- MAIN SCRIPTS - Classic scripts for all theme -->
                                        <script src="js/scripts.js?v=2.3.1"></script>
                                        <!-- END JS FILES -->

                                        <script type='text/javascript' src='js/site.js'></script>

                                        <script type="text/javascript">
                                            // init cubeportfolio
                                            $('#gallery').cubeportfolio({
                                                filters: '#gallery-filter1, #gallery-filter2',
                                                loadMoreAction: 'auto',
                                                layoutMode: 'grid',
                                                defaultFilter: '*',
                                                animationType: 'quicksand',
                                                gapHorizontal: 10,
                                                gapVertical: 10,
                                                gridAdjustment: 'responsive',
                                                mediaQueries: [{
                                                        width: 1500,
                                                        cols: 5,
                                                    }, {
                                                        width: 1100,
                                                        cols: 4,
                                                    }, {
                                                        width: 800,
                                                        cols: 3
                                                    }, {
                                                        width: 480,
                                                        cols: 1,
                                                        options: {
                                                            caption: '',
                                                            gapHorizontal: 10,
                                                            gapVertical: 10,
                                                        }
                                                    }],
                                                caption: 'zoom',
                                                displayType: 'fadeIn',
                                                displayTypeSpeed: 300,
                                            });


                                        </script>



                                        </body>
                                        <!-- Body End -->
                                        </html>