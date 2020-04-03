var sub_project_list;
$(document).ready(function () {
    getProjectList();
    getplotlist();
    getPlotUnit();
    if ($('#plot_id').val() && $('#plot_id').val() != '') {
        updatePlot($('#plot_id').val());
    }
    $("#plot-form").submit(function (e) {
        e.preventDefault();
        var plot_form = $("#plot-form");
        plot_form.validate({
            rules: {
                plot_area: {
                    number: true
                },
            },
            errorPlacement: function errorPlacement(error, element) {
                element.before(error);
            }
        });

        if ($("#plot-form").valid()) {
            showLoader();
            var params = new FormData();
            var project_id = $('#projects').val();
            var sub_project_id = 0;
            if ($('#sub_projects').val()) {
                sub_project_id = $('#sub_projects').val();
            }
            var plot_no = $('#plot_no').val();
            var plot_area = $('#plot_area').val();
            var plot_unit = $('#plot_unit').val();
            var plot_id = $('#plot_id').val();

            url = base_url + 'plot/add';

            if (plot_id) {
                params.append('id', plot_id);
                url = base_url + 'plot/update';
            }

            params.append('project_master_id', project_id);
            params.append('sub_project_id', sub_project_id);
            params.append('name', plot_no);
            params.append('area', plot_area);
            params.append('unit', plot_unit);
            //params.append('photo', photo);
            //params.append('map', mapphoto);

            $.ajax({
                url: url,
                type: 'post',
                data: params,
                contentType: false,
                processData: false,
                success: function (response) {
                    error_html = '';
                    if (response.status == 'success') {
                        showSwal('success', 'Plot Added', 'Plot added successfully');
                        document.getElementById('plot-form').reset();
                        location.href = 'plot-list';
                        //getplotlist();
                        hideLoader();
                    } else {
                        showSwal('error', 'Plot Not Added', 'Plot not added successfully');
                        hideLoader();
                    }

                    $('#errors_div').html(error_html);
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
            }); //ajax
        } //end if
    });
}); //documents

//function for get project list
function getProjectList() {
    $.ajax({
        url: base_url + 'project/childern',
        type: 'post',
        data: {},
        async: false,
        success: function (response) {
            console.log(response);
            sub_project_list = response.data;
            var option = '<option value="">Select Project</option>';
            if (response.status == "success") {
                $.each(response.data, function (key, value) {
                    if (value.parent_id == 0) {
                        option += '<option value="' + value.id + '">' + value.name + '</option>';
                    }

                });

                $('#projects').html(option)
            }
        }
    });
} //end function project list
//function for getsubproject 
$("#projects").change(function () {
    var id = $(this).val();
    var sub_option = '<option value="">Select Sub Project</option>';
    $.each(sub_project_list, function (key, value) {
        if (value.id == id) {
            if (value.children.length > 0) {
                $("#sub_pro_div").css('display', 'block');
                $.each(value.children, function (key1, subproject) {
                    sub_option += '<option value="' + subproject.id + '">' + subproject.name + '</option>';
                });
            }
        }
    });
    $('#sub_projects').html(sub_option)

}); //end function getsubproject

//function for get all plot


//function for update plot
function updatePlot(plot_id) {
    //e.preventDefault();
    showLoader();
    $.ajax({
        url: base_url + 'plots',
        type: 'post',
        data: {id: plot_id},
        success: function (response) {
            if (response.status == "success") {
                var data = response.data;
                $("#sub_pro_div").css('display', 'none');
                if (data[0].project && data[0].project.id) {
                    $('#projects').val(data[0].project.id);
                }
                if (data[0].subProject && data[0].subProject.id) {
                    $("#sub_pro_div").css('display', 'block');
                    $('#projects').val(data[0].project.id).trigger('change');
                    $('#sub_projects').val(data[0].subProject.id);

                }
                $('#plot_no').val(data[0].name);
                $('#plot_area').val(data[0].area);
                $('#plot_unit').val(data[0].unit);
                $('#plot_id').val(data[0].id);
                hideLoader();
            }
        }
    });
} //end function for update plot


function getplotlist() {
    showLoader();
    $.ajax({
        url: base_url + 'plots',
        type: 'post',
        data: {},
        success: function (response) {
            var html = '';
            if (response.status == "success") {
                var i = 1;
                var x = 1;
                $.each(response.data, function (key, value) {
                    var sub_project = '';
                    var project = '';
                    if (value.project && value.project.id) {
                        project = value.project.name;
                    }
                    if (value.subProject && value.subProject.id) {
                        project = value.project.name;
                        sub_project = value.subProject.name;
                    }
                    var Free_Selected = '';
                    var Booked_Selected = '';
                    var Alloted_Selected = '';
                    var Registry_Selected = '';
                    var Hold_Selected = '';
                    if (value.availability == 'Free') {
                        Free_Selected = 'selected';
                    }
                    if (value.availability == 'Booked') {
                        Booked_Selected = 'selected';
                    }
                    if (value.availability == 'Alloted') {
                        Alloted_Selected = 'selected';
                    }
                    if (value.availability == 'Registry') {
                        Registry_Selected = 'selected';
                    }
                    if (value.availability == 'Hold') {
                        Hold_Selected = 'selected';
                    }
                    var class_name = 'odd';
                    if (x % 2 == 0) {
                        class_name = 'even';
                    }
                    html += '<tr id="tr_' + value.id + '" role="row" class="' + class_name + '">\n\
                                <td class="sorting_1">' + i + '</td>\n\
                                <td>' + project + '</td>\n\
                                <td>' + sub_project + '</td>\n\
                                <td>' + value.name + '</td>\n\
                                <td>' + value.area + '</td>\n\
                                <td>\n\
                                    <div class="d-flex">\n\
                                    <div class="input-group mr-sm-2 mb-sm-0">\n\
                                        <select class="form-control" id="availability_' + value.id + '">\n\
                                            <option value="">--Select--</option>\n\
                                            <option value="Free" ' + Free_Selected + '>Free</option>\n\
                                            <option value="Booked" ' + Booked_Selected + '>Booked</option>\n\
                                            <option value="Alloted" ' + Alloted_Selected + '>Alloted</option>\n\
                                            <option value="Registry" ' + Registry_Selected + '>Registry</option>\n\
                                            <option value="Hold" ' + Hold_Selected + '>Hold</option>\n\
                                        </select>\n\
                                    </div>\n\
                                    <button type="submit" class="btn btn-gradient-success btn-sm" onclick="updateAvailability(' + value.id + ')">Go</button>\n\
                                    </div>\n\
                                     </td>\n\
                                <td><a href="add-plot.php?plotid=' + value.id + '"> <i class="mdi mdi-pencil text-info"></i></a> &nbsp <a href="javascript:void(0);" onclick="deletePlot(event, ' + value.id + ');"><i class="mdi mdi-delete text-danger"></i></a> </td>\n\
                            </tr>';
                    i = i + 1;

                });
                $('#plot_list').html(html);
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
} //end function for get all plot listing

//function for delete plot
function deletePlot(e, plot_id) {
    e.preventDefault();
    var result = confirm("Are you sure you want to delete this plot?");
    if (result == true) {
        showLoader();
        $.ajax({
            url: base_url + 'plot/delete',
            type: 'post',
            data: {id: plot_id},
            success: function (response) {
                if (response.status == "success") {
                    getplotlist();
                    hideLoader();
                }
            }
        });
    }
} //end function for plot

function updateAvailability(plot_id) {
    var availability = $("#availability_" + plot_id).val();
    $.ajax({
        url: base_url + 'plot/update',
        type: 'post',
        data: {id: plot_id, availability: availability},
        success: function (response) {
            if (response.status == "success") {
                var data = response.data;
                getplotlist();
            }
        }
    });
}

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