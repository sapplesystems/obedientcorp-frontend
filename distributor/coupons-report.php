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
                        <h4>Coupons Report</h4>
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
                                                    <div class="distributor_info mt-4 text-right">
                                                        <button id="loginCheckout" class="btn btn-light" type="button" name="" value="true" onclick="clearFilter();"><span>Clear</span></button><button id="loginCheckout" class="btn btn-dark ml-2" type="button" name="" value="true" id="generate-invoice" onclick="searchCouponsReport();"><span>Search</span></button>
                                                    </div>
                                                    <div class="clear_both"></div>
                                                    <div class="marginTop20">
                                                        <div><strong>Items List:</strong> </div>
                                                        <div class="scroll-m">
                                                            <table class="table_recieved" cellpadding="0" cellspacing="0" width="100%" id="coupons_collected_reports_tbl" style="border: #ebebeb 1px solid;">
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="">
                                                </div>
                                            </div>
                                            <div class="clear_both"></div>
                                            <div class="mt-20-items">
                                                <a class="btn btn-warning" href="dashboard">Back</a>
                                                <a class="btn btn-info ml-2" href="javascript:void(0);" onclick="exportTableToExcel();">Download Excel</a>
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
<!-- content-wrapper ends -->
<?php include_once 'footer-copy.php'; ?>
<script src="https://cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
<script src="<?php echo $home_url; ?>assets/javascript/distributor/stock-flow.js"></script>
<script>
    var example = flatpickr('#start-date');
    var example1 = flatpickr('#end-date');
    searchCouponsReport();

    function exportTableToExcel() {
        $('.download-excel').click();
    }

    //function for sales report
    function searchCouponsReport() {
        var start_date = '';
        var end_date = '';
        if ($('#start-date').val() != '') {
            start_date = $('#start-date').val();
        }
        if ($('#end-date').val() != '') {
            end_date = $('#end-date').val();
        }
        var params = {
            distributor_id: distributor_id,
            start_date: start_date,
            end_date: end_date,
        };
        var url = base_url + 'distributor/coupons-collected-reports';
        $.ajax({
            url: url,
            type: 'post',
            data: params,
            success: function(response) {
                var html = '<thead>\n\
                                <tr>\n\
                                <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Sr.No</th>\n\
                                <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Coupon Code</th>\n\
                                <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Coupon Amount</th>\n\
                                <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Coupon BV</th>\n\
                                <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Date & Time</th>\n\
                                <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Invoice Number</th>\n\
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
                                    <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + value.coupon_code + '</td>\n\
                                    <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + value.coupon_amount + '</td>\n\
                                    <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + value.coupon_type + '</td>\n\
                                    <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + value.date_time + '</td>\n\
                                    <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + value.invoice_no + '</td>\n\
                                </tr>';
                            i = i + 1;
                        });
                        html += '</tbody>';
                        $('#coupons_collected_reports_tbl').html(html);
                        $('#coupons_collected_reports_tbl').DataTable().destroy();
                        $('#coupons_collected_reports_tbl').DataTable({
                        dom: 'Blfrtip',
                        buttons: [
                            {
                                extend: 'excelHtml5',
                                title: 'coupons_collected_reports_tbl' + Date.now(),
                                text: 'Export to Excel',
                                exportOptions: {
                                    columns: [0,1, 2, 3,4,5]
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
                    $('#coupons_collected_reports_tbl').html(html);
                    $('#coupons_collected_reports_tbl').DataTable().destroy();
                    $('#coupons_collected_reports_tbl').DataTable();
                    //showSwal('error', response.data);
                }

            }
        });

    }

    function clearFilter() {
        $('#start-date').val('');
        $('#end-date').val('');
        searchCouponsReport();
    }
</script>