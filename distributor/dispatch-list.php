<?php
include_once 'header-copy.php';
if (empty($_SESSION['distributor_login_resp']['id']) || $_SESSION['distributor_login_resp']['id'] == '') {
    echo '<script type="text/javascript">window.location.href = "login";</script>';
    exit;
}
?>
<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <a href="dispatch-generation" class="btn btn-gradient-primary">Create New Dispatch</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-4">Dispatch List</h4>
                        <div class="overflowAuto custom_overflow">
                            <table class="table table-bordered custom_action" id="dispatch-list">
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <?php include_once 'footer-copy.php'; ?>
    <script>
        getDispatchList();

        function getDispatchList() {
            showLoader();
            $.ajax({
                url: base_url + 'dispatch/list',
                type: 'post',
                data: {
                    distributor_id: distributor_id
                },
                success: function(response) {
                    var html = '<thead>\n\
                                <tr>\n\
                                <th>Sr.No.</th>\n\
                                    <th>Dispatch To</th>\n\
                                    <th>Dispatch Number</th>\n\
                                    <th>Dispatch Type</th>\n\
                                    <th>Date Of Dispatch</th>\n\
                                    <th>Date Of Received</th>\n\
                                    <th>Dispatch Amount</th>\n\
                                    <th>Status</th>\n\
                                    <th>Action</th>\n\
                                </tr>\n\
                            </thead><tbody>';
                    if (response.status == "success") {
                        var i = 1;
                        $.each(response.data, function(key, value) {
                            var action_td = '';
                            action_td = '<td>\n\
          <a href="dispatch-detail.php?dispatch_id=' + value.id + '&dist_id='+value.distributor_id_to+'" id="dispatch-detail" title="Dispatch detail"><i class="mdi mdi-open-in-new text-secondary"></i></a> \n\
                      </td>';
                            html += '<tr id="tr_' + value.id + '" role="row" >\n\
                              <td class="sorting_1">' + i + '</td>\n\
                              <td>' + value.distributor_name_to + '</td>\n\
                              <td>' + value.dispatch_no + '</td>\n\
                              <td>' + value.dispatch_type + '</td>\n\
                              <td>' + value.dispatch_date + '</td>\n\
                              <td>' + value.expected_delivery_date + '</td>\n\
                              <td>' + value.total + '</td>\n\
                              <td>' + value.status + '</td>\n\
                              ' + action_td + '\n\
                          </tr>';
                            i = i + 1;
                        });
                        html += '</tbody>';
                        $('#dispatch-list').html(html);
                        generateDataTable('dispatch-list');
                        hideLoader();
                    } else {
                        showSwal('error', 'NO Dispatch', response.data);
                        hideLoader();
                    }
                }
            });
        }
    </script>