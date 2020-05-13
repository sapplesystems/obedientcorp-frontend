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
                        <input type="button" class="btn btn-info" id="search_matching" name="search_matching" value="Search" />&nbsp;
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="card">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-4">Matching Income</h4>
                        <div class="overflowAuto custom_overflow">
                            <table class="table table-bordered custom_action" id="matching_income_listing"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <?php include_once 'footer.php'; ?>
    <script src="assets/javascript/matching_income.js"></script>