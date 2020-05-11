<?php 
include_once 'header.php'; 
if ($user_type != 'ADMIN') {
    echo '<script type="text/javascript">window.location.href="dashboard";</script>';
}
?>
<link rel="stylesheet" href="assets/css/image-uploader.min.css">
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper ">
        <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <a href="create-product" class="btn btn-gradient-primary">Add Product</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-4">Products</h4>
                        <div class="overflowAuto">
                            <table class="table table-bordered custom_action" id="order-listing">
                                <thead>
                                    <tr>
                                        <th width="10%"> Sr.No </th>
                                        <th width="10%"> Product Name </th>
                                        <th width="10%"> Category Name </th>
                                        <th width="10%"> Sub Category Name </th>
                                        <th width="10%"> Product Description </th>
                                        <th width="10%"> Action </th>
                                    </tr>
                                </thead>
                                <tbody id="product_list">
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
    <script src="assets/javascript/product.js"></script>
    <script src="assets/javascript/image-uploader.min.js"></script>
