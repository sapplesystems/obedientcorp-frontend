getStatesCities();
getdistributorList();
var photo_image = '';
var state_list;
$(document).ready(function () {
    
    if ($('#distributor_id').val() && $('#distributor_id').val() != '') {
        updatedistributor($('#distributor_id').val());
    }

    $(document).on('change', '#pan_image', function () {
        $('#pan_image-error').css('display','none');
    });
    $(document).on('change', '#gst_image', function () {
        $('#gst_image-error').css('display','none');
    });

    //listing of city 
    $(document).on('change', '#states', function (e) {
        e.preventDefault();
        var state_id = $(this).val();
        if (state_id) {
            $('#city').html(getCitiesList(state_id));
        }
    });

    //form submit 
    $("#distributor_add_form_submit").submit(function (e) {
        if ($('#distributor_id').val() && $('#distributor_id').val() != '') {

            $('#pan_image').removeClass('required');
            $('#gst_image').removeClass('required');
        }
        e.preventDefault();
        var distributor_frm = $("#distributor_add_form_submit");
        distributor_frm.validate({
            rules: {
                mobile: {
                    minlength: 10,
                    maxlength: 10,
                },
                confirm_password: {
                    equalTo: "#password"
                  },
            },
            messages: {
                confirm_password: "Confirm password same as Password",
              },
            errorPlacement: function errorPlacement(error, element) {
                element.before(error);
            }
        });

        if ($("#distributor_add_form_submit").valid()) {
            showLoader();
            var params = new FormData();
            var distributor = $('#distributorname').val();
            var dist_type = $('#head_no').val();
            if ($('#head_yes').is(':checked') == true) {
                dist_type = $('#head_yes').val();
            }
            var firm_name = $('#firm_name').val();
            var contact_name = $('#contact_name').val();
            var mobile = $('#mobile').val();
            var email = $('#email').val();
            var distributor_address = $('#distributor_address').val();
            var pin_code = $('#pin_code').val();
            var states = $('#states').val();
            var city = $('#city').val();
            var pan_number = $('#pan_number').val();
            var pan_image = $('#pan_image')[0].files[0];
            var gst_number = $('#gst_number').val();
            var gst_image = $('#gst_image')[0].files[0];
            var password = $('#password').val();
            var confirm_passowrd = $('#confirm_passowrd').val();
            //var created_by = user_id; 
            params.append('name', distributor);
            params.append('type', dist_type);
            params.append('firm_name', firm_name);
            params.append('contact_name', contact_name);
            params.append('mobile_no', mobile);
            params.append('email', email);
            params.append('address', distributor_address);
            params.append('city', city);
            params.append('state', states);
            params.append('pincode', pin_code);
            params.append('pan_no', pan_number);
            params.append('pan_img', pan_image);
            params.append('gst_no', gst_number);
            params.append('gst_img', gst_image);
            params.append('org_password', password);
            update_or_insert_distributor(params);

        }//end if
    });

    //email validation on blur
    $('#email').blur(function () {
        var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        if (testEmail.test(this.value) == false) {
            $('#emailid-error').css('display', 'block');
            $('#emailid-error').css({
                "color": "#fe7c96",
                "display": "inline-block",
                "font-size": "0.875rem"
            });
        }
        else {
            $('#emailid-error').css('display', 'none');
        }
    });


});//document ready

function update_or_insert_distributor(params) {
    var url = base_url + 'distributor/create';
    var distributor_id = $('#distributor_id').val();
    if (distributor_id) {
        params.append('id', distributor_id);
        url = base_url + 'distributor/update';
    }
    $.ajax({
        url: url,
        type: 'post',
        data: params,
        contentType: false,
        processData: false,
        success: function (response) {
            error_html = '';
            if (response.status == 'success') {
                showSwal('success', 'Distributor Added', 'Distributor added successfully');
                if($('#distributor_id').val()=='') {
                    document.getElementById('distributor_add_form_submit').reset();
                }
               
                $('#mapphoto_id,#photo_id').attr('src', '');
                $('#mapphoto_id,#photo_id').css('display', 'none');
                window.location.href = 'manage-distributor';
                //getdistributorList();
                hideLoader();
            } else {
                showSwal('error', 'Distributor Not Added', 'Distributor not added successfully');
                hideLoader();
            }

            $('#errors_div').html(error_html);

        },
        error: function (response) {
            console.log(response);
            error_html = '';
            var error_object = JSON.parse(response.responseText);
            var message = error_object.message;
            var errors = error_object.errors;
            $.each(errors, function (key, value) {
                error_html += '<div class="alert alert-danger" role="alert">' + value[0] + '</div>';
            });
            $('#errors_div').html(error_html);
            hideLoader();
        }
    });//ajax

}//end update_or_insert_function

