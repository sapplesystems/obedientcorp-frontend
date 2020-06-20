<?php
include_once 'header.php';
if (empty($_SESSION['distributor_login_resp']['id']) || $_SESSION['distributor_login_resp']['id'] == '') {
    echo '<script type="text/javascript">window.location.href = "login";</script>';
    exit;
}
?>

<div id="global-viewport" class='global-viewport m-pikabu-viewport'>
<a class="btnBack" href="dashboard">Back</a>
    <div class="global-viewport-container m-pikabu-container">
        <div id="mainContent" role="main" class="content" tabindex="-1">

            <!-- Report any requested source code -->

            <!-- Report the active source code -->

            <div class="responsiveCenteredContent js-cart">
                <div class="notEmptyCarPromo">
                </div>
                <div class="shoppingCartContainer">
                    <!-- Start of cart's first part -->


                    <div class="js-cart-items">
                        <div class="cartProductsContainer text-gray-dark cx-copy">
                            <form class="forms-sample" id="dist-payment-form" name="dist-payment-form" method="post">
                                <div class="top_info">
                                    <div>Customer Phone</div>
                                    <div><input type="text" id="search-customer" name="search_customer" placeholder="Enter customer phone number" class="required" /></div>
                                    <div>
                                        <button type="submit" class="btn btn-gradient-primary mr-2" id="dist-payment-submit">Search</button>
                                        <div id="associate-name">
                                       </div>
                                    </div>
                                   
                                </div>
                            </form>
                            <div class="clearfix"></div>
                            <div>
                                <div class="mb-7">
                                    <input class="width40" type="text" placeholder="Search Items..." id="search-product" />
                                    </div>
                            </div>
                            <div class="scrollOverflow" id="items">
                                <div class="columnHeads">
                                    <div class="columnHeadsRow">
                                        <div class="columnCell column1 titleItems"></div>
                                        <div class="columnCell column1 titleItems">
                                            <h1 class="text-uppercase">Item Name</h1>
                                        </div>
                                        <div class="columnCell column1 titleItems">
                                            <h1 class="text-uppercase">Product Code</h1>
                                        </div>
                                        <div class="columnCell column3 titleQuantity">
                                            <h6 class="quantity text-uppercase">Qty</h6>
                                        </div>
                                        <div class="columnCell column1 titleQuantity">
                                            <h6 class="quantity text-uppercase">Price/Qty</h6>
                                        </div>
                                        <div class="columnCell column4 titleTotalPrice">
                                            <h6 class="totalPrice text-uppercase">Total</h6>
                                        </div>
                                    </div>
                                </div>
                                <ul class="productContainerBody" id="item-list">
                                </ul>

                                <div class="columnHeads bt-None" id="subtotal_div">
                                    <div class="columnHeadsRow">
                                        <div class="columnCell column1 titleItems"></div>
                                        <div class="columnCell column1 titleItems">
                                            <h1 class="fontNormal">Subtotal</h1>
                                        </div>
                                        <div class="columnCell column1 titleItems">
                                            <h1 class="fontNormal"></h1>
                                        </div>
                                        <div class="columnCell column3 titleQuantity">
                                            <h6 class="quantity fontNormal"></h6>
                                        </div>
                                        <div class="columnCell column4 titleTotalPrice">
                                            <h6 class="totalPrice fontNormal">&#8377;<span id="subTotal-amount">0</span></h6>
                                        </div>
                                    </div>
                                </div>

                                <div class="columnHeads taxDiv" id="tax_div" >
                                    <div class="columnHeadsRow">
                                        <div class="columnCell column1 titleItems"></div>
                                        <div class="columnCell column1 titleItems">
                                            <h1 class="fontNormal">Tax</h1>
                                        </div>
                                        <div class="columnCell column1 titleItems">
                                            <h1 class="fontNormal"></h1>
                                        </div>
                                        <div class="columnCell column3 titleQuantity">
                                            <h6 class="quantity fontNormal"></h6>
                                        </div>
                                        <div class="columnCell column4 titleTotalPrice">
                                            <h6 class="totalPrice fontNormal">&#8377;<span id="total-tax">0</span></h6>
                                        </div>
                                    </div>
                                </div>

                                <div class="columnHeads">
                                    <div class="columnHeadsRow">
                                        <div class="columnCell column1 titleItems"></div>
                                        <div class="columnCell column1 titleItems">
                                            <h1>Total</h1>
                                        </div>
                                        <div class="columnCell column1 titleItems">
                                            <h1></h1>
                                        </div>
                                        <div class="columnCell column3 titleQuantity">
                                            <h6 class="quantity"></h6>
                                        </div>
                                        <div class="columnCell column4 titleTotalPrice">
                                            <h6 class="totalPrice">&#8377;<span id="total-amount">0</span></h6>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="cart-footer">
                            <p class="Date_format"><?php echo date('d-M-Y h:i:s A') ?></p>
                            <div class="cart-footer-main">
                                <div class="cart-footer-table totalsTbl">
                                    <div class="clearfix subTotal">
                                        <div class="js-cost cost text-gray-dark"><span id="orderSubTotal" role="alert" aria-live="assertive">TOTAL DUE:&#8377;<span id="totalPayment">0</span></span><span class="due_amount" style="display:none;">BALANCE DUE: &#8377;<span id="due_payment">0</span></span></div>
                                    </div><span data-cid="jibbitz-choking-hazard-message"></span>
                                    <div class="minHeightCoupon">
                                    <dl class="js-cx-accordion cx-accordion js-cx-accordion-no-hash" id="coupons" style="display:none;">
                                    <dt><a href="#" class="promotionsHeader text-gray-dark" >Shopping Card</a></dt>
                                        <dd class="is-closed">
                                            <div class="cx-copy clearfix js-coupon coupon" >
                                                <div id="couponField" aria-labelledby="promo-accordion-link" class="couponField ">
                                                    <table class="tableWidth" id="coupon-data">
                                                    </table>
                                                </div>
                                            </div>
                                        </dd>
                                    </dl>   
                                    </div>
                                </div>
                            </div>
                            <div class="cartNav cartNavBottom js-cartNavBottom">
                                <div class="cartNavButtons">
                                    <div class="btn_action">
                                        <a href="javascript:void(0);" class="cd-popup-trigger" id="pay-cash">Pay Cash</a>&nbsp;
                                        <a href="javascript:void(0);" class="cd-popup-trigger add-coupon" id="add-coupon">Apply Coupon</a>&nbsp;
                                        <a href="javascript:void(0);" class="cd-popup-trigger m-mt-10 verify-coupon" onclick="verifyCoupons();" id="verify-coupon">Verify Coupon OTP</a>
                                    </div>
                                    <span class="line-seperate "></span>
                                    <button id="loginCheckout" class="btn_placeOrder cx-button bgBTN-cancel full-width text-bold" type="button" name="" value="true" onclick="CancelInvoice();"><span>CANCEL</span></button><button id="loginCheckout" class="btn_placeOrder cx-button bgBTN full-width text-bold ml2Percent" type="button" name="" value="true" onclick="generateInvoice();"><span>FINISH</span></button>
                                </div>
                            </div>

                            <div class="sales_notes">
                                <label>Sale Notes</label>
                                <textarea id="sale-note"></textarea>
                            </div>
                            <a class="btnBack" href="#">Print</a>
                        </div>
                    </div>

                    <!-- ====================== snippet ends here ======================== -->

                </div>
            </div>

            <div class="clear"></div>
        </div>

    </div>
