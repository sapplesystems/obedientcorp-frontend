<?php include_once 'header.php'; ?>
<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-4">Income History</h4>
                        <h3 class="card-title mb-4">Total Income: <span id="available_income_fund" name="available_income_fund"></span></h3>
                        <h3 class="card-title mb-4">Balance Income: <span id="balance_income_fund" name="balance_income_fund"></span></h3>
                        <?php if ($user_type == 'ADMIN') { ?>
                        <div class="form-group">
                            <label class="col-form-label float-left mr-3">Associate ID</label>
                            <div class="float-left col-md-3">
                                <select class="form-control" id="agent_list"></select>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="clearfix"></div>
                        <div class="form-group row col-sm-12 mt-4">
                            <label class="float-left col-form-label col-sm-1 pr-0 mt-3" style="display: none;">Filters :</label>
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
                            <div class="col-sm-2 pr-0">
                                <label>Type:</label>
                                <select class="form-control required" id="type" name="type">
                                    <option value="">ALL</option>
                                    <option value="Cr">Cr</option>
                                    <option value="Dr">Dr</option>
                                </select>
                            </div>
                            <div class="col-sm-2 pr-0">
                                <label class="d-block">&nbsp;</label>
                                <input type="button" class="btn btn-info" id="search_by_type" name="search_by_type" value="Search" />&nbsp;
                            </div>
                        </div>
                        
                        <div class="overflowAuto">
                            <table class="table table-bordered custom_action" id="income_fund_history_list"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <?php include_once 'footer.php'; ?>
    <script src="assets/javascript/income_fund_history.js"></script>