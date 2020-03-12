<?php include_once 'header.php'; ?>
            <!-- partial -->
            <div class="main-panel ">
                <div class="content-wrapper ">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body p-3">
								<div class="row">
									<div class="col-md-12">
										<h4 class="card-title mb-4">Pending Approval</h4>
									</div>
								</div>
                                    <div class="row">
                                        <div class="col-md-12 customTabs">
										 <ul class="nav nav-pills nav-pills-custom" id="pills-tab" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" id="pills-pending-tab" data-toggle="pill" href="#pills-pending" role="tab" aria-controls="pills-pending" aria-selected="true"> Pending </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="pills-approve-tab" data-toggle="pill" href="#pills-approve" role="tab" aria-controls="pills-approve" aria-selected="false"> Approved </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="pills-reject-tab" data-toggle="pill" href="#pills-reject" role="tab" aria-controls="pills-reject" aria-selected="false"> Rejected </a>
                                                        </li>
                                                    </ul>
													<div class="tab-content tab-content-custom-pill" id="pills-tabContent">
                          <div class="tab-pane fade show active" id="pills-pending" role="tabpanel" aria-labelledby="pills-pending-tab">
										   <table class="table table-striped payment_request">
                                                                    <thead>
                                                                        <tr>
                                                                            <th> Type </th>
                                                                            <th> Amount </th>
                                                                            <th> Agent </th>
                                                                            <th> Date Requested </th>
																			<th> Payment Mode </th>
                                                                            <th> Action </th>
																			<th></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="py-1">
                                                                                <i class="mdi mdi-ticket"></i>
                                                                            </td>
                                                                            <td> Rs. 55000 </td>
                                                                            <td>
                                                                                Ramesh (OA1030)
                                                                            </td>
                                                                            <td>
																			</td>
																			<td></td>
                                                                            <td> <i class="mdi mdi-check-circle" onclick="showSwal('success-message')"></i> &nbsp;<i class="mdi mdi-close-circle" onclick="showSwal('warning-message-and-cancel')"></i> </td>
																			<td><a class="btn btn-link p-0" href="approval-details.html">Details</a></td>
                                                                        </tr>
																		<tr>
                                                                            <td class="py-1">
                                                                                <i class="mdi mdi-ticket"></i>
                                                                            </td>
                                                                            <td> Rs. 55000 </td>
                                                                            <td>
                                                                                Ramesh (OA1030)
                                                                            </td>
                                                                            <td> </td>
																			<td></td>
                                                                            <td> <i class="mdi mdi-check-circle" onclick="showSwal('success-message')"></i> &nbsp;<i class="mdi mdi-close-circle" onclick="showSwal('warning-message-and-cancel')"></i> </td>
																			<td><a class="btn btn-link p-0" href="approval-details.html">Details</a></td>
                                                                        </tr>
																		<tr>
                                                                            <td class="py-1">
                                                                               <i class="mdi mdi-ticket"></i>
                                                                            </td>
                                                                            <td> Rs. 55000 </td>
                                                                            <td>
                                                                                Ramesh (OA1030)
                                                                            </td>
                                                                            <td> </td>
																			<td></td>
                                                                            <td> <i class="mdi mdi-check-circle" onclick="showSwal('success-message')"></i> &nbsp;<i class="mdi mdi-close-circle" onclick="showSwal('warning-message-and-cancel')"></i> </td>
																			<td><a class="btn btn-link p-0" href="approval-details.html">Details</a></td>
                                                                        </tr>
																		<tr>
                                                                            <td class="py-1">
                                                                                <i class="mdi mdi-ticket"></i>
                                                                            </td>
                                                                            <td> Rs. 55000 </td>
                                                                            <td>
                                                                                Ramesh (OA1030)
                                                                            </td>
                                                                            <td> </td>
																			<td></td>
                                                                           <td> <i class="mdi mdi-check-circle" onclick="showSwal('success-message')"></i> &nbsp;<i class="mdi mdi-close-circle" onclick="showSwal('warning-message-and-cancel')"></i> </td>
																		   <td><a class="btn btn-link p-0" href="approval-details.html">Details</a></td>
                                                                        </tr>
																		<tr>
                                                                            <td class="py-1">
                                                                                <i class="mdi mdi-ticket"></i>
                                                                            </td>
                                                                            <td> Rs. 55000 </td>
                                                                            <td>
                                                                                Ramesh (OA1030)
                                                                            </td>
                                                                            <td>  </td>
																			<td></td>
                                                                           <td> <i class="mdi mdi-check-circle" onclick="showSwal('success-message')"></i> &nbsp;<i class="mdi mdi-close-circle" onclick="showSwal('warning-message-and-cancel')"></i> </td>
																		   <td><a class="btn btn-link p-0" href="approval-details.html">Details</a></td>
                                                                        </tr>
																		<tr>
                                                                            <td class="py-1">
                                                                                <i class="mdi mdi-ticket"></i>
                                                                            </td>
                                                                            <td> Rs. 55000 </td>
                                                                            <td>
                                                                                Ramesh (OA1030)
                                                                            </td>
                                                                            <td>  </td>
																			<td></td>
                                                                            <td> <i class="mdi mdi-check-circle" onclick="showSwal('success-message')"></i> &nbsp;<i class="mdi mdi-close-circle" onclick="showSwal('warning-message-and-cancel')"></i> </td>
																			<td><a class="btn btn-link p-0" href="approval-details.html">Details</a></td>
                                                                        </tr>
                                                                        
                                                                    </tbody>
                                                                </table>
																</div>
																<div class="tab-pane fade" id="pills-approve" role="tabpanel" aria-labelledby="pills-approve-tab">
																dsd
																</div>
																<div class="tab-pane fade" id="pills-reject" role="tabpanel" aria-labelledby="pills-reject-tab">
																hhh
																</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="modal fade" id="viewMoreDetails" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
								  <div class="modal-dialog payment-dialog" role="document">
									<div class="modal-content">
									  <div class="modal-header">
										<h5 class="modal-title" id="ModalLabel">More Details</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										  <span aria-hidden="true">&times;</span>
										</button>
									  </div>
									  <div class="modal-body">
										<form>
										<div class="row">
										<div class="col-md-6">
										  <div class="form-group row">
											<label class="col-form-label col-sm-4 text-right">Field-1:</label>
											<div class="col-sm-8">
											<input type="text" class="form-control" id="">
										  </div>
										  </div>
										  </div>
										  <div class="col-md-6">
										  <div class="form-group row">
											<label class="col-form-label col-sm-4 text-right">Field-2:</label>
											<div class="col-sm-8">
											<input type="text" class="form-control" id="">
										  </div>
										  </div>
										  </div>
										  </div>
										  <div class="row">
										<div class="col-md-6">
										  <div class="form-group row">
											<label class="col-form-label col-sm-4 text-right">Field-3:</label>
											<div class="col-sm-8">
											<input type="text" class="form-control" id="">
										  </div>
										  </div>
										  </div>
										  <div class="col-md-6">
										  <div class="form-group row">
											<label class="col-form-label col-sm-4 text-right">Upload Image:</label>
											<div class="input-group col-sm-8">
											<input type="file" name="img[]" class="file-upload-default">
											  <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
											  <span class="input-group-append">
												<button class="file-upload-browse btn btn-gradient-primary pl-3 pr-3" type="button">Upload</button>
											  </span>
											</div>
										  </div>
										  </div>
										  </div>
										  <div class="row">
											<div class="col-sm-12">
											 <div class="form-group row">
											<label for="message-text" class="col-form-label col-sm-2 text-right">Comment:</label>
											<div class="col-sm-10">
											<textarea rows="6" class="form-control" id="message-text"></textarea>
											</div>
										  </div>
											</div>
										  </div>
										  <div class="row">
											<div class="col-sm-12">
											 <div class="form-group row mb-0">
											<label for="message-text" class="col-form-label col-sm-2 text-right">Cancel Reason:</label>
											<div class="col-sm-10">
											<textarea rows="6" class="form-control" id="message-text"></textarea>
											</div>
										  </div>
											</div>
										  </div>
										</form>
									  </div>
									  <div class="modal-footer text-center">
										<button type="button" class="btn btn-success">Approve</button>
										<button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
									  </div>
									</div>
								  </div>
								</div>
                <!-- content-wrapper ends -->
              <?php include_once 'footer.php'; ?>