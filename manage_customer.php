<?php include_once 'header.php'; ?>
<style>
.overflowAuto_d{overflow:auto; width:100%;}
</style>
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper ">
    <div class="row grid-margin">
      <div class="col-12">
        <div class="card">
          <div class="card-body p-3">
            <h4 class="card-title mb-4">Customer Details</h4>
            <form class="forms-sample">
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
                                <input type="radio" class="form-check-input" name="payment_mode" id="payment_dd" value="DD"> DD : <i class="input-helper"></i></label>
                            </div>
							<div class="form-check d-inline-block ml-3 mr-3">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="payment_mode" id="payment_cheque" value="Cheque"> Cheque : <i class="input-helper"></i></label>
                            </div>
							<div class="form-check d-inline-block">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="payment_mode" id="payment_cash" value="Cash"> Cash : <i class="input-helper"></i></label>
                            </div>
                          </div>
                        </div>
						<label class="col-sm-2 col-form-label">Branch : </label>
						<div class="col-sm-4">
                        <input type="text" class="form-control" id="branch" name="branch" placeholder="Enter Branch">
						</div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Account Number :</label>
						<div class="col-sm-4">
                        <input type="text" class="form-control" id="accountnumber" name="accountnumber" placeholder="Enter Account Number">
						</div>
						<label class="col-sm-2 col-form-label">IFSC Code :</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" id="ifsc_code" name="ifsc_code" placeholder="Enter your ifsc code">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Account Holder Name :</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" id="accountholdername" name="accountholdername" placeholder="Enter Account Holder Name">
                        </div>
						<label class="col-sm-2 col-form-label">Bank Name :</label>
					  <div class="col-sm-4">
                      <input type="text" class="form-control" id="bankname" name="bankname" placeholder="Enter your Bank Name">
					  </div>
                      </div>
					  <h5>Personal Details</h5>
					  <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Customer Name :</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" id="customername" name="customername" value="">
                        </div>
						<label class="col-sm-2 col-form-label">Father/Husband/Wife :</label>
					  <div class="col-sm-4">
                      <input type="text" class="form-control" id="fatherhusbandwife" name="fatherhusbandwife" placeholder="Enter Name">
					  </div>
                      </div>
					  <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Date Of Birth :</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" id="dateofbirth" name="dateofbirth" placeholder="Enter Date Of Birth">
                        </div>
						<label class="col-sm-2 col-form-label">Age :</label>
					  <div class="col-sm-4">
                      <input type="text" class="form-control" id="age" name="age" placeholder="Enter Age">
					  </div>
                      </div>
					  <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Sex :</label>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <div class="form-check d-inline-block">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="customer_sex" id="customer_male" value="Male"> Male <i class="input-helper"></i></label>
                            </div>
							<div class="form-check d-inline-block ml-3 mr-3">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="customer_sex" id="customer_female" value="Cheque"> Female <i class="input-helper"></i></label>
                            </div>
                          </div>
                        </div>
						<label class="col-sm-2 col-form-label">Nationality :</label>
					  <div class="col-sm-4">
                       <input type="text" class="form-control" id="nationality" name="nationality" placeholder="Enter Nationality">
					  </div>
                      </div>
					  <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Mobile :</label>
                        <div class="col-sm-4">
                         <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Branch Mobile Number">
                        </div>
						<label class="col-sm-2 col-form-label">Email :</label>
					  <div class="col-sm-4">
                      <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email">
					  </div>
                      </div>
					  <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Address :</label>
                        <div class="col-sm-4">
                         <input type="text" class="form-control" id="addressnominee" name="addressnominee" placeholder="Enter Addess">
                        </div>
						<label class="col-sm-2 col-form-label">Photo :</label>
					  <div class="col-sm-4">
                      <input type="file" name="photo" class="file-upload-default" id="photo">
                        <div class="input-group">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Enter Photo">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-gradient-primary btn-sm" type="button">Upload</button>
                          </span>
                        </div>
					  </div>
                      </div>
					  <h5>Nomination</h5>
					  <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nominee's Name :</label>
                        <div class="col-sm-4">
                         <input type="text" class="form-control" id="nomineesname" name="nomineesname" placeholder="Enter Nominee Name">
                        </div>
						<label class="col-sm-2 col-form-label">Age :</label>
					  <div class="col-sm-4">
                      <input type="text" class="form-control" id="ageN" name="ageN" placeholder="Enter Nominee Age">
					  </div>
                      </div>
					  <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Date of birth :</label>
                        <div class="col-sm-4">
                         <input type="text" class="form-control" id="date_of_birth_nominee" name="date_of_birth_nominee" placeholder="Enter Age">
                        </div>
						<label class="col-sm-2 col-form-label">Relationship With Customer :</label>
					  <div class="col-sm-4">
                      <select id="relationship" name="relationship" class="form-control">
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
                                <input type="radio" class="form-check-input" name="nominee_sex" id="nominee_male" value="Male"> Male <i class="input-helper"></i></label>
                            </div>
							<div class="form-check d-inline-block ml-3 mr-3">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="nominee_sex" id="nominee_female" value="Cheque"> Female <i class="input-helper"></i></label>
                            </div>
                          </div>
                        </div>
						<label class="col-sm-2 col-form-label">Address :</label>
					  <div class="col-sm-4">
						<input type="text" class="form-control" id="addressnominee" name="addressnominee" placeholder="Enter Addess">
					  </div>
                      </div>
					  <div class="row">
						<div class="col-sm-12 text-right">
						<input type="hidden" id="customer_id" value="" />
						<input type="submit" class="btn btn-info btn-sm" id="customer_add_form_submit" name="customer_add_form_submit" value="Add Customer" />&nbsp;
                        <a class="btn btn-primary btn-sm" href="plotbooking.html">Add New Bookings</a>
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
		<div class="row mt-4">
						<div class="col-sm-12">
						<div class="overflowAuto_d">
							<table id="manage_customer_list" class="table table-striped"></table>
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
    var user_id = 2;
    getDownTheLineMembers(user_id);
    getRelationship();
    getCustomersList(user_id);

    function getDownTheLineMembers(user_id) {
        $.ajax({
            url: 'http://localhost/obedientcorp/public/api/down-the-line-members',
            type: 'post',
            data: { user_id: user_id },
            success: function (response) {
                if (response.status == "success") {
                    var data = response.data;
                    var option = '<option value="">Select Agent</option>';
                    $.each(data, function (key, val) {
                        option += '<option value="' + val.id + '">' + val.username + ' - ' + val.associate_name + '</option>';
                    });
                    $('#agent_id').html(option);

                }
            }
        });
    }

    function getRelationship() {
        $.ajax({
            url: 'http://localhost/obedientcorp/public/api/relationships',
            type: 'post',
            data: {},
            success: function (response) {
                if (response.status == "success") {
                    var data = response.data;
                    var option = '<option value="">Select Relation</option>';
                    $.each(data, function (key, val) {
                        option += '<option value="' + val.name + '">' + val.name + '</option>';
                    });
                    $('#relationship').html(option);
                }

            }
        });
    }

    function getCustomersList(user_id) {
        $.ajax({
            url: 'http://localhost/obedientcorp/public/api/customers',
            type: 'post',
            data: { user_id: user_id },
            success: function (response) {
                console.log(response);
                var html = ' <tr>\n\
                    <th>Payment mode</th>\n\
                    <th>Account Number </th>\n\
                    <th>Account Holder Name</th>\n\
                    <th>Branch</th>\n\
                    <th>IFSC Code</th>\n\
                    <th>Bank Name</th>\n\
                    <th>Customer Name</th>\n\
                    <th>Date Of Birth</th>\n\
                    <th>Sex</th>\n\
                    <th>Mobile</th>\n\
                    <th>Address</th>\n\
                    <th>Father/Husband/Wife</th>\n\
                    <th>Age</th>\n\
                    <th>Nationality</th>\n\
                    <th>Email</th>\n\
                    <th>photo</th>\n\
                    <th>Nominee Name</th>\n\
                    <th>Nominee Date of birth</th>\n\
                    <th>NomineeSex</th>\n\
                    <th>NomineeAge</th>\n\
                    <th>Relationship With Customer</th>\n\
                    <th>NomineeAddress</th>\n\
                    <th>Action</th>\n\
                    </tr>';
                if (response.status == "success") {
                    var data = response.data;
                    $.each(data, function (key, val) {
                        photo_link = '';
                        if (val.photo) {
                            photo_link = 'http://localhost/obedientcorp/public/uploads/customers/' + val.photo;
                        }
                        html += '<tr id="tr_' + val.id + '">\n\
                                    <td>'+ val.payment_mode + '</td>\n\
                                    <td>'+ val.account_number + '</td>\n\
                                    <td>'+ val.account_holder_name + '</td>\n\
                                    <td>'+ val.branch_name + '</td>\n\
                                    <td>'+ val.ifsc_code + '</td>\n\
                                    <td>'+ val.bank_name + '</td>\n\
                                    <td>'+ val.name + '</td>\n\
                                    <td>'+ val.dob + '</td>\n\
                                    <td>'+ val.sex + '</td>\n\
                                    <td>'+ val.mobile + '</td>\n\
                                    <td>'+ val.address + '</td>\n\
                                    <td>'+ val.fathers_name + '</td>\n\
                                    <td>'+ val.age + '</td>\n\
                                    <td>'+ val.nationality + '</td>\n\
                                    <td>'+ val.email + '</td>\n\
                                    <td><img src="' + photo_link + '" /></td>\n\
                                    <td>'+ val.nominee_name + '</td>\n\
                                    <td>'+ val.nominee_dob + '</td>\n\
                                    <td>'+ val.nominee_sex + '</td>\n\
                                    <td>'+ val.nominee_age + '</td>\n\
                                    <td>'+ val.nominee_relation + '</td>\n\
                                    <td>'+ val.nominee_address + '</td>\n\
                                    <td>\n\
                                        <a href="javascript:void(0);" onclick="updateCustomerDetail(event, '+ val.id + ');">Edit</a> / \n\
                                        <a href="javascript:void(0);" onclick="deleteCustomerList(event, '+ val.id + ');">delete</a>\n\
                                    </td>\n\
                                </tr>';
                    });

                    $('#manage_customer_list').html(html)
                }
                else {
                    console.log(response.data);
                }

            }
        });
    }

    $(document).ready(function () {

        $(document).on('click', '#customer_add_form_submit', function (e) {
            e.preventDefault();

            //for validation
            $("#customer_add_form").validate({
                rules: {
                    customername: "required",
                    mobile: "required",
                    address: "required",
                }

                // Specify validation error messages

            });
            if ($("#customer_add_form").valid()) {
                var params = new FormData();
                params.append('user_id', user_id);
                params.append('agent_id', $('#agent_id').val());
                params.append('name', $('#customername').val());
                params.append('fathers_name', $('#fatherhusbandwife').val());
                params.append('dob', $('#dateofbirth').val());
                params.append('age', $('#age').val());
                var customer_sex = $('#customer_male').val();
                if ($('#customer_female').is(':checked') == true) {
                    customer_sex = $('#customer_female').val();
                }
                params.append('sex', customer_sex);
                params.append('nationality', $('#nationality').val());
                params.append('mobile', $('#mobile').val());
                params.append('email', $('#email').val());
                params.append('address', $('#address').val());
                params.append('nominee_name', $('#nomineesname').val());
                params.append('nominee_age', $('#ageN').val());
                params.append('nominee_dob', $('#date_of_birth_nominee').val());
                params.append('nominee_relation', $('#relationship').val());
                var nominee_sex = $('#nominee_male').val();
                if ($('#nominee_female').is(':checked') == true) {
                    nominee_sex = $('#nominee_female').val();
                }
                params.append('nominee_sex', nominee_sex);
                params.append('nominee_address', $('#addressnominee').val());
                var payment_mode = $('#payment_cash').val();
                if ($('#payment_cheque').is(':checked') == true) {
                    payment_mode = $('#payment_cheque').val();
                } else if ($('#payment_dd').is(':checked') == true) {
                    payment_mode = $('#payment_dd').val();
                }
                params.append('payment_mode', payment_mode);
                params.append('account_number', $('#accountnumber').val());
                params.append('branch_name', $('#branch').val());
                params.append('ifsc_code', $('#ifsc_code').val());
                params.append('account_holder_name', $('#accountholdername').val());
                params.append('bank_name', $('#bankname').val());
                params.append('photo', $('#photo')[0].files[0]);

                var url = 'http://localhost/obedientcorp/public/api/customer/add';
                if ($('#customer_id').val()) {
                    url = 'http://localhost/obedientcorp/public/api/customer/update';
                }
                $.ajax({
                    url: url,
                    type: 'post',
                    data: params,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        if (response.status == "success") {
                            console.log(response.data);
                            $('#customer_id').val('');
                            getCustomersList();
                            document.getElementById('customer_add_form').reset();
                            $('#photo').attr('src', '');
                            $('#photo').css('display', 'none');
                        }
                        else {
                            console.log(response.data);
                        }
                    }
                });
            }
        });

    });

    function updateCustomerDetail(e, customer_id) {
        e.preventDefault();
        $.ajax({
            url: 'http://localhost/obedientcorp/public/api/customer/detail',
            type: 'post',
            data: { id: customer_id },
            success: function (response) {
                if (response.status == "success") {
                    var data = response.data;
                    console.log(data);
                    $('#customer_id').val(data.id);
                    $('#agent_id').val(data.user_id);
                    $('#customername').val(data.name);
                    $('#fatherhusbandwife').val(data.fathers_name);
                    $('#dob').val(data.dateofbirth);
                    $('#age').val(data.age);
                    if (data.customer_sex == 'Male') {
                        $('#customer_male').prop('checked', true);
                    } else if (data.customer_sex == 'Female') {
                        $('#customer_female').prop('checked', true);
                    }

                    $('#nationality').val(data.nationality);
                    $('#mobile').val(data.mobile);
                    $('#email').val(data.email);
                    if (data.photo) {
                        var photo_src = 'http://localhost/obedientcorp/public/uploads/customers/' + data.photo;
                        $('#photo').attr('src', photo_src);
                        $('#photo').css('display', 'block');
                    }
                    $('#address').val(data.address);
                    $('#nomineesname').val(data.nominee_name);
                    $('#ageN').val(data.nominee_age);
                    $('#date_of_birth_nominee').val(data.nominee_dob);
                    $('#relationship').val(data.nominee_relation);
                    if (data.nominee_sex == 'Male') {
                        $('#nominee_male').prop('checked', true);
                    }
                    else {
                        $('#nominee_female').prop('checked', true);

                    }
                    $('#nominee_sex').val(data.nominee_sex);
                    $('#addressnominee').val(data.nominee_address);
                    if (data.payment_mode == 'DD') {
                        $('#payment_dd').prop('checked', true);
                    }
                    else if (data.payment_mode == 'Cheque') {
                        $('#payment_cheque').prop('checked', true);
                    }
                    else {
                        $('#payment_cash').prop('checked', true);
                    }
                    $('#payment_mode').val(data.payment_mode);
                    $('#accountnumber').val(data.account_number);
                    $('#branch').val(data.branch_name);
                    $('#ifsc_code').val(data.ifsc_code);
                    $('#accountholdername').val(data.account_holder_name);
                    $('#bankname').val(data.bank_name);

                }
            }
        });
    }

    function deleteCustomerList(e, customer_id) {
        e.preventDefault();
        $.ajax({
            url: 'http://localhost/obedientcorp/public/api/customer/delete',
            type: 'post',
            data: { id: customer_id, user_id: user_id },
            success: function (response) {
                if (response.status == "success") {
                    $("#tr_" + customer_id).remove();
                }
            }
        });
    }


</script>