<?php
include_once 'common_html.php';
include_once 'header_frontend.php';
echo $common['main_container_navigation'];
echo $common['dotted_navigation'];
?>
<!-- End Dotted Navigation -->




<!-- CONTENT -->
<section id="home" class="xl-py t-center fullwidth">
    <!-- Background image - you can choose parallax ratio and offset -->
    <div class="bg-parallax skrollr" data-anchor-target="#home" data-0="transform:translate3d(0, 0px, 0px);" data-900="transform:translate3d(0px, 150px, 0px);" data-background="images/amenities-bg.jpg" style="background-position: center 100%;"></div>

</section>
<!-- END CONTENT -->

<section id="clients" class="pb">

    <!-- Divider -->
    <div class="divider-1 font-11 uppercase container extrabold mt sm-my">
        <div class="t-center">
            <h1 class="extrabold-title">Amenities</h1>
            <div class="title-strips-over dark"></div>
        </div>
    </div>
    <ul class="client-list qdr-col-6 container border-solid border-gray">
        <li><a href="#"><img src="images/entry-gate.jpg" alt=""></a><p>GRAND ENTRY GATE</p></li>
        <li><a href="#"><img src="images/road.png" alt=""></a><p>40 FT. WIDE MAIN ROAD</p></li>
        <li><a href="#"><img src="images/wide-road.jpg" alt=""></a><p>30 FT. WIDE LINK ROAD</p></li>
        <li><a href="#"><img src="images/design.png" alt=""></a><p>DRANAGE SYSTEM</p></li>
        <li><a href="#"><img src="images/electricity.png" alt=""></a><p>ELECTRICITY</p></li>
        <li><a href="#"><img src="images/park.png" alt=""></a><p>PARK</p></li>
        <li><a href="#"><img src="images/commercial-place.jpg" alt=""></a><p>COMMERCIAL PLACE</p></li>
        <li><a href="#"><img src="images/school.jpg" alt=""></a><p>SCHOOL</p></li>
        <li><a href="#"><img src="images/Hospital.png" alt=""></a><p>HOSPITAL</p></li>
        <li><a href="#"><img src="images/fountain.png" alt=""></a><p>FOUNTAIN CHAURAHA</p></li>
        <li><a href="#"><img src="images/temple.png" alt=""></a><p>TEMPLE</p></li>
        <li><a href="#"><img src="images/jogging-track.jpg" alt=""></a><p>JOGGING TRACK</p></li>
        <li><a href="#"><img src="images/camera.png" alt=""></a><p>CCTV CAMERA</p></li>
        <li><a href="#"><img src="images/CommunityCenter.png" alt=""></a><p>COMMUNITY CENTRE</p></li>
        <li><a href="#"><img src="images/gym.png" alt=""></a><p>GYM</p></li>
        <li><a href="#"><img src="images/pool.png" alt=""></a><p>SWIMMING POOL</p></li>
        <li><a href="#"><img src="images/city-center.jpg" alt=""></a><p>OBEDIENT CITY CENTRE</p></li>
    </ul>

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
</body>
<!-- Body End -->
</html>
