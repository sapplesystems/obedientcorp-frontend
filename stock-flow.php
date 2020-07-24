<?php
include_once 'header.php';
?>
<style>
    #stock-flow tr td:last-child {
        white-space: nowrap !important;
    }

    #stock-flow-detail-modal .modal-dialog {
        max-width: 1320px;
    }
</style>
<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3 space-m">
                        <h4 class="card-title mb-4">Stock Flow</h4>
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
                        </div>
                        <div class="form-group row">
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

                            <div class="col-sm-12 text-right mt-4">
                                <button type="button" class="btn btn-gradient-danger" onclick="CancelSearchStockFlow();">Cancel</button><button type="submit" id="agent_form" class="btn btn-gradient-success ml-2" onclick="searchItemsStockFlow();">Search</button>
                            </div>
                        </div>
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
            <div class="col-sm-12 text-right mt-4">
                <button type="button" class="btn btn-gradient-info" onclick="exportTableToExcel();">Download Excel</button><button type="button" class="btn btn-gradient-success ml-2" onclick="print();">Print</button>
            </div>

        </div>


    </div>


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
                            <h4 class="card-title mb-4">Stock List</h4>
                            <div class="overflowAuto">
                                <table class="table table-bordered custom_action " id="stock-flow-detail">
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="text-right mt-4">
                        <button type="submit" class="btn btn-info" onclick="exportTableToExcelToModal();">Download Excel</button><button type="button" class="btn btn-success ml-2" onclick="printModal();">Print</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--end div-->

    <!-- content-wrapper ends -->
    <?php include_once 'footer.php'; ?>
    <!-- Js for download excel-->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <!-- Js for download excel-->
    <script src="<?php echo $home_url; ?>assets/javascript/distributor/admin-inventory-report.js"></script>
    <script>
        searchItemsStockFlow();

        function searchItemsStockFlow() {
            showLoader();
            var start_date = '';
            var end_date = '';
            var item_name = '';
            var category_id = '';
            var item_code = '';
            var lot_no = '';
            var qty = '';
            var distributor_id = '';
            var dispatch_type = '';
            if ($('#start-date').val() != '') {
                start_date = $('#start-date').val();
            }
            if ($('#end-date').val() != '') {
                end_date = $('#end-date').val();
            }
            if ($('#item-name').val() != '') {
                if ($('#distributor').val() == '') {
                    showSwal('error', 'Please Select Distributor');
                    $('#search-product').val('');
                }
                item_name = $('#item-name').val();
            }
            if ($('#categories').val() != '') {
                category_id = $('#categories').val();
            }
            if ($('#item-code').val() != '') {
                item_code = $('#item-code').val();
            }
            if ($('#lot-no').val() != '') {
                lot_no = $('#lot-no').val();
            }
            if ($('#qty').val() != '') {
                qty = $('#qty').val();
            }
            if ($('#distributor').val() != '') {
                distributor_id = $('#distributor').val();
            }
            if ($('#dispatch-type').val() != '') {
                dispatch_type = $('#dispatch-type').val();
            }
            var params = {
                distributor_id: distributor_id,
                category_id: category_id,
                product_name: item_name,
                qty: qty,
                lot_no: lot_no,
                start_date: start_date,
                end_date: end_date,
                item_code: item_code,
                is_admin: 1,
                dispatch_type: dispatch_type,
                stock_flow: 1,
            };
            var url = base_url + 'distributor/current-stock';
            $.ajax({
                url: url,
                type: 'post',
                data: params,
                success: function(response) {
                    var html = '<thead>\n\
                              <tr>\n\
                              <th>Sr.No</th>\n\
                              <th>Distributor Name</th>\n\
                              <th>Category</th>\n\
                              <th>Item Code</th>\n\
                              <th>Item Name</th>\n\
                              <th>BV Type</th>\n\
                              <th>Date</th>\n\
                              <th>Lot No</th>\n\
                              <th>Qty</th>\n\
                              <th>In</th>\n\
                              <th>Out</th>\n\
                              <th class="stockDetail">Action</th>\n\
                              </tr>\n\
                              </thead><tbody>';
                    if (response.status == "success") {
                        if (response.data.length != 0) {
                            var i = 1;
                            var lotNumber = '';
                            $.each(response.data, function(key, value) {
                                var lot_no_outgoing = '-';
                                lotNumber = value.lot_no;
                                if (value.lot_no != 0 && value.lot_no != null) {
                                    lot_no_outgoing = value.lot_no;
                                }
                                html += '<tr id="tr_outgoing_' + i + '" role="row" class="tr_outgoing" >\n\
                     <td>' + i + '</td>\n\
                     <td>' + value.distributor_name + '</td>\n\
                    <td>' + value.category_name + '</td>\n\
                    <td>' + value.sku + '</td>\n\
                    <td>' + value.product_name + '</td>\n\
                    <td>' + value.bv_type + '</td>\n\
                    <td>' + value.date + '</td>\n\
                    <td>' + lot_no_outgoing + '</td>\n\
                    <td>' + value.inventory_quantity + '</td>\n\
                    <td>' + value.total_in + '</td>\n\
                    <td>' + value.total_out + '</td>\n\
                    <td><a class="btn btn-gradient-primary btn-sm stockDetail" href="javascript:void(0)" onclick="getStockFlowDetail(' + distributor_id + ',' + value.product_id + ',\'' + lotNumber + '\');"id="detail_' + i + '">Item Detail</a></td>\n\
                    </tr>';
                                i = i + 1;
                            });

                            $('#stock-flow').html(html);
                            $('#stock-flow').DataTable().destroy();
                            $('#stock-flow').DataTable({
                                dom: 'Blfrtip',
                                buttons: [{
                                    extend: 'excelHtml5',
                                    title: 'StockFlow' + Date.now(),
                                    text: 'Export to Excel',
                                    exportOptions: {
                                    columns: [0,1, 2, 3,4,5,6,7,8,9,10]
                                  }
                                }],
                                aaSorting: []
                            });
                            $('.dt-button').removeClass().addClass('btn btn-info ml-2 download-excel');
                            $('.download-excel').css('display', 'none');
                            hideLoader();
                        }
                    } else {
                        //showSwal('error',response.data);
                        $('#stock-flow').html(html);
                        $('#stock-flow').DataTable().destroy();
                        $('#stock-flow').DataTable();
                        hideLoader();
                    }

                }
            });
        } //end function

        function CancelSearchStockFlow() {
            $('#start-date').val('');
            $('#end-date').val('');
            $('#item-name').val('');
            $('#categories').val('');
            $('#item-code').val('');
            $('#lot-no').val('');
            $('#qty').val('');
            $('#type').val('');
            $('#search-product').val('');
            $('#distributor').val('');
            searchItemsStockFlow();
        }

        function exportTableToExcel() {
            $('.download-excel').click();

        }

        function print() {
            var tab = document.getElementById('stock-flow');
            var win = window.open('', '', 'height=700,width=700');
            win.document.write("<style> th:nth-child(12){display:none;} </style>");
            win.document.write("<style> td:nth-child(12){display:none;} </style>");
            win.document.write(tab.outerHTML);
            win.document.close();
            win.print();

        }

        function exportTableToExcelToModal() {
            $('.download-excel-item').click();

        }

        function printModal() {
            var tab = document.getElementById('stock-flow-detail');
            var win = window.open('', '', 'height=700,width=700');
            win.document.write(tab.outerHTML);
            win.document.close();
            win.print();

        }
    </script>