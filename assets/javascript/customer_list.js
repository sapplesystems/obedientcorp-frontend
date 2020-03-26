getCustomersList(user_id);


function getCustomersList(user_id) {
    $.ajax({
        url: base_url + 'customers',
        type: 'post',
        data: {
            user_id: user_id
        },
        success: function (response) {
            console.log(response);
            if (response.status == "success") {
                var html = ""
                $.each(response.data, function (key, value) {
                    html += '<tr id="tr_' + value.id + '">\n\
                                    <td>'+ value.name + '(' + value.username + ')</td>\n\
                                    <td>'+ value.agent_display_name + '</td>\n\
                                    <td>'+ value.mobile + '</td>\n\
                                    <td>'+ value.email + '</td>\n\
                                </tr>';
                });
                $("#customers_list").html(html);
                initDataTable();
            }
            else {
                console.log(response.data);
            }

        }
    });
}
