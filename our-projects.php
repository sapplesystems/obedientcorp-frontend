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
    <div class="bg-parallax skrollr" data-anchor-target="#home" data-0="transform:translate3d(0, 0px, 0px);" data-900="transform:translate3d(0px, 200px, 0px);" data-background="images/all-sites.jpg" style="background-position: center 111%;"></div>
</section>
<!-- End Page Title -->
<!-- GALLERY -->
<section id="shop" class="sm-pt container t-left shop shop-styled minHeight200 py">
    <!-- Filters -->
    <!--<div class="row">
        <div class="col-sm-4">
            <select class="form-control" id="sub_categories">
                <option value="">Select Category</option>
            </select>
        </div>
        <div class="col-sm-4"></div>
    </div>-->
    <!-- Items -->

    <div class="t-center">
        <h1 class="extrabold-title">All Our Projects</h1>
        <div class="title-strips-over dark"></div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <ul class="product_list" id="all-site">

            </ul>
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
<script type="text/javascript">
    getAllSites();

    function getAllSites() {
        $.ajax({
            url: base_url + 'get-all-sites',
            type: 'post',
            success: function(response) {
                console.log(response);
                var all_sites = '';
                var path='';
                var pro_id ='';
                var sub_pro_id ='';
                if (response.status == "success") {

                    $.each(response.data, function(key, value) {
                        path = media_url+'project_photo/'+value.photo;
                        pro_id = value.project_master_id;
                        sub_pro_id = value.sub_project_id;
                        all_sites += ' <li>\n\
                    <div class="product_info">\n\
                        <img src="'+path+'" alt="" />\n\
                        <!--div class="info_hover"><a href="javascript:void(0);">Add to cart</a></div-->\n\
                    </div>\n\
                    <div class="title">'+value.name+'</div>\n\
                    <div class="price">\n\
                        <span class="new">'+value.description+'</span>\n\
                    </div>\n\
                    <a href="availability.php?pid='+pro_id+'&spid='+sub_pro_id+'" class="btn btn-primary btn-sm font-12 mt-3">Check Plot Availability</a>\n\
                </li>'
                    });
                    $('#all-site').html(all_sites);

                } else {
                    console.log("Not any image");
                }
            }
        });

    }
</script>
<!-- jQuery -->
<script src="js/jquery.min.js?v=2.3"></script>
<!-- MAIN SCRIPTS - Classic scripts for all theme -->
<script src="js/scripts.js?v=2.3.1"></script>
<!-- END JS FILES -->
<script type='text/javascript' src='js/site.js'></script>

</body>
<!-- Body End -->

</html>