var products = [];
var x = 1; //Initial field counter is 1
var maxField = 10; //Input fields increment limitation
var distributor_data = '';
getDistributorList();
$(document).ready(function () {
  getProductList();
  var today = new Date();
  todays_date = today.getDate() + '-' + (today.getMonth() + 1) + '-' + today.getFullYear();
  $('#date').html(todays_date);
  //search product
  var sub_total = 0;
  var total_tax = 0;
  var total = 0;
  //search product
  $("#search-product").autocomplete({
    multiple: true,
    source: products,
    select: function (event, ui) {
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
          <div class="columnCell column1 productImage text-center"><i class="fa fa-trash-o trash_icon" onclick="removeProduct(' + ui.item.id + ');"></i></div>\n\
          <div class="columnCell column1 productImage text-left"><a href="javascript:void(0);" tabindex="-1" aria-hidden="true">'+ ui.item.value + '</a></div>\n\
          <div class="columnCell column2 productDetails">\n\
              <div class="">\n\
                  <p class="">Item &#35;<span>'+ ui.item.code + '</span></p>\n\
              </div>\n\
          </div>\n\
          <div class="columnCell column4 productQuantity">\n\
              <form>\n\
                  <div class="value-button" id="sub_' + ui.item.id + '" onclick="SubValue(' + ui.item.id + ');" value="Decrease Value"><i class="fa fa-minus"></i></div>\n\
                  <input type="number" id="qty_' + ui.item.id + '" value="1" />\n\
                  <div class="value-button" id="add_' + ui.item.id + '" onclick="AddValue(' + ui.item.id + ');"value="Increase Value"><i class="fa fa-plus"></i></div>\n\
              </form>\n\
          </div>\n\
          <div class="columnCell column5 productPriceTotal">\n\
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
      $('#search-product').val(''); // display the selected text
      $('#item-list').append(html); // save selected id to input
      sub_total = (Number(sub_total) + Number(dealer_price_without_tax));
      total = total + Number(ui.item.dealer_price);
      $('#subTotal-amount').html(sub_total.toFixed(2));
      $('#total-tax').html(total_tax.toFixed(2));
      $('#total-amount').html(total.toFixed(2));
      $('#totalPayment').html(total.toFixed(2));
      return false;
    }

  });

  $(document).on('change', '#dist-list', function () {
    var dist_id = $(this).val();
    var html = '';
    $.each(distributor_data.data, function (key, value) {
      if (value.id == dist_id) {
        html += '<span>' + value.name + '<span> &npbs <span>' + value.address + '</span>';
      }
    });
    $('#distributor').html(html);

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
  $('#tot_' + id).html(total);
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
  $('#subTotal-amount').html(sub_total.toFixed(2));
  $('#total-tax').html(tax.toFixed(2));
  $('#total-amount').html(total.toFixed(2));
  $('#totalPayment').html(total.toFixed(2));
}

function validate_customer_product() {
  var totalRowCount = $("#item-list tr").length;
  var customer_name = $('#associate_name').attr('data-value');
  if (customer_name == undefined) {
    $('#addCouponRequest').modal('hide');
    showSwal('error', 'No Customer Selected', 'Please select customer');
    return false;
  }
  else if (totalRowCount <= 0) {
    $('#addCouponRequest').modal('hide');
    showSwal('error', 'No Product Selected', 'Please select product');
    return false;
  }
  else {
    return true;
  }
}

//generate invoice function
function generationDispatch() {
  var items = [];
  var dispatch_type='';
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
    distributor_id_to: $('#dist-list').val(),
    dispatch_date: $('#current-date').val(),
    subtotal: $('#total-amount').html(),
    total: $('#total-amount').html(),
    note: $('#note').val(),
    shipping_details: $('#shipping-detail').val(),
    expected_delivery_date: $('#delivery-date').val(),
    dispatch_item: items,
    dispatch_type:dispatch_type
  };
  console.log(params);
  var url = base_url + 'dispatch/generate-dispatch';
  $.ajax({
    url: url,
    type: 'post',
    data: params,
    success: function (response) {
      console.log(response);
      if (response.status == "success") {
        showSwal('success', 'Dispatch Generate', response.data);
      }
      else {
        showSwal('error', response.data);
      }
    }
  });

}

function getDistributorList() {
  showLoader();
  $.ajax({
    url: base_url + 'distributor/list',
    type: 'post',
    data: {},
    success: function (response) {
      distributor_data = response;
      var html = '<option value="">Select Distributor</option>';
      if (response.status == "success") {
        var i = 1;
        var x = 1;
        $.each(response.data, function (key, value) {
          if (value.id != distributor_id) {
            html += '<option value="' + value.id + '" rel="icon-temperature">' + value.name + '</option>';
          }

        });

        $('.dist-list').html(html);
        hideLoader();
      }
    }
  });
}

