$(function () {
    $(document).on('click', '#make_request_to_wallet', function () {
        $('#makeRequestWallet').modal();
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
            params.append('created_for', user_id);
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
                        showSwal('success', 'Request Submitted', 'Payment request submitted successfully');
                        getAgentPaymentList(user_id);
                    }
                    else
                    {
                        showSwal('error', 'Request Failed', 'Payment request could not be submitted.');
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

function getAgentPaymentList(agent_id) {
    get_agent_payment_list(agent_id, 'Pending');
    get_agent_payment_list(agent_id, 'Approved');
    get_agent_payment_list(agent_id, 'Rejected');
}

function get_agent_payment_list(agent_id, status) {
    showLoader();
    var params = {
        user_id: agent_id,
        status: status
    };

    $("#customer_payment").html('');
    $.ajax({
        url: base_url + 'request-money-list',
        type: 'post',
        data: params,
        success: function (response) {
            if (response.status == 'success') {
                var table_data = '<thead>\n\
                                    <tr>\n\
                                        <th> Type </th>\n\
                                        <th> Amount </th>\n\
                                        <th> Agent </th>\n\
                                        <th> Date Requested </th>\n\
                                        <th> Payment Mode </th>\n\
                                        <th> Payment Number </th>\n\
                                    </tr>\n\
                                </thead>';
                table_data += '<tbody>';
                $.each(response.data, function (key, value) {
                    var dd = new Date(value.date_requested);
                    var date_of_payment = dd.getDate() + '-' + MonthArr[dd.getMonth()] + '-' + dd.getFullYear();
                    table_data += '<tr >\n\
                                        <td class="py-1"><i class="mdi mdi-ticket"></i></td>\n\
                                        <td>' + value.amount + '</td>\n\
                                        <td >' + value.display_name + '</td>\n\
                                        <td>' + date_of_payment + '</td>\n\
                                        <td>' + value.payment_mode + '</td>\n\
                                        <td>' + value.cheque_number + '</td>\n\
                                    </tr>';
                });
                table_data += '</tbody>';
                if (status == 'Pending') {
                    $("#pending_payment_list").html(table_data);
                    generateDataTable('pending_payment_list');
                }
                if (status == 'Approved') {
                    $("#approved_payment_list").html(table_data);
                    generateDataTable('approved_payment_list');
                }
                if (status == 'Rejected') {
                    $("#reject_payment_list").html(table_data);
                    generateDataTable('reject_payment_list');
                }
                hideLoader();
            }
            else {
                if (status == 'Pending') {
                    $("#pending_payment_list").html(response.data);
                }
                if (status == 'Approved') {
                    $("#approved_payment_list").html(response.data);
                }
                if (status == 'Rejected') {
                    $("#reject_payment_list").html(response.data);
                }
                hideLoader();
            }

        }
    });
}

getAgentPaymentList(user_id);