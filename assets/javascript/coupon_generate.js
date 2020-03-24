get_listing();
get_agent_list();
get_goods_coupon_listing();
getWalletAmount(user_id);

$(document).ready(function () {
    $("#agent").change(function () {
        var user_id = $(this).val();
        getWalletAmount(user_id);
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
        //console.log(is_denomination_quantity);
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
            console.log(response);
            if (response.status == 'success') {
                var table_data = '';
                $.each(response.data, function (key, value) {
                    console.log(value);
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
                //console.log(table_data);
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
                //console.log(table_data);
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
        console.log(e_wallet_amount);
        console.log(denomination_amount_sum);
        if (e_wallet_amount >= denomination_amount_sum) {
            $('#denomination_amount_sum').html(denomination_amount_sum);
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
    var url = base_url + 'coupons';
    var agent = '';
    //console.log($("#agent").val());return false;
    if ($("#agent").val()) {
        agent_id = $("#agent").val();
    }
    else {
        agent_id = user_id;
    }
    var action = '';
    if (user_type == 'ADMIN') {
        action = '<a href="javascript:void(0);" class="btn btn-gradient-primary btn-sm">Change coupon status</a> &nbsp &nbsp <a href="javascript:void(0);" class="btn btn-gradient-primary btn-sm">Extend Coupon availability</a>';
    }
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
                $.each(response.data, function (key, value) {
                    var classname = 'odd';
                    if (i % 2 == 0) {
                        classname = 'even';
                    }
                    goods_coupon_list += ' <tr role="row" class="' + classname + '">\n\
                    <td class="sorting_1">' + i + '</td>\n\
                    <td> ' + value.coupon_code + ' </td>\n\
                    <td> ' + value.coupon_amount + ' </td>\n\
                    <td>' + action + '</td>\n\
                </tr>';

                    i++;
                });
                $("#agent_coupon_listing").html(goods_coupon_list);
                hideLoader();
            }
        }
    });

}