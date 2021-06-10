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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Return Items List</h4>
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
                                    <table class="table table-bordered custom_action">
                                        <thead>
                                            <tr>
                                                <th>Dispatch By</th>
                                                <th>Dispatch Type</th>
                                                <th>Dispatch Date</th>
                                                <th>Dispatch Number</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="dispatch-list">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="receive" role="tabpanel" aria-labelledby="profile-tab3">
                                <div class="scroll-m mt-2">
                                    <table class="table table-bordered custom_action" >
                                    <thead>
                                            <tr>
                                                <th>Dispatch By</th>
                                                <th>Dispatch Type</th>
                                                <th>Dispatch Date</th>
                                                <th>Dispatch Number</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="recieve-list">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="mismatch" role="tabpanel" aria-labelledby="contact-tab3">
                                <div class="scroll-m mt-2">
                                    <table class="table table-bordered custom_action" >
                                    <thead>
                                            <tr>
                                                <th>Dispatch By</th>
                                                <th>Dispatch Type</th>
                                                <th>Dispatch Date</th>
                                                <th>Dispatch Number</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="mismatch-list">
                                        </tbody>
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
<script type="text/javascript">
    getItemRecievedList();

    function getItemRecievedList() {
        showLoader();
        $.ajax({
            url: base_url + 'recieve/list',
            type: 'post',
            data: {
                distributor_id: distributor_id,
                dispatch_type: 'Return',
            },
            success: function(response) {

                if (response.status == "success") {
                    var dispatch_html = '';
                    var mismatch_html = '';
                    var received_html = '';
                    $.each(response.data, function(key, value) {
                        if (value.status == 'Dispatched') {
                            dispatch_html += '<tr id="tr_' + value.id + '" role="row" >\n\
                                                <td>' + value.distributor_name_from + '</td>\n\
                                                <td>' + value.dispatch_type + '</td>\n\
                                                <td>' + value.dispatch_date + '</td>\n\
                                                <td>' + value.dispatch_no + '</td>\n\
                                                <td>' + value.status + '</td>\n\
                                                <td>\n\
                                                    <a class="btn btn-dark btn-sm" href="dispatch-item-received.php?dispatch_id=' + value.id + '" id="dispatch-detail" title="Recieved Items">Item Detail</a> \n\
                                                </td>\n\
                                            </tr>';

                        }
                        if (value.status == 'Mismatch') {
                            mismatch_html += '<tr id="tr_' + value.id + '" role="row" >\n\
                                                <td>' + value.distributor_name_from + '</td>\n\
                                                <td>' + value.dispatch_type + '</td>\n\
                                                <td>' + value.dispatch_date + '</td>\n\
                                                <td>' + value.dispatch_no + '</td>\n\
                                                <td>' + value.status + '</td>\n\
                                                <td>\n\
                                                <a class="btn btn-dark btn-sm" href="dispatch-detail.php?dispatch_id=' + value.id + '&dist_id=' + value.distributor_id_to + '" id="dispatch-detail" title="Items Detail">Item Detail</a> \n\
                                                </td>\n\
                                            </tr>';

                        }
                        if (value.status == 'Received') {
                            received_html += '<tr id="tr_' + value.id + '" role="row" >\n\
                                                <td>' + value.distributor_name_from + '</td>\n\
                                                <td>' + value.dispatch_type + '</td>\n\
                                                <td>' + value.dispatch_date + '</td>\n\
                                                <td>' + value.dispatch_no + '</td>\n\
                                                <td>' + value.status + '</td>\n\
                                                <td>\n\
                                                <a class="btn btn-dark btn-sm" href="dispatch-detail.php?dispatch_id=' + value.id + '&dist_id=' + value.distributor_id_to + '" id="dispatch-detail" title="Items Detail">Item Detail</a> \n\
                                                </td>\n\
                                            </tr>';

                        }
                    });
                    $('#dispatch-list').html(dispatch_html);
                    $('#mismatch-list').html(mismatch_html);
                    $('#recieve-list').html(received_html);
                    initDataTable('dispatch-list');
                    initDataTable('mismatch-list');
                    initDataTable('recieve-list');
                    hideLoader();
                } else {
                    showSwal('error', 'There is no return list for this Distributor');
                    hideLoader();
                }
            }
        });
    }
</script>