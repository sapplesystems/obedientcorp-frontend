var amount = '';
var type = '';
var amount_sum = 0;
getAgentList();
getCustoerPaymentDetails(0, 'Due');
getCustoerPaymentDetails(0, 'Pending');
getCustoerPaymentDetails(0, 'Approved');
getCustoerPaymentDetails(0, 'Rejected');
$(function () {
    $(document).on('click', '#make_request', function () {
        if (checkChecked() == false) {
            document.getElementById('payment-form').reset();
            $('#makeRequest').modal('hide');
            showSwal('error', 'Select Checkbox', 'No EMI selected');
            return false;
        }
        $('#makeRequest').modal();
        $('#amount').val(amount_sum);
        $('#amount').attr('readOnly', true);
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
                    console.log(response);
                    if (response.status == 'success') {
                        getCustoerPaymentDetails($('#customer-list').val(), 'Due');
                        getCustoerPaymentDetails($('#customer-list').val(), 'Pending');
                        document.getElementById('payment-form').reset();
                        $('#makeRequest').modal('hide');
                        showSwal('success', 'Payment Request Accepted', 'Payment Approval is subject to payment realization');
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


    //onchange payment_mode
    $('#payment_mode').change(function () {

        if ($(this).val() == 'Cash') {

            var payment_number = '<label class="col-form-label col-sm-4 text-right payment-number-div">Reciept Number:</label>\n\
                   <div class="col-sm-8">\n\
                     <input type="text" class="form-control required" id="payment_number" name="payment_number" placeholder="Enter reciept number.">\n\
                                                            </div>';
            $('.payment-number-div').html(payment_number);
            $('.bank-name').css('display', 'none');

        }
        else if ($(this).val() == 'Online') {

            var payment_number = '<label class="col-form-label col-sm-4 text-right payment-number-div">Online Transaction Number:</label>\n\
                   <div class="col-sm-8">\n\
                     <input type="text" class="form-control required" id="payment_number" name="payment_number" placeholder="Enter transaction number.">\n\
                                                            </div>';
            $('.payment-number-div').html(payment_number);
            $('.bank-name').css('display', 'block');

        }
        else if ($(this).val() == 'Cheque') {
            var payment_number = '<label class="col-form-label col-sm-4 text-right payment-number-div">Cheque Number:</label>\n\
                   <div class="col-sm-8">\n\
                     <input type="text" class="form-control required" id="payment_number" name="payment_number" placeholder="Enter cheque number.">\n\
                                                            </div>';
            $('.payment-number-div').html(payment_number);
            $('.bank-name').css('display', 'block');
        }
    });
}); //end ready function



function getCustomerPaymentList(customer_id) {
    getCustoerPaymentDetails(customer_id, 'Due');
    getCustoerPaymentDetails(customer_id, 'Pending');
    getCustoerPaymentDetails(customer_id, 'Approved');
    getCustoerPaymentDetails(customer_id, 'Rejected');

}
function getCustoerPaymentDetails(customer_id, status) {
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
                    var detail_link = '<a target="_blank" href="payment-detail.php?pid=' + value.payment_master_id + '&uid=' + $('#agent-list').val() + '">Detail</a>';
                    if (status == 'Due' || value.payment_status == 'Due') {
                        detail_link = '';
                        checkbox = '<div class="form-check m-0">\n\
                            <label class="form-check-label"><input type="checkbox" class="form-check-input emi_payment" value="' + value.customer_plot_booking_payment_detail_id + '">\n\
                            <i class="input-helper"></i></label></div>';
                        action_tr = '<td>' + checkbox + '</td>';

                    }
                    var dd = new Date(value.due_date);
                    var duedate = dd.getDate() + '-' + MonthArr[dd.getMonth()] + '-' + dd.getFullYear();

                    table_data += '<tr >\n\
                                        ' + action_tr + '\n\
                                            <td>' + value.name + '</td>\n\
                                            <td id="payment-amount_' + value.customer_plot_booking_payment_detail_id + '" class="emi_amount">' + value.amount + '</td>\n\
                                            <td>' + duedate + '</td>\n\
                                            <td>' + value.project_master_name + '</td>\n\
                                            <td>' + value.sub_project_master_name + '</td>\n\
                                            <td>' + value.plot_master_name + '</td>\n\
                                            <td>' + value.payment_status + ' &nbsp; ' + detail_link + '</td>\n\
                                        </tr>';
                });
                table_data += '</tbody>';
                if (status == 'Due') {
                    $("#due_payment_list").html(table_data);
                    generateDataTable('due_payment_list');
                }
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
            }
            else {
                if (status == 'Due') {
                    $("#due_payment_list").html(response.data);
                    generateDataTable('due_payment_list');
                }
                if (status == 'Pending') {
                    $("#pending_payment_list").html(response.data);
                    generateDataTable('pending_payment_list');
                }
                if (status == 'Approved') {
                    $("#approved_payment_list").html(response.data);
                    generateDataTable('approved_payment_list');
                }
                if (status == 'Rejected') {
                    $("#reject_payment_list").html(response.data);
                    generateDataTable('reject_payment_list');
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
function getAgentList() {
    //login user id
    var url = base_url + 'down-the-line-members';
    var agent_id = 0;
    $.ajax({
        url: url,
        type: 'post',
        dataType: 'json',
        async: false,
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
    amount_sum = 0;
    var x = false;
    $('.emi_payment').each(function () {
        if ($(this).is(":checked")) {
            var chk_val = $(this).val();
            x = true;
            var damnt = $('#payment-amount_' + chk_val).html();
            damnt = Number(damnt);
            amount_sum = (amount_sum + damnt);
        }
    });
    return x;
}