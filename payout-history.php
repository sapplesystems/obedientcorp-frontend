<?php
include_once 'header.php';
if ($user_type != 'ADMIN') {
    echo '<script type="text/javascript">window.location.href="dashboard.php";</script>';
}
?>
<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row">
            <div class="col-12">
                <div class="form-group row">
                    <div class="col-sm-3">
                        <label>Agent ID</label>
                        <select class="form-control" id="agent_list"></select>
                    </div>
                    <div class="col-sm-3">
                        <label>Start Date:</label>
                        <div class="input-group date datepicker p-0">
                            <input type="text required" class="form-control required" id="start-date" name="start-date" placeholder="From" readonly>
                            <span class="input-group-addon input-group-append border-left">
                                <span class="mdi mdi-calendar input-group-text bg-dark"></span>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label>End Date:</label>
                        <div class="input-group date datepicker p-0">
                            <input type="text required" class="form-control required" id="end-date" name="end-date" placeholder="To" readonly>
                            <span class="input-group-addon input-group-append border-left">
                                <span class="mdi mdi-calendar input-group-text bg-dark"></span>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label>&nbsp;</label>
                        <div class="clearfix"></div>
                        <input type="button" value="Search" class="btn btn-gradient-primary" onclick="payoutHistoryFilter();" />
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="card">
                    <div class="card-body p-3 custom_overflow">
                        <h4 class="card-title mb-4">Payout History</h4>
                        <div class="overflowAuto">
                            <table class="table table-bordered custom_action" id="payout_history"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <?php include_once 'footer.php'; ?>
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).ready(function () {
                $("#agent_list").html(down_the_line_members);
                getPayoutHistoryList({user_id: 0});
                $(document).on('change', '#agent_list', function () {
                    getPayoutHistoryList({user_id: $(this).val()});
                });

                $(document).on('change', '#start-date', function () {//$("#end-date").change(function () {
                    checkStartEndDate();
                });

                $(document).on('change', '#end-date', function () {//$("#end-date").change(function () {
                    checkStartEndDate();
                });
            });
        });

        function getPayoutHistoryList(params) {
            showLoader();
            $.ajax({
                url: base_url + 'payout-history',
                type: 'post',
                data: params,
                success: function (response) {
                    if (response.status == "success") {
                        var table_data = '<thead>\n\
                                    <tr>\n\
                                        <th>Agent Name</th>\n\
                                        <th>Left Business</th>\n\
                                        <th>Right Business</th>\n\
                                        <th>Balance Left Business</th>\n\
                                        <th>Balance Right Business</th>\n\
                                        <th>Matching Amount</th>\n\
                                        <th>Commission</th>\n\
                                        <th>TDS</th>\n\
                                        <th>Processing Fee</th>\n\
                                        <th>Other Charges</th>\n\
                                        <th>Payout Amount</th>\n\
                                        <th>Date</th>\n\
                                    </tr>\n\
                                </thead>';
                        table_data += '<tbody>';
                        $.each(response.data, function (key, value) {
                            table_data += '<tr>\n\
                                    <td>' + value.display_name + '</td>\n\
                                    <td>' + value.total_left_business + '</td>\n\
                                    <td>' + value.total_right_business + '</td>\n\
                                    <td>' + value.remaining_left_business + '</td>\n\
                                    <td>' + value.remaining_right_business + '</td>\n\
                                    <td>' + value.matching_amount + '</td>\n\
                                    <td>' + value.commission + '</td>\n\
                                    <td>' + value.tds + '</td>\n\
                                    <td>' + value.processing_fee + '</td>\n\
                                    <td>' + value.other_charges + '</td>\n\
                                    <td>' + value.payout_amount + '</td>\n\
                                    <td>' + value.created_date + '</td>\n\
                                </tr>';
                        });
                        table_data += '</tbody>';
                        $("#payout_history").html(table_data);
                        generateDataTable('payout_history');
                        hideLoader();
                    }
                    else {
                        showSwal('error', 'Error', response.data);
                        $("#payout_history").html('');
                        generateDataTable('payout_history');
                        hideLoader();
                    }

                }
            });
        }

        function payoutHistoryFilter() {
            var user_id = 0;
            var start_date = '';
            var end_date = '';
            if ($('#agent_list').val()) {
                user_id = $('#agent_list').val();
            }
            if ($('#start-date').val()) {
                start_date = $('#start-date').val();
            }
            if ($('#end-date').val()) {
                end_date = $('#end-date').val();
            }
            var params = {
                user_id: user_id,
                start_date: start_date,
                end_date: end_date

            };
            getPayoutHistoryList(params);
        }
    </script>