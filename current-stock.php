<?php
include_once 'header.php';
?>
<style>
    .mt35 {
        margin-top: 35px;
    }
</style>

<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3 space-m">
                        <h4 class="card-title mb-4">Current Stock</h4>
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
                                <label>Items:</label>
                                <input type="text" class="form-control" id="search-product" name="search_product" value="">
                                <input type="hidden" id="item-name" value="" />
                            </div>
                            <div class="col-sm-3">
                                <label>Item Code:</label>
                                <input type="text" class="form-control" placeholder="" id="item-code" name="item_code">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label>Date :</label>
                                <div class="input-group date datepicker p-0">
                                    <input type="text" class="form-control required" id="start-date" name="start-date">
                                    <span class="input-group-addon input-group-append border-left">
                                        <span class="mdi mdi-calendar input-group-text bg-dark"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-check form-check-primary mt35">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" id="stock-items" name="stock_items" value="1"> Check In Stock Items <i class="input-helper"></i></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 text-right">
                                <button type="button" class="btn btn-gradient-danger" onclick="CancelSearch();">Cancel</button><button type="submit" class="btn btn-gradient-success ml-2" onclick="searchItemsStock();">Search</button>
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
                            <table class="table table-bordered custom_action " id="stock-detail">
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 mt-4 text-right">
                <button type="button" class="btn btn-gradient-info" onclick="exportTableToExcel();">Download Excel</button><button type="button" class="btn btn-gradient-success ml-2" onclick="print();">Print</button>
            </div>

        </div>


    </div>
    <!-- content-wrapper ends -->
    <?php include_once 'footer.php'; ?>
    <script src="https://cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
    <script src="<?php echo $home_url; ?>assets/javascript/distributor/admin-inventory-report.js"></script>
    <script>
    searchItemsStock();
        function searchItemsStock() {
            var search_date = ''
            var item_name = '';
            var category_id = '';
            var check_stock = '';
            var item_code = '';
            var distributor_id = '';
            if ($('#search-date').val() != '') {
                search_date = $('#search-date').val();
            }
            if ($('#item-name').val() != '') {
                if($('#distributor').val() == '')
                {
                    showSwal('error','Please Select Distributor');
                    $('#search-product').val('');
                }
                item_name = $('#item-name').val();
            }
            if ($('#categories').val() != '') {
                category_id = $('#categories').val();
            }
            if ($('#stock-items').prop('checked') == true) {
                check_stock = $('#stock-items').val();
            }
            if ($('#item-code').val() != '') {
                item_code = $('#item-code').val();
            }
            if ($('#distributor').val() != '') {
                distributor_id = $('#distributor').val();
            }
            var params = {
                distributor_id: distributor_id,
                check_stock_item: check_stock,
                category_id: category_id,
                product_name: item_name,
                date: search_date,
                item_code: item_code,
                is_admin: 1
            };
            var url = base_url + 'distributor/current-stock';
            $.ajax({
                url: url,
                type: 'post',
                data: params,
                success: function(response) {
                    var html = '<thead>\n\
                  <tr>\n\
                  <th>Sr.No.</th>\n\
                  <th>Distributor Name</th>\n\
                  <th>Category Name</th>\n\
                  <th>Date</th>\n\
                  <th>Item Code</th>\n\
                  <th>Item Name</th>\n\
                  <th>BV Type</th>\n\
                  <th>Lot No</th>\n\
                  <th>Qty</th>\n\
                  <th>Expiry Date</th>\n\
                  </tr>\n\
                  </thead><tbody>';
                    if (response.status == "success") {
                        var i = 1;
                        $.each(response.data, function(key, value) {
                            var lot_no = '-';
                            if (value.lot_no != null && value.lot_no != 0) {
                                lot_no = value.lot_no;
                            }
                            html += '<tr id="tr_' + value.id + '" role="row" >\n\
                <td class="sorting_1">' + i + '</td>\n\
                <td>' + value.distributor_name + '</td>\n\
                <td>' + value.category_name + '</td>\n\
                <td>' + value.date + '</td>\n\
                <td>' + value.sku + '</td>\n\
                <td>' + value.name + '</td>\n\
                <td>' + value.bv_type + '</td>\n\
                <td>' + lot_no + '</td>\n\
                <td>' + value.quantity + '</td>\n\
                <td>' + value.expiry_date + '</td>\n\
            </tr>';
                            i = i + 1;
                        });
                        html += '</tbody>';
                        $('#stock-detail').html(html);
                        generateDataTable('stock-detail');
                    } else {
                        $('#stock-detail').html(html);
                        generateDataTable('stock-detail');
                        hideLoader();
                    }
                }
            });
        } //end function
        function CancelSearch() {
            $('#search-date').val('');
            $('#search-product').val('');
            $('#categories').val('');
            $('#stock-items').prop('checked', false);
            $('#item-code').val('');
            $('#distributor').val('');
            searchItemsStock();
        }

        function exportTableToExcel() {
            $("#stock-detail").table2excel({
                filename: "CurrentStock.xls"
            });

        }

        function print() {
            var tab = document.getElementById('stock-detail');
            var win = window.open('', '', 'height=700,width=700');
            win.document.write(tab.outerHTML);
            win.document.close();
            win.print();

        }
    </script>