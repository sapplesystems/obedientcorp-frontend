var photo_image = '';
//var map_image = '';

$(document).ready(function () {
    getProjectList();
    getSubProjectList();
    //crop image code
    $image_crop = $('#image_demo').croppie({
        enableExif: true,
        viewport: {
            width: 500,
            height: 500,
            type: 'square' //circle
        },
        boundary: {
            width: 600,
            height: 600
        }
    });

    /*$image_crop_map = $('#image_demo_map').croppie({
        enableExif: true,
        viewport: {
            width: 500,
            height: 500,
            type: 'square' //circle
        },
        boundary: {
            width: 600,
            height: 600
        }
    });*/

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

    /*$('#mapphoto').on('change', function () {
        var reader = new FileReader();
        reader.onload = function (event) {
            $image_crop_map.croppie('bind', {
                url: event.target.result
            }).then(function () {
                console.log('jQuery bind complete');
            });
        }
        reader.readAsDataURL(this.files[0]);
        $('#uploadmapModal').modal('show');
    });*/
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

    /*$('.crop_map_image').click(function (event) {
        $image_crop_map.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function (response) {

            if ($('#mapphoto').val() != '')
            {
                map_image = response;
            }
            $('#uploadmapModal').modal('hide');
        })
    });*/

    $(document).on('click', '.close_photo_image', function () {
        $('#photo').val('');
        $('.file-upload-info').val('');
    });
    /*$(document).on('click', '.close_map_image', function () {
        $('#mapphoto').val('');
        $('.file-upload-info').val('');
    });*/

    if ($('#project_id').val() && $('#sub_project_id').val() != '') {
        updateProject($('#sub_project_id').val());
    }

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
            //var photo = $('#photo')[0].files[0];
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
            params.append('photo', photo_image);
            params.append('map', mapphoto);
            //params.append('map', map_image);

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
                        location.href = 'project-list';
                        //getSubProjectList();
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
        async: false,
        data: {},
        success: function (response) {
            var option = '<option value="">Select Project</option>';
            if (response.status == "success") {
                if (response.data.length != 0)
                {
                    $.each(response.data, function (key, value) {
                        if (value.parent_id == 0) {
                            option += '<option value="' + value.id + '">' + value.name + '</option>';
                        }
                    });
                    $('#projects').html(option);
                    hideLoader();
                }
                else
                {
                    hideLoader();
                }

            }
        }
    });
}//end function project list

//function for get all subproject list
function getSubProjectList() {
    //showLoader();
    $.ajax({
        url: base_url + 'project/childern',
        type: 'post',
        data: {},
        success: function (response) {
            var html = '';
            if (response.status == "success") {
                var photo_link;
                var map_link;
                var i = 1;
                var x = 1;
                $.each(response.data, function (key, value) {
                    if (value.children.length > 0) {
                        $.each(value.children, function (key1, subproject) {
                            var class_name = 'odd';
                            if (x % 2 == 0) {
                                class_name = 'even';
                            }
                            html += '<tr id="tr_' + subproject.id + '" role="row" class="' + class_name + '">\n\
                                <td class="sorting_1">' + i + '</td>\n\
                                <td>' + value.name + '</td>\n\
                                <td>' + subproject.name + '</td>\n\
                                <td>' + subproject.unit_price + '</td>\n\
                                <td>' + subproject.description + '</td>\n\
                                <td><a href="javascript:void(0);" onclick="updateProject(event, ' + subproject.id + ');"> <i class="mdi mdi-pencil text-info"></i></a> &nbsp <a href="javascript:void(0);" onclick="deleteProject(event, ' + subproject.id + ');"><i class="mdi mdi-delete text-danger"></i></a> </td>\n\
                            </tr>';
                            i = i + 1;
                            x++;
                        })

                    }
                });
                $('#sub_project_list').html(html);
                initDataTable();
                hideLoader();
            }
        }
    });
}//end function for get all sub project

//function for update subproject
function updateProject(project_id) {
    //e.preventDefault();
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
                else {
                    $('#photo_id').attr('src', '');
                    $('#photo_id').css('display', 'none');
                }
                if (data.map) {
                    var map_src = media_url + 'project_photo/' + data.map;
                    $('#mapphoto_id').html('<a class="btn btn-info btn-sm" href="' + map_src + '" target="_blank">Map</a>');
                }
                else
                {
                    $('#mapphoto_id').html('');
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
    if (result == true) {
        showLoader();
        $.ajax({
            url: base_url + 'project/delete',
            type: 'post',
            data: {id: project_id},
            success: function (response) {
                if (response.status == "success") {
                    getSubProjectList();
                    hideLoader();
                }
            }
        });
    }
}//end function for subprojects