$(document).ready(function () {
    getProjectList();
    if($('#project_id').val() && $('#project_id').val() != ''){
        updateProject($('#project_id').val());
    }
    $("#project-form").submit(function (e) {
        e.preventDefault();
        var project_frm = $("#project-form");
        project_frm.validate({
            rules: {
                project_name: "required",
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

        if ($("#project-form").valid()) {
            showLoader();
            var params = new FormData();
            var name = $('#project_name').val();
            var area = $('#area').val();
            var unit_price = $('#unit_price').val();
            var desc = $('#description').val();
            var photo = $('#photo')[0].files[0];
            var mapphoto = $('#mapphoto')[0].files[0];
            var project_id = $('#project_id').val();
            url = base_url + 'project/add';

            if (project_id) {
                params.append('id', project_id);
                url = base_url + 'project/update';
            }

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
                        showSwal('success', 'Project Added', 'Project added successfully');
                        document.getElementById('project-form').reset();
                        $('#mapphoto_id,#photo_id').attr('src', '');
                        $('#mapphoto_id,#photo_id').css('display', 'none');
                        location.href = 'project-list.php';
                        //getProjectList();
                        hideLoader();
                    } else {
                        showSwal('error', 'Project Not Added', 'Project not added successfully');
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
});
//get all project list
function getProjectList() {
    showLoader();
    $.ajax({
        url: base_url + 'projects',
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
                    edit_url = 'add-project.php?pid=' + value.id;
                    if (value.parent_project_name != '' && value.parent_id > 0) {
                        edit_url = 'add-sub-project.php?pid=' + value.parent_id + '&spid=' + value.id;
                    }
                        console.log(edit_url);
                        html += '<tr id="tr_' + value.id + '" role="row" >\n\
                                <td class="sorting_1">' + i + '</td>\n\
                                <td>' + value.name + '</td>\n\
                                <td>' + value.parent_project_name + '</td>\n\
                                <td>' + value.unit_price + '</td>\n\
                                <td>' + value.description + '</td>\n\
                                <td><a href="'+edit_url+'"> <i class="mdi mdi-pencil text-info"></i></a> &nbsp <a href="javascript:void(0);" onclick="deleteProject(event, ' + value.id + ');"><i class="mdi mdi-delete text-danger"></i></a> </td>\n\
                            </tr>';
                        i = i + 1;
                        x++;
                   
                });

                $('#project_list').html(html);
                initDataTable();
                hideLoader();
            }
        }
    });
}//function end all project list

//function for edit project details
function updateProject(project_id) {
    //e.preventDefault();
    showLoader();
    $.ajax({
        url: base_url + 'project',
        type: 'post',
        data: {id: project_id},
        success: function (response) {
            if (response.status == "success") {
                console.log(response);
                var data = response.data;
                $('#project_id').val(project_id);
                $('#project_name').val(data.name);
                $('#area').val(data.area);
                $('#description').val(data.description);
                $('#unit_price').val(data.unit_price);
                if (data.photo) {
                    var photo_src = media_url + 'project_photo/' + data.photo;
                    $('#photo_id').attr('src', photo_src);
                    $('#photo_id').css('display', 'block');
                }
                else{
                    $('#photo_id').attr('src', '');
                    $('#photo_id').css('display', 'none');
                }
                if (data.map) {
                    var map_src = media_url + 'project_photo/' + data.map;
                    $('#mapphoto_id').attr('src', map_src);
                    $('#mapphoto_id').css('display', 'block');
                }
                else
                {
                    $('#mapphoto_id').attr('src', '');
                    $('#mapphoto_id').css('display', 'none');
                }
                hideLoader();
            }
        }
    });
}//End function for edit project details

//function for delete project 
function deleteProject(e, project_id) {
    e.preventDefault();
    showLoader();
    var result = confirm("Are you sure you want to delete this project?");
    if (result == true)
    {
        $.ajax({
            url: base_url + 'project/delete',
            type: 'post',
            data: {id: project_id},
            success: function (response) {
                if (response.status == "success") {
                    getProjectList();
                    //$("#tr_" + project_id).remove();

                }
                hideLoader();
            }
        });
    }
}//end function for delete project