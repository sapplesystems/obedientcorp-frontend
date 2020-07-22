var products = [];
getAllCategory();
getProductList();
getDistributorList();
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
    $('#item-id').val(ui.item.id);
    return false;
  }
});





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


