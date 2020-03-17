<?php 
include_once 'header.php'; 
$customer_id = '';
if(isset($_REQUEST['customer_id'])){
  $customer_id = $_REQUEST['customer_id'];
}
?>
<style>
  .overflowAuto_d {
    overflow: auto;
    width: 100%;
  }
</style>
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper ">
    <div class="row grid-margin">
      <div class="col-12">
        <div class="card">
          <div class="card-body p-3">
            <h4 class="card-title mb-4">Customer Details</h4>
            <form class="forms-sample" id="customer_add_form_submit" name="customer_add_form_submit" method="post" enctype="multipart/form-data">
              <h5>Bank Details</h5>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Select Agent :</label>
                <div class="col-sm-4">
                  <select class="form-control required" id="agent_id" name="agent_id"></select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Payment Mode :</label>
                <div class="col-sm-4">
                  <div class="form-group">
                    <div class="form-check d-inline-block">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input required  " name="payment_mode" id="payment_dd" value="online">Online : <i class="input-helper"></i></label>
                    </div>
                    <div class="form-check d-inline-block ml-3 mr-3">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input required " name="payment_mode" id="payment_cheque" value="Cheque" > Cheque : <i class="input-helper"></i></label>
                    </div>
                    <div class="form-check d-inline-block">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input required " name="payment_mode" id="payment_cash" value="Cash"> Cash : <i class="input-helper"></i></label>
                    </div>
                  </div>
                </div>
                <label class="col-sm-2 col-form-label">Branch : </label>
                <div class="col-sm-4">
                  <input type="text" class="form-control required" id="branch" name="branch" placeholder="Enter Branch">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Account Number :</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control required" id="accountnumber" name="accountnumber" placeholder="Enter Account Number">
                </div>
                <label class="col-sm-2 col-form-label">IFSC Code :</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control required" id="ifsc_code" name="ifsc_code" placeholder="Enter your ifsc code">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label ">Account Holder Name :</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control required" id="accountholdername" name="accountholdername" placeholder="Enter Account Holder Name">
                </div>
                <label class="col-sm-2 col-form-label">Bank Name :</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control required" id="bankname" name="bankname" placeholder="Enter your Bank Name">
                </div>
              </div>
              <h5>Personal Details</h5>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Customer Name :</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control required" id="customername" name="customername" value="">
                </div>
                <label class="col-sm-2 col-form-label">Father/Husband/Wife :</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control required" id="fatherhusbandwife" name="fatherhusbandwife" placeholder="Enter Name">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Date Of Birth :</label>
                <div class="col-sm-4">
				<div class="input-group date datepicker">
                  <input type="text" class="form-control required" id="dateofbirth" name="dateofbirth" placeholder="Enter Date Of Birth" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd-mm-yyyy">
                  <span class="input-group-addon input-group-append border-left">
                    <span class="mdi mdi-calendar input-group-text bg-dark"></span>
                  </span>
				  </div>
                </div>
                <label class="col-sm-2 col-form-label">Age :</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control required" id="age" name="age" placeholder="Enter Age">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Sex :</label>
                <div class="col-sm-4">
                  <div class="form-group">
                    <div class="form-check d-inline-block">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input required" name="customer_sex" id="customer_male" value="Male"> Male <i class="input-helper"></i></label>
                    </div>
                    <div class="form-check d-inline-block ml-3 mr-3">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input required" name="customer_sex" id="customer_female" value="Female"> Female <i class="input-helper"></i></label>
                    </div>
                  </div>
                </div>
                <label class="col-sm-2 col-form-label">Nationality :</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control required" id="nationality" name="nationality" placeholder="Enter Nationality">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Mobile :</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control required" id="mobile" name="mobile" placeholder="Enter Branch Mobile Number">
                </div>
                <label class="col-sm-2 col-form-label">Email :</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control required" id="email" name="email" placeholder="Enter Email">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Address :</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control required" id="customer_address" name="customer_address" placeholder="Enter Addess">
                </div>
                <label class="col-sm-2 col-form-label">Photo :</label>
                <div class="col-sm-4">
                  <input type="file" name="photo" class="file-upload-default" id="photo">
                  <div class="input-group">
                    <input type="text" class="form-control file-upload-info" disabled placeholder="Enter Photo">
                    <span class="input-group-append">
                      <button class="file-upload-browse btn btn-gradient-primary btn-sm" type="button">Upload</button>
                    </span>
                    <img src="" style="display:none;width:100px;" id="upload_photo" />
                  </div>
                </div>
              </div>
              <h5>Nomination</h5>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nominee's Name :</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control required" id="nomineesname" name="nomineesname" placeholder="Enter Nominee Name">
                </div>
                <label class="col-sm-2 col-form-label">Age :</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control required" id="ageN" name="ageN" placeholder="Enter Nominee Age">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Date of birth :</label>
                <div class="col-sm-4">
				<div class="input-group date datepicker">
                  <input type="text" class="form-control required" id="date_of_birth_nominee" name="date_of_birth_nominee" placeholder="Enter Age" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd-mm-yyyy">
                  <span class="input-group-addon input-group-append border-left">
                    <span class="mdi mdi-calendar input-group-text bg-dark"></span>
                  </span>
				  </div>
                </div>
                <label class="col-sm-2 col-form-label">Relationship With Customer :</label>
                <div class="col-sm-4">
                  <select id="relationship" name="relationship" class="form-control required">
                    <option value="">Select Relation</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Sex :</label>
                <div class="col-sm-4">
                  <div class="form-group">
                    <div class="form-check d-inline-block">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input required" name="nominee_sex" id="nominee_male" value="Male"> Male <i class="input-helper"></i></label>
                    </div>
                    <div class="form-check d-inline-block ml-3 mr-3">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input required" name="nominee_sex" id="nominee_female" value="Female"> Female <i class="input-helper"></i></label>
                    </div>
                  </div>
                </div>
                <label class="col-sm-2 col-form-label">Address :</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control required" id="addressnominee" name="addressnominee" placeholder="Enter Addess">
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12 text-right">
                  <input type="hidden" id="customer_id" value="<?php echo $customer_id; ?>" />
                  <input type="submit" class="btn btn-info btn-sm" id="customer_add_submit_button" name="customer_add_submit_button" value="Submit" />&nbsp;
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

        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
    <?php include_once 'footer.php'; ?>
    <script src="assets/javascript/add_customer.js"></script>