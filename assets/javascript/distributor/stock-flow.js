var products = [];
getAllCategory();
getProductList();
searchItemsStock();
searchSalesReport();
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

function searchItemsStock() {
    var start_date = '';
    var end_date = '';
    var item_name = '';
    var category_id = '';
    var item_code = '';
    var lot_no = '';
    var qty = '';
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
    var params = {
        distributor_id: distributor_id,
        category_id: category_id,
        product_name: item_name,
        qty: qty,
        lot_no: lot_no,
        start_date: start_date,
        end_date: end_date,
        item_code: item_code,
        stock_flow:1,
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
                            <th>Category</th>\n\
                            <th>Item Code</th>\n\
                            <th>Item Name</th>\n\
                            <th>BV Type</th>\n\
                            <th>Date</th>\n\
                            <th>Batch</th>\n\
                            <th>Qty</th>\n\
                            <th>In</th>\n\
                            <th>Out</th>\n\
                            </tr>\n\
                            </thead><tbody>';
            if (response.status == "success") {
                if (response.data.length !=0) {
                    var i = 1;
                        $.each(response.data, function (key, value) {
                            var lot_no_outgoing = value.lot_no;
                                if(value.lot_no==0)
                                {
                                    lot_no_outgoing = '-';
                                }
                            html += '<tr id="tr_outgoing_' + i + '" role="row" class="tr_outgoing" >\n\
                                    <td>'+ i + '</td>\n\
                                    <td>'+ value.category_name + '</td>\n\
                                    <td>' + value.sku + '</td>\n\
                                    <td>' + value.product_name + '</td>\n\
                                    <td>' + value.bv_type + '</td>\n\
                                    <td>' + value.date + '</td>\n\
                                    <td>' + lot_no_outgoing + '</td>\n\
                                    <td>' + value.inventory_quantity + '</td>\n\
                                    <td>'+value.total_in+'</td>\n\
                                    <td>'+value.total_out+'</td>\n\
                                    <!--td><a href="stock-flow-detail.php?pro_id='+ value.product_id + '&stock_d=' + value.date + '" id="detail_' + i + '">Detail</a></td-->\n\
                                </tr>';
                            i = i + 1;
                        });
                   
                    html += '</tbody>';
                    $('#stock-flow').html(html);
                    $('#stock-flow').DataTable().destroy();
                    $('#stock-flow').DataTable();
                }
            }
            else {
                html += '</tbody>';
                $('#stock-flow').html(html);
                $('#stock-flow').DataTable().destroy();
                $('#stock-flow').DataTable();
            }

        }
    });
}//end function

function CancelSearch() {
    $('#start-date').val('');
    $('#end-date').val('');
    $('#item-name').val('');
    $('#categories').val('');
    $('#item-code').val('');
    $('#lot-no').val('');
    $('#qty').val('');
    $('#type').val('');
    $('#search-product').val('');
    searchItemsStock();
}
function checkStartEndDate() {
    var startDate = document.getElementById("start-date").value;
    var endDate = document.getElementById("end-date").value;
    if ((Date.parse(startDate.split(/\-/).reverse().join('-')) > Date.parse(endDate.split(/\-/).reverse().join('-')))) {
        showSwal('error', 'Invalid Date', 'End date should be greater than or equal to start date');
        document.getElementById("end-date").value = "";
        return false;
    }
}

function SubtractValue() {
    var val = '';
    if ($('#qty').val() != 0) {
        val = Number($('#qty').val()) - 1;
        $('#qty').val(val);

    }
}
function AddValue() {
    var val = '';
    if ($('#qty').val()) {
        val = Number($('#qty').val()) + 1;
        $('#qty').val(val);
    }
}

//function for sales report

function searchSalesReport() {
    var start_date = '';
    var end_date = '';
    var item_id = '';
    var category_id = '';
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
    var params = {
        distributor_id: distributor_id,
        category_id: category_id,
        product_id: item_id,
        start_date: start_date,
        end_date: end_date,
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
                                    <td>'+ value.invoice_no + '</td>\n\
                                    <td>' + value.invoice_date_time + '</td>\n\
                                    <td>' + value.total_amount + '</td>\n\
                                    <td>' + value.tax_amount + '</td>\n\
                                    <td>' + value.cash_amount + '</td>\n\
                                    <td>' + value.coupon_amount + '</td>\n\
                                    <td>\n\
                                    <a href="javascript:void(0);">Item Details</a>\n\
                                </td>\n\
                                </tr>';
                        i = i + 1;
                    });
                    html += '</tbody>';
                    $('#sales-report').html(html);
                    $('#sales-report').DataTable().destroy();
                    $('#sales-report').DataTable();
                }
            } else {
                html += '</tbody>';
                $('#sales-report').html(html);
                $('#sales-report').DataTable().destroy();
                $('#sales-report').DataTable();
                //showSwal('error', response.data);
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
    searchSalesReport();
}


function itemDetail(invoice_id) {
    var url = base_url + 'distributor/invoice-items-detail ';
    $.ajax({
        url: url,
        type: 'post',
        data: {
            invoice_id: invoice_id
        },
        success: function(response) {
            $('#item-detail').html('');
            if (response.status == "success") {
                if (response.data.length != 0) {
                    var i = 1;
                    var items = '';
                    $.each(response.data, function(key, value) {
                        console.log(value);
                        items += '<tr id="item_' + i + '" role="row">\n\
                                 <td>' + i + '</td>\n\
                                 <td>' + value.product_name + '</td>\n\
                                 <td>' + value.sku + '</td>\n\
                                 <td>' + value.quantity + '</td>\n\
                                 <td>' + value.price + '</td>\n\
                                 <td>' + value.item_total + '</td>\n\
                             </tr>';
                    });
                    console.log(items);
                    $('#item-detail').html(items);
                    $('#item-detail-popup').addClass('is-visible');
                }
            } else {
                showSwal('error', 'No Data Found');
            }

        }
    });
}


