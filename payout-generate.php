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
                    <label class="col-form-label col-sm-2">Associate ID</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="agent_list"></select>
                    </div>
                    <div class="col-sm-4">
                        <input type="button" value="Approve Payout" class="btn btn-gradient-primary" onclick="generatePayout();" />
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
        });

        function getPayoutList(params) {
            showLoader();
            $.ajax({
                url: base_url + 'payout-list',
                type: 'post',
                data: params,
                success: function (response) {
                    if (response.status == "success") {
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
                                                <td>' + value.income_fund + '</td>\n\
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
                        showSwal('error', 'Failed', 'Payout Generation Failed');
                        hideLoader();
                    }
                }
            });
        }
    </script>