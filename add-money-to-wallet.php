<?php include_once 'header.php'; ?>
<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row grid-margin">
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
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Amount</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control required" id="amount" name="amount" placeholder="Coupon Amount">
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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-4">List</h4>
                        <div class="overflowAuto">
                            <table class="table table-bordered custom_action sub_project_list" id="order-listing">
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once 'footer.php'; ?>
    <script src="assets/javascript/add_money_to_wallet.js"></script>