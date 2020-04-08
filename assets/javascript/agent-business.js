$(document).ready(function () {
    $('#agent_listing').html(down_the_line_members);

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
            showLoader();
            $.ajax({
                url: base_url + "agent-business",
                type: 'post',
                data: params,
                success: function (response) {
                    if (response.status == "success") {
                        destroyDataTable();
                        var html = ""
                        $.each(response.data.agent_business, function (key, value) {
                            html += '<tr id="tr_' + value.id + '">\n\
                                        <td>' + value.customer_name + '(' + value.customer_code + ')</td>\n\
                                        <td>' + value.date + '</td>\n\
                                        <td>' + value.amount + '</td>\n\
                                        <td>' + value.coupon_code + '</td>\n\
                                    </tr>';
                        });
                        $("#agent-business-list").html(html);
                        initDataTable();
                        hideLoader();
                    }
                    else {
                        hideLoader();
                    }

                }
            });
        }
    });
});