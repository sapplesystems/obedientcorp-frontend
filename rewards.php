<?php
include_once 'common_html.php';
include_once 'header_frontend.php';
echo $common['main_container_navigation'];
echo $common['dotted_navigation'];
?>

<!-- CONTENT -->
<section id="home" class="xl-py t-center fullwidth">
    <!-- Background image - you can choose parallax ratio and offset -->
    <div class="bg-parallax skrollr" data-anchor-target="#home" data-0="transform:translate3d(0, 0px, 0px);" data-900="transform:translate3d(0px, 150px, 0px);" data-background="images/rewards-banner.jpg" style="background-position: center 40%;"></div>

</section>
<!-- END CONTENT -->

<!-- Boxes -->
<section id="one" class="py">

    <!-- Divider -->
    <div class="t-center">
        <h1 class="extrabold-title">Rewards</h1>
        <div class="title-strips-over dark"></div>
    </div>
    <!-- BOXES -->
    <div class="container">
        <ul class="rewards_all">

        </ul>
    </div>
    <div class="clearfix"></div>

</section>

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
    getRewards();
    function getRewards() {
        $.ajax({
            url: base_url + 'rewards',
            type: 'post',
            success: function (response) {
                if (response.status == "success") {
                    var rewards = '';
                    $.each(response.data, function (key, value) {
                        var path = 'images/' + value.photo;
                        rewards += '<li><span>&#8377; ' + value.amount + ' &nbsp;-&nbsp;</span><div><img src="' + path + '" /><span class="overlay"><span class="text_overlay"></span></span></div></li>'
                    });
                    $('.rewards_all').append(rewards);

                } else {
                    console.log("Not any image");
                }
            }
        });

    }
</script>
</body>
<!-- Body End -->

</html>