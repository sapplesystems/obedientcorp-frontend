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
            var rank = 'Developer';
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
      var itemalreadyexits = itemsAlreadyExits(ui.item.id);
      if (itemalreadyexits == true) {
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
        // Set selection
        html += '<li class="js-productContainer productContainer products " id="tr_' + ui.item.id + '" data-pid="204592-066-M11" data-pidmaster="204592">\n\
      <div class="productContainerRow">\n\
          <div class="columnCell column1 productImage text-center"><i style="cursor:pointer;" class="fa fa-trash-o trash_icon" onclick="removeProduct(' + ui.item.id + ');"></i></div>\n\
          <div class="columnCell column1 productImage text-left"><span  tabindex="-1" aria-hidden="true">'+ ui.item.value + '</span></div>\n\
          <div class="columnCell column2 productDetails">\n\
              <div class="">\n\
                  <p class=""><span>'+ ui.item.code + '</span></p>\n\
                  <p class="">LotNo:<span>123</span></p>\n\
              </div>\n\
          </div>\n\
          <div class="columnCell column4 productQuantity">\n\
              <form>\n\
                  <div class="value-button" id="sub_' + ui.item.id + '" onclick="SubValue(' + ui.item.id + ');" value="Decrease Value"><i class="fa fa-minus"></i></div>\n\
                  <input type="number" id="qty_' + ui.item.id + '" value="1" readonly />\n\
                  <div class="value-button" id="add_' + ui.item.id + '" onclick="AddValue(' + ui.item.id + ');"value="Increase Value"><i class="fa fa-plus"></i></div>\n\
              </form>\n\
          </div>\n\
          <div class="columnCell column2">\n\
              <div class="price">\n\
                  <div class="text-gray-dark cx-heavy-brand-font mt3" id="dealer_price_'+ ui.item.id + '">' + ui.item.dealer_price + '</div>\n\
              </div>\n\
          </div>\n\
          <div class="columnCell column2 productPriceTotal">\n\
              <div class="price">\n\
                  <div class="text-gray-dark cx-heavy-brand-font mt3 total_pay" id="tot_'+ ui.item.id + '">' + ui.item.dealer_price + '</div>\n\
              </div>\n\
          </div>\n\
      </div>\n\
      <div class="clear hidden-lg"></div>\n\
      <input type="hidden" id="product_coupon_type_'+ ui.item.id + '" value="' + ui.item.coupon_type + '" />\n\
      <input type="hidden" class="dp" id="dp_'+ ui.item.id + '" value="' + dealer_price_without_tax + '" />\n\
      <input type="hidden" id="cgst_'+ ui.item.id + '" value="' + cgst + '" />\n\
      <input type="hidden" id="sgst_'+ ui.item.id + '" value="' + sgst + '" />\n\
      <input type="hidden" id="igst_'+ ui.item.id + '" value="' + igst + '" />\n\
      <input type="hidden" id="org_tot_'+ ui.item.id + '" value="' + ui.item.dealer_price + '" />\n\
      <input type="hidden" id="org_dp_'+ ui.item.id + '" value="' + dealer_price_without_tax + '" />\n\
      <input type="hidden" id="org_cgst_'+ ui.item.id + '" value="' + cgst + '" />\n\
      <input type="hidden" id="org_sgst_'+ ui.item.id + '" value="' + sgst + '" />\n\
      <input type="hidden" id="org_igst_'+ ui.item.id + '" value="' + igst + '" />\n\
      <input type="hidden" class="items" value="'+ ui.item.id + '" />\n\
  </li>';
        $('#item-list').append(html);
      }
      SubTotal();
      $('#search-product').val('');
      return false;

    }

  });

  $(document).on('click', '#add-coupon', function () {
    $('#CouponCode').html('<div>\n\
      <input type="text" placeholder="Enter Coupon Code"  id="coupon_code_1" class="width85 couponCode" />\n\
      <div class="action_apply"><span class="plus_Icon add_button" aria-hidden="true">&#43;</span></div>\n\
  </div>');
    $('#apply_Coupon').addClass('is-visible');
  });

  $(document).on('click', '#pay-cash', function () {
    $('#cash-popup').html('<input type="text" placeholder="Amount" id="cash" name="cash" value="" /> <button onclick="PayCash();">Pay</button>');
    $('#pay_Cash').addClass('is-visible');

  });

  $(document).on('click', '.add_button', function () {
    if (x < maxField) {
      x++; //Increment field counter
      var fieldHTML = '<div id="divCode_' + x + '" class="marginTop10">\n\
       <input type="text" placeholder="Enter Coupon Code"  id="coupon_code_' + x + '" name="code" class="width85 couponCode" />\n\
       <div class="action_apply"><span  class="minus_Icon"><i style="cursor:pointer;" class="fa fa-trash-o icon_trash" onclick="removeButton(' + x + ');"></i></span></div>\n\
       </div>';
      $('#CouponCode').append(fieldHTML); //Add field html
    }
  });

  $('#save_value').click(function () {
    var arrayCoupon = [];
    $('.couponCode').each(function () {
      arrayCoupon.push($(this).val());
    });
    var couponCode = arrayCoupon.toString();
    var user_id = $('#associate_name').attr('data-value');
    $.ajax({
      url: base_url + "invoice/add-coupon",
      type: 'post',
      dataType: "json",
      data: {
        coupon_code: couponCode,
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
                html += '<tr id="coupon_tr_' + value.id + '" class="coupon_tot_amount">\n\
                          <td width="8%">\n\
                            <input type="hidden" class="bvcc" value="'+ value.id + '" />\n\
                            <input type="hidden" id="ccode_'+ value.id + '" value="' + value.coupon_business_name + '" />\n\
                            <input type="hidden" id="camnt_'+ value.id + '" value="' + value.coupon_amount + '" />\n\
                            <i style="cursor:pointer;" class="fa fa-trash-o trash_icon" onclick="removeCoupon('+ value.id + ');"></i>\n\
                          </td>\n\
                          <td width="62%">COUPON CODE: '+ value.coupon_code + ' - ' + value.coupon_business_name + '</td>\n\
                          <td width="30%" class="text-right"><strong>&#8377;<span id="coupon_'+ value.id + '">' + value.coupon_amount + '</span></strong></td>\n\
                      </tr>';
                validCoupons.push(value.id);
              }
            });
            couponAmount = (couponAmount + c_amount);

            $('#coupon-data').append(html);
            $('.cd-popup').removeClass('is-visible');
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
        } else {
          showSwal('error', 'Coupon Not Valid');
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
  var url = base_url + 'products';
  $.ajax({
    url: url,
    type: 'post',
    data: {},
    success: function (response) {
      if (response.status == "success") {
        if (response.data) {
          $.each(response.data, function (i, value) {
            var search_prod = value.search_product + ' - ' + value.coupon_business_name;
            products.push({ id: value.id, label: search_prod, value: search_prod, dealer_price: value.dealer_price, cgst: value.cgst, igst: value.igst, sgst: value.sgst, code: value.sku, coupon_type: value.coupon_business_name });
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
  var customer_phoneno = $('#search-customer').val();
  if (customer_phoneno == '') {
    showSwal('error', 'Please Enter Customer Phone Number');
    return false;
  }
  else if (coupon_added == 0) {
    showSwal('error', 'Coupon Not Selected', 'Coupons not selected');
    return false;
  }
  var url = base_url + 'invoice/send-coupon-otp';
  $.ajax({
    url: url,
    type: 'post',
    data: { mobile_no: $('#search-customer').val() },
    success: function (response) {
      if (response.status == "success") {
        showSwal('success', 'OTP SEND', response.data);
        $('#verify_Coupon').addClass('is-visible');
        //$('#info').val(response.info.id);
        //setTimeout(function(){ $('#verifyOtpRequest').modal(); }, 1000);
      }
    }
  });
}

function verifyOTP() {
  var otp_array = [];
  if ($('.otp').val() == '') {
    showSwal('error', 'NO OTP', 'Please Enter OTP');
    return false;
  }
  $('.otp').each(function () {
    otp_array.push($(this).val());
  });
  var url = base_url + 'invoice/verify-otp';
  $.ajax({
    url: url,
    type: 'post',
    data: {
      otp: otp_array.join(''),
      id: $('#associate_name').attr('data-value'),
      mobile_no: $('#search-customer').val()
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
    tax = (tax + Number($('#cgst_' + id).val()) + Number($('#sgst_' + id).val()) + Number($('#igst_' + id).val()));
    total = (total + Number($('#tot_' + id).html()));
    ProductCouponType.push({ 'bv_type': bv_type, 'amount': Number($('#tot_' + id).html()) });
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
  $('.bvcc').each(function () {
    var id = $(this).val();
    var ccode = $('#ccode_' + id).val();
    var camnt = $('#camnt_' + id).val();
    ctype.push({ 'bv_type': ccode, 'amount': camnt });
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
    var t = new Date().getTime();
    html += '<tr id="cash_tr_' + t + '" class="coupon_tot_amount">\n\
    <td width="8%"><i onclick="removeCashTr(event, '+ t + ', ' + cash + ');" style="cursor:pointer;" class="fa fa-trash-o trash_icon"></i></td>\n\
    <td width="62%">CASH:</td>\n\
    <td width="30%" class="text-right"><strong>&#8377;<span> '+ cash + '</span></strong></td>\n\
</tr>';
    $('.cd-popup').removeClass('is-visible');
    $('#coupon-data').append(html);
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
  var total_amount = $('#totalPayment').html();
  var due_payment = $('#due_payment').html();
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
    showSwal('error', 'OTP Not Verified', 'Please Verify OTP');
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

  if (total_amount > 0 && due_payment <= 0) {
    var items = [];
    $('.items').each(function () {
      var items_ids = $(this).val();
      items_ids = Number(items_ids);
      if (items_ids && items_ids > 0) {
        var item_qty = $('#qty_' + items_ids).val();
        items.push({
          item_id: items_ids,
          qty: item_qty,
          cgst: $('#cgst_' + items_ids).val(),
          sgst: $('#sgst_' + items_ids).val(),
          igst: $('#igst_' + items_ids).val()
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
    };

    var url = base_url + 'invoice/generate-invoice';
    $.ajax({
      url: url,
      type: 'post',
      data: params,
      success: function (response) {
        if (response.status == "success") {
          showSwal('success', 'Invoice Generated', response.data);
          CancelInvoice();
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
  }
  calcAmountDue();
}

function CancelInvoice() {
  $('#search-customer').val('');
  $('#coupon-data').html('');
  $('#item-list').html('');
  $('#associate-name').html('');
  $('#subTotal-amount').html('0');
  $('#total-tax').html('0');
  $('#total-amount').html('0');
  $('#totalPayment').html('0');
  $('#sale-note').val('');
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

function itemsAlreadyExits(id) {
  var totalRowCount = $("#item-list li").length;
  if (totalRowCount) {
    if ($('#tr_' + id).attr('id')) {
      AddValue(id);
      return false;
    }
    return true;
  }
  return true;
}

function calcAmountDue() {
  totalAppliedCoupon();
  var temp_due = 0;
  var temp_coupon_amount = 0;
  var tot = $('#total-amount').html();
  var duePayment = 0;

  console.log(ProductCouponType);
  console.log(CouponCodeType);
  if (CouponCodeType.length > 0) {
    $('#coupons').css('display', '');
    var bv_len = CouponCodeType.length;
    for (var i = 0; i < bv_len; i++) {
      var ccode = CouponCodeType[i].name;
      var camnt = CouponCodeType[i].value;
      console.log(ccode);
      console.log(camnt);
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
  $('#due_payment').html(temp_due);
  if (amount <= 0) {
    $('.due_amount').css('display', 'none');
  }

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
    obj2.push({ name: prop, value: Number(holder[prop]) });
  }
  return obj2;
}