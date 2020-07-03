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
    getProductList();
    getCurrentDate();
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
                    $.each(item_lot_number, function (key, value) {
                        set_lot_numbers += '<input type="radio" name="lot_no_radio" value="' + value + '" style="position: inherit;"> ' + value + '<br/>';
                    });
                    global_ui = ui;
                    set_lot_numbers += '<button onclick="selectLotNo(\'' + ui.item.id + '\');">Select</button>';
                    $('#lot_numbers_content').html(set_lot_numbers);
                    $('#lot_numbers_popup').addClass('is-visible');
                }
            } else {
                itemsAlreadyExits(ui.item.id, '0', ui);
            }
        }

    });

    $(document).on('change', '#distributor-list', function () {
        var dist_id = $(this).val();
        var html = '';
        $.each(distributor_data.data, function (key, value) {
            if (value.id == dist_id) {
                html = value.display_name + ' ' + value.address;

                // html += '<span>' + value.name + '<span> &npbs <span>' + value.address + '</span>';
            }
        });
        $('#distributor').val(html);
        //$('#distributor').html(html);

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
        //$('#dealer_price_' + id).html(dp);
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
        data: {distributor_id: distributor_id},
        success: function (response) {
            if (response.status == "success") {
                if (response.data) {
                    $.each(response.data, function (i, value) {
                        var search_prod = value.search_product + ' - ' + value.coupon_business_name;
                        products.push({id: value.id, label: search_prod, value: search_prod, dealer_price: value.dealer_price, cgst: value.cgst, igst: value.igst, sgst: value.sgst, code: value.sku, coupon_type: value.coupon_business_name, lot_no: value.lot_no});
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
        var dispatch_type = '';
        var total_cgst = 0;
        var total_sgst = 0;
        var total_igst = 0;
        $('.items').each(function () {
            var items_ids = $(this).val();
            if (items_ids && items_ids != '') {
                var item_qty = $('#qty_' + items_ids).val();
                var item_id = $('#item_id_' + items_ids).val();
                total_cgst = (total_cgst + Number($('#cgst_' + items_ids).val()));
                total_sgst = (total_sgst + Number($('#sgst_' + items_ids).val()));
                total_igst = (total_igst + Number($('#igst_' + items_ids).val()));
                items.push({
                    item_id: item_id,
                    qty: item_qty,
                    cgst: $('#cgst_' + items_ids).val(),
                    sgst: $('#sgst_' + items_ids).val(),
                    igst: $('#igst_' + items_ids).val(),
                    lot_no: $('#lotNo_' + items_ids).val(),
                });
            }
        });
        dispatch_type = $("input[name='dispatch_type']:checked").val();
        var params = {
            distributor_id_from: distributor_id,
            distributor_id_to: $('#distributor-list').val(),
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
            dispatch_type: dispatch_type
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
                    window.location.href = 'dispatch-list';
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
                    if (value.id != distributor_id) {
                        html += '<option value="' + value.id + '">' + value.display_name + '</option>';
                    }

                });
                $('#distributor-list').html(html);
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
    //$("input[name='dispatch_type']").attr('checked', false);
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
    var endDate = document.getElementById("delivery-date").value;
    if ((Date.parse(startDate.split(/\-/).reverse().join('-')) > Date.parse(endDate.split(/\-/).reverse().join('-')))) {
        showSwal('error', 'Invalid Expected Date', 'Expected date should be greater than or equal to date');
        document.getElementById("delivery-date").value = "";
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
    var unique_id = ui.item.id + '_' + lot_no;
    var lot_style = (lot_no == '0') ? ' style="display:none;" ' : '';

    html += '<li class="js-productContainer productContainer products" id="tr_' + unique_id + '" data-pid="204592-066-M11" data-pidmaster="204592">\n\
                            <div class="productContainerRow">\n\
                                <div class="columnCell column1 productImage text-center"><i style="cursor:pointer;" class="fa fa-trash-o trash_icon" onclick="removeProduct(\'' + unique_id + '\');"></i></div>\n\
                                <div class="columnCell column1 productImage text-left"><span  tabindex="-1" aria-hidden="true">' + ui.item.value + '</span></div>\n\
                                <div class="columnCell column2 productDetails">\n\
                                    <div class="">\n\
                                        <p><span>' + ui.item.code + '</span></p>\n\
                                        <p ' + lot_style + ' id="display_lot_number_' + unique_id + '">Lot: ' + lot_no + '</p>\n\
                                        <input type="hidden" id="lotNo_' + unique_id + '" value="' + lot_no + '" />\n\
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
                                        <div class="text-gray-dark cx-heavy-brand-font mt3" id="dealer_price_' + unique_id + '">' + ui.item.dealer_price + '</div>\n\
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
}