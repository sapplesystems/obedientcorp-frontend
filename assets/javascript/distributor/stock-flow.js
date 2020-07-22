var products = [];
getAllCategory();
getProductList();
searchItemsStock();
$(document).ready(function () {
    jQuery(document).ready(function ($) {
        //close popup
        $('.cd-popup').on('click', function (event) {
            if ($(event.target).is('.cd-popup-close') || $(event.target).is('.cd-popup')) {
                event.preventDefault();
                $(this).removeClass('is-visible');
            }
        });
    });

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
                            <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Sr.No</th>\n\
                            <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Category</th>\n\
                            <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Item Code</th>\n\
                            <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Item Name</th>\n\
                            <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">BV Type</th>\n\
                            <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Date</th>\n\
                            <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Lot No</th>\n\
                            <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Qty</th>\n\
                            <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">In</th>\n\
                            <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Out</th>\n\
                            <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;" class="stockDetail">Action</th>\n\
                            </tr>\n\
                            </thead><tbody>';
            if (response.status == "success") {
                if (response.data.length != 0) {
                    var i = 1;
                    var lotNumber = '';
                    $.each(response.data, function (key, value) {
                        var lot_no_outgoing = value.lot_no;
                        lotNumber = value.lot_no;
                        if (value.lot_no == 0) {
                            lot_no_outgoing = '-';
                        }
                        html += '<tr id="tr_outgoing_' + i + '" role="row" class="tr_outgoing" >\n\
                                    <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">'+ i + '</td>\n\
                                    <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">'+ value.category_name + '</td>\n\
                                    <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + value.sku + '</td>\n\
                                    <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + value.product_name + '</td>\n\
                                    <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + value.bv_type + '</td>\n\
                                    <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + value.date + '</td>\n\
                                    <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + lot_no_outgoing + '</td>\n\
                                    <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + value.inventory_quantity + '</td>\n\
                                    <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">'+ value.total_in + '</td>\n\
                                    <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">'+ value.total_out + '</td>\n\
                                    <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;" class="stockDetail"><a style="background-color: #191d21;border-color: #191d21;color: #fff;white-space: nowrap;border-radius: .2rem;text-align: center;vertical-align: middle;width: 50px;height: 28px;line-height: 28px;text-decoration:none;font-size: 12px;padding:0px;display:inline-block;" class="btn btn-dark btn-sm" href="javascript:void(0)" onclick="getStockFlowDetail('+ distributor_id + ',' + value.product_id + ',' + lotNumber + ');"id="detail_' + i + '">Details</a></td>\n\
                                </tr>';
                        i = i + 1;
                    });

                    html += '</tbody>';
                    $('#stock-flow').html(html);
                    $('#stock-flow').DataTable().destroy();
                    //$('#stock-flow').DataTable();
                    $('#stock-flow').DataTable({
                        dom: 'Blfrtip',
                        buttons: [
                            {
                                extend: 'excelHtml5',
                                title: 'stock-flow' + Date.now(),
                                text: 'Export to Excel',
                                exportOptions: {
                                    columns: [0,1, 2, 3,4,5,6,7,8,9]
                                  }
                            }
                        ],
                        aaSorting: []
                    });
                    $('.dt-button').removeClass().addClass('btn btn-info ml-2 download-excel');
                    $('.download-excel').css('display','none');
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




function itemDetail(invoice_id) {
    var url = base_url + 'distributor/invoice-items-detail ';
    $.ajax({
        url: url,
        type: 'post',
        data: {
            invoice_id: invoice_id
        },
        success: function (response) {
            items='<thead>\n\
                    <tr>>\n\
                    <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Sr.No</th>>\n\
                    <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Item Name</th>>\n\
                    <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Item Code</th>>\n\
                    <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Quantity</th>>\n\
                    <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Price</th>>\n\
                    <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Total Price</th>>\n\
                    </tr>>\n\
                    </thead></tbody>';
            $('#item-detail').html('');
            if (response.status == "success") {
                if (response.data.length != 0) {
                    var i = 1;
                    $.each(response.data, function (key, value) {
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
                    items+='</tbody>';
                    $('#item-detail').html(items);
                    $('#item-detail-popup').addClass('is-visible');
                    $('#item-detail').DataTable().destroy();
                    $('#item-detail').DataTable({
                        dom: 'Blfrtip',
                        buttons: [{
                            extend: 'excelHtml5',
                            title: 'stock-flow-detail' + Date.now(),
                            text: 'Export to Excel',
                        }],
                        aaSorting: []
                    });
                    $('.dt-button').removeClass().addClass('btn btn-info ml-2 download-excel-item');
                    $('.download-excel-item').css('display', 'none');
                }
            } 
            else {
                items+='</tbody>';
                $('#item-detail').html(items);
                $('#item-detail-popup').addClass('is-visible');
                $('#item-detail').DataTable().destroy();
                $('#item-detail').DataTable();
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
                        <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Sr.No</th>\n\
                        <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Dispatched By</th>\n\
                        <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Dispatched To</th>\n\
                        <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Customer Name</th>\n\
                        <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Customer Mobile Number</th>\n\
                        <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Dispatch Number</th>\n\
                        <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Invoice Number</th>\n\
                        <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Category</th>\n\
                        <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Item Code</th>\n\
                        <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Item Name</th>\n\
                        <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Date</th>\n\
                        <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Qty</th>\n\
                        <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Lot No</th>\n\
                        <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">BV Type</th>\n\
                        <th style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial;background-color: #d9edf7;">Type</th>\n\
                        </tr >\n\
                        </thead > <tbody>';
            $('#stock-detail').html('');
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
                                <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + i + '</td>\n\
                                <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + distributor_by + '</td>\n\
                                <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + distributor_to + '</td>\n\
                                <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + customer_name + '</td>\n\
                                <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + customer_mobile + '</td>\n\
                                <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + dispatch_no + '</td>\n\
                                <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + invoice_no + '</td>\n\
                                <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + value.category_name + '</td>\n\
                                <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + value.sku + '</td>\n\
                                <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + value.product_name + '</td>\n\
                                <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + value.ddate + '</td>\n\
                                <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + value.quantity + '</td>\n\
                                <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + lot_no_outgoing + '</td>\n\
                                <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + value.bv_type + '</td>\n\
                                <td style="border: #ebebeb 1px solid; padding: 5px 10px;font-size: 13px; text-align:left;font-family:arial; color:#444444;">' + value.type + '</td>\n\
                            </tr>';
                        i = i + 1;
                    });
                    html+='</tbody>';
                    $('#stock-detail').html(html);
                    $('#stock-detail-popup').addClass('is-visible');
                    $('#stock-detail').DataTable().destroy();
                    $('#stock-detail').DataTable({
                        dom: 'Blfrtip',
                        buttons: [{
                            extend: 'excelHtml5',
                            title: 'stock-item-detail' + Date.now(),
                            text: 'Export to Excel',
                        }],
                        aaSorting: []
                    });
                    $('.dt-button').removeClass().addClass('btn btn-info ml-2 download-excel-item');
                    $('.download-excel-item').css('display', 'none');
                }
            } else {
                html+='</tbody>';
                $('#stock-detail').html(html);
                $('#stock-detail-popup').addClass('is-visible');
                $('#stock-detail').DataTable().destroy();
                $('#stock-detail').DataTable();
            }

        }
    });

}





