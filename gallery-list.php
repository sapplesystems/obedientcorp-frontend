<?php
include_once 'header.php';
if ($user_type != 'ADMIN') {
    echo '<script type="text/javascript">window.location.href="dashboard";</script>';
}
?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper ">
        <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <a href="create-gallery" class="btn btn-gradient-primary">Create Gallery</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-4">Edit/View Gallery</h4>
                        <div class="overflowAuto">
                            <table class="table table-bordered custom_action " id="order-listing">
                                <thead><tr>
                                        <th width="10%">Sr No.</th>
                                        <th width="20%">Gallery Name</th>
                                        <th width="10%">Photo</th>
                                        <th width="10%">Action</th>
                                    </tr></thead>
                                <tbody id="gallery_list">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <?php include_once 'footer.php'; ?>
    <script src="assets/javascript/gallery.js"></script>