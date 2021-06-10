getStatesCities();
var photo_image = '';
var state_list;
$(document).ready(function () {

    if ($('#distributor_id').val() && $('#distributor_id').val() != '') {
        updatedistributor($('#distributor_id').val());
    }

    $(document).on('change', '#pan_image', function () {
        $('#pan_image-error').css('display', 'none');
    });
    $(document).on('change', '#gst_image', function () {
        $('#gst_image-error').css('display', 'none');
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
            var dist_type = $('#test4').val();
            if ($('#test3').is(':checked') == true) {
                dist_type = $('#test3').val();
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
            var profile_photo = $('#photo')[0].files[0];
            console.log(profile_photo);
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
            params.append('profile_image', profile_photo);
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


    $("#photo").change(function () {
        showLoader();
        var fileName = document.getElementById("photo").files[0];
        var distributor_id = $('#distributor_id').val();
        var params = new FormData();
        if (fileName) {
            params.append("profile_image", fileName);
            params.append("id", distributor_id);
            $.ajax({
                method: "POST",
                url: base_url + 'distributor/update',
                data: params,
                processData: false,
                contentType: false,
                success: function (response) {
                    error_html = '';
                    if (response.status == 'success') {
                        $.post('../localapi.php', {
                            udpate_distributor_photo: true,
                            photo: response.data.image
                        }, function (resp) {
                            $('#user_photo').attr('src',  media_url + 'distributors/' + response.data.image);
                            showSwal('success', 'Photo Saved', 'Photo Uploaded successfully');
                        });
                    } else {
                        showSwal('error', 'Failed', 'Photo could not be saved');
                    }
                    hideLoader();
                },
                error: function (response) {
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
            });
        }
    });


});//document ready

function update_or_insert_distributor(params) {
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
                showSwal('success', 'Distributor Update Profile', 'Distributor profile updated successfully');
                window.location.href = 'profile-update';
                //getdistributorList();
                hideLoader();
            } else {
                showSwal('error', 'Distributor Not Update', 'Distributor not profile updated');
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

//function for edit distributor details
function updatedistributor(distributor_id) {
    //e.preventDefault();
    showLoader();
    $.ajax({
        url: base_url + 'distributor/detail',
        type: 'post',
        data: { id: distributor_id },
        success: function (response) {
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
                $('#dist_name').html(data.name);
                if (data.org_password) {
                    $('.passwrd').css('display', 'none');
                }
                //$('#confirm_passowrd').val(data.org_password);
                if (data.type == '1') {
                    $('#test3').prop('checked', true);
                } else if (data.type == '0') {
                    $('#test4').prop('checked', true);
                }
                if (data.state) {

                    setTimeout(function () {
                        $('#states').val(data.state);
                        $('#city').html(getCitiesList(data.state));
                        if (data.city) {
                            $('#city').val(data.city);
                        }
                    }, 1000);

                }
                if (data.image) {

                    var photo_src = media_url + 'distributors/' + data.image;
                    $('#profilePic').attr('src', photo_src);
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
                if (data.code) {
                    $('#dist_code').css('display', '')
                    $('#dist_code').prop('readOnly', true);
                    $('#dist_code').val(data.code);
                }
                if (data.username) {
                    $('#username').css('display', '')
                    $('#username').prop('readOnly', true);
                    $('#username').val(data.username);
                    $('#dist_username').html(data.username);
                }
                hideLoader();
            }
        }
    });
}//End function for edit distributor details

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

function getCitiesList(state_id) {
    var cities_list_html = '<option>-- Select One --</option>';
    $.each(state_list[state_id].cities, function (key, val) {
        cities_list_html += '<option value="' + val.id + '">' + val.city + '</option>';
    });
    return cities_list_html;
}