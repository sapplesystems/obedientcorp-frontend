$(document).ready(function () {
    $('#agent_listing').html(down_the_line_members);

    $(document).on('change', '#start-date', function () {//$("#end-date").change(function () {
        checkStartEndDate();
    });

    $(document).on('change', '#end-date', function () {//$("#end-date").change(function () {
        checkStartEndDate();
    });

    $(document).on("click", "#agent_form", function (e) {
        e.preventDefault();
        if ($("#agent-buisness-form").valid()) {
            var params = {
                agent_id: $('#agent_listing').val(),
                from_date: $('#start-date').val(),
                to_date: $('#end-date').val(),
            };
            getAssociateBusiness(params);
        }
    });
});

getAssociateBusiness({});

function getAssociateBusiness(params) {
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
                                        <td>' + value.display_name + '</td>\n\
                                        <td>' + value.date + '</td>\n\
                                        <td>' + value.amount + '</td>\n\
                                        <td>' + value.coupon_code + '</td>\n\
                                        <td>' + value.coupon_type + '</td>\n\
                                    </tr>';
                });
                $("#agent-business-list").html(html);
                $("#order-listing").DataTable({aaSorting: []});
                hideLoader();
            }
            else {
                hideLoader();
            }

        }
    });
}