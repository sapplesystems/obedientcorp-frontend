$(function () {
    $(document).on('click', '#pills-dispatch-tab', function (e) {
        e.preventDefault();
        getDispatchList();
    });

});

getDispatchList();
function getDispatchList() {
    showLoader();
    $.ajax({
        url: base_url + 'admin/statustype-list',
        type: 'post',
        data: {},
        success: function (response) {
            if (response.status == 'success') {
                setDispatchListTab(response.data.Dispatched, 'dispatch');
                setDispatchListTab(response.data.Received, 'receive');
                setDispatchListTab(response.data.Mismatch, 'mismatch');
                hideLoader();
            } else {
                if (status == 'Dispatched') {
                    $('#dispatch_payment_list').html(response.data);
                    generateDataTable('dispatch_payment_list');
                }
                if (status == 'Recieved') {
                    $('#recieved_payment_list').html(response.data);
                    generateDataTable('recieved_payment_list');
                }
                if (status == 'Mismatch') {
                    $('#mismatch_payment_list').html(response.data);
                    generateDataTable('mismatch_payment_list');
                }
            }
            hideLoader();
        }


    });
}

function setDispatchListTab(response, status) {
    var i = 1;
    var html = '<thead>\n\
                <tr>\n\
                <th>Sr.No.</th>\n\
                <th>Dispatch By</th>\n\
                <th>Dispatch To</th>\n\
                <th>Dispatch Number</th>\n\
                <th>Date Of Dispatch</th>\n\
                <th>Date Of Received</th>\n\
                <th>Status</th>\n\
                <th>Action</th>\n\
                </tr>\n\
                </thead><tbody>';
    $.each(response, function (key, value) {
        var action_td = '';
        action_td = '<td>\n\
                    <a class="btn btn-dark btn-sm" href="distributor-dispatch-detail.php?dispatch_id=' + value.id + '&dist_id=' + value.distributor_id_to + '" id="dispatch-detail" title="Dispatch detail"><i class="mdi mdi-open-in-new text-secondary"></i></a> \n\
              </td>';
        var ddate = value.expected_delivery_date;
        if (status == 'receive' || status == 'mismatch') {
            var ddate = value.received_date;
        }
        html += '<tr id="tr_' + value.id + '" role="row" >\n\
                      <td class="sorting_1">' + i + '</td>\n\
                      <td>' + value.distributor_name_from + '</td>\n\
                      <td>' + value.distributor_name_to + '</td>\n\
                      <td>' + value.dispatch_no + '</td>\n\
                      <td>' + value.dispatch_date + '</td>\n\
                      <td>' + ddate + '</td>\n\
                      <td>' + value.status + '</td>\n\
                      ' + action_td + '\n\
                  </tr>';
        i = i + 1;
    });
    html += '</tbody>';

    if (status == 'dispatch') {
        $('#dispatch_payment_list').html(html);
        generateDataTable('dispatch_payment_list');
    }
    if (status == 'receive') {
        $('#recieved_payment_list').html(html);
        generateDataTable('recieved_payment_list');
    }
    if (status == 'mismatch') {
        $('#mismatch_payment_list').html(html);
        generateDataTable('mismatch_payment_list');
    }

}

