var products = [];
var company_list = [];
var x = 1; //Initial field counter is 1
var maxField = 10; //Input fields increment limitation
var distributor_data = '';
var sub_total = 0;
var total_tax = 0;
var total = 0;
var global_ui = {};
$(document).ready(function () {


    //show current distributor name and address
    $('#distributor-to').val(distributor_name);
    $('#address-to').val(distributor_address);

    //end
    $('.cd-popup').on('click', function (event) {
        if ($(event.target).is('.cd-popup-close') || $(event.target).is('.cd-popup')) {
            event.preventDefault();
            $(this).removeClass('is-visible');
            $('#search-product').val('');
        }
    });

    $("#test2").attr('checked', true);
    getProductList();
    getCurrentDate();
    getCompanyList();
    //search product
    $("#search-product").autocomplete({
        multiple: true,
        source: products,
        select: function (event, ui) {
            var item_lot_number = ui.item.lot_no;
            if (item_lot_number.length > 0) {
                if (item_lot_number.length == 1) {
                    itemsAlreadyExits(ui.item.id, item_lot_number[0], ui);
                } else {
                    var set_lot_numbers = '';
                    var lq = 0;
                    var lot_quantity = ui.item.lot_quantity;
                    var test_id = 3;
                    $.each(item_lot_number, function (key, value) {
                        //set_lot_numbers += '<label><input type="radio" name="lot_no_radio" value="' + value + '" style="position: inherit;"> ' + value + ' Quantity: ' + lot_quantity[lq] + '</label><br/>';
                        set_lot_numbers+='<p>\n\
                                    <input type="radio" id="test'+test_id+'" name="lot_no_radio" value="' + value + '">\n\
                                    <label for="test'+test_id+'">' + value + ' Quantity: ' + lot_quantity[lq] + '</label>\n\
                                    </p>';
                                lq++
                                test_id++;
                    });
                    global_ui = ui;
                    set_lot_numbers += '<div class="text-center"><button onclick="selectLotNo(\'' + ui.item.id + '\');">Select</button></div>';
                    $('#lot_numbers_content').html(set_lot_numbers);
                    $('#lot_numbers_popup').addClass('is-visible');
                }
            } else {
                itemsAlreadyExits(ui.item.id, '0', ui);
            }
        }

    });

    //search company
    $("#company_name").autocomplete({
        multiple: true,
        source: company_list,
        select: function (event, ui) {
            $('#company_name').val(ui.item.label);
            $('#company_address').val(ui.item.address);
            $('#dispatch_company_id').val(ui.item.id);
            //$('#challan_invoice').val(ui.item.challan_invoice_no);
            return false;
        }
    });


    $('#company_name').on('keyup', function () {
        $('#company_address').val('');
        $('#dispatch_company_id').val('');
        $('#challan_invoice').val('');
    });

});//document ready

