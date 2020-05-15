<?php
include_once 'common_html.php';
include_once 'header_frontend.php';
echo $common['main_container_navigation'];
?>

<!-- Page Title -->
<section id="home" class="xl-py t-center white fullwidth">
    <!-- Background image - you can choose parallax ratio and offset -->
    <div style="background-position: center 57%;" class="bg-parallax skrollr" data-anchor-target="#home" data-0="transform:translate3d(0, 0px, 0px);" data-900="transform:translate3d(0px, 150px, 0px);" data-background="images/winners.jpeg"></div>

</section>
<!-- End Page Title -->


<!-- Dotted Navigation -->
<?php echo $common['dotted_navigation']; ?>
<!-- End Dotted Navigation -->






<!-- GALLERY -->
<section class="pb bt-1 border-gray t-center gallery-type-1 with-texts py">

    <div class="t-center">
        <h1 class="extrabold-title">Winners</h1>
        <div class="title-strips-over dark"></div>
    </div>

    <!-- Filters -->
    <div class="clearfix t-center sm-py">
        <!-- Works -->
        <div id="gallery_box" class="cbp lightbox_selected cbp-l-grid-masonry-projects winners-list"></div>
    </div>

</section>
<!-- END GALLERY -->
<?php include_once 'footer_frontend.php'; ?>
<!-- SEARCH FORM FOR NAV -->
<?php echo $common['search_form']; ?>


<!-- jQuery -->
<script src="js/jquery.min.js?v=2.3"></script>

<script type="text/javascript">
    getWinnersList();
    function getWinnersList() {
        $.ajax({
            url: base_url + 'winner-list',
            type: 'post',
            async: false,
            success: function(response) {
                if (response.status == "success") {
                    var winners = '';
                    $.each(response.data, function(key, value) {
                        var path = media_url + 'winner_photo/' + value.photo;
                        winners += '<div class="cbp-item">\n\
                                        <div class="cbp-caption">\n\
                                            <div> <img src="' + path + '" alt="image gallery"> </div>\n\
                                        </div>\n\
                                        <a href="#" class="title cbp-l-grid-masonry-projects-title" rel="nofollow">' + value.name + '</a>\n\
                                        <div class="description cbp-l-grid-masonry-projects-desc">Plot Size ' + value.plot_area + ' ' + value.plot_unit + ' ; Plot No.' + value.plot_no + '</div>\n\
                                    </div>';
                    });
                    $('.winners-list').html(winners);
                } else {
                    console.log("Not any image");
                }
            }
        });
    }
</script>

<!-- MAIN SCRIPTS - Classic scripts for all theme -->
<script src="js/scripts.js?v=2.3.1"></script>
<!-- END JS FILES -->

<script type='text/javascript' src='js/site.js'></script>

<script type="text/javascript">
    // init cubeportfolio
    $('#gallery_box').cubeportfolio({
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