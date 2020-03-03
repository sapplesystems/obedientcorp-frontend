var error_html = '';
var state_list;
var today = new Date();
var todays_date = today.getDate() + '-' + (today.getMonth() + 1) + '-' + today.getFullYear();
if (UserCookieData.id != "" && UserCookieData.email != "") {
    var user_id = UserCookieData.id;
    var user_left_node_id = UserCookieData.left_node_id;
    var user_right_node_id = UserCookieData.right_node_id;
    var user_email = UserCookieData.email;
}
$(document).ready(function () {
    $(":input").inputmask();
    if ($(".datepicker").length) {
        $('.datepicker').datepicker({
            enableOnReadonly: true,
            todayHighlight: true,
            format: 'dd-mm-yyyy',
            autoclose: true,
            endDate: todays_date
        });
    }

    $.post(base_url + 'state-city-list', {}, function (resp) {
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
                    id: user_id,
                    email: user_email
                },
                success: function (response) {
                    console.log(response);
                    if (response.status == 'success') {
                        var profile = response.data.profile;
                        var bank = response.data.bank_detail[0];
                        var nominee = response.data.nominee_detail[0];
                        var kyc = response.data.kyc_detail[0];
                        $('#introducer_code').val(profile.introducer_code);
                        $('#orientation').val(profile.orientation);
                        //$('#signature').val(profile.signature);
                        //$('#photo').val(profile.photo);
                        $('#associate_name').val(profile.associate_name);
                        $('#profile_user').html(profile.associate_name);
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
                        var month = datetime.getMonth() + 1;
                        month = (month < 10) ? '0' + month : month
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
                        $('#pan').val(profile.pan);
                        $('#pan_number').val(profile.pan);
                        $('#email').val(profile.email);
                        $('#profile_mail').html(profile.email);
                        $('#username').val(profile.username);
                        if (profile.photo) {
                            var photo_src = 'http://localhost/obedientcorp/public/uploads/profile_photo/' + profile.photo;
                            $('#profile_image').attr('src', photo_src);
                            //$('#application_photo').attr('src',photo_src);
                            //$('#application_photo').css('display', 'block');
                        }

                        $('#bank_id').val(bank.id);
                        $('#payee_name').val(bank.payee_name);
                        $('#bank_name').val(bank.bank_name);
                        $('#account_number').val(bank.account_number);
                        $('#branch').val(bank.branch);
                        $('#ifsc_code').val(bank.ifsc_code);

                        $('#nominee_id').val(nominee.id);
                        $('#nominee_name').val(nominee.nominee_name);
                        $('#father_name').val(nominee.father_husband_name);
                        $('#mother_name').val(nominee.mothers_name);
                        $('#nominee_age').val(nominee.nominee_age);
                        $('#relation').val(nominee.relation);
                        var ndob = nominee.ndob;
                        var ndatetime = new Date(ndob);
                        var nday = ndatetime.getDate();
                        nday = (nday < 10) ? '0' + nday : nday;
                        var nmonth = ndatetime.getMonth() + 1;
                        nmonth = (nmonth < 10) ? '0' + nmonth : nmonth
                        var nyear = ndatetime.getFullYear();
                        var ndate = nday + "-" + nmonth + "-" + nyear;
                        $('#ndob').val(ndate);

                        $('#kyc_id').val(kyc.id);
                        var kyc_dob = kyc.dob;
                        var datetime = new Date(kyc_dob);
                        var day = datetime.getDate();
                        day = (day < 10) ? '0' + day : day;
                        var month = datetime.getMonth() + 1;
                        month = (month < 10) ? '0' + month : month
                        var year = datetime.getFullYear();
                        var formatted_date = day + "-" + month + "-" + year;
                        $('#kyc_dob').val(formatted_date);
                        $('#nationality').val(kyc.nationality);
                        $('#occupation').val(kyc.occupation);
                        $('#qualification').val(kyc.qualification);
                        $('#pan_number').val(kyc.pan_number);
                        $('#passport_number').val(kyc.passport_number);
                        $('#driving_licence_number').val(kyc.driving_licence_number);
                        $('#proposed_area_of_work').val(kyc.proposed_area_of_work);
                        $('#voter_id').val(kyc.voter_id);
                        var kyc_join_date = kyc.join_date;
                        var datetime = new Date(kyc_join_date);
                        var day = datetime.getDate();
                        day = (day < 10) ? '0' + day : day;
                        var month = datetime.getMonth() + 1;
                        month = (month < 10) ? '0' + month : month
                        var year = datetime.getFullYear();
                        var formatted_date = day + "-" + month + "-" + year;
                        $('#join_date').val(formatted_date);
                    }
                },
                error: function (response) {
                    alert('something went wrong - ' + response);
                }
            });
        } else {
            alert('something went wrong');
        }
    });

    $(document).on('change', '#state', function (e) {
        e.preventDefault();
        var state_id = $(this).val();
        if (state_id) {
            $('#city').html(getCitiesList(state_id));
        }
    });
});

function getCitiesList(state_id) {
    var cities_list_html = '<option>-- Select One --</option>';
    $.each(state_list[state_id].cities, function (key, val) {
        cities_list_html += '<option value="' + val.id + '">' + val.city + '</option>';
    });
    return cities_list_html;
}