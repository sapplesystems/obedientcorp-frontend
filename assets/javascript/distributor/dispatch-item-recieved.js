getDispatchReceivedItems();
var lot_number = [];
var lot_no;
function getDispatchReceivedItems() {
    showLoader();
    $.ajax({
        url: base_url + 'dispatch/details',
        type: 'post',
        data: {
            dispatch_id: dispatch_id,
            distributor_id:distributor_id
        },
        success: function (response) {
            var html = '<thead>\n\
                                <tr>\n\
                                <th>Sr.No.</th>\n\
                                <th>Product Name</th>\n\
                                <th>Product Price</th>\n\
                                <th>Dispatched Items Quantity</th>\n\
                                <th>Recieved Items Quantity</th>\n\
                                <th>Lot Number</th>\n\
                                <th>Status</th>\n\
                                <th>Comment</th>\n\
                                </tr>\n\
                                </thead><tbody>';
            if (response.status == "success") {
                console.log(response);
                var i = 1;
                if(response.lot_no)
                {
                    lot_no = response.lot_no;
                    $.each(response.lot_no, function (i, value) {
                        lot_number.push({label:value,value:value});
                    });
                    
                }
                $.each(response.data, function (key, value) {
                    var comment = '';
                    comment = '<td><textarea class="form-control" rows="5" id="comment_' + value.id + '"></textarea></td>';
                    var status = '<select id ="status_' + value.id + '"><option value="">Select Status</option>\n\
                    <option value="OK">OK</option>\n\
                    <option value="Less Items Received">Less Items Received</option>\n\
                    <option value="More Items Received">More Items Received</option>\n\
                    <option value="Expired">Expired</option>\n\
                    <option value="Damaged">Damaged</option>\n\
                    <option value="Wrong Item">Wrong Item</option>\n\
                    <option value="others">Others</option>';
                    html += '<tr id="tr_' + value.id + '" role="row" >\n\
                              <td class="sorting_1">' + i + '</td>\n\
                              <td>' + value.product_name + '</td>\n\
                              <td>' + value.product_price + '</td>\n\
                              <td id="dispatch-qty_'+ value.id + '">' + value.dispatched_items_quantity + '</td>\n\
                              <td>\n\
                                <i class="mdi mdi-minus-circle" id="sub_' + value.id + '" onclick="SubtractValue(' + value.id + ');"></i>\n\
                                <input type="text" value="' + value.received_items_quantity + '" id="receive-item-qty_' + value.id + '" onblur="setItemStatus(' + value.id + ');">\n\
                                <i class="mdi mdi-plus-circle" id="add_' + value.id + '" onclick="AddValue(' + value.id + ');"></i></td>\n\
                                <td><input type="text" value="" id="lot_no_'+value.id+'" onkeypress="searchLotNumber('+value.id+');"/></td>\n\
                              <td>' + status + '</td>\n\
                              ' + comment + '\n\
                              <input type="hidden" class="received_items" value="'+ value.id + '" />\n\
                              <input type="hidden" id="product_id_'+ value.id + '" value="' + value.product_id + '" />\n\
                          </tr>';
                    i = i + 1;
                });
                html += '</tbody>';
                $('#recieved-detail').html(html);
                // generateDataTable('recieved-detail');
                hideLoader();
            }
        }
    });
}


function SubtractValue(id) {
    var val = '';
    if ($('#receive-item-qty_' + id).val() != 0) {
        val = parseInt($('#receive-item-qty_' + id).val()) - 1;
        $('#receive-item-qty_' + id).val(val);

    }
    setItemStatus(id);
}
function AddValue(id) {
    var val = '';
    if ($('#receive-item-qty_' + id).val()) {
        val = parseInt($('#receive-item-qty_' + id).val()) + 1;
        $('#receive-item-qty_' + id).val(val);
    }
    setItemStatus(id);
}

function updateDispatchItems() {
    var recieve_item = [];
    var note = '';
    var dispatch_status = 'Received';
    $('.received_items').each(function () {
        var status = '';
        var comment = '';
        id = $(this).val();
        var dispatch_item_id = $(this).val();
        var dispatched_items_quantity = $('#dispatch-qty_' + id).html();
        var received_items_quantity = $('#receive-item-qty_' + id).val();
        var product_id = $('#product_id_' + id).val();
        var lot_no = $('#lot_no_'+id).val();
        if ($('#status_' + id).val()) {
            status = $('#status_' + id).val();
        }
        if ($('#comment_' + id).val()) {
            comment = $('#comment_' + id).val();
        }
        recieve_item.push({
            id: dispatch_item_id,
            item_id: product_id,
            dispatched_items_quantity: dispatched_items_quantity,
            received_items_quantity: received_items_quantity,
            status: status,
            comment: comment,
            lot_no:lot_no
        });
        if (dispatched_items_quantity != received_items_quantity) {
            dispatch_status = 'Mismatch';
        }
    });//end loop

    note = $('#note').val();
    var param = {
        recieve_item: recieve_item,
        dispatch_id: dispatch_id,
        status: dispatch_status,
        note2: note,
        status: dispatch_status,
        distributor_id: distributor_id,
    };
    console.log(param);
    var url = base_url + 'recieve/update-items';
    $.ajax({
        url: url,
        type: 'post',
        data: param ,
        success: function (response) {
            if (response.status == "success") {
                showSwal('success', 'Items Updated', response.data);
              }
              else {
                showSwal('error', response.data);
              }
        }
    });


}

function setItemStatus(f) {
    var dispatched_qty_elm = document.getElementById('dispatch-qty_' + f);
    var received_qty_elm = document.getElementById('receive-item-qty_' + f);
    var dispatched_qty = Number(dispatched_qty_elm.innerHTML);
    var received_qty = received_qty_elm.value;
    if (dispatched_qty == received_qty) {
        $('#status_' + f).val('OK');
    } else if (dispatched_qty > received_qty) {
        $('#status_' + f).val('Less Items Received');
    } else if (dispatched_qty < received_qty) {
        $('#status_' + f).val('More Items Received');
    }
}

function searchLotNumber(id)
{
    if(lot_no.length)
    {
        $("#lot_no_"+id).autocomplete({
            source: lot_number,
            select: function (event, ui) {
                $('#lot_no_'+id).val(ui.item.value);
              return false;
            }
        
          });

    }
    

}