<?php
include_once 'common_html.php';
include_once 'header_frontend.php';
if(isset($_REQUEST['id']) && isset($_REQUEST['id'])!='')
{
    $project_id = $_REQUEST['id'];
}
?>

<?php echo $common['main_container_navigation']; ?>


<!-- Dotted Navigation -->
<?php echo $common['dotted_navigation']; ?>
<!-- End Dotted Navigation -->
<!-- Color Skins -->
    <link rel="stylesheet" href="css/default.css" />
<!-- Page Title -->
<section id="home" class="xl-py t-center white fullwidth">
    <!-- Background image - you can choose parallax ratio and offset -->
    <div class="bg-parallax skrollr" data-anchor-target="#home" data-0="transform:translate3d(0, 0px, 0px);" data-900="transform:translate3d(0px, 200px, 0px);" data-background="images/availability.jpg" style="background-position: center 60%"></div>
</section>
<!-- End Page Title --> 
<!-- GALLERY -->
<section id="plot" class="py container t-left shop shop-styled minHeight200">
<div class="t-center">
        <h1 class="extrabold-title">Plot Availability</h1>
        <div class="title-strips-over dark"></div>
    </div>
<div class="t-center container">
<div class="row custom_ind">
	<div class="col-md-1 col-sm-6 col-6 sm-mt font-14 pl-1 pr-1">
	<span class="stay icon-xs bg-success white m-auto"></span> Free</div>
	<div class="col-md-1 col-sm-6 col-6 sm-mt font-14 pl-1 pr-1">
	<span class="stay icon-xs bg-primary white m-auto"></span> Booked</div>
	<div class="col-md-1 col-sm-6 col-6 sm-mt font-14 pl-1 pr-1">
	<span class="stay icon-xs bg-warning white m-auto"></span> Registry</div>
	<div class="col-md-1 col-sm-6 col-6 sm-mt font-14 pl-1 pr-1">
	<span class="stay icon-xs bg-danger white m-auto"></span> Alloted</div>
	<div class="col-md-1 col-sm-6 col-6 sm-mt font-14 pl-1 pr-1">
	<span class="stay icon-xs bg-colored2 white m-auto"></span> Hold</div>
</div>
 <!-- Row for cols -->
            <div class="row" id="plot-availability">
                <input type="hidden" value="<?php echo $project_id; ?>" id="project-id"/>
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
<!-- jQuery -->
<script src="js/jquery.min.js?v=2.3"></script>
<!-- MAIN SCRIPTS - Classic scripts for all theme -->
<script src="js/scripts.js?v=2.3.1"></script>
<!-- END JS FILES -->
<script src="assets/javascript/availability.js"></script>


<script type='text/javascript' src='js/site.js'></script>



</body>
<!-- Body End -->

</html>