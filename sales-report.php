<?php
include_once 'header.php';
?>
<style>
    #sales-report tr td:last-child {
        white-space: nowrap !important;
    }
</style>
<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3 space-m">
                        <h4 class="card-title mb-4">Invoice Report</h4>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label>Distributor:</label>
                                <select id="distributor" name="distributor" class="form-control">
                                </select>
                            </div>
                            <div class="col-sm-12 text-right mt-4">
                                <button type="button" class="btn btn-gradient-danger" onclick="CancelSalesReport();">Cancel</button><button type="submit" class="btn btn-gradient-success ml-2" onclick="searchSalesReport();">Search</button>
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
                        <h4 class="card-title mb-4">Invoice List</h4>
                        <div class="overflowAuto">
                            <table class="table table-bordered custom_action  " id="sales-report">
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
    <!-- Js for download excel-->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <!-- Js for download excel-->
    <script src="<?php echo $home_url; ?>assets/javascript/distributor/admin-inventory-report.js"></script>
    <script>
        searchSalesReport();

        function searchSalesReport() {
            showLoader();
            var distributor_id = '';
            if ($('#distributor').val() != '') {
                distributor_id = $('#distributor').val();
            }
            var params = {
                distributor_id: distributor_id,
            };
            var url = base_url + 'distributor/admin-sales-report';
            $.ajax({
                url: url,
                type: 'post',
                data: params,
                success: function(response) {
                    var html = '<thead>\n\
                              <tr>\n\
                              <th>Sr.No</th>\n\
                              <th>Distributor Name</th>\n\
                              <th>Total Amount</th>\n\
                              <th>Total Tax Amount</th>\n\
                              <th>Total Cash Amount</th>\n\
                              <th>Total Coupon Amount</th>\n\
                              <th class="salesReport">Action</th>\n\
                              </tr>\n\
                              </thead><tbody>';
                    if (response.status == "success") {
                        if (response.data.length != 0) {
                            var i = 1;
                            $.each(response.data, function(key, value) {
                                html += '<tr id="tr_incoming_' + i + '" role="row" class="tr_incoming" >\n\
                                  <td>' + i + '</td>\n\
                                  <td>' + value.distributor_name + '</td>\n\
                                  <td>' + value.total_amount + '</td>\n\
                                  <td>' + value.total_tax + '</td>\n\
                                  <td>' + value.cash_amount + '</td>\n\
                                  <td>' + value.coupon_amount + '</td>\n\
                                  <td><a class="btn btn-gradient-primary btn-sm salesReport" href="sales-report-detail.php?dist_id=' + value.distributor_id + '">Sales Detail</a></td>\n\
                              </tr>';
                                i = i + 1;
                            });
                            html += '</tbody>';
                            $('#sales-report').html(html);
                            $('#sales-report').DataTable().destroy();
                            $('#sales-report').DataTable({
                                dom: 'Blfrtip',
                                buttons: [{
                                    extend: 'excelHtml5',
                                    title: 'SalesReport' + Date.now(),
                                    text: 'Export to Excel',
                                    exportOptions: {
                                        columns: [0, 1, 2, 3, 4, 5]
                                    }
                                }],
                                aaSorting: []
                            });
                            $('.dt-button').removeClass().addClass('btn btn-info ml-2 download-excel');
                            $('.download-excel').css('display', 'none');
                            hideLoader();
                        }
                    } else {
                        $('#sales-report').html(html);
                        $('#sales-report').DataTable().destroy();
                        $('#sales-report').DataTable();
                        hideLoader();
                    }

                }
            });

        }

        function exportTableToExcel() {
            $('.download-excel').click();
        }

        function print() {
            var tab = document.getElementById('sales-report');
            var win = window.open('', '', 'height=700,width=700');
            win.document.write("<style> th:nth-child(7){display:none;} </style>");
            win.document.write("<style> td:nth-child(7){display:none;} </style>");
            win.document.write(tab.outerHTML);
            win.document.close();
            win.print();

        }
    </script>