getCustomersList({user_id: user_id});

$(document).ready(function () {
    $("#agent_list").html(down_the_line_members);
    
    $(document).on('change', '#agent_list', function () {
        getCustomersList({user_id: $(this).val()});
    });
});


function getCustomersList(params) {
    showLoader();
    $.ajax({
        url: base_url + 'customers',
        type: 'post',
        data: params,
        success: function (response) {
            if (response.status == "success") {
                var table_data = '<thead>\n\
                                    <tr>\n\
                                        <th>Customer Name</th>\n\
                                        <th>Agent Name</th>\n\
                                        <th>Customer Email</th>\n\
                                    </tr>\n\
                                </thead>';
                table_data += '<tbody>';
                $.each(response.data, function (key, value) {
                    table_data += '<tr id="tr_' + value.id + '">\n\
                                    <td>' + value.name + '(' + value.username + ')</td>\n\
                                    <td>' + value.agent_display_name + '</td>\n\
                                    <td>' + value.email + '</td>\n\
                                </tr>';
                });
                table_data += '</tbody>';
                $("#customers_list").html(table_data);
                generateDataTable('customers_list');
                hideLoader();
            }
            else {
                hideLoader();
            }

        }
    });
}