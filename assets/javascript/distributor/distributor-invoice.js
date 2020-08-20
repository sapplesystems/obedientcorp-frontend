var products = [];
var maxField = 10; //Input fields increment limitation
var validCoupons = [];
var cashAmount = 0;
var couponAmount = 0;
var sub_total = 0;
var total_tax = 0;
var total = 0;
var coupon_added = 0;
var isVerifyOTP = 0;
var x = 0;
var ProductCouponType = [];
var CouponCodeType = [];
var global_ui = {};
var cash_note = '';

$(document).ready(function () {
    getProductList();
    var datetime = new Date();
    var day = datetime.getDate();
    day = (day < 10) ? '0' + day : day;
    var month = MonthArr[datetime.getMonth()];
    var year = datetime.getFullYear();
    var todays_date = day + "-" + month + "-" + year;
    var time = datetime.getHours() + ":" + datetime.getMinutes() + ":" + datetime.getSeconds();
    var current_date_time = todays_date + ' ' + time;
    $('#today_date').html(current_date_time);
    $("#dist-payment-form").submit(function (e) {
        e.preventDefault();
        var payment_frm = $("#dist-payment-form");
        payment_frm.validate({
            rules: {
                search_customer: {
                    number: true,
                    minlength: 10,
                    maxlength: 10,
                },
            },
            errorPlacement: function errorPlacement(error, element) {
                element.before(error);
            },
        });
        if ($("#dist-payment-form").valid()) {
            $.ajax({
                url: base_url + "invoice/agent-mobileno",
                type: 'post',
                dataType: "json",
                data: {
                    mobile_no: $('#search-customer').val()
                },
                success: function (response) {
                    if (response.status == 'success') {
                        var rank = response.rank;
                        if (response.data.rank != null) {
                            rank = response.data.rank;
                        }
                        $('#associate-name').html('<span id="associate_name" data-value="' + response.data.id + '" class="editable">' + response.data.associate_name + '</span>  <span>' + rank + '</span>');
                        //enableCouponBtn();
                    }
                    else {
                        var html = '<input type="text" name="associate_name" data-value="0" id="associate_name" class="customer_input" placeholder="Enter customer name"/>';
                        $('#associate-name').html(html);
                        //disableCouponBtn();
                    }
                }
            });
        }
    });

    //search product
    $("#search-product").autocomplete({
        multiple: true,
        source: products,
        select: function (event, ui) {
            global_ui = ui;
            var item_lot_number = ui.item.lot_no;
            if (item_lot_number.length > 0) {
                if (item_lot_number.length == 1) {
                    checkQuantity(ui.item.id, item_lot_number[0]);
                } else {
                    var set_lot_numbers = '';
                    var lq = 0;
                    var lot_quantity = ui.item.lot_quantity;
                    var qty_array = [];
                    var test_id = 3;
                    $.each(item_lot_number, function (key, value) {
                        var style_css = '';
                        if (lot_quantity[lq] < 0 || lot_quantity[lq] == 0) {
                            style_css = 'style="background: red; color: #fff; font-weight: bold"';
                        }
                        set_lot_numbers += '<tr ' + style_css + '>\n\
                        <td><input style="position:inherit;" type="radio" id="test' + test_id + '" name="lot_no_radio" value="' + value + '" data-value="' + lot_quantity[lq] + '"></td>\n\
                        <td><label for="test' + test_id + '">' + value + '</label></td>\n\
                        <td><label>' + lot_quantity[lq] + '</label></td>\n\
                        </tr>>';
                        qty_array.push({radio: '#test' + test_id, qty: lot_quantity[lq]});
                        lq++
                        test_id++;
                    });
                    qty_array.sort(function (a, b) {
                        return b.qty - a.qty;
                    });
                    $('#lot_quantity').html(set_lot_numbers);
                    $(qty_array[0].radio).prop('checked', true);
                    $('#lot_select').html('<button onclick="selectLotNo(\'' + ui.item.id + '\');">Select</button>');
                    $('#lot_numbers_popup').addClass('is-visible');
                }
            } else {
                checkQuantity(ui.item.id, '0');
            }

        }

    });

    $(document).on('click', '#add-coupon', function () {
        $('#CouponCode').html('<div>\n\
      <input type="text" placeholder="Enter Shopping Card Code"  id="coupon_code_1" class="width85 couponCode" />\n\
      <div class="action_apply"><span class="plus_Icon add_button" aria-hidden="true">&#43;</span></div>\n\
  </div>');
        $('#apply_Coupon').addClass('is-visible');
    });

    $(document).on('click', '#pay-cash', function () {
        var html = '<div class="payDiv"><div><input type="text" placeholder="Amount" id="cash" name="cash" value="" /></div>\n\
        <div><button onclick="PayCash();">Pay</button></div>\n\
        <div><textarea placeholder="Comment" id="cash_note" name="cash_note" /></textarea></div></div>';
        $('#cash-popup').html(html);
        $('#cash_note').val(cash_note);
        $('#pay_Cash').addClass('is-visible');

    });

    $(document).on('click', '.add_button', function () {
        if (x < maxField) {
            x++; //Increment field counter
            var fieldHTML = '<div id="divCode_' + x + '" class="marginTop10">\n\
       <input type="text" placeholder="Enter Shopping Card Code"  id="coupon_code_' + x + '" name="code" class="width85 couponCode" />\n\
       <div class="action_apply"><span  class="minus_Icon"><i style="cursor:pointer;" class="fa fa-trash-o icon_trash" onclick="removeButton(' + x + ');"></i></span></div>\n\
       </div>';
            $('#CouponCode').append(fieldHTML); //Add field html
        }
    });

    $('#save_value').click(function () {
        var arrayCoupon = [];
        var total_coupon = [];
        $('.couponCode').each(function () {
            arrayCoupon.push($(this).val());
            total_coupon.push($(this).val());
        });

        $('.applied_coupon_code').each(function () {
            var cc = $(this).html();
            total_coupon.push(cc.trim());
        });

        var couponCode = arrayCoupon.toString();
        var user_id = $('#associate_name').attr('data-value');
        $.ajax({
            url: base_url + "invoice/add-coupon",
            type: 'post',
            dataType: "json",
            data: {
                coupon_code: couponCode, total_coupon_code: total_coupon
            },
            success: function (response) {
                var html = '';
                if (response.status == 'success') {
                    if (response.data.length > 0) {
                        var c_amount = 0;//for sum of coupon amount
                        $.each(response.data, function (key, value) {
                            if (isCouponAlreadyExits(value.id) == true) {
                                coupon_added = 1;
                                c_amount = c_amount + Number(value.coupon_amount);
                                html += '<tr id="coupon_tr_' + value.id + '" class="coupon_tot_amount total_coupon">\n\
                          <td width="8%">\n\
                            <input type="hidden" class="bvcc" value="' + value.id + '" />\n\
                            <input type="hidden" id="ccode_' + value.id + '" value="' + value.coupon_business_name + '" />\n\
                            <input type="hidden" id="camnt_' + value.id + '" value="' + value.coupon_amount + '" />\n\
                            <input type="hidden" class="coupon_user_id" id="" value="' + response.coupon_user_id + '" />\n\
                            <i style="cursor:pointer;" class="fa fa-trash-o trash_icon" onclick="removeCoupon(' + value.id + ');"></i>\n\
                          </td>\n\
                          <td width="62%">CODE: <span class="applied_coupon_code">' + value.coupon_code + '</span> - ' + value.coupon_business_name + '</td>\n\
                          <td width="30%" class="text-right"><strong>&#8377;<span id="coupon_' + value.id + '">' + value.coupon_amount + '</span></strong></td>\n\
                      </tr>';
                            }
                        });
                        couponAmount = (couponAmount + c_amount);

                        $('#coupon-data').append(html);
                        calcAmountDue();
                        if (response.message) {
                            showSwal('error', response.message);
                        }
                    }
                    else {
                        if (response.message) {
                            showSwal('error', response.message);
                        }
                    }
                    $('.cd-popup').removeClass('is-visible');
                } else {
                    showSwal('error', response.data);
                }
            }
        });

    });


});//document ready

