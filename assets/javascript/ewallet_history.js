getEwalletHistory({user_id: user_id});

$(document).ready(function () {

    $("#agent_list").html(down_the_line_members);

    $(document).on('change', '#start-date', function () {//$("#end-date").change(function () {
        checkStartEndDate();
    });

    $(document).on('change', '#end-date', function () {//$("#end-date").change(function () {
        checkStartEndDate();
    });

    $(document).on('change', '#agent_list', function () {
        resetFilters();
        getEwalletHistory({user_id: $(this).val()});
    });

    $(document).on('click', '#search_by_type', function (e) {
        e.preventDefault();
        var start_date = '';
        var end_date = '';
        var type = '';
        var trans_type2 = '';

        if ($('#start-date').val()) {
            start_date = $('#start-date').val();
        }
        if ($('#end-date').val()) {
            end_date = $('#end-date').val();
        }
        if ($('#type').val()) {
            type = $('#type').val();
        }
        if ($('#trans_type2').val()) {
            trans_type2 = $('#trans_type2').val();
        }

        var uid = user_id;
        if ($('#agent_list').val() && $('#agent_list').val() != '') {
            uid = $('#agent_list').val();
        }
        var params = {
            user_id: uid,
            start_date: start_date,
            end_date: end_date,
            type: type,
            trans_type2: trans_type2

        };
        getEwalletHistory(params);
    });

});

function getEwalletHistory(params) {
    showLoader();
    var table_html = '';
    $("#ewallet_list").html('');
    $.ajax({
        url: base_url + 'wallet-history',
        type: 'post',
        data: params,
        success: function (response) {
            if (response.status == "success") {
                table_html = "<thead>\n\
                                <tr>\n\
                                    <th>Sr No.</th>\n\
                                    <th>Amount</th>\n\
                                    <th>Type</th>\n\
                                    <th>Shopping Card Type</th>\n\
                                    <th>Date</th>\n\
                                    <th>Customer</th>\n\
                                    <th>Detail</th>\n\
                                    <th>Comments</th>\n\
                                </tr>\n\
                            </thead>";
                table_html += '<tbody>';
                var counter = 0
                $('#available_wallet_balance').html(response.data.wallet_balance);
                var customer_project_detail = '';
                $.each(response.data.wallet_transactions, function (key, value) {
                    counter = counter + 1;
                    customer_project_detail = '';
                    if (value.type == 'Dr' && value.trans_type2 == 'RS') {
                        customer_project_detail = 'Debited Rs. ' + value.amount + ' from your wallet against ' + value.customer_project_detail;
                    }
                    table_html += '<tr id="tr_' + value.id + '">\n\
                                    <td>' + counter + '</td>\n\
                                    <td>' + value.amount + '</td>\n\
                                    <td>' + value.type + '</td>\n\
                                    <td>' + value.trans_type + '</td>\n\
                                    <td>' + value.created_at + '</td>\n\
                                    <td>' + value.customer_display_name + '</td>\n\
                                    <td>' + customer_project_detail + '</td>\n\
                                    <td>' + value.description + '</td>\n\
                                </tr>';
                });
                table_html += '</tbody>';
                $("#ewallet_list").html(table_html);
                generateDataTable('ewallet_list');
                hideLoader();
            }
            else {
                showSwal('error', 'Error', response.data);
                $("#ewallet_list").html('');
                generateDataTable('ewallet_list');
                hideLoader();
            }

        }
    });
}

function resetFilters() {
    document.getElementById("start-date").value = "";
    document.getElementById("end-date").value = "";
    document.getElementById("trans_type2").value = "";
    document.getElementById("type").value = "";
}