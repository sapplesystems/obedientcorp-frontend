<?php
include_once 'header.php';
$agent_user_id = '';
$agent_user_email = '';
$back_btn = '';
if ($_REQUEST) {
    if ($user_type == 'ADMIN' && $_REQUEST['user_id']) {
        $agent_user_id = $_REQUEST['user_id'];
        $agent_user_email = $_REQUEST['user_email'];
        $back_btn = '<a href="associate-list" class="btn btn-gradient-danger">Back</a>';
    }
}
?>
<!-- partial -->

<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row">
            <div class="col-12">
                <div id="errors_div"></div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row profile-m">
                                    <div class="col-sm-5">
                                        <div class="text-center pb-4">
                                            <div class="avatar-upload">
                                                <div class="avatar-edit">
                                                    <input type='file' id="imageUpload" class="imageUpload" accept=".png, .jpg, .jpeg" />
                                                    <label for="imageUpload"></label>
                                                </div>
                                                <div class="avatar-preview">
                                                    <div id="imagePreview">
                                                    </div>
                                                </div>
                                                <div class="avatar-status"></div>
                                            </div>
                                            <h3 class="text-center" id="profile_user"></h3>
                                            <h4 class="text-center" id="user_code"></h4>
                                            <h5 class="text-center" id="kyc_status"></h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="border-bottom py-4" style="display: none;">
                                            <p>Skills</p>
                                            <div>
                                                <label class="badge badge-outline-dark">Chalk</label>
                                                <label class="badge badge-outline-dark">Hand lettering</label>
                                                <label class="badge badge-outline-dark">Information Design</label>
                                                <label class="badge badge-outline-dark">Graphic Design</label>
                                                <label class="badge badge-outline-dark">Web Design</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <h5 class="border-bottom pb-1"> Rank </h5>
                                                <div class="text-muted" id="rank"></div>
                                            </div>
                                            <div class="col-sm-4">
                                                <h5 class="border-bottom pb-1"> Phone </h5>
                                                <div class="text-muted" id="profile_phone"> </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <h5 class="border-bottom pb-1"> E-mail </h5>
                                                <div class="text-muted" id="profile_mail"> </div>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-sm-4">
                                                <h5 class="border-bottom pb-1"> Total Left BV </h5>
                                                <div class="text-muted" id="total_left_business"></div>
                                            </div>
                                            <div class="col-sm-4">
                                                <h5 class="border-bottom pb-1"> Total Right BV </h5>
                                                <div class="text-muted" id="total_right_business"></div>
                                            </div>
                                            <div class="col-sm-4">
                                                <h5 class="border-bottom pb-1"> Matching BV </h5>
                                                <div class="text-muted" id="matching_business"></div>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-md-12">
                                                <div class="d-flex mt-4 position-relative">
                                                    <span id="business_progress_bar_percentage"></span>
                                                    <div class="progress progress-md flex-grow">
                                                        <div id="business_progress_bar" class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="75" style="width: 0%" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <span class="current_rank">Current Rank: <span id="current_rank" class="text-muted"></span></span>
                                                <span class="next_rank">Next Rank: <span id="next_rank" class="text-muted"></span></span>
                                            </div>
                                        </div>
                                        <button class="btn btn-gradient-primary btn-block" style="display: none;">Preview</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <ul class="nav nav-tabs customTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="info-tab" data-toggle="tab" href="#info-1" role="tab" aria-controls="info" aria-selected="true"><i class="mdi mdi-account-outline"></i> Info</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="bank-details-tab" data-toggle="tab" href="#bank-details-1" role="tab" aria-controls="bank-details" aria-selected="false"><i class="mdi mdi-account-card-details"></i> Bank Details <span id="bank_detail_status"></span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="nominee-tab" data-toggle="tab" href="#nominee-1" role="tab" aria-controls="nominee" aria-selected="false"><i class="mdi mdi-account-check"></i> Nominee <span id="nominee_status"></span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="kyc-tab" data-toggle="tab" href="#kyc-1" role="tab" aria-controls="kyc" aria-selected="false"><i class="mdi mdi-clipboard-check"></i> KYC <span id="kyc_detail_status"></span></a>
                                            </li>
                                            <!--li class="nav-item">
                                                <a class="nav-link" id="activities-tab" data-toggle="tab" href="#activities-1" role="tab" aria-controls="activities" aria-selected="false"><i class="mdi mdi mdi-alarm"></i> Activities</a>
                                            </li-->
                                        </ul>
                                        <div class="tab-content border-0">
                                            <div class="tab-pane fade show active" id="info-1" role="tabpanel" aria-labelledby="info-tab">
                                                <form id="profile_update" name="profile_update" method="post" enctype="multipart/form-data">
                                                    <section>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Introducer<span class="text-danger">*</span></label>
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
                                                            <label class="col-sm-2 col-form-label">Name <span class="text-danger">*</span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control required" placeholder="" id="associate_name" name="associate_name" onkeypress="return isAlphabetKey(event);">
                                                            </div>
                                                            <!--<label class="col-sm-2 col-form-label">Signature Upload<span class="text-danger">*</span></label>
                                                            <div class="col-sm-4">
                                                                <input type="file" class="file-upload-default" name="signature" id="signature">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control file-upload-info " disabled placeholder="Choose File">
                                                                    <span class="input-group-append">
                                                                        <button class="file-upload-browse btn btn-gradient-primary btn-sm" type="button">Upload</button>
                                                                    </span>
                                                                </div>
                                                                <div class="signature_img row lightGallery lightgallery-without-thumb">
                                                                    <a href="#" class="image-tile" id="a_signature_upload">
                                                                        <img src="" alt="image small" style="display:none;width:100px;" id="signature_upload">
                                                                    </a>
                                                                </div>
                                                                <input type="file" class="form-control" placeholder="" name="signature" id="signature">
                                                            </div>-->
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">House No<span class="text-danger"></span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control" placeholder="" name="house_no" id="house_no">
                                                            </div>
                                                            <label class="col-sm-2 col-form-label">Block <span class="text-danger"></span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control" placeholder="" name="block" id="block">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Sector<span class="text-danger"></span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control " placeholder="" name="sector" id="sector">
                                                            </div>
                                                            <label class="col-sm-2 col-form-label">Street No<span class="text-danger"></span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control" placeholder="" name="street_no" id="street_no">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Village Colony<span class="text-danger"></span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control " placeholder="" name="village_colony" id="village_colony">
                                                            </div>
                                                            <label class="col-sm-2 col-form-label">Post Office/Sub City<span class="text-danger"></span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control " placeholder="" name="post_office_or_sub_city" id="post_office_or_sub_city">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">State <span class="text-danger">*</span></label>
                                                            <div class="col-sm-4">
                                                                <select class="form-control required" id="state" name="state">
                                                                    <option value="">-- Select One --</option>
                                                                </select>
                                                            </div>
                                                            <label class="col-sm-2 col-form-label">District <span class="text-danger">*</span></label>
                                                            <div class="col-sm-4">
                                                                <select class="form-control required" id="city" name="city">
                                                                    <option value="">-- Select One --</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Pin Code <span class="text-danger"></span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control" placeholder="" id="pin_code" name="pin_code" onkeypress="return isNumberKey(event);">
                                                            </div>

                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Father/Husband Name <span class="text-danger"></span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control" placeholder="" id="father_or_husband_name" name="father_or_husband_name" onkeypress="return isAlphabetKey(event);">
                                                            </div>
                                                            <label class="col-sm-2 col-form-label">Mother Name <span class="text-danger"></span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control" placeholder="" id="mothers_name" name="mothers_name" onkeypress="return isAlphabetKey(event);">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Gender <span class="text-danger"></span></label>
                                                            <div class="col-sm-4">
                                                                <select class="form-control " id="gender" name="gender">
                                                                    <option value="">-- Select One --</option>
                                                                    <option value="Male">Male</option>
                                                                    <option value="Female">Female</option>
                                                                </select>
                                                            </div>
                                                            <label class="col-sm-2 col-form-label">Date of Birth <span class="text-danger">*</span></label>
                                                            <div class="col-sm-4">
                                                                <div class="input-group date datepicker">
                                                                    <input type="text" class="form-control required" placeholder="" id="dob" name="dob" />
                                                                    <span class="input-group-addon input-group-append border-left">
                                                                        <span class="mdi mdi-calendar input-group-text bg-dark"></span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Mobile<span class="text-danger">*</span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control required" placeholder="" id="mobile_no" name="mobile_no" onkeypress="return isNumberKey(event);">
                                                            </div>
                                                            <label class="col-sm-2 col-form-label">Secondary Mobile</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control" placeholder="" id="land_line_phone" name="land_line_phone" onkeypress="return isNumberKey(event);">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Marital Status <span class="text-danger"></span></label>
                                                            <div class="col-sm-4">
                                                                <select class="form-control" id="marital_status" name="marital_status">
                                                                    <option value="">-- Select One --</option>
                                                                    <option value="Single">Single</option>
                                                                    <option value="Married">Married</option>
                                                                    <option value="Widow">Widow</option>
                                                                    <option value="Divorced">Divorced</option>
                                                                </select>
                                                            </div>
                                                            <label class="col-sm-2 col-form-label">Occupation <span class="text-danger"></span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control" placeholder="" id="occupation" name="occupation" onkeypress="return isAlphabetKey(event);">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">User ID <span class="text-danger">*</span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control required" placeholder="" id="username" name="username" readonly>
                                                            </div>
                                                            <label class="col-sm-2 col-form-label">Email ID <span class="text-danger">*</span></label>
                                                            <div class="col-sm-4">
                                                                <span id="emailid-error" class="error" style="display:none">Enter valid email-id.</span>
                                                                <input type="text" class="form-control required" placeholder="" id="email" name="email">
                                                            </div>
                                                        </div>
                                                    </section>
													<div class="row">
													<div class="col-md-12 text-right">
													<?php echo $back_btn; ?>
                                                    <input type="submit" class="btn btn-gradient-success ml-2" id="profile_update_submit" value="Save" />
													</div></div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="bank-details-1" role="tabpanel" aria-labelledby="bank-details-tab">
                                                <form id="bank_update" name="bank_update" method="post" enctype="multipart/form-data">
                                                    <section>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Payee Name <span class="text-danger"></span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control " placeholder="" id="payee_name" name="payee_name" onkeypress="return isAlphabetKey(event);">
                                                            </div>
                                                            <label class="col-sm-2 col-form-label">Bank Name <span class="text-danger"></span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control " placeholder="" id="bank_name" name="bank_name">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Account Number <span class="text-danger"></span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control " placeholder="" id="account_number" name="account_number" onkeypress="return isNumberKey(event);">
                                                            </div>
                                                            <label class="col-sm-2 col-form-label">Branch <span class="text-danger"></span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control " placeholder="" id="branch" name="branch">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">IFSC Code <span class="text-danger"></span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control " placeholder="" id="ifsc_code" name="ifsc_code">
                                                            </div>
                                                            <label class="col-sm-2 col-form-label d-none d-sm-none d-md-block"></label>
                                                            <div class="col-sm-4 d-none d-sm-none d-md-block">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Cancel Cheque/Bank Copy</label>
                                                            <div class="col-sm-4">
                                                                <div class="input-group">
                                                                    <input type="file" name="img[]" class="file-upload-default" name="cancel_cheque" id="cancel_cheque">
                                                                    <input type="hidden" id="is_cancel_cheque_uploaded" value="" />
                                                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Choose File">
                                                                    <span class="input-group-append">
                                                                        <button class="file-upload-browse btn btn-gradient-primary btn-sm" type="button">Upload</button>
                                                                    </span>
                                                                </div>
                                                                <div class="signature_img row lightGallery lightgallery-without-thumb">
                                                                    <a href="#" class="image-tile" id="a_cancel_cheque_uploded">
                                                                        <img src="" id="cancel_cheque_uploded" class="img-lg mb-3" style="display:none;" alt="small image" />
                                                                    </a>
                                                                </div>
                                                                <div class="pdf_content" id="cancel_cheque_uploded_pdf"></div>
                                                            </div>
                                                        </div>
                                                    </section>
													<div class="row">
													<div class="col-md-12 text-right">
													<?php echo $back_btn; ?>
                                                    <input type="hidden" id="bank_id" value="" />
                                                    <input type="submit" class="btn btn-gradient-success ml-2" id="bank_update_submit" value="Save" style="display:none" />
                                                    
													</div>
													</div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="nominee-1" role="tabpanel" aria-labelledby="nominee-tab">
                                                <form id="nominee_update" name="nominee_update" method="post" enctype="multipart/form-data">
                                                    <section>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Nominee Name <span class="text-danger"></span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control " placeholder="" id="nominee_name" name="nominee_name" onkeypress="return isAlphabetKey(event);">
                                                            </div>
                                                            <label class="col-sm-2 col-form-label">Relation <span class="text-danger"></span></label>
                                                            <div class="col-sm-4">
                                                                <select class="form-control " id="relation" name="relation">
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Date of Birth <span class="text-danger"></span></label>
                                                            <div class="col-sm-4">
                                                                <div class="input-group date datepicker">
                                                                    <input type="text" class="form-control" placeholder="" id="ndob" name="ndob" />
                                                                    <span class="input-group-addon input-group-append border-left">
                                                                        <span class="mdi mdi-calendar input-group-text bg-dark"></span>
                                                                    </span>
                                                                </div>

                                                            </div>
                                                            <label class="col-sm-2 col-form-label">Age <span class="text-danger"></span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control " placeholder="" id="nominee_age" name="nominee_age">
                                                            </div>
                                                        </div>
                                                    </section>
													<div class="row">
													<div class="col-md-12 text-right">
													<?php echo $back_btn; ?>
                                                    <input type="hidden" id="nominee_id" value="" />
                                                    <input type="submit" class="btn btn-gradient-success ml-2" id="nominee_update_submit" value="Save" style="display:none" ; />
													</div>
													</div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="kyc-1" role="tabpanel" aria-labelledby="kyc-tab">
                                                <form id="kyc_update" name="kyc_update" method="post" enctype="multipart/form-data">
                                                    <section>
                                                        <div class="form-group row"><div class="col-sm-12 text-center text-danger" id="kyc_rejected_messsage"></div></div>
                                                        <div class="form-group row">
                                                            <!--<label class="col-sm-2 col-form-label">Date of Birth <span class="text-danger">*</span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control required" placeholder="" id="kyc_dob" name="kyc_dob">
                                                            </div>-->
                                                            <label class="col-sm-2 col-form-label">Nationality <span class="text-danger"></span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control " placeholder="" id="nationality" name="nationality" value="Indian">
                                                            </div>
                                                            <label class="col-sm-2 col-form-label">Occupation </label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control " placeholder="" id="koccupation" name="koccupation" onkeypress="return isAlphabetKey(event);">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Qualification</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control" placeholder="" id="qualification" name="qualification">
                                                            </div>
                                                            <label class="col-sm-2 col-form-label">Proposed Area of Work</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control" placeholder="" id="proposed_area_of_work" name="proposed_area_of_work">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">PAN</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control" placeholder="" id="pan_number" name="pan_number">
                                                            </div>
                                                            <label class="col-sm-2 col-form-label">Pan Upload</label>
                                                            <div class=" input-group col-sm-4">
                                                                <input type="file" name="img" class="file-upload-default" name="pan_image" id="pan_image">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Choose File">
                                                                    <span class="input-group-append">
                                                                        <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                                                                    </span>
                                                                </div>
                                                                <div class="signature_img row lightGallery lightgallery-without-thumb">
                                                                    <a href="#" class="image-tile" id="a_pan_upload">
                                                                        <img src="" style="display:none;width:100px;" id="pan_upload" />
                                                                    </a>
                                                                </div>
                                                                <div class="pdf_content" id="pan_upload_pdf"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Passport<span class="text-danger"></span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control " placeholder="" id="passport_number" name="passport_number">
                                                            </div>
                                                            <label class="col-sm-2 col-form-label">Passport Image 1<span class="text-danger"></span></label>
                                                            <div class=" input-group col-sm-4">
                                                                <span id="passport_image_error_1" class="error" style="display:none">This field is required.</span>
                                                                <input type="file" class="file-upload-default  " name="passport_image" id="passport_image">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Choose File">
                                                                    <span class="input-group-append">
                                                                        <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                                                                    </span>
                                                                </div>
                                                                <div class="signature_img row lightGallery lightgallery-without-thumb">
                                                                    <a href="#" class="image-tile" id="a_passport_upload">
                                                                        <img src="" style="display:none;width:100px;" id="passport_upload" />
                                                                    </a>
                                                                </div>
                                                                <div class="pdf_content" id="passport_upload_pdf"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Passport Image 2<span class="text-danger"></span></label>
                                                            <div class=" input-group col-sm-4">
                                                                <span id="passport_image_error_2" class="error" style="display:none">This field is required.</span>
                                                                <input type="file" class="file-upload-default " name="passport_image2" id="passport_image2">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Choose File">
                                                                    <span class="input-group-append">
                                                                        <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                                                                    </span>
                                                                </div>
                                                                <div class="signature_img row lightGallery lightgallery-without-thumb">
                                                                    <a href="#" class="image-tile" id="a_passport_upload2">
                                                                        <img src="" style="display:none;width:100px;" id="passport_upload2" />
                                                                    </a>
                                                                </div>
                                                                <div class="pdf_content" id="passport_upload2_pdf"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Driving Licence<span class="text-danger"></span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control " placeholder="" id="driving_licence_number" name="driving_licence_number">
                                                            </div>
                                                            <label class="col-sm-2 col-form-label">Driving Licence Image 1<span class="text-danger"></span></label>
                                                            <div class=" input-group col-sm-4">
                                                                <span id="driving_licence_image_error_1" class="error" style="display:none">This field is required.</span>
                                                                <input type="file" class="file-upload-default " name="driving_licence_image" id="driving_licence_image">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Choose File">
                                                                    <span class="input-group-append">
                                                                        <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                                                                    </span>
                                                                </div>
                                                                <div class="signature_img row lightGallery lightgallery-without-thumb">
                                                                    <a href="#" class="image-tile" id="a_driving_upload">
                                                                        <img src="" style="display:none;width:100px;" id="driving_upload" />
                                                                    </a>
                                                                </div>
                                                                <div class="pdf_content" id="driving_upload_pdf"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Driving Licence Image 2<span class="text-danger"></span></label>
                                                            <div class=" input-group col-sm-4">
                                                                <span id="driving_licence_image_error_2" class="error" style="display:none">This field is required.</span>
                                                                <input type="file" class="file-upload-default" name="driving_licence_image2" id="driving_licence_image2">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Choose File">
                                                                    <span class="input-group-append">
                                                                        <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                                                                    </span>
                                                                </div>
                                                                <div class="signature_img row lightGallery lightgallery-without-thumb">
                                                                    <a href="#" class="image-tile" id="a_driving_upload2">
                                                                        <img src="" style="display:none;width:100px;" id="driving_upload2" />
                                                                    </a>
                                                                </div>
                                                                <div class="pdf_content" id="driving_upload2_pdf"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Voter Id</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control" placeholder="" id="voter_id" name="voter_id">
                                                            </div>
                                                            <label class="col-sm-2 col-form-label">Upload Voter Id</label>
                                                            <div class=" input-group col-sm-4">
                                                                <input type="file" class="file-upload-default" name="voter_image" id="voter_image">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Choose File">
                                                                    <span class="input-group-append">
                                                                        <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                                                                    </span>
                                                                </div>
                                                                <div class="signature_img row lightGallery lightgallery-without-thumb">
                                                                    <a href="#" class="image-tile" id="a_voter_upload">
                                                                        <img src="" style="display:none;width:100px;" id="voter_upload" />
                                                                    </a>
                                                                </div>
                                                                <div class="pdf_content" id="voter_upload_pdf"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Aadhaar Number<span class="text-danger">*</span></label>
                                                            <div class="col-sm-4">
                                                                <input type="text" class="form-control required" placeholder="" id="adhar_number" name="adhar_number">
                                                            </div>
                                                            <label class="col-sm-2 col-form-label">Aadhaar Image 1<span class="text-danger">*</span></label>
                                                            <div class=" input-group col-sm-4">
                                                                <input type="file" class="file-upload-default required" name="adhar_image" id="adhar_image">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Choose File">
                                                                    <span class="input-group-append">
                                                                        <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                                                                    </span>
                                                                </div>
                                                                <div class="signature_img row lightGallery lightgallery-without-thumb">
                                                                    <a href="#" class="image-tile" id="a_adhar_upload">
                                                                        <img src="" style="display:none;width:100px;" id="adhar_upload" />
                                                                    </a>
                                                                </div>
                                                                <div class="pdf_content" id="adhar_upload_pdf"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Aadhaar Image 2<span class="text-danger">*</span></label>
                                                            <div class=" input-group col-sm-4">
                                                                <input type="file" class="file-upload-default required" name="adhar_image2" id="adhar_image2">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Choose File">
                                                                    <span class="input-group-append">
                                                                        <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                                                                    </span>
                                                                </div>
                                                                <div class="signature_img row lightGallery lightgallery-without-thumb">
                                                                    <a href="#" class="image-tile" id="a_adhar_upload2">
                                                                        <img src="" style="display:none;width:100px;" id="adhar_upload2" />
                                                                    </a>
                                                                </div>
                                                                <div class="pdf_content" id="adhar_upload2_pdf"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Join Date<span class="text-danger"></span></label>
                                                            <div class="col-sm-4">
                                                                <div class="input-group date datepicker ">
                                                                    <input type="text" class="form-control" placeholder="" id="join_date" name="join_date" />
                                                                    <span class="input-group-addon input-group-append border-left">
                                                                        <span class="mdi mdi-calendar input-group-text bg-dark"></span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>
													<div class="row">
													<div class="col-md-12 text-right">
													<?php echo $back_btn; ?>
                                                    <input type="hidden" id="kyc_id" value="" />
                                                    <input type="submit" class="btn btn-gradient-success ml-2" id="kyc_update_submit" value="Save" />
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
        </div>
    </div>
    <!-- content-wrapper ends -->
    <?php include_once 'footer.php'; ?>
    <script type="text/javascript">
        var agent_user_id = "<?php echo $agent_user_id; ?>";
        var agent_user_email = "<?php echo $agent_user_email; ?>";
    </script>

    <script type="text/javascript" src="assets/javascript/common.js"></script>
    <script type="text/javascript" src="assets/javascript/profile_update.js"></script>
    <script type="text/javascript" src="assets/javascript/bank_update.js"></script>
    <script type="text/javascript" src="assets/javascript/nominee_update.js"></script>
    <script type="text/javascript" src="assets/javascript/kyc_update.js"></script>