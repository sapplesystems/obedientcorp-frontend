<?php
include_once 'common_html.php';
include_once 'header_frontend.php';
echo $common['main_container_navigation'];
?>

<!-- Page Title -->
<section id="home" class="xl-py t-center white fullwidth">
    <!-- Background image - you can choose parallax ratio and offset -->
    <div style="background-position: center 15%; background-size: cover;" class="bg-parallax skrollr" data-anchor-target="#home" data-0="transform:translate3d(0, 0px, 0px);" data-900="transform:translate3d(0px, 150px, 0px);" data-background="images/winners.jpg"></div>

</section>
<!-- End Page Title -->


<!-- Dotted Navigation -->
<?php echo $common['dotted_navigation']; ?>
<!-- End Dotted Navigation -->






<!-- GALLERY -->
<section class="pb border-gray gallery-type-1 with-texts py">

    <div class="t-center">
        <h1 class="extrabold-title">Our Franchise</h1>
        <div class="title-strips-over dark"></div>
    </div>

    <!-- Filters -->
    <div class="clearfix sm-py">
        <!-- Works -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="franchise-list"></div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- END GALLERY -->
<?php include_once 'footer_frontend.php'; ?>
<!-- SEARCH FORM FOR NAV -->
<?php echo $common['search_form']; ?>


<!-- jQuery -->
<script src="js/jquery.min.js?v=2.3"></script>

<script type="text/javascript">
    $.ajax({
        url: base_url + 'distributor/our-franchise',
        type: 'post',
        async: false,
        success: function (response) {
            if (response.status == "success") {
                var franchise = '<table class="table">\n\
                                        <thead>\n\
                                            <tr>\n\
                                                <th>Franchise Name</th>\n\
                                                <th>Contact Person</th>\n\
                                                <th>Mobile</th>\n\
                                                <th>Address</th>\n\
                                                <th>City</th>\n\
                                            </tr>\n\
                                        </thead>\n\
                                        <tbody>';
                $.each(response.data, function (key, value) {
                    franchise += '<tr>\n\
                                        <td>' + value.franchise_name + '</td>\n\
                                        <td>' + value.contact_name + '</td>\n\
                                        <td>' + value.mobile_no + '</td>\n\
                                        <td>' + value.address + '</td>\n\
                                        <td>' + value.city + '</td>\n\
                                    </tr>';
                });
                franchise += '</tbody></table>';
                $('#franchise-list').html(franchise);
            }
        }
    });
</script>
<script src="js/scripts.js?v=2.3.1"></script>
<script type='text/javascript' src='js/site.js'></script>
</body>
<!-- Body End -->

</html>