function SubValue(id) {
    var qty = $('#qty_' + id).val();
    qty = Number(qty);
    qty--;
    if (qty > 0) {
        $('#qty_' + id).val(qty);
        var total = Number($('#org_tot_' + id).val()) * Number(qty);
        var dp = Number($('#org_dp_' + id).val()) * Number(qty);
        var cgst = Number($('#org_cgst_' + id).val()) * Number(qty);
        var sgst = Number($('#org_sgst_' + id).val()) * Number(qty);
        var igst = Number($('#org_igst_' + id).val()) * Number(qty);
        $('#dp_' + id).val(dp);
        //$('#dealer_price_' + id).html(dp);
        $('#tot_' + id).html(total.toFixed(2));
        $('#cgst_' + id).val(cgst);
        $('#sgst_' + id).val(sgst);
        $('#igst_' + id).val(igst);
        SubTotal();
    }

}
function AddValue(id) {
    var qty = $('#qty_' + id).val();
    var inv_item_qty = $('#inv_item_qty_' + id).val();
    qty = Number(qty);
    inv_item_qty = Number(inv_item_qty);
    if (qty == inv_item_qty && (qty - inv_item_qty) == 0) {
        $('#id_add_qty').val(id);
        $('#items_qty_popup_add_qty').addClass('is-visible');
        return false;
    }
    AddValueAfterChequeQty(id);
}

