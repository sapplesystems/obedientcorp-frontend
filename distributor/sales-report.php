<?php
include_once 'header-copy.php';
if (empty($_SESSION['distributor_login_resp']['id']) || $_SESSION['distributor_login_resp']['id'] == '') {
    echo '<script type="text/javascript">window.location.href = "login";</script>';
    exit;
}
?>
<style>
    .distributor_info>div:first-child,
    .distributor_info>div:nth-child(3) {
        width: 15%;
    }

    .distributor_info>div:nth-child(3) {
        width: 15%;
        margin-left: 10%;
    }

    #lot_numbers_popup .cd-popup-container {
        max-width: 520px;
    }

    #lot_numbers_content>p {
        display: inline-block;
        padding-top: 0px;
        padding-bottom: 20px;
        width: 49%;
        text-align: left;
    }

    #lot_numbers_content>p label {
        font-weight: bold;
    }

    .flatpickr-calendar {
        left: initial;
        right: 0;
    }

    #lot_numbers_content {
        text-align: left;
    }

    .modal.fade {
        opacity: 1 !important;
    }

    #posInvoice .modal-dialog {
        max-width: 1300px;
    }

    #posInvoice .js-cart-items {
        display: grid !important;
    }

    #posInvoice .modal-header {
        border-bottom: 1px solid #dee2e6 !important;
        padding-bottom: 15px;
        padding-top: 15px;
    }

    .cd-popup {
        z-index: 9999;
    }

    @media only screen and (max-width: 480px) {
        #posInvoice .js-cart-items {
            display: block !important;
        }
    }
</style>
<div class="main-content">
    <section class="section">
        <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Invoice Report</h4>
                    </div>
                    <div class="card-body">
                        <div id="global-viewport" class='global-viewport m-pikabu-viewport'>
                            <div class="global-viewport-container m-pikabu-container">
                                <div id="mainContent" role="main" class="content" tabindex="-1">
                                    <!-- Report any requested source code -->

                                    <!-- Report the active source code -->
                                    <div class="responsiveCenteredContent js-cart">
                                        <div class="shoppingCartContainer mt-0">
                                            <!-- Start of cart's first part -->
                                            <div>
                                                <h2 class="headTop"><?php echo $name . '(' . $username . ')'; ?></h2>
                                                <div class="">
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
                                                        <div><strong>Category:</strong> </div>
                                                        <div><select id="categories"><select></div>
                                                        <div><strong>Items:</strong> </div>
                                                        <div>
                                                            <input type="text" id="search-product" name="search_product" value="">
                                                            <input type="hidden" id="item-id" value="" />
                                                        </div>
                                                    </div>
                                                    <div class="clear_both"></div>
                                                    <div class="distributor_info mt-4 text-right">
                                                        <button id="loginCheckout" class="btn btn-light" type="button" name="" value="true" onclick="CancelSalesReport();"><span>Clear</span></button><button id="loginCheckout" class="btn btn-dark ml-2" type="button" name="" value="true" id="generate-invoice" onclick="searchSalesReport();"><span>Search</span></button>
                                                    </div>
                                                    <div class="clear_both"></div>
                                                    <div class="marginTop20">
                                                        <div><strong>Items List:</strong> </div>
                                                        <div class="scroll-m">
                                                            <table class="table_recieved" cellpadding="0" cellspacing="0" width="100%" id="sales-report" style="border: #ebebeb 1px solid;">
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="">
                                                </div>
                                            </div>
                                            <div class="clear_both"></div>
                                            <div class="mt-20-items">
                                                <a class="btn btn-warning" href="dashboard">Back</a><a class="btn btn-info ml-2" href="javascript:void(0);" onclick="exportTableToExcel();">Download Excel</a><a class="btn btn-success ml-2" href="javascript:void(0);" onclick="print();">Print</a>
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
    </section>
</div>
<div class="cd-popup" role="alert" id="item-detail-popup">
    <div class="cd-popup-container">
        <h3 class="headPopup">Item Details<a href="#0" class="cd-popup-close img-replace">Close</a></h3>
        <table class="table_recieved" cellpadding="0" cellspacing="0" width="100%">

            <tbody id="item-detail">
            </tbody>
        </table>
    </div>
</div>

