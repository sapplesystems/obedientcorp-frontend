$(document).ready(function () {
    $("#change_password_form").submit(function (e) {
        e.preventDefault();

        var change_password_form = $("#change_password_form");
        change_password_form.validate({
            rules: {
                old_password: {
                    required: true
                },
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
});