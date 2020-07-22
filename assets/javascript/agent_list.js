getAgentsList();

$(document).ready(function () {
    $(document).on('change', '#kyc_status_dd', function () {
        $('#associate_order_list').DataTable().search($(this).val()).columns(6).search( '' ).draw();
    });
});


function getAgentsList() {
    showLoader();
    $.ajax({
        url: base_url + 'agent-list',
        type: 'post',
        data: {
            user_id: user_id
        },
        success: function (response) {
            var x = 1;
            if (response.status == "success") {
                var table_data = '<thead>\n\
                <tr>\n\
                    <th>Sr.No</th>\n\
                    <th>Associate Name</th>\n\
                    <th>Associate  Code</th>\n\
                    <th>Introducer Code</th>\n\
                    <th>Mobile</th>\n\
                    <th>Joining Date</th>\n\
                    <th>Kyc Status</th>\n\
                    <th>Password</th>\n\
                    <th>Action</th>\n\
                </tr>\n\
            </thead><tbody>';
                //table_data += '<tbody>';
                $.each(response.data, function (key, value) {
                    var change_agent_status = '';
                    if (value.is_activated == '1') {
                        change_agent_status = 'text-success';
                    } else {
                        change_agent_status = 'text-danger';
                    }
                    var bv_status_class = 'text-danger';
                    if (value.bv_status == '2') {
                        bv_status_class = 'text-warning';
                    } else if (value.bv_status == '3') {
                        bv_status_class = 'text-success';
                    }
                    action_td = '<td>\n\
                    <div class="float-left">\n\
                    <a href="profile.php?user_id=' + value.user_id + '&user_email=' + value.email + '" title="Edit Associate Detail"><i class="mdi mdi-pencil text-info"></i></a> &nbsp\n\
                    </div>\n\
                    <div class="float-left">\n\
                        <i class="mdi mdi-check-circle ' + change_agent_status + '" id="change_agent_status_' + value.user_id + '" onclick="changeAgentStatus(event, ' + value.user_id + ');" title="Activate/Deactivate Associate" ></i>\n\
                    </div>\n\
                    <div class="float-left ml-2">\n\
                        <i class="mdi mdi-checkbox-blank-circle ' + bv_status_class + '" id="change_bv_status_' + value.user_id + '" onclick="changeBVStatus(event, ' + value.user_id + ', \'' + value.bv_status + '\');" title="Change Associate Status" ></i>\n\
                    </div>\n\
                    <div class="float-left ml-2">\n\
                        <a href="javascript:void(0);" id="change_transaction_password_' + value.user_id + '" onclick="changeTransactionPassword(event, ' + value.user_id + ');" title="Change Transaction Password"><i class="mdi mdi-lock text-primary"></i></a>\n\
                        <form class="form-inline" style="display:none;" name="change_transaction_password_form_' + value.user_id + '" id="change_transaction_password_form_' + value.user_id + '" method="post">\n\
                            <input type="password" class="required" name="password" id="password_' + value.user_id + '" placehoder="Password"/>\n\
                            <input type="hidden" name="path" value="" id="url_path_' + value.user_id + '"/>\n\
                            <button type="submit" class="btn btn-gradient-success btn-sm" onclick="changePasswordSubmit(event, ' + value.user_id + ');">Submit</button>&nbsp;\n\
                            <button type="submit" class="btn btn-gradient-danger btn-sm" onclick="changePasswordCancel(event, ' + value.user_id + ');">Cancel</button>\n\
                        </form>\n\
                    </div>\n\
                    <div class="float-left ml-2">\n\
                        <a href="javascript:void(0);" id="change_password_' + value.user_id + '" onclick="changePassword(event,' + value.user_id + ');" title="Change Login Password"><i class="mdi mdi-key text-warning"></i></a>\n\
                    </div>\n\
                    <div class="float-left ml-2">\n\
                    <a href="update-kyc-status.php?associate_id=' + value.user_id + '" id="update-kyc-status" title="Update Kyc Status"><i class="mdi mdi-open-in-new text-secondary"></i></a> \n\
                    </div>\n\
                </td>';
                    var joining_date = '';
                    if (value.joining_date !== null && value.joining_date !== '') {
                        joining_date = value.joining_date;
                    }
                    table_data += '<tr id="tr_' + value.user_id + '">\n\
                                    <td>' + x + '</td>\n\
                                    <td>' + value.name + '</td>\n\
                                    <td>' + value.code + '</td>\n\
                                    <td>' + value.introducer_code + '</td>\n\
                                    <td>' + value.mobile_no + '</td>\n\
                                    <td>' + joining_date + '</td>\n\
                                    <td>' + value.kyc_status + '</td>\n\
                                    <td>' + value.org_password + '</td>\n\
                                    ' + action_td + '\n\
                                </tr>';
                    x++;
                });
                table_data += '</tbody>';
                $("#associate_order_list").html(table_data);
                generateDataTable('associate_order_list');
                hideLoader();
            }
            else {
                hideLoader();
            }

        }
    });
}

