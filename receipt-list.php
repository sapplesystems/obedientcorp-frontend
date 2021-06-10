<?php
include_once 'header.php';
?>
<style>
    .mt35 {
        margin-top: 35px;
    }

    table.slipTable tr td {
        padding: 8px;
        color: #000000;
        font-size: 14px;
    }

    .bgWhite {
        background-color: #ffffff;
    }

    .modalSlip {
        margin-top: 30px !important;
    }

    .modalSlip .modal-header {
        border-bottom: 0;
        padding: 20px 35px 0;
    }
</style>

<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3 space-m">
                        <h4 class="card-title mb-4">Receipt</h4>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label>Associate ID:</label>
                                <select id="agent-list" onchange="get_customer_list(this.value);" class="form-control">
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label>Customer ID:</label>
                                <select id="customer-list" class="form-control">
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label>Receipt Date:</label>
                                <div class="input-group date datepicker p-0">
                                    <input type="text required" class="form-control" id="start-date" name="start-date" placeholder="" readonly>
                                    <span class="input-group-addon input-group-append border-left">
                                        <span class="mdi mdi-calendar input-group-text bg-dark"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-12 mt-4 text-right">
                            <button type="button" class="btn btn-gradient-danger" onclick="CancelReceipt();">Cancel</button><button type="submit" class="btn btn-gradient-success ml-2" onclick="getReceiptList();">Search</button>
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
                        <h4 class="card-title mb-4">Receipt List</h4>
                        <div class="overflowAuto">
                            <table class="table table-bordered custom_action " id="receipt-list">
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--modal-->
    <div class="modal fade" id="receipt-detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg modalSlip" role="document">
            <div class="modal-content bgWhite">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table-bordered slipTable" id="receipt-table" cellspacing="0" cellpadding="0" border="0" width="100%">
                        <tr>
                            <td colspan="3" style="padding: 8px;color: #000000;font-size: 14px; border:1px solid #322f2f;">
                                <h1 style="margin: 0px; text-align:center;"><strong>OBEDIENT INFRA DEVELOPMENT PVT. LTD.</strong></h1>
                                <p style="margin: 0px; text-align:center;">17/23, 2ND FLOOR, TULSIYANI SHOPPE, NEAR PVR CIVIL LINES, PRAYAGRAJ, UP-211001</p>
                                <p style="margin: 0px; text-align:center;"><strong>GSTIN:09AACC07876K1ZP</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="height:30px;padding: 8px;color: #000000;font-size: 14px; border:1px solid #322f2f;"></td>
                        </tr>
                        <tr>
                            <td style="padding: 8px;color: #000000;font-size: 14px; border:1px solid #322f2f;">Receipt No: <strong id="receipt-no"></strong></td>
                            <td style="padding: 8px;color: #000000;font-size: 14px; border:1px solid #322f2f;" colspan="2">Receipt Date: <strong id="receipt-date"></strong></td>
                        </tr>
                        <tr>
                            <td style="padding: 8px;color: #000000;font-size: 14px; border:1px solid #322f2f;">Customer Id: <strong id="customer-id"></strong></td>
                            <td style="padding: 8px;color: #000000;font-size: 14px; border:1px solid #322f2f;" colspan="2">Date of Booking: <strong id="date-of-booking"></strong></td>
                        </tr>
                        <tr>
                            <td style="padding: 8px;color: #000000;font-size: 14px; border:1px solid #322f2f;">Name: <strong id="name"></strong></td>
                            <td style="padding: 8px;color: #000000;font-size: 14px; border:1px solid #322f2f;" colspan="2">Next Due Date: <strong id="due-date"></strong></td>
                        </tr>
                        <tr>
                            <td style="padding: 8px;color: #000000;font-size: 14px; border:1px solid #322f2f;" colspan="3">Father/Husband Name: <strong id="father-name"></strong></td>
                        </tr>
                        <tr>
                            <td style="padding: 8px;color: #000000;font-size: 14px; border:1px solid #322f2f;">Address: <strong id="address"></strong></td>
                            <td style="padding: 8px;color: #000000;font-size: 14px; border:1px solid #322f2f;" colspan="2">Mobile: <strong id="mobile">8726915566</strong></td>
                        </tr>
                        <tr>
                            <td style="padding: 8px;color: #000000;font-size: 14px; border:1px solid #322f2f;">Project: <strong id="project-name"></strong></td>
                            <td style="padding: 8px;color: #000000;font-size: 14px; border:1px solid #322f2f;">Plot No.: <strong id="plot"></strong></td>
                            <td style="padding: 8px;color: #000000;font-size: 14px; border:1px solid #322f2f;">Size: <strong id="size"></strong><strong>/Sq. ft</strong></td>
                        </tr>
                        <tr>
                            <td style="padding: 8px;color: #000000;font-size: 14px; border:1px solid #322f2f;">Rate: <strong id="rate"></strong><strong>/Sq. ft</strong></td>
                            <td style="padding: 8px;color: #000000;font-size: 14px; border:1px solid #322f2f;">Amount:<strong>Rs. </strong><strong id="amount"></strong><strong>/-</strong></td>
                            <td style="padding: 8px;color: #000000;font-size: 14px; border:1px solid #322f2f;">Plan: <strong id="emi"></strong></td>
                        </tr>
                        <tr>
                            <td style="padding: 8px;color: #000000;font-size: 14px; border:1px solid #322f2f;">Balance: <strong>Rs.</strong><strong id="balance"></strong><strong>/-</strong></td>
                            <td style="padding: 8px;color: #000000;font-size: 14px; border:1px solid #322f2f;" colspan="2">Received EMI Amount: <strong>Rs.</strong><strong id="emi-amount">4000</strong><strong>/-</strong></td>
                        </tr>
                        <tr>
                            <td style="padding: 8px;color: #000000;font-size: 14px; border:1px solid #322f2f;" colspan="3">Received sum of <strong>Rs. </strong><strong id="received-amount"></strong><strong>(In Words-</strong><strong id="number-into-words">Four Thousand Only</strong><strong>.)</strong><br>
                                by <strong>Cheque/UTR No.: </strong> <span id="cheque_no"></span>  
                                <strong>Payment Mode: </strong> <span id="payment-mode"></span>  
                                <strong>Dated: </strong> <span id="cheque-date"></span>  
                                <strong>Account Holder Name: </strong> <span id="holder-name"></span>  
                                <strong>Bank: </strong> <span id="bank-name"></span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="padding: 8px;color: #000000;font-size: 14px; border:1px solid #322f2f; border-bottom:0px;">
                                <div style="height:150px;"></div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="padding: 8px;color: #000000;font-size: 14px; border:1px solid #322f2f; border-top:0px;"> 
                                <div><span style="float:left;">Print Date:</span><span id="today_date"></span> <span style="float:right;">Full Name of the Person Issuing Receipt (Signature of Authorised Official)</span></div>
                            </td>
                        </tr>
                    </table>
                    <div class="text-right"><button type="button" class="btn btn-gradient-success mt-4" onclick="print();">Print</button></div>
                </div>
            </div>
        </div>
    </div>
    <!--end modal-->
    <!-- content-wrapper ends -->
    <?php include_once 'footer.php'; ?>
    <script src="assets/javascript/receipt-list.js"></script>