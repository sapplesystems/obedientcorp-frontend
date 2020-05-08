<?php 
include_once 'header.php'; 
$pid = '';
if(isset($_REQUEST['pid'])){
    $pid = $_REQUEST['pid'];
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
                    <form class="forms-sample" id="create_product" name="create_product" method="post" action="" enctype="multipart/form-data">
                        <div class="row">
                            <h4 class="card-title mb-4 col-md-5">Create Product</h4>
                            <div class="col-md-3">
                                <div class="form-group float-right">
                                    <label class="col-form-label float-left mr-3">Category</label>
                                    <div class="float-left">
                                        <select class="form-control required" id="categories" name="categories">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3" id="subcategory_div" style="display:none">
                                <div class="form-group float-right">
                                    <label class="col-form-label float-left mr-3">Sub-Category</label>
                                    <div class="float-left">
                                        <select class="form-control required" id="subcategory" name="subcategory">
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input type="text" class="form-control required" placeholder="Title" id="title" name="title">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Quantity</label>
                                                <input type="text" class="form-control" placeholder="Quantity" id="quantity" name="quantity" onkeypress="return isNumberKey(event);">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Dealer Price</label>
                                                <input type="text" class="form-control required" placeholder="Dealer Price" id="dealer_price" name="" onkeypress="return isNumberKey(event);">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Market Price</label>
                                                <input type="text" class="form-control required" placeholder="Market Price" id="market_price" name="market_place" onkeypress="return isNumberKey(event);">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Bar Code</label>
                                                <input type="text" class="form-control required" placeholder="Bar Code" id="bar_code" name="bar_code">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>SKU</label>
                                                <input type="text" class="form-control required" placeholder="SKU" id="sku" name="sku">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control required" rows="7" id="description" name="description"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Expiry Date</label>
                                                <div id="datepicker-popup" class="input-group date datepicker">
                                                    <input type="text" class="form-control required" readonly placeholder="Expiry Date" id="expiry_date" name="expiry_date">
                                                    <span class="input-group-addon input-group-append border-left">
                                                        <span class="mdi mdi-calendar input-group-text bg-dark"></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Image</label>
                                                <div class="input-images-1" id="product_images"></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Documents</label>
                                                <div class="input-images-2" id="product_docs"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="hidden" name="product_id" id="product_id" value="<?php echo $pid; ?>" />
                                    <button type="submit" class="btn btn-gradient-primary mr-2" id="submit_project" value="submitproject">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div><!--last div -->
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <?php include_once 'footer.php'; ?>
    <script src="assets/javascript/product.js"></script>
    <script src="assets/javascript/image-uploader.min.js"></script>