//get all distributor list
function getdistributorList() {
    showLoader();
    $.ajax({
        url: base_url + 'distributor/list',
        type: 'post',
        data: {},
        success: function (response) {
            var html = '<thead>\n\
            <tr>\n\
            <th>Sr.No.</th>\n\
                <th>Distributor Name</th>\n\
                <th>Distributor Code</th>\n\
                <th>Firm Name</th>\n\
                <th>Contact Name</th>\n\
                <th>Email</th>\n\
                <th>Is Head Quator</th>\n\
                <th>Status</th>\n\
                <th>Action</th>\n\
            </tr>\n\
        </thead><tbody>';
            if (response.status == "success") {
                var i = 1;
                var x = 1;
                $.each(response.data, function (key, value) {
                    var edit_url='';
                    var action_td = '';
                    var status = "Inactive";
                    var type = 'No';
                    var change_agent_status = 'text-danger';
                    if(value.status == 1)
                    {
                        status = "Active";
                        change_agent_status = 'text-success';
                    }
                    if(value.type == 1)
                    {
                        type = "Yes";
                    }
                    if(user_type =="ADMIN")
                    {
                        edit_url = 'add-distributor.php?distributor_id=' + value.id;
                        action_td = '<td>\n\
                        <a href="' + edit_url + '"> <i class="mdi mdi-pencil text-info"></i></a>\n\
                        <a href="javascript:void(0);" onclick="deletedistributor(event, ' + value.id + ');"><i class="mdi mdi-delete text-danger"></i>\n\
                        </a>\n\
                        <i class="mdi mdi-check-circle ' + change_agent_status + '" id="change_dist_status_' + value.id + '" onclick="changeDistributorStatus(event, ' + value.id + ');" title="Activate/Deactivate Distributor " ></i>\n\
                        <form class="form-inline" style="display:none;" name="change_password_form_' + value.id + '" id="change_password_form_' + value.id + '" method="post">\n\
                        <input type="password" class="required" name="password" id="password_' + value.id + '" placehoder="Password"/>\n\
                        <input type="hidden" name="path" value="" id="url_path_' + value.id + '"/>\n\
                        <button type="submit" class="btn btn-gradient-success btn-sm" onclick="changePasswordSubmit(event, ' + value.id + ');">Submit</button>&nbsp;\n\
                        <button type="submit" class="btn btn-gradient-danger btn-sm" onclick="changePasswordCancel(event, ' + value.id + ');">Cancel</button>\n\
                    </form>\n\
                        <a href="javascript:void(0);" id="change_password_' + value.id + '" onclick="changePassword(event,' + value.id + ');" title="Change Login Password"><i class="mdi mdi-key text-warning"></i>\n\
                        </td>';
                    }
                    
                    html += '<tr id="tr_' + value.id + '" role="row" >\n\
                                <td class="sorting_1">' + i + '</td>\n\
                                <td>' + value.name + '</td>\n\
                                <td>' + value.code + '</td>\n\
                                <td>' + value.firm_name + '</td>\n\
                                <td>' + value.contact_name + '</td>\n\
                                <td>' + value.email + '</td>\n\
                                <td>' + type + '</td>\n\
                                <td>' + status + '</td>\n\
                                '+ action_td + '\n\
                            </tr>';
                    i = i + 1;
                    x++;
                });
                html+='</tbody>';
                $('#distributor-list').html(html);
                generateDataTable('distributor-list');
                hideLoader();
            }
        }
    });
}//function end all distributor list

