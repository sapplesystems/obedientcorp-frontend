<?php include_once 'header.php'; ?>
<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-4">Wallet History</h4>

                        <h3 class="mb-4">Available Balance: <span class="text-primary" id="available_wallet_balance" name="available_wallet_balance"></span></h3>
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
                                <label>Shopping Card:</label>
                                <select class="form-control required" id="trans_type2" name="trans_type2">
                                    <option value="">ALL</option>
                                    <option value="RS">Real Estate</option>
                                    <option value="FMCG">Consumer Goods</option>
                                </select>
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
                                <input type="button" class="btn btn-gradient-success" id="search_by_type" name="search_by_type" value="Search" />
                            </div>
                        </div>
                        <div class="overflowAuto">
                            <table class="table table-bordered custom_action" id="ewallet_list"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <?php include_once 'footer.php'; ?>
    <script src="assets/javascript/ewallet_history.js"></script>