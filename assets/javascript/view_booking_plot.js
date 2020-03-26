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
            console.log(response);
            //var agent_id = $('#agent_listing').val();
            var html = '';
            if (response.status == "success") {
                    $.each(response.data, function (key, val) {
                        html += '<tr id="tr_' + val.customer_id + '">\n\
                                      <td>' + val.customer_name + '('+val.customer_username+')</td>\n\
                                      <td>' + val.registration_number + '</td>\n\
                                      <td>' + val.reference + '</td>\n\
                                      <td>' + val.project_name + '</td>\n\
                                      <td>' + val.sub_project_name + '</td>\n\
                                      <td>' + val.plot_name + '</td>\n\
                                      <td>' + val.total_amount + '</td>\n\
                                  </tr>';
                        
                    });
                    $('#plot_booking_list').html(html);
                    initDataTable();
                hideLoader();
            } else {
                console.log(response.data);
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
        url:base_url + 'agent-name',
        type:'post',
        data:{user_id:agent_id},
        success:function(response){
            if(response.status == 'success')
            {
                $('#agent-name').html(response.data);
            }
        }


    });
}