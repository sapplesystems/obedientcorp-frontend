<?php
include_once 'header.php';
?>

<div id="global-viewport" class='global-viewport m-pikabu-viewport'>
  <div class="global-viewport-container m-pikabu-container">

    <div id="mainContent" role="main" class="content" tabindex="-1">

      <!-- Report any requested source code -->

      <!-- Report the active source code -->

      <div class="responsiveCenteredContent js-cart">
      <a class="btnBack" href="dispatch-list">Back</a>
        <div class="shoppingCartContainer">
          <h1 class="headTop">Dispatch Generation</h1>
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
              <button id="loginCheckout" class="btn_placeOrder cx-button bgBTN-cancel full-width text-bold marginTop20" type="button" name="" value="true" onclick="CancelInvoice();"><span>CLEAR</span></button><button id="loginCheckout" class="btn_placeOrder cx-button bgBTN full-width text-bold ml2Percent marginTop20" type="button" name="" value="true" id="generate-invoice" onclick="generationDispatch();"><span>GENERATE DISPATCH</span></button>
            </div>
          </div>

          <!-- ====================== snippet ends here ======================== -->

        </div>
      </div>

      <div class="clear"></div>
    </div>

  </div>
</div>
<?php include_once 'footer.php'; ?>
<script src="<?php echo $home_url; ?>assets/javascript/distributor/dispatch-generate.js"></script>
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