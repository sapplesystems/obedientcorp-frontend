<?php
include_once 'header.php';
if (empty($_SESSION['distributor_login_resp']['id']) || $_SESSION['distributor_login_resp']['id'] == '') {
    echo '<script type="text/javascript">window.location.href = "login";</script>';
    exit;
}
$product_id = 0;
$stock_date = '';
if (isset($_REQUEST['pro_id']) && isset($_REQUEST['stock_d'])) {
    $product_id = $_REQUEST['pro_id'];
    $stock_date = date('Y-m-d', strtotime($_REQUEST['stock_d']));
}
?>
<style>

</style>
<div id="global-viewport" class='global-viewport m-pikabu-viewport'>
    <div class="global-viewport-container m-pikabu-container">
        <div id="mainContent" role="main" class="content" tabindex="-1">
            <!-- Report any requested source code -->

            <!-- Report the active source code -->
            <div class="responsiveCenteredContent js-cart">
                <div class="shoppingCartContainer">
                    <h1 class="headTop">Stock Flow Detail</h1>
                    <!-- Start of cart's first part -->
                    <div>
                        <h2 class="headTop"><?php echo $name . '(' . $username . ')'; ?></h2>
                        <div class="left_sec">
                            <div class="distributor_info">
                                <div><strong>Start Date:</strong> </div>
                                <div>
                                    <div class="expected_input">
                                        <i class="fa fa-calendar icon_calendar" aria-hidden="true"></i>
                                        <input type="text" id="start-date" placeholder="Select Date" onchange="checkStartEndDate();">
                                    </div>
                                </div>
                                <div><strong>End Date:</strong> </div>
                                <div>
                                    <div class="expected_input">
                                        <i class="fa fa-calendar icon_calendar" aria-hidden="true"></i>
                                        <input type="text" id="end-date" placeholder="Select Date" onchange="checkStartEndDate();">
                                    </div>
                                </div>
                            </div>
                            <div class="clear_both"></div>
                            <div class="distributor_info marginTop10">
                                <div><strong>Items:</strong> </div>
                                <div>
                                    <input type="text" id="search-product" name="search_product" value="">
                                    <input type="hidden" id="item-name" value="" />
                                </div>
                                <div><strong>Item Code:</strong> </div>
                                <div>
                                    <input type="text" id="item-code" name="item_code" value="">
                                </div>
                            </div>
                            <div class="clear_both"></div>
                            <div class="distributor_info marginTop10">
                                <div><strong>Category:</strong> </div>
                                <div><select id="categories"><select></div>
                                <div><strong>Lot Number:</strong> </div>
                                <div><input type="text" id="lot-no" name="lot_no" value="" /></div>
                            </div>
                            <div class="clear_both"></div>
                            <div class="distributor_info marginTop10">
                                <button id="loginCheckout" class="btn_placeOrder cx-button bgBTN-cancel  text-bold marginTop20" type="button" name="" value="true" onclick="CancelSearch();"><span>Clear</span></button><button id="loginCheckout" class="btn_placeOrder cx-button bgBTN  text-bold ml2Percent marginTop20" type="button" name="" value="true" id="generate-invoice" onclick="searchItemsStock();"><span>Search</span></button>
                            </div>
                        </div>
                        <div class="clear_both"></div>
                        <div class="overflow_auto marginTop20">
                            <div><strong>Items List:</strong> </div>
                            <table class="table_recieved" cellpadding="0" cellspacing="0" width="100%" id="stock-flow-detail">
                            </table>
                        </div>
                    </div>
                    <div class="clear_both"></div>
                    <div class="mt-20-items">
                        <a class="btn-back-items" href="stock-flow">Back</a>
                        <a class="btn-back-items" href="javascript:void(0);" onclick="exportTableToExcel('stock-flow-detail','stock_flow_detail');">Download Excel</a>
                    </div>
                </div>
                <!-- ====================== snippet ends here ======================== -->
            </div>
        </div>

        <div class="clear"></div>
    </div>

