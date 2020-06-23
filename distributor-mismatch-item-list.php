<?php include_once 'header.php';
if ($user_type != 'ADMIN') {
    echo '<script type="text/javascript">window.location.href="dashboard";</script>';
}
?>
<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-4">Distributor Mismatch List</h4>
                        <div class="overflowAuto">
                            <table class="table table-bordered custom_action" id="mismatchitem-list">
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <?php include_once 'footer.php'; ?>
    <script type="text/javascript">
        getMismatchItemList();

        function getMismatchItemList() {
            showLoader();
            $.ajax({
                url: base_url + 'admin/statustype-list',
                type: 'post',
                data: {
                    status: 'Mismatch'
                },
                success: function(response) {
                    var html = '<thead>\n\
                                <tr>\n\
                                <th>Sr.No.</th>\n\
                                <th>Dispatch By</th>\n\
                                <th>Received By</th>\n\
                                <th>Dispatch Number</th>\n\
                                <th>Date Of Dispatch</th>\n\
                                <th>Date Of Received</th>\n\
                                <th>Action</th>\n\
                                </tr>\n\
                                </thead><tbody>';
                    if (response.status == "success") {
                        console.log(response);
                        var i = 1;
                        $.each(response.data, function(key, value) {
                            console.log(value);
                            var action_td = '';
                            action_td = '<td>\n\
          <a href="distributor-dispatch-detail.php?dispatch_id=' + value.id + '&dist_id='+value.distributor_id_to+'" id="dispatch-detail" title="Mismatch detail"><i class="mdi mdi-open-in-new text-secondary"></i></a> \n\
                      </td>';
                            html += '<tr id="tr_' + value.id + '" role="row" >\n\
                              <td class="sorting_1">' + i + '</td>\n\
                              <td>' + value.distributor_name_from + '</td>\n\
                              <td>' + value.distributor_name_to + '</td>\n\
                              <td>' + value.dispatch_no + '</td>\n\
                              <td>' + value.dispatch_date + '</td>\n\
                              <td>' + value.expected_delivery_date + '</td>\n\
                              ' + action_td + '\n\
                          </tr>';
                            i = i + 1;
                        });
                        html += '</tbody>';
                        $('#mismatchitem-list').html(html);
                        generateDataTable('mismatchitem-list');
                        hideLoader();
                    } else {
                        showSwal('error', 'no record found');
                        hideLoader();
                    }
                }
            });
        }
    </script>