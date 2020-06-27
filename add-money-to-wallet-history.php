<?php include_once 'header.php'; ?>
<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-4">Add Money to Wallet History</h4>
                        <div class="clearfix"></div>
                        <div class="form-group row col-sm-12 mt-4">
                            <label class="float-left col-form-label col-sm-1 pr-0 mt-3" style="display: none;">Filters :</label>
                            <div class="col-sm-3 pr-0">
                                <label>Associate ID:</label>
                                <select class="form-control" id="agent_list"></select>
                            </div>
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
                            <div class="col-sm-3 pr-0">
                                <label class="d-block">&nbsp;</label>
                                <input type="button" class="btn btn-gradient-success" id="search_by_type" name="search_by_type" value="Search" />
                                <a class="btn btn-gradient-danger" id="reset_filter" href="#">Clear</a>
                            </div>
                        </div>
                        <div class="overflowAuto">
                            <table class="table table-bordered custom_action" id="ewallet_list"></table>
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
            $("#agent_list").html(down_the_line_members);

            $(document).on('change', '#start-date', function () {//$("#end-date").change(function () {
                checkStartEndDate();
            });

            $(document).on('change', '#end-date', function () {//$("#end-date").change(function () {
                checkStartEndDate();
            });

            $(document).on('click', '#reset_filter', function () {
                resetFilters();
                getEwalletHistory({});
            });

            $(document).on('click', '#search_by_type', function (e) {
                e.preventDefault();
                var start_date = '';
                var end_date = '';
                var uid = '';

                if ($('#start-date').val()) {
                    start_date = $('#start-date').val();
                }
                if ($('#end-date').val()) {
                    end_date = $('#end-date').val();
                }
                if ($('#agent_list').val() && $('#agent_list').val() != '') {
                    uid = $('#agent_list').val();
                }
                var params = {
                    user_id: uid,
                    start_date: start_date,
                    end_date: end_date,
                };
                getEwalletHistory(params);
            });
        });

        function getEwalletHistory(params) {
            showLoader();
            var table_html = '';
            $("#ewallet_list").html('');
            $.ajax({
                url: base_url + 'add-money-to-wallet-history',
                type: 'post',
                data: params,
                success: function (response) {
                    if (response.status == "success") {
                        table_html = "<thead>\n\
                                <tr>\n\
                                    <th>Sr No.</th>\n\
                                    <th>Associate Name</th>\n\
                                    <th>Amount</th>\n\
                                    <th>Type</th>\n\
                                    <th>Date</th>\n\
                                    <th>Description</th>\n\
                                </tr>\n\
                            </thead>";
                        table_html += '<tbody>';
                        var counter = 0
                        $.each(response.data, function (key, value) {
                            counter = counter + 1;
                            table_html += '<tr id="tr_' + value.id + '">\n\
                                    <td>' + counter + '</td>\n\
                                    <td>' + value.associate_display_name + '</td>\n\
                                    <td>' + value.amount + '</td>\n\
                                    <td>' + value.type + '</td>\n\
                                    <td>' + value.date + '</td>\n\
                                    <td>' + value.description + '</td>\n\
                                </tr>';
                        });
                        table_html += '</tbody>';
                        $("#ewallet_list").html(table_html);
                        generateDataTable('ewallet_list');
                        hideLoader();
                    }
                    else {
                        showSwal('error', 'Error', response.data);
                        $("#ewallet_list").html('');
                        generateDataTable('ewallet_list');
                        hideLoader();
                    }

                }
            });
        }

        function resetFilters() {
            $('#agents').val('').trigger('change');
            document.getElementById("start-date").value = '';
            document.getElementById("end-date").value = '';
        }

        getEwalletHistory({});
    </script>