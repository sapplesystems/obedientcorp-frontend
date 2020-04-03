$(document).ready(function () {
    $("#bank_update").submit(function (e) {
        e.preventDefault();
        var bank_frm = $("#bank_update");
        bank_frm.validate({
            errorPlacement: function errorPlacement(error, element) {
                element.before(error);
            }
        });

        if ($("#bank_update").valid()) {
            showLoader();
            var params = new FormData();
            var id = user_profile_id;
            var payee_name = $('#payee_name').val();
            var bank_name = $('#bank_name').val();
            var account_number = $('#account_number').val();
            var branch = $('#branch').val();
            var ifsc_code = $('#ifsc_code').val();
            var cancel_cheque = $('#cancel_cheque')[0].files[0];
            params.append("user_id", id);
            params.append("payee_name", payee_name);
            params.append("bank_name", bank_name);
            params.append("account_number", account_number);
            params.append("branch", branch);
            params.append("ifsc_code", ifsc_code);
            params.append("cancel_cheque", cancel_cheque);
            $.ajax({
                method: "POST",
                url: base_url + 'bank/update',
                data: params,
                processData: false,
                contentType: false,
                success: function (response) {
                    error_html = '';
                    if (response.status == 'success') {
                        showSwal('success', 'Bank Details Saved', 'Bank details saved successfully');
                    } else {
                        showSwal('error', 'Bank Details Not Saved', 'Bank details could not be saved');
                    }
                    hideLoader();
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
                    hideLoader();
                }
            });
        }
    });
});