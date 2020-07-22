<?php
include_once 'header-copy.php';
?>
<style>
#lot_numbers_popup .cd-popup-container{max-width: 520px;}
	#lot_numbers_content > p{display:inline-block; padding-top:0px; padding-bottom:20px; width:49%; text-align:left;}
	#lot_numbers_content > p label{font-weight:bold;}
	.ui-widget.ui-widget-content{overflow-y: auto;max-height: 400px;overflow-x: hidden;}
	.flatpickr-calendar{left:initial; right:0;}
	#lot_numbers_content{text-align:left;}
	[type="radio"]:checked + label::before, [type="radio"]:not(:checked) + label::before{width: 20px;height: 20px;}
</style>
<div class="main-content">
        <section class="section">
    <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
				<div class="card-header">
					 <h4>Dispatch Generation</h4>
				</div>
				<div class="card-body">
<div id="global-viewport" class='global-viewport m-pikabu-viewport'>
    <div class="global-viewport-container m-pikabu-container">

        <div id="mainContent" role="main" class="content" tabindex="-1">

            <!-- Report any requested source code -->

            <!-- Report the active source code -->

            <div class="responsiveCenteredContent js-cart">
                <div class="shoppingCartContainer">
                    <!-- Start of cart's first part -->
                    <div class="js-cart-items">
                        <div class="cartProductsContainer text-gray-dark cx-copy">
                            <div class="distributor_info">
                                <div><label>Select Distributer</label></div>
                                <div >
                                    <select id="distributor-list" class="dist-list ">

                                    </select>
                                </div>
                                <div class="ml5percent"><label>Distributer Name and Address</label></div>
                                <div>
                                    <input type="text" placeholder="" id="distributor" data-value="" readonly/>
                                </div>
                            </div>
                            <div class="clearfix"></div>
							<div class="distributor_info marginTop10">
							<div><label>Dispatch Type</label></div>
								<div>
								<form action="#" class="mt-1">
                                    <p class="d-inline-block">
                                        <input type="radio" id="test2" name="dispatch_type" value="Normal">
                                        <label for="test2">Normal</label>
                                    </p>
                                    <!--p class="d-inline-block ml-4">
                                        <input type="radio" id="test3" name="dispatch_type" value="Return">
                                        <label for="test3">Return</label>
                                    </p-->
                                </form>
								</div>
								<div></div>
								<div></div>
							</div>
							<div class="clearfix"></div>
							<div class="distributor_info marginTop10">
								<div><label>Date</label></div>
								<div>
								<div class="expected_input">
                                        <input type="text" id="current-date" placeholder="Select Date" readonly>
                                    </div>
								</div>
								<div class="ml5percent"><label>Expected Delivery Date</label></div>
								<div>
								<div class="expected_input">
                                        <i class="fa fa-calendar icon_calendar" aria-hidden="true"></i>
                                        <input type="text" id="delivery-date" placeholder="Select Date" onchange="checkStartEndDate();">
                                </div>
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
                            <div class="cart-footer-main"></div>
							<div class="row">
							<div class="col-md-6">
							<div class="sales_notes marginTop20">
                                <label>Notes: (Optional)</label>
                                <textarea class="textarea64" id="note"></textarea>
                            </div>
							</div>
							<div class="col-md-6">
							<div class="sales_notes marginTop20">
                                <label>Shipping Details: (Optional)</label>
                                <textarea class="textarea64" id="shipping-detail"></textarea>
                            </div>
							</div>
							</div>
							<div class="row mt-4 text-right">
							<div class="col-md-12">
							<a class="btn btn-warning" href="dispatch-list">Back</a><button id="loginCheckout" class="btn btn-danger ml-2" type="button" name="" value="true" onclick="CancelInvoice();"><span>Clear</span></button><button id="loginCheckout" class="btn btn-success ml-2" type="button" name="" value="true" id="generate-invoice" onclick="generationDispatch();"><span>Generate Dispatch</span></button>
							</div></div>
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
</section>
</div>

<div class="cd-popup" role="alert" id="lot_numbers_popup">
    <div class="cd-popup-container">
        <h3 class="headPopup">Select Lot Number<a href="#0" class="cd-popup-close img-replace">Close</a></h3>
        <div class="popup_input" id="lot_numbers_content">
            <table class="table_recieved" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th></th>
                        <th>Lot Number</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody id="lot_quantity"></tbody>
            </table>
            <div class="text-center marginTop20" id="lot_select"></div>
        </div>
    </div>
</div>
<div class="cd-popup" role="alert" id="items_qty_popup">
    <div class="cd-popup-container">
        <h3 class="headPopup">Message<a href="#0" class="cd-popup-close img-replace">Close</a></h3>
        <div class="popup_input" id="message">
        You do not have <span id="product_qty_add_qty"></span> sufficient product quantity in your inventory. Do you still want to add this item?
        </div>
        <ul class="cd-buttons">
            <li><a href="javascript:void(0);" onclick="setItemsAlreadyExits('1');">Yes</a></li>
            <li><a href="javascript:void(0);" onclick="setItemsAlreadyExits('0');">No</a></li>
        </ul>
        <input type="hidden" id="add_item_id" value="" />
        <input type="hidden" id="add_item_lot" value="" />
    </div>
</div>
<div class="cd-popup" role="alert" id="items_qty_popup_add_qty">
    <div class="cd-popup-container">
        <h3 class="headPopup">Message<a href="#0" class="cd-popup-close img-replace">Close</a></h3>
        <div class="popup_input" id="message_add_qty">
        You do not have <span id="product_qty_add_qty"></span> sufficient product quantity in your inventory. Do you still want to add this item?
        </div>
        <ul class="cd-buttons">
            <li><a href="javascript:void(0);" onclick="addItemQty('1');">Yes</a></li>
            <li><a href="javascript:void(0);" onclick="addItemQty('0');">No</a></li>
        </ul>
        <input type="hidden" id="id_add_qty" value="" />
    </div>
</div>
<?php include_once 'footer-copy.php'; ?>
<script src="<?php echo $home_url; ?>assets/javascript/distributor/dispatch-generate.js"></script>

<script>
    var example1 = flatpickr('#delivery-date');
</script>
</body>

</html>