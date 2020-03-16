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
            <h4 class="card-title mb-4">Add New Bookings</h4>
            <form class="forms-sample">
			<h5>Plan Details</h5>
					<div class="form-group row">
                        <label class="col-sm-2 col-form-label">Customers :</label>
                        <div class="col-sm-4">
						<select class="form-control" id="customers_list" name="customers_list"></select>
                        </div>
						<label class="col-sm-2 col-form-label">Project Name :</label>
                        <div class="col-sm-4">
						<select class="form-control" id="project_name" name="project_name"></select>
                        </div>
                      </div>
					  <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Sub Project Name :</label>
                        <div class="col-sm-4">
						<select class="form-control" id="sub_projects" name="sub_projects"></select>
                        </div>
						<label class="col-sm-2 col-form-label">Plot Name :</label>
                        <div class="col-sm-4">
						<select class="form-control" id="plot_name" name="plot_name"></select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Reference :</label>
                        <div class="col-sm-4">
                          <input class="form-control" type="text" id="reference" name="reference" placeholder="enter reference">
                        </div>
						<label class="col-sm-2 col-form-label">Date Of Payment :</label>
						<div class="col-sm-4">
                        <input class="form-control" type="text" id="date_of_payment" name="date_of_payment" placeholder="enter date of birth" readonly>
						</div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Registration Number :</label>
						<div class="col-sm-4">
                        <input class="form-control" type="text" id="registration_num" name="registration_num" placeholder=" enter registration number" />
						</div>
						<label class="col-sm-2 col-form-label">Plot Area :</label>
                        <div class="col-sm-4">
                          <input class="form-control" type="text" id="plot_area" name="plot_area" placeholder="enter plot area">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Unit Rate :</label>
                        <div class="col-sm-4">
                          <input class="form-control" type="text" id="unit_rate" name="unit_rate" placeholder="enter unit rate" onkeypress="return isNumberKey(event);">
                        </div>
						<label class="col-sm-2 col-form-label">Discount Rate :</label>
					  <div class="col-sm-4">
                      <input class="form-control" type="text" id="discount_rate" name="discount_rate" placeholder="enter discount5 rate" onkeypress="return isNumberKey(event);">
					  </div>
                      </div>
					  <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Total Amount :</label>
                        <div class="col-sm-4">
                          <input class="form-control" type="text" id="total_amount" name="total_amount" placeholder="enter total amount" onkeypress="return isNumberKey(event);">
                        </div>
						<label class="col-sm-2 col-form-label">Received Booking Amount :</label>
					  <div class="col-sm-4">
                      <input class="form-control" type="text" id="received_booking_amount" name="received_booking_amount" placeholder="enter received booking amount" onkeypress="return isNumberKey(event);">
					  </div>
                      </div>
					  <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Installment :</label>
                        <div class="col-sm-4">
                          <select class="form-control" id="installment" name="installment">
                                <option value="select">select</option>
                                <option value="1 year">1 year</option>
                                <option value="2 year">2 year</option>
                                <option value="3 year">3 year</option><br>
                            </select>
                        </div>
                      </div>
					  <h5>Payment Details</h5>
					  <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Payment Mode :</label>
                        <div class="col-sm-4">
                          <div class="form-group">
                            <div class="form-check d-inline-block">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" id="payment_cheque" name="payment_mode" value="Cheque"> Cheque/UTR <i class="input-helper"></i></label>
                            </div>
							<div class="form-check d-inline-block ml-3 mr-3">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" id="payment_cash" name="payment_mode" value="Cash"> Cash <i class="input-helper"></i></label>
                            </div>
                          </div>
                        </div>
                      </div>
					  <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Cheque/UTR No :</label>
                        <div class="col-sm-4">
                         <input class="form-control" type="text" id="cheque_no" name="cheque_no" placeholder="enter cheque no." disabled>
                        </div>
						<label class="col-sm-2 col-form-label">Account Holder Name :</label>
					  <div class="col-sm-4">
                      <input class="form-control" type="text" id="account_holder_name" name="account_holder_name" placeholder="enter account holder name " disabled>
					  </div>
                      </div>
					  <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Dated :</label>
                        <div class="col-sm-4">
                         <input class="form-control" type="text" id="dated" name="dated" placeholder="enter date" disabled>
                        </div>
						<label class="col-sm-2 col-form-label">Bank Name :</label>
					  <div class="col-sm-4">
                      <input class="form-control" type="text" id="bank_name" name="bank_name" placeholder="enter bank name" disabled>
					  </div>
                      </div>
					  <div class="row">
						<div class="col-sm-12 text-right">
						<input type="hidden" id="plotbooking_id" value="" />
							<input class="btn btn-success btn-sm" type="submit" id="plotbooking_form_submit" name="plotbooking_form_submit" value="submit" />
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
  <script type="text/javascript">
    var url;
    var sub_project_list = '';
    getProjectList();
    getplotlist();
    getCustomersList();

    $(document).ready(function () {
        $("#date_of_payment").datepicker({
            dateFormat: 'dd-mm-yy',
            minDate: 0,
        });
        $("#project_name").change(function () {
            var id = $(this).val();
            var sub_option = '<option value="">Select Sub Project</option>';
            $.each(sub_project_list, function (key, value) {
                if (value.id == id) {
                    if (value.children.length > 0) {
                        $("#sub_pro_div").css('display', 'block');
                        $.each(value.children, function (key1, subproject) {
                            console.log(subproject);
                            sub_option += '<option value="' + subproject.id + '">' + subproject.name + '</option>';
                        });
                    }
                }
            });
            $('#sub_projects').html(sub_option)
        });

        $(document).on('click', '#plotbooking_form_submit', function (e) {
            e.preventDefault();

            //for validation
            $("#plotbooking_form").validate({
                rules: {
                    registration_num: {
                        required: true,
                        digits: true
                    }
                }
            });


            if ($("#plotbooking_form").valid()) {
                var params = new FormData();
                params.append('customer_id', $('#customers_list').val());
                params.append('registration_number', $('#registration_num').val());
                params.append('project_master_id', $('#project_name').val());
                params.append('plot_master_id', $('#plot_name').val());
                params.append('plot_area', $('#plot_area').val());
                params.append('reference', $('#reference').val());
                params.append('unit_rate', $('#unit_rate').val());
                params.append('discount_rate', $('#discount_rate').val());
                params.append('total_amount', $('#total_amount').val());
                params.append('amount', $('#received_booking_amount').val());
                params.append('received_booking_amount', $('#received_booking_amount').val());
                params.append('date_of_payment', $('#date_of_payment').val());
                params.append('installment', $('#installment').val());
                var payment_mode = $('#payment_cash').val();
                if ($('#payment_cheque').is(':checked') == true) {
                    payment_mode = $('#payment_cheque').val();
                }
                params.append('payment_mode', payment_mode);
                params.append('cheque_number', $('#cheque_no').val());
                params.append('cheque_date', $('#dated').val());
                params.append('account_holder_name', $('#account_holder_name').val());
                params.append('bank_name', $('#bank_name').val());
                params.append('created_by', 1);

                var url = 'http://localhost/obedientcorp/public/api/customer/new-booking';

                $.ajax({
                    url: url,
                    type: 'post',
                    data: params,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        if (response.status == "success") {
                            console.log(response.data);
                            $('#customers_list').val('');
                            // getCustomersList();
                            document.getElementById('plotbooking_form').reset();
                            // $('#photo').attr('src', '');
                            //$('#photo').css('display', 'none');
                        }
                        else {
                            console.log(response.data);
                        }
                    }
                });

            }

        });

        $("#payment_cheque").click(function () {
            $('#cheque_no').prop("disabled", false);
            $('#account_holder_name').prop("disabled", false);
            $('#dated').prop("disabled", false);
            $('#bank_name').prop("disabled", false);
        });


        $("#payment_cash").click(function () {
            $('#cheque_no').prop("disabled", true);
            $('#account_holder_name').prop("disabled", true);
            $('#dated').prop("disabled", true);
            $('#bank_name').prop("disabled", true);
        });
    });//end document

    function getCustomersList() {
        $.ajax({
            url: 'http://localhost/obedientcorp/public/api/customers',
            type: 'post',
            data: {},
            success: function (response) {
                var option = '<option value="">Select customers</option>';
                if (response.status == "success") {
                    $.each(response.data, function (key, value) {
                        console.log(key, value)
                        option += '<option value="' + value.id + '">' + value.name + '</option>';
                    });

                    $('#customers_list').html(option)
                }
                else {
                    console.log(response.data);
                }

            }
        });
    }

    function getProjectList() {
        $.ajax({
            url: 'http://localhost/obedientcorp/public/api/project/childern',
            type: 'post',
            data: {},
            success: function (response) {
                sub_project_list = response.data;
                //console.log(response.data);
                var option = '<option value="">Select Project</option>';
                if (response.status == "success") {
                    $.each(response.data, function (key, value) {
                        if (value.parent_id == 0) {
                            option += '<option value="' + value.id + '">' + value.name + '</option>';
                        }

                    });

                    $('#project_name').html(option)
                }
                else {
                    console.log(response.data);
                }

            }
        });
    }

    function getplotlist() {
        $.ajax({
            url: 'http://localhost/obedientcorp/public/api/plots',
            type: 'post',
            data: {},
            success: function (response) {
                var option = '<option value="">Select plots</option>';
                if (response.status == "success") {
                    $.each(response.data, function (key, value) {
                        //console.log(key, value)
                        option += '<option value="' + value.id + '">' + value.name + '</option>';
                    });

                    $('#plot_name').html(option)
                }
                else {
                    console.log(response.data);
                }

            }
        });
    }


    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>