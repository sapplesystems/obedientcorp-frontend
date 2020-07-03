<?php
include_once 'header.php';
$dispatch_id = 0;
$distributor_id = 0;
if (isset($_REQUEST['dispatch_id']) && isset($_REQUEST['dist_id'])) {
    $dispatch_id = $_REQUEST['dispatch_id'];
    $distributor_id = $_REQUEST['dist_id'];
}
?>
<style>
#dispatch-detail tr th:nth-child(8){min-width:200px;}
#dispatch-detail tr th:last-child{min-width:200px;}
.overflowAuto{overflow:auto;padding-bottom: 20px;}
</style>
<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
					<div class="row mb-4">
						<div class="col-md-6"><h3 class="card-title">Dispatch By: <span class="text-primary" id="dist-from"></span></h4></div>
						<div class="col-md-6"><h3 class="card-title">Address: <span class="text-primary" id="dist-add-from"></span></h4></div>
						<div class="col-md-6"><h3 class="card-title">Dispatch To: <span class="text-primary" id="dist-id"></span></h4></div>
						<div class="col-md-6"><h3 class="card-title">Address: <span class="text-primary" id="dist-add-to"></span></h4></div>
						<div class="col-md-6"><h3 class="card-title">Dispatch Number: <span class="text-primary" id="dispatch-no"></span></h4></div>
						<div class="col-md-6"><h3 class="card-title">Dispatch Type: <span class="text-primary" id="dispatch-type"></span></h4></div>
						<div class="col-md-6"><h3 class="card-title">Status: <span class="text-primary" id="dispatch-status"></span></h4></div>
						<div class="col-md-6"><h3 class="card-title">Date Of Dispatch: <span class="text-primary" id="dispatch-date"></span></h4></div>
						<div class="col-md-6"><h3 class="card-title">Date Of Receive: <span class="text-primary" id="receive-date"></span></h4></div>
					</div>
                        <div class="row mb-4">
                                <div class="col-2">SubTotal: <span id="subtotal"></span></div>
                                <div class="col-2">Tax: <span id="tax"></span></div>
                                <div class="col-2">Total: <span id="total"></span></div>
                            </div>
                            <h4 class="card-title mb-4">Items Details</h4>
                            <div class="overflowAuto">
                                <table class="table table-bordered custom_action" id="dispatch-detail">
                                </table>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 text-right">

            </div>
            <div class="col-sm-12 text-right mt-4">
			<a class="btn btn-danger" href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Back</a>
                <a class="btn btn-gradient-success ml-2" href="#" onclick="updateDispatchItemStatus();">Update</a>             
            </div>
        </div>

    </div>

    <!-- content-wrapper ends -->
    <?php include_once 'footer.php'; ?>
    <script type="text/javascript">
        var dispatch_id = "<?php echo $dispatch_id; ?>";
        var distributor_id = "<?php echo $distributor_id; ?>";
        getDispatchDetail(dispatch_id, distributor_id);
        //function for get Dispatch Detail
        function getDispatchDetail(dispatch_id, distributor_id) {
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
                        <th>Product Code</th>\n\
                        <th>Product Price</th>\n\
                        <th>Dispatch Item Qty</th>\n\
                        <th>Receive Item Qty</th>\n\
                        <th>Lot Number</th>\n\
                        <th>Comment</th>\n\
                        <th>Action</th>\n\
                        </tr>\n\
                        </thead><tbody>';
                    if (response.status == "success") {
                        console.log(response);
                        var i = 1;
                        $.each(response.data, function(key, value) {
                            var lot_no = '';
                            if (value.lot_no != null && value.lot_no != '' && value.lot_no != '0') {
                                lot_no = value.lot_no;
                            }
                            var status = '<select id="status_' + value.id + '">\n\
                                <option value="">--Select--</option>\n\
                                <option value="approved">Approved</option>\n\
                                <option value="disapproved">Disapproved</option>\n\
                                </select>';
                            html += '<tr id="tr_' + value.id + '" role="row">\n\
                      <td class="sorting_1">' + i + '</td>\n\
                      <td>' + value.product_name + '</td>\n\
                      <td>' + value.sku + '</td>\n\
                      <td>' + value.product_price + '</td>\n\
                      <td>' + value.dispatched_items_quantity + '</td>\n\
                      <td>' + value.received_items_quantity + '</td>\n\
                      <td>' + lot_no + '</td>\n\
                      <td><textarea class="form-control" rows="1" id="comment_' + value.id + '"></textarea></td>\n\
                      <td>' + status + '</td>\n\
                    <input type="hidden" value="' + value.id + '" id="pro_id_' + value.id + '"/>\n\
                    <input type="hidden" value="' + value.id + '" class="items"/>\n\
                  </tr>';
                            i = i + 1;
                        });
                        html += '</tbody>';
                        $('#dispatch-detail').html(html);
                        $('#dist-from').html(response.DispatcheDetails.distributor_name_from);
                        $('#dist-id').html(response.DispatcheDetails.distributor_name_to);
						$('#dist-add-to').html(response.DispatcheDetails.distributor_address_to);
                        $('#dist-add-from').html(response.DispatcheDetails.distributor_address_from);
                        $('#dispatch-no').html(response.DispatcheDetails.dispatch_no);
                        $('#dispatch-type').html(response.DispatcheDetails.dispatch_type);
                        $('#dispatch-date').html(response.DispatcheDetails.dispatch_date);
                        $('#dispatch-status').html(response.DispatcheDetails.status);
                        $('#receive-date').html(response.DispatcheDetails.expected_delivery_date);
                        $('#subtotal').html(response.DispatcheDetails.subtotal);
                        $('#tax').html((Number(response.DispatcheDetails.cgst) + Number(response.DispatcheDetails.sgst) + Number(response.DispatcheDetails.igst)));
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

        //function for update dispatch itmes status
        function updateDispatchItemStatus() {
            var mismatch_item = [];
            $('.items').each(function() {
                var comment = '';
                var id = $(this).val();
                var dispatch_item_id = $('#pro_id_' + id).val();
                var status = $('#status_' + id).val();
                if ($('#comment_' + id).val()) {
                    comment = $('#comment_' + id).val();
                }
                mismatch_item.push({
                    id: dispatch_item_id,
                    status: status,
                    comment: comment
                });
            });
            console.log(mismatch_item);
            $.ajax({
                url: base_url + 'admin/approve-rejected',
                type: 'post',
                data: {
                    dispatch_id: dispatch_id,
                    mismatch_item: mismatch_item
                },
                success: function(response) {
                    window.location.href = 'distributor-dispatch-list';
                }
            });
        }
    </script>