getDownTheLineMembers(user_id);
getRelationship();


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
            endDate: todays_date
        });
    }
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
    });//end form submit

});//end document ready

function updateCustomerDetail(customer_id) {
    showLoader();
    $.ajax({
        url: base_url + 'customer/detail',
        type: 'post',
        data: {
            id: customer_id
        },
        success: function (response) {
            if (response.status == "success") {
                var data = response.data;
                console.log(data);
                $('#customer_id').val(data.id);
                $('#agent_id').val(data.user_id);
                $('#customername').val(data.name);
                $('#fatherhusbandwife').val(data.fathers_name);
                var dob = data.dob;
                console.log(dob);
                var datetime = new Date(dob);
                var day = datetime.getDate();
                day = (day < 10) ? '0' + day : day;
                var month = datetime.getMonth() + 1;
                month = (month < 10) ? '0' + month : month
                var year = datetime.getFullYear();
                var formatted_date = day + "-" + month + "-" + year;
                $('#dateofbirth').val(formatted_date);
                $('#age').val(data.age);
                if (data.sex == 'Male') {
                    $('#customer_male').prop('checked', true);
                } else if (data.sex == 'Female') {
                    $('#customer_female').prop('checked', true);
                }

                $('#nationality').val(data.nationality);
                $('#mobile').val(data.mobile);
                $('#email').val(data.email);
                if (data.photo) {
                    var photo_src = media_url + 'customers/' + data.photo;
                    $('#upload_photo').attr('src', photo_src);
                    $('#upload_photo').css('display', 'block');
                }
                $('#customer_address').val(data.address);
                $('#nomineesname').val(data.nominee_name);
                $('#ageN').val(data.nominee_age);
                var ndob = data.nominee_dob;
                var ndatetime = new Date(ndob);
                var nday = ndatetime.getDate();
                nday = (nday < 10) ? '0' + nday : nday;
                var nmonth = ndatetime.getMonth() + 1;
                nmonth = (nmonth < 10) ? '0' + nmonth : nmonth
                var nyear = ndatetime.getFullYear();
                var ndate = nday + "-" + nmonth + "-" + nyear;
                $('#date_of_birth_nominee').val(ndate);
                $('#relationship').val(data.nominee_relation);
                if (data.nominee_sex == 'Male') {
                    $('#nominee_male').prop('checked', true);
                } else {
                    $('#nominee_female').prop('checked', true);

                }
                $('#nominee_sex').val(data.nominee_sex);
                $('#addressnominee').val(data.nominee_address);
                if (data.payment_mode == 'DD') {
                    $('#payment_dd').prop('checked', true);
                } else if (data.payment_mode == 'Cheque') {
                    $('#payment_cheque').prop('checked', true);
                } else {
                    $('#payment_cash').prop('checked', true);
                }
                $('#payment_mode').val(data.payment_mode);
                $('#accountnumber').val(data.account_number);
                $('#branch').val(data.branch_name);
                $('#ifsc_code').val(data.ifsc_code);
                $('#accountholdername').val(data.account_holder_name);
                $('#bankname').val(data.bank_name);
                hideLoader();
            }
            hideLoader();
        }
    });
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
                                        <a href="add-new-booking.php?customer_id='+ val.id + '"><i class="mdi mdi-launch text-success"></i></a> &nbsp \n\
                                        <a href="add-customer.php?customer_id='+ val.id + '"><i class="mdi mdi-pencil text-info"></i></a> &nbsp \n\
                                        <i class="mdi mdi-delete text-danger" onclick="deleteCustomerList(event, ' + val.id + ');"></i>\n\
                                  </td>\n\
                              </tr>';
                });

                $('#customers_list').html(html)
                hideLoader();
            } else {
                console.log(response.data);
                hideLoader();
            }

        }
    });
}