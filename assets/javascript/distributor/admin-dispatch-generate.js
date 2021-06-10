var products = [];
var x = 1; //Initial field counter is 1
var maxField = 10; //Input fields increment limitation
var distributor_data = '';
var sub_total = 0;
var total_tax = 0;
var total = 0;
var global_ui = {};
getDistributorList();
$(document).ready(function () {
  $('.cd-popup').on('click', function (event) {
    if ($(event.target).is('.cd-popup-close') || $(event.target).is('.cd-popup')) {
      event.preventDefault();
      $(this).removeClass('is-visible');
      $('#search-product').val('');
    }
  });
  $("#test2").attr('checked', true);
  getCurrentDate();
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
          var test_id = 4;
          $.each(item_lot_number, function (key, value) {
            var style_css = '';
            if (lot_quantity[lq] < 0 || lot_quantity[lq] == 0) {
              style_css = 'style="background: red; color: #fff; font-weight: bold"';
            }
            set_lot_numbers += '<tr '+style_css+'>\n\
            <td><input style="position:inherit;" type="radio" id="test'+ test_id + '" name="lot_no_radio" value="' + value + '" data-value="' + lot_quantity[lq] + '"></td>\n\
            <td><label for="test'+ test_id + '">' + value + '</label></td>\n\
            <td><label>' + lot_quantity[lq] + '</label></td>\n\
            </tr>>';
            qty_array.push({ radio: '#test' + test_id, qty: lot_quantity[lq] });
            lq++
            test_id++;
          });
          qty_array.sort(function (a, b) { return b.qty - a.qty; });
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

  $(document).on('change', '#distributor-list-from', function () {
    var dist_id = $(this).val();
    if ($('#distributor-list-to').val() != '') {
      if ($('#distributor-list-to').val() == dist_id) {
        showSwal('error', 'Distributor From And Distributor To Cannot Be Same');
        $('#distributor-list-from').val('');
        $('#distributor-from').val('');
        return false;
      }
    }
    var html = '';
    $.each(distributor_data.data, function (key, value) {
      if (value.id == dist_id) {
        html = value.name + ' ' + value.address;
      }
    });
    $('#distributor-from').val(html);
    getProductList();
    $('#item-list').html('');
  });

  $(document).on('change', '#distributor-list-to', function () {
    var dist_id = $(this).val();
    if ($('#distributor-list-from').val() != '') {
      if ($('#distributor-list-from').val() == dist_id) {
        showSwal('error', 'Distributor From And Distributor To Cannot Be Same');
        $('#distributor-list-to').val('');
        $('#distributor-to').val('');
        return false;
      }
    }
    var html = '';
    $.each(distributor_data.data, function (key, value) {
      if (value.id == dist_id) {
        html = value.name + ' ' + value.address;
      }
    });
    $('#distributor-to').val(html);
  });


});//document ready

function SubValue(id) {
    var qty = document.getElementById('qty_' + id).value;
    qty = Number(qty);
    qty--;
    if (qty > 0) {
        document.getElementById('qty_' + id).value = qty;
        var total = Number(document.getElementById('org_tot_' + id).value) * Number(qty);
        var dp = Number(document.getElementById('org_dp_' + id).value) * Number(qty);
        var cgst = Number(document.getElementById('org_cgst_' + id).value) * Number(qty);
        var sgst = Number(document.getElementById('org_sgst_' + id).value) * Number(qty);
        var igst = Number(document.getElementById('org_igst_' + id).value) * Number(qty);
        document.getElementById('dp_' + id).value = dp;
        //$('#dealer_price_' + id).html(dp);
        document.getElementById('tot_' + id).innerHTML = total.toFixed(2);
        document.getElementById('cgst_' + id).value = cgst;
        document.getElementById('sgst_' + id).value = sgst;
        document.getElementById('igst_' + id).value = igst;
        SubTotal();
    }

}
function AddValue(id) {
    var qty = document.getElementById('qty_' + id).value;
    var inv_item_qty = document.getElementById('inv_item_qty_' + id).value;
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
    var qty = document.getElementById('qty_' + id).value;
    qty = Number(qty);
    qty++;
    document.getElementById('qty_' + id).value = qty;
    var total = Number(document.getElementById('org_tot_' + id).value) * Number(qty);
    var dp = Number(document.getElementById('org_dp_' + id).value) * Number(qty);
    var cgst = Number(document.getElementById('org_cgst_' + id).value) * Number(qty);
    var sgst = Number(document.getElementById('org_sgst_' + id).value) * Number(qty);
    var igst = Number(document.getElementById('org_igst_' + id).value) * Number(qty);
    document.getElementById('dp_' + id).value = dp;
    //document.getElementById('dealer_price_' + id).html(dp);
    document.getElementById('tot_' + id).innerHTML = total.toFixed(2);
    document.getElementById('cgst_' + id).value = cgst;
    document.getElementById('sgst_' + id).value = sgst;
    document.getElementById('igst_' + id).value = igst;
    SubTotal();
}