//function for edit distributor details
function updatedistributor(distributor_id) {
    //e.preventDefault();
    showLoader();
    $.ajax({
        url: base_url + 'distributor/detail',
        type: 'post',
        data: { id: distributor_id },
        success: function (response) {
            console.log(response);
            if (response.status == "success") {
                var data = response.data;
                $('#distributor_id').val(distributor_id);
                $('#distributorname').val(data.name);
                $('#firm_name').val(data.firm_name);
                $('#contact_name').val(data.contact_name);
                $('#mobile').val(data.mobile_no);
                $('#email').val(data.email);
                $('#distributor_address').val(data.address);
                $('#pin_code').val(data.pincode);
                $('#password').val(data.org_password);
                if(data.org_password)
                {
                   $('.passwrd').css('display','none'); 
                }
                //$('#confirm_passowrd').val(data.org_password);
                if (data.type == '1') {
                    $('#head_yes').prop('checked', true);
                } else if (data.type == '0') {
                    $('#head_no').prop('checked', true);
                }
               if(data.state)
                {
                    
                    setTimeout(function(){ 
                        $('#states').val(data.state); 
                        $('#city').html(getCitiesList(data.state));
                    if (data.city) {
                       $('#city').val(data.city);
                    }
                    }, 1000);
                   
                }
                $('#pan_number').val(data.pan_no);
                if (data.pan_img) {
                    var photo_src = media_url + 'distributors/' + data.pan_img;
                    $('#upload_pan').attr('src', photo_src);
                    $('#upload_pan').css('display', 'block');
                }
                else {
                    $('#photo_id').attr('src', '');
                    $('#photo_id').css('display', 'none');
                }
                $('#gst_number').val(data.gst_no);
                if (data.gst_img) {
                    var photo_src = media_url + 'distributors/' + data.gst_img;
                    $('#upload_gst').attr('src', photo_src);
                    $('#upload_gst').css('display', 'block');
                }
                else {
                    $('#photo_id').attr('src', '');
                    $('#photo_id').css('display', 'none');
                }
                if(data.code)
                {
                    $('#dist_code').css('display','')
                    $('#dist_code').prop('readOnly',true);
                    $('#dist_code').val(data.code);
                }
                if(data.username)
                {
                    $('#username').css('display','')
                    $('#username').prop('readOnly',true);
                    $('#username').val(data.username);
                }
                hideLoader();
            }
        }
    });
}//End function for edit distributor details

//function for delete distributor 
function deletedistributor(e, distributor_id) {
    e.preventDefault();
    showLoader();
    var result = confirm("Are you sure you want to delete this distributor?");
    if (result == true) {
        $.ajax({
            url: base_url + 'distributor/delete',
            type: 'post',
            data: { id: distributor_id },
            success: function (response) {
                if (response.status == "success") {
                    getdistributorList();
                    //$("#tr_" + project_id).remove();

                }
                hideLoader();
            }
        });
    }
}//end function for delete distributor

//get states ans cities onlaod page
function getStatesCities() {
    var url = base_url + 'state-city-list';
    $.ajax({
        url: url,
        type: 'post',
        dataType: 'json',
        //data: params,
        success: function (response) {
            if (response.status == "success") {
                state_list = response.data.list;
                var states = '<option value="">-- Select State--</option>';
                $.each(state_list, function (key, value) {
                    states += '<option value="' + value.state.id + '">' + value.state.state + '</option>';
                });
                $("#states").html(states);
            }

        }
    }); //ajax
} //end function for get states and cities

function changeDistributorStatus(e, dist_id,status) {
    e.preventDefault();
    var url = base_url + 'distributor/distributorstatus';
    $.ajax({
        url: url,
        type: 'post',
        data: {
            id: dist_id
        },
        success: function (response) {
            console.log(response)
            if (response.status == 'success') {
                showSwal('success', 'Status Changed', response.data);
                getdistributorList();
                $('#change_dist_status_' + dist_id).removeClass('text-success');
                $('#change_dist_status_' + dist_id).removeClass('text-danger');
                if (response.chk_status == '1') {
                    $('#change_dist_status_' + dist_id).addClass('text-success');
                }
                if (response.chk_status == '0') {
                    $('#change_dist_status_' + dist_id).addClass('text-danger');
                }
            }
        }
    });
}

function getCitiesList(state_id) {
    var cities_list_html = '<option>-- Select One --</option>';
    $.each(state_list[state_id].cities, function (key, val) {
        cities_list_html += '<option value="' + val.id + '">' + val.city + '</option>';
    });
    return cities_list_html;
}

function changePassword(e, user_id) {
    e.preventDefault();
    $('#change_password_' + user_id).css('display', 'none');
    $('#change_password_form_' + user_id).css('display', 'block');
   //$('#url_path_' + user_id).val('change-agent-password');
}

function changePasswordSubmit(e, user_id) {
    $("#change_password_form_" + user_id).submit(function (e) {
        e.preventDefault();
        var password_frm = $("#change_password_form_" + user_id);
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
        if ($("#change_password_form_" + user_id).valid()) {
            var password = document.getElementById('password_' + user_id);
            if (password.value == '') {
                password.focus();
                return false;
            }
            var url = base_url + 'distributor/admin-change-password';
            $.ajax({
                url: url,
                type: 'post',
                //dataType: 'json',
                data: {
                    distributor_id: user_id,
                    password: password.value
                },
                success: function (response) {
                    if (response.status == 'success') {
                        showSwal('success', 'Change Password ', response.data);
                        getdistributorList();
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
    $('#change_password_' + user_id).css('display', '');
    $('#change_password_form_' + user_id).css('display', 'none');
    document.getElementById('change_password_form_' + user_id).reset();
    //getAgentsList();

}