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
                            <th width="5%">Sr.No.</th>\n\
                            <th width="21%">Product Name</th>\n\
                            <th width="8%">Product Code</th>\n\
                            <th width="8%">Product Price</th>\n\
                            <th width="12%">Dispatched Items Quantity</th>\n\
                            <th width="10%">Recieved Items Quantity</th>\n\
                            <th width="9%">Lot Number</th>\n\
                            <th width="13%">Status</th>\n\
                            <th width="25%">Comment</th>\n\
                            </tr>\n\
                        </thead>';
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
                    var recevied_status1='';
                    var recevied_status2='';
                    var recevied_status3='';
                    var recevied_status4='';
                    var recevied_status5='';
                    var recevied_status6='';
                    var recevied_status7='';
                    if(value.status == 'OK')
                    {
                        recevied_status1 = 'selected';
                    }else if(value.status == 'Less Items Received')
                    {
                        recevied_status2 = 'selected';

                    }else if(value.status == 'More Items Received')
                    {
                        recevied_status3 = 'selected';
                    }else if(value.status == 'Expired')
                    {
                        recevied_status4 = 'selected';
                    }else if(value.status == 'Damaged')
                    {
                        recevied_status5 = 'selected';
                    }else if(value.status == 'Wrong Item')
                    {
                        recevied_status6 = 'selected';
                    }
                    else if(value.status == 'others')
                    {
                        recevied_status7 = 'selected';
                    }
                    comment = '<td><textarea class="form-control" rows="1" id="comment_' + value.id + '"></textarea></td>';
                    var status = '<select class="form-control" form="carform" id ="status_' + value.id + '">\n\
                                    <option value="">Select Status</option>\n\
                                    <option value="OK" '+recevied_status1+'>OK</option>\n\
                                    <option value="Less Items Received" '+recevied_status2+' >Less Items Received</option>\n\
                                    <option value="More Items Received" '+recevied_status3+'>More Items Received</option>\n\
                                    <option value="Expired" '+recevied_status4+'>Expired</option>\n\
                                    <option value="Damaged" '+recevied_status5+'>Damaged</option>\n\
                                    <option value="Wrong Item" '+recevied_status6+'>Wrong Item</option>\n\
                                    <option value="others" '+recevied_status7+'>Others</option>\n\
                                    </select>';
                    html += '<tr id="tr_' + value.id + '" role="row" >\n\
                              <td class="sorting_1">' + i + '</td>\n\
                              <td>' + value.product_name + '</td>\n\
                              <td>' + value.sku + '</td>\n\
                              <td>' + value.product_price + '</td>\n\
                              <td id="dispatch-qty_'+ value.id + '">' + value.dispatched_items_quantity + '</td>\n\
                              <td class="productQuantity">\n\
                                    <form>\n\
                                    <div class="value-button"><i class="fa fa-minus" id="sub_' + value.id + '" onclick="SubtractValue(' + value.id + ');"></i></div>\n\
                                    <input type="number" value="' + value.received_items_quantity + '" id="receive-item-qty_' + value.id + '" onblur="setItemStatus(' + value.id + ');">\n\
                                    <div class="value-button"><i class="fa fa-plus" id="add_' + value.id + '" onclick="AddValue(' + value.id + ');"></i></div>\n\
                                    </form>\n\
                              </td>\n\
                              <td><input type="text" value="" id="lot_no_'+value.id+'" onkeypress="searchLotNumber('+value.id+');"/></td>\n\
                              <td>' + status + '</td>\n\
                              ' + comment + '\n\
                              <input class="form-control received_items" type="hidden" value="'+ value.id + '" />\n\
                              <input class="form-control" type="hidden" id="product_id_'+ value.id + '" value="' + value.product_id + '" />\n\
                          </tr>';
                    i = i + 1;
                });
                html += '</tbody>';
                $('#recieved-detail').html(html);
                $('#dist-name').html(response.DispatcheDetails.distributor_name_from)
                $('#dist-to').html(response.DispatcheDetails.distributor_name_to);
                $('#dist-add-to').html(response.DispatcheDetails.distributor_address_to);
                $('#dist-add-from').html(response.DispatcheDetails.distributor_address_from);
                $('#dispatch-no').html(response.DispatcheDetails.dispatch_no);
                $('#dispatch-type').html(response.DispatcheDetails.dispatch_type);
                $('#dispatch-date').html(response.DispatcheDetails.dispatch_date);
                $('#dispatch-status').html(response.DispatcheDetails.status);
                $('#receive-date').html(response.DispatcheDetails.received_date);
                $('#subtotal').html(response.DispatcheDetails.subtotal);
                $('#tax').html(0);
                $('#total').html(response.DispatcheDetails.total);
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
    var url = base_url + 'recieve/update-items';
    $.ajax({
        url: url,
        type: 'post',
        data: param ,
        success: function (response) {
            if (response.status == "success") {
                showSwal('success', 'Items Updated', response.data);
                window.location.href='item-received-list';
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