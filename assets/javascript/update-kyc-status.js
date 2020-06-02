var kyc_status;
$(document).ready(function () {

    if ($('#associate_id').val() != '' && $('#associate_id').val())
    {
        getAssociateKycDetails($('#associate_id').val());
        getBankDetails($('#associate_id').val());
    }

    $('#reject').click(function () {
        kyc_status = 'Rejected';
        showSwal('warning-message-and-cancel');
        $('.payment_action').click(function () {
            var comment = $('#payment_comment').val();
            if (comment == '') {
                $('#payment_comment').focus();
                return false;
            }
            updateKycStatus();
        });
        return false;
    });
    $('#approve').click(function () {
        kyc_status = 'Approved';
        showSwal('warning-message-and-cancel');
        $('.payment_action').click(function () {
            var comment = $('#payment_comment').val();
            if (comment == '') {
                $('#payment_comment').focus();
                return false;
            }
            updateKycStatus();
        });
        return false;
    });

});

function getAssociateKycDetails(agent_id)
{
    var url = base_url + 'agent-kyc-detail';
    $.ajax({
        url: url,
        type: 'post',
        data: {
            user_id: agent_id,
        },
        success: function (response) {
            if (response.status == 'success') {
                var path = '';
                var status = 'Not Available'
                if (response.data[0].kyc_status != null && response.data[0].kyc_status != '' && response.data[0].kyc_status != "undefined")
                {
                    $('#kyc-status').html(response.data[0].kyc_status);
                    if (response.data[0].kyc_status == 'Approved') {
                        $('#kyc-status').addClass('text-success');
                    } else if (response.data[0].kyc_status == 'Rejected') {
                        $('#kyc-status').addClass('text-danger');
                    } else if (response.data[0].kyc_status == 'Pending') {
                        $('#kyc-status').addClass('text-info');
                    } else if (response.data[0].kyc_status == 'Submitted') {
                        $('#kyc-status').addClass('text-warning');
                    }
                }
                else
                {
                    $('#kyc-status').html(status);
                }
                if (response.data[0].adhar != null && response.data[0].adhar != '' && response.data[0].adhar != "undefined")
                {
                    $('#aadhaar_number').html(response.data[0].adhar);
                }
                else
                {
                    $('#aadhaar_number').html(status);
                }
                if (response.data[0].pan_number != null && response.data[0].pan_number != '' && response.data[0].pan_number != "undefined")
                {
                    $('#pan_number').html(response.data[0].pan_number);
                }
                else
                {
                    $('#pan_number').html(status);
                }
                if (response.data[0].passport_number != null && response.data[0].passport_number != '' && response.data[0].passport_number != "undefined")
                {
                    $('#passport_number').html(response.data[0].passport_number);
                }
                else
                {
                    $('#passport_number').html(status);
                }
                if (response.data[0].driving_licence_number != null && response.data[0].driving_licence_number != '' && response.data[0].driving_licence_number != "undefined")
                {
                    $('#dl_number').html(response.data[0].driving_licence_number);
                }
                else
                {
                    $('#dl_number').html(status);
                }
                if (response.data[0].voter_id != null && response.data[0].voter_id != '' && response.data[0].voter_id != "undefined")
                {
                    $('#voter_id').html(response.data[0].voter_id);
                }
                else
                {
                    $('#voter_id').html(status);
                }
                //images
                if (response.data[0].adhar_image != "undefined" && response.data[0].adhar_image != null && response.data[0].adhar_image != '')
                {
                    path = media_url + 'id_proof/' + response.data[0].adhar_image;
                    $('#aadhar_image1').attr('src', path);
                    $('#aadhar_upload1').attr('href', path);
                }
                else
                {
                    $('#status-adhar1').html('<span>' + status + '</span>');
                }
                if (response.data[0].adhar_image_2 != "undefined" && response.data[0].adhar_image_2 != null && response.data[0].adhar_image_2 != '')
                {
                    path = media_url + 'id_proof/' + response.data[0].adhar_image_2;
                    $('#aadhar_image2').attr('src', path);
                    $('#aadhar_upload2').attr('href', path);
                }
                else
                {
                    $('#status-adhar2').html('<span>' + status + '</span>');
                }
                if (response.data[0].pan_image != "undefined" && response.data[0].pan_image != null && response.data[0].pan_image != '')
                {
                    path = media_url + 'id_proof/' + response.data[0].pan_image;
                    $('#pancard_image1').attr('src', path);
                    $('#pancard_upload1').attr('href', path);
                }
                else
                {
                    $('#status-pan').html('<span>' + status + '</span>');
                }
                if (response.data[0].passport_image != "undefined" && response.data[0].passport_image != null && response.data[0].passport_image != '')
                {
                    path = media_url + 'id_proof/' + response.data[0].passport_image;
                    $('#passport_image1').attr('src', path);
                    $('#passport_upload1').attr('href', path);
                }
                else
                {
                    $('#status-pass1').html('<span>' + status + '</span>');
                }
                if (response.data[0].passport_image_2 != "undefined" && response.data[0].passport_image_2 != null && response.data[0].passport_image_2 != '')
                {
                    path = media_url + 'id_proof/' + response.data[0].passport_image_2;
                    $('#passport_image2').attr('src', path);
                    $('#passport_upload2').attr('href', path);
                }
                else
                {
                    $('#status-pass2').html('<span>' + status + '</span>');
                }
                if (response.data[0].driving_licence_image != "undefined" && response.data[0].driving_licence_image != null && response.data[0].driving_licence_image != '')
                {
                    path = media_url + 'id_proof/' + response.data[0].driving_licence_image;
                    $('#dl_image1').attr('src', path);
                    $('#dl_upload1').attr('href', path);
                }
                else
                {
                    $('#status-dl1').html('<span>' + status + '</span>');
                }
                if (response.data[0].driving_licence_image_2 != "undefined" && response.data[0].driving_licence_image_2 != null && response.data[0].driving_licence_image_2 != '')
                {
                    path = media_url + 'id_proof/' + response.data[0].driving_licence_image_2;
                    $('#dl_image2').attr('src', path);
                    $('#dl_upload2').attr('href', path);
                }
                else
                {
                    $('#status-dl2').html('<span>' + status + '</span>');
                }

                if (response.data[0].voter_image != "undefined" && response.data[0].voter_image != null && response.data[0].voter_image != '')
                {
                    path = media_url + 'id_proof/' + response.data[0].voter_image;
                    $('#voter_image1').attr('src', path);
                    $('#voter_upload1').attr('href', path);
                }
                else
                {
                    $('#status-voter1').html('<span>' + status + '</span>');
                }

            }
            else {

                showSwal('error', 'No Records Found');
            }
        }
    });
}//end function

