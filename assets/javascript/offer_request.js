$(function () {

    $("#agent-list").html(down_the_line_members);
    getOfferRequestList(0);
    
    $(document).on('click', '#pills-pending-tab', function (e) {
        e.preventDefault();
        getOfferRequestList($("#agent-list").val());
    });

});

//function get_offer_request_list 
function getOfferRequestList(agent_id) {
    get_offer_request_list(agent_id, 'Pending');
    get_offer_request_list(agent_id, 'Approved');
    get_offer_request_list(agent_id, 'Rejected');
}

function get_offer_request_list(agent_id, status) {
    showLoader();
    var params = {
        user_id: agent_id,
        status: status
    };

    $("#customer_payment").html('');
    $.ajax({
        url: base_url + 'offer-list',
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
                                        <th> &nbsp; </th>\n\
                                        <th> Offer Amount </th>\n\
                                        <th> Associate </th>\n\
                                        <th> Business Amount </th>\n\
                                        <th> Date </th>\n\
                                        ' + action_th + '\n\
                                    </tr>\n\
                                </thead>';
                table_data += '<tbody>';
                $.each(response.data, function (key, value) {
                    var action_tr = '';
                    if (status == 'Pending') {
                        action_tr = '<td> \n\
                                        <i title="Approve Request" class="mdi mdi-check-circle" onclick="offerApprove(' + value.id + ');"></i> \n\
                                        &nbsp;<i title="Reject Request" class="mdi mdi-close-circle" onclick="offerReject(' + value.id + ');"></i> \n\
                                    </td>';
                    }
                    table_data += '<tr >\n\
                                        <td class="py-1"><i class="mdi mdi-ticket"></i></td>\n\
                                            <td>' + value.offer_amount + '</td>\n\
                                            <td >' + value.agent_display_name + ' </td>\n\
                                            <td>' + value.offer_business + '</td>\n\
                                            <td>' + value.date + '</td>\n\
                                            ' + action_tr + '\n\
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
}//end function get_offer_request_list

function offerApprove(offer_id) {
    showSwal('warning-message-and-cancel');
    $('.payment_action').click(function () {
        var comment = $('#payment_comment').val();
        var status = "Approved";
        if (comment == '') {
            $('#payment_comment').focus();
            return false;
        }
        offerAction(offer_id,comment,status);
    });
}

function offerReject(offer_id) {
    showSwal('warning-message-and-cancel');
    $('.payment_action').click(function () {
        var comment = $('#payment_comment').val();
        var status = "Rejected";
        if (comment == '') {
            $('#payment_comment').focus();
            return false;
        }
        offerAction(offer_id,comment,status);
    });
}
//function for offer request action
function offerAction(offer_id, comment, status) {
    showLoader();
    var url = base_url + 'offer-list-action';
    $.ajax({
        url: url,
        type: 'post',
        dataType: 'json',
        data: {
            id: offer_id,
            status: status,
            comment:comment
        },
        success: function (response) {
            var agent_id = 0;
            if (response.status == 'success') {
                if($("#agent-list").val())
                {
                    agent_id = $("#agent-list").val();
                }
                getOfferRequestList(agent_id);
                showSwal('success', 'Status', response.data);
              
            } else {
                hideLoader();
            }
            hideLoader();
        }
    });
}