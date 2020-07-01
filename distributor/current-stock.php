<?php
include_once 'header.php';
if (empty($_SESSION['distributor_login_resp']['id']) || $_SESSION['distributor_login_resp']['id'] == '') {
    echo '<script type="text/javascript">window.location.href = "login";</script>';
    exit;
}
?>
        <div id="global-viewport" class='global-viewport m-pikabu-viewport'>
            <div class="global-viewport-container m-pikabu-container">
                <div id="mainContent" role="main" class="content" tabindex="-1">
                    <!-- Report any requested source code -->

                    <!-- Report the active source code -->
                    <div class="responsiveCenteredContent js-cart">
                        <div class="shoppingCartContainer">
                            <h1 class="headTop">Current Stock</h1>
                            <!-- Start of cart's first part -->
                            <div>
                                <h2 class="headTop"><?php echo $name . '(' . $username . ')'; ?></h2>
                                <div class="left_sec">
                                    <div class="distributor_info">
                                        <div><strong>Date:</strong> </div>
                                        <div>
                                            <div class="expected_input">
                                                <i class="fa fa-calendar icon_calendar" aria-hidden="true"></i>
                                                <input type="text" id="search-date" placeholder="Select Date">
                                            </div>
                                        </div>
                                        <div><strong>Category:</strong> </div>
                                        <div><select id="categories"><select></div>
                                    </div>
                                    <div class="clear_both"></div>
                                    <div class="distributor_info marginTop10">
                                        <div><strong>Items:</strong> </div>
                                        <div>
                                            <input type="text" id="search-product" name="search_product" value="">
                                            <input type="hidden" id="item-name" value="" />
                                        </div>
                                        <div><strong>Item Code:</strong> </div>
                                        <div>
                                            <input type="text" id="item-code" name="item_code" value="">
                                        </div>

                                    </div>
                                    <div class="clear_both"></div>
                                    <div class="distributor_info marginTop10">
                                        <div><strong>Check Stock Items:</strong> </div>
                                        <div>
                                            <input type="checkbox" id="stock-items" name="stock_items" value="1">
                                        </div>

                                    </div>
                                    <div class="clear_both"></div>
                                    <div class="distributor_info marginTop10">
                                        <button id="loginCheckout" class="btn_placeOrder cx-button bgBTN-cancel text-bold marginTop20" type="button" name="" value="true" onclick="CancelSearch();"><span>Clear</span></button><button id="loginCheckout" class="btn_placeOrder cx-button bgBTN text-bold ml2Percent marginTop20" type="button" name="" value="true" id="generate-invoice" onclick="searchItemsStock();"><span>SEARCH</span></button>
                                    </div>
                                    <div class="clear_both"></div>
                                    <div class="overflow_auto marginTop20">
                                        <div><strong>Items List:</strong> </div>
                                        <table class="table_recieved" cellpadding="0" cellspacing="0" width="100%" id="stock-detail">
                                        </table>
                                    </div>
                                </div>
                                <div class="right_sec">
                                </div>
                            </div>
                            <div class="clear_both"></div>
                            <div class="mt-20-items">
                                <a class="btn-back-items" href="dashboard">Back</a>
                                <a class="btn-back-items" href="javascript:void(0);" onclick="exportTableToExcel('stock-detail','current_stock');">Download Excel</a>
                            </div>
                        </div>
                        <!-- ====================== snippet ends here ======================== -->
                    </div>
                </div>

                <div class="clear"></div>
            </div>

        </div>
    </div>
    <!-- content-wrapper ends -->
    <?php include_once 'footer.php'; 
    ?>
    <script src="<?php echo $home_url; ?>assets/javascript/distributor/inventory-report.js"></script>
    <script>
        var example1 = flatpickr('#search-date');
    </script>