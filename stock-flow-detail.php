<?php
include_once 'header.php';
$product_id = 0;
$stock_date = 0;
if (isset($_REQUEST['pro_id']) && isset($_REQUEST['stock_d'])) {
    $product_id = $_REQUEST['pro_id'];
    $stock_date = date('Y-m-d', strtotime($_REQUEST['stock_d']));
}
?>
<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
                    <h4 class="card-title mb-4">Stock Flow Detail</h4>
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
                        <label>Type:</label>
                        <select id="type" name="type" class="form-control">
                            <option value="">--Select--</option>
                            <option value="all">All</option>
                            <option value="incoming">Incoming </option>
                            <option value="outgoing">Outgoing</option>
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
                            <table class="table table-bordered custom_action " id="stock-flow-detail">
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <a href="stock-flow" class="btn btn-gradient-danger">Back</a>
        </div>
    </div>

    <!-- content-wrapper ends -->
    <?php include_once 'footer.php'; ?>
    <script src="<?php echo $home_url; ?>assets/javascript/distributor/admin-inventory-report.js"></script>
    <script>
        var product_id = "<?php echo $product_id; ?>";
        var stock_date = "<?php echo $stock_date; ?>";
        getStockFlowDetail(product_id, stock_date);
        //function for show stock detail
        function getStockFlowDetail(product_id, stock_date) {
            showLoader();
            var start_date = '';
            var end_date = '';
            var item_name = '';
            var category_id = '';
            var item_code = '';
            var lot_no = '';
            var qty = '';
            var view = 'all';
            var distributor_id = '';
            var dispatch_type = '';
            if ($('#start-date').val() != '') {
                start_date = $('#start-date').val();
            }
            if ($('#end-date').val() != '') {
                end_date = $('#end-date').val();
            }
            if ($('#item-name').val() != '') {
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
            if ($('#type').val() == 'incoming') {
                view = 'incoming';
            }
            if ($('#type').val() == 'outgoing') {
                view = 'outgoing';
            }
            if ($('#distributor').val() != '') {
                distributor_id = $('#distributor').val();
            }
            if ($('#dispatch-type').val() != '') {
                dispatch_type = $('#dispatch-type').val();
            }
            var params = {
                dispatch_detail: 1,
                distributor_id: distributor_id,
                category_id: category_id,
                product_name: item_name,
                qty: qty,
                lot_no: lot_no,
                start_date: start_date,
                end_date: end_date,
                item_code: item_code,
                view: view,
                product_id: product_id,
                date: stock_date,
                is_admin:1,
            };
            console.log(params)
            var url = base_url + 'distributor/stock-flow';
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
                                <th>Qty</th>\n\
                                </tr>\n\
                                </thead><tbody>';
                    if (response.status == "success") {
                        if (response.data.incoming_stock.length != 0 || response.data.outgoing_stock.length != 0) {
                            var i = 1;
                            if (response.data.incoming_stock.length != 0) {
                                $.each(response.data.incoming_stock, function(key, value) {
                                    html += '<tr id="tr_incoming_' + i + '" role="row" class="tr_incoming" >\n\
                                    <td>' + i + '</td>\n\
                                    <td>'+ value.distributor_name + '</td>\n\
                                    <td>' + value.category_name + '</td>\n\
                                    <td>' + value.sku + '</td>\n\
                                    <td>' + value.product_name + '</td>\n\
                                    <td>' + value.bv_type + '</td>\n\
                                    <td>' + value.date + '</td>\n\
                                    <td>' + value.quantity + '</td>\n\
                                </tr>';
                                    i = i + 1;
                                });
                            }
                            if (response.data.outgoing_stock.length != 0) {
                                $.each(response.data.outgoing_stock, function(key, value) {
                                    html += '<tr id="tr_outgoing_' + i + '" role="row" class="tr_outgoing" >\n\
                                    <td>' + i + '</td>\n\
                                    <td>'+ value.distributor_name + '</td>\n\
                                    <td>' + value.category_name + '</td>\n\
                                    <td>' + value.sku + '</td>\n\
                                    <td>' + value.product_name + '</td>\n\
                                    <td>' + value.bv_type + '</td>\n\
                                    <td>' + value.date + '</td>\n\
                                    <td>' + value.quantity + '</td>\n\
                                </tr>';
                                    i = i + 1;
                                });
                            }
                            html += '</tbody>';
                            $('#stock-flow-detail').html(html);
                            generateDataTable('stock-flow-detail');
                            hideLoader();
                        } else {
                            $('#stock-flow-detail').html(html);
                            generateDataTable('stock-flow-detail');
                            hideLoader();
                        }
                    }

                }
            });
        }
    </script>