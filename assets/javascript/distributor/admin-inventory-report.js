var products = [];
getAllCategory();
getProductList();
searchItemsStock();
getDistributorList();
searchSalesReport();
searchItemsStockFlow();
$(document).ready(function () {

});



function getAllCategory() {
  showLoader();
  $.ajax({
    url: base_url + 'category-list2',
    type: 'post',
    data: {},
    success: function (response) {
      var html = '<option value="">-- Select --</option>';
      if (response.status == "success") {
        $.each(response.data, function (key, value) {
          html += '<option value="' + value.id + '">' + value.name + '</option>';
        });
        $('#categories').html(html);
        hideLoader();
      }
    }
  });
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
            products.push({ id: value.id, label: value.search_product, value: value.name, dealer_price: value.dealer_price, cgst: value.cgst, igst: value.igst, sgst: value.sgst, code: value.sku });
          });
        }
      }
    }
  });
}//end function

//search product
$("#search-product").autocomplete({
  multiple: true,
  source: products,
  select: function (event, ui) {
    $('#search-product').val(ui.item.label);
    $('#item-name').val(ui.item.value);
    return false;
  }
});

function searchItemsStock() {
  var search_date = ''
  var item_name = '';
  var category_id = '';
  var check_stock = '';
  var item_code = '';
  var distributor_id = '';
  if ($('#search-date').val() != '') {
    search_date = $('#search-date').val();
  }
  if ($('#item-name').val() != '') {
    item_name = $('#item-name').val();
  }
  if ($('#categories').val() != '') {
    category_id = $('#categories').val();
  }
  if ($('#stock-items').prop('checked') == true) {
    check_stock = $('#stock-items').val();
  }
  if ($('#item-code').val() != '') {
    item_code = $('#item-code').val();
  }
  if ($('#distributor').val() != '') {
    distributor_id = $('#distributor').val();
  }
  var params = {
    distributor_id: distributor_id,
    check_stock_item: check_stock,
    category_id: category_id,
    product_name: item_name,
    date: search_date,
    item_code: item_code,
    is_admin: 1
  };
  var url = base_url + 'distributor/current-stock';
  $.ajax({
    url: url,
    type: 'post',
    data: params,
    success: function (response) {
      var html = '<thead>\n\
                  <tr>\n\
                  <th>Sr.No.</th>\n\
                  <th>Distributor Name</th>\n\
                  <th>Category Name</th>\n\
                  <th>Date</th>\n\
                  <th>Item Code</th>\n\
                  <th>Item Name</th>\n\
                  <th>BV Type</th>\n\
                  <th>Lot No</th>\n\
                  <th>Qty</th>\n\
                  <th>Expiry Date</th>\n\
                  </tr>\n\
                  </thead><tbody>';
      if (response.status == "success") {
        var i = 1;
        $.each(response.data, function (key, value) {
          var lot_no = '-';
          if(value.lot_no!= null && value.lot_no!=0) {
            lot_no = value.lot_no;
          }
          html += '<tr id="tr_' + value.id + '" role="row" >\n\
                <td class="sorting_1">' + i + '</td>\n\
                <td>'+ value.distributor_name + '</td>\n\
                <td>'+ value.category_name + '</td>\n\
                <td>' + value.date + '</td>\n\
                <td>' + value.sku + '</td>\n\
                <td>' + value.name + '</td>\n\
                <td>' + value.bv_type + '</td>\n\
                <td>' + lot_no + '</td>\n\
                <td>' + value.quantity + '</td>\n\
                <td>' + value.expiry_date + '</td>\n\
            </tr>';
          i = i + 1;
        });
        html += '</tbody>';
        $('#stock-detail').html(html);
        generateDataTable('stock-detail');
      }
      else {
        $('#stock-detail').html(html);
        generateDataTable('stock-detail');
        hideLoader();
      }
    }
  });
}//end function

function CancelSearch() {
  $('#search-date').val('');
  $('#search-product').val('');
  $('#categories').val('');
  $('#stock-items').prop('checked', false);
  $('#item-code').val('');
  $('#distributor').val('');
  searchItemsStock();
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
          html += '<option value="' + value.id + '">' + value.name + '</option>';
        });
        $('#distributor').html(html);
        hideLoader();
      }
    }
  });
}

//function for sales report

