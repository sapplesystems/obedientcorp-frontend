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
                hideLoader();
            }

        }
    });
}

getMatchingAmountList({user_id: user_id});

$(document).ready(function () {
    $("#agent_list").html(down_the_line_members);
    
    $(document).on('change', '#start-date', function () {//$("#end-date").change(function () {
        checkStartEndDate();
    });

    $(document).on('change', '#end-date', function () {//$("#end-date").change(function () {
        checkStartEndDate();
    });

    $(document).on('change', '#agent_list', function () {
        getMatchingAmountList({user_id: $(this).val()});
    });
    
    $(document).on('click', '#search_matching', function (e) {
        e.preventDefault();
        var start_date = '';
        var end_date = '';

        if ($('#start-date').val()) {
            start_date = $('#start-date').val();
        }
        if ($('#end-date').val()) {
            end_date = $('#end-date').val();
        }
        
        var uid = user_id;
        if($('#agent_list').val() && $('#agent_list').val() != ''){
            uid = $('#agent_list').val();
        }
        var params = {
            user_id: uid,
            start_date: start_date,
            end_date: end_date,

        };
        getMatchingAmountList(params);
    });
});