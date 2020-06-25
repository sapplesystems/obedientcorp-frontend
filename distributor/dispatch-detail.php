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
<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <h5 class="card-title mb-4">Received To: <span id="dist-to"></span></h5>
                        <div class="row mb-4">
                                <div class="col-4">SubTotal: <span id="subtotal"></span></div>
                                <div class="col-4">Tax: <span id="tax">0</span></div>
                                <div class="col-4">Total: <span id="total"></span></div>
                            </div>
                        <h4 class="card-title mb-4">Dispatch Item Details</h4>
                        <div class="overflowAuto">
                            <table class="table table-bordered custom_action" id="dispatch-detail">
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 text-right">
                <a class="btn btn-danger mt-3" href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Back</a>&nbsp;
            </div>
        </div>

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
                            var lot_no = '';
                            if (value.lot_no != null && value.lot_no != '') {
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
                        $('tax').html(0);
                        $('#total').html(response.DispatcheDetails.total);
                        generateDataTable('dispatch-detail');
                        hideLoader();
                    } else {
                        showSwal('error', response.data);
                        hideLoader();
                    }
                }
            });
        }
    </script>