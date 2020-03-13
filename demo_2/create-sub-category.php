<?php include_once 'header.php'; ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper ">
                    <div class="row grid-margin">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body p-3">
								<div class="row">
								<h4 class="card-title mb-4 col-md-6">Create Sub-Category</h4>
								<div class="col-md-6">
								<div class="form-group float-right">
										<label class="col-form-label float-left mr-3">Category</label>
										<div class="float-left">
										  <select class="form-control">
											<option>Select</option>
											<option>Category-1</option>
											<option>Category-2</option>
											<option>Category-3</option>
										  </select>
										</div>
									  </div>
									  </div>
									  </div>
									  <div class="clearfix"></div>
                                    <form class="forms-sample">
									<div class="row">
									<div class="col-sm-6">
									  <div class="form-group">
										<label>Title</label>
										<input type="text" class="form-control" placeholder="Title">
									  </div>
									  </div>
									  <div class="col-sm-6">
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
									  </div>
									  <div class="row">
										<div class="col-sm-12">
									  <div class="form-group">
										<label>Description</label>
										<textarea class="form-control" rows="7"></textarea>
									  </div>
									  </div>
									  </div>
									  <div class="row">
										<div class="col-sm-12">
											<button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
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
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td> Sapple Systems 1</td>
                          <td> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. 1 </td>
                        </tr>
						<tr>
                          <td> Sapple Systems 2</td>
                          <td> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. 2 </td>
                        </tr>
						<tr>
                          <td> Sapple Systems 3</td>
                          <td> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. 3 </td>
                        </tr>
						<tr>
                          <td> Sapple Systems 4</td>
                          <td> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. 4 </td>
                        </tr>
						<tr>
                          <td> Sapple Systems 5</td>
                          <td> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. 5 </td>
                        </tr>
						<tr>
                          <td> Sapple Systems 6</td>
                          <td> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. 6 </td>
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