
var amount = '';
var type = '';
get_agent_list();
//function for get all coupons
$(function () {
    $(document).on('click', '#make_request', function () {
        if (checkChecked() == false) {
            document.getElementById('payment-form').reset();
            $('#makeRequest').modal('hide');
            showSwal('error', 'Select Checkbox', 'No EMI selected');
            return false;
        }
        $('#makeRequest').modal();
    });

    $(document).on('click', '#make_request_to_wallet', function () {
        $('#makeRequestWallet').modal();
    });

    $(document).on('click', '#pills-pending-tab,#pills-approve-tab,#pills-reject-tab', function () {
        $('#make_request').css('display', 'none');
    })

    $(document).on('click', '#pills-due-tab', function () {
        $('#make_request').css('display', '');
    })

    $("#payment-form").submit(function (e) {
        e.preventDefault();
        var payment_frm = $("#payment-form");
        payment_frm.validate({
            rules: {
                amount: {
                    required: true,
                    number: true
                },
            },
            errorPlacement: function errorPlacement(error, element) {
                element.before(error);
            }
        });

        if ($("#payment-form").valid()) {
            var params = new FormData();
            var payment_mode = $('#payment_mode').val();
            var payment_number = $('#payment_number').val();

            if ($('#bank_name').val()) {
                var bank_name = $('#bank_name').val();
            }
            var photo = $('#upload-image')[0].files[0];
            var comment = $('#comment').val();
            var created_for = $('#agent-list').val();
            var url = base_url + 'customer-payment-select';
            var emi_ids = [];
            $('.emi_payment:checked').each(function () {
                emi_ids.push($(this).val());
            });
            emi_ids = emi_ids.join();
            if (emi_ids == '' || !emi_ids) {
                document.getElementById('payment-form').reset();
                $('#makeRequest').modal('hide');
                showSwal('error', 'Select EMI', 'No EMI selected')
                return false;
            }
            var amount = $('#amount').val();
            params.append('payment_mode', payment_mode);
            params.append('cheque_number', payment_number);
            params.append('bank_name', bank_name);
            params.append('photo', photo);
            params.append('comment', comment);
            params.append('emi_ids', emi_ids);
            params.append('created_by', user_id);
            params.append('created_for', created_for);
            params.append('amount', amount);
            $.ajax({
                url: url,
                type: 'post',
                data: params,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.status == 'success') {
                        get_customer_payament_details($('#customer-list').val(), 'Due');
                        get_customer_payament_details($('#customer-list').val(), 'Pending');
                        document.getElementById('payment-form').reset();
                        $('#makeRequest').modal('hide');
                        showSwal('success', 'Payment accepted', 'Payment accepted successfully');
                    }
                },
                error: function (response) {
                    error_html = '';
                    var error_object = JSON.parse(response.responseText);
                    var message = error_object.message;
                    var errors = error_object.errors;
                    $.each(errors, function (key, value) {
                        error_html += '<div class="alert alert-danger" role="alert">' + value[0] + '</div>';
                    });
                    $('#errors_div').html(error_html);
                }
            });//ajax
        }//end if
    });

    //form submit for wllet 
    $("#payment-form-wallet").submit(function (e) {
        e.preventDefault();
        var payment_frm_wallet = $("#payment-form-wallet");
        payment_frm_wallet.validate({
            rules: {
                amount_wallet: {
                    required: true,
                    number: true
                },
            },
            errorPlacement: function errorPlacement(error, element) {
                element.before(error);
            }
        });

        if ($("#payment-form-wallet").valid()) {
            var params = new FormData();
            var payment_mode = $('#payment_mode_wallet').val();
            var payment_number = $('#payment_number_wallet').val();

            if ($('#bank_name_wallet').val()) {
                var bank_name = $('#bank_name_wallet').val();
            }
            var photo = $('#upload-image-wallet')[0].files[0];
            var comment = $('#comment_wallet').val();
            var created_for = $('#agent-list').val();
            var url = base_url + 'request-money';
            var walletamount = $('#amount_wallet').val();

            params.append('amount', walletamount);
            params.append('payment_mode', payment_mode);
            params.append('cheque_number', payment_number);
            params.append('bank_name', bank_name);
            params.append('photo', photo);
            params.append('comment', comment);
            params.append('created_by', user_id);
            params.append('created_for', created_for);
            params.append('payment_type', '2');

            $.ajax({
                url: url,
                type: 'post',
                data: params,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.status == 'success') {
                        document.getElementById('payment-form-wallet').reset();
                        $('#makeRequestWallet').modal('hide');
                        showSwal('success', 'Payment Request accepted', 'Payment request accepted successfully');
                    }
                    else
                    {
                        showSwal('error', 'Payment request not accepted', 'Payment request not accepted ');
                    }
                },
                error: function (response) {
                    error_html = '';
                    var error_object = JSON.parse(response.responseText);
                    var message = error_object.message;
                    var errors = error_object.errors;
                    $.each(errors, function (key, value) {
                        error_html += '<div class="alert alert-danger" role="alert">' + value[0] + '</div>';
                    });
                    $('#errors_div').html(error_html);
                }
            });//ajax
        }//end if
    });//end wallet form


    //onchange payment_mode
    $('#payment_mode').change(function () {

        if ($(this).val() == 'Cash') {

            var payment_number = '<label class="col-form-label col-sm-4 text-right payment-number-div">Invoice Number:</label>\n\
                   <div class="col-sm-8">\n\
                     <input type="text" class="form-control required" id="payment_number" name="payment_number">\n\
                                                            </div>';
            $('.payment-number-div').html(payment_number);
            $('.bank-name').css('display', 'none');

        }
        else if ($(this).val() == 'Online') {

            var payment_number = '<label class="col-form-label col-sm-4 text-right payment-number-div">Online Transaction Number:</label>\n\
                   <div class="col-sm-8">\n\
                     <input type="text" class="form-control required" id="payment_number" name="payment_number">\n\
                                                            </div>';
            $('.payment-number-div').html(payment_number);
            $('.bank-name').css('display', 'block');

        }
        else if ($(this).val() == 'Cheque') {
            var payment_number = '<label class="col-form-label col-sm-4 text-right payment-number-div">Cheque Number:</label>\n\
                   <div class="col-sm-8">\n\
                     <input type="text" class="form-control required" id="payment_number" name="payment_number">\n\
                                                            </div>';
            $('.payment-number-div').html(payment_number);
            $('.bank-name').css('display', 'block');
        }
    });


    //onchange payment_mode wallet
    $('#payment_mode_wallet').change(function () {
        if ($(this).val() == 'Cash') {
            var payment_number = '<label class="col-form-label col-sm-4 text-right payment-number-div-wallet">Invoice Number:</label>\n\
               <div class="col-sm-8">\n\
                 <input type="text" class="form-control required" id="payment_number_wallet" name="payment_number_wallet">\n\
                                                        </div>';
            $('.payment-number-div-wallet').html(payment_number);
            $('.bank-name-wallet').css('display', 'none');

        }
        else if ($(this).val() == 'Online') {

            var payment_number = '<label class="col-form-label col-sm-4 text-right payment-number-div-wallet">Online Transaction Number:</label>\n\
               <div class="col-sm-8">\n\
                 <input type="text" class="form-control required" id="payment_number_wallet" name="payment_number_wallet">\n\
                                                        </div>';
            $('.payment-number-div-wallet').html(payment_number);
            $('.bank-name-wallet').css('display', 'block');

        }
        else if ($(this).val() == 'Cheque') {

            var payment_number = '<label class="col-form-label col-sm-4 text-right payment-number-div-wallet">Cheque Number:</label>\n\
               <div class="col-sm-8">\n\
                 <input type="text" class="form-control required" id="payment_number_wallet" name="payment_number_wallet">\n\
                                                        </div>';
            $('.payment-number-div-wallet').html(payment_number);
            $('.bank-name-wallet').css('display', 'block');
        }
    });
}); //end ready function



