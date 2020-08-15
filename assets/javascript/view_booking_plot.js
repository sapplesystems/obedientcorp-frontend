get_plot_booking_listing();
get_agent_name();
$(document).ready(function () {
    if ($('#plot_booking_id').val() != '' && $('#plot_booking_id').val()) {
        viewPaymentDetails($('#plot_booking_id').val());
    }
})

function get_plot_booking_listing() {
    var customer_id = $('#customer_id').val();
    showLoader();
    $.ajax({
        url: base_url + 'customer/view-booking',
        type: 'post',
        data: {
            user_id: user_id,
            customer_id: customer_id
        },
        success: function (response) {
            var html = '';
            var registration_number = '';
            var reference = '';
            if (response.status == "success") {
                $.each(response.data, function (key, val) {
                    var emi_tenure = '';
                    registration_number = '';
                    reference = '';
                    if (val.registration_number) {
                        registration_number = val.registration_number;
                    }
                    if (val.reference) {
                        reference = val.reference;
                    }
                    if (val.total_installment == 12) {
                        emi_tenure = '1 Year';
                    } else if (val.total_installment == 24) {
                        emi_tenure = '2 Year';
                    } else if (val.total_installment == 36) {
                        emi_tenure = '3 Year';
                    } else if (val.total_installment == 60) {
                        emi_tenure = '5 Year';
                    } else if (val.total_installment == 84) {
                        emi_tenure = '7 Year';
                    } else if (val.total_installment == 120) {
                        emi_tenure = '10 Year';
                    } else {
                        emi_tenure = 'Single Payment';
                    }
                    html += '<tr id="tr_' + val.customer_plot_booking_detail_id + '">\n\
                                      <td>' + val.display_name + '</td>\n\
                                      <td>' + val.project_master_name + '</td>\n\
                                      <td>' + val.sub_project_master_name + '</td>\n\
                                      <td>' + val.plot_master_name + '</td>\n\
                                      <td>' + val.total_amount + '</td>\n\
                                      <td>' + val.received_booking_amount + '</td>\n\
                                      <td>' + val.date_of_payment + '</td>\n\
                                      <td>' + val.overdue + '</td>\n\
                                      <td>' + val.total_paid + '</td>\n\
                                      <td>' + val.balance_emi_amount + '</td>\n\
                                      <td>' + val.emi_amount + '</td>\n\
                                      <td>' + emi_tenure + '</td>\n\
                                      <td>\n\
                                            <a href="view-payment-details.php?booking_id=' + val.customer_plot_booking_detail_id + '" id="view_payment" title="View Payment Details"><i class="mdi mdi-view-list"></i></a> \n\
                                            <i title="Delete Customer" class="mdi mdi-delete text-danger" onclick="deleteCustomerBooking(event, ' + val.customer_plot_booking_detail_id + ');"></i>\n\
                                      </td>\n\
                                  </tr>';

                });
                $('#plot_booking_list').html(html);
                initDataTable();
                hideLoader();
            } else {
                $('#plot_booking_list').html(response.data);
                hideLoader();
            }

        }
    });

}

function deleteCustomerBooking(e, booking_id) {
    e.preventDefault();
    showSwal('delete-booking');
    $('.delete_booking').click(function () {
        deleteBooking(e, booking_id);
    });
}

function deleteBooking(e, booking_id) {
    e.preventDefault();
    showLoader();
    $.ajax({
        url: base_url + 'delete-customer-booking',
        type: 'post',
        data: {
            booking_id: booking_id,
        },
        success: function (response) {
            if (response.status == "success") {
                $("#tr_" + booking_id).remove();
            }
            hideLoader();
            showSwal(response.status, '', response.data);
        }
    });
}

function get_agent_name() {
    var agent_id = $('#agent_id').val();
    $.ajax({
        url: base_url + 'agent-name',
        type: 'post',
        data: {user_id: agent_id},
        success: function (response) {
            if (response.status == 'success') {
                $('#agent-name').html(response.data);
            }
        }


    });
}

