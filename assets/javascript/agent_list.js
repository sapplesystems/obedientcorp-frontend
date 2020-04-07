getAgentsList();

$(document).ready(function () {
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
                var table_data = '';
                //table_data += '<tbody>';
                $.each(response.data, function (key, value) {
                    cb_status = '';
                    if (value.is_activated == '1') {
                        cb_status = 'checked';
                    }
                    action_td = '<td>\n\
                    <div class="float-left">\n\
                    <a href="profile.php?user_id=' + value.user_id + '&user_email=' + value.email + '" title="Edit Agent Detail"><i class="mdi mdi-pencil text-info"></i></a> &nbsp\n\
                    </div>\n\
                    <div class="float-left">\n\
                        <input class="tgl tgl-skewed" id="cb' + value.user_id + '" type="checkbox" ' + cb_status + ' onclick="changeAgentStatus(event, ' + value.user_id + ');"/>\n\
                        <label class="tgl-btn" data-tg-off="Deactive" data-tg-on="Active" for="cb' + value.user_id + '"></label>\n\
                    </div>\n\
                    <div class="float-left ml-3">\n\
                        <a href="javascript:void(0);" id="change_transaction_password_' + value.user_id + '" onclick="changeTransactionPassword(event, ' + value.user_id + ');" title="Change Transaction Password"><i class="mdi mdi-lock"></i></a>\n\
                        <form class="form-inline" style="display:none;" name="change_transaction_password_form_' + value.user_id + '" id="change_transaction_password_form_' + value.user_id + '" method="post">\n\
                            <input type="password" class="required" name="password" id="password_'+ value.user_id + '" placehoder="Password"/>\n\
                            <input type="hidden" name="path" value="" id="url_path_'+ value.user_id + '"/>\n\
                            <button type="submit" class="btn btn-gradient-success btn-sm" onclick="changePasswordSubmit(event, ' + value.user_id + ');">Submit</button>&nbsp;\n\
                            <button type="submit" class="btn btn-gradient-danger btn-sm" onclick="changePasswordCancel(event, ' + value.user_id + ');">Cancel</button>\n\
                        </form>\n\
                    </div>\n\
                    <div class="float-left ml-3">\n\
                        <a href="javascript:void(0);" id="change_password_' + value.user_id + '" onclick="changePassword(event,' + value.user_id + ');" title="Change Login Password"><i class="mdi mdi-key"></i></a>\n\
                    </div>\n\
                </td>';
                    table_data += '<tr id="tr_' + value.id + '">\n\
                                    <td>' + x + '</td>\n\
                                    <td>' + value.name + '</td>\n\
                                    <td>' + value.code + '</td>\n\
                                    <td>' + value.introducer_code + '</td>\n\
                                    <td>' + value.mobile_no + '</td>\n\
                                    <td>' + value.joining_date + '</td>\n\
                                    ' + action_td + '\n\
                                </tr>';
                    x++;
                });
                //table_data += '</tbody>';
                $("#agents_list").html(table_data);
                initDataTable('agents_list');
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
                        getAgentsList();
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
    getAgentsList();

}

function changeAgentStatus(e, user_id) {
    e.preventDefault();
    var url = base_url + 'change-agent-status';
    $.ajax({
        url: url,
        type: 'post',
        //dataType: 'json',
        data: {
            user_id: user_id
        },
        success: function (response) {
            if (response.status == 'success') {
                showSwal('success', 'Change Status ', response.data);
                getAgentsList();
            }
        }
    });

}

