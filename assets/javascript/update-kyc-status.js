
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
                if(response.data[0].kyc_status)
                {
                    $('#kyc-status').html(response.data[0].kyc_status);
                }
                if(response.data[0].adhar)
                {
                    $('#aadhaar_number').html(response.data[0].adhar);
                }
                if(response.data[0].pan_number)
                {
                    $('#pan_number').html(response.data[0].pan_number);
                }
                if(response.data[0].passport_number)
                {
                    $('#passport_number').html(response.data[0].passport_number);
                }
                if(response.data[0].driving_licence_number)
                {
                    $('#dl_number').html(response.data[0].driving_licence_number);
                }
                if(response.data[0].voter_id)
                {
                    $('#voter_id').html(response.data[0].voter_id);
                }
                //images
                if(response.data[0].adhar_image)
                {
                    path = media_url +'id_proof/'+response.data[0].adhar_image;
                    console.log(path);
                    $('#aadhar_image1').attr('src',path);
                }
                if(response.data[0].adhar_image_2)
                {
                    path = media_url +'id_proof/'+response.data[0].adhar_image_2;
                    $('#aadhar_image2').attr('src',path);
                }
                if(response.data[0].pan_image)
                {
                    path = media_url +'id_proof/'+response.data[0].pan_image;
                    $('#pancard_image1').attr('src',path);
                }
                if(response.data[0].passport_image)
                {
                    path = media_url +'id_proof/'+response.data[0].passport_image;
                    $('#passport_image1').attr('src',path);
                }
                if(response.data[0].passport_image_2)
                {
                    path = media_url +'id_proof/'+response.data[0].passport_image_2;
                    $('#passport_image2').attr('src',path);
                }
                if(response.data[0].driving_licence_image)
                {
                    path = media_url +'id_proof/'+response.data[0].driving_licence_image;
                    $('#dl_image1').attr('src',path);
                }
                if(response.data[0].driving_licence_image_2)
                {
                    path = media_url +'id_proof/'+response.data[0].driving_licence_image_2;
                    $('#dl_image2').attr('src',path);
                }
                if(response.data[0].voter_image)
                {
                    path = media_url +'id_proof/'+response.data[0].voter_image;
                    $('#voter_image1').attr('src',path);
                } 


                
                
            }
            else {
                

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