<?php include_once 'header.php'; ?>
<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-4">Wallet to Wallet Money Transfer</h4>
                        <h5>Your Wallet Balance: <span id="rupee_sign"></span> <span id="e-wallet"></span></h5>
                        <div id="errors_div"></div>
                        <form class="forms-sample" id="wallet_transfer_form" name="wallet_transfer_form" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <?php if ($user_type == 'ADMIN') { ?>
                                    <label class="col-sm-2 col-form-label">Transfer from </label>
                                    <div class="col-sm-4">
                                        <select class="form-control required" id="transfer-from" name="transfer-from">
                                        </select>
                                    </div>
                                <?php } ?>
                                <label class="col-sm-2 col-form-label">Transfer To</label>
                                <div class="col-sm-4">
                                    <select class="form-control required" id="transfer-to" name="transfer-to">
                                    </select>
                                </div>

                            </div>
                            <div class="form-group row" >
                                <label class="col-sm-2 col-form-label">Amount</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control required" placeholder="Amount" id="amount" name="amount">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Transaction Password</label>
                                <div class="col-sm-4">
                                    <input type="password" class="form-control required" id="transaction_password" name="transaction_password" placeholder="Transaction password" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-gradient-primary mr-2" id="wallet-tansfer">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once 'footer.php'; ?>
    <script src="assets/javascript/wallet-to-wallet-transfer.js"></script>