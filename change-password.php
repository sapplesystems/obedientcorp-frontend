<?php include_once 'header.php'; ?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper ">
        <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-4">Change Login Password</h4>
                        <div id="errors_div"></div>
                        <form class="forms-sample" method="post" action="" id="change_password_form" name="change_password_form">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Old Password</label>
                                        <input type="password" class="form-control required" placeholder="Old Password" id="old_password" name="old_password">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input type="password" class="form-control required" placeholder="New Password" id="new_password" name="new_password">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" class="form-control required" placeholder="Confirm Password" id="confirm_password" name="confirm_password">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-right">
								<input type="hidden" id="plot_id" />
                                    <button type="submit" class="btn btn-gradient-success">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-4">Change Transaction Password</h4>
                        <div id="errors_div"></div>
                        <form class="forms-sample" method="post" action="" id="change_transaction_password_form" name="change_transaction_password_form">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Old Password</label>
                                        <input type="password" class="form-control required" placeholder="Old Password" id="tran_old_password" name="tran_old_password">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input type="password" class="form-control required" placeholder="New Password" id="tran_new_password" name="tran_new_password">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" class="form-control required" placeholder="Confirm Password" id="tran_confirm_password" name="tran_confirm_password">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <button type="submit" class="btn btn-gradient-success">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- content-wrapper ends -->
    <?php include_once 'footer.php'; ?>
    <script src="assets/javascript/change_password.js"></script>