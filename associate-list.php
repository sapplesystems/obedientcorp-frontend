<?php
include_once 'header.php';
if ($user_type != 'ADMIN') {
    echo '<script type="text/javascript">window.location.href="dashboard";</script>';
}
?>
<!-- partial -->
<style>
    .custom_overflow{overflow:auto;}
    .custom_overflow table tr th:last-child, .custom_overflow table tr td:last-child{white-space: nowrap !important; width:200px;}
    #associate_order_list{min-width: 1200px;}
</style>
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                </div>
                <div class="clearfix"></div>
                <div class="card">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-4">Associate List</h4>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label class="float-left col-form-label mr-3">Select KYC Status :</label>
                                <div class="col-sm-3 float-left">
                                    <select class="form-control" id="kyc_status_dd">
                                        <option value="">Select</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Submitted">Submitted</option>
                                        <option value="Approved">Approved</option>
                                        <option value="Rejected">Rejected</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="overflowAuto custom_overflow">
                            <table class="table table-bordered custom_action agents_list" id="associate_order_list"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <?php include_once 'footer.php'; ?>
    <script src="assets/javascript/agent_list.js"></script>