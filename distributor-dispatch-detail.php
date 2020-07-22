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
    #dispatch-detail tr th:nth-child(8) {
        min-width: 200px;
    }

    #dispatch-detail tr th:last-child {
        min-width: 200px;
    }

    .overflowAuto {
        overflow: auto;
        padding-bottom: 20px;
    }
</style>
<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <h3 class="card-title">Dispatch By: <span class="text-primary" id="dist-from"></span></h4>
                            </div>
                            <div class="col-md-6">
                                <h3 class="card-title">Address: <span class="text-primary" id="dist-add-from"></span></h4>
                            </div>
                            <div class="col-md-6">
                                <h3 class="card-title">Dispatch To: <span class="text-primary" id="dist-id"></span></h4>
                            </div>
                            <div class="col-md-6">
                                <h3 class="card-title">Address: <span class="text-primary" id="dist-add-to"></span></h4>
                            </div>
                            <div class="col-md-6">
                                <h3 class="card-title">Dispatch Number: <span class="text-primary" id="dispatch-no"></span></h4>
                            </div>
                            <div class="col-md-6">
                                <h3 class="card-title">Dispatch Type: <span class="text-primary" id="dispatch-type"></span></h4>
                            </div>
                            <div class="col-md-6">
                                <h3 class="card-title">Status: <span class="text-primary" id="dispatch-status"></span></h4>
                            </div>
                            <div class="col-md-6">
                                <h3 class="card-title">Date Of Dispatch: <span class="text-primary" id="dispatch-date"></span></h4>
                            </div>
                            <div class="col-md-6">
                                <h3 class="card-title">Date Of Receive: <span class="text-primary" id="receive-date"></span></h4>
                            </div>
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
            </div>
        </div>

    </div>

    <div id="before_mismatch_action" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Are you sure? You won't be able to revert this!</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="before_mismatch_action_html"></div>
                <div class="modal-footer">
                    <input type="hidden" id="dmid" value="" />
                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="clearAction();">No</button>
                    <button type="button" class="btn btn-success" data-dismiss="modal" onclick="updateDispatchItemAction();">Yes</button>
                </div>
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
                success: function (response) {
                    if (response.status == "success") {
                        var html = '';
                        if (response.DispatcheDetails.status == 'Mismatch') {
                            html = '<thead>\n\
                        <tr>\n\
                        <th>Sr.No.</th>\n\
                        <th>Product Name</th>\n\
                        <th>Product Code</th>\n\
                        <th>Product Price</th>\n\
                        <th>Dispatch Item Qty</th>\n\
                        <th>Receive Item Qty</th>\n\
                        <th>Lot Number</th>\n\
                        <th>Action</th>\n\
                        </tr>\n\
                        </thead><tbody>';
                        }
                        else
                        {
                            html = '<thead>\n\
                        <tr>\n\
                        <th>Sr.No.</th>\n\
                        <th>Product Name</th>\n\
                        <th>Product Code</th>\n\
                        <th>Product Price</th>\n\
                        <th>Dispatch Item Qty</th>\n\
                        <th>Receive Item Qty</th>\n\
                        <th>Lot Number</th>\n\
                        </tr>\n\
                        </thead><tbody>';

                        }
                        var i = 1;
                        $.each(response.data, function (key, value) {
                            var lot_no = '0';
                            var status = '';
                            var status_td = '';
                            if (value.lot_no != null && value.lot_no != '' && value.lot_no != '0') {
                                lot_no = value.lot_no;
                            }
                            if (response.DispatcheDetails.status == 'Mismatch') {
                                status = '<select id="status_' + value.id + '" onchange="updateDispatchItemStatus(' + value.id + ');">\n\
                                <option value="">--Select--</option>\n\
                                <option value="approved">Approved</option>\n\
                                <option value="disapproved">Disapproved</option>\n\
                                </select>';
                                var status_td = ' <td>' + status + '</td>\n\
                                            <input type="hidden" id="product_id_' + value.id + '" value="' + value.product_id + '" />\n\
                                            <input type="hidden" class="dispatch_items" value="' + value.id + '" />';

                            }

                            html += '<tr id="tr_' + value.id + '" role="row">\n\
                                        <td class="sorting_1">' + i + '</td>\n\
                                        <td>' + value.product_name + '</td>\n\
                                        <td>' + value.sku + '</td>\n\
                                        <td>' + value.product_price + '</td>\n\
                                        <td id="dqty_' + value.id + '">' + value.dispatched_items_quantity + '</td>\n\
                                        <td id="rqty_' + value.id + '">' + value.received_items_quantity + '</td>\n\
                                        <td>\n\
                                            <input type="text" id="lotno_' + value.id + '" value="' + lot_no + '" style="width: 60px;" />\n\
                                            <input type="hidden" id="ditem_status_' + value.id + '" value="' + value.status + '" />\n\
                                        </td>\n\
                                       ' + status_td + '\n\
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

        function updateDispatchItemStatus(id) {
            var sender_name = $('#dist-from').html();
            var receiver_name = $('#dist-id').html();
            
            var popup_html1 = '<div class="form-check d-inline-block">\n\
                                        <label class="form-check-label">\n\
                                            <input type="radio" name="lost_in_transit" id="lost_in_transit" value="1" /> Lost In Transit <i class="input-helper"></i><i class="input-helper"></i></label>\n\
                                    </div>\n\
                                    <div class="form-check d-inline-block">\n\
                                        <label class="form-check-label">\n\
                                            <input type="radio" name="lost_in_transit" id="add_sender" value="1" /> Add In Sender-' + sender_name + ' Inventory <i class="input-helper"></i><i class="input-helper"></i></label>\n\
                                    </div>\n\
                                    <textarea class="form-control mt-2" id="mismatch_comment" placeholder="Type your reason" rows="5" autocomplete="off"></textarea>';

            var popup_html2 = '<div class="form-check d-inline-block">\n\
                                        <label class="form-check-label">\n\
                                            <input type="radio" name="lost_in_transit" id="add_receiver" value="1" /> Add In Receiver - ' + receiver_name + ' Inventory <i class="input-helper"></i><i class="input-helper"></i></label>\n\
                                    </div>\n\
                                    <div class="form-check d-inline-block">\n\
                                        <label class="form-check-label">\n\
                                            <input type="radio" name="lost_in_transit" id="add_sender" value="1" /> Add In Sender - ' + sender_name + ' Inventory <i class="input-helper"></i><i class="input-helper"></i></label>\n\
                                    </div>\n\
                                    <textarea class="form-control mt-2" id="mismatch_comment" placeholder="Type your reason" rows="5" autocomplete="off"></textarea>';

            
            if ($('#status_' + id).val() != '') {
                var item_status = $('#ditem_status_' + id).val();
                var dqty = Number($('#dqty_' + id).html());
                var rqty = Number($('#rqty_' + id).html());
                var html_content = '<textarea class="form-control mt-2" id="mismatch_comment" placeholder="Type your reason" rows="5" autocomplete="off"></textarea>';
                if ($('#status_' + id).val() == 'approved' && item_status != 'OK') {
                    if (dqty > rqty) {
                        if (item_status == 'Less Items Received' || item_status == 'More Items Received') {
                            html_content = popup_html1;
                        } else {
                            html_content = popup_html2;
                        }
                    } else {
                        html_content = popup_html2;
                    }
                }

                $('#before_mismatch_action_html').html(html_content);
                $('#before_mismatch_action').modal();
                $('#dmid').val(id);
            } else {
                $('#status_' + id).val('');
            }
        }

        //function for update dispatch itmes status
        function updateDispatchItemAction() {
            var id = document.getElementById('dmid').value;
            if (id) {
                var lost_in_transit = document.getElementById('lost_in_transit');
                var add_sender = document.getElementById('add_sender');
                var add_receiver = document.getElementById('add_receiver');
                var params = {
                    dispatch_id: dispatch_id,
                    dispatch_item_id: id,
                    product_id: $('#product_id_' + id).val(),
                    lot_no: $('#lotno_' + id).val(),
                    comment: $('#mismatch_comment').val(),
                    action_status: $('#status_' + id).val(),
                };
                if (lost_in_transit && lost_in_transit.checked == true) {
                    params.lost_in_transit = 1;
                }
                if (add_sender && add_sender.checked == true) {
                    params.add_sender = 1;
                }
                if (add_receiver && add_receiver.checked == true) {
                    params.add_receiver = 1;
                }
                $.ajax({
                    url: base_url + 'admin-dispatch-mismatch-action',
                    type: 'post',
                    data: params,
                    success: function (response) {
                        showSwal(response.status, response.data);
                        //window.location.href = 'distributor-dispatch-list';
                    }
                });
            }
        }

        function clearAction() {
            var id = document.getElementById('dmid').value;
            $('#dmid').val('');
            $('#before_mismatch_action_html').html('');
            $('#status_' + id).val('');
        }
    </script>