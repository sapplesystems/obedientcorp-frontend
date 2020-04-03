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
            var params = new FormData();

            var kyc_id = $('#kyc_id').val();
            var id = user_profile_id;
            var nationality = $('#nationality').val();
            var occupation = $('#koccupation').val();
            var qualification = $('#qualification').val();
            var pan_number = $('#pan_number').val();

            var pan_image = $('#pan_image')[0].files[0];
            var passport_number = $('#passport_number').val();
            var passport_image = $('#passport_image')[0].files[0];
            var driving_licence_number = $('#driving_licence_number').val();
            var driving_licence_image = $('#driving_licence_image')[0].files[0];
            var proposed_area_of_work = $('#proposed_area_of_work').val();

            var voter_id = $('#voter_id').val();
            var voter_image = $('#voter_image')[0].files[0];
            var adhar = $('#adhar_number').val();
            var adhar_image = $('#adhar_image')[0].files[0];
            //join_date: $('#join_date').val(),
            params.append("kyc_id", kyc_id);
            params.append("user_id", id);
            params.append("nationality", nationality);
            params.append("occupation", occupation);
            params.append("qualification", qualification);
            params.append("pan_number", pan_number);
            params.append("pan_image", pan_image);
            params.append("passport_number", passport_number);
            params.append("passport_image", passport_image);
            params.append("driving_licence_number", driving_licence_number);
            params.append("driving_licence_image", driving_licence_image);
            params.append("proposed_area_of_work", proposed_area_of_work);
            params.append("voter_id", voter_id);
            params.append("voter_image", voter_image);
            params.append("adhar", adhar);
            params.append("adhar_image", adhar_image);

            $.ajax({
                method: "POST",
                url: base_url + 'kyc/update',
                data: params,
                processData: false,
                contentType: false,
                success: function (response) {
                    error_html = '';
                    if (response.status == 'success') {
                        showSwal('success', 'KYC Details Saved', 'KYC details saved successfully');
                    } else {
                        showSwal('error', 'KYC Details Not Saved', 'KYC details could not be saved');
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
            }); //ajax 
        }
    });
});