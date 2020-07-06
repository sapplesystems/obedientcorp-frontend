var amount = '';
var type = '';
var amount_sum = 0;

$(function () {
    $("#agent-list").html(down_the_line_members);
    
    get_customer_list($("#agent-list").val());
    getCustoerPaymentDetails(0);
    
    $(document).on('click', '#make_request', function () {
        var cus_id= $('#customer-list').val();
        if(cus_id == ''){
            document.getElementById('payment-form').reset();
            $('#makeRequest').modal('hide');
            showSwal('error', 'No Customer Selected', 'Select customer from the list');
            return false;
        }else if ((checkChecked() == false)) {
            document.getElementById('payment-form').reset();
            $('#makeRequest').modal('hide');
            showSwal('error', 'Select Checkbox', 'No EMI selected');
            return false;
        }
        $('#makeRequest').modal();
        $('#amount').val(amount_sum.toFixed(2));
        $('#amount').attr('readOnly', true);
    });

    $(document).on('click', '#pills-pending-tab,#pills-approve-tab,#pills-reject-tab', function () {
        $('#make_request').css('display', 'none');
    })

    $(document).on('click', '#pills-due-tab', function () {
        $('#make_request').css('display', '');
    });
    $('#upload-image').change(function () {
        $(this).valid();  // triggers the validation test        
    });

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
            var due_list_ids = [];
            var due_list_payments = [];
            var booking_ids = [];
            var customer_ids = [];
            $('.emi_payment:checked').each(function () {
                var dlid = $(this).val(); // due list id (auto id of due list table)
                var pa = $('#payment_amount_' + dlid).val();
                var bk = $('#booking_id_' + dlid).val(); // auto id of customer plot booking detail table
                var cusid = $('#customer_id_' + dlid).val(); // customer id of customer plot booking detail table
                due_list_ids.push(dlid);
                due_list_payments.push(pa);
                booking_ids.push(bk);
                customer_ids.push(cusid);
            });
            due_list_ids = due_list_ids.join();
            due_list_payments = due_list_payments.join();
            booking_ids = booking_ids.join();
            customer_ids = customer_ids.join();
            if (due_list_ids == '' || !due_list_ids) {
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
            params.append('created_by', user_id);
            params.append('created_for', created_for);
            params.append('amount', amount);
            params.append('due_list_ids', due_list_ids);
            params.append('due_list_payments', due_list_payments);
            params.append('booking_ids', booking_ids);
            params.append('customer_ids', customer_ids);
            params.append('date_of_payment', $('#date_of_payment').val());

            $.ajax({
                url: url,
                type: 'post',
                data: params,
                contentType: false,
                processData: false,
                success: function (response) {
                    console.log(response);
                    if (response.status == 'success') {
                        getCustoerPaymentDetails($('#customer-list').val());
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
            }); //ajax
        } //end if
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

        } else if ($(this).val() == 'Online') {

            var payment_number = '<label class="col-form-label col-sm-4 text-right payment-number-div">Online Transaction Number:</label>\n\
                   <div class="col-sm-8">\n\
                     <input type="text" class="form-control required" id="payment_number" name="payment_number" placeholder="Enter transaction number.">\n\
                                                            </div>';
            $('.payment-number-div').html(payment_number);
            $('.bank-name').css('display', 'block');

        } else if ($(this).val() == 'Cheque') {
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
    getCustoerPaymentDetails(customer_id);

}

function getCustoerPaymentDetails(customer_id) {
    var params = {
        user_id: $('#agent-list').val(),
        customer_id: customer_id,
    };
    $("#customer_payment").html('');
    $.ajax({
        url: base_url + 'customer-payment-list',
        type: 'post',
        data: params,
        success: function (response) {
            setDueListTab(response.data.due_list);
            setPendingListTab(response.data.pending_list);
            setApprovedListTab(response.data.approved_list);
            setRejectedListTab(response.data.rejected_list);

        }
    });
} //end function get-payment-details

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
            console.log(response);
            if (response.status == 'success') {
                var customer_list = '<option value="">--select--</option>';
                if (response.data.length > 0) {
                    $.each(response.data, function (key, value) {
                        customer_list += '<option value="' + value.id + '">' + value.display_name + '</option>';
                    });
                    $("#customer-list").html(customer_list);
                }
                else {
                    $("#customer-list").html(customer_list);
                    $("#due_payment_list ,#pending_payment_list,#reject_payment_list,#approved_payment_lis ").html('');
                    generateDataTable('due_payment_list');
                    generateDataTable('pending_payment_list');
                    generateDataTable('reject_payment_list');
                    generateDataTable('approved_payment_list');
                }


            }

        }
    });
} //end function customer list

function checkChecked() {
    amount_sum = 0;
    var x = false;
    $('.emi_payment').each(function () {
        if ($(this).is(":checked")) {
            var chk_val = $(this).val();
            x = true;
            var damnt = $('#payment_amount_' + chk_val).val();
            damnt = Number(damnt);
            amount_sum = (amount_sum + damnt);
        }
    });
    return x;
}

