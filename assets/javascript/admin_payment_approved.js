$(function () {

    get_agent_list();
    getAgentPaymentList(0);

});

//function for get agent list
function get_agent_list() {
    showLoader();
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
                var customer_list = '';
                var i = 0;
                if(user_id == 1){
                    customer_list += '<option value="">Select</option>';
                }
                $.each(response.data, function (key, value) {
                    if (i == 0) {
                        agent_id = value.id;
                        i = 1;
                    }
                    customer_list += '<option value="' + value.id + '">' + value.display_name + '</option>';
                });
                // get_customer_list(agent_id);
                $("#agent-list").html(customer_list);
                hideLoader();
            }
            hideLoader();
        }
    });
}//end function agent list

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
        url: base_url + 'agent-payment-list',
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
                                        <th> Agent </th>\n\
                                        <th> Date Requested </th>\n\
                                        <th> Payment Mode </th>\n\
                                        <th> Payment Type </th>\n\
                                        ' + action_th + '\n\
                                        <th></th>\n\
                                    </tr>\n\
                                </thead>';
                table_data += '<tbody>';
                $.each(response.data, function (key, value) {
                    var action_tr = '';
                    if (status == 'Pending') {
                        action_tr = '<td> <i class="mdi mdi-check-circle" onclick="paymentApprove(' + value.id + ',' + agent_id + ');"></i> &nbsp;<i class="mdi mdi-close-circle" onclick="paymentReject(' + value.id + ',' + agent_id + ');"></i> </td>';
                    }
                    var dd = new Date(value.date_of_payment);
                    var date_of_payment = dd.getDate() + '-' + MonthArr[dd.getMonth()] + '-' + dd.getFullYear();
                    var payment_type = 'EMI';
                    if (value.coupon_type_id == '3') {
                        payment_type = 'Advance';
                    }
                    table_data += '<tr >\n\
                                        <td class="py-1"><i class="mdi mdi-ticket"></i></td>\n\
                                            <td>' + value.amount + '</td>\n\
                                            <td >' + value.associate_name + ' (' + value.username + ')</td>\n\
                                            <td>' + date_of_payment + '</td>\n\
                                            <td>' + value.payment_mode + '</td>\n\
                                            <td>' + payment_type + '</td>\n\
                                            ' + action_tr + '\n\
                                            <td><a target="_blank" class="btn btn-link p-0" href="payment-detail.php?pid=' + value.id + '&uid=' + agent_id + '">Details</a></td>\n\
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

function paymentApprove(pid, agent_id) {
    showSwal('warning-message-and-cancel');
    $('.payment_action').click(function () {
        var comment = $('#payment_comment').val();
        if (comment == '') {
            $('#payment_comment').focus();
            return false;
        }
        paymentAction(pid, agent_id, '1');
    });
}

function paymentReject(pid, agent_id) {
    showSwal('warning-message-and-cancel');
    $('.payment_action').click(function () {
        var comment = $('#payment_comment').val();
        if (comment == '') {
            $('#payment_comment').focus();
            return false;
        }
        paymentAction(pid, agent_id, '0');
    });
}
//function for approvedadmin pament
function paymentAction(pid, agent_id, status_emi) {
    showLoader();
    var url = base_url + 'agent-payment-detail';
    var emis = [];
    var comment = '';
    var status = '';
    $.ajax({
        url: url,
        type: 'post',
        dataType: 'json',
        data: {
            payment_master_id: pid,
            user_id: agent_id
        },
        success: function (response) {
            if (response.status == 'success') {
                $.each(response.data.detail, function (key, value) {

                    emis.push({
                        "plot_payment_id": value.plot_booking_payment_id,
                        "plot_payment_amount": value.emi_amount
                    });
                });
                var agent_id = $("#agent-list").val();
                comment = $('#payment_comment').val()
                status = status_emi;
                var params = {
                    created_by: user_id,
                    created_for: agent_id,
                    comments: comment,
                    emis: emis,
                    status: status,
                    payment_master_id: pid
                };
                $.ajax({
                    url: base_url + 'coupon/emi/generate',
                    type: 'post',
                    dataType: 'json',
                    data: params,
                    success: function (response) {
                        if (response.status == "success") {
                            getAgentPaymentList(agent_id);
                            if (status_emi == '1') {
                                showSwal('success', 'Payment Approved', 'Payment is approved.');
                            }
                            if (status_emi == '0') {
                                showSwal('success', 'Payment Rejected', 'Payment is rejected.');
                            }
                            hideLoader();
                        } else {
                            hideLoader();
                        }
                    }
                });
            } else {
                hideLoader();
            }
        }
    });
}