function addItemQty(status) {
    if (status == '1') {
        var id = $('#id_add_qty').val();
        AddValueAfterChequeQty(id);
    }
    $('#id_add_qty').val('');
    $('#items_qty_popup_add_qty').removeClass('is-visible');
}

function AddValueAfterChequeQty(id) {
    var qty = $('#qty_' + id).val();
    qty = Number(qty);
    qty++;
    $('#qty_' + id).val(qty);
    var total = Number($('#org_tot_' + id).val()) * Number(qty);
    var dp = Number($('#org_dp_' + id).val()) * Number(qty);
    var cgst = Number($('#org_cgst_' + id).val()) * Number(qty);
    var sgst = Number($('#org_sgst_' + id).val()) * Number(qty);
    var igst = Number($('#org_igst_' + id).val()) * Number(qty);
    $('#dp_' + id).val(dp);
    //$('#dealer_price_' + id).html(dp);
    $('#tot_' + id).html(total.toFixed(2));
    $('#cgst_' + id).val(cgst);
    $('#sgst_' + id).val(sgst);
    $('#igst_' + id).val(igst);
    SubTotal();
}

function getProductList() {
    var url = base_url + 'distributor/products';
    $.ajax({
        url: url,
        type: 'post',
        data: {distributor_id: distributor_id},
        success: function (response) {
            if (response.status == "success") {
                if (response.data) {
                    $.each(response.data, function (i, value) {
                        var search_prod = value.search_product + ' - ' + value.coupon_business_name;
                        products.push({id: value.id, label: search_prod, value: search_prod, dealer_price: value.dealer_price, cgst: value.cgst, igst: value.igst, sgst: value.sgst, code: value.sku, coupon_type: value.coupon_business_name, lot_no: value.lot_no, lot_quantity: value.lot_quantity});
                    });
                }
            }
        }
    });
}//end function

function removeButton(i) {
    $('#divCode_' + i).remove();
    x--;

}

function verifyCoupons() {
    var coupon_user_id = '';
    var customer_phoneno = $('#search-customer').val();
    if (customer_phoneno == '') {
        showSwal('error', 'Please Enter Customer Phone Number');
        return false;
    }
    else if (coupon_added == 0) {
        showSwal('error', 'Coupon Not Selected', 'Coupons not selected');
        return false;
    }

    if ($('.coupon_user_id').val()) {
        coupon_user_id = $('.coupon_user_id').val();
    }
    var url = base_url + 'invoice/send-coupon-otp';
    $.ajax({
        url: url,
        type: 'post',
        data: {coupon_user_id: coupon_user_id},
        success: function (response) {
            if (response.status == "success") {
                showSwal('success', 'OTP SEND', response.data);
                resetOtps();
                $('#verify_Coupon').addClass('is-visible');
                //$('#info').val(response.info.id);
                //setTimeout(function(){ $('#verifyOtpRequest').modal(); }, 1000);
            }
            else {
                showSwal('error', response.data);
            }
        }
    });
}

function verifyOTP() {
    var otp_array = [];
    var coupon_user_id = '';
    if ($('.otp').val() == '') {
        showSwal('error', 'NO OTP', 'Please Enter OTP');
        return false;
    }
    $('.otp').each(function () {
        otp_array.push($(this).val());
    });
    if ($('.coupon_user_id').val()) {
        coupon_user_id = $('.coupon_user_id').val();
    }
    var url = base_url + 'invoice/verify-otp';
    $.ajax({
        url: url,
        type: 'post',
        data: {
            otp: otp_array.join(''),
            coupon_user_id: coupon_user_id,
        },
        success: function (response) {
            if (response.status == "success") {
                isVerifyOTP = 1;
                $('.cd-popup').removeClass('is-visible');
                showSwal('success', 'Verify OTP', response.data);
            }
            else {
                showSwal('error', response.data);
            }
        }
    });
}

