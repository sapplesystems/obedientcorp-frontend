get_listing();
get_agent_list();
get_goods_coupon_listing();
getWalletAmount(user_id);

$(document).ready(function () {
    $("#agent").change(function () {
        var user_id = $(this).val();
        getWalletAmount(user_id);
        resetDenominations();
    });
    $(document).on('click', '#cancel-coupon', function (e) {
        resetDenominations();

    });

    $(document).on('click', '#coupon_generate', function (e) {
        e.preventDefault();
        showLoader();
        var is_denomination_quantity = false;
        $('.denomination_quantity').each(function () {
            var denomination_quantity = $(this).val();
            denomination_quantity = Number(denomination_quantity);
            if (denomination_quantity > 0) {
                is_denomination_quantity = true;
            }
        });
        if (is_denomination_quantity) {
            var denominations = [];
            $('.denomination_quantity').each(function () {
                var quantity = $(this).val();
                quantity = Number(quantity);
                if (quantity && quantity > 0) {
                    var elm_id = $(this).attr('id');
                    var denomination_id = elm_id.split('_')[1];
                    denominations.push({
                        id: denomination_id,
                        qty: quantity,
                    });
                }
            });
            var params = {
                created_by: 1,
                created_for: $('#agent').val(),
                comments: 'Coupon generated',
                denominations: denominations
            };

            $.ajax({
                url: base_url + 'coupon/goods/generate',
                type: 'post',
                dataType: 'json',
                data: params,
                success: function (response) {
                    if (response.status) {
                        $('#e_wallet_label').css('display', 'block');
                        $('#rupee_sign').html('&#8377;');
                        $('#e-wallet').html(response.data.amount);
                        showSwal('success', 'Coupon Generated', 'Coupon generated for goods');
                        hideLoader();
                        $('.denomination_quantity').val(0);
                        $('.denomination_total').html('0');
                        $('#denomination_amount_sum').html('0');
                        getWalletAmount($('#agent').val());

                    }

                }
            });
        } else {
            showSwal('error', 'Select Quantity', 'Please select quantity');
            hideLoader();
        }
    });
});

function getWalletAmount(user_id) {
    showLoader();
    var amount = '';
    $.ajax({
        url: base_url + 'check-ewallet-amount',
        type: 'post',
        dataType: 'json',
        data: {
            user_id: user_id
        },
        success: function (response) {
            amount = response.data.amount;
            if (response.status == 'success') {
                $('#e_wallet_label').css('display', 'block');
                $('#rupee_sign').html('&#8377;');
                $('#e-wallet').html(amount);
                get_goods_coupon_listing();
                hideLoader();
            }
            hideLoader();
        }
    });
}

function get_listing() {
    showLoader();
    var url = base_url + 'coupon/denominations';
    $.ajax({
        url: url,
        type: 'post',
        dataType: 'json',
        //data: params,
        success: function (response) {
            if (response.status == 'success') {
                var table_data = '';
                $.each(response.data, function (key, value) {
                    table_data += '<li>\n\
                    <div class="form-group row">\n\
                        <label class="col-sm-4 col-form-label mb-0">&#8377 <span id="coupon_amount_' + value.id + '">' + value.amount + '</span> <span class="multiplyFont">X</span></label>\n\
                        <div class="col-sm-4 p-0">\n\
                            <select class="form-control blackOption denomination_quantity"  id="quantity_' + value.id + '" data-value=' + value.amount + ' onchange="agentTotal(' + value.id + ')">\n\
                            <option value="0">0</option>\n\
                            <option value="1">1</option>\n\
                            <option value="2">2</option>\n\
                            <option value="3">3</option>\n\
                            <option value="4">4</option>\n\
                            <option value="5">5</option>\n\
                            </select>\n\
                        </div>\n\
                        <label class="col-sm-4 col-form-label mb-0">= &#8377 <span class="denomination_total" id="denomination_total_' + value.id + '">0</span></label>\n\
                    <!--<button type="button" class="btn btn-gradient-primary btn-sm" onclick="resetValue(' + value.id + ');">Reset</a>-->\n\
                    </div>\n\
                </li>';
                });
                $("#denomination").html(table_data);
                hideLoader();
            }

        }
    });
}

function get_agent_list() {

    var url = base_url + 'down-the-line-members';
    $.ajax({
        url: url,
        type: 'post',
        dataType: 'json',
        data: {
            user_id: user_id
        },
        success: function (response) {
            if (response.status) {
                var table_data = '';
                $.each(response.data, function (key, value) {
                    table_data += '<option value="' + value.id + '">' + value.display_name + '</option>';
                });
                $("#agent").html(table_data);


            }

        }
    });
}

