<?php
include_once 'header-copy.php';
if (empty($_SESSION['distributor_login_resp']['id']) || $_SESSION['distributor_login_resp']['id'] == '') {
    echo '<script type="text/javascript">window.location.href = "login";</script>';
    exit;
}
?>
<style>
#lot_numbers_popup .cd-popup-container{max-width: 520px;}
	#lot_numbers_content > p{display:inline-block; padding-top:0px; padding-bottom:20px; width:49%; text-align:left;}
	#lot_numbers_content > p label{font-weight:bold;}
	.flatpickr-calendar{left:initial; right:0;}
	#lot_numbers_content{text-align:left;}
	.modal.fade{opacity:1 !important;}
	#posInvoice .modal-dialog{max-width:1300px;}
	#posInvoice .js-cart-items{display: grid !important;}
		#posInvoice .modal-header{border-bottom:1px solid #dee2e6 !important;padding-bottom: 15px;padding-top: 15px;}
		.cd-popup{z-index:9999;}
</style>



<div class="main-content">
        <section class="section">
    <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
				<div class="card-header">
					 <h4>POS</h4>
				</div>
				<div class="card-body">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#posInvoice">Launch demo modal</button>

</div>
</div>
</div>
</div>
</section>
</div>

<div class="cd-popup" role="alert" id="pay_Cash">
    <div class="cd-popup-container">
        <h3 class="headPopup">Pay Cash <a href="#0" class="cd-popup-close img-replace">Close</a></h3>
        <div class="popup_input" id="cash-popup">
            <input type="text" placeholder="Amount" id="cash" name="cash" value="" /> <button onclick="PayCash();">Pay</button>
        </div>
    </div>
</div>

<div class="cd-popup" role="alert" id="apply_Coupon">
    <div class="cd-popup-container">
        <h3 class="headPopup">Apply Coupon <a href="#0" class="cd-popup-close img-replace">Close</a></h3>
        <div class="popup_input textLeft" id="CouponCode">
            <div>
                <input type="text" placeholder="Enter Coupon Code" id="coupon_code_1" class="width85 couponCode" />
                <div class="action_apply"><span class="plus_Icon add_button" aria-hidden="true">&#43;</span></div>
            </div>
        </div>
        <ul class="cd-buttons">
            <li><a href="javascript:void(0);" id="save_value">Apply</a></li>
            <li><a href="javascript:void(0);" onclick="closePopUP();">Cancel</a></li>
        </ul>
    </div>
</div>

<div class="cd-popup" role="alert" id="verify_Coupon">
    <div class="cd-popup-container">
        <h3 class="headPopup">Verify Coupon OTP <a href="#0" class="cd-popup-close img-replace">Close</a></h3>
        <div class="verify_input">
            <div>
                <input type="text" id="textotp1" class="otp text-center" onkeyup="changeOtpTab(1, 2);" minlength="1" maxlength="1" />
                <input type="text" id="textotp2" class="otp text-center" onkeyup="changeOtpTab(2, 3);" minlength="1" maxlength="1" />
                <input type="text" id="textotp3" class="otp text-center" onkeyup="changeOtpTab(3, 4);" minlength="1" maxlength="1" />
                <input type="text" id="textotp4" class="otp text-center" onkeyup="changeOtpTab(4, 5);" minlength="1" maxlength="1" />
                <input type="text" id="textotp5" class="otp text-center" onkeyup="changeOtpTab(5, 6);" minlength="1" maxlength="1" />
                <input type="text" id="textotp6" class="otp text-center" minlength="1" maxlength="1" />
            </div>
            <div class="mt10"><a href="javascript:void(0);" onclick="verifyCoupons();" id="verify-otp">Resend OTP</a></div>
        </div>
        <ul class="cd-buttons">
            <li><a href="javascript:void(0);" onclick="verifyOTP();" id="verify-otp">Verify</a></li>
            <li><a href="javascript:void(0);" onclick="closePopUP();">Cancel</a></li>
        </ul>
    </div>
</div>

