<?php
include_once 'header.php';
if ($user_type != 'ADMIN') {
    echo '<script type="text/javascript">window.location.href="dashboard";</script>';
}
?>

<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="card-title mb-4">Request List for Money</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 customTabs">
                                <ul class="nav nav-pills nav-pills-custom" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-pending-tab" data-toggle="pill" href="#pills-pending" role="tab" aria-controls="pills-pending" aria-selected="true"> Pending </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-approve-tab" data-toggle="pill" href="#pills-approve" role="tab" aria-controls="pills-approve" aria-selected="false"> Approved </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-reject-tab" data-toggle="pill" href="#pills-reject" role="tab" aria-controls="pills-reject" aria-selected="false"> Rejected </a>
                                    </li>
                                </ul>
                                <div class="form-group">
                                    <label class="col-form-label float-left mr-3">Associate ID</label>
                                    <div class="float-left">
                                        <select class="form-control" id="agent-list" onchange="getAgentPaymentList(this.value);">
                                        </select>
                                    </div>
                                </div>
                                <div class="tab-content tab-content-custom-pill" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-pending" role="tabpanel" aria-labelledby="pills-pending-tab">
                                        <table class="table table-striped payment_request" id="pending_payment_list"></table>
                                    </div>
                                    <div class="tab-pane fade" id="pills-approve" role="tabpanel" aria-labelledby="pills-approve-tab">
                                        <table class="table table-striped payment_request" id="approved_payment_list"></table>
                                    </div>
                                    <div class="tab-pane fade" id="pills-reject" role="tabpanel" aria-labelledby="pills-reject-tab">
                                        <table class="table table-striped payment_request" id="reject_payment_list"></table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <?php include_once 'footer.php'; ?>
            <script src="assets/javascript/add_money_to_wallet.js"></script>