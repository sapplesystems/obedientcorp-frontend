getEwalletHistory(user_id);


function getEwalletHistory(user_id) {
    $.ajax({
        url: base_url + 'wallet-history',
        type: 'post',
        data: {
            user_id: user_id
        },
        success: function (response) {
            console.log(response);
            if (response.status == "success") {
                var html = ""
                var counter = 0
                $('#available_wallet_balance').html(response.data.wallet_balance);
                $.each(response.data.wallet_transactions, function (key, value) {
                    counter = counter + 1;

                    html += '<tr id="tr_' + value.id + '">\n\
                                    <td>' + counter + '</td>\n\
                                    <td>' + value.amount + '</td>\n\
                                    <td>' + value.type + '</td>\n\
                                    <td>' + value.created_at + '</td>\n\
                                    <td>' + value.description + '</td>\n\
                                </tr>';
                });
                $("#ewallet_list").html(html);
                initDataTable();
            }
            else {
                console.log(response.data);
            }

        }
    });
}