function updateKycStatus()
{
    var url = base_url + 'admin-kyc-action';
    $.ajax({
        url: url,
        type: 'post',
        //dataType: 'json',
        data: {
            user_id: $('#associate_id').val(),
            kyc_status: kyc_status,
            kyc_comment: $('#payment_comment').val(),
        },
        success: function (response) {
            if (response.status == 'success') {
                showSwal('success', 'Change Status ', response.data);
                location.href = 'associate-list';
            }
            else
            {
                showSwal('error', 'Change Status ', response.data);
            }
        }
    });
}

function getBankDetails(user_id)
{
    var url = base_url + 'bank-detail';
    $.ajax({
        url: url,
        type: 'post',
        data: {
            user_id: user_id,
        },
        success: function (response) {
            console.log(response);
            if (response.status == 'success') {
                var data = 'Not Available';
                if (response.data[0].payee_name != "undefined" && response.data[0].payee_name != null && response.data[0].payee_name != '')
                {
                    $('#payee-name').html(response.data[0].payee_name);
                } else {
                    $('#payee-name').html(data);
                }

                if (response.data[0].bank_name != "undefined" && response.data[0].bank_name != null && response.data[0].bank_name != '')
                {
                    $('#bank-name').html(response.data[0].bank_name);
                } else {
                    $('#bank-name').html(data);
                }

                if (response.data[0].account_number != "undefined" && response.data[0].account_number != null && response.data[0].account_number != '')
                {
                    $('#ac-number').html(response.data[0].account_number);
                } else {
                    $('#ac-number').html(data);
                }
                if (response.data[0].branch != "undefined" && response.data[0].branch != null && response.data[0].branch != '')
                {
                    $('#branch').html(response.data[0].branch);
                } else {
                    $('#branch').html(data);
                }

                if (response.data[0].ifsc_code != "undefined" && response.data[0].ifsc_code != null && response.data[0].ifsc_code != '')
                {
                    $('#ifsc-code').html(response.data[0].ifsc_code);
                } else {
                    $('#ifsc-code').html(data);
                }
                if (response.data[0].cancel_cheque != "undefined" && response.data[0].cancel_cheque != null && response.data[0].cancel_cheque != '')
                {
                    path = media_url + 'cancel_cheque/' + response.data[0].cancel_cheque;
                    $('#bank_copy').attr('src', path);
                    $('#bnk-copy').attr('href', path);
                } else {
                    $('#cancel_cheque').html('<span>' + data + '</span>');
                }
            }
            else
            {
                showSwal('error', 'Change Status ', response.data);
            }
        }
    });

}