function searchSalesReport() {
  showLoader();
  var start_date = '';
  var end_date = '';
  var item_id = '';
  var category_id = '';
  var distributor_id = '';
  if ($('#start-date').val() != '') {
    start_date = $('#start-date').val();
  }
  if ($('#end-date').val() != '') {
    end_date = $('#end-date').val();
  }
  if ($('#item-id').val() != '') {
    item_id = $('#item-id').val();
  }
  if ($('#categories').val() != '') {
    category_id = $('#categories').val();
  }
  if ($('#distributor').val() != '') {
    distributor_id = $('#distributor').val();
  }
  var params = {
    distributor_id: distributor_id,
    category_id: category_id,
    product_id: item_id,
    start_date: start_date,
    end_date: end_date,
    is_admin: 1
  };
  var url = base_url + 'distributor/sales-report';
  $.ajax({
    url: url,
    type: 'post',
    data: params,
    success: function (response) {
      var html = '<thead>\n\
                              <tr>\n\
                              <th>Sr.No</th>\n\
                              <th>Distributor Name</th>\n\
                              <th>Invoice Number</th>\n\
                              <th>Invoice Date & Time</th>\n\
                              <th>Total Amount</th>\n\
                              <th>Tax Amount</th>\n\
                              <th>Cash Amount</th>\n\
                              <th>Coupon Amount</th>\n\
                              <th></th>\n\
                              </tr>\n\
                              </thead><tbody>';
      if (response.status == "success") {
        if (response.data.length != 0) {
          var i = 1;
          $.each(response.data, function (key, value) {
            html += '<tr id="tr_incoming_' + i + '" role="row" class="tr_incoming" >\n\
                                  <td>'+ i + '</td>\n\
                                  <td>'+ value.distributor_name + '</td>\n\
                                  <td>'+ value.invoice_no + '</td>\n\
                                  <td>' + value.invoice_date_time + '</td>\n\
                                  <td>' + value.total_amount + '</td>\n\
                                  <td>' + value.tax_amount + '</td>\n\
                                  <td>' + value.cash_amount + '</td>\n\
                                  <td>' + value.coupon_amount + '</td>\n\
                                  <td><a href="javascript:void(0)">Item Detail</a></td>\n\
                              </tr>';
            i = i + 1;
          });
          html += '</tbody>';
          $('#sales-report').html(html);
          generateDataTable('sales-report');
          hideLoader();
        }
      } else {
        $('#sales-report').html(html);
        generateDataTable('sales-report');
        hideLoader();
      }

    }
  });

}

function CancelSalesReport() {
  $('#start-date').val('');
  $('#end-date').val('');
  $('#item-id').val('');
  $('#categories').val('');
  $('#search-product').val('');
  $('#distributor').val('');
  searchSalesReport();
}

function searchItemsStockFlow() {
  showLoader();
  var start_date = '';
  var end_date = '';
  var item_name = '';
  var category_id = '';
  var item_code = '';
  var lot_no = '';
  var qty = '';
  var distributor_id = '';
  var dispatch_type = '';
  if ($('#start-date').val() != '') {
    start_date = $('#start-date').val();
  }
  if ($('#end-date').val() != '') {
    end_date = $('#end-date').val();
  }
  if ($('#item-name').val() != '') {
    item_name = $('#item-name').val();
  }
  if ($('#categories').val() != '') {
    category_id = $('#categories').val();
  }
  if ($('#item-code').val() != '') {
    item_code = $('#item-code').val();
  }
  if ($('#lot-no').val() != '') {
    lot_no = $('#lot-no').val();
  }
  if ($('#qty').val() != '') {
    qty = $('#qty').val();
  }
  if ($('#distributor').val() != '') {
    distributor_id = $('#distributor').val();
  }
  if ($('#dispatch-type').val() != '') {
    dispatch_type = $('#dispatch-type').val();
  }
  var params = {
    distributor_id: distributor_id,
    category_id: category_id,
    product_name: item_name,
    qty: qty,
    lot_no: lot_no,
    start_date: start_date,
    end_date: end_date,
    item_code: item_code,
    is_admin: 1,
    dispatch_type: dispatch_type,
    stock_flow: 1,
  };
  var url = base_url + 'distributor/current-stock';
  $.ajax({
    url: url,
    type: 'post',
    data: params,
    success: function (response) {
      var html = '<thead>\n\
                              <tr>\n\
                              <th>Sr.No</th>\n\
                              <th>Distributor Name</th>\n\
                              <th>Category</th>\n\
                              <th>Item Code</th>\n\
                              <th>Item Name</th>\n\
                              <th>BV Type</th>\n\
                              <th>Date</th>\n\
                              <th>Lot No</th>\n\
                              <th>Qty</th>\n\
                              <th>In</th>\n\
                              <th>Out</th>\n\
                              <th>Action</th>\n\
                              </tr>\n\
                              </thead><tbody>';
      if (response.status == "success") {
        if (response.data.length != 0) {
          var i = 1;
          var lotNumber = '';
          $.each(response.data, function (key, value) {
            var lot_no_outgoing = '-';
            lotNumber = value.lot_no;
            if (value.lot_no!= 0 && value.lot_no!=null) {
              lot_no_outgoing = value.lot_no;
            }
            html += '<tr id="tr_outgoing_' + i + '" role="row" class="tr_outgoing" >\n\
                     <td>'+ i + '</td>\n\
                     <td>'+ value.distributor_name + '</td>\n\
                    <td>'+ value.category_name + '</td>\n\
                    <td>' + value.sku + '</td>\n\
                    <td>' + value.product_name + '</td>\n\
                    <td>' + value.bv_type + '</td>\n\
                    <td>' + value.date + '</td>\n\
                    <td>' + lot_no_outgoing + '</td>\n\
                    <td>' + value.inventory_quantity + '</td>\n\
                    <td>'+ value.total_in + '</td>\n\
                    <td>'+ value.total_out + '</td>\n\
                    <td><a href="javascript:void(0)" onclick="getStockFlowDetail('+ distributor_id + ',' + value.product_id + ',' + lotNumber + ');"id="detail_' + i + '">Detail</a></td>\n\
                    </tr>';
            i = i + 1;
          });

          $('#stock-flow').html(html);
          generateDataTable('stock-flow');
          hideLoader();
        }
      }
      else {
        $('#stock-flow').html(html);
        generateDataTable('stock-flow');
        hideLoader();
      }

    }
  });
}//end function

