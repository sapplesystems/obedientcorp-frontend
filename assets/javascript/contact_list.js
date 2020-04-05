getAgentsList();

$(document).ready(function () {
});


function getAgentsList() {
    showLoader();
    $.ajax({
        url: base_url + 'list-contact-request ',
        type: 'post',
        success: function (response) {
            console.log(response);
            var x = 1;
            if (response.status == "success") {
                var table_data = '';
                //table_data += '<tbody>';
                $.each(response.data, function (key, value) {
                    table_data += '<tr id="tr_' + value.id + '">\n\
                                    <td>' + x + '</td>\n\
                                    <td>' + value.name + '</td>\n\
                                    <td>' + value.email + '</td>\n\
                                    <td>' + value.phone + '</td>\n\
                                    <td>' + value.message + '</td>\n\
                                    <td>' + value.created_at + '</td>\n\
                                </tr>';
                    x++;
                });
                //table_data += '</tbody>';
                $("#contacts_list").html(table_data);
                initDataTable('contacts_list');
                hideLoader();
            }
            else {
                hideLoader();
            }

        }
    });
}