//function for show sub total of product
function SubTotal() {
    ProductCouponType = [];
    var sub_total = 0;
    var tax = 0;
    var total = 0;
    $('.items').each(function () {
        var id = $(this).val();
        var bv_type = $('#product_coupon_type_' + id).val();
        sub_total = (sub_total + Number($('#dp_' + id).val()));
        tax = (tax + Number($('#cgst_' + id).val()) + Number($('#sgst_' + id).val()));// + Number($('#igst_' + id).val())
        total = (total + Number($('#tot_' + id).html()));
        ProductCouponType.push({'bv_type': bv_type, 'amount': Number($('#tot_' + id).html())});
    });

    ProductCouponType = makeUniqueBvTypeAmount(ProductCouponType);

    total_tax = tax;
    $('#subTotal-amount').html(sub_total.toFixed(2));
    $('#total-tax').html(tax.toFixed(2));
    $('#total-amount').html(total.toFixed(2));
    $('#totalPayment').html(total.toFixed(2));
    calcAmountDue();
}

function totalAppliedCoupon() {
    var ctype = [];
    validCoupons = [];
    $('.bvcc').each(function () {
        var id = $(this).val();
        validCoupons.push(id);
        var ccode = $('#ccode_' + id).val();
        var camnt = $('#camnt_' + id).val();
        ctype.push({'bv_type': ccode, 'amount': camnt});
    });

    CouponCodeType = makeUniqueBvTypeAmount(ctype);
}

//function for get cash payment value
function PayCash() {
    if ($('#cash').val() != '') {
        var html = '';
        var cash = Number($('#cash').val());
        cash = cash.toFixed(2);
        if (cashAmount > 0) {
            cashAmount = (Number(cashAmount) + Number($('#cash').val()));
        } else {
            cashAmount = Number($('#cash').val());
        }
        cash_note = $('#cash_note').val();
        var t = new Date().getTime();
        html += '<tr id="cash_tr_' + t + '" class="coupon_tot_amount">\n\
                    <td width="8%"><i onclick="removeCashTr(event, ' + t + ', ' + cash + ');" style="cursor:pointer;" class="fa fa-trash-o trash_icon"></i></td>\n\
                    <td width="62%">CASH:</td>\n\
                    <td width="30%" class="text-right"><strong>&#8377;<span> ' + cash + '</span></strong></td>\n\
                </tr>';

        $('.cd-popup').removeClass('is-visible');
        $('#coupon-data').append(html);
        $('#coupons').css('display', '');
        calcAmountDue();
    } else {
        showSwal('error', 'Please enter amount');
    }


}

function validate_customer_product() {
    var totalRowCount = $("#item-list li").length;
    var customer_name = $('#associate_name').attr('data-value');
    if (customer_name == undefined) {
        showSwal('error', 'Customer Not Selected', 'Please select customer');
        $('.cd-popup').removeClass('is-visible');
        return false;
    }
    else if (totalRowCount <= 0) {
        showSwal('error', 'Product Not Selected', 'Please select product');
        $('.cd-popup').removeClass('is-visible');
        return false;
    }
    else {
        return true;
    }
}


