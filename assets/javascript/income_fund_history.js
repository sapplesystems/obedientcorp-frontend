getIncomeFundHistory(user_id);


function getIncomeFundHistory(user_id) {
    showLoader();
    $.ajax({
        url: base_url + 'income-fund-history',
        type: 'post',
        data: {
            user_id: user_id
        },
        success: function (response) {
            if (response.status == "success") {
                var html = ""
                var counter = 0
                $('#available_income_fund').html(response.data.income_fund);
                $.each(response.data.income_fund_transaction, function (key, value) {
                    counter = counter + 1;
                    html += '<tr">\n\
                                    <td>' + counter + '</td>\n\
                                    <td>' + value.amount + '</td>\n\
                                    <td>' + value.type + '</td>\n\
                                    <td>' + value.description + '</td>\n\
                                    <td>' + value.date + '</td>\n\
                                </tr>';
                });
                $("#income_fund_history_list").html(html);
                initDataTable();
            }
            hideLoader();
        }
    });
}
