function getMatchingAmountList(params) {
    showLoader();
    $.ajax({
        url: base_url + 'matching-amount-list',
        type: 'post',
        data: params,
        success: function (response) {
            if (response.status == "success") {
                var counter = 0;
                var table_data = '<thead>\n\
                                    <tr>\n\
                                        <th>Sr.No</th>\n\
                                        <th>Date</th>\n\
                                        <th>Total Left Business</th>\n\
                                        <th>Total Right Business</th>\n\
                                        <th>Matching</th>\n\
                                        <th>Balance Left</th>\n\
                                        <th>Balance Right</th>\n\
                                        <th>Commission</th>\n\
                                    </tr>\n\
                                </thead>';
                table_data += '<tbody>';
                $.each(response.data, function (key, value) {
                    counter = counter + 1;
                    table_data += '<tr id="tr_' + key + '">\n\
                                    <td>' + counter + '</td>\n\
                                    <td>' + value.date + '</td>\n\
                                    <td>' + value.total_left_business + '</td>\n\
                                    <td>' + value.total_right_business + '</td>\n\
                                    <td>' + value.matching_amount + '</td>\n\
                                    <td>' + value.remaining_left_business + '</td>\n\
                                    <td>' + value.remaining_right_business + '</td>\n\
                                    <td>' + value.commission + '</td>\n\
                                    </tr>';
                });
                table_data += '</tbody>';
                $("#matching_income_listing").html(table_data);
                generateDataTable('matching_income_listing');
                hideLoader();
            }
            else {
                $("#matching_income_listing").html('');
                generateDataTable('matching_income_listing');
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