$(document).ready(function () {
    $("#nominee_update").submit(function (e) {
        e.preventDefault();
        var nominee_frm = $("#nominee_update");
        nominee_frm.validate({
            errorPlacement: function errorPlacement(error, element) {
                element.before(error);
            }
        });

        if ($("#nominee_update").valid()) {
            showLoader();
            var params = new FormData();
            var id = user_profile_id;
            var nominee_name = $('#nominee_name').val();
            var relation = $('#relation').val();
            //var father_husband_name = $('#father_name').val();
            //var mothers_name = $('#mother_name').val();
            var ndob = $('#ndob').val();
            var nominee_age = $('#nominee_age').val();

            params.append("user_id", id);
            params.append('nominee_id', $('#nominee_id').val());
            params.append("nominee_name", nominee_name);
            //params.append("father_or_husband_name", father_husband_name);
            //params.append("mothers_name", mothers_name);
            params.append("nominee_age", nominee_age);
            params.append("relation", relation);
            params.append("ndob", ndob);
            $.ajax({
                method: "POST",
                url: base_url + 'nominee/update',
                data: params,
                processData: false,
                contentType: false,
                success: function (response) {
                    error_html = '';
                    if (response.status == 'success') {
                        showSwal('success', 'Nominee Details Saved', 'Nominee details saved successfully');
                    } else {
                        showSwal('error', 'Nominee Details Saved', 'Nominee details could not be saved');
                        
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