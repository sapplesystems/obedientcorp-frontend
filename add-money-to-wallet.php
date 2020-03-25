<?php
include_once 'header.php';
if ($user_type != 'ADMIN') {
    echo '<script type="text/javascript">window.location.href="dashboard.php";</script>';
}
?>

<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="main-panel ">
            <div class="content-wrapper ">
                <div class="row ">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body p-3">
                                <h4 class="card-title mb-4">Add Money to Wallet</h4>
                                <div id="errors_div"></div>
                                <form class="forms-sample" id="add-money-to-wallet-form" name="add-money-to-wallet-form" method="post">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Agents</label>
                                        <div class="col-sm-4">
                                            <select class="form-control required" id="agents" name="agents"></select>
                                        </div>
                                        <label class="col-sm-6 col-form-label">Your Wallet Balance: &#8377; <span id="e-wallet">0</span></label>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Amount</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control required" id="amount" name="amount" placeholder="Coupon Amount" >
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2"></label>
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-gradient-primary mr-2" id="add-money-to-wallet-submit">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include_once 'footer.php'; ?>
            <script src="assets/javascript/add_money_to_wallet.js"></script>