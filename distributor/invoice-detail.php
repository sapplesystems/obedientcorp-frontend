<?php
include_once 'header.php';
if (empty($_SESSION['distributor_login_resp']['id']) || $_SESSION['distributor_login_resp']['id'] == '') {
    echo '<script type="text/javascript">window.location.href = "login";</script>';
    exit;
}
?>
<style>
    #item-detail-popup .cd-popup-container {
        max-width: 1200px;
    }

    #item-detail-popup .cd-popup-content {
        padding: 20px;
    }
</style>

<div id="global-viewport" class='global-viewport m-pikabu-viewport'>
    <div class="global-viewport-container m-pikabu-container">
        <div id="mainContent" role="main" class="content" tabindex="-1">
            <!-- Report any requested source code -->

            <!-- Report the active source code -->
            <div class="responsiveCenteredContent js-cart">
                <div class="shoppingCartContainer">
                    <h1 class="headTop">Invoice Detail</h1>
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
                                <div><strong>Customer Name:</strong> </div>
                                <div><input type="text" id="name" name="name" value=""></div>
                                <div><strong>Mobile Number:</strong> </div>
                                <div>
                                    <input type="text" id="phone-no" name="phone_no" value="">
                                </div>
                            </div>
                            <div class="clear_both"></div>
                            <div class="distributor_info marginTop10">
                                <div><strong>Invoice Number:</strong> </div>
                                <div><input type="text" id="invoice-no" name="invoice_no" value=""></div>
                            </div>
                            <div class="clear_both"></div>
                            <div class="distributor_info marginTop10">
                                <button id="loginCheckout" class="btn_placeOrder cx-button bgBTN-cancel text-bold marginTop20" type="button" name="" value="true" onclick="CancelInvoiceDetail();"><span>Clear</span></button><button id="loginCheckout" class="btn_placeOrder cx-button bgBTN  text-bold ml2Percent marginTop20" type="button" name="" value="true" id="generate-invoice" onclick="getInvoiceDetail();"><span>Search</span></button>
                            </div>
                            <div class="clear_both"></div>
                            <div class="overflow_auto marginTop20">
                                <div><strong>Items List:</strong> </div>
                                <table class="table_recieved" cellpadding="0" cellspacing="0" width="100%" id="invoice-detail">
                                </table>
                            </div>
                        </div>
                        <div class="right_sec">
                        </div>
                    </div>
                    <div class="clear_both"></div>
                    <div class="mt-20-items">
                        <a class="btn-back-items" href="dashboard">Back</a>
                        <a class="btn-back-items" href="javascript:void(0);" onclick="exportTableToExcel();">Download Excel</a>
                        <a class="btn_placeOrder cx-button bgBTN" href="javascript:void(0);" onclick="print();">Print</a>
                    </div>
                </div>
                <!-- ====================== snippet ends here ======================== -->
            </div>
        </div>

        <div class="clear"></div>
    </div>

</div>
</div>
<div class="cd-popup" role="alert" id="item-detail-popup">
    <div class="cd-popup-container">
        <h3 class="headPopup">Item Details<a href="#0" class="cd-popup-close img-replace">Close</a></h3>
        <div class="cd-popup-content">
            <table class="table_recieved" cellpadding="0" cellspacing="0" width="100%" id="item-detail">
            </table>
        </div>
    </div>
