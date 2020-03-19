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
                var option = '<option value="">Select Agent</option>';
                $.each(data, function (key, val) {
                    option += '<option value="' + val.id + '">' + val.username + ' - ' + val.associate_name + '</option>';
                });
                $('#agent_id,#agent_listing').html(option);

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

                $('#project_name').html(option);
                hideLoader();
            } else {
                console.log(response.data);
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
            console.log(response);
            var option = '<option value="">Select plots</option>';
            if (response.status == "success") {
                $.each(response.data, function (key, value) {
                    //console.log(key, value)
                    option += '<option value="' + value.id + '">' + value.name + '</option>';
                });
                $('.plot_name_div').css('display', 'block');
                $('#plot_name').html(option);
                hideLoader();
            } else {
                $('.plot_name_div').css('display', 'none');
                console.log(response.data);
                hideLoader();
            }

        }
    });
}//end plot listing



var today = new Date();
var todays_date = today.getDate() + '-' + (today.getMonth() + 1) + '-' + today.getFullYear();
$(document).ready(function () {

    $(document).on('change', '#agent_listing', function () {
        if ($(this).val()) {
            getCustomersList($(this).val());
        }
    });

    var update_customer_id = $('#customer_id').val();
    if (update_customer_id && update_customer_id != '') {
        updateCustomerDetail(update_customer_id);
    }

    $(":input").inputmask();
    if ($(".datepicker").length) {
        $('.datepicker').datepicker({
            enableOnReadonly: true,
            todayHighlight: true,
            format: 'dd-mm-yyyy',
            autoclose: true,
            //endDate: todays_date
        });
    }

    //onchange payment mode
    $('.payment_mode').click(function () {
        payment_mode_change($(this).val());
    })//end payment mode change


    $("#project_name").change(function () {

        var id = $(this).val();
        sub_project_listing(id);
    });

    $('#sub_projects').change(function () {
        $('.plot_name_div').css('display', 'none');
        var sub_project_id = $(this).val();
        var project_id = $('#project_name').val();
        getplotlist(project_id, sub_project_id);
    })
    $("#customer_add_form_submit").submit(function (e) {
        e.preventDefault();
        var customer_frm = $("#customer_add_form_submit");
        customer_frm.validate({
            rules: {
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
            params.append('cheque_date', $('#dated').val());
            params.append('account_holder_name', $('#account_holder_name').val());
            params.append('account_number', $('#accountnumber').val());
            params.append('bank_name', $('#bank_name').val());
            params.append('branch_name', $('#branch').val());
            params.append('ifsc_code', $('#ifsc_code').val());
            params.append('created_by', user_id);
            params.append('created_for', $('#agent_id').val());
            params.append('photo', $('#photo')[0].files[0]);


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
                        console.log(response.data);
                        var customer_id = response.data.id;
                        console.log(customer_id);
                        if (customer_id && customer_id != '' && $('#customer_id').val() == '') {
                            params.append('customer_id', customer_id);
                            $.ajax({
                                url: base_url + 'customer/new-booking',
                                type: 'post',
                                data: params,
                                contentType: false,
                                processData: false,
                                success: function (response) {
                                    if (response.status == "success") {
                                        console.log(response);
                                    } else {
                                        console.log('else ' + response);
                                    }
                                }
                            });
                        }
                        $('#customer_id').val('');
                        getCustomersList();
                        document.getElementById('customer_add_form_submit').reset();
                        $('#photo').attr('src', '');
                        $('#photo').css('display', 'none');
                        window.location.href = 'manage-customer.php';
                        hideLoader();
                    } else {
                        console.log(response.data);
                        hideLoader();
                    }
                }
            });
        }
    }); //end form submit

}); //end document ready

