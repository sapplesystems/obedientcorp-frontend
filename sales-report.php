<?php
include_once 'header.php';
?>
<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
                <h4 class="card-title mb-4">Sales Report</h4>
                </div>
            </div>
        </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label>Distributor:</label>
                            <select id="distributor" name="distributor" class="form-control">
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label>Category:</label>
                            <select id="categories" name="categories" class="form-control">
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label>Items:</label>
                            <input type="text" class="form-control" id="search-product" name="search_product" value="">
                            <input type="hidden" id="item-id" value="" />
                        </div>
                        <div class="col-sm-3">
                            <label>Start Date :</label>
                            <div class="input-group date datepicker p-0">
                                <input type="text" class="form-control required" id="start-date" name="start-date" onchange="checkStartEndDate();">
                                <span class="input-group-addon input-group-append border-left">
                                    <span class="mdi mdi-calendar input-group-text bg-dark"></span>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label>End Date :</label>
                            <div class="input-group date datepicker p-0">
                                <input type="text" class="form-control required" id="end-date" name="end-date" onchange="checkStartEndDate();">
                                <span class="input-group-addon input-group-append border-left">
                                    <span class="mdi mdi-calendar input-group-text bg-dark"></span>
                                </span>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <label class="d-block">&nbsp;</label>
                            <button type="submit"  class="btn btn-gradient-success" onclick="searchSalesReport();">Search</button>
                        </div>
                        <div class="col-sm-3">
                            <label class="d-block">&nbsp;</label>
                            <button type="button" class="btn btn-gradient-danger" onclick="CancelSalesReport();">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-4">Stock List</h4>
                        <div class="overflowAuto">
                            <table class="table table-bordered custom_action " id="sales-report">
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <!-- content-wrapper ends -->
    <?php include_once 'footer.php'; ?>
    <script src="<?php echo $home_url; ?>assets/javascript/distributor/admin-inventory-report.js"></script>