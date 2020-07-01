<?php
include_once 'header.php';
if (empty($_SESSION['distributor_login_resp']['id']) || $_SESSION['distributor_login_resp']['id'] == '') {
    echo '<script type="text/javascript">window.location.href = "login";</script>';
    exit;
}

$dispatch_id = 0;
if (isset($_REQUEST['dispatch_id'])) {
    $dispatch_id = $_REQUEST['dispatch_id'];
}
?>
<div id="global-viewport" class='global-viewport m-pikabu-viewport'>
    <div class="global-viewport-container m-pikabu-container">

        <div id="mainContent" role="main" class="content" tabindex="-1">

            <!-- Report any requested source code -->

            <!-- Report the active source code -->


            <div class="responsiveCenteredContent js-cart">
                <div class="shoppingCartContainer">
                    <h1 class="headTop">Dispatch Item Received</h1>
                    <!-- Start of cart's first part -->
                    <div>
                        <div class="left_sec">
                            <div class="distributor_info">
                                <div><strong>Dipatch By:</strong> </div>
                                <div><span class="" id="dist-name"></span></div>
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
                        </div>
                        <div class="clear_both"></div>
                        <div class="overflow_auto">
                            <table class="table_recieved" cellpadding="0" cellspacing="0" width="100%" id="recieved-detail">
                            </table>
                        </div>
                        <div class="bottom_section">
                            <div class="left_sec">
                                <div class="bottom_note">
                                    <label>Note</label>
                                    <textarea id="note"></textarea>
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
                            <a class="btn-update-items" onclick="updateDispatchItems();" id="update-items">Update Items</a>&nbsp;
                            <a class="btn-back-items" href="item-received-list">Back</a>
                        </div>
                    </div>

                    <!-- ====================== snippet ends here ======================== -->

                </div>
            </div>

            <div class="clear"></div>
        </div>

    </div>
</div>

<!-- Demandware Analytics code 1.0 (body_end-analytics-tracking-asynch.js) -->

<?php include_once 'footer.php'; ?>
<script type="text/javascript">
    var dispatch_id = "<?php echo $dispatch_id; ?>";
</script>
<script src="<?php echo $home_url; ?>assets/javascript/distributor/dispatch-item-recieved.js"></script>