//function for quantity
function agentTotal(id) {
    var e_wallet = document.getElementById('e-wallet');
    e_wallet_value = e_wallet.innerHTML;
    var e_wallet_amount = 0;
    if (e_wallet && e_wallet_value != '' && e_wallet_value > 0) {
        e_wallet_amount = e_wallet_value;
        e_wallet_amount = Number(e_wallet_amount);
        var quantity = document.getElementById('quantity_' + id).value;
        var denomination_amount = document.getElementById('coupon_amount_' + id).innerHTML;
        quantity = Number(quantity);
        denomination_amount = Number(denomination_amount);
        var denomination_total = (denomination_amount * quantity);
        document.getElementById('denomination_total_' + id).innerHTML = denomination_total.toFixed(2);
        var denomination_amount_sum = 0;
        $('.denomination_total').each(function () {
            var damnt = $(this).html();
            damnt = Number(damnt);
            denomination_amount_sum = (denomination_amount_sum + damnt);
        });
        if (e_wallet_amount >= denomination_amount_sum) {
            $('#denomination_amount_sum').html(denomination_amount_sum.toFixed(2));
        } else {
            document.getElementById('quantity_' + id).value = 0;
            document.getElementById('denomination_total_' + id).innerHTML = '0';
            showSwal('error', 'Insufficient Balance', 'Insufficient balance in your wallet.');
            return false;
        }
    } else {
        document.getElementById('quantity_' + id).value = 0;
        showSwal('error', 'Insufficient Balance', 'Insufficient balance in your wallet.');
        return false;
    }
} //end function agentTolal

function resetValue(id) {
    $('#quantity_' + id).val('0');
    $('#denomination_total_' + id).html('0');
}

function get_goods_coupon_listing() {
    showLoader();
    destroyDataTable();
    var url = base_url + 'coupons';
    var agent = '';
    if ($("#agent").val()) {
        agent_id = $("#agent").val();
    }
    else {
        agent_id = user_id;
    }
    var action_td = '';
    var expiry_date;
    var generated_date;
    $.ajax({
        url: url,
        type: 'post',
        dataType: 'json',
        data: {
            user_id: agent_id
        },
        success: function (response) {
            var i = 1;
            if (response.status) {
                var goods_coupon_list = '';
                var cb_status = '';
                var select_number_of_days = '';
                $.each(response.data, function (key, value) {
                    select_number_of_days = '';
                    var classname = 'odd';
                    if (i % 2 == 0) {
                        classname = 'even';
                    }

                    expiry_date = new Date(value.expiry_date);
                    expiry_date = expiry_date.getDate() + '-' + MonthArr[(expiry_date.getMonth())] + '-' + expiry_date.getFullYear();

                    generated_date = new Date(value.generated_date);
                    generated_date = generated_date.getDate() + '-' + MonthArr[(generated_date.getMonth())] + '-' + generated_date.getFullYear();

                    action_td = '<td><div class="float-left">\n\
                                    <a href="javascript:void(0);" class="btn btn-gradient-primary btn-sm" id="print_coupon_' + value.id + '" \n\
                                        onclick="printCoupon(event, ' + value.id + ', \'' + value.coupon_code + '\', \'' + value.coupon_amount + '\', \'' + generated_date + '\', \'' + expiry_date + '\');">Print Coupon</a>\n\
                                </div></td>';
                    cb_status = '';
                    if (user_type == 'ADMIN') {
                        if (value.status == 'Active') {
                            cb_status = 'checked';
                        }
                        select_number_of_days = daysOptions(value.id);
                        action_td = '<td>\n\
                                        <div class="float-left">\n\
                                            <input class="tgl tgl-skewed" id="cb' + value.id + '" type="checkbox" ' + cb_status + ' onclick="changeCouponStatus(event, ' + value.id + ');"/>\n\
                                            <label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON" for="cb' + value.id + '"></label>\n\
                                        </div>\n\
                                        <div class="float-left ml-3">\n\
                                            <a href="javascript:void(0);" class="btn btn-gradient-primary btn-sm" id="extend_coupon_availability_' + value.id + '" onclick="extendCouponAvailability(event, ' + value.id + ');">Extend Coupon<br/> Availability</a>\n\
                                            <form class="form-inline" style="display:none;" name="extend_coupon_availability_form_' + value.id + '" id="extend_coupon_availability_form_' + value.id + '" method="post">\n\
                                                ' + select_number_of_days + '\n\
                                                <button type="submit" class="btn btn-gradient-success btn-sm" onclick="extendCouponAvailabilitySubmit(event, ' + value.id + ');">Submit</button>&nbsp;\n\
                                                <button type="submit" class="btn btn-gradient-danger btn-sm" onclick="extendCouponAvailabilityCancel(event, ' + value.id + ');">Cancel</button>\n\
                                            </form>\n\
                                        </div>\n\
                                        <div class="float-left ml-3">\n\
                                            <a href="javascript:void(0);" class="btn btn-gradient-primary btn-sm" id="print_coupon_' + value.id + '" onclick="printCoupon(event, ' + value.id + ', \'' + value.coupon_code + '\', \'' + value.coupon_amount + '\', \'' + generated_date + '\', \'' + expiry_date + '\');">Print Coupon</a>\n\
                                        </div>\n\
                                    </td>';
                    }

                    goods_coupon_list += ' <tr role="row" class="' + classname + '">\n\
                                                <td class="sorting_1">' + i + '</td>\n\
                                                <td> ' + value.coupon_code + ' </td>\n\
                                                <td> ' + value.coupon_amount + ' </td>\n\
                                                <td> ' + generated_date + ' </td>\n\
                                                <td id="coupon_updated_date_' + value.id + '"> ' + expiry_date + ' </td>\n\
                                                ' + action_td + '\n\
                                            </tr>';

                    i++;
                });
                $("#agent_coupon_listing").html(goods_coupon_list);
                initDataTable();
                hideLoader();
            }
        }
    });

}