<div class="modal fade" id="posInvoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Distributor Invoice</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="global-viewport" class='global-viewport m-pikabu-viewport'>
    <div class="global-viewport-container m-pikabu-container">
        <div id="mainContent" role="main" class="content" tabindex="-1">

            <!-- Report any requested source code -->

            <!-- Report the active source code -->

            <div class="responsiveCenteredContent js-cart">
                <div class="notEmptyCarPromo">
                </div>
                <div class="shoppingCartContainer mt-0 mb-0">
                    <!-- Start of cart's first part -->
                    <div class="js-cart-items">
                        <div class="cartProductsContainer cx-copy">
                            <form class="forms-sample" id="dist-payment-form" name="dist-payment-form" method="post">
                                <div class="top_info">
                                    <div>Customer Phone</div>
                                    <div><input type="text" id="search-customer" name="search_customer" placeholder="Customer Phone Number" class="required" /></div>
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
										<div class="columnCell column1 titleItems">
                                            <h1 class="fontNormal"></h1>
                                        </div>
                                        <div class="columnCell column3 titleQuantity">
                                            <h6 class="quantity fontNormal"></h6>
                                        </div>
                                        <div class="columnCell column4 titleTotalPrice">
                                            <h6 class="totalPrice fontNormal">&#8377;<span id="subTotal-amount">0.00</span></h6>
                                        </div>
                                    </div>
                                </div>

                                <div class="columnHeads taxDiv" id="tax_div">
                                    <div class="columnHeadsRow">
                                        <div class="columnCell column1 titleItems"></div>
                                        <div class="columnCell column1 titleItems">
                                            <h1 class="fontNormal">Tax</h1>
                                        </div>
                                        <div class="columnCell column1 titleItems">
                                            <h1 class="fontNormal"></h1>
                                        </div>
										<div class="columnCell column1 titleItems">
                                            <h1 class="fontNormal"></h1>
                                        </div>
                                        <div class="columnCell column3 titleQuantity">
                                            <h6 class="quantity fontNormal"></h6>
                                        </div>
                                        <div class="columnCell column4 titleTotalPrice">
                                            <h6 class="totalPrice fontNormal">&#8377;<span id="total-tax">0.00</span></h6>
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
										<div class="columnCell column1 titleItems">
                                            <h1></h1>
                                        </div>
                                        <div class="columnCell column3 titleQuantity">
                                            <h6 class="quantity"></h6>
                                        </div>
                                        <div class="columnCell column4 titleTotalPrice">
                                            <h6 class="totalPrice">&#8377;<span id="total-amount">0.00</span></h6>
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
                                        <div class="js-cost cost"><span id="orderSubTotal" role="alert" aria-live="assertive">TOTAL DUE: &#8377;<span id="totalPayment">0.00</span></span><span class="due_amount" style="display:none;">BALANCE DUE: &#8377;<span id="due_payment">0.00</span></span></div>
                                    </div><span data-cid="jibbitz-choking-hazard-message"></span>
                                    <div class="minHeightCoupon">
                                        <dl class="js-cx-accordion cx-accordion js-cx-accordion-no-hash" id="coupons" style="display:none;">
                                            <dt><a href="#" class="promotionsHeader">Shopping Card</a></dt>
                                            <dd class="is-closed">
                                                <div class="cx-copy clearfix js-coupon coupon">
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
                                    <button id="loginCheckout" class="btn_placeOrder cx-button bgBTN-cancel full-width text-bold" type="button" name="" value="true" onclick="CancelInvoice();"><span>CANCEL</span></button><button id="loginCheckout" class="btn_placeOrder cx-button bgBTN full-width text-bold ml2Percent" type="button" name="" value="true" onclick="checkBeforeGenerateInvoice();"><span>FINISH</span></button>
                                </div>
                            </div>

                            <div class="sales_notes">
                                <label>Sale Notes</label>
                                <textarea id="sale-note"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- ====================== snippet ends here ======================== -->

                </div>
            </div>

            <div class="clear"></div>
        </div>

    </div>
</div>
      </div>
    </div>
  </div>
</div>

<div class="cd-popup" role="alert" id="before_inovice_generate">
    <div class="cd-popup-container">
        <h3 class="headPopup">Message<a href="#0" class="cd-popup-close img-replace">Close</a></h3>
        <div class="popup_input" id="before_inovice_generate_message"></div>
        <ul class="cd-buttons">
            <li><a href="javascript:void(0);" onclick="generateInvoice();">Yes</a></li>
            <li><a href="javascript:void(0);" onclick="closePopUP();">No</a></li>
        </ul>
    </div>
</div>
<div class="cd-popup" role="alert" id="success_generate_invoice">
    <div class="cd-popup-container">
        <h3 class="headPopup">Message<a href="#0" class="cd-popup-close img-replace">Close</a></h3>
        <div class="popup_input" id="success_generate_invoice_msg"></div>
        <!--<div class="backbtn_pos"><a class="btnBack" href="#" onclick="printInvoice(event);">Print</a></div>-->
        <ul class="cd-buttons">
            <li><a class="" href="javascript:void(0);" onclick="window.print();">Print Bill</a></li>
            <li><a href="javascript:void(0);" onclick="closePopUP();">OK</a></li>
        </ul>
    </div>
</div>

<div class="cd-popup" role="alert" id="lot_numbers_popup">
    <div class="cd-popup-container">
        <h3 class="headPopup">Select Lot Number<a href="#0" class="cd-popup-close img-replace">Close</a></h3>
        <div class="popup_input" id="lot_numbers_content"></div>
    </div>
</div>

<div id="print_coupon_div" style="display: none;">
    <script src="<?php echo $home_url; ?>assets/javascript/JsBarcode.all.min.js"></script>
    <?php include_once 'footer-copy.php'; ?>
    <script>
                jQuery(document).ready(function ($) {
                    //open popup
                    $('#paycash').on('click', function (event) {
                        event.preventDefault();
                        $('#cash').val('');
                        $('#pay_Cash').addClass('is-visible');

                    });
                    $('#applyCoupon').on('click', function (event) {
                        event.preventDefault();
                        $('#apply_Coupon').addClass('is-visible');
                    });
                    $('#verifyCoupon').on('click', function (event) {
                        event.preventDefault();
                        $('#verify_Coupon').addClass('is-visible');
                    });

                    //close popup
                    $('.cd-popup').on('click', function (event) {
                        if ($(event.target).is('.cd-popup-close') || $(event.target).is('.cd-popup')) {
                            event.preventDefault();
                            $(this).removeClass('is-visible');
                            $('#search-product').val('');
                        }
                    });
                    //close popup when clicking the esc keyboard button
                    $(document).keyup(function (event) {
                        if (event.which == '27') {
                            $('.cd-popup').removeClass('is-visible');
                        }
                    });
                });
    </script>


    <script src="<?php echo $home_url; ?>assets/javascript/distributor/distributor-invoice.js"></script>