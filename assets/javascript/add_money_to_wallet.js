getWalletAmount(user_id);
var EMI_Or_Money_Request = 0;
var FMCG_REQUEST = {};
getAgentPaymentList(0);

$(document).ready(function () {
    $("#agents").html(down_the_line_members);
    $('#agent-list').html(down_the_line_members);

    $(document).on('click', '#pills-pending-tab', function (e) {
        e.preventDefault();
        getAgentPaymentList($("#agent-list").val());
    });

    $("#agents").change(function () {
        var user_id = $(this).val();
        getWalletAmount(user_id);
    });

    $("#add-money-to-wallet-form").submit(function (e) {
        e.preventDefault();
        var add_money_to_wallet_form = $("#add-money-to-wallet-form");
        add_money_to_wallet_form.validate({
            rules: {
                agents: "required",
                amount: {
                    required: true,
                    number: true
                },
                transaction_password: "required",
            },
            errorPlacement: function errorPlacement(error, element) {
                element.before(error);
            }
        });
        if ($("#add-money-to-wallet-form").valid()) {
            var params = {
                inserted_by: user_id,
                user_id: $('#agents').val(),
                amount: $('#amount').val(),
                transaction_password: $('#transaction_password').val(),
            };
            addMoneyToWallet(params);//ajax
        }//end if


    });//form submit

    $(document).on('click', '.transaction_password_ok', function (e) {
        e.preventDefault();
        var transaction_password = document.getElementById('transaction_password');
        if (transaction_password.value == '') {
            transaction_password.focus();
            return false;
        } else {
            $.ajax({
                url: base_url + 'validate-transaction-password',
                type: 'post',
                data: {
                    inserted_by: user_id,
                    transaction_password: transaction_password.value,
                },
                success: function (response) {
                    if (response.status == 'success') {
                        FMCG_REQUEST.transaction_password = transaction_password.value;
                        FMCG_REQUEST.inserted_by = user_id;
                        showSwal('warning-message-and-cancel');
                        return false;
                    } else {
                        showSwal('error', 'Failed', response.data);
                        hideLoader();
                    }

                }
            });
        }
    });

    $(document).on('click', '.payment_action', function () {
        var comment = $('#payment_comment').val();
        if (comment == '') {
            $('#payment_comment').focus();
            return false;
        }
        FMCG_REQUEST.comment = comment;
        processMoneyRequest();
    });
});//document ready

function processMoneyRequest() {
    if (EMI_Or_Money_Request && EMI_Or_Money_Request == 1) {
        addMoneyToWallet(FMCG_REQUEST);
    } else {
        updateMoneyRequestStatus(FMCG_REQUEST.payment_id, FMCG_REQUEST.agent_id, 'Rejected', FMCG_REQUEST.comment);
    }
    hideLoader();
}

function approveRequest(payment_id, agent_id) {
    var params = {
        payment_id: payment_id,
        user_id: agent_id,
    };
    EMI_Or_Money_Request = 1;
    FMCG_REQUEST = params;
    askForTransaction();
    //addMoneyToWallet(params);
}

function rejectRequest(payment_id, agent_id) {
    FMCG_REQUEST = {
        payment_id: payment_id,
        agent_id: agent_id,
    };
    EMI_Or_Money_Request = 0;
    askForTransaction();
    //updateMoneyRequestStatus(payment_id, agent_id, 'Rejected');
}

function updateMoneyRequestStatus(payment_id, agent_id, status, admin_comment) {
    showLoader();
    $.ajax({
        url: base_url + 'update-request-money-status',
        type: 'post',
        data: {id: payment_id, status: status, comment: admin_comment},
        success: function (response) {
            if (response.status == 'success') {
                showSwal('success', 'Payment ' + status, 'Payment ' + status + ' successfully.');
                getAgentPaymentList(0);//agent_id
                hideLoader();
            } else {
                showSwal('error', 'Failed', 'Something went wrong');
                hideLoader();
            }
        }
    });
}

function addMoneyToWallet(params) {
    showLoader();
    $.ajax({
        url: base_url + 'add-money-to-wallet',
        type: 'post',
        data: params,
        success: function (response) {
            if (response.status == 'success') {
                var updated_amount = response.data.amount;
                updated_amount = Number(updated_amount);
                $('#e-wallet').html(updated_amount.toFixed(2));
                $('#amount').val('');
                $('#transaction_password').val('');
                if (EMI_Or_Money_Request == 1) {
                    EMI_Or_Money_Request = 0;
                    updateMoneyRequestStatus(params.payment_id, params.user_id, 'Approved', params.comment);
                }
                hideLoader();
                showSwal('success', 'Success', 'Money has been added successfully.');
            } else {
                showSwal('error', 'Failed', response.data);
                hideLoader();
            }
        }
    });
}

function getWalletAmount(user_id) {
    showLoader();
    var amount = '';
    $.ajax({
        url: base_url + 'check-ewallet-amount',
        type: 'post',
        dataType: 'json',
        data: {
            user_id: user_id
        },
        success: function (response) {
            amount = response.data.amount;
            if (response.status) {
                $('#e-wallet').html(amount);
                hideLoader();
            }

        }
    });
}

//function get_agent_payment_list 
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
                var action_th = '';
                if (status == 'Pending') {
                    action_th = '<th> Action </th>';
                }
                var table_data = '<thead>\n\
                                    <tr>\n\
                                        <th> Type </th>\n\
                                        <th> Amount </th>\n\
                                        <th> Associate </th>\n\
                                        <th> Date Requested </th>\n\
                                        <th> Payment Mode </th>\n\
                                        <th> Payment Number </th>\n\
                                        ' + action_th + '\n\
                                        <th></th>\n\
                                    </tr>\n\
                                </thead>';
                table_data += '<tbody>';
                $.each(response.data, function (key, value) {
                    var action_tr = '';
                    if (status == 'Pending') {
                        action_tr = '<td> <i class="mdi mdi-check-circle" onclick="approveRequest(' + value.id + ', ' + value.created_for + ');"></i> &nbsp;<i class="mdi mdi-close-circle" onclick="rejectRequest(' + value.id + ', ' + value.created_for + ');"></i> </td>';
                    }
                    var dd = new Date(value.date_requested);
                    var date_of_payment = dd.getDate() + '-' + MonthArr[dd.getMonth()] + '-' + dd.getFullYear();
                    table_data += '<tr >\n\
                                        <td class="py-1"><i class="mdi mdi-ticket"></i></td>\n\
                                            <td>' + value.amount + '</td>\n\
                                            <td >' + value.display_name + '</td>\n\
                                            <td>' + date_of_payment + '</td>\n\
                                            <td>' + value.payment_mode + '</td>\n\
                                            <td>' + value.cheque_number + '</td>\n\
                                            ' + action_tr + '\n\
                                            <td><a target="_blank" class="btn btn-link p-0" href="payment-detail.php?pid=' + value.id + '&uid=' + value.created_for + '">Details</a></td>\n\
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
                hideLoader();
            }

        }
    });
}//end function get_agent_payment_list

function askForTransaction() {
    showSwal('transaction_password');
    document.getElementById('transaction_password').value = '';
    //$('#pending_payment_list').DataTable().search( '' ).columns().search( '' ).draw();
    return false;
}