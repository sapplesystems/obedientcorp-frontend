<?php
include_once 'header.php';
?>
<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
                    <h4 class="card-title mb-4">Stock Flow</h4>
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
                        <label> Dispatch Type:</label>
                        <select id="dispatch-type" name="dispatch_type" class="form-control">
                            <option value="">--Select--</option>
                            <option value="">All</option>
                            <option value=" Fresh">Fresh</option>
                            <option value=" Normal">Normal</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label>Category:</label>
                        <select id="categories" name="categories" class="form-control">
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label>Lot Number:</label>
                        <input type="text" class="form-control" id="lot-no" name="lot_no" value="">
                    </div>
                    <div class="col-sm-3">
                        <label>Items:</label>
                        <input type="text" class="form-control" id="search-product" name="search_product" value="">
                        <input type="hidden" id="item-name" value="" />
                    </div>
                    <div class="col-sm-3">
                        <label>Item Code:</label>
                        <input type="text" class="form-control" placeholder="" id="item-code" name="item_code">
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
                        <button type="submit" id="agent_form" class="btn btn-gradient-success" onclick="searchItemsStockFlow();">Search</button>
                    </div>
                    <div class="col-sm-3">
                        <label class="d-block">&nbsp;</label>
                        <button type="button" class="btn btn-gradient-danger" onclick="CancelSearchStockFlow();">Cancel</button>
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
                            <table class="table table-bordered custom_action " id="stock-flow">
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <label class="d-block">&nbsp;</label>
                <button type="button" class="btn btn-gradient-success" onclick="exportTableToExcel();">Download Excel</button>
            </div>
            <div class="col-sm-3">
                <label class="d-block">&nbsp;</label>
                <button type="button" class="btn btn-gradient-success" onclick="print();">Print</button>
            </div>

        </div>


    </div>

    <div class="row mt-4">
        <div class="modal fade" id="stock-flow-detail-modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog payment-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Stock Flow Detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body p-3">
                                        <h4 class="card-title mb-4">Stock List</h4>
                                        <div class="overflowAuto">
                                            <table class="table table-bordered custom_action " id="stock-flow-detail">
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer text-center">
                            <button type="submit" class="btn btn-success" onclick="exportTableToExcelToModal();">Download Excel</button>
                            <button type="button" class="btn btn-success" onclick="printModal();">Print</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--end div-->
    </div>

    <!-- content-wrapper ends -->
    <?php include_once 'footer.php'; ?>
    <script src="https://cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
    <script src="<?php echo $home_url; ?>assets/javascript/distributor/admin-inventory-report.js"></script>
    <script>
        function exportTableToExcel() {
            $("#stock-flow").table2excel({
                filename: "StockFlow.xls"
            });

        }

        function print() {
            var tab = document.getElementById('stock-flow');
            var win = window.open('', '', 'height=700,width=700');
            win.document.write(tab.outerHTML);
            win.document.close();
            win.print();

        }

        function exportTableToExcelToModal() {
            $("#stock-flow-detail").table2excel({
                filename: "StockFlowDetail.xls"
            });

        }

        function printModal() {
            var tab = document.getElementById('stock-flow-detail');
            var win = window.open('', '', 'height=700,width=700');
            win.document.write(tab.outerHTML);
            win.document.close();
            win.print();

        }
    </script>