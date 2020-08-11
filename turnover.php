<?php
include_once 'header.php';
?>
<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3 space-m">
                        <h4 class="card-title mb-4">Turnover</h4>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label>Week No:</label>
                                <select id="week_no" class="form-control"></select>
                            </div>
                            <div class="col-sm-3">
                                <label>Associate ID:</label>
                                <select id="agent-list" class="form-control"></select>
                            </div>
                            <div class="col-sm-6 mt-4">
                                <button type="button" class="btn btn-gradient-danger" onclick="window.location.reload();">Cancel</button>
                                <button type="button" class="btn btn-gradient-success ml-2" onclick="getTurnoverList();">Search</button>
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
                        <h4 class="card-title mb-4">Turnover List</h4>
                        <div class="overflowAuto">
                            <table class="table table-bordered custom_action " id="turnover-list"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <?php include_once 'footer.php'; ?>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#agent-list").html(down_the_line_members);
            getTurnoverList();
        });

        function getTurnoverList() {
            var params = {};
            if ($('#week_no').val() != '') {
                params.week_no = $('#week_no').val();
            }
            if ($('#agent-list').val() != '') {
                params.user_id = $('#agent-list').val();
            }
            showLoader();
            var url = base_url + 'turnover';
            $.ajax({
                url: url,
                type: 'post',
                data: params,
                success: function (response) {
                    var html = '<thead>\n\
                      <tr>\n\
                        <th>Sr.No</th>\n\
                        <th>Week No</th>\n\
                        <th>Start Date</th>\n\
                        <th>End Date</th>\n\
                        <th>Payout</th>\n\
                        <th>Turnover</th>\n\
                      </tr>\n\
                      </thead><tbody>';
                    if (response.status == "success") {
                        if (response.data.length != 0) {
                            var week_nos = '<option value="">Select</option>';
                            $.each(response.all_week, function (k, v) {
                                var sel = '';
                                if ($('#week_no').val() == v.week_no) {
                                    sel = 'selected';
                                }
                                week_nos += '<option value="' + v.week_no + '" ' + sel + '>' + v.week_range + '</option>';
                            });
                            $('#week_no').html(week_nos);
                            var i = 0;
                            receiptDetail = response.data;
                            $.each(response.data, function (key, value) {
                                html += '<tr  role="row" >\n\
                                            <td>' + (i + 1) + '</td>\n\
                                            <td>' + value.week_no + '</td>\n\
                                            <td>' + value.start_date + '</td>\n\
                                            <td>' + value.end_date + '</td>\n\
                                            <td>' + value.weekly_payout + '</td>\n\
                                            <td>' + value.weekly_turnover + '</td>\n\
                                        </tr>';
                                i++;
                            });

                            $('#turnover-list').html(html);
                            generateDataTable('turnover-list');
                            hideLoader();
                        }
                    } else {
                        $('#turnover-list').html(html);
                        generateDataTable('turnover-list');
                        hideLoader();
                    }

                }
            });
        }
    </script>