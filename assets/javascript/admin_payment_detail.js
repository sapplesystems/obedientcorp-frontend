$(function () {

    get_payment_details();

});

function get_payment_details() {
    //login user id
    showLoader();
    var url = base_url + 'agent-payment-detail';
    var payment_photo = '';
    var payment_mode = '';
    var cheque_number = '';
    var bank_name = '';
    var status = '';
    var date_of_payment = '';
    var comment = '';
    var admin_comment = '';
    $.ajax({
        url: url,
        type: 'post',
        dataType: 'json',
        data: {
            payment_master_id: payment_master_id,
            user_id: agent_id
        },
        success: function (response) {
            console.log(response);
            if (response.status == 'success') {
                if (response.data.payment.status != 'Pending') {
                    $('#action_div').html('');
                } else {
                    $('#action_div').css('display', '');
                }
                if (response.data.detail) {
                    var emi_list = '<thead>\n\
                    <tr>\n\
                    <th> Customer </th>\n\
                    <th> Paid Amount </th>\n\
                    <th> Received Date </th>\n\
                    <th>Project</th>\n\
                    <th>Sub Project</th>\n\
                    <th>Plot ID</th>\n\
                    </tr>\n\
                    </thead>';
                    emi_list += '<tbody>';
                    $.each(response.data.detail, function (key, value) {
                        var sub_project_name = value.sub_project_name;
                        if (value.sub_project_name == undefined) {
                            sub_project_name = '';
                        }
                        emi_list += '<tr>\n\
                        <td>' + value.customer_display_name + '</td>\n\
                        <td> ' + value.paid_amount + ' </td>\n\
                        <td>' + value.received_date + ' </td>\n\
                        <td>' + value.project_name + ' </td>\n\
                        <td>' + sub_project_name + '</td>\n\
                        <td>' + value.plot_name + '</td>\n\
                    </tr>';
                    });
                    emi_list += '</tbody>';
                    // get_customer_list(agent_id);
                    $("#admin-payment-detail").html(emi_list);
                    initDataTable();

                }

                if (response.data.payment.payment_mode) {
                    payment_mode = response.data.payment.payment_mode;
                    if (payment_mode == 'Cash') {
                        $(".bank-name").css('display', 'none');
                        $('.cheque-number').html('Invoice Number:');
                    }
                    else if (payment_mode == 'Cheque') {
                        $(".bank-name").css('display', 'block');
                        $('.cheque-number').html('Cheque Number:');
                    }
                    else if (payment_mode == 'Online') {
                        //$(".bank-name").css('display','block');
                        $('.cheque-number').html('Online Transaction Number:');
                    }

                }
                if (response.data.payment.cheque_number) {
                    cheque_number = response.data.payment.cheque_number;

                }
                if (response.data.payment.bank_name) {
                    bank_name = response.data.payment.bank_name;

                }
                if (response.data.payment.status) {
                    status = response.data.payment.status;

                }
                if (response.data.payment.date_of_payment) {
                    date_of_payment = response.data.payment.date_of_payment;

                }
                if (response.data.payment.photo != null && response.data.payment.photo != '') {
                    payment_photo = media_url + 'payment_master/' + response.data.payment.photo;
                    $("#photo").attr('src', payment_photo);
                    $("#photo").css('display', '');
                    $("#a_photo").attr('href', payment_photo);
                }

                if (response.data.payment.comment) {
                    comment = response.data.payment.comment;
                }
                if (response.data.payment.admin_comment) {
                    admin_comment = '<label class="col-form-label col-sm-4 text-right">Admin Comment:</label>\n\
                    <div class="col-sm-8">\n\
                        <label class="col-form-label card-description mb-0" id="admincomment">' + response.data.payment.admin_comment + '</label>\n\
                    </div>';

                    //admin_comment = response.data.payment.admin_comment;
                }
                $("#payment_mode").html(payment_mode);
                $("#cheque_number").html(cheque_number);
                $("#bank_name").html(bank_name);
                if(status == 'Pending')
                {
                    $('#status').addClass('text-warning');
                }else if(status == 'Approved')
                {
                    $('#status').addClass('text-success');
                }else if(status == 'Rejected')
                {
                    $('#status').addClass('text-danger');
                }
                $("#status").html(status);
                $("#date_of_payment").html(date_of_payment);
                $("#comment").html(comment);
                $("#admincomment").html(admin_comment);
                hideLoader();
            }
            else {
                $("#admin-payment-detail").html(response.data);
                hideLoader();
            }

        }
    });
}//end function agent list