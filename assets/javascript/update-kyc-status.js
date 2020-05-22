
$(document).ready(function () {

    if($('#associate_id').val()!='' && $('#associate_id').val())
    {
        getAssociateKycDetails($('#associate_id').val());
    }

    $('#reject').click(function(){

        updateKycStatus('Rejected');
    });
    $('#approve').click(function(){

        updateKycStatus('Approved');
    });
    $('#back').click(function(){

        location.href='associate-list';
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
            console.log(response);
            if (response.status == 'success') {
                var path ='';
                var status = 'Not Available'
                if(response.data[0].kyc_status && response.data[0].kyc_status!='')
                {
                    $('#kyc-status').html(response.data[0].kyc_status);
                }
                else
                {
                    $('#kyc-status').html(status);
                }
                if(response.data[0].adhar && response.data[0].adhar!='')
                {
                    $('#aadhaar_number').html(response.data[0].adhar);
                }
                else
                {
                    $('#aadhaar_number').html(status);
                }
                if(response.data[0].pan_number && response.data[0].pan_number!='')
                {
                    $('#pan_number').html(response.data[0].pan_number);
                }
                else
                {
                    $('#pan_number').html(status);
                }
                if(response.data[0].passport_number && response.data[0].passport_number!='')
                {
                    $('#passport_number').html(response.data[0].passport_number);
                }
                else
                {
                    $('#passport_number').html(status);
                }
                if(response.data[0].driving_licence_number && response.data[0].driving_licence_number!='')
                {
                    $('#dl_number').html(response.data[0].driving_licence_number);
                }
                else
                {
                    $('#dl_number').html(status);
                }
                if(response.data[0].voter_id && response.data[0].voter_id!='')
                {
                    $('#voter_id').html(response.data[0].voter_id);
                }
                else
                {
                    $('#voter_id').html(status);
                }
                //images
                if(response.data[0].adhar_image && response.data[0].adhar_image!=null && response.data[0].adhar_image!='')
                {
                    path = media_url +'id_proof/'+response.data[0].adhar_image;
                    $('#aadhar_image1').attr('src',path);
                    $('#aadhar_upload1').attr('href',path);
                }
                else
                {
                    $('#status-adhar1').html('<span>'+status+'</span>');
                }
                if(response.data[0].adhar_image_2 && response.data[0].adhar_image_2!=null && response.data[0].adhar_image_2!='')
                {
                    path = media_url +'id_proof/'+response.data[0].adhar_image_2;
                    $('#aadhar_image2').attr('src',path);
                    $('#aadhar_upload2').attr('href',path);
                }
                else
                {
                    $('#status-adhar2').html('<span>'+status+'</span>');
                }
                if(response.data[0].pan_image && response.data[0].pan_image!=null && response.data[0].pan_image!='')
                {
                    path = media_url +'id_proof/'+response.data[0].pan_image;
                    $('#pancard_image1').attr('src',path);
                    $('#pancard_upload1').attr('href',path);
                }
                else
                {
                    $('#status-pan').html('<span>'+status+'</span>');
                }
                if(response.data[0].passport_image && response.data[0].passport_image!=null && response.data[0].passport_image!='')
                {
                    path = media_url +'id_proof/'+response.data[0].passport_image;
                    $('#passport_image1').attr('src',path);
                    $('#passport_upload1').attr('href',path);
                }
                else
                {
                    $('#status-pass1').html('<span>'+status+'</span>');
                }
                if(response.data[0].passport_image_2 &&response.data[0].passport_image_2!=null && response.data[0].passport_image_2!='')
                {
                    path = media_url +'id_proof/'+response.data[0].passport_image_2;
                    $('#passport_image2').attr('src',path);
                    $('#passport_upload2').attr('href',path);
                }
                else
                {
                    $('#status-pass2').html('<span>'+status+'</span>');
                }
                if(response.data[0].driving_licence_image && response.data[0].driving_licence_image!=null && response.data[0].driving_licence_image!='')
                {
                    path = media_url +'id_proof/'+response.data[0].driving_licence_image;
                    $('#dl_image1').attr('src',path);
                    $('#dl_upload1').attr('href',path);
                }
                else
                {
                    $('#status-dl1').html('<span>'+status+'</span>');
                }
                if(response.data[0].driving_licence_image_2 && response.data[0].driving_licence_image_2!=null && response.data[0].driving_licence_image_2!='')
                {
                    path = media_url +'id_proof/'+response.data[0].driving_licence_image_2;
                    $('#dl_image2').attr('src',path);
                    $('#dl_upload2').attr('href',path);
                }
                else
                {
                    $('#status-dl2').html('<span>'+status+'</span>');
                }

                if(response.data[0].voter_image && response.data[0].voter_image!=null && response.data[0].voter_image!='')
                {
                    path = media_url +'id_proof/'+response.data[0].voter_image;
                    $('#voter_image1').attr('src',path);
                    $('#voter_upload1').attr('href',path);
                } 
                else
                {
                    $('#status-voter1').html('<span>'+status+'</span>');
                }
                
            }
            else {
                
                    showSwal('error','No Records Found');
            }
        }
    });
}//end function

function updateKycStatus(status)
{
    var url = base_url + 'admin-kyc-action ';
    var agent_id = $('#associate_id').val();
    $.ajax({
        url: url,
        type: 'post',
        //dataType: 'json',
        data: {
            user_id: agent_id,
            kyc_status:status
        },
        success: function (response) {
            if (response.status == 'success') {
                showSwal('success', 'Change Status ', response.data);
                location.href='associate-list';
            }
            else
            {
                showSwal('error', 'Change Status ', response.data); 
            }
        }
    });
}