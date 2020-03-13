<?php include_once 'header.php'; ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper ">
                    <div class="row grid-margin">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body p-3">
								<div class="row">
								<h4 class="card-title mb-4 col-md-6">View/Edit Product</h4>
									  </div>
									  <div class="clearfix"></div>
                                    <form class="forms-sample">
									<div class="row">
									<div class="col-sm-6">
									<div class="row">
									<div class="col-sm-12">
									  <div class="form-group">
										<label>Title</label>
										<input type="text" class="form-control" placeholder="Title">
									  </div>
									  </div>
									  <div class="col-sm-12">
									  <div class="form-group">
										<label>Entry Date</label>
										<div id="datepicker-popup" class="input-group date datepicker">
										  <input type="text" class="form-control" placeholder="Entry Date">
										  <span class="input-group-addon input-group-append border-left">
											<span class="mdi mdi-calendar input-group-text bg-dark"></span>
										  </span>
										</div>
									  </div>
									  </div>
									  <div class="col-sm-12">
									  <div class="form-group">
										<label>Quantity</label>
										<input type="text" class="form-control" placeholder="Quantity">
									  </div>
									  </div>
									<div class="col-sm-12">
									  <div class="form-group">
										<label>Dealer Price</label>
										<input type="text" class="form-control" placeholder="Dealer Price">
									  </div>
									  </div>
									  <div class="col-sm-12">
									 <div class="form-group">
										<label>Market Price</label>
										<input type="text" class="form-control" placeholder="Market Price">
									  </div>
									  </div>
									  <div class="col-sm-12">
									  <div class="form-group">
										<label>Bar Code</label>
										<input type="text" class="form-control" placeholder="Bar Code">
									  </div>
									  </div>
									  <div class="col-sm-12">
									  <div class="form-group">
										<label>SKU</label>
										<input type="text" class="form-control" placeholder="SKU">
									  </div>
									  </div>
									  <div class="col-sm-12">
									  <div class="form-group">
										<label>Description</label>
										<textarea class="form-control" rows="7"></textarea>
									  </div>
									  </div>
									</div>
									</div>
									
									  <div class="col-sm-6">
									  <div class="row">
									  <div class="col-sm-12">
									  <div class="form-group">
										<label>Details</label>
										<input type="text" class="form-control" placeholder="Details">
									  </div>
									  </div>
									  <div class="col-sm-12">
									  <div class="form-group">
										<label>Expiry Date</label>
										<div id="datepicker-popup" class="input-group date datepicker">
											  <input type="text" class="form-control" placeholder="Expiry Date">
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
										<input type="file" name="img[]" class="file-upload-default">
										  <input type="text" class="form-control file-upload-info" disabled placeholder="Choose File">
										  <span class="input-group-append">
											<button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
										  </span>
										</div>
									  </div>
									  </div>
									  <div class="col-sm-12">
									  <div class="image_uploaded">
									  <ul>
										<li><img src="../assets/images/product_images_2/thumb_image1.jpg" />
											<i class="mdi mdi-close-circle icon_cancel"></i>
										</li>
										<li><img src="../assets/images/product_images_2/thumb_image2.jpg" />
											<i class="mdi mdi-close-circle icon_cancel"></i>
										</li>
										<li><img src="../assets/images/product_images_2/thumb_image3.jpg" />
											<i class="mdi mdi-close-circle icon_cancel"></i>
										</li>
										<li><img src="../assets/images/product_images_2/thumb_image4.jpg" />
											<i class="mdi mdi-close-circle icon_cancel"></i>
										</li>
										<li><img src="../assets/images/product_images_2/thumb_image5.jpg" />
											<i class="mdi mdi-close-circle icon_cancel"></i>
										</li>
									  </ul>
									  </div>
									  </div>
									  <div class="col-sm-12">
									   <div class="form-group">
										<label>Documents</label>
										<div class="input-group">
										<input type="file" name="img[]" class="file-upload-default">
										  <input type="text" class="form-control file-upload-info" disabled placeholder="Choose Document">
										  <span class="input-group-append">
											<button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
										  </span>
										</div>
									  </div>
									  </div>
									  <div class="col-sm-12">
									  <div class="image_uploaded">
									  <ul>
										<li><img src="../assets/images/samples/angular-4.png" />
											<i class="mdi mdi-close-circle icon_cancel"></i>
										</li>
										<li><img src="../assets/images/samples/bootstrap-stack.png" />
											<i class="mdi mdi-close-circle icon_cancel"></i>
										</li>
										<li><img src="../assets/images/samples/html5.png" />
											<i class="mdi mdi-close-circle icon_cancel"></i>
										</li>
									  </ul>
									  </div>
									  </div>
									  <div class="col-sm-12">
									  <div class="form-group">
										<label>Videos</label>
										<div class="input-group">
										<input type="file" name="img[]" class="file-upload-default">
										  <input type="text" class="form-control file-upload-info" disabled placeholder="Choose Video">
										  <span class="input-group-append">
											<button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
										  </span>
										</div>
									  </div>
									  </div>
									  <div class="col-sm-12">
									  <div class="image_uploaded">
									  <ul>
										<li><img src="../assets/images/samples/300x300/1.jpg" />
											<i class="mdi mdi-close-circle icon_cancel"></i>
										</li>
										<li><img src="../assets/images/samples/300x300/2.jpg" />
											<i class="mdi mdi-close-circle icon_cancel"></i>
										</li>
										<li><img src="../assets/images/samples/300x300/3.jpg" />
											<i class="mdi mdi-close-circle icon_cancel"></i>
										</li>
										<li><img src="../assets/images/samples/300x300/4.jpg" />
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
											<a class="btn btn-gradient-success mr-2">Submit</a>
											<a class="btn btn btn-gradient-danger mr-2" href="create-product.php">Cancel</a>
										</div>
									  </div>
									</form>
                                </div>
                            </div>
                        </div>
                    </div>
					
                </div>
                <!-- content-wrapper ends -->
                <?php include_once 'footer.php'; ?>