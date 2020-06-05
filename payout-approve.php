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
                    <div class="col-sm-4">
                        <label>Associate ID</label>
                        <select class="form-control" id="agent_list"></select>
                    </div>
                    <div class="col-sm-3">
                        <label class="d-block">&nbsp;</label>
                        <label class="form-check-label text-muted ml-3 mt13">
                            <input type="checkbox" id="associate_only_with_payout" class="form-check-input mt-0 checkBoxSize"> <span class="checkBoxLabel">Associates Only with Payout</span> <i class="input-helper"></i></label>
                    </div>
                    <!--div class="col-sm-4">
                        <label class="d-block">&nbsp;</label>
                        <input type="button" value="Approve Payout" class="btn btn-gradient-primary" onclick="generatePayout();" />
                    </div-->
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <table>
                            <tr><th class="text-success">Last Payout Detail</th></tr>
                            <tr><td>Week No. <span id="last_week_no"> - </span></td></tr>
                            <tr><td>Cycle: <span id="last_week_cycle"> - </span></td></tr>
                            <tr><td>Last Payout at: <span id="last_payout_at"> - </span></td></tr>
                        </table>
                    </div>
                    <div class="col-md-6 mt-20-m">
                        <table>
                            <tr><th class="text-info">Upcoming Payout Detail</th></tr>
                            <tr><td>Week No. <span id="upcoming_week_no"> - </span></td></tr>
                            <tr><td>Cycle: <span id="upcoming_week_cycle"> - </span></td></tr>
                            <tr><td>Upcoming Payout at: <span id="upcoming_payout_at"> - </span></td></tr>
                        </table>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="card">
                    <div class="card-body p-3 custom_overflow">
                        <h4 class="card-title mb-4">Payout List</h4>
                        <h3 class="text-center" id="payout_week"></h3>
                        <div class="overflowAuto">
                            <table class="table table-bordered custom_action" id="payout_list"></table>
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
                getPayoutList({user_id: 0});
                $(document).on('change', '#agent_list', function () {
                    getPayoutList({user_id: $(this).val()});
                });
            });
            $(document).on('change', '#associate_only_with_payout', function () {//$("#end-date").change(function () {
                if ($(this).is(':checked') == true) {
                    getPayoutList({user_id: $('#agent_list').val(), associate_only_with_payout: 1});
                } else {
                    getPayoutList({user_id: $('#agent_list').val()});
                }
            });
        });

        function getPayoutList(params) {
            showLoader();
            $.ajax({
                url: base_url + 'payout-list',
                type: 'post',
                data: params,
                success: function (response) {
                    if (response.status == "success") {
                        $('#last_week_no').html(response.last_payout.week_no);
                        $('#last_week_cycle').html(response.last_payout.from_date + ' - ' + response.last_payout.to_date);
                        $('#last_payout_at').html(response.last_payout.to_date + ' 23:59');
                        $('#upcoming_week_no').html(response.upcoming_payout.week_no);
                        $('#upcoming_week_cycle').html(response.upcoming_payout.from_date + ' - ' + response.upcoming_payout.to_date);
                        $('#upcoming_payout_at').html(response.upcoming_payout.to_date + ' 23:59');
                        var table_data = '<thead>\n\
                                    <tr>\n\
                                        <th>Date</th>\n\
                                        <th>Associate Name</th>\n\
                                        <th>Left BV</th>\n\
                                        <th>Right BV</th>\n\
                                        <th>Balance Left BV</th>\n\
                                        <th>Balance Right BV</th>\n\
                                        <th>Matching BV</th>\n\
                                        <th>Commission</th>\n\
                                    </tr>\n\
                                </thead>';
                        table_data += '<tbody>';
                        $.each(response.data, function (key, value) {
                            table_data += '<tr id="tr_' + value.id + '">\n\\n\
                                                <td>' + response.payout_generated_from + ' To ' + response.payout_generated_to + '</td>\n\
                                                <td>' + value.display_name + '</td>\n\
                                                <td>' + value.total_left_business + '</td>\n\
                                                <td>' + value.total_right_business + '</td>\n\
                                                <td>' + value.remaining_left_business + '</td>\n\
                                                <td>' + value.remaining_right_business + '</td>\n\
                                                <td>' + value.matching_amount + '</td>\n\
                                                <td>' + value.commission + '</td>\n\
                                            </tr>';
                        });
                        table_data += '</tbody>';
                        $("#payout_list").html(table_data);
                        generateDataTable('payout_list');
                        $('#payout_week').html('Week ' + response.payout_week);
                        hideLoader();
                    }
                    else {
                        showSwal('error', 'Error', response.data);
                        hideLoader();
                    }

                }
            });
        }

        function generatePayout() {
            showLoader();
            $.ajax({
                url: base_url + 'generate-payout',
                type: 'post',
                data: {},
                success: function (response) {
                    console.log(response);
                    if (response.status == "success") {
                        showSwal('success', 'Payout Generated', 'Payout generated successfully');
                        window.location.href = 'payout-history';
                        hideLoader();
                    }
                    else {
                        showSwal('error', 'Payout Failed', response.data);
                        hideLoader();
                    }
                }
            });
        }
    </script>