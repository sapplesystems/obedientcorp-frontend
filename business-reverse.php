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
            </div>
            <?php include_once 'footer.php'; ?>
            <script type="text/javascript">
                $(document).ready(function () {
                    $("#agent_id").html(down_the_line_members);

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
                                per = $('#bv_type').val()/100;
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
                    if(bv_type_elm && bv_type_elm.value !=''){
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
            </script>