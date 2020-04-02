getAgentList();
getCustomersList({user_id: user_id});

$(document).ready(function () {
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
                                        <th>Customer Mobile</th>\n\
                                        <th>Customer Email</th>\n\
                                    </tr>\n\
                                </thead>';
                table_data += '<tbody>';
                $.each(response.data, function (key, value) {
                    table_data += '<tr id="tr_' + value.id + '">\n\
                                    <td>' + value.name + '(' + value.username + ')</td>\n\
                                    <td>' + value.agent_display_name + '</td>\n\
                                    <td>' + value.mobile + '</td>\n\
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

function getAgentList() {
    //login user id
    var url = base_url + 'down-the-line-members';
    $.ajax({
        url: url,
        type: 'post',
        dataType: 'json',
        data: {
            user_id: user_id
        },
        success: function (response) {
            if (response.status) {
                var agent_list;
                var i = 0;
                $.each(response.data, function (key, value) {
                    agent_list += '<option value="' + value.id + '">' + value.display_name + '</option>';
                });
                $("#agent_list").html(agent_list);
            }
        }
    });
}