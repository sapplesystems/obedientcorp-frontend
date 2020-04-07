function getMatchingAmountList(params) {
    showLoader();
    $.ajax({
        url: base_url + 'pin-bonus-list',
        type: 'post',
        data: params,
        success: function (response) {
            if (response.status == "success") {
                var counter = 0;
                var table_data = '<thead>\n\
                                    <tr>\n\
                                        <th>Sr.No</th>\n\
                                        <th>Amount</th>\n\
                                        <th>Date</th>\n\
                                    </tr>\n\
                                </thead>';
                table_data += '<tbody>';
                $.each(response.data, function (key, value) {
                    counter = counter + 1;
                    table_data += '<tr id="tr_' + key + '">\n\
                                    <td>' + counter + '</td>\n\
                                    <td>' + value.total_self_business + '</td>\n\
                                    <td>' + value.date + '</td>\n\
                                    </tr>';
                });
                table_data += '</tbody>';
                $("#pin_bonus_listing").html(table_data);
                generateDataTable('pin_bonus_listing');
                hideLoader();
            }
            else {
                $("#pin_bonus_listing").html('');
                generateDataTable('pin_bonus_listing');
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
                if(user_id == 1){
                    agent_list += '<option value="">Select</option>';
                }
                $.each(response.data, function (key, value) {
                    agent_list += '<option value="' + value.id + '">' + value.display_name + '</option>';
                });
                $("#agent_list").html(agent_list);
            }
        }
    });
}

getAgentList();
getMatchingAmountList({user_id: user_id});

$(document).ready(function(){
    $(document).on('change', '#agent_list', function () {
        getMatchingAmountList({user_id: $(this).val()});
    });
});