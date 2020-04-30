get_plot_booking_listing();
get_agent_name();

function get_plot_booking_listing()
{
    var customer_id = $('#customer_id').val();
    showLoader();
    $.ajax({
        url: base_url + 'customer/view-booking',
        type: 'post',
        data: {
            customer_id: customer_id
        },
        success: function (response) {
            var html = '';
            var registration_number = '';
            var reference = '';
            if (response.status == "success") {
                $.each(response.data, function (key, val) {
                    registration_number = '';
                    reference = '';
                    if(val.registration_number){
                        registration_number = val.registration_number;
                    }
                    if(val.reference){
                        reference = val.reference;
                    }
                    html += '<tr id="tr_' + val.customer_id + '">\n\
                                      <td>' + val.display_name + ')</td>\n\
                                      <td>' + registration_number + '</td>\n\
                                      <td>' + reference + '</td>\n\
                                      <td>' + val.project_name + '</td>\n\
                                      <td>' + val.sub_project_name + '</td>\n\
                                      <td>' + val.plot_name + '</td>\n\
                                      <td>' + val.total_amount + '</td>\n\
                                      <td>' + val.received_booking_amount + '</td>\n\
                                      <td>' + val.date_of_payment + '</td>\n\
                                  </tr>';

                });
                $('#plot_booking_list').html(html);
                initDataTable();
                hideLoader();
            } else {
                $('#plot_booking_list').html(response.data);
                hideLoader();
            }

        }
    });

}

function get_agent_name()
{
    var agent_id = $('#agent_id').val();
    $.ajax({
        url: base_url + 'agent-name',
        type: 'post',
        data: {user_id: agent_id},
        success: function (response) {
            if (response.status == 'success')
            {
                $('#agent-name').html(response.data);
            }
        }


    });
}