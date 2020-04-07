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
if (user_type == 'ADMIN' && agent_user_id && agent_user_id != '' && agent_user_email && agent_user_email != ''){
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
        }

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
                        if (response.status == 'success') {
                            var profile = response.data.profile;
                            var bank = response.data.bank_detail[0];
                            var nominee = response.data.nominee_detail[0];
                            var kyc = response.data.kyc_detail[0];
                            var business = response.data.business;
                            $('#introducer_code').val(profile.introducer_code);
                            $('#orientation').val(profile.orientation);
                            //$('#signature').val(profile.signature);
                            //$('#photo').val(profile.photo);
                            $('#associate_name').val(profile.associate_name);
                            $('#profile_user').html(profile.associate_name);
                            $('#user_code').html(profile.username);
                            if (response.data.kyc_status == 1) {
                                $('#kyc_status').html('KYC Done');
                            }
                            else {
                                $('#kyc_status').html('KYC Pending');
                            }
                            //$('#address').val(profile.address);
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
                            //month = (month < 10) ? '0' + month : month
                            var year = datetime.getFullYear();
                            var formatted_date = day + "-" + month + "-" + year;
                            $('#dob').val(formatted_date);
                            $('#kyc_dob').val(formatted_date);
                            $('#mobile_no').val(profile.mobile_no);
                            $('#profile_phone').html(profile.mobile_no);
                            //$('#secondary_mobile_no').val(profile.secondary_mobile_no);
                            $('#land_line_phone').val(profile.land_line_phone);
                            $('#marital_status').val(profile.marital_status);
                            $('#occupation').val(profile.occupation);
                            $('#koccupation').val(profile.occupation);
                            $('#state').val(profile.state);
                            $('#city').html(getCitiesList(profile.state));
                            $('#city').val(profile.city);
                            $('#pin_code').val(profile.pin_code);
                            if (kyc.adhar) {
                                $('#adhar').val(kyc.adhar);
                                $('#adhar').prop('disabled', true);
                            }
                            //$('#pan_number').val(profile.pan);
                            $('#email').val(profile.email);
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
                                $('#signature_upload').css('display', 'block');

                            }
                            if (profile.transaction_password) {
                                disableTransactionPassword();
                            }
                            //show rank leftbusiness rightbusiness
                            if(business.total_left_business)
                            {
                                $('#total_left_business').html(business.total_left_business);
                            }
                            if(business.total_right_business)
                            {
                                $('#total_right_business').html(business.total_right_business);
                            }
                            if(business.matching_amount)
                            {
                                $('#matching_business').html(business.matching_amount);
                            }
                            if(business.designation)
                            {
                                $('#rank').html(business.designation);
                            }

                            //bank detalis
                            $('#bank_id').val(bank.id);
                            $('#bank_id').prop('disabled', true);
                            $('#payee_name').val(bank.payee_name);
                            $('#payee_name').prop('disabled', true);
                            $('#bank_name').val(bank.bank_name);
                            $('#bank_name').prop('disabled', true);
                            $('#account_number').val(bank.account_number);
                            $('#account_number').prop('disabled', true);
                            $('#branch').val(bank.branch);
                            $('#branch').prop('disabled', true);
                            $('#ifsc_code').val(bank.ifsc_code);
                            $('#ifsc_code').prop('disabled', true);
                            if (bank.cancel_cheque != null) {
                                var bank_cheque = media_url + 'cancel_cheque/' + bank.cancel_cheque;
                                $('#cancel_cheque_uploded').attr('src', bank_cheque);
                                $('#cancel_cheque_uploded').css('display', 'block');
                                $('#cancel_cheque').prop('disabled', true);
                            }

                            //nominee
                            $('#nominee_id').val(nominee.id);
                            $('#nominee_id').prop('disabled', true);
                            $('#nominee_name').val(nominee.nominee_name);
                            $('#nominee_name').prop('disabled', true);
                            //$('#father_name').val(nominee.father_husband_name);
                            //$('#father_name').prop('disabled', true);
                            //$('#mother_name').val(nominee.mothers_name);
                            //$('#mother_name').prop('disabled', true);
                            $('#nominee_age').val(nominee.nominee_age);
                            $('#nominee_age').prop('disabled', true);
                            $('#relation').val(nominee.relation);
                            $('#relation').prop('disabled', true);
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
                            $('#ndob').prop('disabled', true);
                            //kyc
                            $('#kyc_id').val(kyc.id);
                            /* var kyc_dob = kyc.dob;
                             var datetime = new Date(kyc_dob);
                             var day = datetime.getDate();
                             day = (day < 10) ? '0' + day : day;
                             var month = datetime.getMonth() + 1;
                             month = (month < 10) ? '0' + month : month
                             var year = datetime.getFullYear();
                             var formatted_date = day + "-" + month + "-" + year;
                             $('#kyc_dob').val(formatted_date);
                             $('#kyc_dob').prop('disabled', true);*/
                            if (kyc.nationality) {
                                $('#nationality').val(kyc.nationality);
                                $('#nationality').prop('disabled', true);
                            }
                            if (kyc.occupation) {
                                $('#koccupation').val(kyc.occupation);
                                $('#koccupation').prop('disabled', true);
                            }
                            if (kyc.qualification) {
                                $('#qualification').val(kyc.qualification);
                                $('#qualification').prop('disabled', true);
                            }
                            if (kyc.pan_number) {
                                $('#pan_number').val(kyc.pan_number);
                                $('#pan_number').prop('disabled', true);
                            }
                            if (kyc.passport_number) {
                                $('#passport_number').val(kyc.passport_number);
                                $('#passport_number').prop('disabled', true);
                            }
                            if (kyc.driving_licence_number) {
                                $('#driving_licence_number').val(kyc.driving_licence_number);
                                $('#driving_licence_number').prop('disabled', true);
                            }
                            if (kyc.proposed_area_of_work) {
                                $('#proposed_area_of_work').val(kyc.proposed_area_of_work);
                                $('#proposed_area_of_work').prop('disabled', true);
                            }
                            if (kyc.voter_id) {
                                $('#voter_id').val(kyc.voter_id);
                                $('#voter_id').prop('disabled', true);
                            }
                            if (kyc.join_date) {

                                var userjoin_date = kyc.join_date;
                                var joindatetime = new Date(userjoin_date);
                                var joinday = joindatetime.getDate();
                                joinday = (joinday < 10) ? '0' + joinday : joinday;
                                var joinmonth = MonthArr[joindatetime.getMonth()];
                                var joinyear = ndatetime.getFullYear();
                                var join_date = joinday + "-" + joinmonth + "-" + joinyear;
                                $('#join_date').val(join_date);
                                $('#join_date').prop('disabled', true);
                            }

                            if (kyc.adhar) {
                                $('#adhar_number').val(kyc.adhar);
                                $('#adhar_number').prop('disabled', true);
                            }
                            if (kyc.adhar_image) {
                                var image = media_url + 'id_proof/' + kyc.adhar_image;
                                $('#adhar_upload').attr('src', image);
                                $('#adhar_upload').css('display', 'block');
                                $('#adhar_image').prop('disabled', true);
                            }
                            if (kyc.pan_image) {
                                var image = media_url + 'id_proof/' + kyc.pan_image;
                                $('#pan_upload').attr('src', image);
                                $('#pan_upload').css('display', 'block');
                                $('#pan_image').prop('disabled', true);
                            }
                            if (kyc.passport_image) {
                                var image = media_url + 'id_proof/' + kyc.passport_image;
                                $('#passport_upload').attr('src', image);
                                $('#passport_upload').css('display', 'block');
                                $('#passport_image').prop('disabled', true);
                            }
                            if (kyc.driving_licence_image) {
                                var image = media_url + 'id_proof/' + kyc.driving_licence_image;
                                $('#driving_upload').attr('src', image);
                                $('#driving_upload').css('display', 'block');
                                $('#driving_licence_image').prop('disabled', true);
                            }
                            if (kyc.voter_image) {
                                var image = media_url + 'id_proof/' + kyc.voter_image;
                                $('#voter_upload').attr('src', image);
                                $('#voter_upload').css('display', 'block');
                                $('#voter_image').prop('disabled', true);
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
                            error_html += '<div class="alert alert-primary" role="alert">Photo Uploaded successfully</div>';
                        } else {
                            error_html += '<div class="alert alert-warning" role="alert">Photo could not be saved</div>';
                        }
                        $('#errors_div').html(error_html);
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
    var cities_list_html = '<option>-- Select One --</option>';
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
