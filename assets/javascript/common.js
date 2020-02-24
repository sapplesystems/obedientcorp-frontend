var error_html = '';
var state_list;
if (UserCookieData.id != "" && UserCookieData.email != "") {
    var user_id = UserCookieData.id;
    var user_email = UserCookieData.email;
}
$(document).ready(function () {
    $.post('http://localhost/obedientcorp/public/api/state-city-list', {}, function (resp) {
        if (resp.status == 'success') {
            state_list = resp.data.list;
            var state_list_html = '<option value="">-- Select One --</option>';
            $.each(state_list, function (key, val) {
                state_list_html += '<option value="' + val.state.id + '">' + val.state.state + '</option>';
            });
            $('#state').html(state_list_html);
            $.ajax({
                method: "POST",
                url: "http://localhost/obedientcorp/public/api/profile",
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
                        $('#dob').val(profile.dob);
                        $('#kyc_dob').val(profile.dob);
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
                        $('#ndob').val(nominee.ndob);

                        $('#kyc_id').val(kyc.id);
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