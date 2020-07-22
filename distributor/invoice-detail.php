<?php
include_once 'header-copy.php';
if (empty($_SESSION['distributor_login_resp']['id']) || $_SESSION['distributor_login_resp']['id'] == '') {
    echo '<script type="text/javascript">window.location.href = "login";</script>';
    exit;
}
?>
<style>
    #item-detail-popup .cd-popup-container {
        max-width: 1300px;
		margin-top: 20px;
    }

    #item-detail-popup .cd-popup-content {
        padding: 20px;
    }
	.distributor_info > div:first-child, .distributor_info > div:nth-child(3){width:15%;}
.distributor_info > div:nth-child(3){width:15%; margin-left:10%;}
</style>
<div class="main-content"> 
        <section class="section">
    <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
				<div class="card-header">
					 <h4>Invoice Detail</h4>
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
                            <div class="distributor_info marginTop10 text-right">
                                <button id="loginCheckout" class="btn btn-light" type="button" name="" value="true" onclick="CancelInvoiceDetail();"><span>Clear</span></button><button id="loginCheckout" class="btn btn-dark ml-2" type="button" name="" value="true" id="generate-invoice" onclick="getInvoiceDetail();"><span>Search</span></button>
                            </div>
                            <div class="clear_both"></div>
                            <div class="marginTop20">
                                <div><strong>Items List:</strong> </div>
								<div class="scroll-m">
                                <table class="table_recieved" cellpadding="0" cellspacing="0" width="100%" id="invoice-detail">
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
        <div class="cd-popup-content">
		<div class="scroll-m">
            <table class="table_recieved" cellpadding="0" cellspacing="0" width="100%" id="item-detail">
            </table>
			</div>
        </div>
        <a class="btn btn-info mb-4" href="javascript:void(0);" onclick="exportTableToExcelOnPopup();">Download Excel</a>
    </div>
</div>
<!-- content-wrapper ends -->
<?php include_once 'footer-copy.php'; ?>
<script src="https://cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
<script>
    var example = flatpickr('#start-date');
    var example1 = flatpickr('#end-date');

    getInvoiceDetail();

    function getInvoiceDetail() {
        showLoader();
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
                                <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Sr.No</th>\n\
                                <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Invoice Number</th>\n\
                                <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Invoice Date & Time</th>\n\
                                <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Customer Name</th>\n\
                                <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Customer Mobile No</th>\n\
                                <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Total Amount</th>\n\
                                <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Tax Amount</th>\n\
                                <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Cash Amount</th>\n\
                                <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Coupon Amount</th>\n\
                                <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;" class="invoiceDetail">Action</th>\n\
                                </tr>\n\
                                </thead><tbody>';
                if (response.status == "success") {
                    if (response.data.length != 0) {
                        var i = 1;
                        $.each(response.data, function(key, value) {
                            html += '<tr id="tr_' + value.id + '" role="row" >\n\
                                    <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + i + '</td>\n\
                                    <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + value.invoice_no + '</td>\n\
                                    <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + value.invoice_date_time + '</td>\n\
                                    <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + value.customer_name + '</td>\n\
                                    <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + value.customer_mobile + '</td>\n\
                                    <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + value.total_amount + '</td>\n\
                                    <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + value.tax_amount + '</td>\n\
                                    <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + value.cash_amount + '</td>\n\
                                    <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + value.coupon_amount + '</td>\n\
                                    <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">\n\
                                        <a style="background-color: #191d21;border-color: #191d21;color: #fff;white-space: nowrap;border-radius: .2rem;text-align: center;vertical-align: middle;width: 50px;height: 28px;line-height: 28px;text-decoration:none;font-size: 12px;padding:0px;display:inline-block;"  class="btn btn-dark btn-sm invoiceDetail" href="javascript:void(0);" onclick="itemDetail(' + value.id + ');">Details</a>\n\
                                    </td>\n\
                                </tr>';
                            i = i + 1;
                        });
                        html += '</tbody>';
                        $('#invoice-detail').html(html);
                        $('#invoice-detail').DataTable().destroy();
                        $('#invoice-detail').DataTable({
                            dom: 'Blfrtip',
                            buttons: [{
                                extend: 'excelHtml5',
                                title: 'invoice-detail' + Date.now(),
                                text: 'Export to Excel',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5, 6,7,8]
                                }
                            }],
                            aaSorting: []
                        });
                        $('.dt-button').removeClass().addClass('btn btn-info ml-2 download-excel');
                        $('.download-excel').css('display', 'none');
                        hideLoader();
                    }
                } else {
                    $('#invoice-detail').html(html);
                    $('#invoice-detail').DataTable().destroy();
                    $('#invoice-detail').DataTable();
                    hideLoader();
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
                            <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Sr.No</th>\n\
                            <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Invoice Number</th>\n\
                            <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Invoice Date & Time</th>\n\
                            <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Customer Name</th>\n\
                            <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Customer Mobile No</th>\n\
                            <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Total Amount</th>\n\
                            <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Tax Amount</th>\n\
                            <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Cash Amount</th>\n\
                            <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Coupon Amount</th>\n\
                            <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Category Name</th>\n\
                            <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Item Name</th>\n\
                            <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Item Code</th>\n\
                            <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">BV Type</th>\n\
                            <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Quantity</th>\n\
                            <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Price</th>\n\
                            <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Total Price</th>\n\
                            </tr>\n\
                        </thead><tbody>';
                $('#item-detail').html('');
                if (response.status == "success") {
                    var invoice_data = response.data.invoice[0];
                    if (response.data.length != 0) {
                        var i = 1;
                        $.each(response.data.invoice_items, function(key, value) {
                            console.log(value);
                            items += '<tr id="item_' + i + '" role="row">\n\
                                     <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + i + '</td>\n\
                                     <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + invoice_data.invoice_no + '</td>\n\
                                     <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + invoice_data.invoice_date_time + '</td>\n\
                                     <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + invoice_data.customer_name + '</td>\n\
                                     <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + invoice_data.customer_mobile + '</td>\n\
                                     <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + invoice_data.total_amount + '</td>\n\
                                     <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + invoice_data.tax_amount + '</td>\n\
                                     <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + invoice_data.cash_amount + '</td>\n\
                                     <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + invoice_data.coupon_amount + '</td>\n\
                                    <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + value.category_name + '</td>\n\
                                    <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + value.business_value + '</td>\n\
                                    <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + value.product_name + '</td>\n\
                                     <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + value.sku + '</td>\n\
                                     <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + value.quantity + '</td>\n\
                                     <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + value.price + '</td>\n\
                                     <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + value.item_total + '</td>\n\
                                     </tr>';
                                     
                                
                        });
                        items += '</tbody>';
                        $('#item-detail').html(items);
                        $('#item-detail-popup').addClass('is-visible');
                        $('#item-detail').DataTable().destroy();
                        $('#item-detail').DataTable({
                            dom: 'Blfrtip',
                            buttons: [{
                                extend: 'excelHtml5',
                                title: 'invoice-item-detail' + Date.now(),
                                text: 'Export to Excel',
                            }],
                            aaSorting: []
                        });
                        $('.dt-button').removeClass().addClass('btn btn-info ml-2 download-excel-item');
                        $('.download-excel-item').css('display', 'none');
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
        $('.download-excel').click();
    }

    function print() {
        var tab = document.getElementById('invoice-detail');
        var win = window.open('', '', 'height=700,width=700');
        win.document.write(tab.outerHTML);
        win.document.close();
        win.print();

    }
    function exportTableToExcelOnPopup() {
        $('.download-excel-item').click();
    }
</script>