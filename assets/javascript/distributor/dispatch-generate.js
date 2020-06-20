var products = [];
var x = 1; //Initial field counter is 1
var maxField = 10; //Input fields increment limitation
var distributor_data = '';
var sub_total = 0;
var total_tax = 0;
var total = 0;
getDistributorList();
$(document).ready(function () {
  $("#test2").attr('checked', true);
  getProductList();
  getCurrentDate();
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
                  <input type="number" id="qty_' + ui.item.id + '" value="1" />\n\
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
        $('#item-list').append(html); // save selected id to input
      }
      SubTotal();

      $('#search-product').val('');
      return false;

    }

  });

  $(document).on('change', '#distributor-list', function () {
    var dist_id = $(this).val();
    var html = '';
    $.each(distributor_data.data, function (key, value) {
      if (value.id == dist_id) {
        html = value.name + ' ' + value.address;

        // html += '<span>' + value.name + '<span> &npbs <span>' + value.address + '</span>';
      }
    });
    $('#distributor').val(html);
    //$('#distributor').html(html);

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
    $('#tot_' + id).html(total);
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
            products.push({ id: value.id, label: value.search_product, value: value.search_product, dealer_price: value.dealer_price, cgst: value.cgst, igst: value.igst, sgst: value.sgst, code: value.sku });
          });
        }
      }
    }
  });
}//end function

//function for show sub total of product
//function for show sub total of product
function SubTotal() {
  var sub_total = 0;
  var tax = 0;
  var total = 0;
  $('.items').each(function () {
    var id = $(this).val();
    sub_total = (sub_total + Number($('#dp_' + id).val()));
    tax = (tax + Number($('#cgst_' + id).val()) + Number($('#sgst_' + id).val()) + Number($('#igst_' + id).val()));
    total = (total + Number($('#tot_' + id).html()));
  });
  total_tax = tax;
  $('#subTotal-amount').html(sub_total.toFixed(2));
  $('#total-tax').html(tax.toFixed(2));
  $('#total-amount').html(total.toFixed(2));
  $('#totalPayment').html(total.toFixed(2));

}


//generate invoice function
function generationDispatch() {
  var validate = validateDispatchForm();
  if (validate == true) {
    var items = [];
    var dispatch_type = '';
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
    dispatch_type = $("input[name='dispatch_type']:checked").val();
    var params = {
      distributor_id_from: distributor_id,
      distributor_id_to: $('#distributor-list').val(),
      dispatch_date: $('#current-date').val(),
      subtotal: $('#total-amount').html(),
      total: $('#total-amount').html(),
      note: $('#note').val(),
      shipping_details: $('#shipping-detail').val(),
      expected_delivery_date: $('#delivery-date').val(),
      dispatch_item: items,
      dispatch_type: dispatch_type
    };
    console.log(params);
    var url = base_url + 'dispatch/generate-dispatch';
    $.ajax({
      url: url,
      type: 'post',
      data: params,
      success: function (response) {
        if (response.status == "success") {
          showSwal('success', 'Dispatch Generate', response.data);
          CancelInvoice();
        }
        else {
          showSwal('error', response.data);
          CancelInvoice();
        }
      }
    });

  }//end if


}

function getDistributorList() {
  showLoader();
  $.ajax({
    url: base_url + 'distributor/list',
    type: 'post',
    data: {},
    success: function (response) {
      distributor_data = response;
      var html = '<option value="">-- Select --</option>';
      if (response.status == "success") {
        $.each(response.data, function (key, value) {
          if (value.id != distributor_id) {
            html += '<option value="' + value.id + '">' + value.name + '</option>';
          }

        });
        $('#distributor-list').html(html);
        hideLoader();
      }
    }
  });
}

function itemsAlreadyExits(id) {
  var totalRowCount = $("#item-list li").length;
  if (totalRowCount) {
    if ($('#tr_' + id).attr('id')) {
      return false;
    }
    return true;
  }
  return true;
}

//validate dispatch form
function validateDispatchForm() {
  var totalRowCount = $("#item-list li").length;
  var customer_name = $('#distributor').val();
  if (customer_name == '') {
    showSwal('error', 'Distributor Not Selected', 'Please select distributor');
    return false;
  }
  else if (totalRowCount <= 0) {
    showSwal('error', 'Items Not Selected', 'Please select product');
    return false;
  } else if ($("input[name='dispatch_type']:checked").val() == undefined) {
    showSwal('error', 'Dispatch Type Not Selected', 'Please select dispatch type');
    return false;
  } else if ($('#current-date').val() == '') {
    showSwal('error', 'Date Not Selected', 'Please select Date');
    return false;

  } else if ($('#delivery-date').val() == '') {
    showSwal('error', 'Expected Date Not Selected', 'Please select expected date');
    return false;
  }
  else {
    return true;
  }
}

function CancelInvoice() {
  $('#distributor').val('');
  $('#distributor-list').val('');
  //$("input[name='dispatch_type']").attr('checked', false);
  $('#item-list').html('');
  $('#current-date').val('');
  $('#delivery-date').val('');
  $('#shipping-detail').val('');
  $('#note').val('');
  $('#subTotal-amount').html('0');
  $('#total-tax').html('0');
  $('#total-amount').html('0');
  getCurrentDate();

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

function getCurrentDate()
{
  var datetime = new Date();
  var day = datetime.getDate();
  day = (day < 10) ? '0' + day : day;
  var month = MonthArr[datetime.getMonth()];
  var year = datetime.getFullYear();
  var todays_date = day + "-" + month + "-" + year;
  //var time = datetime.getHours() + ":" + datetime.getMinutes() + ":" + datetime.getSeconds();
  var current_date_time = todays_date;
  $('#current-date').val(current_date_time);
}

function checkStartEndDate() {
  var startDate = document.getElementById("current-date").value;
  var endDate = document.getElementById("delivery-date").value;
  if ((Date.parse(startDate.split(/\-/).reverse().join('-')) > Date.parse(endDate.split(/\-/).reverse().join('-')))) {
      showSwal('error', 'Invalid Expected Date', 'Expected date should be greater than or equal to date');
      document.getElementById("delivery-date").value = "";
      return false;
  }
}


