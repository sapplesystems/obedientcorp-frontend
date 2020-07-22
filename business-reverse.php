<?php
include_once 'header.php';
if ($user_type != 'ADMIN') {
    echo '<script type="text/javascript">window.location.href="dashboard";</script>';
}
?>

<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row ">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-4">Business Reverse</h4>
                        <div id="errors_div"></div>
                        <form class="forms-sample" id="reverse_shopping_card_form" name="reverse_shopping_card_form" method="post">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Associate</label>
                                <div class="col-sm-6">
                                    <select class="form-control required" id="agent_id" name="agent_id"></select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Shopping Card Type</label>
                                <div class="col-sm-6">
                                    <select class="form-control required" id="coupon_type_id" name="coupon_type_id">
                                        <option value="">Select</option>
                                        <option value="1">Consumer Goods Shopping Card</option>
                                        <option value="2">Real Estate</option>
                                    </select>
                                </div>
                            </div>
                            <div id="bt_type_div"></div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Amount</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control required" id="amount" name="amount" placeholder="Enter Amount" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Transaction Password</label>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control required" id="transaction_password" name="transaction_password" placeholder="Transaction password" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Comments</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control required" id="comments" name="comments"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3"></label>
                                <div class="col-sm-6 text-right">
                                    <button type="submit" class="btn btn-gradient-success" id="reverse_shopping_card_form_submit">Submit</button>
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
                        <h4 class="card-title mb-4">Business Reverse History</h4>
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
                            <table class="table table-bordered custom_action" id="business_reverse_hisotry"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once 'footer.php'; ?>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#agent_id").html(down_the_line_members);
            $("#agent_list").html(down_the_line_members);
            
            /*BUSINESS HISTORY FILTERS AND FUNCTIONALITY START HERE*/
            $(document).on('change', '#start-date', function () {//$("#end-date").change(function () {
                checkStartEndDate();
            });

            $(document).on('change', '#end-date', function () {//$("#end-date").change(function () {
                checkStartEndDate();
            });

            $(document).on('click', '#reset_filter', function () {
                resetFilters();
                getBusinessReverseHistory({});
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
                getBusinessReverseHistory(params);
            });
            /*BUSINESS HISTORY FILTERS AND FUNCTIONALITY END HERE*/

            $('#coupon_type_id').change(function () {
                var coupon_type_id = $(this).val();
                $('#bt_type_div').html('');
                if (coupon_type_id == '1') {
                    bvListing();
                }
            });

            $('#reverse_shopping_card_form_submit').click(function (e) {
                e.preventDefault();
                var reverse_shopping_card_form = $("#reverse_shopping_card_form");
                reverse_shopping_card_form.validate({
                    rules: {
                        agent_id: "required",
                        coupon_type_id: "required",
                        amount: {
                            required: true,
                            number: true
                        },
                        bt_type: "required",
                        transaction_password: "required",
                        comments: "required",
                    },
                    errorPlacement: function errorPlacement(error, element) {
                        element.before(error);
                    }
                });
                if (reverse_shopping_card_form.valid()) {
                    var per = .50;
                    if ($('#coupon_type_id').val() == '1') {
                        per = $('#bv_type').val() / 100;
                    }
                    var deducted_amount = ($('#amount').val() * per);
                    showSwal('info', 'BV Deduction', 'BV of ' + deducted_amount + ' will be deducted from ' + $("#agent_id option:selected").text());
                    $('.info_swal_ok').click(function () {
                        reverseShoppingCard();
                    });
                }
            });
        });

        function reverseShoppingCard() {
            var bv_type = 50;
            var bv_type_elm = document.getElementById('bv_type');
            if (bv_type_elm && bv_type_elm.value != '') {
                bv_type = bv_type_elm.value;
            }

            $.ajax({
                url: base_url + 'reverse-coupon',
                type: 'post',
                data: {
                    created_by: user_id,
                    created_for: $('#agent_id').val(),
                    comments: $('#payment_comment').val(),
                    coupon_type_id: $('#coupon_type_id').val(),
                    bv_type: bv_type,
                    amount: $('#amount').val(),
                    transaction_password: $('#transaction_password').val(),
                    comments: $('#comments').val(),
                },
                success: function (response) {
                    if (response.status == 'success') {
                        showSwal('success', 'Success', response.data);
                    } else {
                        showSwal('error', 'Error', response.data);
                    }
                    document.getElementById('reverse_shopping_card_form').reset();
                    $('#agent_id').val('').trigger('change');
                }
            });
        }

        function bvListing() {
            $.ajax({
                url: base_url + 'coupon-business-values',
                type: 'post',
                data: {},
                success: function (response) {
                    if (response.status == "success") {
                        var data = response.data;
                        var list = '<div class="form-group row">\n\
                                        <label class="col-sm-3 col-form-label">Shopping Card Business Value Type</label>\n\
                                        <div class="col-sm-6">\n\
                                                <select class="form-control required" id="bv_type" name="bv_type">\n\
                                                        <option value="">Select</option>';
                        $.each(data, function (key, val) {
                            list += '<option value="' + val.business_value + '">' + val.name + '</option>';
                        });
                        list += '</select></div></div>';
                        $('#bt_type_div').html(list);
                    }

                }
            });
        }

        function getBusinessReverseHistory(params) {
            showLoader();
            var table_html = '';
            $("#ewallet_list").html('');
            $.ajax({
                url: base_url + 'reverse-coupon-history',
                type: 'post',
                data: params,
                success: function (response) {
                    if (response.status == "success") {
                        table_html = "<thead>\n\
                                <tr>\n\
                                    <th>Sr No.</th>\n\
                                    <th>Associate Name</th>\n\
                                    <th>Code</th>\n\
                                    <th>Amount</th>\n\
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
                                    <td>' + value.coupon_code + '</td>\n\
                                    <td>' + value.coupon_amount + '</td>\n\
                                    <td>' + value.date + '</td>\n\
                                    <td>Rs. ' + value.comments + '</td>\n\
                                </tr>';
                        });
                        table_html += '</tbody>';
                        $("#business_reverse_hisotry").html(table_html);
                        generateDataTable('business_reverse_hisotry');
                        hideLoader();
                    }
                    else {
                        showSwal('error', 'Error', response.data);
                        $("#business_reverse_hisotry").html('');
                        generateDataTable('business_reverse_hisotry');
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
        
        getBusinessReverseHistory({});
    </script>