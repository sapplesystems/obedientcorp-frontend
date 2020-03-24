$(function () {

    get_payment_details();

});

function get_payment_details() {
    //login user id
    showLoader();
    var url = base_url + 'agent-payment-detail ';
    var payment_photo = '';
    var payment_mode = '';
    var cheque_number = '';
    var bank_name = '';
    var status = '';
    var date_of_payment = '';
    var comment = '';
    $.ajax({
        url: url,
        type: 'post',
        dataType: 'json',
        data: {
            payment_master_id: payment_master_id,
            user_id: agent_id
        },
        success: function (response) {
            if (response.status == 'success') {
                var emi_list = '<thead>\n\
                                <tr>\n\
                                <th> Customer </th>\n\
                                <th> Amount </th>\n\
                                <th> EMI Due Date </th>\n\
                                <th>Project</th>\n\
                                <th>Sub Project</th>\n\
                                <th>Plot ID</th>\n\
                                </tr>\n\
                                </thead>';
                emi_list += '<tbody>';
                $.each(response.data.detail, function (key, value) {
                    console.log(value);
                    var dd = new Date(value.emi_due_date);
                    var emi_date = dd.getDate() + '-' + month[dd.getMonth()] + '-' + dd.getFullYear();
                    var sub_project_name = value.sub_project_name;
                    if(value.sub_project_name == undefined){
                        sub_project_name = '';
                    }
                    emi_list += '<tr>\n\
                                    <td>' + value.customer_display_name + '</td>\n\
                                    <td> ' + value.emi_amount + ' </td>\n\
                                    <td>' + emi_date + ' </td>\n\
                                    <td>' + value.project_name + ' </td>\n\
                                    <td>' + sub_project_name + '</td>\n\
                                    <td>' + value.plot_name + '</td>\n\
                                </tr>';
                });
                emi_list += '</tbody>';
                // get_customer_list(agent_id);
                $("#admin-payment-detail").html(emi_list);
                initDataTable();
                if (response.data.payment.payment_mode)
                {
                    payment_mode = response.data.payment.payment_mode;
                    if (payment_mode == 'Cash')
                    {
                        $(".bank-name").css('display', 'none');
                        $('.cheque-number').html('Invoice Number:');
                    }
                    else if (payment_mode == 'Cheque')
                    {
                        $(".bank-name").css('display', 'block');
                        $('.cheque-number').html('Cheque Number:');
                    }
                    else if (payment_mode == 'Online')
                    {
                        //$(".bank-name").css('display','block');
                        $('.cheque-number').html('Online Transaction Number:');
                    }

                }
                if (response.data.payment.cheque_number)
                {
                    cheque_number = response.data.payment.cheque_number;

                }
                if (response.data.payment.bank_name)
                {
                    bank_name = response.data.payment.bank_name;

                }
                if (response.data.payment.status)
                {
                    status = response.data.payment.status;

                }
                if (response.data.payment.date_of_payment)
                {
                    date_of_payment = response.data.payment.date_of_payment;

                }
                if (response.data.payment.photo)
                {
                    payment_photo = media_url + 'payment_master/' + response.data.payment.photo;
                }
                if (response.data.payment.comment)
                {
                    comment = response.data.payment.comment;
                }
                $("#payment_mode").html(payment_mode);
                $("#cheque_number").html(cheque_number);
                $("#bank_name").html(bank_name);
                $("#status").html(status);
                $("#date_of_payment").html(date_of_payment);
                $("#photo").attr('src', payment_photo);
                $("#comment").html(comment);
                hideLoader();
            }
            else
            {
                $("#admin-payment-detail").html(response.data);
                hideLoader();
            }

        }
    });
}//end function agent list