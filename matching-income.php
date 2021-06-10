<?php
include_once 'header.php';
?>
<!-- partial -->
<style>
    .custom_overflow{overflow:auto;}
    .custom_overflow table tr th:last-child, .custom_overflow table tr td:last-child{white-space: nowrap !important; width:200px !important}
</style>
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row">
            <div class="col-md-12 customTabs">
                <ul class="nav nav-pills nav-pills-custom diff-color" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link bg_pending active" id="pills-weekly-tab" data-toggle="pill" href="#pills-weekly" role="tab" aria-controls="pills-weekly" aria-selected="true"> Weekly </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link bg_approved" id="pills-detail-tab" data-toggle="pill" href="#pills-detail" role="tab" aria-controls="pills-detail" aria-selected="false"> Detail </a>
                    </li>
                </ul>
                <div class="clearfix"></div>
                <div class="tab-content tab-content-custom-pill" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-weekly" role="tabpanel" aria-labelledby="pills-weekly-tab">
                        <div class="row">
                            <div class="col-12">
                                <?php if ($user_type == 'ADMIN') { ?>
                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            <label>Associate ID</label>
                                            <select class="form-control" id="agent_id"></select>
                                        </div>
                                        <div class="col-sm-3 mt-20-m">
                                            <label>Week</label>
                                            <select class="form-control" id="week_range">
                                                <option value="">Select Week</option>
                                            </select>
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="clearfix"></div>
                                <div class="card">
                                    <div class="card-body p-3 custom_overflow">
                                        <h4 class="card-title mb-4">Weekly Matching Income</h4>
                                        <div class="overflowAuto">
                                            <table class="table table-bordered custom_action" id="payout_history"></table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-detail" role="tabpanel" aria-labelledby="pills-detail-tab">
                        <div class="row">
                            <div class="col-12 marginLR-m">
                                <div class="form-group row">
                                    <?php if ($user_type == 'ADMIN') { ?>
                                        <div class="col-sm-3">
                                            <label>Associate ID</label>
                                            <select class="form-control" id="agent_list"></select>
                                        </div>
                                    <?php } ?>
                                    <div class="col-sm-3 pr-0">
                                        <label>Start Date:</label>
                                        <div class="input-group date datepicker p-0">
                                            <input type="text required" class="form-control required" id="start-date" name="start-date" placeholder="From" readonly>
                                            <span class="input-group-addon input-group-append border-left">
                                                <span class="mdi mdi-calendar input-group-text bg-dark"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 pr-0">
                                        <label>End Date:</label>
                                        <div class="input-group date datepicker p-0">
                                            <input type="text required" class="form-control required" id="end-date" name="end-date" placeholder="To" readonly>
                                            <span class="input-group-addon input-group-append border-left">
                                                <span class="mdi mdi-calendar input-group-text bg-dark"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 pr-0">
                                        <label class="d-block">&nbsp;</label>
                                        <input type="button" class="btn btn-gradient-success" id="search_matching" name="search_matching" value="Search" />
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="card">
                                    <div class="card-body p-3">
                                        <h4 class="card-title mb-4">Matching Income Details</h4>
                                        <div class="overflowAuto custom_overflow">
                                            <table class="table table-bordered custom_action" id="matching_income_listing"></table>
                                        </div>
                                    </div>
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

    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="assets/javascript/matching_income.js"></script>