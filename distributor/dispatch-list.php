<?php
include_once 'header-copy.php';
if (empty($_SESSION['distributor_login_resp']['id']) || $_SESSION['distributor_login_resp']['id'] == '') {
    echo '<script type="text/javascript">window.location.href = "login";</script>';
    exit;
}
?>
<!-- partial -->
<div class="main-content">
    <section class="section">
        <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="dispatch-generation" class="btn btn-dark">Create New Dispatch</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Dispatch List</h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-pills" id="myTab3" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link bg_pending active" id="home-tab3" data-toggle="tab" href="#dispatch" role="tab" aria-controls="home" aria-selected="true">Dispatched</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link bg_approved" id="profile-tab3" data-toggle="tab" href="#receive" role="tab" aria-controls="profile" aria-selected="false">Recieved</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link bg_rejected" id="contact-tab3" data-toggle="tab" href="#mismatch" role="tab" aria-controls="contact" aria-selected="false">Mismatched</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent2">
                            <div class="tab-pane fade show active" id="dispatch" role="tabpanel" aria-labelledby="home-tab3">
                                <div class="scroll-m mt-2">
                                    <table class="table table-bordered custom_action" id="dispatch-list">
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="receive" role="tabpanel" aria-labelledby="profile-tab3">
                                <div class="scroll-m mt-2">
                                    <table class="table table-bordered" id="recieve-list">
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="mismatch" role="tabpanel" aria-labelledby="contact-tab3">
                                <div class="scroll-m mt-2">
                                    <table class="table table-bordered" id="mismatch-list">
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
            success: function (response) {
                var head_html = '<thead>\n\
                                            <tr>\n\
                                                <th>Dispatch To</th>\n\
                                                <th>Dispatch Number</th>\n\
                                                <th>Dispatch Type</th>\n\
                                                <th>Date Of Dispatch</th>\n\
                                                <th>Date Of Received</th>\n\
                                                <th>Dispatch Amount</th>\n\
                                                <th>Status</th>\n\
                                                <th>Action</th>\n\
                                            </tr>\n\
                                        </thead>\n\
                                        <tbody >';
                var dispatch_html = head_html;
                var mismatch_html = head_html;
                var received_html = head_html;
                if (response.status == "success") {
                    $.each(response.data, function (key, value) {
                        var action_td = '';
                        action_td = '<td>\n\
                                    <a class="btn btn-dark btn-sm" href="dispatch-detail.php?dispatch_id=' + value.id + '&dist_id=' + value.distributor_id_to + '" id="dispatch-detail" title="Dispatch detail">Item Detail</a> \n\
                                    </td>';
                        if (value.status == 'Dispatched') {
                            dispatch_html += '<tr id="tr_' + value.id + '" role="row" >\n\
                                            <td>' + value.distributor_name_to + '</td>\n\
                                            <td>' + value.dispatch_no + '</td>\n\
                                            <td>' + value.dispatch_type + '</td>\n\
                                            <td>' + value.dispatch_date + '</td>\n\
                                            <td>' + value.expected_delivery_date + '</td>\n\
                                            <td>' + value.total + '</td>\n\
                                            <td>' + value.status + '</td>\n\
                                            ' + action_td + '\n\
                                        </tr>';


                        }
                        if (value.status == 'Mismatch') {
                            mismatch_html += '<tr id="tr_' + value.id + '" role="row" >\n\
                                            <td>' + value.distributor_name_to + '</td>\n\
                                            <td>' + value.dispatch_no + '</td>\n\
                                            <td>' + value.dispatch_type + '</td>\n\
                                            <td>' + value.dispatch_date + '</td>\n\
                                            <td>' + value.expected_delivery_date + '</td>\n\
                                            <td>' + value.total + '</td>\n\
                                            <td>' + value.status + '</td>\n\
                                            ' + action_td + '\n\
                                        </tr>';


                        }
                        if (value.status == 'Received') {
                            received_html += '<tr id="tr_' + value.id + '" role="row" >\n\
                                            <td>' + value.distributor_name_to + '</td>\n\
                                            <td>' + value.dispatch_no + '</td>\n\
                                            <td>' + value.dispatch_type + '</td>\n\
                                            <td>' + value.dispatch_date + '</td>\n\
                                            <td>' + value.expected_delivery_date + '</td>\n\
                                            <td>' + value.total + '</td>\n\
                                            <td>' + value.status + '</td>\n\
                                            ' + action_td + '\n\
                                        </tr>';


                        }

                    });
                    dispatch_html += '</tbody>';
                    mismatch_html += '</tbody>';
                    received_html += '</tbody>';
                    $('#dispatch-list').html(dispatch_html);
                    $('#mismatch-list').html(mismatch_html);
                    $('#recieve-list').html(received_html);
                    $('#dispatch-list').DataTable().destroy();
                    $('#dispatch-list').DataTable();
                    $('#mismatch-list').DataTable().destroy();
                    $('#mismatch-list').DataTable();
                    $('#recieve-list').DataTable().destroy();
                    $('#recieve-list').DataTable();
                    //generateDataTable('dispatch-list');
                    //generateDataTable('mismatch-list');
                    //generateDataTable('recieve-list');
                    hideLoader();
                } else {
                    dispatch_html += '</tbody>';
                    mismatch_html += '</tbody>';
                    received_html += '</tbody>';
                    $('#dispatch-list').html(dispatch_html);
                    $('#mismatch-list').html(mismatch_html);
                    $('#recieve-list').html(received_html);
                    $('#dispatch-list').DataTable().destroy();
                    $('#dispatch-list').DataTable();
                    $('#mismatch-list').DataTable().destroy();
                    $('#mismatch-list').DataTable();
                    $('#recieve-list').DataTable().destroy();
                    $('#recieve-list').DataTable();
                    hideLoader();
                }
            }
        });
    }
</script>