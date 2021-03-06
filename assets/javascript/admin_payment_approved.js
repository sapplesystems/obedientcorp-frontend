$(function () {

    $("#agent-list").html(down_the_line_members);
    if (payment_detail_screen == 0) { //this variable is declared in footer and beingh set from payment-detail.php
        getAgentPaymentList(0);
    }
    $(document).on('click', '#pills-pending-tab', function (e) {
        e.preventDefault();
        getAgentPaymentList($("#agent-list").val());
    });

});

//function get_agent_payment_list 

function getAgentPaymentList(agent_id) {
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
                setPendingListTab(response.data.pending, agent_id);
                setApprovedListTab(response.data.approved, agent_id);
                setRejectedListTab(response.data.rejected), agent_id;
                hideLoader();
            } else {
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
} //end function get_agent_payment_list

function paymentApprove(pid, agent_id) {
    showSwal('warning-message-and-cancel');
    $('.payment_action').click(function () {
        var comment = $('#payment_comment').val();
        if (comment == '') {
            $('#payment_comment').focus();
            return false;
        }
        paymentAction(pid, agent_id, '1', '');
    });
}

function paymentReject(pid, agent_id, payment_type) {
    if (payment_type == 'Advance') {
        showSwal('reject-warning-message-and-cancel');
    } else {
        showSwal('warning-message-and-cancel');
    }
    $('.payment_action').click(function () {
        var comment = $('#payment_comment').val();
        if (comment == '') {
            $('#payment_comment').focus();
            return false;
        }
        paymentAction(pid, agent_id, '0', '');
    });
    $('.payment_action2').click(function () {
        var comment = $('#payment_comment').val();
        if (comment == '') {
            $('#payment_comment').focus();
            return false;
        }
        paymentAction(pid, agent_id, '0', 'Free');
    });
}
//function for approvedadmin pament
function paymentAction(pid, agent_id, status_emi, is_free) {
    showLoader();
    var params = {
        created_by: user_id,
        created_for: agent_id,
        comments: $('#payment_comment').val(),
        status: status_emi,
        payment_master_id: pid,
        is_plot_free: is_free
    };

    $.ajax({
        url: base_url + 'coupon/emi/generate',
        type: 'post',
        data: params,
        success: function (response) {
            if (response.status == "success") {
                getAgentPaymentList($("#agent-list").val());
                if (status_emi == '1') {
                    showSwal('success', 'Payment Approved', 'Payment is approved.');
                }
                if (status_emi == '0') {
                    showSwal('success', 'Payment Rejected', 'Payment is rejected.');
                }
                if (payment_detail_screen == 1) {
                    get_payment_details(); // function declaired in admin_payment_detail.js which is included into payment-detail.php
                }
                hideLoader();
            } else {
                showSwal('error', response.data);
                hideLoader();
            }
        }
    });
}

function setPendingListTab(response, agent_id) {
    console.log(response);
    var table_data = '<thead>\n\
                            <tr>\n\
                                <th> Type </th>\n\
                                <th> Amount </th>\n\
                                <th> Associate  </th>\n\
                                <th> Date of Request </th>\n\
                                <th> Date of Payment </th>\n\
                                <th> Payment Mode </th>\n\
                                <th> Payment Type </th>\n\
                                <th> Action </th>\n\
                                <th></th>\n\
                            </tr>\n\
                        </thead>';
    table_data += '<tbody>';
    $.each(response, function (key, value) {
        var payment_type = 'EMI';
        if (value.coupon_type_id == '3') {
            payment_type = 'Advance';
        }
        table_data += '<tr>\n\
                            <td class="py-1"><i class="mdi mdi-ticket"></i></td>\n\
                            <td>' + value.amount + '</td>\n\
                            <td >' + value.associate_name + ' (' + value.username + ')</td>\n\
                            <td>' + value.date_of_request + '</td>\n\
                            <td>' + value.date_of_payment + '</td>\n\
                            <td>' + value.payment_mode + '</td>\n\
                            <td>' + payment_type + '</td>\n\
                            <td> <i class="mdi mdi-check-circle" onclick="paymentApprove(' + value.id + ',' + value.user_id + ');"></i> &nbsp;<i class="mdi mdi-close-circle" onclick="paymentReject(' + value.id + ',' + value.user_id + ', \'' + payment_type + '\');"></i> </td>\n\
                            <td><a class="btn btn-link p-0" href="payment-detail.php?pid=' + value.id + '&uid=' + value.user_id + '&flag=rs">Details</a></td>\n\
                        </tr>';
    });
    table_data += '</tbody>';
    $("#pending_payment_list").html(table_data);
    generateDataTable('pending_payment_list');
}

function setApprovedListTab(response, agent_id) {
    var table_data = '<thead>\n\
                            <tr>\n\
                                <th> Type </th>\n\
                                <th> Amount </th>\n\
                                <th> Associate  </th>\n\
                                <th> Date of Request </th>\n\
                                <th> Date of Payment </th>\n\
                                <th> Payment Mode </th>\n\
                                <th> Payment Type </th>\n\
                                <th></th>\n\
                            </tr>\n\
                        </thead>';
    table_data += '<tbody>';
    $.each(response, function (key, value) {
        var payment_type = 'EMI';
        if (value.coupon_type_id == '3') {
            payment_type = 'Advance';
        }
        table_data += '<tr>\n\
                            <td class="py-1"><i class="mdi mdi-ticket"></i></td>\n\
                            <td>' + value.amount + '</td>\n\
                            <td >' + value.associate_name + ' (' + value.username + ')</td>\n\
                            <td>' + value.date_of_request + '</td>\n\
                            <td>' + value.date_of_payment + '</td>\n\
                            <td>' + value.payment_mode + '</td>\n\
                            <td>' + payment_type + '</td>\n\
                            <td><a class="btn btn-link p-0" href="payment-detail.php?pid=' + value.id + '&uid=' + value.user_id + '">Details</a></td>\n\
                        </tr>';
    });
    table_data += '</tbody>';
    $("#approved_payment_list").html(table_data);
    generateDataTable('approved_payment_list');
}

function setRejectedListTab(response, agent_id) {
    var table_data = '<thead>\n\
                        <tr>\n\
                            <th> Type </th>\n\
                            <th> Amount </th>\n\
                            <th> Associate  </th>\n\
                            <th> Date of Request </th>\n\
                            <th> Date of Payment </th>\n\
                            <th> Payment Mode </th>\n\
                            <th> Payment Type </th>\n\
                            <th></th>\n\
                        </tr>\n\
                        </thead>';
    table_data += '<tbody>';
    $.each(response, function (key, value) {
        var payment_type = 'EMI';
        if (value.coupon_type_id == '3') {
            payment_type = 'Advance';
        }
        table_data += '<tr>\n\
                            <td class="py-1"><i class="mdi mdi-ticket"></i></td>\n\
                            <td>' + value.amount + '</td>\n\
                            <td >' + value.associate_name + ' (' + value.username + ')</td>\n\
                            <td>' + value.date_of_request + '</td>\n\
                            <td>' + value.date_of_payment + '</td>\n\
                            <td>' + value.payment_mode + '</td>\n\
                            <td>' + payment_type + '</td>\n\
                            <td><a class="btn btn-link p-0" href="payment-detail.php?pid=' + value.id + '&uid=' + value.user_id + '">Details</a></td>\n\
                        </tr>';
    });
    table_data += '</tbody>';
    $("#reject_payment_list").html(table_data);
    generateDataTable('reject_payment_list');
}