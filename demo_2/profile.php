<?php include_once 'header.php'; ?>
            <!-- partial -->
            
            <div class="main-panel ">
                <div class="content-wrapper ">
                    <div class="row">
                        <div class="col-12">
                        <div id="errors_div"></div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="border-bottom text-center pb-4">
                                                <img src="../assets/images/faces/face12.jpg" alt="profile" class="img-lg rounded-circle mb-3" />
                                                <h3 class="text-center" id="profile_user"></h3>
                                            </div>
                                            <div class="border-bottom py-4">
                                                <p>Skills</p>
                                                <div>
                                                    <label class="badge badge-outline-dark">Chalk</label>
                                                    <label class="badge badge-outline-dark">Hand lettering</label>
                                                    <label class="badge badge-outline-dark">Information Design</label>
                                                    <label class="badge badge-outline-dark">Graphic Design</label>
                                                    <label class="badge badge-outline-dark">Web Design</label>
                                                </div>
                                            </div>
                                            <div class="border-bottom py-4">
                                                <div class="d-flex mb-3">
                                                    <div class="progress progress-md flex-grow">
                                                        <div class="progress-bar bg-gradient-primary" role="progressbar" aria-valuenow="55" style="width: 55%" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="progress progress-md flex-grow">
                                                        <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="75" style="width: 75%" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="py-4">
                                                <p class="clearfix">
                                                    <span class="float-left"> Status </span>
                                                    <span class="float-right text-muted"> Active </span>
                                                </p>
                                                <p class="clearfix">
                                                    <span class="float-left"> Phone </span>
                                                    <span class="float-right text-muted" id="profile_phone">  </span>
                                                </p>
                                                <p class="clearfix">
                                                    <span class="float-left"> Mail </span>
                                                    <span class="float-right text-muted" id="profile_mail">  </span>
                                                </p>
                                                <p class="clearfix">
                                                    <span class="float-left"> Facebook </span>
                                                    <span class="float-right text-muted">
                                        <a href="javascript:void(0);">David Grey</a>
                                      </span>
                                                </p>
                                                <p class="clearfix">
                                                    <span class="float-left"> Twitter </span>
                                                    <span class="float-right text-muted">
                                        <a href="javascript:void(0);">@davidgrey</a>
                                      </span>
                                                </p>
                                            </div>
                                            <button class="btn btn-gradient-primary btn-block">Preview</button>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="card">
                                                <div class="card-body">
                                                    <ul class="nav nav-tabs customTab" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" id="info-tab" data-toggle="tab" href="#info-1" role="tab" aria-controls="info" aria-selected="true"><i class="mdi mdi-account-outline"></i> Info</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="bank-details-tab" data-toggle="tab" href="#bank-details-1" role="tab" aria-controls="bank-details" aria-selected="false"><i class="mdi mdi-account-card-details"></i> Bank Details</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="nominee-tab" data-toggle="tab" href="#nominee-1" role="tab" aria-controls="nominee" aria-selected="false"><i class="mdi mdi-account-check"></i> Nominee</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="kyc-tab" data-toggle="tab" href="#kyc-1" role="tab" aria-controls="kyc" aria-selected="false"><i class="mdi mdi-clipboard-check"></i> KYC</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="activities-tab" data-toggle="tab" href="#activities-1" role="tab" aria-controls="activities" aria-selected="false"><i class="mdi mdi mdi-alarm"></i> Activities</a>
                                                        </li>
                                                    </ul>
                                                    <form id="profile_update" name="profile_update" method="post">
                                                    <div class="tab-content border-0">
                                                        <div class="tab-pane fade show active" id="info-1" role="tabpanel" aria-labelledby="info-tab">
                                                            <section>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Sponsor <span class="text-danger">*</span></label>
                                                                    <div class="col-sm-4">
                                                                        <input type="text" class="form-control" placeholder="" id="introducer_code" name ="introducer_code">
                                                                    </div>
                                                                    <label class="col-sm-2 col-form-label">Position <span class="text-danger">*</span></label>
                                                                    <div class="col-sm-4">
                                                                        <select class="form-control" id="orientation" name="orientation">
                                                                                <option value="">-- Select One --</option>
                                                                                <option value="Auto">Auto</option>
                                                                                <option value="Left">Left</option>
                                                                                <option value="Right">Right</option>
                                                                              </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Name <span class="text-danger">*</span></label>
                                                                    <div class="col-sm-4">
                                                                        <input type="text" class="form-control" placeholder=""id="associate_name" name="associate_name">
                                                                    </div>
                                                                    <label class="col-sm-2 col-form-label">Address <span class="text-danger">*</span></label>
                                                                    <div class="col-sm-4">
                                                                        <input type="text" class="form-control" placeholder="" id="address" name="address">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2"></label>
                                                                    <div class="col-sm-4">
                                                                        <label class="col-form-label text-danger p-0">Please enter the Name as given in your Bank Records</label>
                                                                    </div>
                                                                    <label class="col-sm-2"></label>
                                                                    <div class="col-sm-4">
                                                                        <label class="col-form-label text-danger p-0">Please enter Address as given in your Pan and GST Records</label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Father Name <span class="text-danger">*</span></label>
                                                                    <div class="col-sm-4">
                                                                        <input type="text" class="form-control" placeholder="" id="father_or_husband_name" name="father_or_husband_name">
                                                                    </div>
                                                                    <label class="col-sm-2 col-form-label">Mother Name <span class="text-danger">*</span></label>
                                                                    <div class="col-sm-4">
                                                                        <input type="text" class="form-control" placeholder="" id="mothers_name" name="mothers_name">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Gender <span class="text-danger">*</span></label>
                                                                    <div class="col-sm-4">
                                                                        <select class="form-control" id="gender" name="gender">
                                                                                <option value="">-- Select One --</option>
                                                                                <option value="Male">Male</option>
                                                                                <option value="Female">Female</option>
                                                                              </select>
                                                                    </div>
                                                                    <label class="col-sm-2 col-form-label">Date of Birth <span class="text-danger">*</span></label>
                                                                    <div class="col-sm-4">
                                                                        <input type="text" class="form-control" placeholder="" id="dob" name="dob">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Mobile # <span class="text-danger">*</span></label>
                                                                    <div class="col-sm-4">
                                                                        <input type="text" class="form-control" placeholder="" id="mobile_no" name="mobile_no">
                                                                    </div>
                                                                    <label class="col-sm-2 col-form-label">Secondary Mobile #</label>
                                                                    <div class="col-sm-4">
                                                                        <input type="text" class="form-control" placeholder="" id="secondary_mobile_no" name="secondary_mobile_no">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Marital Status <span class="text-danger">*</span></label>
                                                                    <div class="col-sm-4">
                                                                        <select class="form-control" id="marital_status" name="marital_status">
                                                                                <option value="">-- Select One --</option>
                                                                                <option value="Single">Single</option>
                                                                                <option value="Married">Married</option>
                                                                                <option value="Widow">Widow</option>
                                                                                <option value="Divorced">Divorced</option>
                                                                              </select>
                                                                    </div>
                                                                    <label class="col-sm-2 col-form-label">Occupation <span class="text-danger">*</span></label>
                                                                    <div class="col-sm-4">
                                                                        <input type="text" class="form-control" placeholder="" id="occupation" name="occupation">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label"></label>
                                                                    <div class="col-sm-4">
                                                                    </div>
                                                                    <label class="col-sm-2 col-form-label">State <span class="text-danger">*</span></label>
                                                                    <div class="col-sm-4">
                                                                        <select class="form-control" id="state" name ="state">
                                                                                <option>-- Select One --</option>
                                                                              </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Pin Code <span class="text-danger">*</span></label>
                                                                    <div class="col-sm-4">
                                                                        <input type="text" class="form-control" placeholder="" id="pin_code" name="pin_code">
                                                                    </div>
                                                                    <label class="col-sm-2 col-form-label">City <span class="text-danger">*</span></label>
                                                                    <div class="col-sm-4">
                                                                        <select class="form-control" id="city" name="city">
                                                                                <option>-- Select One --</option>
                                                                            </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">PAN <span class="text-danger">*</span></label>
                                                                    <div class="col-sm-4">
                                                                        <input type="text" class="form-control" placeholder="" id="pan" name="pan">
                                                                    </div>
                                                                    <label class="col-sm-2 col-form-label">Email ID <span class="text-danger">*</span></label>
                                                                    <div class="col-sm-4">
                                                                        <input type="email" class="form-control" placeholder="" id="email" name="email" readonly >
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Username <span class="text-danger">*</span></label>
                                                                    <div class="col-sm-4">
                                                                        <input type="text" class="form-control" placeholder="" id="username" name="username" readonly>
                                                                    </div>
                                                                    
                                                                </div>

                                                            </section>
                                                            <!--<input type="button" class="btn btn-primary save_profile" value="Save" />-->
                                                        </div>
                                                        <div class="tab-pane fade" id="bank-details-1" role="tabpanel" aria-labelledby="bank-details-tab">
                                                            <section>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Payee Name</label>
                                                                    <div class="col-sm-4">
                                                                        <input type="text" class="form-control" placeholder=""id="payee_name" name="payee_name">
                                                                    </div>
                                                                    <label class="col-sm-2 col-form-label">Bank Name</label>
                                                                    <div class="col-sm-4">
                                                                        <input type="text" class="form-control" placeholder="" id="bank_name" name="bank_name">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Account Number</label>
                                                                    <div class="col-sm-4">
                                                                        <input type="text" class="form-control" placeholder="" id="account_number" name="account_number">
                                                                    </div>
                                                                    <label class="col-sm-2 col-form-label">Branch</label>
                                                                    <div class="col-sm-4">
                                                                        <input type="text" class="form-control" placeholder="" id="branch" name="branch">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">IFSC Code</label>
                                                                    <div class="col-sm-4">
                                                                        <input type="text" class="form-control" placeholder="" id="ifsc_code" name="ifsc_code">
                                                                    </div>
                                                                    <label class="col-sm-2 col-form-label"></label>
                                                                    <div class="col-sm-4">
                                                                    </div>
                                                                </div>
                                                            </section>
                                                            <input type="hidden" id="bank_id" value="" />
                                                            <!--<input type="button" class="btn btn-primary save_profile" value="Save" />-->
                                                        </div>
                                                        <div class="tab-pane fade" id="nominee-1" role="tabpanel" aria-labelledby="nominee-tab">
                                                            <section>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Nominee Name <span class="text-danger">*</span></label>
                                                                    <div class="col-sm-4">
                                                                        <input type="text" class="form-control" placeholder="" id="nominee_name" name = "nominee_name">
                                                                    </div>
                                                                    <label class="col-sm-2 col-form-label">Relation <span class="text-danger">*</span></label>
                                                                    <div class="col-sm-4">
                                                                        <select class="form-control" id="relation" name="relation">
                                                                                <option value="">-- Select One --</option>
                                                                                <option value="Father">Father</option>
                                                                                <option value="Mother">Mother</option>
                                                                                <option value="Daughter">Daughter</option>
                                                                                <option value="Son">Son</option>

                                                                      </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Date of Birth <span class="text-danger">*</span></label>
                                                                    <div class="col-sm-4">
                                                                        <input type="text" class="form-control" placeholder="" id="ndob" name="ndob">
                                                                    </div>
                                                                    <label class="col-sm-2 col-form-label"></label>
                                                                    <div class="col-sm-4">
                                                                    </div>
                                                                </div>
                                                            </section>
                                                            <input type="hidden" id="nominee_id" value="" />
                                                            <input type="button" class="btn btn-primary save_profile" value="Save" />
                                                        </div>
                                                        <div class="tab-pane fade" id="kyc-1" role="tabpanel" aria-labelledby="kyc-tab">
                                                            <div class="d-flex align-items-start profile-feed-item">
                                                                <img src="../assets/images/faces/face19.jpg" alt="profile" class="img-sm rounded-circle" />
                                                                <div class="ml-4">
                                                                    <h6> Dylan Silva <small class="ml-4 text-muted"><i class="mdi mdi-clock mr-1"></i>10 hours</small>
                                                                    </h6>
                                                                    <p> When I first got into the online advertising business, I was looking for the magical combination that would put my website into the top search engine rankings </p>
                                                                    <img src="../assets/images/samples/1280x768/5.jpg" alt="sample" class="rounded mw-100" />
                                                                    <p class="small text-muted mt-2 mb-0">
                                                                        <span>
                                                        <i class="mdi mdi-star mr-1"></i>4 </span>
                                                                        <span class="ml-2">
                                                        <i class="mdi mdi-comment mr-1"></i>11 </span>
                                                                        <span class="ml-2">
                                                        <i class="mdi mdi-reply"></i>
                                                      </span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="activities-1" role="tabpanel" aria-labelledby="activities">
                                                            <div class="card">
                                                                <div class="card-body p-0">
                                                                    <div class="mt-2">
                                                                        <div class="timeline">
                                                                            <div class="timeline-wrapper timeline-wrapper-warning">
                                                                                <div class="timeline-badge"></div>
                                                                                <div class="timeline-panel">
                                                                                    <div class="timeline-heading">
                                                                                        <h6 class="timeline-title">Bootstrap 4 Beta 2</h6>
                                                                                    </div>
                                                                                    <div class="timeline-body">
                                                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. Quisque mauris augue,</p>
                                                                                    </div>
                                                                                    <div class="timeline-footer d-flex align-items-center">
                                                                                        <i class="mdi mdi-heart-outline text-muted mr-1"></i>
                                                                                        <span>19</span>
                                                                                        <span class="ml-auto font-weight-bold">19 Oct 2017</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="timeline-wrapper timeline-inverted timeline-wrapper-danger">
                                                                                <div class="timeline-badge"></div>
                                                                                <div class="timeline-panel">
                                                                                    <div class="timeline-heading">
                                                                                        <h6 class="timeline-title">Bootstrap 4 Beta 1</h6>
                                                                                    </div>
                                                                                    <div class="timeline-body">
                                                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. Quisque mauris augue,</p>
                                                                                    </div>
                                                                                    <div class="timeline-footer d-flex align-items-center">
                                                                                        <i class="mdi mdi-heart-outline text-muted mr-1"></i>
                                                                                        <span>25</span>
                                                                                        <span class="ml-auto font-weight-bold">10th Aug 2017</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="timeline-wrapper timeline-wrapper-success">
                                                                                <div class="timeline-badge"></div>
                                                                                <div class="timeline-panel">
                                                                                    <div class="timeline-heading">
                                                                                        <h6 class="timeline-title">Bootstrap 4 alpha 6</h6>
                                                                                    </div>
                                                                                    <div class="timeline-body">
                                                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. Quisque mauris augue,</p>
                                                                                    </div>
                                                                                    <div class="timeline-footer d-flex align-items-center">
                                                                                        <i class="mdi mdi-heart-outline text-muted mr-1"></i>
                                                                                        <span>19</span>
                                                                                        <span class="ml-auto font-weight-bold">5th Sep 2016</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="timeline-wrapper timeline-inverted timeline-wrapper-info">
                                                                                <div class="timeline-badge"></div>
                                                                                <div class="timeline-panel">
                                                                                    <div class="timeline-heading">
                                                                                        <h6 class="timeline-title">Bootstrap 4 alpha 3</h6>
                                                                                    </div>
                                                                                    <div class="timeline-body">
                                                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. Quisque mauris augue,</p>
                                                                                    </div>
                                                                                    <div class="timeline-footer d-flex align-items-center">
                                                                                        <i class="mdi mdi-heart-outline text-muted mr-1"></i>
                                                                                        <span>19</span>
                                                                                        <span class="ml-auto font-weight-bold">27th July 2016</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="timeline-wrapper timeline-wrapper-primary">
                                                                                <div class="timeline-badge"></div>
                                                                                <div class="timeline-panel">
                                                                                    <div class="timeline-heading">
                                                                                        <h6 class="timeline-title">Bootstrap 3.3.7</h6>
                                                                                    </div>
                                                                                    <div class="timeline-body">
                                                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. Quisque mauris augue,</p>
                                                                                    </div>
                                                                                    <div class="timeline-footer d-flex align-items-center">
                                                                                        <i class="mdi mdi-heart-outline text-muted mr-1"></i>
                                                                                        <span>25</span>
                                                                                        <span class="ml-auto font-weight-bold">25th July 2016</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="timeline-wrapper timeline-inverted timeline-wrapper-info">
                                                                                <div class="timeline-badge"></div>
                                                                                <div class="timeline-panel">
                                                                                    <div class="timeline-heading">
                                                                                        <h6 class="timeline-title">Bootstrap 4 Alpha 1</h6>
                                                                                    </div>
                                                                                    <div class="timeline-body">
                                                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. Quisque mauris augue,</p>
                                                                                    </div>
                                                                                    <div class="timeline-footer d-flex align-items-center">
                                                                                        <i class="mdi mdi-heart-outline text-muted mr-1"></i>
                                                                                        <span>32</span>
                                                                                        <span class="ml-auto font-weight-bold">19th Aug 2015</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="timeline-wrapper timeline-wrapper-success">
                                                                                <div class="timeline-badge"></div>
                                                                                <div class="timeline-panel">
                                                                                    <div class="timeline-heading">
                                                                                        <h6 class="timeline-title">Bootstrap 3.3.5</h6>
                                                                                    </div>
                                                                                    <div class="timeline-body">
                                                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. Quisque mauris augue,</p>
                                                                                    </div>
                                                                                    <div class="timeline-footer d-flex align-items-center">
                                                                                        <i class="mdi mdi-heart-outline text-muted mr-1"></i>
                                                                                        <span>26</span>
                                                                                        <span class="ml-auto font-weight-bold">15th Jun 2015</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <?php include_once 'footer.php'; ?>
                <script type="text/javascript">
    var error_html = '';
    var state_list;
    if (UserCookieData.id != "" && UserCookieData.email != "") {
        var user_id = UserCookieData.id;
        var user_email = UserCookieData.email;
    }
    $(document).ready(function() {
        $.post('http://localhost/obedientcorp/public/api/state-city-list', {}, function(resp) {
            if (resp.status == 'success') {
                state_list = resp.data.list;
                var state_list_html = '<option>-- Select One --</option>';
                $.each(state_list, function(key, val) {
                    state_list_html += '<option value="' + val.state.id + '">' + val.state.state + '</option>';
                });
                $('#state').html(state_list_html);
                $.ajax({
                    method: "POST",
                    url: "http://localhost/obedientcorp/public/api/profile",
                    data: {
                        id: user_id,
                        email: user_email
                    },
                    success: function(response) {
                        if (response.status == 'success') {
                            var profile = response.data.profile;
                            var bank = response.data.bank_detail[0];
                            var nominee = response.data.nominee_detail[0];
                            $('#introducer_code').val(profile.introducer_code);
                            $('#orientation').val(profile.orientation);
                            $('#associate_name').val(profile.associate_name);
                            $('#profile_user').html(profile.associate_name);
                            $('#address').val(profile.address);
                            $('#father_or_husband_name').val(profile.father_or_husband_name);
                            $('#mothers_name').val(profile.mothers_name);
                            $('#gender').val(profile.gender);
                            $('#dob').val(profile.dob);
                            $('#mobile_no').val(profile.mobile_no);
                            $('#profile_phone').html(profile.mobile_no);
                            $('#secondary_mobile_no').val(profile.secondary_mobile_no);
                            $('#marital_status').val(profile.marital_status);
                            $('#occupation').val(profile.occupation);
                            $('#state').val(profile.state);
                            $('#city').html(getCitiesList(profile.state));
                            $('#city').val(profile.city);
                            $('#pin_code').val(profile.pin_code);
                            $('#pan').val(profile.pan);
                            $('#email').val(profile.email);
                            $('#profile_mail').html(profile.email);
                            $('#username').val(profile.username);

                            $('#bank_id').val(bank.id);
                            $('#payee_name').val(bank.payee_name);
                            $('#bank_name').val(bank.bank_name);
                            $('#account_number').val(bank.account_number);
                            $('#branch').val(bank.branch);
                            $('#ifsc_code').val(bank.ifsc_code);

                            $('#nominee_id').val(nominee.id);
                            $('#nominee_name').val(nominee.nominee_name);
                            $('#relation').val(nominee.relation);
                            $('#ndob').val(nominee.ndob);
                        }
                    },
                    error: function(response) {
                        alert('something went wrong - ' + response);
                    }
                });
            } else {
                alert('something went wrong');
            }
        });

        $(document).on('change', '#state', function(e) {
            e.preventDefault();
            var state_id = $(this).val();
            if (state_id) {
                $('#city').html(getCitiesList(state_id));
            }
        });

        $(document).on('click', '.save_profile', function(e) {
            e.preventDefault();
            $("#profile_update").validate({
                rules: {
                    introducer_code: {required: true,},
                    orientation: {required: true, },
                    associate_name: {required: true,},
                    address: { required: true,},
                    father_or_husband_name: {required: true,},
                    mothers_name: {required: true,},
                    gender: {required: true,},
                    dob: {required: true,},
                    mobile_no: {required: true,},
                    secondary_mobile_no: {required: true,},
                    marital_status: {required: true,},
                    occupation: {required: true,},
                    state: {required: true,},
                    city: {required: true,},
                    pin_code: {required: true,},
                    email: {required: true,},
                    username: {required: true,},
                    payee_name: {required: true,},
                    bank_name: {required: true,},
                    account_number: {required: true,},
                    branch: {required: true,},
                    ifsc_code: {required: true,},
                    bank_name: {required: true,},
                    nominee_name: { required: true, },
                    relation: {required: true,},
                    ndob: {required: true,},
                },

                // Specify validation error messages
               
            }); //validation

            if ($("#profile_update").valid()) 
            {
                
                var params = {
                id: user_id,
                bank_id: $('#bank_id').val(),
                nominee_id: $('#nominee_id').val(),
                introducer_code: $('#introducer_code').val(),
                orientation: $('#orientation').val(),
                associate_name: $('#associate_name').val(),
                address: $('#address').val(),
                father_or_husband_name: $('#father_or_husband_name').val(),
                mothers_name: $('#mothers_name').val(),
                gender: $('#gender').val(),
                dob: $('#dob').val(),
                mobile_no: $('#mobile_no').val(),
                secondary_mobile_no: $('#secondary_mobile_no').val(),
                marital_status: $('#marital_status').val(),
                occupation: $('#occupation').val(),
                state: $('#state').val(),
                city: $('#city').val(),
                pin_code: $('#pin_code').val(),
                pan: $('#pan').val(),
                email: $('#email').val(),
                username: $('#username').val(),
                payee_name: $('#payee_name').val(),
                bank_name: $('#bank_name').val(),
                account_number: $('#account_number').val(),
                branch: $('#branch').val(),
                ifsc_code: $('#ifsc_code').val(),
                nominee_name: $('#nominee_name').val(),
                relation: $('#relation').val(),
                ndob: $('#ndob').val(),
                };

            $.ajax({
                method: "POST",
                url: "http://localhost/obedientcorp/public/api/profile/update",
                data: params,
                success: function(response) {
                    error_html = '';
                    if (response.status == 'success') {
                        error_html += '<div class="alert alert-primary" role="alert">Profile saved successfully</div>';
                    } else {
                        error_html += '<div class="alert alert-warning" role="alert">Profile could not be saved</div>';
                    }
                    $('#errors_div').html(error_html);
                },
                error: function(response) {
                    error_html = '';
                    var error_object = JSON.parse(response.responseText);
                    var message = error_object.message;
                    var errors = error_object.errors;
                    $.each(errors, function(key, value) {
                        error_html += '<div class="alert alert-danger" role="alert">' + value[0] + '</div>';
                    });
                    $('#errors_div').html(error_html);
                }
            });//ajax 
            }//if end
        });
    });

    function getCitiesList(state_id) {
        var cities_list_html = '<option>-- Select One --</option>';
        $.each(state_list[state_id].cities, function(key, val) {
            cities_list_html += '<option value="' + val.id + '">' + val.city + '</option>';
        });
        return cities_list_html;
    }
</script>