
var amount = '';
var type = '';
get_payament_details();
//function for get all coupons
$(function () {
    $("#payment-form").submit(function (e) {
        e.preventDefault();
        var payment_frm = $("#payment-form");
        console.log(payment_frm);
        payment_frm.validate({
            errorPlacement: function errorPlacement(error, element) {
                element.before(error);
            }
        });

        if ($("#payment-form").valid()) {
            var params = new FormData();
            var payment_mode = $('#payment_mode').val();
            var payment_number = $('#payment_number').val();
            if ($('#bank_name').val())
            {
                var bank_name = $('#bank_name').val();
            }
            var photo = $('#upload-image')[0].files[0];
            var comment = $('#comment').val();
            var url = base_url + 'customer-payment-select';
            var emi_ids = [];
            var payment_amount = [];
            $('.emi_payment:checked').each(function () {
                emi_ids.push($(this).val());
                var id = $(this).val();
                payment_amount.push($("#payment-amount_"+id).text());
            });
            var user_id = 2;
            var date = new Date();
            var coupon_type_id = 2;
            
            
            params.append('payment_mode', payment_mode);
            params.append('payment_number', payment_number);
            params.append('bank_name', bank_name);
            params.append('photo', photo);
            params.append('comment', comment);
            params.append('emi_ids', emi_ids);
            params.append('created_by', user_id);
            params.append('date_of_payment', date);
            params.append('coupon_type_id', coupon_type_id);
            params.append('amount', payment_amount);

            $.ajax({
                url: url,
                type: 'post',
                data: params,
                contentType: false,
                processData: false,
                success: function (response) {
                    console.log(response);
                    error_html = '';
                    if (response.status == 'success') {

                        error_html += '<div class="alert alert-primary" role="alert">Project details saved successfully</div>';
                        document.getElementById('project-form').reset();
                        $('#mapphoto_id,#photo_id').attr('src', '');
                        $('#mapphoto_id,#photo_id').css('display', 'none');
                        getProjectList();

                    } else {
                        error_html += '<div class="alert alert-warning" role="alert">Project details could not be saved</div>';
                    }

                    $('#errors_div').html(error_html);

                },
                error: function (response) {
                    console.log(response);
                    error_html = '';
                    var error_object = JSON.parse(response.responseText);
                    var message = error_object.message;
                    var errors = error_object.errors;
                    $.each(errors, function (key, value) {
                        error_html += '<div class="alert alert-danger" role="alert">' + value[0] + '</div>';
                    });
                    $('#errors_div').html(error_html);
                }
            });//ajax
        }//end if
    });

    //onchange payment_mode
    $('#payment_mode').change(function () {

        if ($(this).val() == 'Cash')
        {
            var payment_number = '<label class="col-form-label col-sm-4 text-right payment-number-div">Invoice Number:</label>\n\
                   <div class="col-sm-8">\n\
                     <input type="text" class="form-control required" id="payment_number" name="payment_number">\n\
                                                            </div>';
            $('.payment-number-div').html(payment_number);
            $('.bank-name').css('display', 'none');

        }
        else if ($(this).val() == 'Online')
        {
            var payment_number = '<label class="col-form-label col-sm-4 text-right payment-number-div">Online Transaction Number:</label>\n\
                   <div class="col-sm-8">\n\
                     <input type="text" class="form-control required" id="payment_number" name="payment_number">\n\
                                                            </div>';
            $('.payment-number-div').html(payment_number);
            $('.bank-name').css('display', 'block');

        }
        else if ($(this).val() == 'Cheque')
        {
            var payment_number = '<label class="col-form-label col-sm-4 text-right payment-number-div">Cheque Number:</label>\n\
                   <div class="col-sm-8">\n\
                     <input type="text" class="form-control required" id="payment_number" name="payment_number">\n\
                                                            </div>';
            $('.payment-number-div').html(payment_number);
            $('.bank-name').css('display', 'block');
        }
    });
}); //end ready function

function get_payament_details() {
    var params = {
        user_id: 2
    };
    $.ajax({
        url: base_url + 'customer-payment-detail',
        type: 'post',
        data: params,
        success: function (response) {
            if (response.status) {
                var table_data = '<thead>\n\
                                        <tr>\n\
                                            <th></th>\n\
                                            <th> Customer </th>\n\
                                            <th> Amount </th>\n\
                                            <th> EMI Due Date </th>\n\
                                            <th>Project</th>\n\\n\
                                            <th>Sub Project</th>\n\
                                            <th>Plot ID</th>\n\
                                        </tr>\n\
                                    </thead>';
                var checkbox = '';
                $.each(response.data, function (key, value) {
                    checkbox = '';
                    if (value.payment_status == 'Due' || value.payment_status == 'Rejected') {
                        //checkbox = '<input type="checkbox" class="emi_payment" value="' + value.customer_plot_booking_payment_detail_id + '">';
                        checkbox = '<div class="form-check m-0">\n\
<input type="checkbox" class="form-check-input emi_payment" value="' + value.customer_plot_booking_payment_detail_id + '">\n\
</div>';
                    }
                    table_data += '<tbody>\n\
                                        <tr >\n\
                                        <td>' + checkbox + '</td>\n\
                                            <td>' + value.name + '</td>\n\
                                            <td id="payment-amount_'+value.customer_plot_booking_payment_detail_id+'">' + value.amount + '</td>\n\
                                            <td>' + value.due_date + '</td>\n\
                                            <td>' + value.project_master_name + '</td>\n\
                                            <td>' + value.sub_project_master_name + '</td>\n\
                                            <td>' + value.plot_master_name + '</td>\n\
                                        </tr></tbody>';
                });
                console.log(table_data);
                $("#customer_payment").html(table_data);

            }

        }
    });
}