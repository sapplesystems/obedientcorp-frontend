<?php
include_once 'header-copy.php';
if (empty($_SESSION['distributor_login_resp']['id']) || $_SESSION['distributor_login_resp']['id'] == '') {
    echo '<script type="text/javascript">window.location.href = "login";</script>';
    exit;
}
?>
<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-4">Distributor Invoice</h4>
                        <div id="errors_div"></div>
                        <form class="forms-sample" id="dist-payment-form" name="dist-payment-form" method="post">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Customer Phone</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control required" id="search-customer" name="search_customer" placeholder="Search Customer">
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-gradient-primary mr-2" id="dist-payment-submit">Search</button>
                                </div>
                                <div class="col-sm-2" id="associate-name">
                                </div>
                            </div>
                        </form>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="search-product" name="search_product" placeholder="Search Product">
                        </div>
                        <div class="form-group row">
                            <div class="overflowAuto">
                                <table class="table table-bordered custom_action " id="product-listing">
                                    <thead>
                                        <tr>
                                            <th>Items Name</th>
                                            <th>Qty</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody id="item-list">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Sub Total</label>
                            <div class="col-sm-4" id="subTotal-amount">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tax</label>
                            <div class="col-sm-4" id="total-tax">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Total</label>
                            <div class="col-sm-4" id="total-amount"></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Sale Notes</label>
                            <div class="col-sm-4">
                            <textarea class="form-control" rows="5" id="sale-note"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="overflowAuto text-right">
                                <table class="table table-bordered custom_action " id="coupon-data">

                                </table>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 text-right">
                                <button type="button" class="btn btn-gradient-success btn-sm mt-2" id="pay-cash">Pay Cash</button>
                                <button type="button" class="btn btn-gradient-success btn-sm mt-2" id="add-coupon">Add Coupon</button>
                                <button type="button" class="btn btn-gradient-success btn-sm mt-2" onclick="verifyCoupons();" id="verify-coupon">Verify Coupon Otp</button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 text-right">
                                <button type="button" class="btn btn-gradient-success btn-sm mt-2" id="generate-invoice" onclick="generateInvoice();">Finish</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Add coupon Modal-->
    <div class="modal fade" id="addCouponRequest" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog payment-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Add Coupon</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add-coupon-form" name="add_coupon_form" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row ">
                                    <label class="col-form-label col-sm-4 text-right">Coupon Code:</label>
                                    <div class="col-sm-8" id="CouponCode">
                                        <input type="text" class="form-control couponCode" id="coupon_code_1" name="code">
                                        <button type="button" class="add_button">
                                            <i class="mdi mdi-plus-circle"></i>
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer text-center">
                            <button type="button" class="btn btn-success" id="save_value">Apply Coupon</button>
                            <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!--end div-->
    <!-- VERIFY OTP MODAL -->
    <div class="modal fade" id="verifyOtpRequest" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog payment-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Verify OTP</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="verify_form" name="verify_form" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row ">
                                    <label class="col-form-label col-sm-4 text-right">OTP:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control couponCode" id="otp" name="otp">
                                        <input type=hidden value="" id="info" />
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer text-center">
                            <button type="button" class="btn btn-success" onclick="verifyOTP();" id="verify-otp">Verify OTP</button>
                            <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!--END VERIFY OTP MODAL-->

    <!-- Pay Cash Modal -->
    <div class="modal fade" id="payCashRequest" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog payment-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Pay Cash</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="cash_form" name="cash_form" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row ">
                                    <label class="col-form-label col-sm-4 text-right">Cash:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control couponCode" id="cash" name="cash">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer text-center">
                            <button type="button" class="btn btn-success" onclick="PayCash();" id="payCash">Pay</button>
                            <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!--END Pay Cash Modal-->


    <!-- content-wrapper ends -->
    <?php include_once 'footer-copy.php'; ?>
    <script src="<?php echo $home_url; ?>assets/javascript/distributor/distributor-invoice.js"></script>