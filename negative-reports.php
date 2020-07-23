<?php
include_once 'header.php';
?>
<style>
    #stock-flow tr td:last-child {
        white-space: nowrap !important;
    }

    #stock-flow-detail-modal .modal-dialog {
        max-width: 1320px;
    }
</style>
<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3 space-m">
                        <h4 class="card-title mb-4">Stock Flow</h4>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label>Distributor:</label>
                                <select id="distributor" name="distributor" class="form-control">
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label>Category:</label>
                                <select id="categories" name="categories" class="form-control">
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label>Lot Number:</label>
                                <input type="text" class="form-control" id="lot-no" name="lot_no" value="">
                            </div>
                            <div class="col-sm-3">
                                <label>Quantity:</label>
                                <input type="text" class="form-control" id="qty" name="qty" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label>Items:</label>
                                <input type="text" class="form-control" id="search-product" name="search_product" value="">
                                <input type="hidden" id="item-name" value="" />
                                <input type="hidden" id="item-id" value="" />
                            </div>
                            <div class="col-sm-3">
                                <label>Item Code:</label>
                                <input type="text" class="form-control" placeholder="" id="item-code" name="item_code">
                            </div>
                            <div class="col-sm-12 text-right mt-4">
                                <button type="button" class="btn btn-gradient-danger" onclick="CancelNegativeStock();">Cancel</button><button type="submit" id="agent_form" class="btn btn-gradient-success ml-2" onclick="searchNegativeStock();">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-4">Stock List</h4>
                        <div class="overflowAuto">
                            <table class="table table-bordered custom_action " id="negative-stock">
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 text-right mt-4">
                <button type="button" class="btn btn-gradient-info" onclick="exportTableToExcel();">Download Excel</button><button type="button" class="btn btn-gradient-success ml-2" onclick="print();">Print</button>
            </div>

        </div>


    </div>



    <!--end div-->

    <!-- content-wrapper ends -->
    <?php include_once 'footer.php'; ?>
    <!-- Js for download excel-->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <!-- Js for download excel-->
    <script src="<?php echo $home_url; ?>assets/javascript/distributor/admin-inventory-report.js"></script>
    <script>
        searchNegativeStock();

        function searchNegativeStock() {
            showLoader();
            var item_name = '';
            var category_id = '';
            var item_code = '';
            var lot_no = '';
            var qty = '';
            var distributor_id = '';
            var product_id = '';
            if ($('#item-name').val() != '') {
                item_name = $('#item-name').val();
            }
            if ($('#categories').val() != '') {
                category_id = $('#categories').val();
            }
            if ($('#item-code').val() != '') {
                item_code = $('#item-code').val();
            }
            if ($('#lot-no').val() != '') {
                lot_no = $('#lot-no').val();
            }
            if ($('#qty').val() != '') {
                qty = $('#qty').val();
            }
            if ($('#distributor').val() != '') {
                distributor_id = $('#distributor').val();
            }
            if ($('#item-id').val() != '') {
                product_id = $('#item-id').val();
            }
            var params = {
                distributor_id: distributor_id,
                category_id: category_id,
                item_name: item_name,
                quantity: qty,
                lot_no: lot_no,
                item_code: item_code,
                product_id: product_id
            };
            console.log(params);
            var url = base_url + 'distributor/negative-inventory-list';
            $.ajax({
                url: url,
                type: 'post',
                data: params,
                success: function(response) {
                    console.log(response);
                    var html = '<thead>\n\
                              <tr>\n\
                              <th>Sr.No</th>\n\
                              <th>Distributor Name</th>\n\
                              <th>Category</th>\n\
                              <th>Item Name</th>\n\
                              <th>Lot No</th>\n\
                              <th>Qty</th>\n\
                              </tr>\n\
                              </thead><tbody>';
                    if (response.status == "success") {
                        if (response.data.length != 0) {
                            var i = 1;
                            $.each(response.data, function(key, value) {
                                var lot_no_outgoing = '-';
                                if (value.lot_no != 0 && value.lot_no != null) {
                                    lot_no_outgoing = value.lot_no;
                                }
                                html += '<tr id="tr_outgoing_' + i + '" role="row" class="tr_outgoing" >\n\
                                        <td>' + i + '</td>\n\
                                        <td>' + value.distributor_name + '</td>\n\
                                        <td>' + value.category_name + '</td>\n\
                                        <td>' + value.product_display_name + '</td>\n\
                                        <td>' + lot_no_outgoing + '</td>\n\
                                        <td>' + value.negative_qty + '</td>\n\
                                        </tr>';
                                i = i + 1;
                            });

                            $('#negative-stock').html(html);
                            $('#negative-stock').DataTable().destroy();
                            $('#negative-stock').DataTable({
                                dom: 'Blfrtip',
                                buttons: [{
                                    extend: 'excelHtml5',
                                    title: 'NegativeReport' + Date.now(),
                                    text: 'Export to Excel',
                                }],
                                aaSorting: []
                            });
                            $('.dt-button').removeClass().addClass('btn btn-info ml-2 download-excel');
                            $('.download-excel').css('display', 'none');
                            hideLoader();
                        }
                    } else {
                        //showSwal('error', response.data);
                        $('#negative-stock').html(html);
                        $('#negative-stock').DataTable().destroy();
                        $('#negative-stock').DataTable();
                        hideLoader();
                    }

                }
            });
        } //end function

        function CancelNegativeStock() {
            $('#item-name').val('');
            $('#categories').val('');
            $('#item-code').val('');
            $('#lot-no').val('');
            $('#qty').val('');
            $('#search-product').val('');
            $('#distributor').val('');
            searchNegativeStock();
        }

        function exportTableToExcel() {
            $('.download-excel').click();
        }

        function print() {
            var tab = document.getElementById('negative-stock');
            var win = window.open('', '', 'height=700,width=700');
            win.document.write(tab.outerHTML);
            win.document.close();
            win.print();

        }
    </script>