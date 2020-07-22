<?php
include_once 'header-copy.php';
if (empty($_SESSION['distributor_login_resp']['id']) || $_SESSION['distributor_login_resp']['id'] == '') {
    echo '<script type="text/javascript">window.location.href = "login";</script>';
    exit;
}

$dispatch_id = 0;
$distributor_id = 0;
if (isset($_REQUEST['dispatch_id']) && isset($_REQUEST['dist_id'])) {
    $dispatch_id = $_REQUEST['dispatch_id'];
    $distributor_id = $_REQUEST['dist_id'];
}
?>
<style>

</style>
<div class="main-content">
        <section class="section">
    <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
				<div class="card-header">
					 <h4>Dispatch Items</h4>
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
                    <div>
					<div class="left_sec">
                        <div class="distributor_info">
                            <div><strong>Dipatch By:</strong> </div>
                            <div><span class="" id="dist-from"></span></div>
                            <div><strong>Address:</strong> </div>
                            <div><span class="" id="dist-add-from"></span></div>
                        </div>
						<div class="clear_both"></div>
                        <div class="distributor_info marginTop10">
                            <div><strong>Dipatch To:</strong> </div>
                            <div><span class="" id="dist-to"></span></div>
                            <div><strong>Address:</strong> </div>
                            <div><span class="" id="dist-add-to"></span></div>
                        </div>
						<div class="clear_both"></div>
                        <div class="distributor_info marginTop10">
                            <div><strong>Dispatch Number:</strong> </div>
                            <div><span class="" id="dispatch-no"></span></div>
                            <div><strong>Dispatch Type:</strong> </div>
                            <div><span class="" id="dispatch-type"></span></div>
							</div>
							<div class="clear_both"></div>
                        <div class="marginTop20 scroll-m">
                            <table class="table_recieved" cellpadding="0" cellspacing="0" width="100%" id="dispatch-detail">
                            </table>
                        </div>
						</div>
						<div class="right_sec">
						<div class="sales_notes mtNone">
							<label>Status:</label>
							<div><span class="" id="dispatch-status"></span></div>
							</div>
							
							
							<div class="sales_notes marginTop20">
							<div class="widthHalf">
								<label>Date Of Dispatch:</label>
								<div><span class="" id="dispatch-date"></span></div>
							</div>
							<div class="widthHalf ml4percent">
							<label>Date Of Receive:</label>
							<div><span class="" id="receive-date"></span></div>
							</div>
						</div>
						<div class="clear_both"></div>
						<div class="bottom_note marginTop20">
                                    <label>Notes:</label>
                                    <textarea id="note"></textarea>
                                </div>
								<div class="bottom_note marginTop20">
                                    <label>Shipping Details:</label>
                                    <textarea id="ship-detail"></textarea>
                                </div>
								<div class="bottom_tax">
                                    <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                        <tbody>
                                            <tr>
                                                <td width="35%"><strong>Subtotal</strong></td>
                                                <td>&#8377;<span id="subtotal"></span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Tax</strong></td>
                                                <td>&#8377;<span id="tax">0</span></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Total</strong></td>
                                                <td>&#8377;<span id="total"></span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
						</div>
						</div>
                        <div class="clear_both"></div>
                        <div class="mt-20-items">
                            <a class="btn btn-warning" href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Back</a>
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
</section>
</div>
<!-- content-wrapper ends -->
<?php include_once 'footer-copy.php'; ?>
<script type="text/javascript">
    var dispatch_id = "<?php echo $dispatch_id; ?>";
    var distributor_id = "<?php echo $distributor_id; ?>";
    getDistributorDetail(dispatch_id);

    function getDistributorDetail(dispatch_id) {
        showLoader();
        $.ajax({
            url: base_url + 'dispatch/details',
            type: 'post',
            data: {
                dispatch_id: dispatch_id,
                distributor_id: distributor_id
            },
            success: function(response) {
                var html = '<thead>\n\
                                <tr>\n\
                                <th>Sr.No.</th>\n\
                                <th>Product Name</th>\n\
                                <th>Product Price</th>\n\
                                <th>Product Code</th>\n\
                                <th>Dispatch Product Qty</th>\n\
                                <th>Received Product Qty</th>\n\
                                <th>Lot Number</th>\n\
                                </tr>\n\
                                </thead><tbody>';
                if (response.status == "success") {
                    var i = 1;
                    $.each(response.data, function(key, value) {
                        var lot_no = '-';
                        if (value.lot_no != null && value.lot_no != '' && value.lot_no != '0') {
                            lot_no = value.lot_no;
                        }
                        html += '<tr id="tr_' + value.id + '" role="row" >\n\
                              <td class="sorting_1">' + i + '</td>\n\
                              <td>' + value.product_name + '</td>\n\
                              <td>' + value.product_price + '</td>\n\
                              <td>' + value.sku + '</td>\n\
                              <td>' + value.dispatched_items_quantity + '</td>\n\
                              <td>' + value.received_items_quantity + '</td>\n\
                              <td>' + lot_no + '</td>\n\
                          </tr>';
                        i = i + 1;
                    });
                    html += '</tbody>';
                    $('#dispatch-detail').html(html);
                    $('#dist-from').html(response.DispatcheDetails.distributor_name_from);
                    $('#dist-to').html(response.DispatcheDetails.distributor_name_to);
                    $('#subtotal').html(response.DispatcheDetails.subtotal);
                    $('#tax').html((Number(response.DispatcheDetails.cgst) + Number(response.DispatcheDetails.sgst) + Number(response.DispatcheDetails.igst)));
                    $('#dist-add-to').html(response.DispatcheDetails.distributor_address_to);
                    $('#dist-add-from').html(response.DispatcheDetails.distributor_address_from);
                    $('#dispatch-no').html(response.DispatcheDetails.dispatch_no);
                    $('#dispatch-type').html(response.DispatcheDetails.dispatch_type);
                    $('#dispatch-date').html(response.DispatcheDetails.dispatch_date);
                    $('#total').html(response.DispatcheDetails.total);
                    $('#dispatch-status').html(response.DispatcheDetails.status);
                    if(response.DispatcheDetails.received_date == null)
                    {
                        $('#receive-date').html(response.DispatcheDetails.expected_delivery_date);
                    }
                    else{
                        $('#receive-date').html(response.DispatcheDetails.received_date);
                    }
                    
                    $('#ship-detail').html(response.DispatcheDetails.shipping_details);
                    $('#note').html(response.DispatcheDetails.note);
                    //generateDataTable('dispatch-detail');
                    hideLoader();
                } else {
                    showSwal('error', response.data);
                    hideLoader();
                }
            }
        });
    }
</script>