function changeCouponStatus(e, coupon_id) {
    e.preventDefault();
    var url = base_url + 'change-coupon-status';
    $.ajax({
        url: url,
        type: 'post',
        //dataType: 'json',
        data: {
            coupon_id: coupon_id
        },
        success: function (response) {
            if (response.status == 'success') {
                showSwal('success', 'Coupon ' + response.chk_status, response.data);
            }
        }
    });

}

function extendCouponAvailability(e, coupon_id) {
    e.preventDefault();
    $('#extend_coupon_availability_' + coupon_id).css('display', 'none');
    $('#extend_coupon_availability_form_' + coupon_id).css('display', 'block');
}

function extendCouponAvailabilitySubmit(e, coupon_id) {
    e.preventDefault();
    var days = document.getElementById('number_of_days_' + coupon_id);
    if (days.value == '') {
        days.focus();
        return false;
    }
    var url = base_url + 'extend-coupon-availability';
    $.ajax({
        url: url,
        type: 'post',
        //dataType: 'json',
        data: {
            coupon_id: coupon_id,
            days: days.value
        },
        success: function (response) {
            if (response.status == 'success') {
                showSwal('success', 'Coupon Extended ', response.data);
                $('#coupon_updated_date_' + coupon_id).html(response.updated_date);
                extendCouponAvailabilityCancel(e, coupon_id);
            }
            else
            {
                showSwal('error', 'Coupon Not Extended ', 'Coupon not extended');

            }
        }
    });
}

function extendCouponAvailabilityCancel(e, coupon_id) {
    e.preventDefault();
    $('#extend_coupon_availability_' + coupon_id).css('display', '');
    $('#extend_coupon_availability_form_' + coupon_id).css('display', 'none');
    document.getElementById('extend_coupon_availability_form_' + coupon_id).reset();
}

function resetDenominations() {
    $('.denomination_quantity').val(0);
    $('.denomination_total').html('0');
    $('#denomination_amount_sum').html('0');
}

function printCoupon(e, coupon_id, coupon_code, coupon_amount, generated_date, expiry_date) {
    e.preventDefault();
    $('#pCouponCode').html(coupon_code);
    $('#pCouponAmount').html(coupon_amount);
    $('#pGeneratedDate').html(generated_date);
    $('#pExpiryDate').html(expiry_date);
    var print_coupon_div = document.getElementById("print_coupon_div").innerHTML;
    var a = window.open('', '', 'height=500, width=500');
    a.document.write('<html>');
    a.document.write('<body>');
    a.document.write(print_coupon_div);
    a.document.write('</body></html>');
    a.document.close();
    a.print();
}

function daysOptions(id) {
    var options = '';
    for (var i = 2; i <= 30; i++) {
        options += '<option value="' + i + '">' + i + ' Days</option>';
    }
    return '<select class="form-control mr-sm-2 number_of_days" id="number_of_days_' + id + '"><option value="">Select Days</option><option value="1">1 Day</option>' + options + '</select>';
}