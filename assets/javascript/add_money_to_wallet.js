get_agent_list();
getWalletAmount(user_id);

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
            showLoader();
            var params = {
                user_id: $('#agents').val(),
                amount: $('#amount').val()
            };
            addMoneyToWallet(params);//ajax
        }//end if


    });//form submit
});//document ready



function addMoneyToWallet(params) {
    $.ajax({
        url: base_url + 'add-money-to-wallet',
        type: 'post',
        data: params,
        success: function (response) {
            console.log(response);
            if (response.status == 'success') {
                var updated_amount = response.data.amount;
                updated_amount = Number(updated_amount);
                $('#e-wallet').html(updated_amount.toFixed(2));
                $('#amount').val('');
                hideLoader();
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
                //console.log(table_data);
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
    console.log(status);
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
                                        ' + action_th + '\n\
                                        <th></th>\n\
                                    </tr>\n\
                                </thead>';
                $.each(response.data, function (key, value) {
                    var action_tr = '';
                    if (status == 'Pending') {
                        action_tr = '<td> <i class="mdi mdi-check-circle" onclick="approveRequest(' + value.created_for + ',' + value.amount + ');"></i> &nbsp;<i class="mdi mdi-close-circle" onclick="rejectRequest(' + value.created_for + ');"></i> </td>';
                    }
                    var dd = new Date(value.date_requested);
                    var date_of_payment = dd.getDate() + '-' + month[dd.getMonth()] + '-' + dd.getFullYear();
                    table_data += '<tbody>\n\
                                        <tr >\n\
                                        <td class="py-1"><i class="mdi mdi-ticket"></i></td>\n\
                                            <td>' + value.amount + '</td>\n\
                                            <td >' + value.display_name + '</td>\n\
                                            <td>' + date_of_payment + '</td>\n\
                                            <td>' + value.payment_mode + '</td>\n\
                                            ' + action_tr + '\n\
                                        </tr></tbody>';
                });
                if (status == 'Pending') {
                    $("#pending_payment_list").html(table_data);
                }
                if (status == 'Approved') {
                    $("#approved_payment_list").html(table_data);
                }
                if (status == 'Rejected') {
                    $("#reject_payment_list").html(table_data);
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