<!-- POS POPUP-->
<div class="modal fade" id="posInvoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Invoice Report</h5>
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
                                                        <a href="javascript:void(0);" class="cd-popup-trigger" id="pay-cash">Pay Cash</a>&nbsp;
                                                        <a href="javascript:void(0);" class="cd-popup-trigger add-coupon" id="add-coupon">Apply Coupon</a>&nbsp;
                                                        <a href="javascript:void(0);" class="cd-popup-trigger m-mt-10 verify-coupon" onclick="verifyCoupons();" id="verify-coupon">Verify Coupon OTP</a>
                                                    </div>
                                                    <span class="line-seperate "></span>
                                                    <button id="loginCheckout" class="btn_placeOrder cx-button bgBTN-cancel full-width text-bold" type="button" name="" value="true" onclick="CancelInvoice();"><span>CANCEL</span></button><button id="loginCheckout" class="btn_placeOrder cx-button bgBTN full-width text-bold ml2Percent" type="button" name="" value="true" onclick="printInvoice();"><span>PRINT</span></button>
                                                </div>
                                            </div>

                                            <div class="sales_notes">
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
<!-- content-wrapper ends -->
<?php include_once 'footer-copy.php'; ?>
<script src="https://cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
<script src="<?php echo $home_url; ?>assets/javascript/distributor/stock-flow.js"></script>
<script>
    var example = flatpickr('#start-date');
    var example1 = flatpickr('#end-date');
    searchSalesReport();

    function exportTableToExcel() {
        $('.download-excel').click();
    }

    function print() {
        var tab = document.getElementById('sales-report');
        var win = window.open('', '', 'height=700,width=700');
        win.document.write("<style> th:nth-child(9){display:none;} </style>");
        win.document.write("<style> td:nth-child(9){display:none;} </style>");
        win.document.write(tab.outerHTML);
        win.document.close();
        win.print();

    }

    function printInvoice()
    {
        var tab = document.getElementById('posInvoice');
        var win = window.open('', '', 'height=800,width=800');
        win.document.write(tab.outerHTML);
        win.document.close();
        win.print();

    }
    //function for sales report

    function searchSalesReport() {
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
        };
        var url = base_url + 'distributor/sales-report';
        $.ajax({
            url: url,
            type: 'post',
            data: params,
            success: function(response) {
                var html = '<thead>\n\
                                <tr>\n\
                                <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Sr.No</th>\n\
                                <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Invoice Number</th>\n\
                                <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Invoice Date & Time</th>\n\
                                <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Total Amount</th>\n\
                                <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Tax Amount</th>\n\
                                <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Cash Amount</th>\n\
                                <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Cash Note</th>\n\
                                <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Coupon Amount</th>\n\
                                <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;" class="salesDetail">Action</th>\n\
                                </tr>\n\
                                </thead><tbody>';
                if (response.status == "success") {
                    if (response.data.length != 0) {
                        var i = 1;
                        $.each(response.data, function(key, value) {
                            var cash_note = '';
                            if(value.cash_note!=null)
                            {
                                cash_note = value.cash_note;
                            }
                            html += '<tr id="tr_incoming_' + i + '" role="row" class="tr_incoming" >\n\
                                    <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + i + '</td>\n\
                                    <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + value.invoice_no + '</td>\n\
                                    <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + value.invoice_date_time + '</td>\n\
                                    <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + value.total_amount + '</td>\n\
                                    <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + value.tax_amount + '</td>\n\
                                    <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + value.cash_amount + '</td>\n\
                                    <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + cash_note + '</td>\n\
                                    <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + value.coupon_amount + '</td>\n\
                                    <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;"><a style="background-color: #191d21;border-color: #191d21;color: #fff;white-space: nowrap;border-radius: .2rem;text-align: center;vertical-align: middle;width: 50px;height: 28px;line-height: 28px;text-decoration:none;font-size: 12px;padding:0px;display:inline-block;" class="btn btn-dark btn-sm salesDetail" href="javascript:void(0)" onclick="getSalesDetail(' + value.invoice_id + ');"id="sales_detail_' + i + '">Details</a></td>\n\
                                </tr>';
                            i = i + 1;
                        });
                        html += '</tbody>';
                        $('#sales-report').html(html);
                        $('#sales-report').DataTable().destroy();
                        $('#sales-report').DataTable({
                        dom: 'Blfrtip',
                        buttons: [
                            {
                                extend: 'excelHtml5',
                                title: 'sales-report' + Date.now(),
                                text: 'Export to Excel',
                                exportOptions: {
                                    columns: [0,1, 2, 3,4,5,6]
                                  }
                            }
                        ],
                        aaSorting: []
                    });
                    $('.dt-button').removeClass().addClass('btn btn-info ml-2 download-excel');
                    $('.download-excel').css('display','none');
                    }
                } else {
                    html += '</tbody>';
                    $('#sales-report').html(html);
                    $('#sales-report').DataTable().destroy();
                    $('#sales-report').DataTable();
                    //showSwal('error', response.data);
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
        searchSalesReport();
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
                    $('#posInvoice').modal('show');

                }

            }
        });
    }

    function getCurrentDate() {
        var datetime = new Date();
        var day = datetime.getDate();
        day = (day < 10) ? '0' + day : day;
        var month = MonthArr[datetime.getMonth()];
        var year = datetime.getFullYear();
        var todays_date = day + "-" + month + "-" + year;
        var time = datetime.getHours() + ":" + datetime.getMinutes() + ":" + datetime.getSeconds();
        var current_date_time = todays_date + ' ' + time;
        return current_date_time;
    }
</script>