//function for view payment details
function viewPaymentDetails(booking_id) {
    showLoader();
    $.ajax({
        url: base_url + 'customer/view-payment-detail',
        type: 'post',
        data: {
            plot_booking_id: booking_id
        },
        success: function (response) {
            console.log(response);
            var html = ' <thead>\n\
            <tr>\n\
                <th width="10%">Sr No.</th>\n\
                <th width="20%">Name</th>\n\
                <th width="10%">Amount</th>\n\
                <th width="10%">Payment Mode</th>\n\
                <th width="10%">Payment Number</th>\n\
                <th width="10%">Date Of Payment</th>\n\
                <th width="10%">Bank Name</th>\n\
                <th width="10%">Account Number</th>\n\
                <th width="10%">IFSC Code</th>\n\
                <th width="10%">Status</th>\n\
                <th width="10%">Photo</th>\n\
            </tr>\n\
        </thead><tbody>';
            if (response.status == "success") {
                var i = 1;
                $.each(response.data, function (key, val) {
                    var name = '';
                    var payment_number = '';
                    var amount = '';
                    var date_of_payment = '';
                    var bank_name = '';
                    var account_no = '';
                    var ifsc_code = '';
                    var photo = '';
                    var status = '';
                    var payment_mode = '';
                    if (val.account_holder_name != '' && val.account_holder_name != null && val.account_holder_name != "undefined")
                    {
                        name = val.account_holder_name;
                    }
                    if (val.payment_mode != '' && val.payment_mode != null && val.payment_mode != "undefined")
                    {
                        payment_mode = val.payment_mode;
                    }
                    if (val.amount != '' && val.amount != null && val.amount != "undefined")
                    {
                        amount = val.amount;
                    }
                    if (val.cheque_number != '' && val.cheque_number != null && val.cheque_number != "undefined")
                    {
                        payment_number = val.cheque_number;
                    }
                    if (val.date_of_payment != '' && val.date_of_payment != null && val.date_of_payment != "undefined")
                    {
                        date_of_payment = val.date_of_payment;
                    }
                    if (val.bank_name != '' && val.bank_name != null && val.bank_name != "undefined")
                    {
                        bank_name = val.bank_name;
                    }
                    if (val.account_number != '' && val.account_number != null && val.account_number != "undefined")
                    {
                        account_no = val.account_number;
                    }
                    if (val.ifsc_code != '' && val.ifsc_code != null && val.ifsc_code != "undefined")
                    {
                        ifsc_code = val.ifsc_code;
                    }
                    if (val.status != '' && val.status != null && val.status != "undefined")
                    {
                        status = val.status;
                    }
                    if (val.photo != '' && val.photo != null && val.photo != "undefined")
                    {
                        photo = '<div class="lightGallery lightgallery-without-thumb">\n\
                        <a href="' + media_url + 'payment_master/' + val.photo + '" class="image-tile" id="a_photo">\n\
                            <img src="' + media_url + 'payment_master/' + val.photo + '" class="upload_img" id="photo" />\n\
                        </a>\n\
                    </div>';
                    }
                    html += '<tr>\n\
                                    <td>' + i + '</td>\n\
                                      <td>' + name + '</td>\n\
                                      <td>' + amount + '</td>\n\
                                      <td>' + payment_mode + '</td>\n\
                                      <td>' + payment_number + '</td>\n\
                                      <td>' + date_of_payment + '</td>\n\
                                      <td>' + bank_name + '</td>\n\
                                      <td>' + account_no + '</td>\n\
                                      <td>' + ifsc_code + '</td>\n\
                                      <td>' + status + '</td>\n\
                                      <td>' + photo + '</td>\n\
                                      </td>\n\
                                  </tr>';
                    i++;

                });
                html += '</tbody>';
                $('.view_payment_detail').html(html);
                initDataTable();
                hideLoader();
                initializedLightGallery();
            } else {
                $('.view_payment_detail').html(html);
                initDataTable();
                hideLoader();
            }

        }
    });



}