</div>
<!-- content-wrapper ends -->
<?php include_once 'footer.php'; ?>
<script src="https://cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
<script>
    var example = flatpickr('#start-date');
    var example1 = flatpickr('#end-date');

    getInvoiceDetail();

    function getInvoiceDetail() {
        var start_date = '';
        var end_date = '';
        var customer_name = '';
        var customer_phoneno = '';
        var invoice_no = '';
        if ($('#start-date').val() != '') {
            start_date = $('#start-date').val();
        }
        if ($('#end-date').val() != '') {
            end_date = $('#end-date').val();
        }
        if ($('#name').val() != '') {
            customer_name = $('#name').val();
        }
        if ($('#phone-no').val() != '') {
            customer_phoneno = $('#phone-no').val();
        }
        if ($('#invoice-no').val() != '') {
            invoice_no = $('#invoice-no').val();
        }
        var params = {
            distributor_id: distributor_id,
            customer_mobile: customer_phoneno,
            customer_name: customer_name,
            start_date: start_date,
            end_date: end_date,
            invoice_no: invoice_no
        };
        var url = base_url + 'distributor/invoice-detail';
        $.ajax({
            url: url,
            type: 'post',
            data: params,
            success: function(response) {
                var html = '<thead>\n\
                                <tr>\n\
                                <th>Sr.No</th>\n\
                                <th>Invoice Number</th>\n\
                                <th>Invoice Date & Time</th>\n\
                                <th>Customer Name</th>\n\
                                <th>Customer Mobile No</th>\n\
                                <th>Total Amount</th>\n\
                                <th>Tax Amount</th>\n\
                                <th>Cash Amount</th>\n\
                                <th>Coupon Amount</th>\n\
                                <th></th>\n\
                                </tr>\n\
                                </thead><tbody>';
                if (response.status == "success") {
                    if (response.data.length != 0) {
                        var i = 1;
                        $.each(response.data, function(key, value) {
                            html += '<tr id="tr_' + value.id + '" role="row" >\n\
                                    <td>' + i + '</td>\n\
                                    <td>' + value.invoice_no + '</td>\n\
                                    <td>' + value.invoice_date_time + '</td>\n\
                                    <td>' + value.customer_name + '</td>\n\
                                    <td>' + value.customer_mobile + '</td>\n\
                                    <td>' + value.total_amount + '</td>\n\
                                    <td>' + value.tax_amount + '</td>\n\
                                    <td>' + value.cash_amount + '</td>\n\
                                    <td>' + value.coupon_amount + '</td>\n\
                                    <td>\n\
                                        <a href="javascript:void(0);" onclick="itemDetail(' + value.id + ');">Item Details</a>\n\
                                    </td>\n\
                                </tr>';
                            i = i + 1;
                        });
                        html += '</tbody>';
                        $('#invoice-detail').html(html);
                        $('#invoice-detail').DataTable();
                    }
                } else {
                    $('#invoice-detail').html(html);
                    $('#invoice-detail').DataTable();
                }

            }
        });
    }

    function CancelInvoiceDetail() {
        $('#start-date').val('');
        $('#end-date').val('');
        $('#name').val('');
        $('#phone-no').val('');
        $('#invoice-no').val('')
        getInvoiceDetail();
    }

    function itemDetail(invoice_id) {
        var url = base_url + 'distributor/invoice-items-detail ';
        $.ajax({
            url: url,
            type: 'post',
            data: {
                invoice_id: invoice_id
            },
            success: function(response) {
                var items = '<thead>\n\
                            <tr>\n\
                            <th>Sr.No</th>\n\
                            <th>Invoice Number</th>\n\
                            <th>Invoice Date & Time</th>\n\
                            <th>Customer Name</th>\n\
                            <th>Customer Mobile No</th>\n\
                            <th>Total Amount</th>\n\
                            <th>Tax Amount</th>\n\
                            <th>Cash Amount</th>\n\
                            <th>Coupon Amount</th>\n\
                            <th>Category Name</th>\n\
                            <th>Item Name</th>\n\
                            <th>Item Code</th>\n\
                            <th>BV Type</th>\n\
                            <th>Quantity</th>\n\
                            <th>Price</th>\n\
                            <th>Total Price</th>\n\
                            </tr>\n\
                        </thead><tbody>';
                $('#item-detail').html('');
                if (response.status == "success") {
                    console.log(response);
                    if (response.data.length != 0) {
                        var i = 1;
                        $.each(response.data.invoice, function(key, value) {
                            console.log(value);
                            items += '<tr id="item_' + i + '" role="row">\n\
                                     <td>' + i + '</td>\n\
                                     <td>' + value.invoice_no + '</td>\n\
                                     <td>' + value.invoice_date_time + '</td>\n\
                                     <td>' + value.customer_name + '</td>\n\
                                     <td>' + value.customer_mobile + '</td>\n\
                                     <td>' + value.total_amount + '</td>\n\
                                     <td>' + value.tax_amount + '</td>\n\
                                     <td>' + value.cash_amount + '</td>\n\
                                     <td>' + value.coupon_amount + '</td>';
                        });
                        $.each(response.data.invoice_items, function(key, value) {
                            console.log(value);
                            items += '<td>' + value.category_name + '</td>\n\
                                    <td>' + value.business_value + '</td>\n\
                                    <td>' + value.product_name + '</td>\n\
                                     <td>' + value.sku + '</td>\n\
                                     <td>' + value.quantity + '</td>\n\
                                     <td>' + value.price + '</td>\n\
                                     <td>' + value.item_total + '</td>\n\
                                     </tr>';
                                     
                                
                        });
                        items += '</tbody>';
                        $('#item-detail').html(items);
                        $('#item-detail-popup').addClass('is-visible');
                        $('#item-detail').DataTable().destroy();
                        $('#item-detail').DataTable();
                    }
                } else {
                    items += '</tbody>';
                    $('#item-detail').html(items);
                    $('#item-detail-popup').addClass('is-visible');
                    $('#item-detail').DataTable().destroy();
                    $('#item-detail').DataTable();
                }

            }
        });
    }
    jQuery(document).ready(function($) {
        //close popup
        $('.cd-popup').on('click', function(event) {
            if ($(event.target).is('.cd-popup-close') || $(event.target).is('.cd-popup')) {
                event.preventDefault();
                $(this).removeClass('is-visible');
            }
        });
    });

    function exportTableToExcel() {
        $("#invoice-detail").table2excel({
            filename: "invoice_detail.xls"
        });
    }

    function print() {
        var tab = document.getElementById('invoice-detail');
        var win = window.open('', '', 'height=700,width=700');
        win.document.write(tab.outerHTML);
        win.document.close();
        win.print();

    }
</script>