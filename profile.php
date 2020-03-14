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
												  <div class="avatar-upload">
															<div class="avatar-edit">
																<input type='file' id="imageUpload" class="imageUpload" accept=".png, .jpg, .jpeg" />
																<label for="imageUpload"></label>
															</div>
															<div class="avatar-preview">
																<div id="imagePreview">
																</div>
															</div>
														</div>
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
                                        <span class="float-right text-muted" id="profile_phone"> </span>
                                    </p>
                                    <p class="clearfix">
                                        <span class="float-left"> Mail </span>
                                        <span class="float-right text-muted" id="profile_mail"> </span>
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
                                    <div class="card-body p-0">
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
                                        <div class="tab-content border-0">
                                            <div class="tab-pane fade show active" id="info-1" role="tabpanel" aria-labelledby="info-tab">
                                                <form id="profile_update" name="profile_update" method="post" enctype="multipart/form-data">
                                                    <section>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Sponsor <span class="text-danger">*</span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control required" placeholder="" id="introducer_code" name="introducer_code" readonly>
                                                            </div>
                                                            <label class="col-sm-2 col-form-label">Position <span class="text-danger">*</span></label>
                                                            <div class="col-sm-4">
                                                                <select class="form-control required" id="orientation" name="orientation" disabled>
                                                                    <option value="">-- Select One --</option>
                                                                    <option value="Auto">Auto</option>
                                                                    <option value="Left">Left</option>
                                                                    <option value="Right">Right</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Application Signature image <span class="text-danger">*</span></label>
                                                            <div class="col-sm-4">
                                                                <input type="file" class="form-control" placeholder="" name="signature" id="signature">
                                                            </div>
                                                            <label class="col-sm-2 col-form-label">Applicant Photo <span class="text-danger">*</span></label>
                                                            <div class="col-sm-4">
                                                                <input type="file" class="form-control" placeholder="" name="photo" id="photo">
                                                               <!--<img src="" alt="profile" id="application_photo" class="img-lg rounded-circle mb-3" style="display:none;" />-->
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Name <span class="text-danger">*</span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control required" placeholder="" id="associate_name" name="associate_name">
                                                            </div>
                                                            <!--<label class="col-sm-2 col-form-label">Address <span class="text-danger">*</span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control required" placeholder="" id="address" name="address">
                                                            </div>-->
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">House No<span class="text-danger">*</span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control required" placeholder="" name="house_no" id="house_no">
                                                            </div>
                                                            <label class="col-sm-2 col-form-label">Block <span class="text-danger">*</span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control required" placeholder="" name="block" id="block">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Sector<span class="text-danger">*</span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control required" placeholder="" name="sector" id="sector">
                                                            </div>
                                                            <label class="col-sm-2 col-form-label">Street No<span class="text-danger">*</span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control required" placeholder="" name="street_no" id="street_no">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Village Colony<span class="text-danger">*</span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control required" placeholder="" name="village_colony" id="village_colony">
                                                            </div>
                                                            <label class="col-sm-2 col-form-label">Post Office/Sub City<span class="text-danger">*</span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control required" placeholder="" name="post_office_or_sub_city" id="post_office_or_sub_city">
                                                            </div>
                                                        </div>
                                                        <!--<div class="form-group row">
                                                            <label class="col-sm-2"></label>
                                                            <div class="col-sm-4">
                                                                <label class="col-form-label text-danger p-0">Please enter the Name as given in your Bank Records</label>
                                                            </div>
                                                            <label class="col-sm-2"></label>
                                                            <div class="col-sm-4">
                                                                <label class="col-form-label text-danger p-0">Please enter Address as given in your Pan and GST Records</label>
                                                            </div>
                                                        </div>-->
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Father Name <span class="text-danger">*</span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control required" placeholder="" id="father_or_husband_name" name="father_or_husband_name">
                                                            </div>
                                                            <label class="col-sm-2 col-form-label">Mother Name <span class="text-danger">*</span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control required" placeholder="" id="mothers_name" name="mothers_name">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Gender <span class="text-danger">*</span></label>
                                                            <div class="col-sm-4">
                                                                <select class="form-control required" id="gender" name="gender">
                                                                    <option value="">-- Select One --</option>
                                                                    <option value="Male">Male</option>
                                                                    <option value="Female">Female</option>
                                                                </select>
                                                            </div>
                                                            <label class="col-sm-2 col-form-label">Date of Birth <span class="text-danger">*</span></label>
                                                            <div class="col-sm-4">
                                                                <div class="input-group date datepicker">
                                                                    <input type="text" class="form-control required" placeholder="" id="dob" name="dob" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd-mm-yyyy" />
                                                                    <span class="input-group-addon input-group-append border-left">
                                                                        <span class="mdi mdi-calendar input-group-text bg-dark"></span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Mobile # <span class="text-danger">*</span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control required" placeholder="" id="mobile_no" name="mobile_no" data-inputmask-alias="9999999999" im-insert="true" >
                                                            </div>
                                                            <label class="col-sm-2 col-form-label">Land Line Phone #</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control required" placeholder="" id="land_line_phone" name="land_line_phone">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Marital Status <span class="text-danger">*</span></label>
                                                            <div class="col-sm-4">
                                                                <select class="form-control required" id="marital_status" name="marital_status">
                                                                    <option value="">-- Select One --</option>
                                                                    <option value="Single">Single</option>
                                                                    <option value="Married">Married</option>
                                                                    <option value="Widow">Widow</option>
                                                                    <option value="Divorced">Divorced</option>
                                                                </select>
                                                            </div>
                                                            <label class="col-sm-2 col-form-label">Occupation <span class="text-danger">*</span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control required" placeholder="" id="occupation" name="occupation">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label"></label>
                                                            <div class="col-sm-4">
                                                            </div>
                                                            <label class="col-sm-2 col-form-label">State <span class="text-danger">*</span></label>
                                                            <div class="col-sm-4">
                                                                <select class="form-control required" id="state" name="state">
                                                                    <option>-- Select One --</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Pin Code <span class="text-danger">*</span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control required" placeholder="" id="pin_code" name="pin_code">
                                                            </div>
                                                            <label class="col-sm-2 col-form-label">District <span class="text-danger">*</span></label>
                                                            <div class="col-sm-4">
                                                                <select class="form-control required" id="city" name="city">
                                                                    <option>-- Select One --</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">PAN <span class="text-danger">*</span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control required" placeholder="" id="pan" name="pan">
                                                            </div>
                                                            <label class="col-sm-2 col-form-label">Email ID <span class="text-danger">*</span></label>
                                                            <div class="col-sm-4">
                                                                <input type="email" class="form-control required" placeholder="" id="email" name="email" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Username <span class="text-danger">*</span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control required" placeholder="" id="username" name="username" readonly>
                                                            </div>
                                                        </div>
                                                    </section>
                                                    <input type="submit" class="btn btn-primary" id="profile_update_submit" value="Save" />
                                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="bank-details-1" role="tabpanel" aria-labelledby="bank-details-tab">
                                                <form id="bank_update" name="bank_update" method="post" enctype="multipart/form-data">
                                                    <section>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Payee Name</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control required" placeholder="" id="payee_name" name="payee_name">
                                                            </div>
                                                            <label class="col-sm-2 col-form-label">Bank Name</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control required" placeholder="" id="bank_name" name="bank_name">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Account Number</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control required" placeholder="" id="account_number" name="account_number">
                                                            </div>
                                                            <label class="col-sm-2 col-form-label">Branch</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control required" placeholder="" id="branch" name="branch">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">IFSC Code</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control required" placeholder="" id="ifsc_code" name="ifsc_code">
                                                            </div>
                                                            <label class="col-sm-2 col-form-label"></label>
                                                            <div class="col-sm-4">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Cancel Cheque <span class="text-danger">*</span></label>
                                                            <div class="col-sm-4">
                                                                <input type="file" class="form-control" placeholder="" name="cancel_cheque" id="cancel_cheque">
                                                            </div>
                                                        </div>
                                                    </section>
                                                    <input type="hidden" id="bank_id" value="" />
                                                    <input type="submit" class="btn btn-primary" id="bank_update_submit" value="Save" />
                                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="nominee-1" role="tabpanel" aria-labelledby="nominee-tab">
                                                <form id="nominee_update" name="nominee_update" method="post" enctype="multipart/form-data">
                                                    <section>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Nominee Name <span class="text-danger">*</span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control required" placeholder="" id="nominee_name" name="nominee_name">
                                                            </div>
                                                            <label class="col-sm-2 col-form-label">Relation <span class="text-danger">*</span></label>
                                                            <div class="col-sm-4">
                                                                <select class="form-control required" id="relation" name="relation">
                                                                    <option value="">--Select One Relation--</option>
                                                                    <option value="Mother">Mother</option>
                                                                    <option value="Father">Father</option>
                                                                    <option value="Son">Son</option>
                                                                    <option value="Daughter">Daughter</option>
                                                                    <option value="Sister">Sister</option>
                                                                    <option value="Brother">Brother</option>

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Father Name <span class="text-danger">*</span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control required" placeholder="" id="father_name" name="father_name">
                                                            </div>
                                                            <label class="col-sm-2 col-form-label">Mother Name <span class="text-danger">*</span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control required" placeholder="" id="mother_name" name="mother_name">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Date of Birth <span class="text-danger">*</span></label>
                                                            <div class="col-sm-4">
                                                                <div class="input-group date datepicker">
                                                                    <input type="text" class="form-control required" placeholder="" id="ndob" name="ndob" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd-mm-yyyy" />
                                                                    <span class="input-group-addon input-group-append border-left">
                                                                        <span class="mdi mdi-calendar input-group-text bg-dark"></span>
                                                                    </span>
                                                                </div>

                                                            </div>
                                                            <label class="col-sm-2 col-form-label">Age <span class="text-danger">*</span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control required" placeholder="" id="nominee_age" name="nominee_age">
                                                            </div>
                                                        </div>
                                                    </section>
                                                    <input type="hidden" id="nominee_id" value="" />
                                                    <input type="submit" class="btn btn-primary" id="nominee_update_submit" value="Save" />
                                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="kyc-1" role="tabpanel" aria-labelledby="kyc-tab">
                                                <form id="kyc_update" name="kyc_update" method="post">
                                                    <section>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Date of Birth <span class="text-danger">*</span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control required" placeholder="" id="kyc_dob" name="kyc_dob">
                                                            </div>
                                                            <label class="col-sm-2 col-form-label">Nationality <span class="text-danger">*</span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control required" placeholder="" id="nationality" name="nationality">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Occupation <span class="text-danger">*</span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control required" placeholder="" id="koccupation" name="koccupation">
                                                            </div>
                                                            <label class="col-sm-2 col-form-label">Qualification <span class="text-danger">*</span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control required" placeholder="" id="qualification" name="qualification">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">PAN <span class="text-danger">*</span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control required" placeholder="" id="pan_number" name="pan_number">
                                                            </div>
                                                            <label class="col-sm-2 col-form-label">Passport <span class="text-danger">*</span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control" placeholder="" id="passport_number" name="passport_number">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Driving Licence <span class="text-danger">*</span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control" placeholder="" id="driving_licence_number" name="driving_licence_number">
                                                            </div>
                                                            <label class="col-sm-2 col-form-label">Proposed Area of Work <span class="text-danger">*</span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control" placeholder="" id="proposed_area_of_work" name="proposed_area_of_work">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Voter Id <span class="text-danger">*</span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control" placeholder="" id="voter_id" name="voter_id">
                                                            </div>
                                                            <label class="col-sm-2 col-form-label">Join Date <span class="text-danger">*</span></label>
                                                            <div class="col-sm-4">
                                                            <div class="input-group date datepicker">
                                                                    <input type="text" class="form-control required" placeholder="" id="join_date" name="join_date" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd-mm-yyyy" />
                                                                    <span class="input-group-addon input-group-append border-left">
                                                                        <span class="mdi mdi-calendar input-group-text bg-dark"></span>
                                                                    </span>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                    </section>
                                                    <input type="hidden" id="kyc_id" value="" />
                                                    <input type="submit" class="btn btn-primary" id="kyc_update_submit" value="Save" />
                                                </form>
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
    <script src="assets/javascript/common.js"></script>
    <script src="assets/javascript/profile_update.js"></script>
    <script src="assets/javascript/bank_update.js"></script>
    <script src="assets/javascript/nominee_update.js"></script>
    <script src="assets/javascript/kyc_update.js"></script>
	<script src="assets/js/file-upload.js"></script>
	<script>
	function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
				reader.readAsDataURL(input.files[0]);
			}
		}
		$("#imageUpload").change(function() {
			readURL(this);
		});
	</script>