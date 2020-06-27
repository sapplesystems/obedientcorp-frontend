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
    var start_date = '';
    var end_date = '';
    var item_name = '';
    var category_id = '';
    var item_code = '';
    var lot_no = '';
    var qty = '';
    var view = 'all';
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
    if ($('#type').val() == 'incoming') {
        view = 'incoming';
    }
    if ($('#type').val() == 'outgoing') {
        view = 'outgoing';
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
        view: view,
    };
    console.log(params);
    var url = base_url + 'distributor/stock-flow';
    $.ajax({
        url: url,
        type: 'post',
        data: params,
        success: function (response) {
            console.log(response);
            if (response.status == "success") {
                if (response.data.incoming_stock.length != 0 || response.data.outgoing_stock.length != 0) {
                    var i = 1;
                    var html = '<thead>\n\
                <tr>\n\
                <th>Category</th>\n\
                <th>Item Code</th>\n\
                <th>Item Name</th>\n\
                <th>Date</th>\n\
                <th>Batch</th>\n\
                <th>Qty</th>\n\
                <th>Action</th>\n\
                </tr>\n\
                </thead><tbody>';
                    if (response.data.incoming_stock.length != 0) {
                        $.each(response.data.incoming_stock, function (key, value) {
                            html += '<tr id="tr_incoming_' + i + '" role="row" class="tr_incoming" >\n\
                                    <td>'+ i + '</td>\n\
                                    <td>'+ value.category_name + '</td>\n\
                                    <td>' + value.sku + '</td>\n\
                                    <td>' + value.product_name + '</td>\n\
                                    <td>' + value.date + '</td>\n\
                                    <td>' + value.lot_no + '</td>\n\
                                    <td>' + value.quantity + '</td>\n\
                                    <td></td>\n\
                                </tr>';
                            i = i + 1;
                        });
                    }
                    if (response.data.outgoing_stock.length != 0) {
                        $.each(response.data.outgoing_stock, function (key, value) {
                            html += '<tr id="tr_incoming_' + i + '" role="row" class="tr_incoming" >\n\
                                    <td>'+ i + '</td>\n\
                                    <td>'+ value.category_name + '</td>\n\
                                    <td>' + value.sku + '</td>\n\
                                    <td>' + value.product_name + '</td>\n\
                                    <td>' + value.date + '</td>\n\
                                    <td>' + value.lot_no + '</td>\n\
                                    <td>' + value.quantity + '</td>\n\
                                    <td></td>\n\
                                </tr>';
                            i = i + 1;
                        });
                    }
                    html += '</tbody>';
                    $('#stock-flow').html(html);
                }
                else {
                    showSwal('error', 'No Data Found');
                }
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

