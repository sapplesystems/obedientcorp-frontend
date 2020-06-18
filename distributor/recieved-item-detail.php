<?php
include_once 'header-copy.php';
if (empty($_SESSION['distributor_login_resp']['id']) || $_SESSION['distributor_login_resp']['id'] == '') {
    echo '<script type="text/javascript">window.location.href = "login";</script>';
    exit;
}

$dispatch_id = 0;
if (isset($_REQUEST['dispatch_id'])) {
    $dispatch_id = $_REQUEST['dispatch_id'];
}
?>
<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-4">Recieved Item Details</h4>
                        <div class="overflowAuto">
                            <table class="table table-bordered custom_action" id="recieved-detail">
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 text-right">
                <a class="btn btn-danger btn-sm" href="item-received-list">Back</a>&nbsp;
            </div>
        </div>
       
    </div>

    <!-- content-wrapper ends -->
    <?php include_once 'footer-copy.php'; ?>
    <script type="text/javascript">
        var dispatch_id = "<?php echo $dispatch_id; ?>";
        getDistributorDetail(dispatch_id);

        function getDistributorDetail(dispatch_id) {
            showLoader();
            $.ajax({
                url: base_url + 'dispatch/details',
                type: 'post',
                data: {
                    dispatch_id: dispatch_id
                },
                success: function(response) {
                    var html = '<thead>\n\
                                <tr>\n\
                                <th>Sr.No.</th>\n\
                                <th>Product Name</th>\n\
                                <th>Product Price</th>\n\
                                <th>Product Quantity</th>\n\
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
                              <td>' + value.dispatched_items_quantity + '</td>\n\
                              <td>' + lot_no + '</td>\n\
                          </tr>';
                            i = i + 1;
                        });
                        html += '</tbody>';
                        $('#recieved-detail').html(html);
                        generateDataTable('recieved-detail');
                        hideLoader();
                    }
                }
            });
        }
    </script>