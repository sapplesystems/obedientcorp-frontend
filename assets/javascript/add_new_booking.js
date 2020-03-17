var url;
var sub_project_list = '';
var customer_id = $('#customer_id').val();
var today = new Date();
var todays_date = today.getDate() + '-' + (today.getMonth() + 1) + '-' + today.getFullYear();
getProjectList();
getCustomersName(customer_id);

$(document).ready(function () {
    $(":input").inputmask();
    if ($(".datepicker").length) {
        $('.datepicker').datepicker({
            enableOnReadonly: true,
            todayHighlight: true,
            format: 'dd-mm-yyyy',
            autoclose: true,
            endDate: todays_date
        });
    }
    $("#project_name").change(function () {
        $(".sub_project_div,.plot_name_div").css('display', 'none');
        var id = $(this).val();
        var sub_option = '<option value="">Select Sub Project</option>';
        $.each(sub_project_list, function (key, value) {
            if (value.id == id) {
                if (value.children.length > 0) {
                    $(".sub_project_div").css('display', 'block');
                    $.each(value.children, function (key1, subproject) {
                        console.log(subproject);
                        sub_option += '<option value="' + subproject.id + '">' + subproject.name + '</option>';
                    });
                }
                else {
                    getplotlist(id);
                }
            }
        });
        $('#sub_projects').html(sub_option)
    });

    $('#sub_projects').change(function () {
        $('.plot_name_div').css('display', 'none');
        var id = $(this).val();
        getplotlist(id);
    })

    $('.payment_mode').click(function () {
        if ($(this).val() == 'Cash')
        {
            var append_div = '<label class="col-sm-2 col-form-label" >Invoice Number :</label>\n\
                                <div class="col-sm-4 payment_number_div">\n\
                                <input class="form-control" type="text" id="payment_number" name="payment_number" placeholder="Enter number.">\n\
                                </div>\n\
                             <label class="col-sm-2 col-form-label">Name :</label>\n\
                            <div class="col-sm-4">\n\
                            <input class="form-control" type="text" id="account_holder_name" name="account_holder_name" placeholder="Enter name " >\n\
                            </div>';

            $('.bank_name').css('display', 'none');

        }
        else if ($(this).val() == 'Cheque')
        {
            var append_div = '<label class="col-sm-2 col-form-label" >Cheque/UTR No :</label>\n\
                                <div class="col-sm-4 payment_number_div">\n\
                                <input class="form-control" type="text" id="payment_number" name="payment_number" placeholder="Enter cheque number.">\n\
                                </div>\n\
                             <label class="col-sm-2 col-form-label">Account Holder Name :</label>\n\
                            <div class="col-sm-4">\n\
                            <input class="form-control" type="text" id="account_holder_name" name="account_holder_name" placeholder="Enter account holder name " >\n\
                            </div>';
            $('.bank_name').css('display', 'block');
        }
        else if ($(this).val() == 'Online')
        {
            var append_div = '<label class="col-sm-2 col-form-label" >Online Transaction No :</label>\n\
                                <div class="col-sm-4 payment_number_div">\n\
                                <input class="form-control" type="text" id="payment_number" name="payment_number" placeholder="Enter online transaction number.">\n\
                                </div>\n\
                             <label class="col-sm-2 col-form-label">Name :</label>\n\
                            <div class="col-sm-4">\n\
                            <input class="form-control" type="text" id="account_holder_name" name="account_holder_name" placeholder="Enter name " >\n\
                            </div>';
            $('.bank_name').css('display', 'block');
        }

        $('#payment_number_div').html(append_div);
    })

    $("#plotbooking_form").submit(function (e) {
        e.preventDefault();
        var plotbooking_frm = $("#plotbooking_form");
        plotbooking_frm.validate({
            rules: {
            },
            errorPlacement: function errorPlacement(error, element) {
                element.before(error);
            }
        });


        if ($("#plotbooking_form").valid()) {
            showLoader();
            var params = new FormData();
            params.append('customer_id', $('#customer_id').val());
            params.append('registration_number', $('#registration_num').val());
            params.append('project_master_id', $('#project_name').val());
            params.append('plot_master_id', $('#plot_name').val());
            params.append('plot_area', $('#plot_area').val());
            params.append('reference', $('#reference').val());
            params.append('unit_rate', $('#unit_rate').val());
            params.append('discount_rate', $('#discount_rate').val());
            params.append('total_amount', $('#total_amount').val());
            params.append('amount', $('#received_booking_amount').val());
            params.append('received_booking_amount', $('#received_booking_amount').val());
            params.append('date_of_payment', $('#date_of_payment').val());
            params.append('installment', $('#installment').val());
            var payment_mode = '';
            if ($('#payment_cash').is(':checked') == true) {
                payment_mode = $('#payment_cash').val();
            }
            if ($('#payment_cheque').is(':checked') == true) {
                payment_mode = $('#payment_cheque').val();
            }
            if ($('#payment_online').is(':checked') == true) {
                payment_mode = $('#payment_online').val();
            }
            params.append('payment_mode', payment_mode);
            params.append('cheque_number', $('#payment_number').val());
            params.append('cheque_date', $('#dated').val());
            params.append('account_holder_name', $('#account_holder_name').val());
            params.append('bank_name', $('#bank_name').val());
            params.append('created_by', user_id);
            params.append('created_for', $('#created_for').val());

            var url = base_url + 'customer/new-booking';

            $.ajax({
                url: url,
                type: 'post',
                data: params,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.status == "success") {
                        console.log(response.data);
                        $('#customers_list').val('');
                        // getCustomersList();
                        document.getElementById('plotbooking_form').reset();
                        hideLoader();
                        window.location.href = 'manage-customer.php';
                    } else {
                        console.log(response.data);
                        hideLoader();
                    }
                }
            });

        }

    });//end submit form

}); //end document

function getCustomersName(customer_id) {
    showLoader();
    $.ajax({
        url: base_url + 'customer/detail',
        type: 'post',
        data: {id: customer_id},
        success: function (response) {
            if (response.status == "success") {
                $('#customer_name').html(response.data.name);
                hideLoader();
            } else {
                console.log(response.data);
                hideLoader();
            }

        }
    });
}

function getProjectList() {
    showLoader();
    $.ajax({
        url: base_url + 'project/childern',
        type: 'post',
        data: {},
        success: function (response) {
            sub_project_list = response.data;
            //console.log(response.data);
            var option = '<option value="">Select Project</option>';
            if (response.status == "success") {
                $.each(response.data, function (key, value) {
                    if (value.parent_id == 0) {
                        option += '<option value="' + value.id + '">' + value.name + '</option>';
                    }

                });

                $('#project_name').html(option);
                hideLoader();
            } else {
                console.log(response.data);
                hideLoader();
            }

        }
    });
}

function getplotlist(project_id) {
    showLoader();
    $.ajax({
        url: base_url + 'get-plot',
        type: 'post',
        data: {project_master_id: project_id},
        success: function (response) {
            console.log(response);
            var option = '<option value="">Select plots</option>';
            if (response.status == "success") {
                $.each(response.data, function (key, value) {
                    //console.log(key, value)
                    option += '<option value="' + value.id + '">' + value.name + '</option>';
                });
                $('.plot_name_div').css('display', 'block');
                $('#plot_name').html(option);
                hideLoader();
            } else {
                $('.plot_name_div').css('display', 'none');
                console.log(response.data);
                hideLoader();
            }

        }
    });
}


function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}