getEwalletHistory({ user_id: user_id });
initDatepicker();

$(document).ready(function () {

    $(document).on('click', '#search_by_type', function () {
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
            //type = $('#type').val();
        }
        if ($('#trans_type2').val()) {
            trans_type2 = $('#trans_type2').val();
            //transaction_type = $('#transaction_type').val();
        }

        var params = {
            user_id: user_id,
            start_date: start_date,
            end_date: end_date,
            type: type,
            trans_type2: trans_type2

        };
        console.log(params);
        getEwalletHistory(params);
    });

});

function getEwalletHistory(params) {
    showLoader();
    $.ajax({
        url: base_url + 'wallet-history',
        type: 'post',
        data: params,
        success: function (response) {
            console.log(response);
            if (response.status == "success") {
                var table_html = "<thead>\n\
                                <tr>\n\
                                    <th>Sr No.</th>\n\
                                    <th>Amount</th>\n\
                                    <th>Type</th>\n\
                                    <th>Date</th>\n\
                                    <th>Comments</th>\n\
                                </tr>\n\
                            </thead>";
                            table_html += '<tbody>';
                var counter = 0
                $('#available_wallet_balance').html(response.data.wallet_balance);
                $.each(response.data.wallet_transactions, function (key, value) {
                    counter = counter + 1;

                    table_html += '<tr id="tr_' + value.id + '">\n\
                                    <td>' + counter + '</td>\n\
                                    <td>' + value.amount + '</td>\n\
                                    <td>' + value.type + '</td>\n\
                                    <td>' + value.created_at + '</td>\n\
                                    <td>' + value.description + '</td>\n\
                                </tr>';
                });
                table_html += '</tbody>';
                $("#ewallet_list").html(table_html);
                generateDataTable('ewallet_list');
                hideLoader();
            }
            else {
                hideLoader();
            }

        }
    });
}

function initDatepicker() {
    $(":input").inputmask();
    if ($(".datepicker").length) {
        $('.datepicker').datepicker({
            enableOnReadonly: true,
            todayHighlight: true,
            format: 'dd-mm-yyyy',
            autoclose: true,
            //endDate: todays_date
        });
    }
}
