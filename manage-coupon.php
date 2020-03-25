<?php include_once 'header.php'; ?>
<!-- partial -->
<style>
    .tgl {
        display: none;
    }

    .tgl,
    .tgl:after,
    .tgl:before,
    .tgl *,
    .tgl *:after,
    .tgl *:before,
    .tgl+.tgl-btn {
        box-sizing: border-box;
    }

    .tgl::-moz-selection,
    .tgl:after::-moz-selection,
    .tgl:before::-moz-selection,
    .tgl *::-moz-selection,
    .tgl *:after::-moz-selection,
    .tgl *:before::-moz-selection,
    .tgl+.tgl-btn::-moz-selection {
        background: none;
    }

    .tgl::selection,
    .tgl:after::selection,
    .tgl:before::selection,
    .tgl *::selection,
    .tgl *:after::selection,
    .tgl *:before::selection,
    .tgl+.tgl-btn::selection {
        background: none;
    }

    .tgl+.tgl-btn {
        outline: 0;
        display: block;
        width: 4em;
        height: 2em;
        position: relative;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .tgl+.tgl-btn:after,
    .tgl+.tgl-btn:before {
        position: relative;
        display: block;
        content: "";
        width: 50%;
        height: 100%;
    }

    .tgl+.tgl-btn:after {
        left: 0;
    }

    .tgl+.tgl-btn:before {
        display: none;
    }

    .tgl:checked+.tgl-btn:after {
        left: 50%;
    }


    .tgl-skewed+.tgl-btn {
        overflow: hidden;
        -webkit-transform: skew(-10deg);
        transform: skew(-10deg);
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
        -webkit-transition: all .2s ease;
        transition: all .2s ease;
        font-family: sans-serif;
        background: #888;
    }

    .tgl-skewed+.tgl-btn:after,
    .tgl-skewed+.tgl-btn:before {
        -webkit-transform: skew(10deg);
        transform: skew(10deg);
        display: inline-block;
        -webkit-transition: all .2s ease;
        transition: all .2s ease;
        width: 100%;
        text-align: center;
        position: absolute;
        line-height: 2em;
        font-weight: bold;
        color: #fff;
        text-shadow: 0 1px 0 rgba(0, 0, 0, 0.4);
    }

    .tgl-skewed+.tgl-btn:after {
        left: 100%;
        content: attr(data-tg-on);
    }

    .tgl-skewed+.tgl-btn:before {
        left: 0;
        content: attr(data-tg-off);
    }

    .tgl-skewed+.tgl-btn:active {
        background: #888;
    }

    .tgl-skewed+.tgl-btn:active:before {
        left: -10%;
    }

    .tgl-skewed:checked+.tgl-btn {
        background: #86d993;
    }

    .tgl-skewed:checked+.tgl-btn:before {
        left: -100%;
    }

    .tgl-skewed:checked+.tgl-btn:after {
        left: 0;
    }

    .tgl-skewed:checked+.tgl-btn:active:after {
        left: 10%;
    }

    .number_of_days {
        padding: 5px;
        height: 30px;
        width: 100px !important;
        line-height: 30px;
        margin: 0;
    }
</style>
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
                                <button type="button" class="btn btn-light" id="cancel-coupon">Cancel</button>
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
                                        <th> Sr No. </th>
                                        <th> Coupon ID</th>
                                        <th> Coupon Price </th>
                                        <th> Generated Date </th>
                                        <th> Expiry Date </th>
                                        <?php if ($user_type == 'ADMIN') { ?>
                                            <th> Action </th>
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
    <!-- content-wrapper ends -->
    <?php include_once 'footer.php'; ?>
    <script src="assets/javascript/coupon_generate.js"></script>