function changeTransactionPassword(e, user_id) {
    e.preventDefault();
    $('#change_transaction_password_' + user_id).css('display', 'none');
    $('#change_transaction_password_form_' + user_id).css('display', 'block');
    $('#url_path_' + user_id).val('change-agent-transaction-password');
}
function changePassword(e, user_id) {
    e.preventDefault();
    $('#change_password_' + user_id).css('display', 'none');
    $('#change_transaction_password_form_' + user_id).css('display', 'block');
    $('#url_path_' + user_id).val('change-agent-password');
}

function changePasswordSubmit(e, user_id) {
    $("#change_transaction_password_form_" + user_id).submit(function (e) {
        e.preventDefault();
        var password_frm = $("#change_transaction_password_form_" + user_id);
        password_frm.validate({
            rules: {
                password: {
                    minlength: 8
                },
            },
            errorPlacement: function errorPlacement(error, element) {
                element.before(error);
            }
        });
        if ($("#change_transaction_password_form_" + user_id).valid()) {
            var path_url = $('#url_path_' + user_id).val();
            var password = document.getElementById('password_' + user_id);
            if (password.value == '') {
                password.focus();
                return false;
            }
            var url = base_url + path_url;
            $.ajax({
                url: url,
                type: 'post',
                //dataType: 'json',
                data: {
                    user_id: user_id,
                    password: password.value
                },
                success: function (response) {
                    if (response.status == 'success') {
                        showSwal('success', 'Change Password ', response.data);
                        changePasswordCancel(e, user_id);
                    }
                    else {
                        showSwal('error', 'Password Not Changed ', 'Password not changed');

                    }
                }
            });
        }
    });
}//end function

function changePasswordCancel(e, user_id) {
    e.preventDefault();
    $('#change_transaction_password_' + user_id).css('display', '');
    $('#change_password_' + user_id).css('display', '');
    $('#change_transaction_password_form_' + user_id).css('display', 'none');
    document.getElementById('change_transaction_password_form_' + user_id).reset();
    //getAgentsList();

}

function changeAgentStatus(e, user_id) {
    e.preventDefault();
    var url = base_url + 'change-agent-status';
    $.ajax({
        url: url,
        type: 'post',
        data: {
            user_id: user_id
        },
        success: function (response) {
            if (response.status == 'success') {
                showSwal('success', 'Status Changed', response.data);
                //getAgentsList();
                $('#change_agent_status_' + user_id).removeClass('text-success');
                $('#change_agent_status_' + user_id).removeClass('text-danger');
                if (response.chk_status == '1') {
                    $('#change_agent_status_' + user_id).addClass('text-success');
                }
                if (response.chk_status == '0') {
                    $('#change_agent_status_' + user_id).addClass('text-danger');
                }
            }
        }
    });
}

function changeBVStatus(e, user_id, bv_status) {
    e.preventDefault();
    var bvs = '1';
    if (bv_status == '1') {
        bvs = '2';
    } else if (bv_status == '2') {
        bvs = '3';
    } else if (bv_status == '3') {
        bvs = '1';
    }
    $.ajax({
        url: base_url + 'change-bv-status',
        type: 'post',
        data: {
            user_id: user_id,
            bv_status: bvs
        },
        success: function (response) {
            if (response.status == 'success') {
                showSwal('success', 'Status Changed', response.data);
                $('#change_bv_status_' + user_id).removeClass('text-danger');
                $('#change_bv_status_' + user_id).removeClass('text-warning');
                $('#change_bv_status_' + user_id).removeClass('text-success');
                if (response.bv_status == '1') {
                    $('#change_bv_status_' + user_id).addClass('text-danger');
                } else if (response.bv_status == '2') {
                    $('#change_bv_status_' + user_id).addClass('text-warning');
                } else if (response.bv_status == '3') {
                    $('#change_bv_status_' + user_id).addClass('text-success');
                }
                $('#change_bv_status_' + user_id).attr('onclick', "changeBVStatus(event, " + user_id + ", '" + response.bv_status + "')");
            }
        }
    });
}