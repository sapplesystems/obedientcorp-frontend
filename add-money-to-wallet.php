<?php
include_once 'header.php';
if ($user_type != 'ADMIN') {
    echo '<script type="text/javascript">window.location.href="dashboard";</script>';
}
?>

<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-4">Add Money to Wallet</h4>
                        <div id="errors_div"></div>
                        <form class="forms-sample" id="add-money-to-wallet-form" name="add-money-to-wallet-form" method="post">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Associates</label>
                                <div class="col-sm-4">
                                    <select class="form-control required" id="agents" name="agents"></select>
                                </div>
                                <!--<label class="col-sm-6 col-form-label">Your Wallet Balance: &#8377; <span id="e-wallet">0</span></label>-->
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Amount</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control required" id="amount" name="amount" placeholder="Enter Amount" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Transaction Password</label>
                                <div class="col-sm-4">
                                    <input type="password" class="form-control required" id="transaction_password" name="transaction_password" placeholder="Transaction password" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2"></label>
                                <div class="col-sm-4 text-right">
                                    <button type="submit" class="btn btn-gradient-success" id="add-money-to-wallet-submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-4">Add Money to Wallet History</h4>
                        <div class="clearfix"></div>
                        <div class="form-group row col-sm-12 mt-4">
                            <label class="float-left col-form-label col-sm-1 pr-0 mt-3" style="display: none;">Filters :</label>
                            <div class="col-sm-4 pr-0">
                                <label>Associate ID:</label>
                                <select class="form-control" id="agent_list"></select>
                            </div>
                            <div class="col-sm-4 pr-0">
                                <label>Start Date:</label>
                                <div class="input-group date datepicker p-0">
                                    <input type="text required" class="form-control required" id="start-date" name="start-date" placeholder="From" readonly>
                                    <span class="input-group-addon input-group-append border-left">
                                        <span class="mdi mdi-calendar input-group-text bg-dark"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-4 pr-0">
                                <label>End Date:</label>
                                <div class="input-group date datepicker p-0">
                                    <input type="text required" class="form-control required" id="end-date" name="end-date" placeholder="To" readonly>
                                    <span class="input-group-addon input-group-append border-left">
                                        <span class="mdi mdi-calendar input-group-text bg-dark"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-12 pr-0 text-right mt-4">
                                <a class="btn btn-gradient-danger" id="reset_filter" href="javascript:void(0);">Clear</a>
                                <input type="button" class="btn btn-gradient-success ml-2" id="search_by_type" name="search_by_type" value="Search" />
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
    <?php include_once 'footer.php'; ?>
    <script src="assets/javascript/add_money_to_wallet.js"></script>
    
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
                                    <td>Rs. '+value.amount+' has been credited in ' + value.associate_display_name + ' wallet by the Admin.</td>\n\
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
            $('#agent_list').val('').trigger('change');
            document.getElementById("start-date").value = '';
            document.getElementById("end-date").value = '';
        }

        getEwalletHistory({});
    </script>