<?php include_once 'header.php';
if ($user_type != 'ADMIN') {
    echo '<script type="text/javascript">window.location.href="dashboard";</script>';
}
?>
<div class="main-panel ">
    <div class="content-wrapper "><div class="row grid-margin">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <a href="create-new-dispatch" class="btn btn-gradient-primary">Create New Dispatch</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="card-title mb-4">Dispatch List</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 customTabs">
                                <ul class="nav nav-pills nav-pills-custom diff-color" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link bg_dispatch bg_pending active" id="pills-dispatch-tab" data-toggle="pill" href="#pills-dispatch" role="tab" aria-controls="pills-dispatch" aria-selected="true">Dispatched </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link bg_recieved bg_approved" id="pills-recieve-tab" data-toggle="pill" href="#pills-recieve" role="tab" aria-controls="pills-recieve" aria-selected="false">Recieved </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link bg_mismatched bg_rejected" id="pills-mismatch-tab" data-toggle="pill" href="#pills-mismatch" role="tab" aria-controls="pills-mismatch" aria-selected="false">Mismatched </a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                                <div class="tab-content tab-content-custom-pill" id="pills-tabContent" style="overflow:auto;">
                                    <div class="tab-pane fade show active" id="pills-dispatch" role="tabpanel" aria-labelledby="pills-dispatch-tab">
                                        <table class="table table-striped payment_request" id="dispatch_payment_list"></table>
                                    </div>
                                    <div class="tab-pane fade" id="pills-recieve" role="tabpanel" aria-labelledby="pills-recieve-tab">
                                        <table class="table table-striped payment_request" id="recieved_payment_list"></table>
                                    </div>
                                    <div class="tab-pane fade" id="pills-mismatch" role="tabpanel" aria-labelledby="pills-mismatch-tab">
                                        <table class="table table-striped payment_request" id="mismatch_payment_list"></table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <?php include_once 'footer.php'; ?>
    <script src="<?php echo $home_url; ?>assets/javascript/distributor/admin_distributor_dispatch.js"></script>