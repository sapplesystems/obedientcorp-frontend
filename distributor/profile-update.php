<?php
include_once 'header-copy.php';
?>
<style>
    .overflowAuto_d {
        overflow: auto;
        width: 100%;
    }

    .add-distributor_heading {
        width: 100%;
        background-color: #b66dff;
        padding: 10px 10px;
        margin-bottom: 0px;
		color:#ffffff;
    }

    .border-div {
        border: 1px solid #ededed;
        padding: 15px;
        margin-bottom: 20px;
    }

    .distributor-details-icon {
        font-size: 40px;
        vertical-align: middle;
    }
	
[type="radio"]:checked + label::before, [type="radio"]:not(:checked) + label::before{width: 20px;height: 20px;}
.profile-pic {
    display: block;
}

.file-upload {
    display: none;
}
.circle {
    border-radius: 1000px !important;
    overflow: hidden;
    width: 128px;
    height: 128px;
    border: 5px solid rgba(0, 0, 0, 0.7);
    position: absolute;
    top: 0px;
}
.circle img {
    width: 100%;
    height: 100%;
}
.p-image {
  position: absolute;
  bottom: 10px;
  right: 5px;
  color: #ffffff;
  transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
  background-color: #b66dff;
	border-radius: 50%;
	width: 28px;
	height: 28px;
	text-align: center;
	line-height: 26px;
}
.p-image:hover {
  transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
}
.upload-button {
  font-size: 14px;
  cursor:pointer;
}

