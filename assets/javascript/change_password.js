$(document).ready(function () {
    $("#change_password_form").submit(function (e) {
        e.preventDefault();

        var change_password_form = $("#change_password_form");
        change_password_form.validate({
            rules: {
                new_password: {
                    minlength: 8
                },
                confirm_password: {
                    minlength: 8,
                    equalTo: "#new_password"
                }
            },
            errorPlacement: function errorPlacement(error, element) {
                element.before(error);
            }
        });

        if ($("#change_password_form").valid()) {
            showLoader();
            $.ajax({
                method: "POST",
                url: base_url + 'change-password',
                data: {id: user_id, old_password: $('#old_password').val(), new_password: $('#new_password').val()},
                success: function (response) {
                    showSwal(response.status, response.data);
                    document.getElementById('change_password_form').reset();
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


    //form submit of change transaction password
    $("#change_transaction_password_form").submit(function (e) {
        e.preventDefault();

        var change_transaction_password_form = $("#change_transaction_password_form");
        change_transaction_password_form.validate({
            rules: {
                tran_new_password: {
                    minlength: 8
                },
                tran_confirm_password: {
                    minlength: 8,
                    equalTo: "#tran_new_password"
                }
            },
            errorPlacement: function errorPlacement(error, element) {
                element.before(error);
            }
        });

        if ($("#change_transaction_password_form").valid()) {
            showLoader();
            $.ajax({
                method: "POST",
                url: base_url + 'change-transaction-password',
                data: {id: user_id, old_password: $('#tran_old_password').val(), new_password: $('#tran_new_password').val()},
                success: function (response) {
                    showSwal(response.status, response.data);
                    document.getElementById('change_transaction_password_form').reset();
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
});//document ready