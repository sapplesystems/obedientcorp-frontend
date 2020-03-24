<?php include_once 'header.php'; ?>
<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper ">

        <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <!-- <h4 class="card-title mb-4">Add Coupon</h4> -->
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label mb-0">Generated For:</label>
                                    <div class="col-sm-2 p-0">
                                        <select class="form-control blackOption" id="agent">
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="div-total text-right" style="display:none;" id="e_wallet_label">
                                    <h5>Your Wallet Balance: <span id="rupee_sign"></span> <span id="e-wallet"></span></h5>
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
                            <!-- <div class="col-sm-1"></div> -->
                            <div class="col-sm-12">
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
                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <button type="button" class="btn btn-success" id="coupon_generate">Submit</button>&nbsp;
                                <button type="button" class="btn btn-light">Cancel</button>
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
                        <h4 class="card-title mb-4">Manage Coupon</h4>

                        <div class="overflowAuto">
                            <table class="table table-bordered custom_action" id="order-listing">
                                <thead>
                                    <tr>
                                        <th width="10%"> Sr No. </th>
                                        <th width="30%"> Coupon ID</th>
                                        <th width="10%"> Coupon Price </th>
                                        <th width="50%"> Action </th>
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
    <!-- content-wrapper ends -->
    <?php include_once 'footer.php'; ?>
    <script src="assets/javascript/coupon_generate.js"></script>