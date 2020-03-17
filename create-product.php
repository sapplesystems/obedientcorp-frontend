<?php include_once 'header.php'; ?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper ">
        <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <h4 class="card-title mb-4 col-md-6">Create Product</h4>
                            <div class="col-md-3">
                                <div class="form-group float-right">
                                    <label class="col-form-label float-left mr-3">Category</label>
                                    <div class="float-left">
                                        <select class="form-control" id="categories" name="categories">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3" id="subcategory_div" style="display:none">
                                <div class="form-group float-right">
                                    <label class="col-form-label float-left mr-3">Sub-Category</label>
                                    <div class="float-left">
                                        <select class="form-control" id="subcategory" name="subcategory">
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <form class="forms-sample" id="create_product" name="create_product" method="post" action='' enctype="multipart/form-data">
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
                                                <label>Entry Date</label>
                                                <div id="datepicker-popup" class="input-group date datepicker">
                                                    <input type="text" class="form-control required" placeholder="Entry Date" id="entry_date" name="entry_date">
                                                    <span class="input-group-addon input-group-append border-left">
                                                        <span class="mdi mdi-calendar input-group-text bg-dark"></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Quantity</label>
                                                <input type="text" class="form-control required" placeholder="Quantity" id="quantity" name="quantity">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Dealer Price</label>
                                                <input type="text" class="form-control required" placeholder="Dealer Price" id="dealer_price" name="">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Market Price</label>
                                                <input type="text" class="form-control required" placeholder="Market Price" id="market_price" name="market_place">
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
                                                <label>Details</label>
                                                <input type="text" class="form-control required" placeholder="Details" id="details" name="details">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Expiry Date</label>
                                                <div id="datepicker-popup" class="input-group date datepicker">
                                                    <input type="text" class="form-control required" placeholder="Expiry Date" id="expiry_date" name="expiry_date">
                                                    <span class="input-group-addon input-group-append border-left">
                                                        <span class="mdi mdi-calendar input-group-text bg-dark"></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Image</label>
                                                <div class="input-group">
                                                    <input type="file" name="files[]" id="files" class="file-upload-default required" multiple />
                                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Choose File" id="image" name="image">
                                                    <span class="input-group-append">
                                                        <!--<button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>-->
                                                        <input type="button" class="file-upload-browse btn btn-gradient-primary" id="submit" value='Upload'>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="image_uploaded">
                                                <ul>
                                                    <li><img src="assets/images/product_images_2/thumb_image1.jpg" />
                                                        <i class="mdi mdi-close-circle icon_cancel"></i>
                                                    </li>
                                                    <li><img src="assets/images/product_images_2/thumb_image2.jpg" />
                                                        <i class="mdi mdi-close-circle icon_cancel"></i>
                                                    </li>
                                                    <li><img src="assets/images/product_images_2/thumb_image3.jpg" />
                                                        <i class="mdi mdi-close-circle icon_cancel"></i>
                                                    </li>
                                                    <li><img src="assets/images/product_images_2/thumb_image4.jpg" />
                                                        <i class="mdi mdi-close-circle icon_cancel"></i>
                                                    </li>
                                                    <li><img src="assets/images/product_images_2/thumb_image5.jpg" />
                                                        <i class="mdi mdi-close-circle icon_cancel"></i>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Documents</label>
                                                <div class="input-group">
                                                    <input type="file" name="document[]" id="document" class="file-upload-default required" multiple>
                                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Choose Document" id="documents" name="documents">
                                                    <span class="input-group-append">
                                                        <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="image_uploaded">
                                                <ul>
                                                    <li><img src="assets/images/samples/angular-4.png" />
                                                        <i class="mdi mdi-close-circle icon_cancel"></i>
                                                    </li>
                                                    <li><img src="assets/images/samples/bootstrap-stack.png" />
                                                        <i class="mdi mdi-close-circle icon_cancel"></i>
                                                    </li>
                                                    <li><img src="assets/images/samples/html5.png" />
                                                        <i class="mdi mdi-close-circle icon_cancel"></i>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Videos</label>
                                                <div class="input-group">
                                                    <input type="file" name="video[]" class="file-upload-default required">
                                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Choose Video" id="video" name="video">
                                                    <span class="input-group-append">
                                                        <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="image_uploaded">
                                                <ul>
                                                    <li><img src="assets/images/samples/300x300/1.jpg" />
                                                        <i class="mdi mdi-close-circle icon_cancel"></i>
                                                    </li>
                                                    <li><img src="assets/images/samples/300x300/2.jpg" />
                                                        <i class="mdi mdi-close-circle icon_cancel"></i>
                                                    </li>
                                                    <li><img src="assets/images/samples/300x300/3.jpg" />
                                                        <i class="mdi mdi-close-circle icon_cancel"></i>
                                                    </li>
                                                    <li><img src="assets/images/samples/300x300/4.jpg" />
                                                        <i class="mdi mdi-close-circle icon_cancel"></i>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-gradient-primary mr-2" id="submit_project" value="submitproject">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-4">Categories</h4>
                        <div class="overflowAuto">
                            <table class="table table-bordered custom_action" id="order-listing">
                                <thead>
                                    <tr>
                                        <th width="15%"> Title </th>
                                        <th> Description </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> Sapple Systems 1</td>
                                        <td> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. 1 </td>
                                        <td><a href="edit-product.php" class="btn btn-gradient-primary btn-sm">View/Edit</a></td>
                                    </tr>
                                    <tr>
                                        <td> Sapple Systems 2</td>
                                        <td> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. 2 </td>
                                        <td><a href="edit-product.php" class="btn btn-gradient-primary btn-sm">View/Edit</a></td>
                                    </tr>
                                    <tr>
                                        <td> Sapple Systems 3</td>
                                        <td> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. 3 </td>
                                        <td><a href="edit-product.php" class="btn btn-gradient-primary btn-sm">View/Edit</a></td>
                                    </tr>
                                    <tr>
                                        <td> Sapple Systems 4</td>
                                        <td> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. 4 </td>
                                        <td><a href="edit-product.php" class="btn btn-gradient-primary btn-sm">View/Edit</a></td>
                                    </tr>
                                    <tr>
                                        <td> Sapple Systems 5</td>
                                        <td> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. 5 </td>
                                        <td><a href="edit-product.php" class="btn btn-gradient-primary btn-sm">View/Edit</a></td>
                                    </tr>
                                    <tr>
                                        <td> Sapple Systems 6</td>
                                        <td> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. 6 </td>
                                        <td><a href="edit-product.php" class="btn btn-gradient-primary btn-sm">View/Edit</a></td>
                                    </tr>
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
