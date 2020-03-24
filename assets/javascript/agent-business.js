getDownTheLineMembers(user_id);

$(document).ready(function () {
    $(":input").inputmask();
    if ($(".datepicker").length) {
        $('.datepicker').datepicker({
            enableOnReadonly: true,
            todayHighlight: true,
            format: 'dd-mm-yyyy',
            autoclose: true,
            //defaultViewDate: new Date()
        });
    }
});



$(document).on("click", "#agent_form", function (e) {
    e.preventDefault();
    // for validation
    $("#agent-buisness-form").validate({
        rules: {
            agent_id: "required",
        }

        // Specify validation error messages

    });
    if ($("#agent-buisness-form").valid()) {
        var params = {
            agent_id: $('#agent_listing').val(),
            from_date: $('#from_date').val(),
            to_date: $('#to_date').val(),
        };
        
        $.ajax({
            url: base_url + "agent-business",
            type: 'post',
            data: params,
            success: function (response) {
                if (response.status == "success") {
                    var html = ""
                    $.each(response.data.agent_business, function (key, value) {
                        html += '<tr id="tr_' + value.id + '">\n\
                                        <td>'+ value.customer_name + '(' + value.customer_code + ')</td>\n\
                                        <td>'+ value.date + '</td>\n\
                                        <td>'+ value.amount + '</td>\n\
                                        <td>'+ value.coupon_code + '</td>\n\
                                    </tr>';
                    });
                    $("#agent-business-list").html(html);
                    initDataTable();
                }
                else {
                    console.log(response.data);
                }

            }
        });
    }
});


function getDownTheLineMembers(user_id) {
    $.ajax({
        url: base_url + 'down-the-line-members',
        type: 'post',
        data: {
            user_id: user_id
        },
        success: function (response) {
            if (response.status == "success") {
                var data = response.data;
                var option = '<option value="">Agents</option>';
                $.each(data, function (key, val) {
                    option += '<option value="' + val.id + '">' + val.display_name + '</option>';
                });
                $('#agent_id,#agent_listing').html(option);

            }
        }
    });
}


