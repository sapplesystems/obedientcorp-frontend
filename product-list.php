<?php include_once 'header.php'; ?>
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
                                        <th> Product Name </th>
                                        <th> Product Description </th>
                                        <th> Action </th>
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
