<?php
include_once 'header-copy.php';
if (empty($_SESSION['distributor_login_resp']['id']) || $_SESSION['distributor_login_resp']['id'] == '') {
    echo '<script type="text/javascript">window.location.href = "login";</script>';
    exit;
}
?>
<style>
    #stock-detail-popup .cd-popup-container {
        max-width: 1300px;
		margin-top: 20px;
    }

    #stock-detail-popup .cd-popup-content {
        padding: 20px;
    }
.distributor_info > div:first-child, .distributor_info > div:nth-child(3){width:15%;}
.distributor_info > div:nth-child(3){width:15%; margin-left:10%;}
</style>
<div class="main-content">
        <section class="section">
    <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
				<div class="card-header">
					 <h4>Stock Flow</h4>
				</div>
				<div class="card-body">
<div id="global-viewport" class='global-viewport m-pikabu-viewport'>
    <div class="global-viewport-container m-pikabu-container">
        <div id="mainContent" role="main" class="content" tabindex="-1">
            <!-- Report any requested source code -->

            <!-- Report the active source code -->
            <div class="responsiveCenteredContent js-cart">
                <div class="shoppingCartContainer mt-0">
                    <!-- Start of cart's first part -->
                    <div>
                        <h2 class="headTop"><?php echo $name . '(' . $username . ')'; ?></h2>
                        <div class="">
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
                                <div><input type="text" id="lot-no" name="lot_no" value="" /></div>
                            </div>
                            <div class="clear_both"></div>
                            <div class="distributor_info mt-4 text-right">
                                <button id="loginCheckout" class="btn btn-light" type="button" name="" value="true" onclick="CancelSearch();"><span>Clear</span></button><button id="loginCheckout" class="btn btn-dark ml-2" type="button" name="" value="true" id="generate-invoice" onclick="searchItemsStock();"><span>Search</span></button>
                            </div>
                            <div class="clear_both"></div>
                            <div class="marginTop20">
                                <div><strong>Items List:</strong> </div>
								<div class="scroll-m">
                                <table class="table_recieved" cellpadding="0" cellspacing="0" width="100%" id="stock-flow" style="border: #ebebeb 1px solid;">
                                </table>
								</div>
                            </div>
                        </div>
                        <div class="">
                        </div>
                    </div>
                    <div class="clear_both"></div>
                    <div class="mt-20-items">
                        <a class="btn btn-warning" href="dashboard">Back</a><a class="btn btn-info ml-2" href="javascript:void(0);" onclick="exportTableToExcel();">Download Excel</a><a class="btn btn-success ml-2" href="javascript:void(0);" onclick="print('stock-flow');">Print</a>
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
<div class="cd-popup" role="alert" id="stock-detail-popup">
    <div class="cd-popup-container">
        <h3 class="headPopup">Stock Flow Detail<a href="#0" class="cd-popup-close img-replace">Close</a></h3>
        <div class="cd-popup-content">
		<div class="scroll-m">
            <table class="table_recieved" cellpadding="0" cellspacing="0" width="100%" id="stock-detail">

            </table>
			</div>
        </div>
        <a class="btn btn-info mb-4" href="javascript:void(0);" onclick="exportTableToExcelOnPopup();">Download Excel</a>
        <a class="btn btn-success mb-4" href="javascript:void(0);" onclick="print('stock-detail');">Print</a>
    </div>
</div>
<!-- content-wrapper ends -->
<?php include_once 'footer-copy.php'; ?>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<!--script src="https://cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script-->
<script src="<?php echo $home_url; ?>assets/javascript/distributor/stock-flow.js"></script>
<script>
    var example = flatpickr('#start-date');
    var example1 = flatpickr('#end-date');

    function exportTableToExcel() {
       $('.download-excel').click();
    }
    function exportTableToExcelOnPopup() {
        $('.download-excel-item').click();
    }

    function print(id) {
        var tab = document.getElementById(id);
        var win = window.open('', '', 'height=700,width=700');
        win.document.write(tab.outerHTML);
        win.document.close();
        win.print();

    }
</script>