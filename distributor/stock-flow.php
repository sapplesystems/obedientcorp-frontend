<?php
include_once 'header.php';
if (empty($_SESSION['distributor_login_resp']['id']) || $_SESSION['distributor_login_resp']['id'] == '') {
    echo '<script type="text/javascript">window.location.href = "login";</script>';
    exit;
}
?>
<style>

</style>
<div id="global-viewport" class='global-viewport m-pikabu-viewport'>
    <div class="global-viewport-container m-pikabu-container">
        <div id="mainContent" role="main" class="content" tabindex="-1">
            <!-- Report any requested source code -->

            <!-- Report the active source code -->
            <div class="responsiveCenteredContent js-cart">
                <div class="shoppingCartContainer">
                    <h1 class="headTop">Stock Flow</h1>
                    <!-- Start of cart's first part -->
                    <div>
                    <h2 class="headTop"><?php echo $name.'(' .$username . ')';?></h2>
                        <div class="left_sec">
                            <div class="distributor_info">
                                <div><strong>Start Date:</strong> </div>
                                <div>
                                    <div class="expected_input">
                                        <i class="fa fa-calendar icon_calendar" aria-hidden="true"></i>
                                        <input type="text" id="start-date" placeholder="Select Date" onchange="checkStartEndDate();">
                                    </div>
                                </div>
                                <div><strong>End Date:</strong> </div>
                                <div>
                                    <div class="expected_input">
                                        <i class="fa fa-calendar icon_calendar" aria-hidden="true"></i>
                                        <input type="text" id="end-date" placeholder="Select Date" onchange="checkStartEndDate();">
                                    </div>
                                </div>
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
                                <div><strong>Category:</strong> </div>
                                <div><select id="categories"><select></div>
                                <div><strong>Lot Number:</strong> </div>
                                <div><input type="text" id="lot-no" name="lot_no" value=""/></div>
                            </div>
                            <div class="clear_both"></div>
                            <div class="distributor_info marginTop10">
                                <button id="loginCheckout" class="btn_placeOrder cx-button bgBTN-cancel  text-bold marginTop20" type="button" name="" value="true" onclick="CancelSearch();"><span>Clear</span></button><button id="loginCheckout" class="btn_placeOrder cx-button bgBTN text-bold ml2Percent marginTop20" type="button" name="" value="true" id="generate-invoice" onclick="searchItemsStock();"><span>Search</span></button>
                            </div>
                            <div class="clear_both"></div>
                            <div class="overflow_auto marginTop20">
                                <div><strong>Items List:</strong> </div>
                                <table class="table_recieved" cellpadding="0" cellspacing="0" width="100%" id="stock-flow">
                                </table>
                            </div>
                        </div>
                        <div class="right_sec">
                        </div>
                    </div>
                    <div class="clear_both"></div>
                    <div class="mt-20-items">
                        <a class="btn-back-items" href="dashboard">Back</a>
                        <a class="btn-back-items" href="javascript:void(0);" onclick="exportTableToExcel('stock-flow','stock_flow');">Download Excel</a>
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
<?php include_once 'footer.php'; ?>
<script src="<?php echo $home_url; ?>assets/javascript/distributor/stock-flow.js"></script>
<script>
    var example = flatpickr('#start-date');
    var example1 = flatpickr('#end-date');
    function exportTableToExcel(tableID, filename = '') {
        var downloadLink;
        var dataType = 'application/vnd.ms-excel';
        var tableSelect = document.getElementById(tableID);
        var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

        // Specify file name
        filename = filename ? filename + '.xls' : 'excel_data.xls';

        // Create download link element
        downloadLink = document.createElement("a");

        document.body.appendChild(downloadLink);

        if (navigator.msSaveOrOpenBlob) {
            var blob = new Blob(['\ufeff', tableHTML], {
                type: dataType
            });
            navigator.msSaveOrOpenBlob(blob, filename);
        } else {
            // Create a link to the file
            downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

            // Setting the file name
            downloadLink.download = filename;

            //triggering the function
            downloadLink.click();
        }
    }
</script>