</div>

<div class="cd-popup" role="alert" id="pay_Cash">
    <div class="cd-popup-container">
        <h3 class="headPopup">Pay Cash <a href="#0" class="cd-popup-close img-replace">Close</a></h3>
        <div class="popup_input" id="cash-popup">
            <input type="text" placeholder="Amount" id="cash" name="cash" value="" /> <button onclick="PayCash();">Pay</button>
        </div>
        <!--<ul class="cd-buttons">
			<li><a href="javascript:void(0);">Yes</a></li>
			<li><a href="javascript:void(0);">No</a></li>
		</ul>-->
    </div> <!-- cd-popup-container -->
</div> <!-- cd-popup -->

<div class="cd-popup" role="alert" id="apply_Coupon">
    <div class="cd-popup-container">
        <h3 class="headPopup">Apply Coupon <a href="#0" class="cd-popup-close img-replace">Close</a></h3>
        <div class="popup_input textLeft" id="CouponCode">
            <div>
                <input type="text" placeholder="Enter Coupon Code" id="coupon_code_1" class="width85 couponCode" />
                <div class="action_apply"><span class="plus_Icon add_button" aria-hidden="true">&#43;</span></div>
                <!--<button class="apply_btn">Apply</button>-->
            </div>
            <!--div class="mt10"><span class="minus_Icon"><i class="fa fa-trash-o icon_trash"></i></span></div-->
        </div>
        <ul class="cd-buttons">
            <li><a href="javascript:void(0);" id="save_value">Apply</a></li>
            <li><a href="javascript:void(0);" onclick="closePopUP();">Cancel</a></li>
        </ul>
    </div> <!-- cd-popup-container -->
