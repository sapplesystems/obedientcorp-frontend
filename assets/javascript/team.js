$(document).ready(function () {
    getTeamMemberList(user_id, 'all-members');
    getReferralTeamMemberList(user_id, 'referral-members');
    if (user_left_node_id && user_left_node_id != '' && user_left_node_id > 0) {
        getTeamMemberList(user_left_node_id, 'members-in-left');
    }
    if (user_right_node_id && user_right_node_id != '' && user_right_node_id > 0) {
        getTeamMemberList(user_right_node_id, 'members-in-right');
    }

});

function getTeamMemberList(user_id, node) {
    showLoader();
    $.ajax({
        method: "POST",
        url: base_url + 'team',
        data: {
            id: user_id,
            node: node
        },
        success: function (response) {
            if (response.status == 'success') {
                var team_data = response.data;
                var user_active_range = Number(response.user_active_range);
                var team_html = '';
                var total_business = 0;
                var is_active_icon_class = '';
                var team_list_html = '<div class="media">\n\
                                        <div class="col-md-12 mb-3 border p-0">\n\
                                            <table class="table table-striped">\n\
                                                <thead>\n\
                                                    <tr>\n\
                                                        <th> User </th>\n\
                                                        <th> Name </th>\n\
                                                        <th> Left Business </th>\n\
                                                        <th> Right Business </th>\n\
                                                    </tr>\n\
                                                </thead>\n\
                                                <tbody>';
                $.each(team_data, function (key, member) {
                    is_active_icon_class = 'bg-danger';
                    total_business = (Number(member.total_left_business) + Number(member.total_right_business));
                    if (total_business >= user_active_range) {
                        is_active_icon_class = 'bg-success';
                    }
                    if (member.photo)
                    {
                        var photo_src = media_url + 'profile_photo/' + member.photo;
                    }
                    team_html += '<div class="col-md-12 mb-3 border p-0">\n\
                                        <div class="card rounded shadow-none">\n\
                                            <div class="card-body pt-3 pb-3">\n\
                                                <div class="row">\n\
                                                    <div class="col-sm-6 col-lg-5 d-lg-flex">\n\
                                                        <div class="user-avatar mb-auto">\n\
                                                            <img src=' + photo_src + ' alt="profile image" class="profile-img img-lg rounded-circle">\n\
                                                            <span class="edit-avatar-icon ' + is_active_icon_class + '"></span>\n\
                                                        </div>\n\
                                                        <div class="wrapper pl-lg-4">\n\
                                                            <div class="wrapper d-flex align-items-center mt-2">\n\
                                                                <h4 class="mb-0 font-weight-medium">' + member.associate_name + '</h4>\n\
                                                            </div>\n\
                                                            <div class="wrapper d-flex align-items-center mt-1">\n\
                                                                <h6 class="mb-0 font-weight-light">' + member.username + '</h6>\n\
                                                            </div>\n\
                                                            <div class="wrapper d-flex align-items-center mt-1">\n\
                                                                <h6 class="mb-0 font-weight-light"></h6>\n\
                                                            </div>\n\
                                                        </div>\n\
                                                    </div>\n\
                                                    <div class="col-sm-6 col-lg-5">\n\
                                                        <div class="d-flex align-items-center w-100" style="display: none !important;">\n\
                                                            <p class="mb-0 mr-3 font-weight-semibold">Progress</p>\n\
                                                            <div class="progress progress-md w-100">\n\
                                                                <div class="progress-bar bg-success" role="progressbar" style="width: 67%" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100"></div>\n\
                                                            </div>\n\
                                                            <p class="mb-0 ml-3 font-weight-semibold">67%</p>\n\
                                                        </div>\n\
                                                        <div class="row mt-3">\n\
                                                            <div class="col d-flex">\n\
                                                                <div class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted custom_icon">\n\
                                                                    <i class="mdi mdi-star-circle icon-sm my-0 "></i>\n\
                                                                </div>\n\
                                                                <div class="wrapper pl-3">\n\
                                                                    <p class="mb-0 font-weight-medium text-muted">LEFT BUSINESS</p>\n\
                                                                    <h4 class="font-weight-semibold mb-0">' + member.total_left_business + '</h4>\n\
                                                                </div>\n\
                                                            </div>\n\
                                                            <div class="col d-flex">\n\
                                                                <div class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted custom_icon">\n\
                                                                    <i class="mdi mdi-star-circle icon-sm my-0 "></i>\n\
                                                                </div>\n\
                                                                <div class="wrapper pl-3">\n\
                                                                    <p class="mb-0 font-weight-medium text-muted">RIGHT BUSINESS</p>\n\
                                                                    <h4 class="font-weight-semibold mb-0">' + member.total_right_business + '</h4>\n\
                                                                </div>\n\
                                                            </div>\n\
                                                        </div>\n\
                                                    </div>\n\
                                                    <div class="col-sm-6 col-lg-2">\n\
                                                        <div class="wrapper d-flex">\n\
                                                            <div class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted">\n\
                                                                <i class="mdi mdi-account-plus icon-sm my-0 "></i>\n\
                                                            </div>\n\
                                                            <div class="wrapper pl-3">\n\
                                                                <p class="mb-0 font-weight-medium text-muted">INTRODUCER</p>\n\
                                                                <h4 class="font-weight-semibold mb-0 text-primary">' + member.introducer_code + '</h4>\n\
                                                            </div>\n\
                                                        </div>\n\
                                                    </div>\n\
                                                </div>\n\
                                            </div>\n\
                                        </div>\n\
                                    </div>';

                    team_list_html += '<tr>\n\
                                                        <td class="py-1">\n\
                                                            <img src="' + photo_src + '" alt="image" />\n\
                                                        </td>\n\
                                                        <td> ' + member.associate_name + '</td>\n\
                                                        <td> ' + member.total_left_business + ' </td>\n\
                                                        <td> ' + member.total_right_business + ' </td>\n\
                                                    </tr>';
                });
                team_list_html += '</tbody>\n\
                                            </table>\n\
                                        </div></div>';
                $('#' + node).html(team_html);
                $('#list-' + node).html(team_list_html);
                hideLoader();
            } else {
                hideLoader();
            }
        },
        error: function (response) {
            hideLoader();
        }
    });
}

