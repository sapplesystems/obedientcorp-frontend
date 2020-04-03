getAgentsList();

$(document).ready(function () {
});


function getAgentsList() {
    showLoader();
    $.ajax({
        url: base_url + 'agent-list',
        type: 'post',
        data: {
            user_id: user_id
        },
        success: function (response) {
            var x=1;
            console.log(response);
            if (response.status == "success") {
                var table_data = '';
                //table_data += '<tbody>';
                $.each(response.data, function (key, value) {
                    table_data += '<tr id="tr_' + value.id + '">\n\
                                    <td>' + x +'</td>\n\
                                    <td>' + value.name +'</td>\n\
                                    <td>' + value.code + '</td>\n\
                                    <td>' + value.introducer_code + '</td>\n\
                                    <td>' + value.mobile_no + '</td>\n\
                                    <td>' + value.joining_date + '</td>\n\
                                    <td>'+value.password +'</td>\n\
                                    <td>'+value.transaction_password +'</td>\n\
                                    <td> <a href="profile.php?user_id=' + value.user_id + '&user_email=' + value.email + '" title="Edit Agent Detail"><i class="mdi mdi-pencil text-info"></i></a> &nbsp </td>\n\
                                </tr>';
                                x++;
                });
                //table_data += '</tbody>';
                $("#agents_list").html(table_data);
                initDataTable('agents_list');
                hideLoader();
            }
            else {
                hideLoader();
            }

        }
    });
}

