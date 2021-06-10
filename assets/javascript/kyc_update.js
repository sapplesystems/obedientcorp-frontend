$(document).ready(function () {
    $('#passport_image').change(function () {
        $('#passport_image_error_1').css('display', 'none'); // triggers the validation test        
    });
    $('#passport_image2').change(function () {
        $('#passport_image_error_2').css('display', 'none'); // triggers the validation test  
    });
    $('#driving_licence_image').change(function () {
        $('#driving_licence_image_error_1').css('display', 'none');
    });
    $('#driving_licence_image2').change(function () {
        $('#driving_licence_image_error_2').css('display', 'none');
    });

    $('#adhar_image').change(function () {
        $(this).valid();  // triggers the validation test        
    });
    $('#adhar_image2').change(function () {
        $(this).valid();  // triggers the validation test        
    });


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
            if ($('#passport_image').val() != '' && $('#passport_image2').val() == '') {
                $('#passport_image_error_2').css('display', 'block');
                $('#passport_image_error_2').css({
                    "color": "#fe7c96",
                    "display": "inline-block",
                    "margin-left": "1.5em",
                    "font-size": "0.875rem"
                });
                return false;
            }
            if ($('#passport_image').val() == '' && $('#passport_image2').val() != '') {
                $('#passport_image_error_1').css('display', 'block');
                $('#passport_image_error_1').css({
                    "color": "#fe7c96",
                    "display": "inline-block",
                    "margin-left": "1.5em",
                    "font-size": "0.875rem"
                });
                return false;
            }
            var passport_image = $('#passport_image')[0].files[0];
            var passport_image2 = $('#passport_image2')[0].files[0];
            var driving_licence_number = $('#driving_licence_number').val();
            if ($('#driving_licence_image').val() != '' && $('#driving_licence_image2').val() == '') {
                $('#driving_licence_image_error_2').css('display', 'block');
                $('#driving_licence_image_error_2').css({
                    "color": "#fe7c96",
                    "display": "inline-block",
                    "margin-left": "1.5em",
                    "font-size": "0.875rem"
                });
                return false;
            }
            if ($('#driving_licence_image').val() == '' && $('#driving_licence_image2').val() != '') {
                $('#driving_licence_image_error_1').css('display', 'block');
                $('#driving_licence_image_error_1').css({
                    "color": "#fe7c96",
                    "display": "inline-block",
                    "margin-left": "1.5em",
                    "font-size": "0.875rem"
                });
                return false;
            }
            var driving_licence_image = $('#driving_licence_image')[0].files[0];
            var driving_licence_image2 = $('#driving_licence_image2')[0].files[0];
            var proposed_area_of_work = $('#proposed_area_of_work').val();

            var voter_id = $('#voter_id').val();
            var voter_image = $('#voter_image')[0].files[0];
            var adhar = $('#adhar_number').val();
            var adhar_image = $('#adhar_image')[0].files[0];
            var adhar_image2 = $('#adhar_image2')[0].files[0];
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
            params.append("passport_image_2", passport_image2);
            params.append("driving_licence_number", driving_licence_number);
            params.append("driving_licence_image", driving_licence_image);
            params.append("driving_licence_image_2", driving_licence_image2);
            params.append("proposed_area_of_work", proposed_area_of_work);
            params.append("voter_id", voter_id);
            params.append("voter_image", voter_image);
            params.append("adhar", adhar);
            params.append("adhar_image", adhar_image);
            params.append("adhar_image_2", adhar_image2);

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
                        showSwal('error', 'KYC Details Not Saved', response.data);
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