<?php include_once 'header.php'; ?>
<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-md-12 customTabs">
                                <ul class="nav nav-tabs border-0" role="tablist">
                                    <li class="nav-item">
                                        <a class="p-1 border-0 bg-transparent nav-link active" id="home-tab" data-toggle="tab" href="#home-1" role="tab" aria-controls="home" aria-selected="true"><i class="mdi mdi-format-list-bulleted icon-sm my-0 "></i></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="p-1 border-0 bg-transparent nav-link" id="profile-tab" data-toggle="tab" href="#profile-1" role="tab" aria-controls="profile" aria-selected="false"><i class="mdi mdi-menu icon-sm my-0 "></i></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="p-1 border-0 bg-transparent nav-link" id="contact-tab" data-toggle="tab" href="#contact-1" role="tab" aria-controls="contact" aria-selected="false"><i class="mdi mdi-file-tree icon-sm my-0 "></i></a>
                                    </li>
                                </ul>
                                <div class="tab-content  border-0 p-0 mt-3">
                                    <div class="tab-pane fade show active" id="home-1" role="tabpanel" aria-labelledby="home-tab">
                                        <ul class="nav nav-pills nav-pills-custom" id="pills-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="all_members" data-toggle="pill" href="#all-members" role="tab" aria-controls="pills-home" aria-selected="true"> All Members List </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="referral_members" data-toggle="pill" href="#referral-members" role="tab" aria-controls="pills-profile" aria-selected="false"> Referal Members List </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="members_in_left" data-toggle="pill" href="#members-in-left" role="tab" aria-controls="pills-contact" aria-selected="false"> Members in Left </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="members_in_right" data-toggle="pill" href="#members-in-right" role="tab" aria-controls="pills-contact" aria-selected="false"> Members in Right </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content tab-content-custom-pill" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="all-members" role="tabpanel" aria-labelledby="pills-home-tab"></div>
                                            <div class="tab-pane fade" id="referral-members" role="tabpanel" aria-labelledby="pills-profile-tab"> </div>
                                            <div class="tab-pane fade" id="members-in-left" role="tabpanel" aria-labelledby="pills-contact-tab"></div>
                                            <div class="tab-pane fade" id="members-in-right" role="tabpanel" aria-labelledby="pills-contact-tab"></div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="profile-1" role="tabpanel" aria-labelledby="profile-tab">
                                        <ul class="nav nav-pills nav-pills-custom" id="pills-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="list-all-members-tab" data-toggle="pill" href="#list-all-members" role="tab" aria-controls="pills-home-2" aria-selected="true"> All Members List </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="list-referral-members-tab" data-toggle="pill" href="#list-referral-members" role="tab" aria-controls="pills-profile-2" aria-selected="false"> Referal Members List </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="list-members-in-left-tab" data-toggle="pill" href="#list-members-in-left" role="tab" aria-controls="pills-contact-2" aria-selected="false"> Members in Left </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="list-members-in-right-tab" data-toggle="pill" href="#list-members-in-right" role="tab" aria-controls="pills-contact-2" aria-selected="false"> Members in Right </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content tab-content-custom-pill" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="list-all-members" role="tabpanel" aria-labelledby="pills-home-tab"></div>
                                            <div class="tab-pane fade" id="list-referral-members" role="tabpanel" aria-labelledby="pills-profile-tab"></div>
                                            <div class="tab-pane fade" id="list-members-in-left" role="tabpanel" aria-labelledby="pills-contact-tab"></div>
                                            <div class="tab-pane fade" id="list-members-in-right" role="tabpanel" aria-labelledby="pills-contact-tab"></div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="contact-1" role="tabpanel" aria-labelledby="contact-tab">
                                        <h4>Contact us </h4>
                                        <p> Feel free to contact us if you have any questions! </p>
                                        <p>
                                            <i class="mdi mdi-phone text-info"></i> +123456789 </p>
                                        <p>
                                            <i class="mdi mdi-email-outline text-success"></i> contactus@example.com </p>
                                    </div>
                                </div>





                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <?php include_once 'footer.php'; ?>
    <script type="text/javascript">
        $(document).ready(function() {
            var user_id = '2';
            var user_left_node_id = '3';
            var user_right_node_id = '';
            getTeamMemberList(user_id, 'all-members');
            getReferralTeamMemberList(user_id, 'referral-members');
            getTeamMemberList(user_left_node_id, 'members-in-left');
            getTeamMemberList(user_right_node_id, 'members-in-right');

        });

        function getTeamMemberList(user_id, node) {
            $.ajax({
                method: "POST",
                url: "http://localhost/obedientcorp/public/api/team",
                data: {
                    id: user_id,
                    node: node
                },
                success: function(response) {
                    console.log(response);
                    if (response.status == 'success') {
                        var team_data = response.data;
                        // console.log(team_data);
                        var team_html = '';
                        var team_list_html = '<div class="media">\n\
                                        <div class="col-md-12 mb-3 border p-0">\n\
                                            <table class="table table-striped">\n\
                                                <thead>\n\
                                                    <tr>\n\
                                                        <th> User </th>\n\
                                                        <th> First name </th>\n\
                                                        <th> Progress </th>\n\
                                                        <th> Left Balance </th>\n\
                                                        <th> Right Balance </th>\n\
                                                    </tr>\n\
                                                </thead>\n\
                                                <tbody>';
                        $.each(team_data, function(key, member) {
                            team_html += '<div class="col-md-12 mb-3 border p-0">\n\
                                        <div class="card rounded shadow-none">\n\
                                            <div class="card-body pt-3 pb-3">\n\
                                                <div class="row">\n\
                                                    <div class="col-sm-6 col-lg-5 d-lg-flex">\n\
                                                        <div class="user-avatar mb-auto">\n\
                                                            <img src="../assets/images/faces/face1.jpg" alt="profile image" class="profile-img img-lg rounded-circle">\n\
                                                            <span class="edit-avatar-icon bg-success"></span>\n\
                                                        </div>\n\
                                                        <div class="wrapper pl-lg-4">\n\
                                                            <div class="wrapper d-flex align-items-center mt-2">\n\
                                                                <h4 class="mb-0 font-weight-medium">' + member.associate_name + '</h4>\n\
                                                            </div>\n\
                                                            <div class="wrapper d-flex align-items-center mt-1">\n\
                                                                <h6 class="mb-0 font-weight-light">' + member.associate_name + '</h6>\n\
                                                            </div>\n\
                                                            <div class="wrapper d-flex align-items-center mt-1">\n\
                                                                <h6 class="mb-0 font-weight-light">' + member.associate_name + '</h6>\n\
                                                            </div>\n\
                                                        </div>\n\
                                                    </div>\n\
                                                    <div class="col-sm-6 col-lg-5">\n\
                                                        <div class="d-flex align-items-center w-100">\n\
                                                            <p class="mb-0 mr-3 font-weight-semibold">Progress</p>\n\
                                                            <div class="progress progress-md w-100">\n\
                                                                <div class="progress-bar bg-success" role="progressbar" style="width: 67%" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100"></div>\n\
                                                            </div>\n\
                                                            <p class="mb-0 ml-3 font-weight-semibold">67%</p>\n\
                                                        </div>\n\
                                                        <div class="row mt-3">\n\
                                                            <div class="col d-flex">\n\
                                                                <div class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted">\n\
                                                                    <i class="mdi mdi-star-circle icon-sm my-0 "></i>\n\
                                                                </div>\n\
                                                                <div class="wrapper pl-3">\n\
                                                                    <p class="mb-0 font-weight-medium text-muted">TOTAL LEFT</p>\n\
                                                                    <h4 class="font-weight-semibold mb-0">' + member.total_left_business + '</h4>\n\
                                                                </div>\n\
                                                            </div>\n\
                                                            <div class="col d-flex">\n\
                                                                <div class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted">\n\
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
                                                            <img src="../assets/images/faces-clipart/pic-1.png" alt="image" />\n\
                                                        </td>\n\
                                                        <td> ' + member.associate_name + '</td>\n\
                                                        <td>\n\
                                                            <div class="progress">\n\
                                                                <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>\n\
                                                            </div>\n\
                                                        </td>\n\
                                                        <td> ' + member.total_left_business + ' </td>\n\
                                                        <td> ' + member.total_right_business + ' </td>\n\
                                                    </tr>';
                        });
                        team_list_html += '</tbody>\n\
                                            </table>\n\
                                        </div></div>';
                        $('#' + node).html(team_html);
                        $('#list-' + node).html(team_list_html);
                    } else {}
                },
                error: function(response) {}
            });
        }

        function getReferralTeamMemberList(user_id, node) {
            $.ajax({
                method: "POST",
                url: "http://localhost/obedientcorp/public/api/team/referral",
                data: {
                    id: user_id
                },
                success: function(response) {
                    //console.log(response);
                    if (response.status == 'success') {
                        var team_data = response.data;
                        console.log(team_data);
                        var team_html = '';
                        var team_list_html = '<div class="media">\n\
                                        <div class="col-md-12 mb-3 border p-0">\n\
                                            <table class="table table-striped">\n\
                                                <thead>\n\
                                                    <tr>\n\
                                                        <th> User </th>\n\
                                                        <th> First name </th>\n\
                                                        <th> Progress </th>\n\
                                                        <th> Left Balance </th>\n\
                                                        <th> Right Balance </th>\n\
                                                    </tr>\n\
                                                </thead>\n\
                                                <tbody>';
                        $.each(team_data, function(key, member) {
                            team_html += '<div class="col-md-12 mb-3 border p-0">\n\
                                        <div class="card rounded shadow-none">\n\
                                            <div class="card-body pt-3 pb-3">\n\
                                                <div class="row">\n\
                                                    <div class="col-sm-6 col-lg-5 d-lg-flex">\n\
                                                        <div class="user-avatar mb-auto">\n\
                                                            <img src="../assets/images/faces/face1.jpg" alt="profile image" class="profile-img img-lg rounded-circle">\n\
                                                            <span class="edit-avatar-icon bg-success"></span>\n\
                                                        </div>\n\
                                                        <div class="wrapper pl-lg-4">\n\
                                                            <div class="wrapper d-flex align-items-center mt-2">\n\
                                                                <h4 class="mb-0 font-weight-medium">' + member.associate_name + '</h4>\n\
                                                            </div>\n\
                                                            <div class="wrapper d-flex align-items-center mt-1">\n\
                                                                <h6 class="mb-0 font-weight-light">' + member.associate_name + '</h6>\n\
                                                            </div>\n\
                                                            <div class="wrapper d-flex align-items-center mt-1">\n\
                                                                <h6 class="mb-0 font-weight-light">' + member.associate_name + '</h6>\n\
                                                            </div>\n\
                                                        </div>\n\
                                                    </div>\n\
                                                    <div class="col-sm-6 col-lg-5">\n\
                                                        <div class="d-flex align-items-center w-100">\n\
                                                            <p class="mb-0 mr-3 font-weight-semibold">Progress</p>\n\
                                                            <div class="progress progress-md w-100">\n\
                                                                <div class="progress-bar bg-success" role="progressbar" style="width: 67%" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100"></div>\n\
                                                            </div>\n\
                                                            <p class="mb-0 ml-3 font-weight-semibold">67%</p>\n\
                                                        </div>\n\
                                                        <div class="row mt-3">\n\
                                                            <div class="col d-flex">\n\
                                                                <div class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted">\n\
                                                                    <i class="mdi mdi-star-circle icon-sm my-0 "></i>\n\
                                                                </div>\n\
                                                                <div class="wrapper pl-3">\n\
                                                                    <p class="mb-0 font-weight-medium text-muted">TOTAL LEFT</p>\n\
                                                                    <h4 class="font-weight-semibold mb-0">' + member.total_left_business + '</h4>\n\
                                                                </div>\n\
                                                            </div>\n\
                                                            <div class="col d-flex">\n\
                                                                <div class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted">\n\
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
                                                            <img src="../assets/images/faces-clipart/pic-1.png" alt="image" />\n\
                                                        </td>\n\
                                                        <td> ' + member.associate_name + '</td>\n\
                                                        <td>\n\
                                                            <div class="progress">\n\
                                                                <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>\n\
                                                            </div>\n\
                                                        </td>\n\
                                                        <td> ' + member.total_left_business + ' </td>\n\
                                                        <td> ' + member.total_right_business + ' </td>\n\
                                                    </tr>';
                        });
                        team_list_html += '</tbody>\n\
                                            </table>\n\
                                        </div></div>';
                        $('#' + node).html(team_html);
                        $('#list-' + node).html(team_list_html);
                    } else {}
                },
                error: function(response) {}
            });
        }
    </script>