//generate invoice function
function generateInvoice() {
    var total_amount = Number($('#totalPayment').html());
    var due_payment = Number($('#due_payment').html());
    var name = '';
    var mobile_no = '';
    var user_id = '';
    if ($('#associate_name').attr('data-value') == 0) {
        user_id = $('#associate_name').attr('data-value');
        name = $('#associate_name').val();
        mobile_no = $('#search-customer').val();
    }
    else {
        user_id = $('#associate_name').attr('data-value');
        name = $('#associate_name').html();
        mobile_no = $('#search-customer').val();
    }
    if (total_amount > 0 && due_payment <= 0) {
        var items = [];
        $('.items').each(function () {
            var items_ids = $(this).val();
            if (items_ids && items_ids != '') {
                var item_qty = $('#qty_' + items_ids).val();
                var item_id = $('#item_id_' + items_ids).val();
                items.push({
                    item_id: item_id,
                    qty: item_qty,
                    cgst: $('#cgst_' + items_ids).val(),
                    sgst: $('#sgst_' + items_ids).val(),
                    igst: $('#igst_' + items_ids).val(),
                    lot_no: $('#lotNo_' + items_ids).val(),
                });
            }
        });

        var params = {
            invoice_coupon_code: validCoupons,
            invoice_item: items,
            user_id: user_id,
            name: name,
            mobile_no: mobile_no,
            distributor_id: distributor_id,
            subtotal_amount: $('#total-amount').html(),
            total_amount: $('#total-amount').html(),
            coupon_amount: couponAmount,
            cash_amount: cashAmount,
            sale_note: $('#sale-note').val(),
            cash_note: cash_note,
        };

        var url = base_url + 'invoice/generate-invoice';
        $.ajax({
            url: url,
            type: 'post',
            data: params,
            success: function (response) {
                if (response.status == "success") {
                    $('#generated_invoice_id').val(response.invoice_id);
                    $('#before_inovice_generate').removeClass('is-visible');
                    $('#success_generate_invoice').addClass('is-visible');
                    //showSwal('success', 'Invoice Generated', response.data);
                    var msg = '<span>' + response.data + '</span>';
                    $('#success_generate_invoice_msg').html(msg);
                    enableCouponBtn();
                }
                else {
                    showSwal('error', response.data);
                    CancelInvoice();
                }
            }
        });
    }

}

function closePopUP() {
    $('.cd-popup').removeClass('is-visible');
}

function successInvoice()
{
    CancelInvoice();
    $('.cd-popup').removeClass('is-visible');
}

function removeProduct(id) {
    var totalRowCount = $("#item-list li").length;
    if (totalRowCount == 1) {
        sub_total = 0;
        total_tax = 0;
        total = 0;
        $('#item-list').html('');

    }
    $('#tr_' + id).remove();
    SubTotal();

}

function removeCoupon(id) {
    var totalRow = $('#coupon-data tr').length;
    var coupon_amt = $('#coupon_' + id).html();
    $('#coupon_tr_' + id).remove();
    couponAmount = (Number(couponAmount) - Number(coupon_amt));
    if (couponAmount <= 0) {
        couponAmount = 0;
        coupon_added = 0;
        isVerifyOTP = 0;
        validCoupons = [];
    }
    calcAmountDue();
}

function CancelInvoice() {
    validCoupons = [];
    cashAmount = 0;
    couponAmount = 0;
    sub_total = 0;
    total_tax = 0;
    total = 0;
    coupon_added = 0;
    isVerifyOTP = 0;
    x = 0;
    ProductCouponType = [];
    CouponCodeType = [];
    cash_note = '';
    $('#search-customer').val('');
    $('#coupon-data').html('');
    $('#item-list').html('');
    $('#associate-name').html('');
    $('#subTotal-amount').html('0.00');
    $('#total-tax').html('0.00');
    $('#total-amount').html('0.00');
    $('#totalPayment').html('0.00');
    $('#sale-note').val('');
    $('#due_payment').html('0.00');
    $('#coupons').css('display', 'none');
    enableCouponBtn();
}

function enableCouponBtn() {
    $('.add-coupon').attr('id', 'add-coupon');
    $('.verify-coupon').attr('id', 'verify-coupon');
    $('.verify-coupon').attr('onclick', 'verifyCoupons();');
    $('.add-coupon').css('background-color', '#b66dff');
    $('.verify-coupon').css('background-color', '#b66dff');
}

function disableCouponBtn() {
    $('.add-coupon').removeAttr('id');
    $('.verify-coupon').removeAttr('id');
    $('.verify-coupon').removeAttr('onclick');
    $('.add-coupon').css('background-color', '#9c92a7');
    $('.verify-coupon').css('background-color', '#9c92a7');
}

function itemsAlreadyExits(id, lot_no, ui) {
    var elmid = id + '_' + lot_no;
    var totalRowCount = $("#item-list li").length;
    if (totalRowCount) {
        var li_elm = document.getElementById('tr_' + elmid);
        var lot_elm = document.getElementById('lotNo_' + elmid);
        if (li_elm && lot_elm && lot_elm.value == lot_no) {
            AddValue(elmid);
        } else {
            setItemUiList(ui, lot_no);
        }
    } else {
        setItemUiList(ui, lot_no);
    }
    setTimeout(function () {
        $('#search-product').val('');
    }, 100);
    SubTotal();
}