function CancelSearchStockFlow() {
  $('#start-date').val('');
  $('#end-date').val('');
  $('#item-name').val('');
  $('#categories').val('');
  $('#item-code').val('');
  $('#lot-no').val('');
  $('#qty').val('');
  $('#type').val('');
  $('#search-product').val('');
  $('#distributor').val('');
  searchItemsStockFlow();
}

function getStockFlowDetail(id, pro_id, lot_no) {
  var params = {
    distributor_id: id,
    product_id: pro_id,
    lot_no: lot_no,
  }
  if ($('#start-date').val() != '') {
    params.start_date = $('#start-date').val();
  }
  if ($('#end-date').val() != '') {
    params.end_date = $('#end-date').val();
  }

  var url = base_url + 'distributor/stock-flow-detail';
  $.ajax({
    url: url,
    type: 'post',
    data: params,
    success: function (response) {
      var html = '<thead>\n\
                      < tr >\n\
                      <th>Sr.No</th>\n\
                      <th>Dispatched By</th>\n\
                      <th>Dispatched To</th>\n\
                      <th>Customer Name</th>\n\
                      <th>Customer Mobile Number</th>\n\
                      <th>Dispatch Number</th>\n\
                      <th>Invoice Number</th>\n\
                      <th>Category</th>\n\
                      <th>Item Code</th>\n\
                      <th>Item Name</th>\n\
                      <th>Qty</th>\n\
                      <th>Lot No</th>\n\
                      <th>BV Type</th>\n\
                      <th>Type</th>\n\
                      </tr >\n\
                      </thead > <tbody>';
      $('#stock-flow-detail').html('');
      if (response.status == "success") {
        if (response.data.length != 0) {
          var i = 1;
          $.each(response.data, function (key, value) {
            var lot_no_outgoing = value.lot_no;
            var customer_name = '';
            var customer_mobile = '';
            var invoice_no = '';
            var dispatch_no = '';
            var distributor_by = '';
            var distributor_to = '';
            if (value.lot_no == 0) {
              lot_no_outgoing = '-';
            }
            if (value.customer_name && value.customer_mobile && value.invoice_no) {
              customer_name = value.customer_name;
              customer_mobile = value.customer_mobile;
              invoice_no = value.invoice_no;
            } else {
              dispatch_no = value.dispatch_no;
            }
            if (value.by_distributor && value.to_distributor) {
              distributor_by = value.by_distributor;
              distributor_to = value.to_distributor;
            }
            html += '<tr id="tr_outgoing_' + i + '" role="row" class="tr_outgoing" >\n\
                              <td>' + i + '</td>\n\
                              <td>' + distributor_by + '</td>\n\
                              <td>' + distributor_to + '</td>\n\
                              <td>' + customer_name + '</td>\n\
                              <td>' + customer_mobile + '</td>\n\
                              <td>' + dispatch_no + '</td>\n\
                              <td>' + invoice_no + '</td>\n\
                              <td>' + value.category_name + '</td>\n\
                              <td>' + value.sku + '</td>\n\
                              <td>' + value.product_name + '</td>\n\
                              <td>' + value.quantity + '</td>\n\
                              <td>' + lot_no_outgoing + '</td>\n\
                              <td>' + value.bv_type + '</td>\n\
                              <td>' + value.type + '</td>\n\
                          </tr>';
            i = i + 1;
          });
          html += '</tbody>';
          $('#stock-flow-detail').html(html);
          $('#stock-flow-detail-modal').modal();
         generateDataTable('stock-flow-detail');
        }
      } else {
        html += '</tbody>';
        $('#stock-flow-detail').html(html);
        $('#stock-flow-detail-modal').modal();
        generateDataTable('stock-flow-detail');
      }

    }
  });



}