</div>
</div>
<!-- content-wrapper ends -->
<?php include_once 'footer.php'; ?>
<script src="<?php echo $home_url; ?>assets/javascript/distributor/stock-flow.js"></script>
<script>
    var example = flatpickr('#start-date');
    var example1 = flatpickr('#end-date');
    var product_id = "<?php echo $product_id; ?>";
    var stock_date = "<?php echo $stock_date; ?>";
    getStockFlowDetail(product_id, stock_date);
    //function for show stock detail
    function getStockFlowDetail(product_id, stock_date) {
        var start_date = '';
        var end_date = '';
        var item_name = '';
        var category_id = '';
        var item_code = '';
        var lot_no = '';
        var qty = '';
        var view = 'all';
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
            date: stock_date
        };
        var url = base_url + 'distributor/stock-flow-detail';
        $.ajax({
            url: url,
            type: 'post',
            data: params,
            success: function(response) {
                console.log(response);
                if (response.status == "success") {
                    var html = '<thead>\n\
                                <tr>\n\
                                <th>Sr.No</th>\n\
                                <th>Dispatched To/By</th>\n\
                                <th>Customer Name</th>\n\
                                <th>Customer Mobile Number</th>\n\
                                <th>Dispatch Number</th>\n\
                                <th>Invoice Number</th>\n\
                                <th>Category</th>\n\
                                <th>Item Code</th>\n\
                                <th>Item Name</th>\n\
                                <th>Qty</th>\n\
                                <th>Batch</th>\n\
                                <th>BV Type</th>\n\
                                <th>Type</th>\n\
                                </tr>\n\
                                </thead><tbody>';
                    if (response.data.length != 0) {
                        var i = 1;
                        $.each(response.data, function(key, value) {
                            var lot_no_outgoing = value.lot_no;
                            var customer_name = '';
                            var customer_mobile = '';
                            var invoice_no = '';
                            var dispatch_no = '';
                            var dispatch_distributor = 'By-' + value.distributor_name + '';
                            if (value.lot_no == 0) {
                                lot_no_outgoing = '-';
                            }
                            if (value.customer_name && value.customer_mobile && value.invoice_no) {
                                customer_name = value.customer_name;
                                customer_mobile = value.customer_mobile;
                                invoice_no = value.invoice_no;
                            } else {
                                dispatch_no = value.dispatch_no;
                            }
                            if (value.by_distributor && value.to_distributor) {
                                dispatch_distributor = 'By-' + value.by_distributor + ' To-' + value.to_distributor;
                            }
                            html += '<tr id="tr_outgoing_' + i + '" role="row" class="tr_outgoing" >\n\
                                    <td>' + i + '</td>\n\
                                    <td>' + dispatch_distributor + '</td>\n\
                                    <td>' + customer_name + '</td>\n\
                                    <td>' + customer_mobile + '</td>\n\
                                    <td>' + dispatch_no + '</td>\n\
                                    <td>' + invoice_no + '</td>\n\
                                    <td>' + value.category_name + '</td>\n\
                                    <td>' + value.sku + '</td>\n\
                                    <td>' + value.product_name + '</td>\n\
                                    <td>' + value.quantity + '</td>\n\
                                    <td>' + lot_no_outgoing + '</td>\n\
                                    <td>' + value.bv_type + '</td>\n\
                                    <td>' + value.type + '</td>\n\
                                </tr>';
                            i = i + 1;
                        });
                        html += '</tbody>';
                        $('#stock-flow-detail').html(html);
                        $('#stock-flow-detail').DataTable().destroy();
                        $('#stock-flow-detail').DataTable();
                    } else {
                        $('#stock-flow-detail').html(html);
                        $('#stock-flow-detail').DataTable().destroy();
                        $('#stock-flow-detail').DataTable();
                    }
                }

            }
        });
    }

    function exportTableToExcel(tableID, filename = '') {
        var downloadLink;
        var dataType = 'application/vnd.ms-excel';
        var tableSelect = document.getElementById(tableID);
        var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

        // Specify file name
        filename = filename ? filename + '.xls' : 'excel_data.xls';

        // Create download link element
        downloadLink = document.createElement("a");

        document.body.appendChild(downloadLink);

        if (navigator.msSaveOrOpenBlob) {
            var blob = new Blob(['\ufeff', tableHTML], {
                type: dataType
            });
            navigator.msSaveOrOpenBlob(blob, filename);
        } else {
            // Create a link to the file
            downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

            // Setting the file name
            downloadLink.download = filename;

            //triggering the function
            downloadLink.click();
        }
    }
</script>