<?php
include_once 'header.php';
if ($user_type != 'ADMIN') {
    echo '<script type="text/javascript">window.location.href="dashboard.php";</script>';
}
?>
<div class="main-panel ">
    <div class="content-wrapper ">
        <?php
        include_once 'upload-landing-image.php';
        include_once 'upload-slider-images.php';
        include_once 'upload-product-image.php';
        ?>
    </div>
    <?php
    include_once 'footer.php';
    ?>

    <script type="text/javascript" src="assets/javascript/upload_landing_image.js"></script>
    <script type="text/javascript" src="assets/javascript/upload_slider_images.js"></script>
    <script type="text/javascript" src="assets/javascript/upload_product_image.js"></script>


