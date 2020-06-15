$(document).ready(function () {
    $('#agent_id').html(down_the_line_members);

    $(document).on('submit', '#user_business_form_submit', function (e) {
        e.preventDefault();
        var user_business_frm = $("#user_business_form_submit");
        user_business_frm.validate({
            rules: {
            },
            errorPlacement: function errorPlacement(error, element) {
                element.before(error);
            }
        });

        if ($("#user_business_form_submit").valid()) {

            var params = {
                'user_id': $('#agent_id').val(),
                'total_left_business': $('#total_left_business').val(),
                'total_right_business': $('#total_right_business').val(),
                'remaining_left_business': $('#remaining_left_business').val(),
                'remaining_right_business': $('#remaining_right_business').val(),
                'matching_amount': $('#matching_amount').val(),
                'total_earning': $('#total_earning').val(),
                'created_by': $('#agent_id').val()
            };
            $.ajax({
                url: base_url + 'manual-update-amount',
                type: 'post',
                data: params,
                success: function (response) {
                    if (response.status == "success") {
                        showSwal('success', 'User Business', 'User business updated successfully');
                        hideLoader();
                    } else {
                        hideLoader();
                    }
                }
            });

        }

    });//end form submit
});