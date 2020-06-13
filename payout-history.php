<?php
include_once 'header.php';
if ($user_type != 'ADMIN') {
    echo '<script type="text/javascript">window.location.href="dashboard";</script>';
}
?>
<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row">
            <div class="col-12">
                <div class="form-group row">
                    <div class="col-sm-3">
                        <label>Week</label>
                        <select class="form-control" id="week_range">
                            <option value="">Select Week</option>
                        </select>
                    </div>
                    <div class="col-sm-3 mt-20-m">
                        <label>Associate ID</label>
                        <select class="form-control" id="agent_list"></select>
                    </div>
                    <div class="col-sm-3">
                        <label class="d-block">&nbsp;</label>
                        <label class="form-check-label text-muted ml-3 mt13">
                            <input type="checkbox" id="associate_only_with_payout" class="form-check-input mt-0 checkBoxSize"> <span class="checkBoxLabel">Associates Only with Payout</span> <i class="input-helper"></i></label>
                    </div>
                    <!--div class="col-sm-3">
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
                    </div-->
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
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#agent_list").html(down_the_line_members);
            getPayoutHistoryList({user_id: 0});
            $(document).on('change', '#week_range', function () {
                if ($('#associate_only_with_payout').is(':checked') == true) {
                    getPayoutHistoryList({week_range: $(this).val(), user_id: $('#agent_list').val(), associate_only_with_payout: 1});
                } else {
                    getPayoutHistoryList({week_range: $(this).val(), user_id: $('#agent_list').val()});
                }
            });
            $(document).on('change', '#agent_list', function () {
                if ($('#associate_only_with_payout').is(':checked') == true) {
                    getPayoutHistoryList({user_id: $(this).val(), week_range: $('#week_range').val(), associate_only_with_payout: 1});
                } else {
                    getPayoutHistoryList({user_id: $(this).val(), week_range: $('#week_range').val()});
                }
            });

            $(document).on('change', '#start-date', function () {//$("#end-date").change(function () {
                checkStartEndDate();
            });

            $(document).on('change', '#end-date', function () {//$("#end-date").change(function () {
                checkStartEndDate();
            });

            $(document).on('click', '#associate_only_with_payout', function () {//$("#end-date").change(function () {
                if ($(this).is(':checked') == true) {
                    getPayoutHistoryList({user_id: $('#agent_list').val(), week_range: $('#week_range').val(), associate_only_with_payout: 1});
                } else {
                    getPayoutHistoryList({user_id: $('#agent_list').val(), week_range: $('#week_range').val()});
                }
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
                        var payout_week = response.payout_week;
                        var week_range = '<option value="">Select Week</option>';
                        if (payout_week.length > 0) {
                            $.each(payout_week, function (k, v) {
                                week_range += '<option value="' + v.week_no + '">Week: ' + v.week_range + '</option>';
                            });
                        }
                        $('#week_range').html(week_range);
                        //$("#week_range option:last").attr("selected", "selected");
                        if (params.week_range) {
                            $("#week_range option[value=" + params.week_range + "]").attr("selected", "selected");
                        } else {
                            $("#week_range option:eq(1)").attr("selected", "selected");
                        }
                        var table_data = '<thead>\n\
                                                <tr>\n\
                                                    <th>Week No.</th>\n\
                                                    <th>Date</th>\n\
                                                    <th>Associate Name</th>\n\
                                                    <th>Left BV</th>\n\
                                                    <th>Right BV</th>\n\
                                                    <th>Balance Left BV</th>\n\
                                                    <th>Balance Right BV</th>\n\
                                                    <th>Matching BV</th>\n\
                                                    <th>Commission</th>\n\
                                                    <th>Income Fund</th>\n\
                                                    <th>TDS</th>\n\
                                                    <th>Processing Fee</th>\n\
                                                    <th>Other Charges</th>\n\
                                                    <th>Payout Amount</th>\n\
                                                </tr>\n\
                                            </thead>';
                        table_data += '<tbody>';
                        $.each(response.data, function (key, value) {
                            table_data += '<tr>\n\
                                            <td>' + value.week_no + '</td>\n\
                                            <td>' + value.from_date + ' To ' + value.to_date + '</td>\n\
                                            <td>' + value.display_name + '</td>\n\
                                            <td>' + value.total_left_business + '</td>\n\
                                            <td>' + value.total_right_business + '</td>\n\
                                            <td>' + value.remaining_left_business + '</td>\n\
                                            <td>' + value.remaining_right_business + '</td>\n\
                                            <td>' + value.matching_amount + '</td>\n\
                                            <td>' + value.commission + '</td>\n\
                                            <td>' + value.income_fund + '</td>\n\
                                            <td>' + value.tds + '</td>\n\
                                            <td>' + value.processing_fee + '</td>\n\
                                            <td>' + value.other_charges + '</td>\n\
                                            <td>' + value.payout_amount + '</td>\n\
                                        </tr>';
                        });
                        table_data += '</tbody>';
                        $("#payout_history").html(table_data);
                        //generateDataTable('payout_history');
                        var table = $('#payout_history').DataTable();
                        table.destroy();
                        $('#payout_history').DataTable({
                            dom: 'Bfrtip',
                            buttons: [
                                {
                                    extend: 'excelHtml5',
                                    title: 'Payout-History-' + Date.now(),
                                    text: 'Export to excel'
                                }
                            ],
                            aaSorting: []
                        });
                        $('.dt-button').removeClass().addClass('btn btn-gradient-primary');
                        hideLoader();
                    }
                    else {
                        showSwal('error', 'Error', response.data);
                        $("#payout_history").html('');
                        hideLoader();
                    }

                }
            });
        }

        function payoutHistoryFilter() {
            var week_range = '';
            var user_id = 0;
            var start_date = '';
            var end_date = '';
            if ($('#week_range').val()) {
                week_range = $('#week_range').val();
            }
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
                week_range: week_range,
                user_id: user_id,
                start_date: start_date,
                end_date: end_date

            };
            getPayoutHistoryList(params);
        }
    </script>