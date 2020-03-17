$(document).ready(function () {
    $("#kyc_update").submit(function (e) {
        e.preventDefault();
        var kyc_frm = $("#kyc_update");
        kyc_frm.validate({
            errorPlacement: function errorPlacement(error, element) {
                element.before(error);
            }
        });

        if ($("#kyc_update").valid()) {
            showLoader();
            var params = {
                kyc_id: $('#kyc_id').val(),
                user_id: user_id,
                dob: $('#kyc_dob').val(),
                nationality: $('#nationality').val(),
                occupation: $('#koccupation').val(),
                qualification: $('#qualification').val(),
                pan_number: $('#pan_number').val(),
                passport_number: $('#passport_number').val(),
                driving_licence_number: $('#driving_licence_number').val(),
                proposed_area_of_work: $('#proposed_area_of_work').val(),
                voter_id: $('#voter_id').val(),
                join_date: $('#join_date').val(),
            };
            $.ajax({
                method: "POST",
                url: base_url + 'kyc/update',
                data: params,
                success: function (response) {
                    error_html = '';
                    if (response.status == 'success') {
                        error_html += '<div class="alert alert-primary" role="alert">KYC details saved successfully</div>';
                    } else {
                        error_html += '<div class="alert alert-warning" role="alert">KYC details could not be saved</div>';
                    }
                    $('#errors_div').html(error_html);
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
            }); //ajax 
        }
    });
});