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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-4">Recieved Items List</h4>
                        <div class="overflowAuto">
                            <table class="table table-bordered custom_action" id="recieve-list">
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
    <script type="text/javascript">
        getItemRecievedList();

        function getItemRecievedList() {
            showLoader();
            $.ajax({
                url: base_url + 'recieve/list',
                type: 'post',
                data: {
                    distributor_id: distributor_id
                },
                success: function(response) {
                    var html = '<thead>\n\
                                <tr>\n\
                                <th>Sr.No.</th>\n\
                                <th>Dispatch By</th>\n\
                                <th>Dispatch Type</th>\n\
                                <th>Dispatch Date</th>\n\
                                <th>Dispatch Number</th>\n\
                                <th>Status</th>\n\
                                <th>Action</th>\n\
                                </tr>\n\
                                </thead><tbody>';
                    if (response.status == "success") {
                        var i = 1;
                        $.each(response.data, function(key, value) {
                            var action_td = '';
                            if (value.status == 'Dispatched' || value.status =='Mismatch') // || value.status =='Mismatch' 
                            {
                                action_td = '<td>\n\
                                        <a href="dispatch-item-received.php?dispatch_id=' + value.id + '" id="dispatch-detail" title="Recieved Items"><i class="mdi mdi-open-in-new text-secondary"></i></a> \n\
                                        </td>';
                            } else { //if(value.status == 'Received')
                                action_td = '<td>\n\
                                        <a href="recieved-item-detail.php?dispatch_id=' + value.id + '" id="dispatch-detail" title="Items Detail"><i class="mdi mdi-open-in-new text-secondary"></i></a> \n\
                                        </td>';
                            }

                            html += '<tr id="tr_' + value.id + '" role="row" >\n\
                              <td class="sorting_1">' + i + '</td>\n\
                              <td>' + value.distributor_name_from + '</td>\n\
                              <td>' + value.dispatch_type + '</td>\n\
                              <td>' + value.dispatch_date + '</td>\n\
                              <td>' + value.dispatch_no + '</td>\n\
                              <td>' + value.status + '</td>\n\
                              ' + action_td + '\n\
                          </tr>';
                            i = i + 1;
                        });
                        html += '</tbody>';
                        $('#recieve-list').html(html);
                        generateDataTable('recieve-list');
                        hideLoader();
                    }
                    else
                    {
                        showSwal('error', response.data);
                        hideLoader();
                    }
                }
            });
        }
    </script>