<?php include_once 'header.php'; ?>
<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row">
            <div class="col-md-12 customTabs">
                <ul class="nav nav-pills nav-pills-custom diff-color" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link bg_pending active" id="pills-weekly-tab" data-toggle="pill" href="#pills-weekly" role="tab" aria-controls="pills-weekly" aria-selected="true"> Weekly </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link bg_approved" id="pills-detail-tab" data-toggle="pill" href="#pills-detail" role="tab" aria-controls="pills-detail" aria-selected="false"> Detail </a>
                    </li>
                </ul>
                <div class="clearfix"></div>
                <div class="tab-content tab-content-custom-pill" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-weekly" role="tabpanel" aria-labelledby="pills-weekly-tab">
                        <div class="row">
                            <div class="col-12">
                                <?php if ($user_type == 'ADMIN') { ?>
                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            <label>Associate ID</label>
                                            <select class="form-control" id="agent_id"></select>
                                        </div>
                                        <div class="col-sm-3 mt-20-m">
                                            <label>Week</label>
                                            <select class="form-control" id="week_no">
                                                <option value="">Select Week</option>
                                            </select>
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="clearfix"></div>
                                <div class="card">
                                    <div class="card-body p-3 custom_overflow">
                                        <h4 class="card-title mb-4">Weekly Sponsor Income</h4>
                                        <div class="row">
                                            <div class="col-md-6"><h3 class="card-title mb-4">Total Sponsor Income: <span class="text-success total_sponsor_income"></span></h3></div>
                                        </div>
                                        <div class="overflowAuto">
                                            <table class="table table-bordered custom_action" id="weekly_sponsor_income_history"></table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-detail" role="tabpanel" aria-labelledby="pills-detail-tab">
                        <div class="row">
                            <div class="col-12 marginLR-m">
                                <div class="card">
                                    <div class="card-body p-3">
                                        <h4 class="card-title mb-4">Sponsor Income History</h4>
                                        <div class="row">
                                            <div class="col-md-6"><h3 class="card-title mb-4">Total Sponsor Income: <span class="text-success total_sponsor_income"></span></h3></div>
                                        </div>
                                        <?php if ($user_type == 'ADMIN') { ?>
                                            <div class="form-group">
                                                <label class="col-form-label float-left mr-3">Associate ID</label>
                                                <div class="float-left col-md-3">
                                                    <select class="form-control" id="agent_list"></select>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <div class="clearfix"></div>
                                        <div class="form-group row col-sm-12 mt-4">
                                            <label class="float-left col-form-label col-sm-1 pr-0 mt-3" style="display: none;">Filters :</label>
                                            <div class="col-sm-3 pr-0">
                                                <label>Start Date:</label>
                                                <div class="input-group date datepicker p-0">
                                                    <input type="text required" class="form-control required" id="start-date" name="start-date" placeholder="From" readonly>
                                                    <span class="input-group-addon input-group-append border-left">
                                                        <span class="mdi mdi-calendar input-group-text bg-dark"></span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 pr-0">
                                                <label>End Date:</label>
                                                <div class="input-group date datepicker p-0">
                                                    <input type="text required" class="form-control required" id="end-date" name="end-date" placeholder="To" readonly>
                                                    <span class="input-group-addon input-group-append border-left">
                                                        <span class="mdi mdi-calendar input-group-text bg-dark"></span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-sm-2 pr-0">
                                                <label class="d-block">&nbsp;</label>
                                                <input type="button" class="btn btn-gradient-success" id="search_by_type" name="search_by_type" value="Search" />
                                            </div>
                                        </div>

                                        <div class="overflowAuto">
                                            <table class="table table-bordered custom_action" id="sponsor_income_history_list"></table>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
        getSponsorIncomeHistory({user_id: user_id});

        $(document).ready(function () {
            $("#agent_list").html(down_the_line_members);
            $("#agent_id").html(down_the_line_members);

            $(document).on('change', '#start-date', function () {//$("#end-date").change(function () {
                checkStartEndDate();
            });

            $(document).on('change', '#end-date', function () {//$("#end-date").change(function () {
                checkStartEndDate();
            });

            $(document).on('change', '#agent_list', function () {
                resetFilters();
                getSponsorIncomeHistory({user_id: $(this).val()});
            });
            $(document).on('change', '#agent_id', function () {
                resetFilters();
                getSponsorIncomeHistory({user_id: $(this).val(), week_no: $('#week_no').val()});
            });
            $(document).on('change', '#week_no', function () {
                resetFilters();
                getSponsorIncomeHistory({user_id: $('#agent_id').val(), week_no: $(this).val()});
            });

            $(document).on('click', '#search_by_type', function (e) {
                e.preventDefault();
                var start_date = '';
                var end_date = '';
                var type = '';

                if ($('#start-date').val()) {
                    start_date = $('#start-date').val();
                }
                if ($('#end-date').val()) {
                    end_date = $('#end-date').val();
                }
                if ($('#type').val()) {
                    type = $('#type').val();
                }

                var uid = user_id;
                if ($('#agent_list').val() && $('#agent_list').val() != '') {
                    uid = $('#agent_list').val();
                }
                var params = {
                    user_id: uid,
                    start_date: start_date,
                    end_date: end_date,
                };
                getSponsorIncomeHistory(params);
            });

        });


        function getSponsorIncomeHistory(params) {
            showLoader();
            $.ajax({
                url: base_url + 'sponsor-income-history',
                type: 'post',
                data: params,
                success: function (response) {
                    if (response.status == "success") {
                        var table_data = '<thead>\n\
                                    <tr>\n\
                                        <th>Sr No.</th>\n\
                                        <th>Amount</th>\n\
                                        <th>Type</th>\n\
                                        <th>Week No</th>\n\
                                        <th>Comments</th>\n\
                                        <th>Date</th>\n\
                                    </tr>\n\
                                </thead>';
                        table_data += '<tbody>';
                        var counter = 0;
                        $('.total_sponsor_income').html(response.data.total_sponsor_income);
                        $.each(response.data.data, function (key, value) {
                            counter = counter + 1;
                            table_data += '<tr">\n\
                                    <td>' + counter + '</td>\n\
                                    <td>' + value.amount + '</td>\n\
                                    <td>' + value.type + '</td>\n\
                                    <td>' + value.week_no + '</td>\n\
                                    <td>' + value.description + '</td>\n\
                                    <td>' + value.date + '</td>\n\
                                </tr>';
                        });
                        table_data += '</tbody>';
                        $("#sponsor_income_history_list").html(table_data);
                        generateDataTable('sponsor_income_history_list');

                        /*weekly data set*/
                        var table_data = '<thead>\n\
                                    <tr>\n\
                                        <th>Sr No.</th>\n\
                                        <th>Amount</th>\n\
                                        <th>Week No</th>\n\
                                    </tr>\n\
                                </thead>';
                        table_data += '<tbody>';
                        var counter = 0;
                        $.each(response.data.weekly_data, function (key, value) {
                            counter = counter + 1;
                            table_data += '<tr">\n\
                                    <td>' + counter + '</td>\n\
                                    <td>' + value.sponsor_income + '</td>\n\
                                    <td>' + value.week_no + '</td>\n\
                                </tr>';
                        });
                        table_data += '</tbody>';
                        $("#weekly_sponsor_income_history").html(table_data);
                        generateDataTable('weekly_sponsor_income_history');
                        /*weekly data set end here*/

                        var week_option = '<option value="">Select</option>';
                        $.each(response.data.week_nos, function (key, value) {
                            var selweek = '';
                            if ($('#week_no').val() == value.week_no) {
                                selweek = 'selected';
                            }
                            week_option += '<option ' + selweek + ' value="' + value.week_no + '">' + value.week_no + '</option>';
                        });
                        $('#week_no').html(week_option);
                    } else {
                        showSwal('error', 'Error', response.data);
                        $("#sponsor_income_history_list").html('');
                        $("#weekly_sponsor_income_history").html('');
                        generateDataTable('sponsor_income_history_list');
                        generateDataTable('weekly_sponsor_income_history');
                    }
                    hideLoader();
                }
            });
        }

        function resetFilters() {
            document.getElementById("start-date").value = "";
            document.getElementById("end-date").value = "";
        }
    </script>