</div> <!-- cd-popup -->

<div class="cd-popup" role="alert" id="verify_Coupon">
    <div class="cd-popup-container">
        <h3 class="headPopup">Verify Coupon OTP <a href="#0" class="cd-popup-close img-replace">Close</a></h3>
        <div class="verify_input">
            <div>
                <input type="text" id="textotp1" class="otp text-center" onkeyup="changeOtpTab(1,2);" minlength="1" maxlength="1" />
                <input type="text" id="textotp2" class="otp text-center" onkeyup="changeOtpTab(2,3);" minlength="1" maxlength="1" />
                <input type="text" id="textotp3" class="otp text-center" onkeyup="changeOtpTab(3,4);" minlength="1" maxlength="1" />
                <input type="text" id="textotp4" class="otp text-center" onkeyup="changeOtpTab(4,5);" minlength="1" maxlength="1" />
                <input type="text" id="textotp5" class="otp text-center" onkeyup="changeOtpTab(5,6);" minlength="1" maxlength="1" />
                <input type="text" id="textotp6" class="otp text-center" minlength="1" maxlength="1" />
            </div>
            <div class="mt10"><a href="javascript:void(0);" onclick="verifyOTP();" id="verify-otp">Resend OTP</a></div>
        </div>
        <ul class="cd-buttons">
            <li><a href="javascript:void(0);" onclick="verifyOTP();" id="verify-otp">Verify</a></li>
            <li><a href="javascript:void(0);" onclick="closePopUP();">Cancel</a></li>
        </ul>
    </div> <!-- cd-popup-container -->
</div> <!-- cd-popup -->

<?php include_once 'footer.php'; ?>
<!-- Demandware Analytics code 1.0 (body_end-analytics-tracking-asynch.js) -->
<script>
    jQuery(document).ready(function($) {
        //open popup
        $('#paycash').on('click', function(event) {
            event.preventDefault();
            $('#cash').val('');
            $('#pay_Cash').addClass('is-visible');

        });
        $('#applyCoupon').on('click', function(event) {
            event.preventDefault();
            $('#apply_Coupon').addClass('is-visible');
        });
        $('#verifyCoupon').on('click', function(event) {
            event.preventDefault();
            $('#verify_Coupon').addClass('is-visible');
        });

        //close popup
        $('.cd-popup').on('click', function(event) {
            console.log(event.target);
            if ($(event.target).is('.cd-popup-close') || $(event.target).is('.cd-popup')) {
                event.preventDefault();
                $(this).removeClass('is-visible');
            }
        });
        //close popup when clicking the esc keyboard button
        $(document).keyup(function(event) {
            if (event.which == '27') {
                $('.cd-popup').removeClass('is-visible');
            }
        });
    });
</script>


<script src="<?php echo $home_url; ?>assets/javascript/distributor/distributor-invoice.js"></script>