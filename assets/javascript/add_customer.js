getDownTheLineMembers(user_id);
getRelationship();
getProjectList();

function getDownTheLineMembers(user_id) {
    $.ajax({
        url: base_url + 'down-the-line-members',
        type: 'post',
        data: {
            user_id: user_id
        },
        success: function (response) {
            if (response.status == "success") {
                var data = response.data;
                var option = '';
                if (user_id == 1) {
                    option += '<option value="">Select</option>';
                }
                $.each(data, function (key, val) {
                    option += '<option value="' + val.id + '">' + val.display_name + '</option>';
                });
                $('#agent_id,#agent_listing').html(option);
                getCustomersList(user_id);

            }
        }
    });
}

function getRelationship() {
    $.ajax({
        url: base_url + 'relationships',
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

function getProjectList() {
    showLoader();
    $.ajax({
        url: base_url + 'project/childern',
        type: 'post',
        async: false,
        data: {},
        success: function (response) {
            sub_project_list = response.data;
            var option = '<option value="">Select Project</option>';
            if (response.status == "success") {
                $.each(response.data, function (key, value) {
                    if (value.parent_id == 0) {
                        option += '<option value="' + value.id + '">' + value.name + '</option>';
                    }

                });

                $('#project_name').html(option);
                hideLoader();
            } else {
                hideLoader();
            }

        }
    });
}//project list

//function for get plot list

function getplotlist(project_id, sub_project_id) {
    showLoader();
    $.ajax({
        url: base_url + 'get-plot',
        type: 'post',
        data: { project_master_id: project_id, sub_project_id: sub_project_id },
        success: function (response) {
            var option = '<option value="">Select plots</option>';
            if (response.status == "success") {
                $.each(response.data, function (key, value) {
                    option += '<option value="' + value.id + '">' + value.name + '</option>';
                });
                $('.plot_name_div').css('display', 'block');
                $('#plot_name').html(option);
                hideLoader();
            } else {
                $('.plot_name_div').css('display', 'none');
                hideLoader();
            }

        }
    });
}//end plot listing

//get plotunitarea
function getPlotAreaUnit(plot_id) {
    $.ajax({
        url: base_url + 'plot-area-unit ',
        type: 'post',
        data: { id: plot_id, },
        success: function (response) {
            if (response.status == "success") {
                if (response.data.plot_area) {
                    $('#plot_area').val(response.data.plot_area);
                    $('#plot_area').prop('readOnly', true);
                }
                if (response.data.plot_unit) {
                    $('#plot_unit').val(response.data.plot_unit);
                    $('#plot_unit').prop('readOnly', true);
                }
                if (response.data.plot_unit_price) {
                    $('#unit_rate').val(response.data.plot_unit_price);
                    $('#unit_rate').prop('readOnly', true);
                }

                if (response.data.plot_area && response.data.plot_unit_price) {
                    calculatePlotAmount(response.data.plot_area, response.data.plot_unit_price);
                }
                hideLoader();
            }
            else {
                hideLoader();
            }

        }
    });

}//end plot unit area



var today = new Date();
var todays_date = today.getDate() + '-' + (today.getMonth() + 1) + '-' + today.getFullYear();
$(document).ready(function () {

    $(document).on('blur', '#discount_rate', function (e) {
        e.preventDefault();
        var discount_rate = $(this).val();
        var plot_area = $('#plot_area').val();
        var unit_rate = $('#unit_rate').val();
        if (discount_rate && discount_rate != '' && discount_rate > 0) {
            calculatePlotAmount(plot_area, discount_rate);
        } else if (unit_rate && unit_rate != '' && unit_rate > 0) {
            calculatePlotAmount(plot_area, unit_rate);
        }
    });

    $(document).on('change', '#agent_listing', function () {
        if ($(this).val()) {
            getCustomersList($(this).val());
        }
    });

    $(document).on('change', '#plot_name', function () {
        if ($(this).val()) {
            getPlotAreaUnit($(this).val());
        }
    });

    //calculate age 
    $(document).on('change', '#dateofbirth', function () {
        var value = $(this).val();
        var today = new Date(),
            dob = new Date(value),
            age = new Date(today - dob).getFullYear() - 1970;
        $('#age').val(age);
        $('#age').prop('readOnly', true);
    });

    $(document).on('change', '#date_of_birth_nominee', function () {
        var value = $(this).val();
        var today = new Date(),
            dob = new Date(value),
            age = new Date(today - dob).getFullYear() - 1970;
        $('#ageN').val(age);
        $('#ageN').prop('readOnly', true);
    });
    //end calculate age

    $(document).on('change', '#installment', function () {
        var value = $(this).val();
        if ($('#received_booking_amount').val() && $('#received_booking_amount').val() != '' && $('#total_amount').val() != '') {
            var amount = Number($('#total_amount').val() - $('#received_booking_amount').val());
            var emi_amount = Number(amount / value);
            var html = '<label class="col-sm-2 col-form-label"></label>\n\
                                    <div class="col-sm-4"></div>\n\
            <label class="col-form-label col-sm-2">Emi Amount PerMonth :</label>\n\
            <div class="col-sm-4">\n\
           <label class="col-form-label card-description mb-0">'+ emi_amount + '</label>\n\
           </div>';
            $('#emi_amount').html(html);
        }
    });


    var update_customer_id = $('#customer_id').val();
    var update_agent_id = $('#agent-id').val();
    var status = $('#status').val();
    if (status == 2) {
        setIdofForm('add_new_booking_form');
    }
    if (status && status != '') {
        updateCustomerDetail(update_customer_id, update_agent_id, status);
    }

    //onchange customer list
    $('#customer-list-select').change(function () {

        var update_customer_id = $('#customer-list-select').val();
        var update_agent_id = $('#agent_id').val();
        var status = 2;
        setIdofForm('add_new_booking_form');
        updateCustomerDetail(update_customer_id, update_agent_id, status);

    });

    //onchange payment mode
    $('.payment_mode').click(function () {
        payment_mode_change($(this).val());
        initDatepicker();
    });//end payment mode change


    $("#project_name").change(function () {

        var id = $(this).val();
        sub_project_listing(id);
    });

    $('#sub_projects').change(function () {
        $('.plot_name_div').css('display', 'none');
        var sub_project_id = $(this).val();
        var project_id = $('#project_name').val();
        getplotlist(project_id, sub_project_id);
    });

    $(document).on('submit', '#add_new_booking_form', function (e) {//$("#add_new_booking_form").submit(function (e) {
        e.preventDefault();
        var customer_frm = $("#add_new_booking_form");
        customer_frm.validate({
            rules: {
                accountnumber: {
                    required: true,
                    number: true
                },
            },
            errorPlacement: function errorPlacement(error, element) {
                element.before(error);
            }
        });
        if ($("#add_new_booking_form").valid()) {
            var params = new FormData();
            params.append('new_booking', 1);
            params.append('user_id', user_id);
            params.append('agent_id', $('#agent-id').val());
            //plan details
            params.append('registration_number', $('#registration_num').val());
            params.append('project_master_id', $('#project_name').val());
            var sub_project = 0;
            if ($('#sub_projects').val()) {
                sub_project = $('#sub_projects').val();
            }
            params.append('sub_project_id', sub_project);
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
            //payment details
            var payment_mode = '';
            if ($('#payment_cash').is(':checked') == true) {
                payment_mode = $('#payment_cash').val();
            }
            if ($('#payment_cheque').is(':checked') == true) {
                payment_mode = $('#payment_cheque').val();
            }
            if ($('#payment_online').is(':checked') == true) {
                payment_mode = $('#payment_online').val();
            }
            params.append('payment_mode', payment_mode);
            params.append('cheque_number', $('#payment_number').val());
            params.append('cheque_date', $('#date_of_payment').val());
            params.append('account_holder_name', $('#account_holder_name').val());
            params.append('account_number', $('#accountnumber').val());
            params.append('bank_name', $('#bank_name').val());
            params.append('branch_name', $('#branch').val());
            params.append('ifsc_code', $('#ifsc_code').val());
            params.append('created_by', user_id);
            params.append('created_for', $('#agent-id').val());
            params.append('customer_id', $('#customer_id').val());
            $.ajax({
                url: base_url + 'customer/new-booking',
                type: 'post',
                data: params,
                contentType: false,
                processData: false,
                success: function (response) {

                    if (response.status == "success") {
                        $('#customer_id').val('');
                        getCustomersList();
                        document.getElementById('add_new_booking_form').reset();
                        $('#photo').attr('src', '');
                        $('#photo').css('display', 'none');
                        location.href = 'manage-customer';
                        hideLoader();
                    } else {
                        hideLoader();
                    }
                }
            });

        }


    });//add-new booking-form end


    $("#customer_add_form_submit").submit(function (e) {
        e.preventDefault();
        var customer_frm = $("#customer_add_form_submit");
        customer_frm.validate({
            rules: {
                accountnumber: {
                    number: true
                },
            },
            errorPlacement: function errorPlacement(error, element) {
                element.before(error);
            }
        });

        if ($("#customer_add_form_submit").valid()) {
            showLoader();
            var params = new FormData();
            params.append('user_id', user_id);
            params.append('agent_id', $('#agent_id').val());
            //personal detalis
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
            params.append('address', $('#customer_address').val());
            params.append('photo', $('#photo')[0].files[0]);
            //nominee details
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
            //plan details
            params.append('registration_number', $('#registration_num').val());
            params.append('project_master_id', $('#project_name').val());
            var sub_project = 0;
            if ($('#sub_projects').val()) {
                sub_project = $('#sub_projects').val();
            }
            params.append('sub_project_id', sub_project);
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
            //payment details
            var payment_mode = '';
            if ($('#payment_cash').is(':checked') == true) {
                payment_mode = $('#payment_cash').val();
            }
            if ($('#payment_cheque').is(':checked') == true) {
                payment_mode = $('#payment_cheque').val();
            }
            if ($('#payment_online').is(':checked') == true) {
                payment_mode = $('#payment_online').val();
            }
            params.append('payment_mode', payment_mode);
            params.append('cheque_number', $('#payment_number').val());
            params.append('cheque_date', $('#date_of_payment').val());
            params.append('account_holder_name', $('#account_holder_name').val());
            params.append('account_number', $('#accountnumber').val());
            params.append('bank_name', $('#bank_name').val());
            params.append('branch_name', $('#branch').val());
            params.append('ifsc_code', $('#ifsc_code').val());
            params.append('created_by', user_id);
            params.append('created_for', $('#agent_id').val());



            var url = base_url + 'customer/add';
            if ($('#customer_id').val()) {
                params.append('id', $('#customer_id').val());
                url = base_url + 'customer/update';
            }
            $.ajax({
                url: url,
                type: 'post',
                data: params,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.status == "success") {
                        var customer_id = response.data.id;
                        if (customer_id != '' && $('#customer_id').val() == '') {
                            params.append('customer_id', customer_id);
                            params.append('photo', $('#payment_photo')[0].files[0]);
                            $.ajax({
                                url: base_url + 'customer/new-booking',
                                type: 'post',
                                data: params,
                                contentType: false,
                                processData: false,
                                success: function (response) {
                                    $('#customer_id').val('');
                                    getCustomersList();
                                    document.getElementById('customer_add_form_submit').reset();
                                    $('#photo').attr('src', '');
                                    $('#photo').css('display', 'none');
                                    location.href = 'manage-customer';
                                    hideLoader();
                                }
                            });
                        }

                    } else {
                        hideLoader();
                    }
                }
            });
        }
    }); //end form submit

}); //end document ready

function updateCustomerDetail(customer_id, agent_id, status) {
    showLoader();
    getProjectList();
    //setTimeout(function () {
    $.ajax({
        url: base_url + 'customer/detail',
        type: 'post',
        data: {
            id: customer_id
        },
        success: function (response) {
            if (response.status == "success") {
                console.log(response);
                var data = response.data;
                if (status == 1) {
                    $('.nominee').css('display', 'none');
                    $('.plan_details').css('display', 'none');
                    $('.payment_details').css('display', 'none');
                    $('#customer_id').val(data.customer.id);
                    $('#agent_id').val(data.customer.user_id);
                    $('#agent_id').prop('disabled', true);
                    $('#customer-list-select').val(data.customer.id)
                    $('#customer-list-select').prop('disabled', true);
                    $('#customername').val(data.customer.name);
                    $('#fatherhusbandwife').val(data.customer.fathers_name);
                    var dob = data.customer.dob;
                    var datetime = new Date(dob);
                    var day = datetime.getDate();
                    day = (day < 10) ? '0' + day : day;
                    var month = MonthArr[datetime.getMonth()];// + 1;
                    //month = (month < 10) ? '0' + month : month
                    var year = datetime.getFullYear();
                    var formatted_date = day + "-" + month + "-" + year;
                    $('#dateofbirth').val(formatted_date);
                    $('#age').val(data.customer.age);
                    if (data.customer.sex == 'Male') {
                        $('#customer_male').prop('checked', true);
                    } else if (data.customer.sex == 'Female') {
                        $('#customer_female').prop('checked', true);
                    }
                    $('.disable-elm').prop('disabled', true);
                    $('#nationality').val(data.customer.nationality);
                    $('#mobile').val(data.customer.mobile);
                    $('#email').val(data.customer.email);
                    if (data.customer.photo) {
                        var photo_src = media_url + 'customers/' + data.customer.photo;
                        $('#upload_photo').attr('src', photo_src);
                        $('#upload_photo').css('display', 'block');
                    }
                    $('#customer_address').val(data.customer.address);
                }//status 1 if


                hideLoader();
            }
            hideLoader();
        }
    });
    //}, 1000);
}

function deleteCustomerList(e, customer_id) {
    e.preventDefault();
    showLoader();
    $.ajax({
        url: base_url + 'customer/delete',
        type: 'post',
        data: {
            id: customer_id,
            user_id: user_id
        },
        success: function (response) {
            if (response.status == "success") {
                $("#tr_" + customer_id).remove();
            }
            hideLoader();
        }
    });
}
function payment_mode_change(value) {
    if (value == 'Cash') {
        var append_div = '<div class="form-group row" id="payment_number_div">\n\
                            <label class="col-sm-2 col-form-label">Reciept Number :<span class="text-danger">*</span></label>\n\
                            <div class="col-sm-4 payment_number_div">\n\
                                <input class="form-control required " type="text" id="payment_number" name="payment_number" placeholder="Enter reciept number.">\n\
                            </div>\n\
                            <label class="col-sm-2 col-form-label">Name :<span class="text-danger">*</span></label>\n\
                            <div class="col-sm-4">\n\
                                <input class="form-control required" type="text" id="account_holder_name" name="account_holder_name" placeholder="Enter name ">\n\
                            </div>\n\
                        </div>\n\
                        <div class="form-group row" id="bank-date-div">\n\
                            <label class="col-sm-2 col-form-label">Date Of Payment :<span class="text-danger">*</span></label>\n\
                            <div class="col-sm-4">\n\
                            <div class="input-group date datepicker">\n\
                              <input class="form-control required " type="text" id="date_of_payment" name="date_of_payment" placeholder="Enter date of payment"  readonly>\n\
                              <span class="input-group-addon input-group-append border-left">\n\
                                 <span class="mdi mdi-calendar input-group-text bg-dark"></span>\n\
                              </span>\n\
                            </div>\n\
                            </div>\n\
                            <label class="col-sm-2 col-form-label">Upload Image</label>\n\
                            <div class="input-group col-sm-4">\n\
                                <input type="file" name="payment_photo" class="file-upload-default" id="payment_photo">\n\
                                <input type="text" class="form-control file-upload-info " disabled placeholder="Choose File">\n\
                                <span class="input-group-append">\n\
                                    <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>\n\
                                </span>\n\
                                <img src="" style="display:none;width:100px;" id="photo_id" />\n\
                            </div>\n\
                     </div>';
        $("#branch").val('');
        $('.branch').css('display', 'none');
    }
    else if (value == 'Cheque') {
        var append_div = '<div class="form-group row" id="payment_number_div">\n\
                            <label class="col-sm-2 col-form-label">Cheque/UTR No :<span class="text-danger">*</span></label>\n\
                            <div class="col-sm-4 payment_number_div">\n\
                                <input class="form-control required " type="text" id="payment_number" name="payment_number" placeholder="Enter cheque number.">\n\
                            </div>\n\
                            <label class="col-sm-2 col-form-label">Account Holder Name :<span class="text-danger">*</span></label>\n\
                            <div class="col-sm-4">\n\
                                <input class="form-control required" type="text" id="account_holder_name" name="account_holder_name" placeholder="Enter account holder name ">\n\
                            </div>\n\
                        </div>\n\
                        <div class="form-group row" id="acount-ifsc-div">\n\
                            <label class="col-sm-2 col-form-label account_label">Account Number :<span class="text-danger">*</span></label>\n\
                            <div class="col-sm-4 account_label">\n\
                                 <input type="text" class="form-control required" id="accountnumber" name="accountnumber" placeholder="Enter Account Number" onkeypress="return isNumberKey(event);">\n\
                            </div>\n\
                            <label class="col-sm-2 col-form-label ifsc_code_label">IFSC Code :<span class="text-danger">*</span></label>\n\
                            <div class="col-sm-4 ifsc_code_label">\n\
                                 <input type="text" class="form-control required" id="ifsc_code" name="ifsc_code" placeholder="Enter your ifsc code">\n\
                            </div>\n\
                        </div>\n\
                        <div class="form-group row" id="bank-date-div">\n\
                            <label class="col-sm-2 col-form-label">Date Of Payment :<span class="text-danger">*</span></label>\n\
                            <div class="col-sm-4">\n\
                            <div class="input-group date datepicker">\n\
                              <input class="form-control required " type="text" id="date_of_payment" name="date_of_payment" placeholder="Enter date of payment"  readonly>\n\
                              <span class="input-group-addon input-group-append border-left">\n\
                                 <span class="mdi mdi-calendar input-group-text bg-dark"></span>\n\
                              </span>\n\
                            </div>\n\
                            </div>\n\
                            <label class="col-sm-2 col-form-label bank_name">Bank Name :<span class="text-danger">*</span></label>\n\
                            <div class="col-sm-4 bank_name">\n\
                                <input class="form-control required" type="text" id="bank_name" name="bank_name" placeholder="Enter bank name">\n\
                            </div>\n\
                     </div>\n\
                     <div class="form-group row">\n\
                     <label class="col-sm-2 col-form-label">Upload Image</label>\n\
                                <div class="input-group col-sm-4">\n\
                                    <input type="file" name="payment_photo" class="file-upload-default" id="payment_photo">\n\
                                    <input type="text" class="form-control file-upload-info " disabled placeholder="Choose File">\n\
                                    <span class="input-group-append">\n\
                                        <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>\n\
                                    </span>\n\
                                    <img src="" style="display:none;width:100px;" id="photo_id" />\n\
                                </div>\n\
                     </div>';

        $('.branch').css('display', 'block');


    }
    else if (value == 'Online') {
        var append_div = '<div class="form-group row" id="payment_number_div">\n\
                            <label class="col-sm-2 col-form-label">Online Transaction No :<span class="text-danger">*</span></label>\n\
                            <div class="col-sm-4 payment_number_div">\n\
                                <input class="form-control required " type="text" id="payment_number" name="payment_number" placeholder="Enter transaction number.">\n\
                            </div>\n\
                            <label class="col-sm-2 col-form-label">Name :<span class="text-danger">*</span></label>\n\
                            <div class="col-sm-4">\n\
                                <input class="form-control required" type="text" id="account_holder_name" name="account_holder_name" placeholder="Enter name ">\n\
                            </div>\n\
                        </div>\n\
                        <div class="form-group row" id="acount-ifsc-div">\n\
                        <label class="col-sm-2 col-form-label account_label">Account Number :<span class="text-danger">*</span></label>\n\
                        <div class="col-sm-4 account_label">\n\
                             <input type="text" class="form-control required" id="accountnumber" name="accountnumber" placeholder="Enter Account Number" onkeypress="return isNumberKey(event);">\n\
                        </div>\n\
                        <label class="col-sm-2 col-form-label ifsc_code_label">IFSC Code :<span class="text-danger">*</span></label>\n\
                        <div class="col-sm-4 ifsc_code_label">\n\
                             <input type="text" class="form-control required" id="ifsc_code" name="ifsc_code" placeholder="Enter your ifsc code">\n\
                        </div>\n\
                    </div>\n\
                    <div class="form-group row" id="bank-date-div">\n\
                            <label class="col-sm-2 col-form-label">Date Of Payment :<span class="text-danger">*</span></label>\n\
                            <div class="col-sm-4">\n\
                            <div class="input-group date datepicker">\n\
                              <input class="form-control required " type="text" id="date_of_payment" name="date_of_payment" placeholder="Enter date of payment"  readonly>\n\
                              <span class="input-group-addon input-group-append border-left">\n\
                                 <span class="mdi mdi-calendar input-group-text bg-dark"></span>\n\
                              </span>\n\
                            </div>\n\
                            </div>\n\
                            <label class="col-sm-2 col-form-label">Upload Image</label>\n\
                            <div class="input-group col-sm-4">\n\
                                <input type="file" name="payment_photo" class="file-upload-default" id="payment_photo">\n\
                                <input type="text" class="form-control file-upload-info " disabled placeholder="Choose File">\n\
                                <span class="input-group-append">\n\
                                    <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>\n\
                                </span>\n\
                                <img src="" style="display:none;width:100px;" id="photo_id" />\n\
                            </div>\n\
                     </div>';
        $("#branch").val('');
        $('.branch').css('display', 'none');
    }

    $('#payment_details').html(append_div);
}

//sub listing
function sub_project_listing(id) {
    $(".sub_project_div,.plot_name_div").css('display', 'none');
    var sub_option = '<option value="">Select Sub Project</option>';
    $.each(sub_project_list, function (key, value) {
        if (value.id == id) {
            if (value.children.length > 0) {
                $(".sub_project_div").css('display', 'block');
                $.each(value.children, function (key1, subproject) {
                    sub_option += '<option value="' + subproject.id + '">' + subproject.name + '</option>';
                });
            }
            else {
                var sub_id = 0;
                getplotlist(id, sub_id);
            }
        }
    });
    $('#sub_projects').html(sub_option)
}

//cutomer list
function getCustomersList(user_id) {
    showLoader();
    destroyDataTable();
    $.ajax({
        url: base_url + 'customers',
        type: 'post',
        data: {
            user_id: user_id
        },
        async: false,
        success: function (response) {
            var agent_id = $('#agent_listing').val();
            var html = '';
            var customer_list = '<option value="">New</option>';
            if (response.status == "success") {
                var data = response.data;
                $.each(data, function (key, val) {
                    html += '<tr id="tr_' + val.id + '">\n\
                                  <td>' + val.display_name + '</td>\n\
                                  <td>' + val.sex + '</td>\n\
                                  <td>' + val.mobile + '</td>\n\
                                  <td>' + val.address + '</td>\n\
                                  <td>' + val.age + '</td>\n\
                                  <td>' + val.email + '</td>\n\
                                  <td>\n\
                                        <a href="add-customer.php?customer_id=' + val.id + '&agent_id=' + agent_id + '&f=1" title="Edit Customer Detail"><i class="mdi mdi-pencil text-info"></i></a> &nbsp \n\
                                        <a href="add-customer.php?customer_id=' + val.id + '&agent_id=' + agent_id + '&f=2" id="add_new_booking" title="Add New Booking"><i class="mdi mdi-open-in-new"></i></a> &nbsp \n\
                                        <a href="view-booking.php?customer_id=' + val.id + '&agent_id=' + agent_id + '" id="view_booking" title="View Bookings"><i class="mdi mdi-view-list"></i></a> &nbsp \n\
                                        <!--<i class="mdi mdi-delete text-danger" onclick="deleteCustomerList(event, ' + val.id + ');"></i>-->\n\
                                  </td>\n\
                              </tr>';
                    customer_list += '<option value="' + val.id + '">' + val.display_name + '</option>';
                });

                $('#customers_list').html(html);
                $("#customer-list-select").html(customer_list);
                initDataTable();
                hideLoader();
            } else {
                hideLoader();
            }

        }
    });
}

//function for get customer list
function get_customer_list(user_id) {
    //login user id
    var url = base_url + 'customers';
    $.ajax({
        url: url,
        type: 'post',
        dataType: 'json',
        data: {
            user_id: user_id
        },
        success: function (response) {
            if (response.status) {
                var customer_list = '<option value="">New</option>';
                $.each(response.data, function (key, value) {
                    customer_list += '<option value="' + value.id + '">' + value.display_name + '</option>';
                });
                $("#customer-list").html(customer_list);

            }

        }
    });
}//end function customer list

function setIdofForm(form_id) {
    $('.customer-booking-form').removeAttr('id');
    $('.customer-booking-form').attr('id', form_id);
}

var today = new Date();
var todays_date = today.getDate() + '-' + (today.getMonth() + 1) + '-' + today.getFullYear();
function initDatepicker() {
    $(":input").inputmask();
    if ($(".datepicker").length) {
        $('#dateofbirth').datepicker({
            enableOnReadonly: true,
            todayHighlight: true,
            format: 'dd-M-yyyy',
            autoclose: true,
            endDate: todays_date
        });
        $('#date_of_birth_nominee').datepicker({
            enableOnReadonly: true,
            todayHighlight: true,
            format: 'dd-M-yyyy',
            autoclose: true,
            endDate: todays_date
        });
        $('#date_of_payment').datepicker({
            enableOnReadonly: true,
            todayHighlight: true,
            format: 'dd-M-yyyy',
            autoclose: true,
        });
    }
}

function calculatePlotAmount(area, price) {
    var totla_amount = (Number(area) * Number(price));
    var received_booking_amount = (totla_amount * 0.10);

    $('#received_booking_amount').val(received_booking_amount.toFixed(2));
    $('#total_amount').val(totla_amount.toFixed(2));
}

initDatepicker();