//setduelist tab function
function setDueListTab(response) {
    var action_th = '<th></th>';
    var table_data = '<thead>\n\
                            <tr>\n\
                                ' + action_th + '\n\
                                <th> Customer </th>\n\
                                <th> Amount </th>\n\
                                <th>Due Date </th>\n\
                                <th>Project</th>\n\\n\
                                <th>Sub Project</th>\n\
                                <th>Plot ID</th>\n\
                                <th>Over Due</th>\n\
                                <th>Total Paid</th>\n\
                                <th>Balance</th>\n\
                            </tr>\n\
                        </thead>';
    var checkbox = '';
    table_data += '<tbody>';
    if (response && response.length) {
        $.each(response, function (key, value) {
            var dlid = value.due_list_ids;
            checkbox = '';
            var action_tr = '';
            checkbox = '<div class="form-check m-0">\n\
            <label class="form-check-label"><input type="checkbox" class="form-check-input emi_payment" value="' + value.due_list_id + '">\n\
            <i class="input-helper"></i></label></div>';
            action_tr = '<td>' + checkbox + '</td>';
            table_data += '<tr >\n\
            ' + action_tr + '\n\
                <td>' + value.customer_display_name + '</td>\n\
                <td>\n\
                    <input type="text" id="payment_amount_' + value.due_list_id + '" class="emi_amount" value="' + value.emi_amount + '" placeholder="' + value.emi_amount + '" />\n\
                </td>\n\
                <td>' + value.due_date + '</td>\n\
                <td>' + value.project_master_name + '</td>\n\
                <td>' + value.sub_project_master_name + '</td>\n\
                <td>' + value.plot_master_name + '</td>\n\
                <td>' + value.overdue + '</td>\n\
                <td>\n\
                ' + value.total_paid + '\n\
                <input type="hidden" id="booking_id_' + value.due_list_id + '" value="' + value.customer_plot_booking_detail_id + '" />\n\
                <input type="hidden" id="customer_id_' + value.due_list_id + '" value="' + value.customer_id + '" />\n\
                </td>\n\
                <td>' + value.balance_emi_amount + '</td>\n\
            </tr>';

        });
        table_data += '</tbody>';
    }

    $("#due_payment_list").html(table_data);
    generateDataTable('due_payment_list');

} //end set of duelisttab function 

//setpandinglist tab function
function setPendingListTab(response) {
    var table_data = '<thead>\n\
    <tr>\n\
        <th> Customer </th>\n\
        <th> Amount </th>\n\
        <th>Date Of Payment </th>\n\
        <th>Payment Type</th>\n\
        <th>Payment Mode</th>\n\
    </tr>\n\
</thead>';

    table_data += '<tbody>';
    if (response && response.length) {
        $.each(response, function (key, value) {
            var payment_type = 'EMI';
            var detail_link = '<a  href="payment-detail.php?pid=' + value.id + '&uid=' + $('#agent-list').val() + '">Detail</a>';
            if (value.coupon_type_id == 3) {
                payment_type = 'Advance';
            }
            table_data += '<tr >\n\
                <td>' + value.customer_display_name + '</td>\n\
                <td>' + value.amount + '</td>\n\
                <td>' + value.date_of_payment + '</td>\n\
                <td>' + payment_type + '</td>\n\
                <td>' + value.payment_mode + ' &nbsp; ' + detail_link + '</td>\n\
            </tr>';
        });
        table_data += '</tbody>';
    }

    $("#pending_payment_list").html(table_data);
    generateDataTable('pending_payment_list');

} //end set of pendinglisttab function 

//Set Rejactedlist tab function
function setRejectedListTab(response) {
    var table_data = '<thead>\n\
    <tr>\n\
        <th> Customer </th>\n\
        <th> Amount </th>\n\
        <th>Date Of Payment </th>\n\
        <th>Payment Type</th>\n\
        <th>Payment Mode</th>\n\
    </tr>\n\
</thead>';

    table_data += '<tbody>';

    if (response && response.length) {
        $.each(response, function (key, value) {
            var payment_type = 'EMI';
            var detail_link = '<a  href="payment-detail.php?pid=' + value.id + '&uid=' + $('#agent-list').val() + '">Detail</a>';
            if (value.coupon_type_id == 3) {
                payment_type = 'Advance';
            }
            table_data += '<tr >\n\
                <td>' + value.customer_display_name + '</td>\n\
                <td>' + value.amount + '</td>\n\
                <td>' + value.date_of_payment + '</td>\n\
                <td>' + payment_type + '</td>\n\
                <td>' + value.payment_mode + ' &nbsp; ' + detail_link + '</td>\n\
            </tr>';
        });
        table_data += '</tbody>';
    }
    $("#reject_payment_list").html(table_data);
    generateDataTable('reject_payment_list');
} //end set of rejectlisttab function 

//Set approved list tab function
function setApprovedListTab(response) {
    var table_data = '<thead>\n\
    <tr>\n\
        <th> Customer </th>\n\
        <th> Amount </th>\n\
        <th>Date Of Payment </th>\n\
        <th>Payment Type</th>\n\
        <th>Payment Mode</th>\n\
    </tr>\n\
</thead>';

    table_data += '<tbody>';

    if (response && response.length) {
        $.each(response, function (key, value) {
            var payment_type = 'EMI';
            var detail_link = '<a  href="payment-detail.php?pid=' + value.id + '&uid=' + $('#agent-list').val() + '">Detail</a>';
            if (value.coupon_type_id == 3) {
                payment_type = 'Advance';
            }
            table_data += '<tr >\n\
                <td>' + value.customer_display_name + '</td>\n\
                <td>' + value.amount + '</td>\n\
                <td>' + value.date_of_payment + '</td>\n\
                <td>' + payment_type + '</td>\n\
                <td>' + value.payment_mode + ' &nbsp; ' + detail_link + '</td>\n\
            </tr>';
        });
        table_data += '</tbody>';
    }
    $("#approved_payment_list").html(table_data);
    generateDataTable('approved_payment_list');

} //end set of aprrovedlisttab function