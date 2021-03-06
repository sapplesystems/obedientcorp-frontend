var error_html = '';
var state_list;
var today = new Date();
var todays_date = today.getDate() + '-' + (today.getMonth() + 1) + '-' + today.getFullYear();
/*if (UserCookieData.id != "" && UserCookieData.email != "") {
 var user_id = UserCookieData.id;
 var user_left_node_id = UserCookieData.left_node_id;
 var user_right_node_id = UserCookieData.right_node_id;
 var user_email = UserCookieData.email;
 }*/

var user_profile_id = user_id;
var user_profile_email = user_email;
if (user_type == 'ADMIN' && agent_user_id && agent_user_id != '') { //  && agent_user_email && agent_user_email != ''
    user_profile_id = agent_user_id;
    user_profile_email = agent_user_email;
}
$(document).ready(function () {
    getRelationships();
    $(":input").inputmask();
    if ($(".datepicker").length) {
        $('.datepicker').datepicker({
            enableOnReadonly: true,
            todayHighlight: true,
            format: 'dd-M-yyyy',
            autoclose: true,
            endDate: todays_date,
            //defaultViewDate: new Date()
        });
        $('#dob').change(function () {
            $(this).valid();  // triggers the validation test        
        });
        $('#ndob').change(function () {
            $(this).valid();  // triggers the validation test        
        });
    }

    //get age 
    $(document).on('change', '#ndob', function () {
        var value = $(this).val();
        var today = new Date(),
                dob = new Date(value),
                age = new Date(today - dob).getFullYear() - 1970;
        $('#nominee_age').val(age);
        $('#nominee_age').prop('readOnly', true);
        $('#nominee_age-error').css('display', 'none');
    });

    $.post(base_url + 'state-city-list', {}, function (resp) {
        showLoader();
        if (resp.status == 'success') {
            state_list = resp.data.list;
            var state_list_html = '<option value="">-- Select One --</option>';
            $.each(state_list, function (key, val) {
                state_list_html += '<option value="' + val.state.id + '">' + val.state.state + '</option>';
            });
            $('#state').html(state_list_html);
            $.ajax({
                method: "POST",
                url: base_url + 'profile',
                data: {
                    id: user_profile_id,
                    email: user_profile_email
                },
                success: function (response) {
                    console.log(response);
                    if (response.status == 'success') {
                        var profile = response.data.profile;
                        var bank = response.data.bank_detail[0];
                        var nominee = response.data.nominee_detail[0];
                        var kyc = response.data.kyc_detail[0];
                        var business = response.data.business;
                        $('#introducer_code').val(profile.introducer_code);
                        $('#orientation').val(profile.orientation);
                        $('#associate_name').val(profile.associate_name);
                        $('#profile_user').html(profile.associate_name);
                        $('#user_code').html(profile.username);
                        if (kyc.kyc_status) {
                            $('#kyc_status').html('KYC ' + kyc.kyc_status);
                            if (kyc.kyc_status == 'Approved') {
                                $('#kyc_status').addClass('text-success');
                            } else if (kyc.kyc_status == 'Rejected') {
                                $('#kyc_status').addClass('text-danger');
                            } else if (kyc.kyc_status == 'Submitted') {
                                $('#kyc_status').addClass('text-warning');
                            }
                        }
                        $('#house_no').val(profile.house_no);
                        $('#block').val(profile.block);
                        $('#sector').val(profile.sector);
                        $('#street_no').val(profile.street_no);
                        $('#village_colony').val(profile.village_colony);
                        $('#post_office_or_sub_city').val(profile.post_office_or_sub_city);
                        $('#father_or_husband_name').val(profile.father_or_husband_name);
                        $('#mothers_name').val(profile.mothers_name);
                        $('#gender').val(profile.gender);
                        var dob = profile.dob;
                        var datetime = new Date(dob);
                        var day = datetime.getDate();
                        day = (day < 10) ? '0' + day : day;
                        var month = MonthArr[datetime.getMonth()];
                        var year = datetime.getFullYear();
                        var formatted_date = day + "-" + month + "-" + year;
                        $('#dob').val(formatted_date);
                        $('#kyc_dob').val(formatted_date);
                        $('#mobile_no').val(profile.mobile_no);
                        $('#profile_phone').html(profile.mobile_no);
                        $('#land_line_phone').val(profile.land_line_phone);
                        $('#marital_status').val(profile.marital_status);
                        $('#occupation').val(profile.occupation);
                        $('#koccupation').val(profile.occupation);
                        if (profile.kyc_status == 'Approved'){
                            $('#associate_name').prop('disabled', true);
                            $('#father_or_husband_name').prop('disabled', true);
                            $('#mothers_name').prop('disabled', true);
                            $('#gender').prop('disabled', true);
                            $('#dob').prop('disabled', true);
                        }
                        if (profile.state) {
                            $('#state').val(profile.state);
                            $('#city').html(getCitiesList(profile.state));
                            if (profile.city) {
                                $('#city').val(profile.city);
                            }
                        }
                        $('#pin_code').val(profile.pin_code);
                        if (kyc.adhar) {
                            $('#adhar').val(kyc.adhar);
                            $('#adhar').prop('disabled', true);
                        }
                        if (profile.email) {
                            $('#email').val(profile.email);
                        }
                        $('#profile_mail').html(profile.email);
                        $('#username').val(profile.username);
                        var photo_src = "assets/images/default-img.png"
                        if (profile.photo) {
                            photo_src = media_url + 'profile_photo/' + profile.photo;
                        }
                        $("#imagePreview").css("background-image", "url(" + photo_src + ")");
                        if (profile.signature) {
                            var signature = media_url + 'profile_photo/' + profile.signature;
                            $('#signature_upload').attr('src', signature);
                            $('#a_signature_upload').attr('href', signature);
                            $('#signature_upload').css('display', 'block');

                        }
                        if (profile.transaction_password) {
                            disableTransactionPassword();
                        }
                        //show rank leftbusiness rightbusiness
                        if (business.total_left_business) {
                            $('#total_left_business').html(business.total_left_business);
                        }
                        if (business.total_right_business) {
                            $('#total_right_business').html(business.total_right_business);
                        }
                        if (business.matching_amount) {
                            $('#matching_business').html(business.matching_amount);
                        }
                        if (business.designation) {
                            $('#rank,#current_rank').html(business.designation);
                            $('#next_rank').html(business.next_designation);
                            $('#business_progress_bar').css('width', business.percentage + '%');
                            $('#business_progress_bar_percentage').css('left', business.percentage + '%');
                            $('#business_progress_bar_percentage').html(business.percentage + '%');
                        }

                        //bank detalis
                        setBankDetails(bank, kyc.kyc_status);
                        //nominee
                        setNomineeDetails(nominee);
                        //kyc
                        setKYCDetail(kyc);
                        if (kyc.kyc_status == 'Approved') {
                            $('#kyc_detail_status').html('<i class="mdi mdi-check-circle-outline text-success"></i>');
                        }
                        else {
                            $('#kyc_detail_status').html('<i class="mdi mdi-adjust text-danger"></i>');
                        }

                        checkForBankSaveButton(bank);
                        checkForNomineeSaveButton(nominee);
                        checkForKYCSaveButton(kyc);
                        if (user_type == 'ADMIN') {
                            $('#bank_update_submit').css('display', '');
                            $('#nominee_update_submit').css('display', '');
                            $('#kyc_update_submit').css('display', '');
                        }
                        if (kyc.kyc_status == 'Rejected') {
                            $('#bank_update_submit').css('display', '');
                            $('#kyc_update_submit').css('display', '');
                        }
                        hideLoader();
                    }
                },
                error: function (response) {
                    alert('something went wrong - ' + response);
                    hideLoader();
                }
            });
        } else {
            alert('something went wrong');
            hideLoader();
        }
    });

    $(document).on('change', '#state', function (e) {
        e.preventDefault();
        var state_id = $(this).val();
        if (state_id) {
            $('#city').html(getCitiesList(state_id));
        }
    });

    $(".imageUpload").change(function () {
        readURL(this);
        showLoader();
        var fileName = document.getElementById("imageUpload").files[0];
        var id = user_id;
        var params = new FormData();
        if (fileName) {
            params.append("photo", fileName);
            params.append("id", id);
            $.ajax({
                method: "POST",
                url: base_url + 'profile/update',
                data: params,
                processData: false,
                contentType: false,
                success: function (response) {
                    error_html = '';
                    if (response.status == 'success') {
                        $.post('localapi.php', {
                            udpate_photo: true,
                            photo: response.data.photo
                        }, function (resp) {
                            $('#user_photo').attr('src', media_url + 'profile_photo/' + response.data.photo);
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


function disableTransactionPassword() {
    $('.transaction-password').css('display', 'none');
    $('#transaction_password').css('display', 'none');
    $('#transaction_password').prop('disabled', true);
    $('#transaction_password').prop('readonly', true);


}
function getCitiesList(state_id) {
    var cities_list_html = '<option value="">-- Select One --</option>';
    $.each(state_list[state_id].cities, function (key, val) {
        cities_list_html += '<option value="' + val.id + '">' + val.city + '</option>';
    });
    return cities_list_html;
}


function getRelationships() {
    var url = base_url + 'relationships';
    $.ajax({
        url: url,
        type: 'post',
        //dataType: 'json',
        //data: params,
        success: function (response) {
            if (response.status == "success") {
                var relation = '<option value="">--Select One Relation--</option>';
                $.each(response.data, function (key, value) {
                    relation += '<option value="' + value.name + '">' + value.name + '</option>';
                });
                $("#relation").html(relation);
            }

        }
    });
}

function checkForBankSaveButton(v) {
    if (v.payee_name == '' || v.payee_name == null) {
        if ($('#associate_name').val()) {
            $('#payee_name').val($('#associate_name').val());
        }
        $('#bank_update_submit').css('display', '');
        $('#bank_detail_status').html('<i class="mdi mdi-adjust text-danger"></i>');
    } else if (v.bank_name == '' || v.bank_name == null) {
        $('#bank_update_submit').css('display', '');
        $('#bank_detail_status').html('<i class="mdi mdi-adjust text-danger"></i>');
    } else if (v.account_number == '' || v.account_number == null) {
        $('#bank_update_submit').css('display', '');
        $('#bank_detail_status').html('<i class="mdi mdi-adjust text-danger"></i>');
    } else if (v.branch == '' || v.branch == null) {
        $('#bank_update_submit').css('display', '');
        $('#bank_detail_status').html('<i class="mdi mdi-adjust text-danger"></i>');
    } else if (v.ifsc_code == '' || v.ifsc_code == null) {
        $('#bank_update_submit').css('display', '');
        $('#bank_detail_status').html('<i class="mdi mdi-adjust text-danger"></i>');
    } else if (v.cancel_cheque == '' || v.cancel_cheque == null) {
        $('#bank_update_submit').css('display', '');
        $('#bank_detail_status').html('<i class="mdi mdi-adjust text-danger"></i>');
    }
    else {
        $('#bank_update_submit').css('display', 'none');
        $('#bank_detail_status').html('<i class="mdi mdi-check-circle-outline text-success"></i>');
    }



}

function checkForNomineeSaveButton(v) {
    if (v.nominee_name == '' || v.nominee_name == null) {
        $('#nominee_update_submit').css('display', '');
        $('#nominee_status').html('<i class="mdi mdi-adjust text-danger"></i>');
    } else if (v.relation == '' || v.relation == null) {
        $('#nominee_update_submit').css('display', '');
        $('#nominee_status').html('<i class="mdi mdi-adjust text-danger"></i>');
    } else if (v.ndob == '' || v.ndob == null) {
        $('#nominee_update_submit').css('display', '');
        $('#nominee_status').html('<i class="mdi mdi-adjust text-danger"></i>');
    } else if (v.nominee_age == '' || v.nominee_age == null) {
        $('#nominee_update_submit').css('display', '');
        $('#nominee_status').html('<i class="mdi mdi-adjust text-danger"></i>');
    }
    else {
        $('#nominee_update_submit').css('display', 'none');
        $('#nominee_status').html('<i class="mdi mdi-check-circle-outline text-success"></i>');
    }
}

function checkForKYCSaveButton(v) {
    if (v.nationality == '' || v.nationality == null) {
        $('#kyc_update_submit').css('display', '');
    } else if (v.occupation == '' || v.occupation == null) {
        $('#kyc_update_submit').css('display', '');
    } else if (v.qualification == '' || v.qualification == null) {
        $('#kyc_update_submit').css('display', '');
    } else if (v.pan_number == '' || v.pan_number == null) {
        $('#kyc_update_submit').css('display', '');
    } else if (v.passport_number == '' || v.passport_number == null) {
        $('#kyc_update_submit').css('display', '');
    } else if (v.driving_licence_number == '' || v.driving_licence_number == null) {
        $('#kyc_update_submit').css('display', '');
    } else if (v.proposed_area_of_work == '' || v.proposed_area_of_work == null) {
        $('#kyc_update_submit').css('display', '');
    } else if (v.voter_id == '' || v.voter_id == null) {
        $('#kyc_update_submit').css('display', '');
    } else if (v.adhar == '' || v.adhar == null) {
        $('#kyc_update_submit').css('display', '');
    } else if (v.adhar_image == '' || v.adhar_image == null) {
        $('#kyc_update_submit').css('display', '');
    } else if (v.pan_image == '' || v.pan_image == null) {
        $('#kyc_update_submit').css('display', '');
    } else if (v.passport_image == '' || v.passport_image == null) {
        $('#kyc_update_submit').css('display', '');
    } else if (v.driving_licence_image == '' || v.driving_licence_image == null) {
        $('#kyc_update_submit').css('display', '');
    } else if (v.voter_image == '' || v.voter_image == null) {
        $('#kyc_update_submit').css('display', '');
    } else if (v.join_date == '' || v.join_date == null) {
        $('#kyc_update_submit').css('display', '');
    } else {
        $('#kyc_update_submit').css('display', 'none');
    }


}

function setKYCDetail(kyc) {
    $('#kyc_id').val(kyc.id);
    if (kyc.kyc_status == 'Rejected') {
        $('#kyc_rejected_messsage').html(kyc.kyc_comment);
    }
    if (kyc.nationality) {
        $('#nationality').val(kyc.nationality);
        if (user_type != 'ADMIN' && kyc.kyc_status != 'Rejected')
            $('#nationality').prop('disabled', true);
    }
    if (kyc.occupation) {
        $('#koccupation').val(kyc.occupation);
        if (user_type != 'ADMIN' && kyc.kyc_status != 'Rejected')
            $('#koccupation').prop('disabled', true);
    }
    if (kyc.qualification) {
        $('#qualification').val(kyc.qualification);
        if (user_type != 'ADMIN' && kyc.kyc_status != 'Rejected')
            $('#qualification').prop('disabled', true);
    }
    if (kyc.pan_number) {
        $('#pan_number').val(kyc.pan_number);
        if (user_type != 'ADMIN' && kyc.kyc_status != 'Rejected')
            $('#pan_number').prop('disabled', true);
    }
    if (kyc.passport_number) {
        $('#passport_number').val(kyc.passport_number);
        if (user_type != 'ADMIN' && kyc.kyc_status != 'Rejected')
            $('#passport_number').prop('disabled', true);
    }
    if (kyc.driving_licence_number) {
        $('#driving_licence_number').val(kyc.driving_licence_number);
        if (user_type != 'ADMIN' && kyc.kyc_status != 'Rejected')
            $('#driving_licence_number').prop('disabled', true);
    }
    if (kyc.proposed_area_of_work) {
        $('#proposed_area_of_work').val(kyc.proposed_area_of_work);
        if (user_type != 'ADMIN' && kyc.kyc_status != 'Rejected')
            $('#proposed_area_of_work').prop('disabled', true);
    }
    if (kyc.voter_id) {
        $('#voter_id').val(kyc.voter_id);
        if (user_type != 'ADMIN' && kyc.kyc_status != 'Rejected')
            $('#voter_id').prop('disabled', true);
    }
    if (kyc.join_date) {

        var userjoin_date = kyc.join_date;
        var joindatetime = new Date(userjoin_date);
        var joinday = joindatetime.getDate();
        joinday = (joinday < 10) ? '0' + joinday : joinday;
        var joinmonth = MonthArr[joindatetime.getMonth()];
        var joinyear = joindatetime.getFullYear();
        var join_date = joinday + "-" + joinmonth + "-" + joinyear;
        $('#join_date').val(join_date);
        $('#join_date').prop('disabled', true);
    }

    if (kyc.adhar) {
        $('#adhar_number').val(kyc.adhar);
        $('#adhar_number').removeClass('required');
        if (user_type != 'ADMIN' && kyc.kyc_status != 'Rejected')
            $('#adhar_number').prop('disabled', true);
    }
    if (kyc.adhar_image) {
        var file = kyc.adhar_image;
        var ext = file.substr((file.lastIndexOf('.') + 1));
        var image = media_url + 'id_proof/' + kyc.adhar_image;
        if (ext == 'pdf') {
            $('#adhar_upload_pdf').html('<a target="_blank" href="' + image + '"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>');
        } else {
            $('#adhar_upload').attr('src', image);
            $('#a_adhar_upload').attr('href', image);
            $('#adhar_upload').css('display', 'block');
            $('#adhar_image').removeClass('required');
        }
        if (user_type != 'ADMIN' && kyc.kyc_status != 'Rejected')
            $('#adhar_image').prop('disabled', true);
    }
    if (kyc.adhar_image_2) {
        var file = kyc.adhar_image_2;
        var ext = file.substr((file.lastIndexOf('.') + 1));
        var image = media_url + 'id_proof/' + kyc.adhar_image_2;
        if (ext == 'pdf') {
            $('#adhar_upload2_pdf').html('<a target="_blank" href="' + image + '"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>');
        } else {
            $('#adhar_upload2').attr('src', image);
            $('#a_adhar_upload2').attr('href', image);
            $('#adhar_upload2').css('display', 'block');
            $('#adhar_image2').removeClass('required');
        }
        if (user_type != 'ADMIN' && kyc.kyc_status != 'Rejected')
            $('#adhar_image2').prop('disabled', true);
    }
    if (kyc.pan_image) {
        var file = kyc.pan_image;
        var ext = file.substr((file.lastIndexOf('.') + 1));
        var image = media_url + 'id_proof/' + kyc.pan_image;
        if (ext == 'pdf') {
            $('#pan_upload_pdf').html('<a target="_blank" href="' + image + '"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>');
        } else {
            $('#pan_upload').attr('src', image);
            $('#a_pan_upload').attr('href', image);
            $('#pan_upload').css('display', 'block');
        }
        if (user_type != 'ADMIN' && kyc.kyc_status != 'Rejected')
            $('#pan_image').prop('disabled', true);
    }
    if (kyc.passport_image) {
        var file = kyc.passport_image;
        var ext = file.substr((file.lastIndexOf('.') + 1));
        var image = media_url + 'id_proof/' + kyc.passport_image;
        if (ext == 'pdf') {
            $('#passport_upload_pdf').html('<a target="_blank" href="' + image + '"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>');
        } else {
            $('#passport_upload').attr('src', image);
            $('#a_passport_upload').attr('href', image);
            $('#passport_upload').css('display', 'block');
        }
        if (user_type != 'ADMIN' && kyc.kyc_status != 'Rejected')
            $('#passport_image').prop('disabled', true);
    }
    if (kyc.passport_image_2) {
        var file = kyc.passport_image_2;
        var ext = file.substr((file.lastIndexOf('.') + 1));
        var image = media_url + 'id_proof/' + kyc.passport_image_2;
        if (ext == 'pdf') {
            $('#passport_upload2_pdf').html('<a target="_blank" href="' + image + '"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>');
        } else {
            $('#passport_upload2').attr('src', image);
            $('#a_passport_upload2').attr('href', image);
            $('#passport_upload2').css('display', 'block');
        }
        if (user_type != 'ADMIN' && kyc.kyc_status != 'Rejected')
            $('#passport_image2').prop('disabled', true);
    }
    if (kyc.driving_licence_image) {
        var file = kyc.driving_licence_image;
        var ext = file.substr((file.lastIndexOf('.') + 1));
        var image = media_url + 'id_proof/' + kyc.driving_licence_image;
        if (ext == 'pdf') {
            $('#driving_upload_pdf').html('<a target="_blank" href="' + image + '"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>');
        } else {
            $('#driving_upload').attr('src', image);
            $('#a_driving_upload').attr('href', image);
            $('#driving_upload').css('display', 'block');
        }
        if (user_type != 'ADMIN' && kyc.kyc_status != 'Rejected')
            $('#driving_licence_image').prop('disabled', true);
    }
    if (kyc.driving_licence_image_2) {
        var file = kyc.driving_licence_image_2;
        var ext = file.substr((file.lastIndexOf('.') + 1));
        var image = media_url + 'id_proof/' + kyc.driving_licence_image_2;
        if (ext == 'pdf') {
            $('#driving_upload2_pdf').html('<a target="_blank" href="' + image + '"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>');
        } else {
            $('#driving_upload2').attr('src', image);
            $('#a_driving_upload2').attr('href', image);
            $('#driving_upload2').css('display', 'block');
        }
        if (user_type != 'ADMIN' && kyc.kyc_status != 'Rejected')
            $('#driving_licence_image2').prop('disabled', true);
    }
    if (kyc.voter_image) {
        var file = kyc.voter_image;
        var ext = file.substr((file.lastIndexOf('.') + 1));
        var image = media_url + 'id_proof/' + kyc.voter_image;
        if (ext == 'pdf') {
            $('#voter_upload_pdf').html('<a target="_blank" href="' + image + '"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>');
        } else {
            $('#voter_upload').attr('src', image);
            $('#a_voter_upload').attr('href', image);
            $('#voter_upload').css('display', 'block');
        }
        if (user_type != 'ADMIN' && kyc.kyc_status != 'Rejected')
            $('#voter_image').prop('disabled', true);
    }
}

function setNomineeDetails(nominee) {
    $('#nominee_id').val(nominee.id);
    if (nominee.nominee_name != null && nominee.nominee_name) {
        $('#nominee_name').val(nominee.nominee_name);
        if (user_type != 'ADMIN')
            $('#nominee_name').prop('disabled', true);
    }
    if (nominee.nominee_age != null && nominee.nominee_age) {
        $('#nominee_age').val(nominee.nominee_age);
        if (user_type != 'ADMIN')
            $('#nominee_age').prop('disabled', true);
    }
    if (nominee.relation != null && nominee.relation) {
        $('#relation').val(nominee.relation);
        if (user_type != 'ADMIN')
            $('#relation').prop('disabled', true);
    }
    if (nominee.ndob != null && nominee.ndob) {
        var ndob = nominee.ndob;
        var ndatetime = new Date(ndob);
        var nday = ndatetime.getDate();
        nday = (nday < 10) ? '0' + nday : nday;
        //var nmonth = ndatetime.getMonth() + 1;
        var nmonth = MonthArr[ndatetime.getMonth()];
        //nmonth = (nmonth < 10) ? '0' + nmonth : nmonth
        var nyear = ndatetime.getFullYear();
        var ndate = nday + "-" + nmonth + "-" + nyear;
        $('#ndob').val(ndate);
        if (user_type != 'ADMIN')
            $('#ndob').prop('disabled', true);
    }

}

function setBankDetails(bank, kyc_status) {
    $('#bank_id').val(bank.id);
    if (bank.payee_name != null && bank.payee_name) {
        $('#payee_name').val(bank.payee_name);
        if (user_type != 'ADMIN' && kyc_status != 'Rejected')
            $('#payee_name').prop('disabled', true);
    }
    if (bank.bank_name != null && bank.bank_name) {
        $('#bank_name').val(bank.bank_name);
        if (user_type != 'ADMIN' && kyc_status != 'Rejected')
            $('#bank_name').prop('disabled', true);
    }
    if (bank.account_number != null && bank.account_number) {
        $('#account_number').val(bank.account_number);
        if (user_type != 'ADMIN' && kyc_status != 'Rejected')
            $('#account_number').prop('disabled', true);
    }
    if (bank.branch != null && bank.branch) {
        $('#branch').val(bank.branch);
        if (user_type != 'ADMIN' && kyc_status != 'Rejected')
            $('#branch').prop('disabled', true);
    }
    if (bank.ifsc_code != null && bank.ifsc_code) {
        $('#ifsc_code').val(bank.ifsc_code);
        if (user_type != 'ADMIN' && kyc_status != 'Rejected')
            $('#ifsc_code').prop('disabled', true);
    }
    if (bank.cancel_cheque != null && bank.cancel_cheque) {
        var file = bank.cancel_cheque;
        var ext = file.substr((file.lastIndexOf('.') + 1));
        var bank_cheque = media_url + 'cancel_cheque/' + bank.cancel_cheque;
        if (ext == 'pdf') {
            $('#cancel_cheque_uploded_pdf').html('<a target="_blank" href="' + bank_cheque + '"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>');
        } else {
            $('#cancel_cheque_uploded').attr('src', bank_cheque);
            $('#a_cancel_cheque_uploded').attr('href', bank_cheque);
            $('#cancel_cheque_uploded').css('display', 'block');
            $('#is_cancel_cheque_uploaded').val(bank.cancel_cheque);
        }
        if (user_type != 'ADMIN' && kyc_status != 'Rejected')
            $('#cancel_cheque').prop('disabled', true);
    }

}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}