function calcAmountDue() {
    totalAppliedCoupon();
    var temp_due = 0;
    var temp_coupon_amount = 0;
    var tot = Number($('#total-amount').html());
    var duePayment = 0;

    if (CouponCodeType.length > 0) {
        $('#coupons').css('display', '');
        var bv_len = CouponCodeType.length;
        for (var i = 0; i < bv_len; i++) {
            var ccode = CouponCodeType[i].name;
            var camnt = CouponCodeType[i].value;
            if (ProductCouponType.length > 0) {
                var bvp_len = ProductCouponType.length;
                for (var j = 0; j < bvp_len; j++) {
                    var pccode = ProductCouponType[j].name;
                    var pcamnt = ProductCouponType[j].value;
                    if (pccode === ccode) {
                        if (Number(camnt) > Number(pcamnt)) {
                            temp_coupon_amount = (temp_coupon_amount + Number(pcamnt));
                        } else {
                            temp_coupon_amount = (temp_coupon_amount + Number(camnt));
                        }
                    }
                }
            }
        }
    }

    if (cashAmount < tot || couponAmount < tot) {
        var amount = (Number(cashAmount) + Number(temp_coupon_amount));
        duePayment = (Number(tot) - Number(amount));
    }
    temp_due = duePayment;
    if (duePayment < 0) {
        temp_due = 0;
    }
    if (temp_due > 0) {
        $('.due_amount').css('display', '');
    }
    $('.due_amount').css('display', '');
    $('#due_payment').html(temp_due.toFixed(2));

}

function removeCashTr(e, t, amnt) {
    e.preventDefault();
    $('#cash_tr_' + t).remove();
    cashAmount = (Number(cashAmount) - Number(amnt));
    if (cashAmount < 0) {
        cashAmount = 0;
    }
    calcAmountDue();
}


function changeOtpTab(a, b) {
    if (document.getElementById('textotp' + a).value != '') {
        document.getElementById('textotp' + b).focus();
    }
}

function isCouponAlreadyExits(cid) {
    if (document.getElementById('coupon_tr_' + cid)) {
        return false;
    } else {
        return true;
    }
}

function makeUniqueBvTypeAmount(obj) {
    var holder = {};

    obj.forEach(function (d) {
        if (holder.hasOwnProperty(d.bv_type)) {
            holder[d.bv_type] = Number(holder[d.bv_type]) + Number(d.amount);
        } else {
            holder[d.bv_type] = Number(d.amount);
        }
    });

    var obj2 = [];

    for (var prop in holder) {
        obj2.push({name: prop, value: Number(holder[prop])});
    }
    return obj2;
}

function resetOtps() {
    $('#textotp1').val('');
    $('#textotp2').val('');
    $('#textotp3').val('');
    $('#textotp4').val('');
    $('#textotp5').val('');
    $('#textotp6').val('');
}

