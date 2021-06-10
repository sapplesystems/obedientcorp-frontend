<?php
include_once 'header.php';
$dist_id = '';
if (isset($_REQUEST['dist_id'])) {
    $dist_id = $_REQUEST['dist_id'];
}
?>
<style>
    #sales-report-detail tr td:last-child {
        white-space: nowrap !important;
    }

    #posInvoice .modal-dialog {
        max-width: 1300px;
		margin-top: 30px;
    }

    #posInvoice .js-cart-items {
        display: grid !important;
    }

    #posInvoice .modal-header {
        border-bottom: 1px solid #dee2e6 !important;
        padding-bottom: 15px;
        padding-top: 15px;
    }
	
	#posInvoice .modal-content{background-color: #fff;}
	.productContainerBody{min-height: 282px !important;}

    .cd-popup {
        z-index: 9999;
    }

    @media only screen and (max-width: 480px) {
        #posInvoice .js-cart-items {
            display: block !important;
        }
    }
</style>
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $home_url; ?>assets/javascript/distributor/css/all.css" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $home_url; ?>assets/javascript/distributor/css/flatpickr.css" />
<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3 space-m">
                        <h4 class="card-title mb-4">Invoice Report Detail</h4>
                        <div class="form-group row">
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

                            <div class="col-sm-12 text-right mt-4">
                                <button type="button" class="btn btn-gradient-danger" onclick="CancelSalesReport();">Cancel</button><button type="submit" class="btn btn-gradient-success ml-2" onclick="searchSalesReportDetail();">Search</button>
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
                        <h4 class="card-title mb-4">Invoice List</h4>
                        <div class="overflowAuto">
                            <table class="table table-bordered custom_action sales-report-detail " id="sales-report-detail">
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 mt-4 text-right">
                <button type="button" class="btn btn-gradient-info" onclick="exportTableToExcel();">Download Excel</button><button type="button" class="btn btn-gradient-success ml-2" onclick="print();">Print</button>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- POS POPUP-->
    <div class="modal fade" id="posInvoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Invoice Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="global-viewport" class='global-viewport m-pikabu-viewport'>
                        <div class="global-viewport-container m-pikabu-container">
                            <div id="mainContent" role="main" class="content" tabindex="-1">

                                <!-- Report any requested source code -->

                                <!-- Report the active source code -->

                                <div class="responsiveCenteredContent js-cart">
                                    <div class="notEmptyCarPromo">
                                    </div>
                                    <div class="shoppingCartContainer mt-0 mb-0">
                                        <!-- Start of cart's first part -->
                                        <div class="js-cart-items">
                                            <div class="cartProductsContainer cx-copy">
                                                <form class="forms-sample" id="dist-payment-form" name="dist-payment-form" method="post">
                                                    <div class="top_info">
                                                        <div>Customer Phone</div>
                                                        <div><input type="text" id="search-customer" name="search_customer" placeholder="Customer Phone Number" class="required" readonly /></div>
                                                        <div>
                                                            <button type="submit" class="btn btn-gradient-primary mr-2" id="dist-payment-submit">Search</button>
                                                            <div id="associate-name">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </form>
                                                <div class="clearfix"></div>
                                                <div>
                                                    <div class="mb-7">
                                                        <input class="width40" type="text" placeholder="Search Items..." id="search-item" readonly />
                                                    </div>
                                                </div>
                                                <div class="scrollOverflow" id="items">
                                                    <div class="columnHeads">
                                                        <div class="columnHeadsRow">
                                                            <div class="columnCell column1 titleItems"></div>
                                                            <div class="columnCell column1 titleItems">
                                                                <h1 class="text-uppercase">Item Name</h1>
                                                            </div>
                                                            <div class="columnCell column1 titleItems">
                                                                <h1 class="text-uppercase">Product Code</h1>
                                                            </div>
                                                            <div class="columnCell column3 titleQuantity">
                                                                <h6 class="quantity text-uppercase">Qty</h6>
                                                            </div>
                                                            <div class="columnCell column1 titleQuantity">
                                                                <h6 class="quantity text-uppercase">Price/Qty</h6>
                                                            </div>
                                                            <div class="columnCell column4 titleTotalPrice">
                                                                <h6 class="totalPrice text-uppercase">Total</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <ul class="productContainerBody" id="item-list">
                                                    </ul>

                                                    <div class="columnHeads bt-None" id="subtotal_div">
                                                        <div class="columnHeadsRow">
                                                            <div class="columnCell column1 titleItems"></div>
                                                            <div class="columnCell column1 titleItems">
                                                                <h1 class="fontNormal">Subtotal</h1>
                                                            </div>
                                                            <div class="columnCell column1 titleItems">
                                                                <h1 class="fontNormal"></h1>
                                                            </div>
                                                            <div class="columnCell column1 titleItems">
                                                                <h1 class="fontNormal"></h1>
                                                            </div>
                                                            <div class="columnCell column3 titleQuantity">
                                                                <h6 class="quantity fontNormal"></h6>
                                                            </div>
                                                            <div class="columnCell column4 titleTotalPrice">
                                                                <h6 class="totalPrice fontNormal">&#8377;<span id="subTotal-amount">0.00</span></h6>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="columnHeads taxDiv" id="tax_div">
                                                        <div class="columnHeadsRow">
                                                            <div class="columnCell column1 titleItems"></div>
                                                            <div class="columnCell column1 titleItems">
                                                                <h1 class="fontNormal">Tax</h1>
                                                            </div>
                                                            <div class="columnCell column1 titleItems">
                                                                <h1 class="fontNormal"></h1>
                                                            </div>
                                                            <div class="columnCell column1 titleItems">
                                                                <h1 class="fontNormal"></h1>
                                                            </div>
                                                            <div class="columnCell column3 titleQuantity">
                                                                <h6 class="quantity fontNormal"></h6>
                                                            </div>
                                                            <div class="columnCell column4 titleTotalPrice">
                                                                <h6 class="totalPrice fontNormal">&#8377;<span id="total-tax">0.00</span></h6>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="columnHeads">
                                                        <div class="columnHeadsRow">
                                                            <div class="columnCell column1 titleItems"></div>
                                                            <div class="columnCell column1 titleItems">
                                                                <h1>Total</h1>
                                                            </div>
                                                            <div class="columnCell column1 titleItems">
                                                                <h1></h1>
                                                            </div>
                                                            <div class="columnCell column1 titleItems">
                                                                <h1></h1>
                                                            </div>
                                                            <div class="columnCell column3 titleQuantity">
                                                                <h6 class="quantity"></h6>
                                                            </div>
                                                            <div class="columnCell column4 titleTotalPrice">
                                                                <h6 class="totalPrice">&#8377;<span id="total-amount">0.00</span></h6>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="cart-footer">
                                                <p class="Date_format" id="today_date"></p>
                                                <div class="cart-footer-main">
                                                    <div class="cart-footer-table totalsTbl">
                                                        <div class="clearfix subTotal">
                                                            <div class="js-cost cost"><span id="orderSubTotal" role="alert" aria-live="assertive">TOTAL DUE: &#8377;<span id="totalPayment">0.00</span></span><span class="due_amount">BALANCE DUE: &#8377;<span id="due_payment">0.00</span></span></div>
                                                        </div><span data-cid="jibbitz-choking-hazard-message"></span>
                                                        <div class="minHeightCoupon">
                                                            <dl class="js-cx-accordion cx-accordion js-cx-accordion-no-hash" id="coupons">
                                                                <dt><a href="#" class="promotionsHeader">Shopping Card</a></dt>
                                                                <dd class="is-closed">
                                                                    <div class="cx-copy clearfix js-coupon coupon">
                                                                        <div id="couponField" aria-labelledby="promo-accordion-link" class="couponField ">
                                                                            <table class="tableWidth" id="coupon-data">
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </dd>
                                                            </dl>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="cartNav cartNavBottom js-cartNavBottom">
                                                    <div class="cartNavButtons">
                                                        <div class="btn_action">
                                                            <a href="javascript:void(0);" class="cd-popup-trigger">Pay Cash</a>&nbsp;
                                                            <a href="javascript:void(0);" class="cd-popup-trigger add-coupon">Apply Coupon</a>&nbsp;
                                                            <a href="javascript:void(0);" class="cd-popup-trigger m-mt-10 verify-coupon">Verify Coupon OTP</a>
                                                        </div>
                                                        <span class="line-seperate "></span>
                                                        <button id="loginCheckout" class="btn_placeOrder cx-button bgBTN-cancel full-width text-bold" type="button" name="" value="true" onclick="CancelInvoice();"><span>CANCEL</span></button>
                                                        <button id="loginCheckout" class="btn_placeOrder cx-button bgBTN full-width text-bold ml2Percent" type="button" name="" value="true" onclick="printInvoice();"><span>PRINT</span></button>
                                                        <input type="hidden" id="generated_invoice_id" value="" />
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="sales_notes marginTop10">
                                                    <label>Sale Notes</label>
                                                    <textarea id="sale-note"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- ====================== snippet ends here ======================== -->

                                    </div>
                                </div>

                                <div class="clear"></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Popup-->
    <?php include_once 'footer.php'; ?>
    <!-- Js for download excel-->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <!-- Js for download excel-->
    <script src="<?php echo $home_url; ?>assets/javascript/distributor/admin-inventory-report.js"></script>
    <script>
        var distributor_id = "<?php echo $dist_id; ?>";
        searchSalesReportDetail();
        // for sales report
        function searchSalesReportDetail() {
            showLoader();
            var start_date = '';
            var end_date = '';
            var item_id = '';
            var category_id = '';
            if ($('#start-date').val() != '') {
                start_date = $('#start-date').val();
            }
            if ($('#end-date').val() != '') {
                end_date = $('#end-date').val();
            }
            if ($('#item-id').val() != '') {
                item_id = $('#item-id').val();
            }
            if ($('#categories').val() != '') {
                category_id = $('#categories').val();
            }
            var params = {
                distributor_id: distributor_id,
                category_id: category_id,
                product_id: item_id,
                start_date: start_date,
                end_date: end_date,
                is_admin: 1
            };
            var url = base_url + 'distributor/sales-report';
            $.ajax({
                url: url,
                type: 'post',
                data: params,
                success: function(response) {
                    var html = '<thead>\n\
                              <tr>\n\
                              <th>Sr.No</th>\n\
                              <th>Distributor Name</th>\n\
                              <th>Invoice Number</th>\n\
                              <th>Invoice Date & Time</th>\n\
                              <th>Total Amount</th>\n\
                              <th>Tax Amount</th>\n\
                              <th>Cash Amount</th>\n\
                              <th>Coupon Amount</th>\n\
                              <th class="salesDetail">Action</th>\n\
                              </tr>\n\
                              </thead><tbody>';
                    if (response.status == "success") {
                        if (response.data.length != 0) {
                            var i = 1;
                            $.each(response.data, function(key, value) {
                                html += '<tr id="tr_incoming_' + i + '" role="row" class="tr_incoming" >\n\
                                  <td>' + i + '</td>\n\
                                  <td>' + value.distributor_name + '</td>\n\
                                  <td>' + value.invoice_no + '</td>\n\
                                  <td>' + value.invoice_date_time + '</td>\n\
                                  <td>' + value.total_amount + '</td>\n\
                                  <td>' + value.tax_amount + '</td>\n\
                                  <td>' + value.cash_amount + '</td>\n\
                                  <td>' + value.coupon_amount + '</td>\n\
                                  <td><a class="btn btn-gradient-primary btn-sm salesDetail" href="javascript:void(0)" onclick="getSalesDetail(' + value.invoice_id + ');">Item Detail</a></td>\n\
                              </tr>';
                                i = i + 1;
                            });
                            html += '</tbody>';
                            $('#sales-report-detail').html(html);
                            $('#sales-report-detail').DataTable().destroy();
                            $('#sales-report-detail').DataTable({
                                dom: 'Blfrtip',
                                buttons: [{
                                    extend: 'excelHtml5',
                                    title: 'SalesReportDetail' + Date.now(),
                                    text: 'Export to Excel',
                                    exportOptions: {
                                    columns: [0,1, 2, 3,4,5,6,7]
                                  }
                                }],
                                aaSorting: []
                            });
                            $('.dt-button').removeClass().addClass('btn btn-info ml-2 download-excel');
                            $('.download-excel').css('display', 'none');
                            hideLoader();
                        }
                    } else {
                        $('#sales-report-detail').html(html);
                        $('#sales-report-detail').DataTable().destroy();
                        $('#sales-report-detail').DataTable();
                        hideLoader();
                    }

                }
            });

        }

        function CancelSalesReport() {
            $('#start-date').val('');
            $('#end-date').val('');
            $('#item-id').val('');
            $('#categories').val('');
            $('#search-product').val('');
            $('#distributor').val('');
            searchSalesReportDetail();
        }

        function exportTableToExcel() {
            $('.download-excel').click();

        }

        function print() {
            var tab = document.getElementById('sales-report-detail');
            var win = window.open('', '', 'height=700,width=700');
            win.document.write("<style> th:nth-child(9){display:none;} </style>");
            win.document.write("<style> td:nth-child(9){display:none;} </style>");
            win.document.write(tab.outerHTML);
            win.document.close();
            win.print();

        }

        function printInvoice() {
            /*var tab = document.getElementById('posInvoice');
            var win = window.open('', '', 'height=800,width=800');
            win.document.write(tab.outerHTML);
            win.document.close();
            win.print();*/
            var invoice_id = $('#generated_invoice_id').val();
            if (invoice_id) {
                var win = window.open('distributor/print-invoice.php?invoice_id=' + invoice_id, '', 'height=1000,width=1000');
            }
        }

        function getSalesDetail(id) {
            $('#search-customer').val('');
            $('#associate-name').html('');
            $('#subTotal-amount').html('');
            $('#total-tax').html('');
            $('#total-amount').html('');
            $('#totalPayment').html('');
            $('#coupon-data').html('');
            $('#item-list').html('');
            $('#sale-note').val('');
            $('#today_date').html('');
            var url = base_url + 'distributor/sales-report-detail';
            $.ajax({
                url: url,
                type: 'post',
                data: {
                    invoice_id: id
                },
                success: function(response) {
                    var html = '';
                    var coupon_html = '';
                    var cash_html = '';
                    if (response.status == 'success') {
                        $('#search-customer').val(response.data.customer_mobile);
                        $('#associate-name').html('<span id="associate_name" data-value="' + response.data.id + '" class="editable">' + response.data.customer_name + '</span>  <span></span>');
                        $('#subTotal-amount').html(response.data.subtotal_amount);
                        $('#total-tax').html(response.data.tax);
                        $('#total-amount').html(response.data.total_amount);
                        $('#totalPayment').html(response.data.total_amount);
                        if (response.data.sale_note) {
                            $('#sale-note').val(response.data.sale_note);
                        }

                        $.each(response.data.item, function(key, value) {
                            html += '<li class="js-productContainer productContainer products"data-pid="204592-066-M11" data-pidmaster="204592">\n\
                            <div class="productContainerRow">\n\
                                <div class="columnCell column1 productImage text-center"><i style="cursor:pointer;" class="fa fa-trash-o trash_icon"></i></div>\n\
                                <div class="columnCell column1 productImage text-left"><span  tabindex="-1" aria-hidden="true">' + value.name + '</span></div>\n\
                                <div class="columnCell column2 productDetails">\n\
                                    <div class="">\n\
                                        <p><span>' + value.code + '</span></p>\n\
                                        <p>Lot: ' + value.lot_no + '</p>\n\
                                    </div>\n\
                                </div>\n\
                                <div class="columnCell column4 productQuantity">\n\
                                    <form>\n\
                                        <div class="value-button" value="Decrease Value"><i class="fa fa-minus"></i></div>\n\
                                        <input type="number" value="' + value.quantity + '" />\n\
                                        <div class="value-button" value="Increase Value"><i class="fa fa-plus"></i></div>\n\
                                    </form>\n\
                                </div>\n\
                                <div class="columnCell column2">\n\
                                    <div class="price">\n\
                                        <div class="text-gray-dark cx-heavy-brand-font mt3">' + value.price + '</div>\n\
                                    </div>\n\
                                </div>\n\
                                <div class="columnCell column2 productPriceTotal">\n\
                                    <div class="price">\n\
                                        <div class="text-gray-dark cx-heavy-brand-font mt3 total_pay">' + value.total + '</div>\n\
                                    </div>\n\
                                </div>\n\
                            </div>\n\
                            <div class="clear hidden-lg"></div>\n\
                        </li>';
                        });

                        if (response.data.coupon.length > 0) {
                            $.each(response.data.coupon, function(key, value) {
                                coupon_html += '<tr class="coupon_tot_amount">\n\
                                            <td width="8%">\n\
                                                <i style="cursor:pointer;" class="fa fa-trash-o trash_icon"></i>\n\
                                            </td>\n\
                                            <td width="62%">CODE: ' + value.code + '</td>\n\
                                            <td width="30%" class="text-right"><strong>&#8377;<span> ' + value.amount + ' </span></strong></td>\n\
                                        </tr>';
                            });
                            $('#coupon-data').append(coupon_html);

                        }
                        if (response.data.cash_amount != '') {
                            cash_html += '<tr class="coupon_tot_amount">\n\
                                    <td width="8%"><i style="cursor:pointer;" class="fa fa-trash-o trash_icon"></i></td>\n\
                                    <td width="62%">CASH:</td>\n\
                                    <td width="30%" class="text-right"><strong>&#8377;<span> ' + response.data.cash_amount + '</span></strong></td>\n\
                                </tr>';
                            $('#coupon-data').append(cash_html);
                        }
                        $('#item-list').append(html);
                        $('#today_date').html(response.data.created_at);
                        $('#generated_invoice_id').val(id);
                        $('#posInvoice').modal('show');

                    }

                }
            });
        }
    </script>