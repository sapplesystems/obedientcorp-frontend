getPlotUnit();
getwinnerList();
var photo_image = '';
$(document).ready(function () {
    if ($('#winner_id').val() && $('#winner_id').val() != '') {
        updatewinner($('#winner_id').val());
    }
    $("#winner-form").submit(function (e) {
        e.preventDefault();
        var winner_frm = $("#winner-form");
        winner_frm.validate({
            rules: {
            },
            errorPlacement: function errorPlacement(error, element) {
                element.before(error);
            }
        });

        if ($("#winner-form").valid()) {
            showLoader();
            var params = new FormData();
            var name = $('#winner_name').val();
            var photo  = $('#photo')[0].files[0];
            var plot_no = $('#plot_no').val();
            var plot_area = $('#plot_area').val();
            var plot_unit = $('#plot_unit').val();
            params.append('name', name);
            params.append('photo', photo);
            params.append('plot_no', plot_no);
            params.append('plot_area', plot_area);
            params.append('plot_unit', plot_unit);
            update_or_insert_winner(params);

        }//end if
    });


});//document ready

function update_or_insert_winner(params) {
    var url = base_url + 'winner-add';
    var winner_id = $('#winner_id').val();
    if (winner_id) {
        params.append('id', winner_id);
        url = base_url + 'winner-update';
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
                showSwal('success', 'Winner Added', 'Winner added successfully');
                document.getElementById('winner-form').reset();
                $('#mapphoto_id,#photo_id').attr('src', '');
                $('#mapphoto_id,#photo_id').css('display', 'none');
               location.href = 'winners-list';
                //getwinnerList();
                hideLoader();
            } else {
                showSwal('error', 'Winner Not Added', 'Winner not added successfully');
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

//get all winner list
function getwinnerList() {
    showLoader();
    $.ajax({
        url: base_url + 'winner-list',
        type: 'post',
        data: {},
        success: function (response) {
            console.log(response);
            var html = '';
            if (response.status == "success") {
                var i = 1;
                var x = 1;
                $.each(response.data, function (key, value) {
                    var edit_url;
                    edit_url = 'add-winner.php?wid=' + value.id;
                    html += '<tr id="tr_' + value.id + '" role="row" >\n\
                                <td class="sorting_1">' + i + '</td>\n\
                                <td>' + value.name+ '</td>\n\
                                <td><img src="'+media_url+'winner_photo/'+value.photo+'" id="photo_id" /> </td>\n\
                                <td>' + value.plot_area + '</td>\n\
                                <td>' + value.plot_no + '</td>\n\
                                <td>' + value.plot_unit + '</td>\n\
                                <td><a href="' + edit_url + '"> <i class="mdi mdi-pencil text-info"></i></a> &nbsp <a href="javascript:void(0);" onclick="deletewinner(event, ' + value.id + ');"><i class="mdi mdi-delete text-danger"></i></a> </td>\n\
                            </tr>';
                    i = i + 1;
                    x++;

                });

                $('#winners_list').html(html);
                initDataTable();
                hideLoader();
            }
            else
            {
                initDataTable();
                hideLoader();
            }
        }
    });
}//function end all winner list

//function for edit winner details
function updatewinner(winner_id) {
    //e.preventDefault();
    showLoader();
    $.ajax({
        url: base_url + 'winner-detail',
        type: 'post',
        data: {id: winner_id},
        success: function (response) {
            console.log(response);
            if (response.status == "success") {
                var data = response.data;
                $('#winner_id').val(winner_id);
                $('#winner_name').val(data.name);
                $('#plot_no').val(data.plot_no);
                $('#plot_area').val(data.plot_area);
                if (data.photo) {

                    var photo_src = media_url + 'winner_photo/' + data.photo;
                    $('#photo_id').attr('src', photo_src);
                    $('#photo_id').css('display', 'block');
                    $('#photo').removeClass('required');
                }
                else {
                    $('#photo_id').attr('src', '');
                    $('#photo_id').css('display', 'none');
                }
                $('#plot_unit').val(data.plot_unit);
               
                hideLoader();
            }
        }
    });
}//End function for edit winner details

//function for delete winner 
function deletewinner(e, winner_id) {
    e.preventDefault();
    showLoader();
    var result = confirm("Are you sure you want to delete this winner?");
    if (result == true) {
        $.ajax({
            url: base_url + 'winner-delete',
            type: 'post',
            data: {id: winner_id},
            success: function (response) {
                if (response.status == "success") {
                    getwinnerList();
                    //$("#tr_" + project_id).remove();

                }
                hideLoader();
            }
        });
    }
}//end function for delete winner

function getPlotUnit()
{
    $.ajax({
        url: base_url + 'units',
        type: 'post',
        data: {},
        async: true,
        success: function (response) {
            var option = '<option value="">Select Unit</option>';
            if (response.status == "success") {
                $.each(response.data, function (key, value) {
                    option += '<option value="' + value.unit + '">' + value.unit + '</option>';

                });

                $('#plot_unit').html(option)
            }
        }
    });

}