function SubValue(id) {
    var qty = $('#received_qty_' + id).val();
    qty = Number(qty);
    qty--;
    if (qty > 0) {
        $('#received_qty_' + id).val(qty);
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
    var qty = $('#received_qty_' + id).val();
    qty = Number(qty);
    qty++;
    $('#received_qty_' + id).val(qty);
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
    var url = base_url + 'distributor/products';
    $.ajax({
        url: url,
        type: 'post',
        data: { distributor_id: distributor_id },
        success: function (response) {
            if (response.status == "success") {
                if (response.data) {
                    $.each(response.data, function (i, value) {
                        var search_prod = value.search_product + ' - ' + value.coupon_business_name;
                        products.push({ id: value.id, label: search_prod, value: search_prod, dealer_price: value.dealer_price, cgst: value.cgst, igst: value.igst, sgst: value.sgst, code: value.sku, coupon_type: value.coupon_business_name, lot_no: value.lot_no, lot_quantity: value.lot_quantity });
                    });
                }
            }
        }
    });
}//end function
//get company list
function getCompanyList() {
    var url = base_url + 'dispatch-company-list ';
    $.ajax({
        url: url,
        type: 'post',
        data: {},
        success: function (response) {
            if (response.status == "success") {
                if (response.data) {
                    $.each(response.data, function (i, value) {
                        company_list.push({ id: value.id, label: value.name, value: value.id, address: value.address, challan_invoice_no: value.challan_invoice_no });
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
        var dispatch_type = 'Direct';
        var total_cgst = 0;
        var total_sgst = 0;
        var total_igst = 0;
        var dispatch_status = 'Received';
        $('.items').each(function () {
            var status = '';
            var comment = '';
            var items_ids = $(this).val();
            if (items_ids && items_ids != '') {
                var item_qty = $('#qty_' + items_ids).val();
                var received_item_qty = $('#received_qty_' + items_ids).val();
                var item_id = $('#item_id_' + items_ids).val();
                total_cgst = (total_cgst + Number($('#cgst_' + items_ids).val()));
                total_sgst = (total_sgst + Number($('#sgst_' + items_ids).val()));
                total_igst = (total_igst + Number($('#igst_' + items_ids).val()));
                if ($('#status_' + items_ids).val()) {
                    status = $('#status_' + items_ids).val();
                }
                if ($('#comment_' + items_ids).val()) {
                    comment = $('#comment_' + items_ids).val();
                }
                items.push({
                    item_id: item_id,
                    qty: item_qty,
                    received_qty: received_item_qty,
                    cgst: $('#cgst_' + items_ids).val(),
                    sgst: $('#sgst_' + items_ids).val(),
                    igst: $('#igst_' + items_ids).val(),
                    lot_no: $('#lotNo_' + items_ids).val(),
                    status: status,
                    comment: comment
                });
                if (item_qty != received_item_qty) {
                    dispatch_status = 'Mismatch';
                }
            }
        });

        var params = {
            distributor_id_to: distributor_id,
            company_name: $('#company_name').val(),
            company_address: $('#company_address').val(),
            dispatch_company_id: $('#dispatch_company_id').val(),
            challan_invoice: $('#challan_invoice').val(),
            received_date: $('#current-date').val(),
            cgst: total_cgst,
            sgst: total_sgst,
            igst: total_igst,
            subtotal: Number($('#subTotal-amount').html()),
            total: Number($('#total-amount').html()),
            note: $('#note').val(),
            shipping_details: $('#shipping-detail').val(),
            dispatch_date: $('#dispatch_date').val(),
            dispatch_item: items,
            dispatch_type: dispatch_type,
            status: dispatch_status,
        };
        var url = base_url + 'dispatch/generate-dispatch';
        $.ajax({
            url: url,
            type: 'post',
            data: params,
            success: function (response) {
                if (response.status == "success") {
                    showSwal('success', 'Dispatch Generate', response.data);
                    CancelInvoice();
                    window.location.href = 'item-received-list';
                }
                else {
                    showSwal('error', response.data);
                    CancelInvoice();
                }
            }
        });

    }//end if


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
    var company_name = $('#company_name').val();
    if (company_name == '') {
        showSwal('error', 'Company Name Not Selected', 'Please select company name');
        return false;
    }
    else if (totalRowCount <= 0) {
        showSwal('error', 'Items Not Selected', 'Please select product');
        return false;
    } else if ($('#current-date').val() == '') {
        showSwal('error', 'Date Not Selected', 'Please select Date');
        return false;

    } else if ($('#dispatch_date').val() == '') {
        showSwal('error', 'Dispatch Date Not Selected', 'Please select dispatch date');
        return false;
    }
    else {
        return true;
    }
}

function CancelInvoice() {
    $('#company_address').val('');
    $('#company_name').val('');
    $('#dispatch_company_id').val('');
    $('#challan_invoice').val('');
    $('#item-list').html('');
    $('#current-date').val('');
    $('#dispatch_date').val('');
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
    var endDate = document.getElementById("dispatch_date").value;
    if ((Date.parse(startDate.split(/\-/).reverse().join('-')) < Date.parse(endDate.split(/\-/).reverse().join('-')))) {
        showSwal('error', 'Invalid Dispatch Date', 'Dispatch date can not be greater than receiving date');
        document.getElementById("dispatch_date").value = "";
        return false;
    }
}
function selectLotNo(item_id, ui) {
    var lot_no = $("input[name='lot_no_radio']:checked").val();
    if (!lot_no || lot_no == '' || lot_no == undefined) {
        showSwal('error', 'Select lot number', 'Select lot number');
        return false;
    }
    itemsAlreadyExits(item_id, lot_no, global_ui);
    global_ui = {};
    $('#lot_numbers_popup').removeClass('is-visible');
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
    var lot_display = '';
    var unique_id = ui.item.id + '_' + lot_no;
    var lot_style = (lot_no == '0') ? ' style="display:none;" ' : '';
    if (lot_no == '0') {
        lot_display = '<p>Lot No:<input type="text" id="lotNo_' + unique_id + '" value="' + lot_no + '" /></p>';
    }
    else {
        lot_display = '<p ' + lot_style + ' id="display_lot_number_' + unique_id + '">Lot: <input type="text" id="lotNo_' + unique_id + '" value="' + lot_no + '" /></p>';
    }
    comment = '<textarea class="form-control" value="" rows="1" id="comment_' + unique_id + '"></textarea>';
    var status = '<select class="form-control" form="carform" id ="status_' + unique_id + '">\n\
                    <option value="">Select Status</option>\n\
                    <option value="OK" >OK</option>\n\
                    <option value="Less Items Received"  >Less Items Received</option>\n\
                    <option value="More Items Received" >More Items Received</option>\n\
                    <option value="Expired" >Expired</option>\n\
                    <option value="Damaged" >Damaged</option>\n\
                    <option value="Wrong Item" >Wrong Item</option>\n\
                    <option value="others" >Others</option>\n\
                    </select>';
    html += '<li class="js-productContainer productContainer products" id="tr_' + unique_id + '" data-pid="204592-066-M11" data-pidmaster="204592">\n\
                            <div class="productContainerRow">\n\
                                <div class="columnCell column1 productImage text-center"><i style="cursor:pointer;" class="fa fa-trash-o trash_icon" onclick="removeProduct(\'' + unique_id + '\');"></i></div>\n\
                                <div class="columnCell column1 productImage text-left"><span  tabindex="-1" aria-hidden="true">' + ui.item.value + '</span></div>\n\
                                <div class="columnCell column2 productDetails">\n\
                                    <div class="">\n\
                                        <p><span>' + ui.item.code + '</span></p>\n\
                                        '+ lot_display + '\n\
                                    </div>\n\
                                </div>\n\
                                <div class="columnCell column4 productQuantity">\n\
                                    <form>\n\
                                        <div class="value-button" onclick="SubtractValue(\'' + unique_id + '\');" value="Decrease Value"><i class="fa fa-minus"></i></div>\n\
                                        <input type="number" id="qty_' + unique_id + '" value="1" />\n\
                                        <div class="value-button" onclick="AdditionValue(\'' + unique_id + '\');" value="Increase Value"><i class="fa fa-plus"></i></div>\n\
                                    </form>\n\
                                </div>\n\
                                <div class="columnCell column4 productQuantity">\n\
                                    <form>\n\
                                        <div class="value-button" id="sub_' + unique_id + '" onclick="SubValue(\'' + unique_id + '\');" value="Decrease Value"><i class="fa fa-minus"></i></div>\n\
                                        <input type="number" id="received_qty_' + unique_id + '" value="1" />\n\
                                        <div class="value-button" id="add_' + unique_id + '" onclick="AddValue(\'' + unique_id + '\');" value="Increase Value"><i class="fa fa-plus"></i></div>\n\
                                    </form>\n\
                                </div>\n\
                                <div class="columnCell column2">\n\
                                    <div class="price">\n\
                                        <div class="text-gray-dark cx-heavy-brand-font mt3" id="dealer_price_' + unique_id + '">' + ui.item.dealer_price + '</div>\n\
                                    </div>\n\
                                </div>\n\
                                <div class="columnCell column2 productPriceTotal">\n\
                                <div class="price">\n\
                                    <div class="text-gray-dark cx-heavy-brand-font mt3">'+ status + '</div>\n\
                                </div>\n\
                            </div>\n\
                            <div class="columnCell column2 productPriceTotal">\n\
                            <div class="price">\n\
                                <div class="text-gray-dark cx-heavy-brand-font mt3">'+ comment + '</div>\n\
                            </div>\n\
                        </div>\n\
                        <div class="columnCell column2 productPriceTotal">\n\
                             <div class="price">\n\
                                <div class="text-gray-dark cx-heavy-brand-font mt3 total_pay" id="tot_' + unique_id + '">' + ui.item.dealer_price + '</div>\n\
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
    SubTotal();
}

function SubtractValue(id) {
    var qty = $('#qty_' + id).val();
    qty = Number(qty);
    qty--;
    if (qty > 0) {
        $('#qty_' + id).val(qty);
    }

}
function AdditionValue(id) {
    var qty = $('#qty_' + id).val();
    qty = Number(qty);
    qty++;
    $('#qty_' + id).val(qty);
}
