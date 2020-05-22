getRankers();

function getRankers() {
    showLoader();
    var url = base_url+'rankers';
    $.ajax({
        url: url,
        type: 'post',
        success: function (response) {
            if (response.status == 'success') {
                var html = '';
                var x = 1;
                $.each(response.data, function (key, value) {
                    html += '<tr id="tr_' + x + '">\n\
                    <td>' + x + '</td>\n\
                    <td>' + value.display_name + '</td>\n\
                    <td>' + value.designation + '</td>\n\
                </tr>';
                    x++;
                });
                $("#rankers_list").html(html);
                initDataTable('rankers_list');
                hideLoader();
            }
            else
            {
                showSwal('error', 'No Records Found');
                hideLoader();
            }
        }
    });
}