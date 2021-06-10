<?php
include_once 'header.php';
?>
<style>

  [type="radio"]:checked+label::before,
  [type="radio"]:not(:checked)+label::before {
    width: 20px !important;
    height: 20px !important;
  }

  .content {
    background: transparent !important;
  }

  .productContainerBody {
    background: transparent !important;
  }

  input[type="text"],
  select,
  textarea {
    border: 1px solid #555555 !important;
    background-color: transparent !important;
    color: #999999 !important;
  }

  input[type="text"]:hover,
  input[type="text"]:focus {
    outline: 1px solid #555555 !important;
    border: 1px solid #555555 !important;
  }

  input[readonly=""] {
    background-color: #333333 !important;
  }

  .distributor_info>div label {
    color: #ffffff !important;
    font-weight: normal !important;
  }

  .headTop {
    color: #ffffff !important;
  }

  .sales_notes label {
    color: #ffffff !important;
  }

  .sales_notes label {
    color: #ffffff !important;
  }

  .shoppingCartContainer .columnHeads {
    border: #322f2f 1px solid !important;
    background-color: transparent !important;
  }

  .productContainerBody {
    border: 1px solid #322f2f !important;
  }

  .shoppingCartContainer .columnCell {
    line-height: 20px;
  }

  .value-button {
    border: 1px solid #555 !important;
    background: transparent !important;
  }

  .sales_notes form label {
    font-weight: normal !important;
  }

  .flatpickr-calendar {
    left: initial !important;
    right: 0;
  }
  
  .ui-widget.ui-widget-content {
    overflow-y: auto;
    max-height: 400px;
    overflow-x: hidden;
}
  
  #lot_numbers_content > p {
    display: inline-block;
    padding-top: 0px;
    padding-bottom: 20px;
    width: 49%;
    text-align: left;
}
#lot_numbers_content > p label {
    font-weight: bold;
}
#lot_numbers_content {
    text-align: left;
}
#lot_numbers_popup .cd-popup-container {
    max-width: 400px;
	background: #151519;
	color: #fff;
}
#lot_numbers_popup .table-bordered {
    border: 1px solid #444444 !important;
	color: #ffffff !important;
}
#lot_numbers_popup th, #lot_numbers_popup td{text-align:center;}
#lot_numbers_popup td label{margin-bottom:0px !important;}
#lot_numbers_popup .headPopup{border-bottom: 1px solid #444444 !important;}
option {
    background-color: #ffffff !important;
    font-size: 12px !important;
	color:#333333 !important;
}
.shoppingCartContainer{color:#ffffff;}
.shoppingCartContainer .columnHeadsRow h1, .shoppingCartContainer .columnHeadsRow h6 {
    color: #ffffff !important;
}
.shoppingCartContainer .columnCell {
    color: #ffffff !important;
}
.price{color: #ffffff !important;}
</style>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $home_url; ?>assets/javascript/distributor/css/all.css" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $home_url; ?>assets/javascript/distributor/css/flatpickr.css" />
<div class="main-panel ">
  <div class="content-wrapper p-3">
    <div id="global-viewport" class='global-viewport m-pikabu-viewport'>
      <div class="global-viewport-container m-pikabu-container">

        <div id="mainContent" role="main" class="content" tabindex="-1">

          <!-- Report any requested source code -->

          <!-- Report the active source code -->

          <div class="responsiveCenteredContent js-cart">
            <div class="shoppingCartContainer mt-0">
              <h1 class="headTop">Dispatch Generation</h1>
              <!-- Start of cart's first part -->
              <div class="js-cart-items">
                <div class="cartProductsContainer cx-copy">
                  <div class="distributor_info">
                    <div><label>Select Distributer From</label></div>
                    <div>
                      <select id="distributor-list-from" class="dist-list ">

                      </select>
                    </div>
                    <div class="ml5percent"><label>Distributer Name and Address</label></div>
                    <div>
                      <input type="text" placeholder="" id="distributor-from" data-value="" readonly />
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="distributor_info mt-2">
                    <div><label>Select Distributer To</label></div>
                    <div>
                      <select id="distributor-list-to" class="dist-list-to ">
                      </select>
                    </div>
                    <div class="ml5percent"><label>Distributer Name and Address</label></div>
                    <div>
                      <input type="text" placeholder="" id="distributor-to" data-value="" readonly />
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

                    <div class="columnHeads bt-None" style="border-bottom:0px !important; border-top:0px !important;">
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

                    <div class="columnHeads taxDiv" style="border-bottom:0px !important; border-top:0px !important;">
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

                  <div class="sales_notes mtNone">
                    <label>Dispatch Type</label>
                    <form action="#" class="marginTop10">
                      <p>
                        <input type="radio" id="test2" name="dispatch_type" value="normal">
                        <label for="test2">Normal</label>
                      </p>
                      <p>
                        <input type="radio" id="test3" name="dispatch_type" value="return">
                        <label for="test3">Return</label>
                      </p>
                    </form>
                  </div>
                  <div class="sales_notes marginTop20">
                    <div class="widthHalf">
                      <label>Date</label>
                      <div class="expected_input">
                        <input type="text" id="current-date" placeholder="Select Date" readonly>
                      </div>
                    </div>
                    <div class="widthHalf ml4percent">
                      <label>Expected Delivery Date</label>
                      <div class="expected_input">
                        <i class="fa fa-calendar icon_calendar" aria-hidden="true"></i>
                        <input type="text" id="delivery-date" placeholder="Select Date" onchange="checkStartEndDate();">
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
                  <button id="loginCheckout" class="btn btn-gradient-warning cx-button full-width text-bold marginTop20" type="button" name="" value="true" onclick="CancelInvoice();"><span>CLEAR</span></button><button id="loginCheckout" class="btn btn-gradient-success cx-button full-width text-bold ml2Percent marginTop20" type="button" name="" value="true" id="generate-invoice" onclick="generationDispatch();"><span>GENERATE DISPATCH</span></button>
                  <a class="btn btn-gradient-danger pull-right" href="distributor-dispatch-list">Back </a>
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
  <div class="cd-popup" role="alert" id="lot_numbers_popup">
    <div class="cd-popup-container">
        <h3 class="headPopup">Select Lot Number<a href="#0" class="cd-popup-close img-replace">Close</a></h3>
        <div class="popup_input" id="lot_numbers_content">
            <table class="table table-bordered" style="color: #000;">
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
  <?php include_once 'footer.php'; ?>
  <!-- JS for autocomplete search-->
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="<?php echo $home_url; ?>assets/javascript/distributor/js/flatpickr.js"></script>
  <script src="<?php echo $home_url; ?>assets/javascript/distributor/admin-dispatch-generate.js"></script>
  <script>
    /* $('select').each(function() {
    var $this = $(this),
      numberOfOptions = $(this).children('option').length;

    $this.addClass('select-hidden');
    $this.wrap('<div class="select"></div>');
    $this.after('<div class="select-styled"></div>');

    var $styledSelect = $this.next('div.select-styled');
    $styledSelect.text($this.children('option').eq(0).text());

    var $list = $('<ul />', {
      'class': 'select-options dist-list ',
      'id':'distributor-list'
    }).insertAfter($styledSelect);

    for (var i = 0; i < numberOfOptions; i++) {
      $('<li />', {
        text: $this.children('option').eq(i).text(),
        rel: $this.children('option').eq(i).val()
      }).appendTo($list);
    }

    var $listItems = $list.children('li');

    $styledSelect.click(function(e) {
      e.stopPropagation();
      $('div.select-styled.active').not(this).each(function() {
        alert("kkkk");
        $(this).removeClass('active').next('ul.select-options').hide();
      });
      $(this).toggleClass('active').next('ul.select-options').toggle();
    });

    $listItems.click(function(e) {
      e.stopPropagation();
      $styledSelect.text($(this).text()).removeClass('active');
      $this.val($(this).attr('rel'));
      $list.hide();
      //console.log($this.val());
    });

    $(document).click(function() {
      $styledSelect.removeClass('active');
      $list.hide();
    });

  });*/
  </script>

  <script>
    var example1 = flatpickr('#delivery-date');
  </script>
  </body>

  </html>