function getReferralTeamMemberList(user_id, node) {
    showLoader();
    $.ajax({
        method: "POST",
        url: base_url + 'team/referral',
        data: {
            id: user_id
        },
        success: function (response) {
            if (response.status == 'success') {
                var team_data = response.data;
                var user_active_range = Number(response.user_active_range);
                var team_html = '';
                var total_business = 0;
                var is_active_icon_class = '';
                var team_list_html = '<div class="media">\n\
                                        <div class="col-md-12 mb-3 border p-0">\n\
                                            <table class="table table-striped">\n\
                                                <thead>\n\
                                                    <tr>\n\
                                                        <th> User </th>\n\
                                                        <th> Name </th>\n\
                                                        <th> Left Business </th>\n\
                                                        <th> Right Business </th>\n\
                                                    </tr>\n\
                                                </thead>\n\
                                                <tbody>';
                $.each(team_data, function (key, member) {
                    is_active_icon_class = 'bg-danger';
                    total_business = (Number(member.total_left_business) + Number(member.total_right_business));
                    if (total_business >= user_active_range) {
                        is_active_icon_class = 'bg-success';
                    }
                    if (member.photo)
                    {
                        var photo_src = media_url + 'profile_photo/' + member.photo;
                    }
                    team_html += '<div class="col-md-12 mb-3 border p-0">\n\
                                        <div class="card rounded shadow-none">\n\
                                            <div class="card-body pt-3 pb-3">\n\
                                                <div class="row">\n\
                                                    <div class="col-sm-6 col-lg-5 d-lg-flex">\n\
                                                        <div class="user-avatar mb-auto">\n\
                                                            <img src=' + photo_src + ' alt="profile image" class="profile-img img-lg rounded-circle">\n\
                                                            <span class="edit-avatar-icon ' + is_active_icon_class + '"></span>\n\
                                                        </div>\n\
                                                        <div class="wrapper pl-lg-4">\n\
                                                            <div class="wrapper d-flex align-items-center mt-2">\n\
                                                                <h4 class="mb-0 font-weight-medium">' + member.associate_name + '</h4>\n\
                                                            </div>\n\
                                                            <div class="wrapper d-flex align-items-center mt-1">\n\
                                                                <h6 class="mb-0 font-weight-light">' + member.username + '</h6>\n\
                                                            </div>\n\
                                                            <div class="wrapper d-flex align-items-center mt-1">\n\
                                                                <h6 class="mb-0 font-weight-light"></h6>\n\
                                                            </div>\n\
                                                        </div>\n\
                                                    </div>\n\
                                                    <div class="col-sm-6 col-lg-5">\n\
                                                        <div class="d-flex align-items-center w-100" style="display: none !important;">\n\
                                                            <p class="mb-0 mr-3 font-weight-semibold">Progress</p>\n\
                                                            <div class="progress progress-md w-100">\n\
                                                                <div class="progress-bar bg-success" role="progressbar" style="width: 67%" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100"></div>\n\
                                                            </div>\n\
                                                            <p class="mb-0 ml-3 font-weight-semibold">67%</p>\n\
                                                        </div>\n\
                                                        <div class="row mt-3">\n\
                                                            <div class="col d-flex">\n\
                                                                <div class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted custom_icon">\n\
                                                                    <i class="mdi mdi-star-circle icon-sm my-0 "></i>\n\
                                                                </div>\n\
                                                                <div class="wrapper pl-3">\n\
                                                                    <p class="mb-0 font-weight-medium text-muted">TOTAL LEFT</p>\n\
                                                                    <h4 class="font-weight-semibold mb-0">' + member.total_left_business + '</h4>\n\
                                                                </div>\n\
                                                            </div>\n\
                                                            <div class="col d-flex">\n\
                                                                <div class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted custom_icon">\n\
                                                                    <i class="mdi mdi-star-circle icon-sm my-0 "></i>\n\
                                                                </div>\n\
                                                                <div class="wrapper pl-3">\n\
                                                                    <p class="mb-0 font-weight-medium text-muted">TOTAL RIGHT</p>\n\
                                                                    <h4 class="font-weight-semibold mb-0">' + member.total_right_business + '</h4>\n\
                                                                </div>\n\
                                                            </div>\n\
                                                        </div>\n\
                                                    </div>\n\
                                                    <div class="col-sm-6 col-lg-2">\n\
                                                        <div class="wrapper d-flex">\n\
                                                            <div class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted">\n\
                                                                <i class="mdi mdi-account-plus icon-sm my-0 "></i>\n\
                                                            </div>\n\
                                                            <div class="wrapper pl-3">\n\
                                                                <p class="mb-0 font-weight-medium text-muted">INTRODUCER</p>\n\
                                                                <h4 class="font-weight-semibold mb-0 text-primary">' + member.introducer_code + '</h4>\n\
                                                            </div>\n\
                                                        </div>\n\
                                                    </div>\n\
                                                </div>\n\
                                            </div>\n\
                                        </div>\n\
                                    </div>';

                    team_list_html += '<tr>\n\
                                                        <td class="py-1">\n\
                                                            <img src="' + photo_src + '" alt="image" />\n\
                                                        </td>\n\
                                                        <td> ' + member.associate_name + '</td>\n\
                                                        <td> ' + member.total_left_business + ' </td>\n\
                                                        <td> ' + member.total_right_business + ' </td>\n\
                                                    </tr>';
                });
                team_list_html += '</tbody>\n\
                                            </table>\n\
                                        </div></div>';
                $('#' + node).html(team_html);
                $('#list-' + node).html(team_list_html);
                hideLoader();
            } else {
                hideLoader();
            }
        },
        error: function (response) {
            hideLoader();
        }
    });
}