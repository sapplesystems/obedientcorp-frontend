get_agent_list();
getWalletAmount(user_id);
var EMI_Or_Money_Request = 0;

$(document).ready(function () {
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
            },
            errorPlacement: function errorPlacement(error, element) {
                element.before(error);
            }
        });
        if ($("#add-money-to-wallet-form").valid()) {
            var params = {
                user_id: $('#agents').val(),
                amount: $('#amount').val()
            };
            addMoneyToWallet(params);//ajax
        }//end if


    });//form submit
});//document ready

function approveRequest(payment_id, agent_id, amount) {
    var params = {
        payment_id: payment_id,
        user_id: agent_id,
        amount: amount
    };
    EMI_Or_Money_Request = 1;
    addMoneyToWallet(params);
}

function rejectRequest(payment_id, agent_id) {
    updateMoneyRequestStatus(payment_id, agent_id, 'Rejected');
}

function updateMoneyRequestStatus(payment_id, agent_id, status) {
    showLoader();
    $.ajax({
        url: base_url + 'update-request-money-status',
        type: 'post',
        data: {id: payment_id, status: status},
        success: function (response) {
            if (response.status == 'success') {
                showSwal('success', 'Payment ' + status, 'Payment ' + status + ' successfully.');
                getAgentPaymentList(agent_id);
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
        data: {
            user_id: params.user_id,
            amount: params.amount
        },
        success: function (response) {
            if (response.status == 'success') {
                var updated_amount = response.data.amount;
                updated_amount = Number(updated_amount);
                $('#e-wallet').html(updated_amount.toFixed(2));
                $('#amount').val('');
                if (EMI_Or_Money_Request == 1) {
                    EMI_Or_Money_Request = 0;
                    updateMoneyRequestStatus(params.payment_id, params.user_id, 'Approved');
                } else {
                    hideLoader();
                }
            } else {
                hideLoader();
            }
        }
    });
}

function get_agent_list() {
    showLoader();
    var url = base_url + 'down-the-line-members';

    $.ajax({
        url: url,
        type: 'post',
        dataType: 'json',
        data: {
            user_id: user_id
        },
        success: function (response) {
            if (response.status == 'success') {
                var table_data = '';
                $.each(response.data, function (key, value) {
                    table_data += '<option value="' + value.id + '">' + value.display_name + '</option>';
                });
                $("#agents").html(table_data);
                $('#agent-list').html(table_data);

                hideLoader();
            } else {
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
            console.log(response);
            if (response.status == 'success') {
                var action_th = '';
                if (status == 'Pending') {
                    action_th = '<th> Action </th>';
                }
                var table_data = '<thead>\n\
                                    <tr>\n\
                                        <th> Type </th>\n\
                                        <th> Amount </th>\n\
                                        <th> Agent </th>\n\
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
                        action_tr = '<td> <i class="mdi mdi-check-circle" onclick="approveRequest(' + value.id + ', ' + value.created_for + ',' + value.amount + ');"></i> &nbsp;<i class="mdi mdi-close-circle" onclick="rejectRequest(' + value.id + ', ' + value.created_for + ');"></i> </td>';
                    }
                    var dd = new Date(value.date_requested);
                    var date_of_payment = dd.getDate() + '-' + month[dd.getMonth()] + '-' + dd.getFullYear();
                    table_data += '<tr >\n\
                                        <td class="py-1"><i class="mdi mdi-ticket"></i></td>\n\
                                            <td>' + value.amount + '</td>\n\
                                            <td >' + value.display_name + '</td>\n\
                                            <td>' + date_of_payment + '</td>\n\
                                            <td>' + value.payment_mode + '</td>\n\
                                            <td>' + value.cheque_number + '</td>\n\
                                            ' + action_tr + '\n\
                                        </tr>';
                });
                table_data += '</tbody>';
                if (status == 'Pending') {
                    $("#pending_payment_list").html(table_data);
                    //$("#pending_payment_list").DataTable();
                }
                if (status == 'Approved') {
                    $("#approved_payment_list").html(table_data);
                    //$("#approved_payment_list").DataTable();
                }
                if (status == 'Rejected') {
                    $("#reject_payment_list").html(table_data);
                    //$("#reject_payment_list").DataTable();
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
}//end function get_agent_payment_list
