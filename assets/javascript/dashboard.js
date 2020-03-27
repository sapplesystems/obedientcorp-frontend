getDashboardInfo(user_id);

function getDashboardInfo(user_id) {
    showLoader();
    $.ajax({
        url: base_url + 'dashboard/info',
        type: 'post',
        async: false,
        data: {user_id: user_id},
        success: function (response) {
            if (response.status == 'success') {
                var data = response.data;
                $('#pin_bonus').html(data.pin_bonus);
                $('#matching_income').html(data.matching_income);
                $('#total_earning').html(data.total_earning);
            }
            hideLoader();
        }
    });
}