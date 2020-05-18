<?php
include_once 'common_html.php';
include_once 'header_frontend.php';
echo $common['main_container_navigation'];
echo $common['dotted_navigation'];
?>

<!-- CONTENT -->
<section id="home" class="xl-py t-center fullwidth">
    <!-- Background image - you can choose parallax ratio and offset -->
    <div class="bg-parallax skrollr" data-anchor-target="#home" data-0="transform:translate3d(0, 0px, 0px);" data-900="transform:translate3d(0px, 150px, 0px);" data-background="images/banking-banner.jpg"></div>

</section>
<!-- END CONTENT -->
 
<!-- Boxes -->
<section id="one" class="py minHeight575">

    <!-- Divider --> 
    <div class="t-center">
        <h1 class="extrabold-title">Our Bankers</h1>
        <div class="title-strips-over dark"></div>
    </div>
    <!-- BOXES -->
    <div class="t-center container qdr-col-2 bank_logos">
	<!-- Box -->
        <div class="qdr-hover-container slide-in-fwd-left">
            <!-- Icon -->
            <div class="mb-4">
                <img src="images/canara.png" />
            </div>
            <p class="gray9"><strong>Obedient Marketing Universal Pvt. Ltd.</strong></p>
            <p class="xxs-mt gray6 font15"><strong>Account No.</strong> - 0627214000018<br><strong>IFSC Code</strong> : CNRB0000627<br><strong>Branch</strong> - Civil Lines Prayagraj.</p>
        </div>
        <!-- End Box -->
        <!-- Box -->
        <div class="qdr-hover-container slide-in-fwd-right">
            <!-- Icon -->
            <div class="mb-4">
                <img src="images/canara.png" />
            </div>
            <p class="gray9"><strong>Obedient Infra Development Pvt. Ltd.</strong></p>
            <p class="xxs-mt gray6 font15"><strong>Account No.</strong> - 0627214000013<br><strong>IFSC Code</strong> : CNRB0000627<br><strong>Branch</strong> - Civil Lines, Prayagraj.</p>
        </div>
        <!-- End Box -->
        <!-- Box -->
        <div class="qdr-hover-container slide-in-fwd-left mt-3">
            <!-- Icon -->
            <div class="mb-4">
                <img src="images/yes.png" />
            </div> 
            <p class="gray9"><strong>Obedient Infra Development Pvt. Ltd.</strong></p>
            <p class="xxs-mt gray6 font15"><strong>Account No.</strong> - 011663300001143<br><strong>IFSC Code</strong> : YESB0000116<br><strong>Branch</strong> - Civil Lines Prayagraj.</p>
        </div>
        <!-- End Box -->
		 <!-- Box -->
        <div class="qdr-hover-container slide-in-fwd-right mt-3">
            <!-- Icon -->
            <div class="mb-4">
                <img src="images/Kotak.jpg" />
            </div>
            <p class="gray9"><strong>Obedient Infra Development Pvt. Ltd.</strong></p>
            <p class="xxs-mt gray6 font15"><strong>Account No.</strong> - 2312903536<br><strong>IFSC Code</strong> : KKBK0005077<br><strong>Branch</strong> - Lowther Road, Prayagraj.</p>
        </div>
        <!-- End Box -->
    </div>

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
