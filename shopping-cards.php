<?php include_once 'header.php'; ?>
<!-- partial -->

<div class="main-panel ">
    <div class="content-wrapper ">

        <?php if ($user_type == 'AGENT') { ?>
            <div class="row grid-margin">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body p-3 marginLR-m">
                            <!-- <h4 class="card-title mb-4">Add Coupon</h4> -->
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label mb-0">Generated For:</label>
                                        <div class="col-sm-12">
                                            <select class="form-control blackOption" id="agent"></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label mb-0">Business Value Type:</label>
                                        <div class="col-sm-12">
                                            <select class="form-control blackOption" id="bv_type" onchange="get_listing(this.value);">
                                                <option value="">Select</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="div-total" style="display:none;" id="e_wallet_label">
                                        <div class="form-group row">
                                            <label class="col-sm-12 col-form-label mb-0">Wallet Balance:</label>
                                            <div class="col-sm-12">
                                                <span id="rupee_sign"></span> <span id="e-wallet"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- <div class="col-sm-5">
                                        <ul class="coupon_list">
                                            <li><div class="coupon_div bg-info">Coupon Rs 5000</div> <input type="text" class="input-group input_digit" /></li>
                                            <li><div class="coupon_div bg-info">Coupon Rs 1000</div> <input type="text" class="input-group input_digit" /></li>
                                            <li><div class="coupon_div bg-info">Coupon Rs 500</div> <input type="text" class="input-group input_digit" /></li>
                                            <li><div class="coupon_div bg-info">Coupon Rs 200</div> <input type="text" class="input-group input_digit" /></li>
                                        </ul>
                                    </div> -->
                                <!--<div class="col-sm-1"></div> -->
                                <div class="col-sm-12 coupon_denomination_div" style="display: none;">
                                    <h4 class="card-title mb-4">Amount Calculation</h4>
                                    <ul class="cal_amount" id="denomination">
                                    </ul>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="hrDiv"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="div-total float-left">
                                                <h5>Total</h5>
                                            </div>
                                            <div class="div-price float-right col-sm-4">
                                                <p>&#8377 <span id="denomination_amount_sum">0</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row coupon_denomination_div" style="display: none;">
                                <div class="col-sm-12 text-right">
                                    <button type="button" class="btn btn-success" id="coupon_generate">Submit</button>&nbsp;
                                    <button type="button" class="btn btn-light" id="cancel-coupon">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-4">Manage Shopping Cards</h4>
                        <div class="overflowAuto custom_overflow">
                            <table class="table table-bordered custom_action" id="order-listing">
                                <thead>
                                    <tr>
                                        <?php if ($user_type == 'ADMIN') { ?>
                                            <th width="5%"> Sr No. </th>
                                            <th width="5%"> Type </th>
                                            <th width="5%"> Associate Name </th>
                                            <th width="7%">Code Name</th>
                                            <th width="7%">Code</th>
                                            <th width="8%">Code Type</th>
                                            <th width="10%">Price </th>
                                            <th width="10%"> Generated Date </th>
                                            <th width="10%"> Expiry Date </th>
                                            <th width="5%">Status</th>
                                            <th width="45%"> Action </th>
                                        <?php } else { ?>
                                            <th width="5%"> Sr No. </th>
                                            <th width="5%"> Type </th>
                                            <th width="5%"> Associate Name </th>
                                            <th width="5%">Code Name</th>
                                            <th width="5%">Code</th>
                                            <th width="10%">Code Type</th>
                                            <th width="15%">Price </th>
                                            <th width="15%"> Generated Date </th>
                                            <th width="15%"> Expiry Date </th>
                                            <th width="15%"> Status </th>
                                            <th width="20%"> Action </th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody id="agent_coupon_listing">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="print_coupon_div" style="display: none;">
        <script src="assets/javascript/JsBarcode.all.min.js"></script>
        <style>
            @media print {
                .bg_color {
                    background-color: #b66dff !important;
                    -webkit-print-color-adjust: exact;
                }

                .main_bg{
                    background-color: #f7f7f7 !important;
                    -webkit-print-color-adjust: exact;
                }
            }
        </style>
        <div class="main_bg" style="background:#f7f7f7; max-width:600px; padding:20px; margin:20px auto; border:1.5px dashed #999999; font-family:arial; box-shadow:0 0 0 7px #f7f7f7;">
            <h4 style="float:left; text-align:left; margin-top:0px; font-weight:normal;"><strong>GENERATED DATE</strong> <br><span id="pGeneratedDate"></span></h4>
            <h4 style="float:right; text-align:right; margin-top:0px; font-weight:normal;"><strong>EXPIRY DATE</strong> <br><span id="pExpiryDate"></span></h4>
            <div style="clear:both;"></div>
            <h1 style="font-size:56px; text-align:center; margin-top:0; margin-bottom:30px;"><span style="font-size:30px;">&#8377;</span> <span id="pCouponAmount"></span></h1>
            <p style="text-align:center;"><strong>Shopping Card Code:</strong> <span id="pCouponCode" class="bg_color" style="background:#b66dff; padding:5px 10px; border:1px solid #b66dff;color:#ffffff;">55690B14</span></p>
            <p style="margin-top:50px; text-align:center;"><svg id="barcode"></svg></p>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <?php include_once 'footer.php'; ?>
    <script src="assets/javascript/coupon_generate.js"></script>