function updateCustomerDetail(customer_id) {
    showLoader();
    getProjectList();
    setTimeout(function () {
        $.ajax({
            url: base_url + 'customer/detail',
            type: 'post',
            data: {
                id: customer_id
            },
            success: function (response) {
                if (response.status == "success") {
                    var data = response.data;
                    var plot_details = response.data.PlotBooking;
                    //console.log(data);return false;
                    $('#customer_id').val(data.customer.id);
                    $('#agent_id').val(data.customer.user_id);
                    $('#agent_id').prop('disabled', true);
                    $('#customername').val(data.customer.name);
                    $('#fatherhusbandwife').val(data.customer.fathers_name);
                    var dob = data.customer.dob;
                    var datetime = new Date(dob);
                    var day = datetime.getDate();
                    day = (day < 10) ? '0' + day : day;
                    var month = datetime.getMonth() + 1;
                    month = (month < 10) ? '0' + month : month
                    var year = datetime.getFullYear();
                    var formatted_date = day + "-" + month + "-" + year;
                    $('#dateofbirth').val(formatted_date);
                    $('#age').val(data.customer.age);
                    if (data.customer.sex == 'Male') {
                        $('#customer_male').prop('checked', true);
                    } else if (data.customer.sex == 'Female') {
                        $('#customer_female').prop('checked', true);
                    }

                    $('#nationality').val(data.customer.nationality);
                    $('#mobile').val(data.customer.mobile);
                    $('#email').val(data.customer.email);
                    if (data.customer.photo) {
                        var photo_src = media_url + 'customers/' + data.customer.photo;
                        $('#upload_photo').attr('src', photo_src);
                        $('#upload_photo').css('display', 'block');
                    }
                    $('#customer_address').val(data.customer.address);
                    //nominee details
                    $('#nomineesname').val(data.customer.nominee_name);
                    //$('#nomineesname').prop('disabled',true);
                    $('#ageN').val(data.customer.nominee_age);
                    // $('#ageN').prop('disabled',true);
                    var ndob = data.customer.nominee_dob;
                    var ndatetime = new Date(ndob);
                    var nday = ndatetime.getDate();
                    nday = (nday < 10) ? '0' + nday : nday;
                    var nmonth = ndatetime.getMonth() + 1;
                    nmonth = (nmonth < 10) ? '0' + nmonth : nmonth
                    var nyear = ndatetime.getFullYear();
                    var ndate = nday + "-" + nmonth + "-" + nyear;
                    $('#date_of_birth_nominee').val(ndate);
                    //$('#date_of_birth_nominee').prop('disabled',true);
                    $('#relationship').val(data.customer.nominee_relation);
                    //$('#relationship').prop('disabled',true);
                    if (data.customer.nominee_sex == 'Male') {
                        $('#nominee_male').prop('checked', true);
                    } else {
                        $('#nominee_female').prop('checked', true);

                    }
                    //$('#nominee_sex').val(data.customer.nominee_sex);
                    //$('#nominee_sex').prop('disabled',true);
                    $('#addressnominee').val(data.customer.nominee_address);
                    //$('#addressnominee').prop('disabled',true);
                    if (data.customer.payment_mode == 'Online') {
                        $('#payment_online').prop('checked', true);
                    } else if (data.customer.payment_mode == 'Cheque') {
                        $('#payment_cheque').prop('checked', true);
                    } else {
                        $('#payment_cash').prop('checked', true);
                    }
                    payment_mode_change(data.customer.payment_mode);
                    $('#payment_mode').val(data.customer.payment_mode);
                    $('.payment_mode').prop('disabled', true);
                    $('#payment_number').val(data.PaymentMaster.cheque_number)
                    $('#payment_number').prop('disabled', true);
                    $('#accountnumber').val(data.customer.account_number);
                    $('#accountnumber').prop('disabled', true);
                    $('#branch').val(data.customer.branch_name);
                    $('#branch').prop('disabled', true);
                    $('#ifsc_code').val(data.customer.ifsc_code);
                    $('#ifsc_code').prop('disabled', true);
                    $('#account_holder_name').val(data.customer.account_holder_name);
                    $('#account_holder_name').prop('disabled', true);
                    $('#bank_name').val(data.customer.bank_name);
                    $('#bank_name').prop('disabled', true);
                    var cdate = data.PaymentMaster.cheque_date;
                    var ndatetime = new Date(cdate);
                    var nday = ndatetime.getDate();
                    nday = (nday < 10) ? '0' + nday : nday;
                    var nmonth = ndatetime.getMonth() + 1;
                    nmonth = (nmonth < 10) ? '0' + nmonth : nmonth
                    var nyear = ndatetime.getFullYear();
                    var cheque_date = nday + "-" + nmonth + "-" + nyear;
                    $('#dated').val(cheque_date);
                    $('#dated').prop('disabled', true);

                    //Plan Details
                    console.log(plot_details.registration_number);
                    $('#registration_num').val(plot_details.registration_number);
                    $('#registration_num').prop('disabled', true);
                    $('#project_name').val(plot_details.project_master_id);
                    $('#project_name').prop('disabled', true);
                    console.log('here  --'  + plot_details.plot_master_id);
                    if (plot_details.sub_project_id) {

                        sub_project_listing(plot_details.project_master_id);
                        setTimeout(function () { $('#sub_projects').val(plot_details.sub_project_id); }, 2000);
                        getplotlist(plot_details.project_master_id, plot_details.sub_project_id);
                        setTimeout(function () { $('#plot_name').val(plot_details.plot_master_id); }, 2000);
                        $('#sub_projects').prop('disabled', true);
                    }
                    else {
                        var sub_id = 0;
                        getplotlist(plot_details.project_master_id, sub_id);
                        setTimeout(function () { $('#plot_name').val(plot_details.plot_master_id); }, 2000);
                    }

                    $('#plot_name').prop('disabled', true);
                    $('#plot_area').val(plot_details.plot_area);
                    $('#plot_area').prop('disabled', true);
                    $('#reference').val(plot_details.reference);
                    $('#reference').prop('disabled', true);
                    $('#unit_rate').val(plot_details.unit_rate);
                    $('#unit_rate').prop('disabled', true);
                    $('#discount_rate').val(plot_details.discount_rate);
                    $('#discount_rate').prop('disabled', true);
                    $('#total_amount').val(plot_details.total_amount);
                    $('#total_amount').prop('disabled', true);
                    $('#received_booking_amount').val(plot_details.received_booking_amount);
                    $('#received_booking_amount').prop('disabled', true);
                    var date_of_payment = plot_details.date_of_payment;
                    var ndatetime = new Date(date_of_payment);
                    var nday = ndatetime.getDate();
                    nday = (nday < 10) ? '0' + nday : nday;
                    var nmonth = ndatetime.getMonth() + 1;
                    nmonth = (nmonth < 10) ? '0' + nmonth : nmonth
                    var nyear = ndatetime.getFullYear();
                    var plot_date_of_payment = nday + "-" + nmonth + "-" + nyear;
                    $('#date_of_payment').val(plot_date_of_payment);
                    $('#date_of_payment').prop('disabled', true);
                    $('#installment').val(plot_details.installment);
                    $('#installment').prop('disabled', true);
                    hideLoader();
                }
                hideLoader();
            }
        });
    }, 1000);
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
        var append_div = '<label class="col-sm-2 col-form-label" >Invoice Number :</label>\n\
                                <div class="col-sm-4 payment_number_div">\n\
                                <input class="form-control required" type="text" id="payment_number" name="payment_number" placeholder="Enter number.">\n\
                                </div>\n\
                             <label class="col-sm-2 col-form-label">Name :</label>\n\
                            <div class="col-sm-4">\n\
                            <input class="form-control required" type="text" id="account_holder_name" name="account_holder_name" placeholder="Enter name " >\n\
                            </div>';

        $('.bank_name').css('display', 'none');
        $('.account_label').css('display', 'none');
        $('.ifsc_code_label').css('display', 'none');
        $('.branch').css('display', 'none');

    }
    else if (value == 'Cheque') {
        var append_div = '<label class="col-sm-2 col-form-label" >Cheque/UTR No :</label>\n\
                                <div class="col-sm-4 payment_number_div">\n\
                                <input class="form-control required" type="text" id="payment_number" name="payment_number" placeholder="Enter cheque number.">\n\
                                </div>\n\
                             <label class="col-sm-2 col-form-label">Account Holder Name :</label>\n\
                            <div class="col-sm-4">\n\
                            <input class="form-control required" type="text" id="account_holder_name" name="account_holder_name" placeholder="Enter account holder name " >\n\
                            </div>';
        $('.bank_name').css('display', 'block');
        $('.account_label').css('display', 'block');
        $('.ifsc_code_label').css('display', 'block');
        $('.branch').css('display', 'block');
    }
    else if (value == 'Online') {
        var append_div = '<label class="col-sm-2 col-form-label" >Online Transaction No :</label>\n\
                                <div class="col-sm-4 payment_number_div">\n\
                                <input class="form-control required" type="text" id="payment_number" name="payment_number" placeholder="Enter online transaction number.">\n\
                                </div>\n\
                             <label class="col-sm-2 col-form-label">Name :</label>\n\
                            <div class="col-sm-4">\n\
                            <input class="form-control required" type="text" id="account_holder_name" name="account_holder_name" placeholder="Enter name " >\n\
                            </div>';
        $('.bank_name').css('display', 'none');
        $('.account_label').css('display', 'block');
        $('.ifsc_code_label').css('display', 'block');
        $('.branch').css('display', 'none');
    }

    $('#payment_number_div').html(append_div);
}

