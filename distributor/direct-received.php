<?php
include_once 'header.php';
?>
<style>
    .shoppingCartContainer .productContainerRow {
        grid-template-columns: 3.8% 16% 14% 12% 12% 9% 11% 13% 5%;
    }

    .cartProductsContainer .columnHeadsRow {
        grid-template-columns: 0.27fr 0.97fr 0.7fr 0.7fr 0.7fr 0.5fr 0.6fr 0.8fr 0.3fr;
    }

    .shoppingCartContainer .columnHeadsRow h1,
    .shoppingCartContainer .columnHeadsRow h6 {
        font-size: 12px;
    }

    .columnCell.column2.productDetails p input[type="text"] {
        width: 60px;
        margin-left: 5px;
    }

    .selectInputStle textarea {
        width: 80%;
		border:1px solid #cccccc
    }

    .selectInputStle select {
        width: 80%;
		border:1px solid #cccccc
    }

    .js-cart-items {
        grid-template-columns: 4fr 1fr;
    }
	#lot_numbers_popup .cd-popup-container{max-width: 520px;}
	#lot_numbers_content > p{display:inline-block; padding-top:0px; padding-bottom:20px; width:49%; text-align:left;}
	#lot_numbers_content > p label{font-weight:bold;}
	.ui-widget.ui-widget-content{overflow-y: auto;max-height: 400px;overflow-x: hidden;}
	.flatpickr-calendar{left:initial; right:0;}
	#lot_numbers_content{text-align:left;}
</style>
<div id="global-viewport" class='global-viewport m-pikabu-viewport'>
    <div class="global-viewport-container m-pikabu-container">

        <div id="mainContent" role="main" class="content" tabindex="-1">

            <!-- Report any requested source code -->

            <!-- Report the active source code -->

            <div class="responsiveCenteredContent js-cart">
                <div class="backbtn_pos"><a class="btnBack" href="item-received-list"><img src="<?php echo $home_url; ?>assets/javascript/distributor/images/backto.png" /> Back</a></div>
                <div class="shoppingCartContainer">
                    <h1 class="headTop">Direct Receiving</h1>
                    <!-- Start of cart's first part -->
                    <div class="js-cart-items">
                        <div class="cartProductsContainer text-gray-dark cx-copy">
                            <div class="distributor_info">
                                <div><label>Company Name</label></div>
                                <div>
                                    <input type="text" placeholder="" id="company_name" />
                                    <input type="hidden" placeholder="" id="dispatch_company_id" value="0" />
                                </div>
                                <div class="ml5percent"><label>Company Address</label></div>
                                <div>
                                    <input type="text" placeholder="" id="company_address" />
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="distributor_info marginTop10">
                                <div><label>Challan/Invoice Number</label></div>
                                <div>
                                    <input type="text" placeholder="" id="challan_invoice" />
                                </div>

                            </div>
                            <div class="clearfix"></div>
                            <div class="marginTop8">
                                <div class="mb-7"><input class="width40" type="text" id="search-product" placeholder="Search Items..." /></div>
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
                                        <div class="columnCell column1 titleQuantity">
                                            <h6 class="quantity text-uppercase">Dispatched Qty</h6>
                                        </div>
                                        <div class="columnCell column1 titleQuantity">
                                            <h6 class="quantity text-uppercase">Received Qty</h6>
                                        </div>
                                        <div class="columnCell column1 titleQuantity">
                                            <h6 class="quantity text-uppercase">Price/Qty</h6>
                                        </div>
                                        <div class="columnCell column1 titleQuantity">
                                            <h6 class="quantity text-uppercase">Status</h6>
                                        </div>
                                        <div class="columnCell column1 titleQuantity">
                                            <h6 class="quantity text-uppercase">Comment</h6>
                                        </div>
                                        <div class="columnCell column4 titleTotalPrice">
                                            <h6 class="totalPrice text-uppercase">Total</h6>
                                        </div>
                                    </div>
                                </div>
                                <ul class="productContainerBody selectInputStle" id="item-list">


                                </ul>

                                <div class="columnHeads bt-None">
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
                                        <div class="columnCell column1 titleItems">
                                            <h1 class="fontNormal"></h1>
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
                                            <h6 class="totalPrice fontNormal">&#8377;<span id="subTotal-amount">0</span></h6>
                                        </div>
                                    </div>
                                </div>

                                <div class="columnHeads taxDiv">
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
                                        <div class="columnCell column1 titleItems">
                                            <h1 class="fontNormal"></h1>
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
                                        <div class="columnCell column1 titleItems">
                                            <h1 class="fontNormal"></h1>
                                        </div>
                                        <div class="columnCell column1 titleItems">
                                            <h1 class="fontNormal"></h1>
                                        </div>
										 <div class="columnCell column1 titleItems">
                                            <h1 class="fontNormal"></h1>
                                        </div>
										 <div class="columnCell column1 titleItems">
                                            <h1 class="fontNormal"></h1>
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
                            <div class="cart-footer-main"></div>

                            <div class="sales_notes mtNone">
                                <label>Dispatch Type</label>
                                <form action="#" class="marginTop10">
                                    <p>
                                        <input type="radio" id="test2" name="dispatch_type" value="Direct">
                                        <label for="test2">Direct</label>
                                    </p>
                                </form>
                            </div>
                            <div class="sales_notes marginTop20">
                                <div class="widthHalf">
                                    <label>Receiving Date</label>
                                    <div class="expected_input">
                                        <input type="text" id="current-date" placeholder="Select Date" readonly>
                                    </div>
                                </div>
                                <div class="widthHalf ml4percent">
                                    <label>Dispatch Date</label>
                                    <div class="expected_input">
                                        <i class="fa fa-calendar icon_calendar" aria-hidden="true"></i>
                                        <input type="text" id="dispatch_date" placeholder="Select Date" onchange="checkStartEndDate();">
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="sales_notes marginTop20">
                                <label>Notes: (Optional)</label>
                                <textarea class="textarea64" id="note"></textarea>
                            </div>
                            <div class="sales_notes marginTop20">
                                <label>Shipping Details: (Optional)</label>
                                <textarea class="textarea64" id="shipping-detail"></textarea>
                            </div>
                            <button id="loginCheckout" class="btn_placeOrder cx-button bgBTN-cancel full-width text-bold marginTop20" type="button" name="" value="true" onclick="CancelInvoice();"><span>CLEAR</span></button><button id="loginCheckout" class="btn_placeOrder cx-button bgBTN full-width text-bold ml2Percent marginTop20" type="button" name="" value="true" id="generate-invoice" onclick="generationDispatch();"><span>Update Items</span></button>
                        </div>
                    </div>

                    <!-- ====================== snippet ends here ======================== -->

                </div>
            </div>

            <div class="clear"></div>
        </div>

    </div>
</div>

<div class="cd-popup" role="alert" id="lot_numbers_popup">
    <div class="cd-popup-container">
        <h3 class="headPopup">Select Lot Number<a href="#0" class="cd-popup-close img-replace">Close</a></h3>
        <div class="popup_input" id="lot_numbers_content"></div>
    </div>
</div>
<?php include_once 'footer.php'; ?>
<script src="<?php echo $home_url; ?>assets/javascript/distributor/direct-dispatch-generate.js"></script>

<script>
    var example1 = flatpickr('#dispatch_date');
</script>
</body>

</html>