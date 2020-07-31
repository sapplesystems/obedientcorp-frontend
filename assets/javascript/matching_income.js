//MATCHING INCOME CODE START HERE
function getMatchingAmountList(params) {
    showLoader();
    $.ajax({
        url: base_url + 'matching-amount-list',
        type: 'post',
        data: params,
        async: false,
        success: function (response) {
            if (response.status == "success") {
                var counter = 0;
                var table_data = '<thead>\n\
                                    <tr>\n\
                                        <th>Sr.No</th>\n\
                                        <th>Date</th>\n\
                                        <th>Total Left BV</th>\n\
                                        <th>Total Right BV</th>\n\
                                        <th>Matching BV</th>\n\
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
        if ($('#agent_list').val() && $('#agent_list').val() != '') {
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
//MATCHING INCOME CODE END HERE

//PAYOUT HISTORY SCRIPT START HERE
$(document).ready(function () {
    $("#agent_id").html(down_the_line_members);

    getPayoutHistoryList({user_id: (user_type == 'ADMIN') ? $('#agent_id').val() : user_id});
    $(document).on('change', '#week_range', function () {
        getPayoutHistoryList({week_range: $(this).val(), user_id: $('#agent_id').val()});
    });
    $(document).on('change', '#agent_id', function () {
        getPayoutHistoryList({week_range: $('#week_range').val(), user_id: $(this).val()});
    });
});

function getPayoutHistoryList(params) {
    showLoader();
    $.ajax({
        url: base_url + 'payout-history',
        type: 'post',
        data: params,
        success: function (response) {
            if (response.status == "success") {
                var payout_week = response.payout_week;
                var week_range = '<option value="">Select Week</option>';
                if (payout_week.length > 0) {
                    $.each(payout_week, function (k, v) {
                        var sel = '';
                        if (params.week_range == v.week_no) {
                            sel = 'selected';
                        }
                        week_range += '<option value="' + v.week_no + '" ' + sel + '>Week: ' + v.week_range + '</option>';
                    });
                }
                $('#week_range').html(week_range);
                var table_data = '<thead>\n\
                                                <tr>\n\
                                                    <th>Week No.</th>\n\
                                                    <th>Date</th>\n\
                                                    <th>Associate Name</th>\n\
                                                    <th>Left BV</th>\n\
                                                    <th>Right BV</th>\n\
                                                    <th>Balance Left BV</th>\n\
                                                    <th>Balance Right BV</th>\n\
                                                    <th>Matching BV</th>\n\
                                                    <th>Commission</th>\n\
                                                    <th>BDE</th>\n\
                                                    <th>Sponsor Income</th>\n\
                                                    <th>Reward</th>\n\
                                                    <th>Offer</th>\n\
                                                    <th>Income Fund</th>\n\
                                                    <th>TDS</th>\n\
                                                    <th>Processing Fee</th>\n\
                                                    <th>Other Charges</th>\n\
                                                    <th>Payout Amount</th>\n\
                                                </tr>\n\
                                            </thead>';
                table_data += '<tbody>';
                $.each(response.data, function (key, value) {
                    table_data += '<tr>\n\
                                            <td>' + value.week_no + '</td>\n\
                                            <td>' + value.from_date + ' To ' + value.to_date + '</td>\n\
                                            <td>' + value.display_name + '</td>\n\
                                            <td>' + value.total_left_business + '</td>\n\
                                            <td>' + value.total_right_business + '</td>\n\
                                            <td>' + value.remaining_left_business + '</td>\n\
                                            <td>' + value.remaining_right_business + '</td>\n\
                                            <td>' + value.matching_amount + '</td>\n\
                                            <td>' + value.commission + '</td>\n\
                                            <td>' + value.bde + '</td>\n\
                                            <td>' + value.sponsor + '</td>\n\
                                            <td>' + value.reward + '</td>\n\
                                            <td>' + value.offer + '</td>\n\
                                            <td>' + value.income_fund + '</td>\n\
                                            <td>' + value.tds + '</td>\n\
                                            <td>' + value.processing_fee + '</td>\n\
                                            <td>' + value.other_charges + '</td>\n\
                                            <td>' + value.payout_amount + '</td>\n\
                                        </tr>';
                });
                table_data += '</tbody>';
                $("#payout_history").html(table_data);
                //generateDataTable('payout_history');
                var table = $('#payout_history').DataTable();
                table.destroy();
                $('#payout_history').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        {
                            extend: 'excelHtml5',
                            title: 'Payout-History-' + Date.now(),
                            text: 'Export to excel'
                        }
                    ],
                    aaSorting: []
                });
                $('.dt-button').removeClass().addClass('btn btn-gradient-primary');
                hideLoader();
            }
            else {
                showSwal('error', 'Error', response.data);
                $("#payout_history").html('');
                hideLoader();
            }

        }
    });
}
//PAYOUT HISTORY SCRIPT END HERE