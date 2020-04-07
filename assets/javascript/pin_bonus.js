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

getMatchingAmountList({user_id: user_id});

$(document).ready(function(){
    $("#agent_list").html(down_the_line_members);
    $(document).on('change', '#agent_list', function () {
        getMatchingAmountList({user_id: $(this).val()});
    });
});