function getProductList() {
  var url = base_url + 'distributor/products';
  $.ajax({
    url: url,
    type: 'post',
    data: { distributor_id: $('#distributor-list-from').val() },
    success: function (response) {
      if (response.status == "success") {
        if (response.data) {
          $.each(response.data, function (i, value) {
            var search_prod = value.search_product + ' - ' + value.coupon_business_name;
            products.push({ id: value.id, label: search_prod, value: search_prod, dealer_price: value.dealer_price, cgst: value.cgst, igst: value.igst, sgst: value.sgst, code: value.sku, coupon_type: value.coupon_business_name, lot_no: value.lot_no, lot_quantity: value.lot_quantity });
          });
        }
      }
      console.log(products);
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
    sub_total = (sub_total + Number(document.getElementById('dp_' + id).value));
    tax = (tax + Number(document.getElementById('cgst_' + id).value) + Number(document.getElementById('sgst_' + id).value));// + Number($('#igst_' + id).val())
    total = (total + Number(document.getElementById('tot_' + id).innerHTML));
  });
  total_tax = tax;
  document.getElementById('subTotal-amount').innerHTML = sub_total.toFixed(2);
  document.getElementById('total-tax').innerHTML = tax.toFixed(2);
  document.getElementById('total-amount').innerHTML = total.toFixed(2);
  document.getElementById('totalPayment').innerHTML = total.toFixed(2);

}


//generate invoice function
function generationDispatch() {
  var validate = validateDispatchForm();
  if (validate == true) {
    var items = [];
    var dispatch_type = '';
    var total_cgst = 0;
    var total_sgst = 0;
    var total_igst = 0;
    $('.items').each(function () {
      var items_ids = $(this).val();
      if (items_ids && items_ids != '') {
        var item_qty = document.getElementById('qty_' + items_ids).value;
        var item_id = document.getElementById('item_id_' + items_ids).value;
        total_cgst = (total_cgst + Number(document.getElementById('cgst_' + items_ids).value));
        total_sgst = (total_sgst + Number(document.getElementById('sgst_' + items_ids).value));
        total_igst = (total_igst + Number(document.getElementById('igst_' + items_ids).value));
        items.push({
          item_id: item_id,
          qty: item_qty,
          cgst: document.getElementById('cgst_' + items_ids).value,
          sgst: document.getElementById('sgst_' + items_ids).value,
          igst: document.getElementById('igst_' + items_ids).value,
          lot_no: document.getElementById('lotNo_' + items_ids).value,
        });
      }
    });
    dispatch_type = $("input[name='dispatch_type']:checked").val();
    var params = {
      distributor_id_from: $('#distributor-list-from').val(),
      distributor_id_to: $('#distributor-list-to').val(),
      dispatch_date: $('#current-date').val(),
      cgst: total_cgst,
      sgst: total_sgst,
      igst: total_igst,
      subtotal: Number($('#subTotal-amount').html()),
      total: Number($('#total-amount').html()),
      note: $('#note').val(),
      shipping_details: $('#shipping-detail').val(),
      expected_delivery_date: $('#delivery-date').val(),
      dispatch_item: items,
      dispatch_type: dispatch_type,
      is_created_by_admin: user_id
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
          window.location.href = 'distributor-dispatch-list';
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
          html += '<option value="' + value.id + '">' + value.display_name + '</option>';
        });
        $('#distributor-list-from').html(html);
        $('#distributor-list-to').html(html);
        hideLoader();
      }
    }
  });
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
  $("#test2").attr('checked', true);
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
  document.getElementById('tr_' + id).remove();
  SubTotal();

}

function getCurrentDate() {
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

  //end lot number
  // Set selection
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
                                      <input type="number" id="qty_' + unique_id + '" value="1" />\n\
                                      <div class="value-button" id="add_' + unique_id + '" onclick="AddValue(\'' + unique_id + '\');"value="Increase Value"><i class="fa fa-plus"></i></div>\n\
                                  </form>\n\
                              </div>\n\
                              <div class="columnCell column2">\n\
                                  <div class="price">\n\
                                      <div class="cx-heavy-brand-font mt3" id="dealer_price_' + unique_id + '">' + ui.item.dealer_price + '</div>\n\
                                  </div>\n\
                              </div>\n\
                              <div class="columnCell column2 productPriceTotal">\n\
                                  <div class="price">\n\
                                      <div class="cx-heavy-brand-font mt3 total_pay" id="tot_' + unique_id + '">' + ui.item.dealer_price + '</div>\n\
                                  </div>\n\
                              </div>\n\
                          </div>\n\
                          <div class="clear hidden-lg"></div>\n\
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


