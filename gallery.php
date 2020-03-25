<?php
include_once 'common_html.php';
include_once 'header_frontend.php';
echo $common['main_container_navigation'];
?>

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
<?php include_once 'footer_frontend.php'; ?>
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
