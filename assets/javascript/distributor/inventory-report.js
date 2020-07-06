var products = [];
getAllCategory();
getProductList();
searchItemsStock();
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
        console.log(response);
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
  var item_code ='';
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
  if ($('#item-code').val()!='') {
    item_code = $('#item-code').val();
  }
  var params = {
    distributor_id: distributor_id,
    check_stock_item: check_stock,
    category_id: category_id,
    product_name: item_name,
    date: search_date,
    item_code :item_code
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
        var i =1;
        $.each(response.data, function (key, value) {
          var lot_no = value.lot_no;
          if(value.lot_no == 0)
          {
            lot_no = '-';
          }
          html += '<tr id="tr_' + value.id + '" role="row" >\n\
                <td class="sorting_1">' + i + '</td>\n\
                <td>' + value.category_name + '</td>\n\
                <td>' + value.inventory_date + '</td>\n\
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
        $('#stock-detail').DataTable().destroy();
        $('#stock-detail').DataTable();
      }
      else {
        html += '</tbody>';
        $('#stock-detail').html(html);
        $('#stock-detail').DataTable().destroy();
        $('#stock-detail').DataTable();
      }
    }
  });
}//end function

function CancelSearch()
{
  $('#search-date').val('');
  $('#search-product').val('');
  $('#categories').val('');
  $('#stock-items').prop('checked',false);
  $('#item-code').val('');
  searchItemsStock();
}

function exportTableToExcel(){
  $("#stock-detail").table2excel({
    filename: "current_stock.xls"
});
  
}