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
          html += '<option value="' + value.id + '">' + value.display_name + '</option>';
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
                      <th style="border: 1px solid #322f2f; padding: 5px 10px;font-size: 13px;text-align: left;font-family: arial;background-color:rgba(0,0,0,.05)">Sr.No</th>\n\
                      <th style="border: 1px solid #322f2f; padding: 5px 10px;font-size: 13px;text-align: left;font-family: arial;background-color:rgba(0,0,0,.05)">Dispatched By</th>\n\
                      <th style="border: 1px solid #322f2f; padding: 5px 10px;font-size: 13px;text-align: left;font-family: arial;background-color:rgba(0,0,0,.05)">Dispatched To</th>\n\
                      <th style="border: 1px solid #322f2f; padding: 5px 10px;font-size: 13px;text-align: left;font-family: arial;background-color:rgba(0,0,0,.05)">Customer Name</th>\n\
                      <th style="border: 1px solid #322f2f; padding: 5px 10px;font-size: 13px;text-align: left;font-family: arial;background-color:rgba(0,0,0,.05)">Customer Mobile Number</th>\n\
                      <th style="border: 1px solid #322f2f; padding: 5px 10px;font-size: 13px;text-align: left;font-family: arial;background-color:rgba(0,0,0,.05)">Dispatch Number</th>\n\
                      <th style="border: 1px solid #322f2f; padding: 5px 10px;font-size: 13px;text-align: left;font-family: arial;background-color:rgba(0,0,0,.05)">Invoice Number</th>\n\
                      <th style="border: 1px solid #322f2f; padding: 5px 10px;font-size: 13px;text-align: left;font-family: arial;background-color:rgba(0,0,0,.05)">Category</th>\n\
                      <th style="border: 1px solid #322f2f; padding: 5px 10px;font-size: 13px;text-align: left;font-family: arial;background-color:rgba(0,0,0,.05)">Item Code</th>\n\
                      <th style="border: 1px solid #322f2f; padding: 5px 10px;font-size: 13px;text-align: left;font-family: arial;background-color:rgba(0,0,0,.05)">Item Name</th>\n\
                      <th style="border: 1px solid #322f2f; padding: 5px 10px;font-size: 13px;text-align: left;font-family: arial;background-color:rgba(0,0,0,.05)">Qty</th>\n\
                      <th style="border: 1px solid #322f2f; padding: 5px 10px;font-size: 13px;text-align: left;font-family: arial;background-color:rgba(0,0,0,.05)">Lot No</th>\n\
                      <th style="border: 1px solid #322f2f; padding: 5px 10px;font-size: 13px;text-align: left;font-family: arial;background-color:rgba(0,0,0,.05)">BV Type</th>\n\
                      <th style="border: 1px solid #322f2f; padding: 5px 10px;font-size: 13px;text-align: left;font-family: arial;background-color:rgba(0,0,0,.05)">Type</th>\n\
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
                              <td style="border: 1px solid #322f2f; padding: 5px 10px;font-size: 13px;text-align: left;font-family: arial;">' + i + '</td>\n\
                              <td style="border: 1px solid #322f2f; padding: 5px 10px;font-size: 13px;text-align: left;font-family: arial;">' + distributor_by + '</td>\n\
                              <td style="border: 1px solid #322f2f; padding: 5px 10px;font-size: 13px;text-align: left;font-family: arial;">' + distributor_to + '</td>\n\
                              <td style="border: 1px solid #322f2f; padding: 5px 10px;font-size: 13px;text-align: left;font-family: arial;">' + customer_name + '</td>\n\
                              <td style="border: 1px solid #322f2f; padding: 5px 10px;font-size: 13px;text-align: left;font-family: arial;">' + customer_mobile + '</td>\n\
                              <td style="border: 1px solid #322f2f; padding: 5px 10px;font-size: 13px;text-align: left;font-family: arial;">' + dispatch_no + '</td>\n\
                              <td style="border: 1px solid #322f2f; padding: 5px 10px;font-size: 13px;text-align: left;font-family: arial;">' + invoice_no + '</td>\n\
                              <td style="border: 1px solid #322f2f; padding: 5px 10px;font-size: 13px;text-align: left;font-family: arial;">' + value.category_name + '</td>\n\
                              <td style="border: 1px solid #322f2f; padding: 5px 10px;font-size: 13px;text-align: left;font-family: arial;">' + value.sku + '</td>\n\
                              <td style="border: 1px solid #322f2f; padding: 5px 10px;font-size: 13px;text-align: left;font-family: arial;">' + value.product_name + '</td>\n\
                              <td style="border: 1px solid #322f2f; padding: 5px 10px;font-size: 13px;text-align: left;font-family: arial;">' + value.quantity + '</td>\n\
                              <td style="border: 1px solid #322f2f; padding: 5px 10px;font-size: 13px;text-align: left;font-family: arial;">' + lot_no_outgoing + '</td>\n\
                              <td style="border: 1px solid #322f2f; padding: 5px 10px;font-size: 13px;text-align: left;font-family: arial;">' + value.bv_type + '</td>\n\
                              <td style="border: 1px solid #322f2f; padding: 5px 10px;font-size: 13px;text-align: left;font-family: arial;">' + value.type + '</td>\n\
                          </tr>';
            i = i + 1;
          });
          html += '</tbody>';
          $('#stock-flow-detail').html(html);
          $('#stock-flow-detail-modal').modal();
          $('#stock-flow-detail').DataTable().destroy();
          $('#stock-flow-detail').DataTable({
              dom: 'Blfrtip',
              buttons: [{
                  extend: 'excelHtml5',
                  title: 'StockFlowDetail' + Date.now(),
                  text: 'Export to Excel',
              }],
              aaSorting: []
          });
          $('.dt-button').removeClass().addClass('btn btn-info ml-2 download-excel-item');
          $('.download-excel-item').css('display', 'none');
        }
      } else {
        html += '</tbody>';
        $('#stock-flow-detail').html(html);
        $('#stock-flow-detail-modal').modal();
        $('#stock-flow-detail').DataTable().destroy();
        $('#stock-flow-detail').DataTable();
      }

    }
  });


}


