$(document).ready(function () {
    getProjectList();
    getSubProjectList();
    $("#sub-project-form").submit(function (e) {
        e.preventDefault();
        var sub_project_frm = $("#sub-project-form");
        sub_project_frm.validate({
            rules: {
                projects: "required",
                sub_project_name: "required",
                unit_price: {
                    required: true,
                    number: true
                },
                area: "required",
            },
            errorPlacement: function errorPlacement(error, element) {
                element.before(error);
            }
        });

        if ($("#sub-project-form").valid()) {
            showLoader();
            var params = new FormData();
            var name = $('#sub_project_name').val();
            var area = $('#area').val();
            var unit_price = $('#unit_price').val();
            var desc = $('#description').val();
            var photo = $('#photo')[0].files[0];
            var mapphoto = $('#mapphoto')[0].files[0];
            var project_id = $('#sub_project_id').val();
            var projects_id = $('#projects').val();


            url = base_url + 'project/add';

            if (project_id) {
                params.append('id', project_id);
                url = base_url + 'project/update';
            }

            params.append('project_master_id', projects_id);
            params.append('name', name);
            params.append('area', area);
            params.append('unit_price', unit_price);
            params.append('description', desc);
            params.append('photo', photo);
            params.append('map', mapphoto);

            $.ajax({
                url: url,
                type: 'post',
                data: params,
                contentType: false,
                processData: false,
                success: function (response) {
                    error_html = '';
                    if (response.status == 'success') {
                        showSwal('success', 'Sub Project Added', 'Sub Project added successfully');
                        document.getElementById('sub-project-form').reset();
                        $('#mapphoto_id,#photo_id').attr('src', '');
                        $('#mapphoto_id,#photo_id').css('display', 'none');
                        getSubProjectList();
                        hideLoader();
                    } else {
                        showSwal('error', 'Sub Project Not Added', 'Sub Project not added successfully');
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

            });//ajax
        }//end if
    });


});//document

//function for get project list
function getProjectList() {
    showLoader();
    $.ajax({
        url: base_url + 'projects',
        type: 'post',
        data: {},
        success: function (response) {
            var option = '<option value="">Select Project</option>';
            if (response.status == "success") {
                $.each(response.data, function (key, value) {
                    if (value.parent_id == 0)
                    {
                        option += '<option value="' + value.id + '">' + value.name + '</option>';
                    }
                });
                $('#projects').html(option);
                hideLoader();
            }
        }
    });
}//end function project list

//function for get all subproject list
function getSubProjectList() {
    showLoader();
    $.ajax({
        url: base_url + 'project/childern',
        type: 'post',
        data: {},
        success: function (response) {
            var html = ' <thead><tr>\n\
            <th width="10%">Sr No.</th>\n\
            <th width="20%">Project Name</th>\n\
            <th width="20%">Sub Project Name</th>\n\
            <th width="10%">Unit Price</th>\n\
            <th width="10%">Area</th>\n\
            <th width="20%">Desc</th>\n\
            <th width="10%">Action</th>\n\
            </tr></thead>';
            if (response.status == "success") {
                var photo_link;
                var map_link;
                var i = 1;
                $.each(response.data, function (key, value) {
                    if (value.children.length > 0) {
                        $.each(value.children, function (key1, subproject) {
                            html += '<tbody>\n\
                                <tr id="tr_' + subproject.id + '">\n\
                                <td>' + i + '</td>\n\
                                <td>' + value.name + '</td>\n\
                                <td>' + subproject.name + '</td>\n\
                                <td>' + subproject.area + '</td>\n\
                                <td>' + subproject.unit_price + '</td>\n\
                                <td>' + subproject.description + '</td>\n\
                                <td><a href="javascript:void(0);" onclick="updateProject(event, ' + subproject.id + ');"> <i class="mdi mdi-pencil text-info"></i></a> &nbsp <a href="javascript:void(0);" onclick="deleteProject(event, ' + subproject.id + ');"><i class="mdi mdi-delete text-danger"></i></a> </td>\n\
                            </tr></tbody>';
                            i = i + 1;
                        })

                    }
                });
                $('.sub_project_list').html(html)
                hideLoader();
            }
        }
    });
}//end function for get all sub project

//function for update subproject
function updateProject(e, project_id) {
    e.preventDefault();
    showLoader();
    $.ajax({
        url: base_url + 'project',
        type: 'post',
        data: {id: project_id},
        success: function (response) {
            if (response.status == "success") {
                var data = response.data;
                $('#sub_project_id').val(data.id);
                $('#projects').val(data.parent_id);
                $('#project_master_list').val(data.parent_id);
                $('#sub_project_name').val(data.name);
                $('#area').val(data.area);
                $('#unit_price').val(data.unit_price);
                $('#description').val(data.description);
                if (data.photo) {
                    var photo_src = media_url + 'project_photo/' + data.photo;
                    $('#photo_id').attr('src', photo_src);
                    $('#photo_id').css('display', 'block');
                }
                if (data.map) {
                    var map_src = media_url + 'project_photo/' + data.map;
                    $('#mapphoto_id').attr('src', map_src);
                    $('#mapphoto_id').css('display', 'block');
                }
            }
            hideLoader();
        }
    });
}//end function for update subprojects

//function for delete subprojects
function deleteProject(e, project_id) {
    e.preventDefault();
    var result = confirm("Are you sure you want to delete this project?");
    if (result == true)
    {
        showLoader();
        $.ajax({
            url: base_url + 'project/delete',
            type: 'post',
            data: {id: project_id},
            success: function (response) {
                if (response.status == "success") {
                    $("#tr_" + project_id).remove();
                    hideLoader();
                }
            }
        });
    }
}//end function for subprojects