.upload-button:hover {
  transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
  color: #ffffff;
}
.upload_image{width: 128px;height: 128px;position: relative;}
.file-upload-default{float: left;
border: 1px solid #e4e6fc;
font-size: 14px;
padding: 7px 15px;
height: 42px;background-color: #fdfdff;
border-radius: .25rem;
width:calc(100% - 40px);
}
#upload_pan, #upload_gst{height:42px; float:left; margin-left:10px;max-width: 28px;}
.body-overlay{z-index: 999;}
h6{font-size: 1rem !important;}
h4{font-size: 1.5rem !important;}
</style>
<!-- partial -->
<div class="main-content">
        <section class="section">
    <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
				<div class="card-header">
					 <h4>Profile</h4>
				</div>
				<div class="card-body">
					<div class="row mb-4">
						<div class="col-md-2 textCenter-m">
						<div class="upload_image">
						<div class="circle">
						   <!-- User Profile Image -->
						   <img class="profile-pic" id="profilePic" src="http://zxcvbnm.myobedient.com/obedient/assets/images/avatar-1.png">

						   <!-- Default Image -->
						   <!-- <i class="fa fa-user fa-5x"></i> -->
						 </div>
						 <div class="p-image">
						   <i class="fa fa-camera upload-button"></i>
							<input class="file-upload" type="file"  id="photo" accept="image/*"/>
						 </div>
						 </div>
						</div>
						<div class="col-md-10 textCenter-m">
						<div class="mt-4 dist-m">
							<h4 id="dist_name">Distributor Name</h4>
							<h6 class="mt-1" id="dist_username">Distributor Code</h6>
							</div>
						</div>
					</div>
				
				
                        <form class="forms-sample distributor-booking-form" id="distributor_add_form_submit" name="distributor_add_form_submit" method="post" enctype="multipart/form-data">
                            <h5 class="add-distributor_heading">Personal Details</h5>
                            <div class="border-div">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Distributor Name :<span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="text" placeholder="Enter distributor Name" class="form-control required" id="distributorname" name="distributorname" value="" onkeypress="return isAlphabetKey(event);">
                                    </div>
                                    <label class="col-sm-2 col-form-label">Is Headquarter:<span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <div class="form-group mb-0">
													<p class="d-inline-block">
														<input type="radio" id="test3" name="dist_type" value="1" disabled>
														<label for="test3">Yes</label>
													</p>
													<p class="d-inline-block ml-4">
														<input type="radio" id="test4" name="dist_type" value="0" disabled>
														<label for="test4">No</label>
													</p>
                                                    <!--<input type="radio" class="form-check-input disable-elm required" name="dist_type" id="head_yes" value="1">Yes<i class="input-helper"></i>-->
                                                    <!--<input type="radio" class="form-check-input disable-elm required" name="dist_type" id="head_no" value="0"> No <i class="input-helper"></i>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Firm Name :<span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="text" placeholder="Enter Firm Name" class="form-control required" id="firm_name" name="firm_name" value="">
                                    </div>
                                    <label class="col-sm-2 col-form-label">Contact Name :<span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control required" id="contact_name" name="contact_name" placeholder="Enter Contact Name" onkeypress="return isAlphabetKey(event);">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Mobile :<span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control required" id="mobile" name="mobile" placeholder="Enter Mobile Number" onkeypress="return isNumberKey(event);">
                                    </div>
                                    <label class="col-sm-2 col-form-label">Email :<span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <span id="emailid-error" class="error" style="display:none">Enter valid email-id.</span>
                                        <input type="text" class="form-control required mt-0" id="email" name="email" placeholder="Enter Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Address :<span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control required" id="distributor_address" name="distributor_address" placeholder="Enter Address">
                                    </div>
                                    <label class="col-sm-2 col-form-label">Pin Code <span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control required" placeholder="Enter PinCode" id="pin_code" name="pin_code" onkeypress="return isNumberKey(event);">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">State <span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <select class="form-control required" id="states" name="states"> </select>
                                    </div>
                                    <label class="col-sm-2 col-form-label">District/City <span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <select class="form-control required " id="city" name="city"></select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Pan Number :<span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control required" id="pan_number" name="pan_number" placeholder="Enter Pan Number">
                                    </div>
                                    <label class="col-sm-2 col-form-label">Pan Image <span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="file" name="pan_image" class="file-upload-default required " id="pan_image">
                                        <img class="mBox" src="" style="display:none;" id="upload_pan" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">GST Number :<span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control required" id="gst_number" name="gst_number" placeholder="Enter GST Number">
                                    </div>
                                    <label class="col-sm-2 col-form-label">GST Image <span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="file" name="gst_image" class="file-upload-default required" id="gst_image">
                                        <img class="mBox" src="" style="display:none;" id="upload_gst" />
                                    </div>
                                </div>
                                <div class="form-group row passwrd">
                                    <label class="col-sm-2 col-form-label">Password <span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="password" class="form-control required" placeholder="Enter Password" id="password" name="password">
                                    </div>
                                    <label class="col-sm-2 col-form-label">Confirm Password <span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="password" class="form-control required" placeholder="Enter Confirm Password" id="confirm_password" name="confirm_password">
                                    </div>
                                </div>
                                <?php if($distributor_id!=''){?>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Distributor Code :<span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control required" id="dist_code" name="dist_code" placeholder="Enter Code">
                                    </div>
                                    <label class="col-sm-2 col-form-label">Username<span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control required" placeholder="Enter Username" id="username" name="username">
                                    </div>
                                </div>
                                <?php }?>
                            </div>
                            <!--personal details end-->
                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <input type="hidden" id="distributor_id" value="<?php echo $distributor_id; ?>" />
                                    <a class="btn btn-danger" href="dashboard">Back</a><input type="submit" class="btn btn-success ml-2" id="distributor_add_submit_button" name="distributor_add_submit_button" value="Update" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--class card-->
            </div>
        </div>
		</section>
    </div>

    <!-- content-wrapper ends -->
    <?php include_once 'footer-copy.php'; ?>
    <script src="<?php echo $home_url; ?>assets/javascript/distributor/distributor-profile-update.js"></script>
	<script src="<?php echo $home_url; ?>assets/javascript/distributor/js/mBox.js"></script>
	<script>
	  $('.mBox').mBox();
	</script>
	<script>
	$(document).ready(function() {

    
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.profile-pic').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
    

    $(".file-upload").on('change', function(){
        readURL(this);
    });
    
    $(".upload-button").on('click', function() {
       $(".file-upload").click();
    });
});
	</script>