function checkBeforeGenerateInvoice() {
    $('#before_inovice_generate').removeClass('is-visible');
    var total_amount = Number($('#totalPayment').html());
    var due_payment = Number($('#due_payment').html());
    if (total_amount && total_amount != '') {
        total_amount = Number(total_amount);
    }
    if (due_payment && due_payment != '') {
        due_payment = Number(due_payment);
    }

    var name = '';
    var mobile_no = '';
    var user_id = '';
    if (couponAmount > 0 && isVerifyOTP == 0) {
        showSwal('error', 'Coupon Verification', 'Please verify the applied coupon with otp sent to your given mobile number.');
        return false;
    } else if (due_payment > 0) {
        showSwal('error', 'Balance Due', 'You need to pay Rs. ' + due_payment);
        return false;
    }
    if ($('#associate_name').attr('data-value') == 0) {
        user_id = $('#associate_name').attr('data-value');
        name = $('#associate_name').val();
        mobile_no = $('#search-customer').val();
    }
    else {
        user_id = $('#associate_name').attr('data-value');
        name = $('#associate_name').html();
        mobile_no = $('#search-customer').val();
    }
    if (name == '' || mobile_no == '') {
        showSwal('error', 'No customer selected', 'No customer selected');
        return false;
    }

    var flag = 0;
    var coupon_amount_msg = '';
    var coupon_len = CouponCodeType.length;
    var product_len = ProductCouponType.length;
    if (coupon_len > 0) {
        for (var i = 0; i < coupon_len; i++) {
            var ccode = CouponCodeType[i].name;
            var camnt = CouponCodeType[i].value;
            if (product_len > 0) {
                for (var j = 0; j < product_len; j++) {
                    var pccode = ProductCouponType[j].name;
                    var pcamnt = ProductCouponType[j].value;
                    if (pccode === ccode && Number(camnt) > Number(pcamnt)) {
                        flag = 1;
                        var extra_coupon_amnt = (Number(camnt) - Number(pcamnt));
                        var p_class = 'text-primary';
                        if (ccode == 'SC30') {
                            p_class = 'text-info';
                        }
                        if (ccode == 'SC40') {
                            p_class = 'text-warning';
                        }
                        if (ccode == 'SC50') {
                            p_class = 'text-danger';
                        }
                        if (ccode == 'SC60') {
                            p_class = 'text-success';
                        }
                        if (ccode == 'SC77') {
                            p_class = 'text-primary';
                        }
                        coupon_amount_msg += '<div class="' + p_class + '">' + ccode + ': ' + extra_coupon_amnt.toFixed(2) + '</div>';
                    }
                }
            }
        }
    }
    var msg = '';
    if (flag == 1) {
        msg = '<div>You can purchase more item using your already applied coupon:</div>' + coupon_amount_msg;
        msg += '<div>Click <strong>Yes</strong> to generate invoice.</div>';
        $('#before_inovice_generate_message').html(msg);
        $('#before_inovice_generate').addClass('is-visible');
        //return false;
    } else {
        //return true;
        generateInvoice();
    }
}

function printInvoice(e) {
    e.preventDefault();
    var invoice_id = $('#generated_invoice_id').val();
    if (invoice_id) {
        var win = window.open('print-invoice.php?invoice_id=' + invoice_id, '', 'height=1000,width=1000');
    }
    //var tab = document.getElementById('mainContent');
    
    //win.document.write(tab.outerHTML);
    //win.document.close();
    //win.print();
}

function selectLotNo(item_id) {
    var lot_no = $("input[name='lot_no_radio']:checked").val();
    if (!lot_no || lot_no == '' || lot_no == undefined) {
        showSwal('error', 'Select lot number', 'Select lot number');
        return false;
    }
    checkQuantity(item_id, lot_no);
}

function checkQuantity(item_id, lot_no) {
    var item_qty = getItemQuantity(global_ui, lot_no);
    if (!item_qty || item_qty <= 0) {
        $('#add_item_id').val(item_id);
        $('#add_item_lot').val(lot_no);
        $('#items_qty_popup').addClass('is-visible');
        return false;
    }
    itemsAlreadyExits(item_id, lot_no, global_ui);
    global_ui = {};
    $('#lot_numbers_popup').removeClass('is-visible');
    $('#items_qty_popup').removeClass('is-visible');
}
function setItemsAlreadyExits(status) {
    if (status == '1') {
        var item_id = $('#add_item_id').val();
        var lot_no = $('#add_item_lot').val();
        itemsAlreadyExits(item_id, lot_no, global_ui);
    }
    global_ui = {};
    $('#add_item_id').val('');
    $('#add_item_lot').val('');
    $('#lot_numbers_popup').removeClass('is-visible');
    $('#items_qty_popup').removeClass('is-visible');
    $('#search-product').val('');
}

function getItemQuantity(ui, lot_no) {
    var item_lot = ui.item.lot_no;
    var item_lot_length = item_lot.length;
    var item_qty = 0;
    if (item_lot_length == 1) {
        item_qty = global_ui.item.lot_quantity[0];
    } else {
        var lq = 0;
        $.each(item_lot, function (key, value) {
            if (lot_no == value) {
                item_qty = global_ui.item.lot_quantity[key];
            }
            lq++
        });
    }
    return item_qty;
}