function getCustomerPaymentList(customer_id) {
    get_customer_payament_details(customer_id, 'Due');
    get_customer_payament_details(customer_id, 'Pending');
    get_customer_payament_details(customer_id, 'Approved');
    get_customer_payament_details(customer_id, 'Rejected');

}
function get_customer_payament_details(customer_id, status) {
    var params = {
        user_id: $('#agent-list').val(),
        customer_id: customer_id,
        status: status
    };
    $("#customer_payment").html('');
    $.ajax({
        url: base_url + 'customer-payment-list',
        type: 'post',
        data: params,
        success: function (response) {
            if (response.status == 'success') {
                var action_th = '';
                if (status == 'Due') {
                    action_th = '<th></th>';
                }
                var table_data = '<thead>\n\
                                        <tr>\n\
                                            ' + action_th + '\n\
                                            <th> Customer </th>\n\
                                            <th> Amount </th>\n\
                                            <th> EMI Due Date </th>\n\
                                            <th>Project</th>\n\\n\
                                            <th>Sub Project</th>\n\
                                            <th>Plot ID</th>\n\
                                            <th>Status</th>\n\
                                        </tr>\n\
                                    </thead>';
                var checkbox = '';
                table_data += '<tbody>';
                $.each(response.data, function (key, value) {
                    checkbox = '';
                    var action_tr = '';
                    //var sub_project ='<td></td>';
                    if (status == 'Due') {
                        if (value.payment_status == 'Due') {
                            checkbox = '<div class="form-check m-0">\n\
                            <label class="form-check-label"><input type="checkbox" class="form-check-input emi_payment" value="' + value.customer_plot_booking_payment_detail_id + '">\n\
                            <i class="input-helper"></i></label></div>';
                            action_tr = '<td>' + checkbox + '</td>';

                        }
                    }
                    var dd = new Date(value.due_date);
                    var duedate = dd.getDate() + '-' + month[dd.getMonth()] + '-' + dd.getFullYear();

                    table_data += '<tr >\n\
                                        ' + action_tr + '\n\
                                            <td>' + value.name + '</td>\n\
                                            <td id="payment-amount_' + value.customer_plot_booking_payment_detail_id + '">' + value.amount + '</td>\n\
                                            <td>' + duedate + '</td>\n\
                                            <td>' + value.project_master_name + '</td>\n\
                                            <td>' + value.sub_project_master_name + '</td>\n\
                                            <td>' + value.plot_master_name + '</td>\n\
                                            <td>' + value.payment_status + ' &nbsp; <a href="payment-detail.php?pid=' + value.payment_master_id + '&uid=' + $('#agent-list').val() + '">Detail</a></td>\n\
                                        </tr>';
                });
                table_data += '</tbody>';
                if (status == 'Due') {
                    $("#due_payment_list").html(table_data);
                    $("#due_payment_list").DataTable();
                }
                if (status == 'Pending') {
                    $("#pending_payment_list").html(table_data);
                    $("#pending_payment_list").DataTable();
                }
                if (status == 'Approved') {
                    $("#approved_payment_list").html(table_data);
                    $("#approved_payment_list").DataTable();
                }
                if (status == 'Rejected') {
                    $("#reject_payment_list").html(table_data);
                    $("#reject_payment_list").DataTable();
                }
            }
            else {
                if (status == 'Due') {
                    $("#due_payment_list").html(response.data);
                }
                if (status == 'Pending') {
                    $("#pending_payment_list").html(response.data);
                }
                if (status == 'Approved') {
                    $("#approved_payment_list").html(response.data);
                }
                if (status == 'Rejected') {
                    $("#reject_payment_list").html(response.data);
                }
            }

        }
    });
}//end function get-payment-details

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
                var customer_list = '<option value="">--select--</option>';
                $.each(response.data, function (key, value) {
                    customer_list += '<option value="' + value.id + '">' + value.display_name + '</option>';
                });
                $("#customer-list").html(customer_list);

            }

        }
    });
}//end function customer list

//function for get agent list
function get_agent_list() {
    //login user id
    var url = base_url + 'down-the-line-members';
    var agent_id = 0;
    $.ajax({
        url: url,
        type: 'post',
        dataType: 'json',
        data: {
            user_id: user_id
        },
        success: function (response) {
            if (response.status) {
                var customer_list;
                var i = 0;
                $.each(response.data, function (key, value) {
                    if (i == 0) {
                        agent_id = value.id;
                        i = 1;
                    }
                    customer_list += '<option value="' + value.id + '">' + value.display_name + '</option>';
                });
                get_customer_list(agent_id);
                $("#agent-list").html(customer_list);

            }

        }
    });
}//end function agent list

function checkChecked() {
    var x = false;
    $('.emi_payment').each(function () {
        if ($(this).is(":checked")) {
            x = true;
        }
    });
    return x;
}