//sub listing
function sub_project_listing(id) {
    $(".sub_project_div,.plot_name_div").css('display', 'none');
    var sub_option = '<option value="">Select Sub Project</option>';
    console.log(sub_project_list);
    $.each(sub_project_list, function (key, value) {
        if (value.id == id) {
            if (value.children.length > 0) {
                $(".sub_project_div").css('display', 'block');
                $.each(value.children, function (key1, subproject) {
                    console.log(subproject);
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
    $.ajax({
        url: base_url + 'customers',
        type: 'post',
        data: {
            user_id: user_id
        },
        success: function (response) {
            console.log(response);
            var html = '';
            if (response.status == "success") {
                var data = response.data;
                $.each(data, function (key, val) {
                    photo_link = '';
                    if (val.photo) {
                        photo_link = 'http://localhost/obedientcorp/public/uploads/customers/' + val.photo;
                    }
                    html += '<tr id="tr_' + val.id + '">\n\
                                  <td>' + val.name + '</td>\n\
                                  <td>' + val.sex + '</td>\n\
                                  <td>' + val.mobile + '</td>\n\
                                  <td>' + val.address + '</td>\n\
                                  <td>' + val.age + '</td>\n\
                                  <td>' + val.email + '</td>\n\
                                  <td>\n\
                                        <a href="add-customer.php?customer_id=' + val.id + '"><i class="mdi mdi-pencil text-info"></i></a> &nbsp \n\
                                        <!--<i class="mdi mdi-delete text-danger" onclick="deleteCustomerList(event, ' + val.id + ');"></i>-->\n\
                                  </td>\n\
                              </tr>';
                });

                $('#customers_list').html(html);
                initDataTable();
                hideLoader();
            } else {
                console.log(response.data);
                hideLoader();
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