function setItemUiList(ui, lot_no) {
    $('#items').css('display', '');
    var html = '';
    var cgst = 0;
    var sgst = 0;
    var igst = 0;
    var gst_tax = 0;
    var dealer_price_without_tax = 0;
    if (ui.item.cgst != 0) {
        cgst = (Number(ui.item.dealer_price) * (Number(ui.item.cgst) / 100)).toFixed(2);
    }
    if (ui.item.sgst != 0) {
        sgst = (Number(ui.item.dealer_price) * (Number(ui.item.sgst) / 100)).toFixed(2);
    }
    if (ui.item.igst != 0) {
        igst = (Number(ui.item.dealer_price) * (Number(ui.item.igst) / 100)).toFixed(2);
    }
    gst_tax = Number(cgst) + Number(sgst) + Number(igst);
    total_tax = (total_tax + gst_tax);
    dealer_price_without_tax = (Number(ui.item.dealer_price) - gst_tax).toFixed(2);

    var unique_id = ui.item.id + '_' + lot_no;
    var item_qty = getItemQuantity(ui, lot_no);

    html += '<li class="js-productContainer productContainer products" id="tr_' + unique_id + '" data-pid="204592-066-M11" data-pidmaster="204592">\n\
                            <div class="productContainerRow">\n\
                                <div class="columnCell column1 productImage text-center"><i style="cursor:pointer;" class="fa fa-trash-o trash_icon" onclick="removeProduct(\'' + unique_id + '\');"></i></div>\n\
                                <div class="columnCell column1 productImage text-left"><span  tabindex="-1" aria-hidden="true">' + ui.item.value + '</span></div>\n\
                                <div class="columnCell column2 productDetails">\n\
                                    <div class="">\n\
                                        <p><span>' + ui.item.code + '</span></p>\n\
                                        <p id="display_lot_number_' + unique_id + '">Lot: ' + lot_no + '</p>\n\
                                        <input type="hidden" id="lotNo_' + unique_id + '" value="' + lot_no + '" />\n\
                                        <input type="hidden" id="inv_item_qty_' + unique_id + '" value="' + item_qty + '" />\n\
                                    </div>\n\
                                </div>\n\
                                <div class="columnCell column4 productQuantity">\n\
                                    <form>\n\
                                        <div class="value-button" id="sub_' + unique_id + '" onclick="SubValue(\'' + unique_id + '\');" value="Decrease Value"><i class="fa fa-minus"></i></div>\n\
                                        <input type="number" id="qty_' + unique_id + '" value="1" readonly />\n\
                                        <div class="value-button" id="add_' + unique_id + '" onclick="AddValue(\'' + unique_id + '\');"value="Increase Value"><i class="fa fa-plus"></i></div>\n\
                                    </form>\n\
                                </div>\n\
                                <div class="columnCell column2">\n\
                                    <div class="price">\n\
                                        <div class="text-gray-dark cx-heavy-brand-font mt3" id="dealer_price_' + unique_id + '">' + ui.item.dealer_price + '</div>\n\
                                    </div>\n\
                                </div>\n\
                                <div class="columnCell column2 productPriceTotal">\n\
                                    <div class="price">\n\
                                        <div class="text-gray-dark cx-heavy-brand-font mt3 total_pay" id="tot_' + unique_id + '">' + ui.item.dealer_price + '</div>\n\
                                    </div>\n\
                                </div>\n\
                            </div>\n\
                            <div class="clear hidden-lg"></div>\n\
                            <input type="hidden" id="product_coupon_type_' + unique_id + '" value="' + ui.item.coupon_type + '" />\n\
                            <input type="hidden" class="dp" id="dp_' + unique_id + '" value="' + dealer_price_without_tax + '" />\n\
                            <input type="hidden" id="cgst_' + unique_id + '" value="' + cgst + '" />\n\
                            <input type="hidden" id="sgst_' + unique_id + '" value="' + sgst + '" />\n\
                            <input type="hidden" id="igst_' + unique_id + '" value="' + igst + '" />\n\
                            <input type="hidden" id="org_tot_' + unique_id + '" value="' + ui.item.dealer_price + '" />\n\
                            <input type="hidden" id="org_dp_' + unique_id + '" value="' + dealer_price_without_tax + '" />\n\
                            <input type="hidden" id="org_cgst_' + unique_id + '" value="' + cgst + '" />\n\
                            <input type="hidden" id="org_sgst_' + unique_id + '" value="' + sgst + '" />\n\
                            <input type="hidden" id="org_igst_' + unique_id + '" value="' + igst + '" />\n\
                            <input type="hidden" class="items" value="' + unique_id + '" />\n\
                            <input type="hidden" id="item_id_' + unique_id + '" value="' + ui.item.id + '" />\n\
                        </li>';
    $('#item-list').append(html);
}

