<?php
include_once 'common_html.php';
include_once 'header_frontend.php';
echo $common['main_container_navigation'];
?>

<!-- Page Title -->
<section id="home" class="xl-py t-center white fullwidth">
    <!-- Background image - you can choose parallax ratio and offset -->
    <div style="background-position:30% 18%;" class="bg-parallax skrollr gallery_pos" data-anchor-target="#home" data-0="transform:translate3d(0, 0px, 0px);" data-900="transform:translate3d(0px, 150px, 0px);" data-background="images/gallery-banner.jpg"></div>

</section>
<!-- End Page Title -->

 
<!-- Dotted Navigation -->
<?php echo $common['dotted_navigation']; ?>
<!-- End Dotted Navigation -->






<!-- GALLERY -->
<section class="pb border-gray t-center gallery-type-1 with-texts py">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="t-center">
                    <h1 class="extrabold-title">Gallery</h1>
                    <div class="title-strips-over dark"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- Accordion -->
                <div id="two" class="gallery-list">

                </div>
                <!-- End Accordion -->
            </div>
        </div>

</section>
<!-- END GALLERY -->
<?php include_once 'footer_frontend.php'; ?>
<!-- SEARCH FORM FOR NAV -->
<?php echo $common['search_form']; ?>

<script type="text/javascript">
    getGalleryTitle();

    function getGalleryTitle() {
        $.ajax({
            url: base_url + 'gallery-list',
            type: 'post',
            async: false,
            success: function (response) {
                if (response.status == "success") {
                    var gallery = '';
                    var i = 1;

                    $.each(response.data, function (key, value) {
                        var class_add = '';
                        if (i == 1)
                        {
                            class_add = 'border-';
                        }
                        gallery += '<div class="card mini-mb ' + class_add + '">\n\
                        <div class="card-header c-pointer bg-white bs-light-hover slow" data-toggle="collapse" data-target="#two-' + i + '" id="gal_two_' + i + '" aria-expanded="true" aria-controls="two-' + i + '" onclick="getGalleryImages(event,' + value.id + ',' + i + ')">\n\
                        <h5 class="bold-subtitle">' + value.title + ' </h5>\n\
                        <div id="gallery_images_' + i + '"></div>\n\
                                        </div>\n\
                                    </div>';

                        i = i + 1;
                    });
                    $('.gallery-list').html(gallery);
                    //$('#gal_two_1').click();
                } else {
                    console.log("Not any image");
                }
            }
        });
    }//end function get gallery title
    //function get gallery images 
    function getGalleryImages(e, id, i) {
        e.preventDefault();
        if ($('#two-' + i).hasClass('show')) {
            setTimeout(function () {
                $('#two-' + i).removeClass('show');
            }, 2000);
            $('#two-' + i).hide();
            return false;
        }
        $.ajax({
            url: base_url + 'gallery-image-list',
            type: 'post',
            data: {gallery_id: id},
            async: true,
            success: function (response) {
                console.log(response);
                if (response.status == "success") {
                    var path = '';
                    var html = '<div id="two-' + i + '" class="collapse" data-parent="#two" onclick="event.stopPropagation();">\n\
                    <div class="card-body">\n\
                    <div class="qdr-col-3 gap-3 lightbox_gallery clearfix lightboxed">';
                    $.each(response.data, function (key, value) {
                        path = media_url + 'gallery_photo/' + value.file_name
                        html += '<div>\n\
                            <a href="' + path + '" class="thumbnail-img block-img">\n\
                                <img src="' + path + '" alt="">\n\
                                <div class="img-overlay">\n\
                                    <div class="overlay-wrap"><i class="fa fa-expand font-20"></i></div>\n\
                                </div>\n\
                            </a>\n\
                            </div>';

                    });
                    html += '</div><!qdr -->\n\
                </div><!--card--body -->\n\
                </div><!--collapse -->';
                    $('#gallery_images_' + i).html(html);
                    $('.collapse').removeClass('show');
                    $('#two-' + i).addClass('show');
                }
            }
        });

    }//end function for get gallery images
</script>
<!-- jQuery -->
<script src="js/jquery.min.js?v=2.3"></script>
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