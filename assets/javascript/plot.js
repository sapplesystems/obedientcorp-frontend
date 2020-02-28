$(document).ready(function () {
    var sub_project_list = '';
    getProjectList();
    getplotlist();
    $("#plot-form").submit(function (e) {
        e.preventDefault();
        var plot_form = $("plot-form");
        plot_form.validate({
            errorPlacement: function errorPlacement(error, element) {
                element.before(error);
            }
        });

        if ($("#plot-form").valid()) {
            var params = new FormData();
            var project_id = $('#projects').val();
            if ($('#sub_projects').val()) {
                project_id = $('#sub_projects').val();
            }
            console.log(project_id);
            var plot_no = $('#plot_no').val();
            var plot_area = $('#plot_area').val();
            var plot_id = $('#plot_id').val();
            url = 'http://localhost/obedientcorp/public/api/plot/add';

            if (plot_id) {
                params.append('id', plot_id);
                url = 'http://localhost/obedientcorp/public/api/plot/update';
            }
            
            params.append('project_master_id', project_id);
            params.append('name', plot_no);
            params.append('area', plot_area);
            //params.append('description', area);
            //params.append('photo', photo);
            //params.append('map', mapphoto);

            $.ajax({
                url: url,
                type: 'post',
                data: params,
                contentType: false,
                processData: false,
                success: function (response) {
                    console.log(response);
                    error_html = '';
                    if (response.status == 'success') {
                        error_html += '<div class="alert alert-primary" role="alert">Project details saved successfully</div>';
                        document.getElementById('plot-form').reset();
                        getplotlist();

                    } else {
                        error_html += '<div class="alert alert-warning" role="alert">Project details could not be saved</div>';
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
                }
            });//ajax
        }//end if
    });
});//documents

//function for get project list
function getProjectList() {
    $.ajax({
        url: 'http://localhost/obedientcorp/public/api/project/childern',
        type: 'post',
        data: {},
        success: function (response) {
            sub_project_list = response.data;
            //console.log(response.data);
            var option = '<option value="">Select Project</option>';
            if (response.status == "success") {
                $.each(response.data, function (key, value) {
                    if (value.parent_id == 0) {
                        option += '<option value="' + value.id + '">' + value.name + '</option>';
                    }

                });

                $('#projects').html(option)
            }
            else {
                console.log(response.data);
            }

        }
    });
}//end function project list
//function for getsubproject 
$("#projects").change(function () {
    var id = $(this).val();
    var sub_option = '<option value="">Select Sub Project</option>';
    $.each(sub_project_list, function (key, value) {
        if (value.id == id) {
            if (value.children.length > 0) {
                $("#sub_pro_div").css('display', 'block');
                $.each(value.children, function (key1, subproject) {
                    console.log(subproject);
                    sub_option += '<option value="' + subproject.id + '">' + subproject.name + '</option>';
                });
            }
        }
    });
    $('#sub_projects').html(sub_option)

});//end function getsubproject

//function for get all plot
function getplotlist() {
    $.ajax({
        url: 'http://localhost/obedientcorp/public/api/plots',
        type: 'post',
        data: {},
        success: function (response) {
            console.log(response);
            var html = ' <thead><tr>\n\
              <th> Sr No. </th>\n\
              <th> Project Name </th>\n\
              <th> Sub Project Name </th>\n\
              <th> Plot No. </th>\n\
              <th> Plot Area </th>\n\
              <th> Availability </th>\n\
              <th> Action </th>\n\
            </tr>\n\
          </thead>';
            if (response.status == "success") {
                var i = 1;
                var sub_project = '';
                var project = '';
                $.each(response.data, function (key, value) {
                    if(value.project.id == value.sub_project.id) {
                        project = value.project.name;
                    }
                    else {
                        sub_project = value.sub_project.name;
                    }
                    var Free_Selected = '';
                    var Booked_Selected = '';
                    var Alloted_Selected = '';
                    var Registry_Selected = '';
                    var Hold_Selected = '';
                    if (value.availability == 'Free') { Free_Selected = 'selected'; }
                    if (value.availability == 'Booked') { Booked_Selected = 'selected'; }
                    if (value.availability == 'Alloted') { Alloted_Selected = 'selected'; }
                    if (value.availability == 'Registry') { Registry_Selected = 'selected'; }
                    if (value.availability == 'Hold') { Hold_Selected = 'selected'; }
                    html += '<tbody>\n\
                                <tr id="tr_' + value.id + '">\n\
                                <td>'+ i + '</td>\n\
                                <td>'+ project + '</td>\n\
                                <td>'+ sub_project + '</td>\n\
                                <td>'+ value.name + '</td>\n\
                                <td>'+ value.area + '</td>\n\
                                <td>\n\
                                    <div class="d-flex">\n\
                                    <div class="input-group mr-sm-2 mb-sm-0">\n\
                                        <select class="form-control" id="availability_'+ value.id + '">\n\
                                            <option value="">--Select--</option>\n\
                                            <option value="Free" '+ Free_Selected + '>Free</option>\n\
                                            <option value="Booked" '+ Booked_Selected + '>Booked</option>\n\
                                            <option value="Alloted" '+ Alloted_Selected + '>Alloted</option>\n\
                                            <option value="Registry" '+ Registry_Selected + '>Registry</option>\n\
                                            <option value="Hold" '+ Hold_Selected + '>Hold</option>\n\
                                        </select>\n\
                                    </div>\n\
                                    <button type="submit" class="btn btn-gradient-success btn-sm" onclick="updateAvailability('+ value.id + ')">Go</button>\n\
                                    </div>\n\
                                     </td>\n\
                                <td><a href="javascript:void(0);" onclick="updatePlot(event, '+ value.id + ');"> <i class="mdi mdi-pencil text-info"></i></a> &nbsp <a href="javascript:void(0);" onclick="deletePlot(event, ' + value.id + ');"><i class="mdi mdi-delete text-danger"></i></a> </td>\n\
                            </tr></tbody>';
                    i = i + 1;

                });
                $('.plot_list').html(html)
            }
            else {
                console.log(response.data);
            }

        }
    });
}//end function for get all plot listing

//function for update plot
function updatePlot(e, plot_id) {
    e.preventDefault();
    $.ajax({
        url: 'http://localhost/obedientcorp/public/api/plots',
        type: 'post',
        data: { id: plot_id },
        success: function (response) {
            if (response.status == "success") {
                var data = response.data;
                console.log(data);
                $("#sub_pro_div").css('display', 'none');
                if (data[0].project.id == data[0].sub_project.id) {
                    console.log(data[0].project.id);
                    $('#projects').val(data[0].project.id);
                } else {
                    $("#sub_pro_div").css('display', 'block');
                    $('#projects').val(data[0].project.id).trigger('change');
                    $('#sub_projects').val(data[0].sub_project.id);

                }
                $('#plot_no').val(data[0].name);
                $('#plot_area').val(data[0].area);
                $('#plot_id').val(data[0].id);


            }
        }
    });
}//end function for update plot

//function for delete plot
function deletePlot(e, plot_id) {
    e.preventDefault();
    var result = confirm("Are you sure you want to delete this plot?");
    console.log(result);
    if (result == true) {
        $.ajax({
            url: 'http://localhost/obedientcorp/public/api/plot/delete',
            type: 'post',
            data: { id: plot_id },
            success: function (response) {
                if (response.status == "success") {
                    $("#tr_" + plot_id).remove();
                    //location.reload();
                }
            }
        });
    }
}//end function for plot

function updateAvailability(plot_id) {
    var availability = $("#availability_" + plot_id).val();
    console.log(availability);
    $.ajax({
        url: 'http://localhost/obedientcorp/public/api/plot/update',
        type: 'post',
        data: { id: plot_id, availability: availability },
        success: function (response) {
            if (response.status == "success") {
                var data = response.data;
                getplotlist();
            }
        }
    });
}

