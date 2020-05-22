getOfferList();
var photo_image = '';
$(document).ready(function () {

    $(document).on('change', '#start-date', function () {//$("#end-date").change(function () {
        $(this).valid();  // triggers the validation test 
        checkStartEndDate();
    });

    $(document).on('change', '#end-date', function () {//$("#end-date").change(function () {
        checkStartEndDate();
        $(this).valid();
    });
     //crop image code
     $image_crop = $('#image_demo').croppie({
        enableExif: true,
        viewport: {
            width: 200,
            height: 200,
            type: 'square' //circle
        },
        boundary: {
            width: 300,
            height: 300
        }
    });

    $('#photo').on('change', function () {
        var reader = new FileReader();
        reader.onload = function (event) {
            $image_crop.croppie('bind', {
                url: event.target.result
            }).then(function () {
                console.log('jQuery bind complete');
            });
        }
        reader.readAsDataURL(this.files[0]);
        $('#uploadphotoModal').modal('show');
    });

    $('.crop_photo_image').click(function (event) {
        $image_crop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function (response) {

            if ($('#photo').val() != '')
            {
                photo_image = response;
            }
            $('#uploadphotoModal').modal('hide');
        })
    });
    $(document).on('click', '.close_photo_image', function () {
        $('#photo').val('');
        $('.file-upload-info').val('');
    });

    if ($('#offer_id').val() && $('#offer_id').val() != '') {

        updateOffer($('#offer_id').val());
    }

    $("#offer-form").submit(function (e) {
        e.preventDefault();
        var offer_frm = $("#offer-form");
        offer_frm.validate({
            rules: {
            },
            errorPlacement: function errorPlacement(error, element) {
                element.before(error);
            }
        });

        if ($("#offer-form").valid()) {
            showLoader();
            var params = new FormData();
            var offer = $('#offer_name').val();
            var photo  = photo_image;
            var amount = $('#amount').val();
            var business = $('#business').val();
            var start_date = $('#start-date').val();
            var end_date = $('#end-date').val();
            var created_by = user_id; 
            params.append('offer', offer);
            params.append('photo', photo);
            params.append('amount', amount);
            params.append('business', business);
            params.append('start_date', start_date);
            params.append('end_date', end_date);
            params.append('created_by',created_by);
            update_or_insert_offer(params);

        }//end if
    });


});//document ready

function update_or_insert_offer(params) {
    var url = base_url + 'offer/add';
    var offer_id = $('#offer_id').val();
    if (offer_id) {
        params.append('id', offer_id);
        params.append('updated_by',user_id);
        url = base_url + 'offer/update';
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
                showSwal('success', 'Offer Added', 'Offer added successfully');
                document.getElementById('offer-form').reset();
                $('#mapphoto_id,#photo_id').attr('src', '');
                $('#mapphoto_id,#photo_id').css('display', 'none');
               location.href = 'offers';
                //getofferList();
                hideLoader();
            } else {
                showSwal('error', 'offer Not Added', 'Offer not added successfully');
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

//get all offer list
function getOfferList() {
    showLoader();
    $.ajax({
        url: base_url + 'offers',
        type: 'post',
        data: {},
        success: function (response) {
            console.log(response);
            var html = '';
            if (response.status == "success") {
                var i = 1;
                var x = 1;
                var CurrentDate = new Date();
                var SelectedDate ='';
                $.each(response.data, function (key, value) {
                    var edit_url;
                    var click_function='';
                    SelectedDate = new Date(value.end_date);
                    if(CurrentDate < SelectedDate){
                        edit_url = 'add-offer.php?oid=' + value.id;
                    }
                    else
                    {
                        edit_url = '#';
                        click_function = 'onclick="showSwal(\'error\',\'You can not edit this offer as the end date is exceeded.\');"';
                    }
                    var action_td = '';
                    if(user_type == 'ADMIN'){
                        action_td = '<td><a href="' + edit_url + '" '+click_function+'> <i class="mdi mdi-pencil text-info"></i></a> &nbsp <a href="javascript:void(0);" onclick="deleteOffer(event, ' + value.id + ');"><i class="mdi mdi-delete text-danger"></i></a> </td>';
                    }

                    html += '<tr id="tr_' + value.id + '" role="row" >\n\
                                <td class="sorting_1">' + i + '</td>\n\
                                <td>' + value.offer+ '</td>\n\
                                <td>' + value.amount + '</td>\n\
                                <td>' + value.business + '</td>\n\
                                <td>' + value.start_date + '</td>\n\
                                <td>' + value.end_date + '</td>\n\
                                '+action_td+'\n\
                            </tr>';
                    i = i + 1;
                    x++;

                });

                $('#offers_list').html(html);
                initDataTable();
                hideLoader();
            }
        }
    });
}//function end all offer list

//function for edit offer details
function updateOffer(offer_id) {
    //e.preventDefault();
    showLoader();
    $.ajax({
        url: base_url + 'offer/detail',
        type: 'post',
        data: {id: offer_id},
        success: function (response) {
            console.log(response);
            if (response.status == "success") {
                var data = response.data;
                $('#offer_id').val(offer_id);
                $('#offer_name').val(data.offer);
                $('#amount').val(data.amount);
                $('#business').val(data.business);
                if (data.photo) {
                    var photo_src = media_url + 'offer_photos/' + data.photo;
                    $('#photo_id').attr('src', photo_src);
                    $('#photo_id').css('display', 'block');
                }
                else {
                    $('#photo_id').attr('src', '');
                    $('#photo_id').css('display', 'none');
                }
                $('#start-date').val(data.start_date);
                $('#end-date').val(data.end_date);
                hideLoader();
            }
        }
    });
}//End function for edit offer details

//function for delete offer 
function deleteOffer(e, offer_id) {
    e.preventDefault();
    showLoader();
    var result = confirm("Are you sure you want to delete this offer?");
    if (result == true) {
        $.ajax({
            url: base_url + 'offer/delete',
            type: 'post',
            data: {id: offer_id},
            success: function (response) {
                if (response.status == "success") {
                    getOfferList();
                    //$("#tr_" + project_id).remove();

                }
                hideLoader();
            }
        });
    }
}//end function for delete offer
