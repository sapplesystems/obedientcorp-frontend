var user_active_range = 0;
var all_members = [];
var all_left_members = [];
var all_right_members = [];
var all_member = 0;
var left_member = 0;
var right_member = 0;
var all_member_compact = 0;
var left_member_compact = 0;
var right_member_compact = 0;

getTeamMemberList(user_id, user_left_node_id, user_right_node_id, 'all-members');
all_member = 1;

$(document).ready(function () {
    $(document).on('click', '#members_in_left', function () {
        if (left_member == 0) {
            left_member = 1;
            setMainView(user_active_range, all_left_members, 'members-in-left');
        }
    });
    $(document).on('click', '#members_in_right', function () {
        if (right_member == 0) {
            right_member = 1;
            setMainView(user_active_range, all_right_members, 'members-in-right');
        }
    });
    $(document).on('click', '#compact-view', function () {
        if (all_member_compact == 0) {
            all_member_compact = 1;
            setCompactView(user_active_range, all_members, 'list-all-members');
        }
    });
    $(document).on('click', '#list-members-in-left-tab', function () {
        if (left_member_compact == 0) {
            left_member_compact = 1;
            setCompactView(user_active_range, all_left_members, 'list-members-in-left');
        }
    });
    $(document).on('click', '#list-members-in-right-tab', function () {
        if (right_member_compact == 0) {
            right_member_compact = 1;
            setCompactView(user_active_range, all_right_members, 'list-members-in-right');
        }
    });
});

function getTeamMemberList(user_id, left_id, right_id, node) {
    showLoader();
    $.ajax({
        method: "POST",
        url: base_url + 'team',
        data: {
            id: user_id,
            left_id: left_id,
            right_id: right_id,
        },
        success: function (response) {
            if (response.status == 'success') {
                var team_data = response.data;
                if (team_data.left_members.length) {
                    all_left_members = team_data.left_members;
                }
                if (team_data.right_members.length) {
                    all_right_members = team_data.right_members;
                }
                all_members = all_left_members.concat(all_right_members);

                user_active_range = Number(response.user_active_range);
                setMainView(user_active_range, all_members, node);
                hideLoader();
            }
        },
        error: function (response) {
            hideLoader();
        }
    });
}

function setMainView(user_active_range, members, node) {
    var table_id = 'table-' + node;
    var team_html = '';
    team_html += '<table class="table custom_team_table" id="' + table_id + '">';
    team_html += '<thead>';
    team_html += '<tr>';
    team_html += '<th style="width:10% !important;"></th>';
    team_html += '<th style="width:24% !important;"></th>';
    team_html += '<th  style="width:22% !important;"></th>';
    team_html += '<th style="width:22% !important;"></th>';
    team_html += '<th style="width:22% !important;"></th>';
    team_html += '</tr>';
    team_html += '</thead>';
    team_html += '<tbody>';

    $.each(members, function (key, member) {
        var total_business = 0;
        var is_active_icon_class = '';
        var is_admin_active_style = '';
        //total_business = (Number(member.total_left_business) + Number(member.total_right_business));
        total_business = (Number(member.total_self_business));
        if (total_business >= user_active_range) {
            is_active_icon_class = 'bg-success';
        } else if (total_business > 0) {
            is_active_icon_class = 'bg-warning';
        } else {
            is_active_icon_class = 'bg-danger';
        }
        if (user_type == 'ADMIN' && user_id == member.id) {
            is_admin_active_style = ' style="display:none !important;" ';
        }
        var photo_src = media_url + 'profile_photo/default-img.png';
        if (member.photo)
        {
            photo_src = media_url + 'profile_photo/' + member.photo;
        }
        team_html += '<tr>';
        team_html += '<td style="width:10%;">';
        team_html += '<div class="user-avatar">';
        team_html += '<img src=' + photo_src + ' alt="profile image" class="profile-img img-lg rounded-circle">';
        team_html += '<span class="edit-avatar-icon ' + is_active_icon_class + '" ' + is_admin_active_style + '></span>';
        team_html += '</div></td>';
        team_html += '<td style="width:24%;">';
        team_html += '<h4 class="mb-0 font-weight-medium">' + member.associate_name + '</h4>';
        team_html += '<h6 class="mb-0 font-weight-light">' + member.username + '</h6>';
        team_html += '<h6 class="mb-0 font-weight-light"></h6>';
        team_html += '</td>';
        team_html += '<td class="custom_icon" style="width:22%;">';
        team_html += '<p class="mb-0 font-weight-medium text-muted">LEFT BV</p>';
        team_html += '<h4 class="font-weight-semibold mb-0">' + member.total_left_business + '</h4>';
        team_html += '</td>';
        team_html += '<td class="custom_icon" style="width:22%;">';
        team_html += '<p class="mb-0 font-weight-medium text-muted">RIGHT BV</p>';
        team_html += '<h4 class="font-weight-semibold mb-0">' + member.total_right_business + '</h4>';
        team_html += '</td>';
        team_html += '<td class="custom_icon" style="width:22%;">';
        team_html += '<p class="mb-0 font-weight-medium text-muted">INTRODUCER</p>';
        team_html += '<h4 class="font-weight-semibold mb-0 text-primary">' + member.introducer_code + '</h4>';
        team_html += '</td>';
        team_html += '</tr>';
    });
    team_html += '</tbody></table>';
    $('#' + node).html(team_html);
    generateDataTable2(table_id);
}

function setCompactView(user_active_range, members, node) {
    var table_id = 'table-' + node;
    var team_html = '';
    team_html += '<div class="media">';
    team_html += '<div class="col-md-12 mb-3 p-0">';
    team_html += '<table class="table custom_team_table" id="' + table_id + '">';
    team_html += '<thead>';
    team_html += '<tr>';
    team_html += '<th>User</th>';
    team_html += '<th>User Id</th>';
    team_html += '<th>Name</th>';
    team_html += '<th>Left BV</th>';
    team_html += '<th>Right BV</th>';
    team_html += '<th>Matching BV</th>';
    team_html += '</tr>';
    team_html += '</thead>';
    team_html += '<tbody>';

    $.each(members, function (key, member) {
        var total_business = 0;
        var is_active_icon_class = '';
        var is_admin_active_style = '';
        //total_business = (Number(member.total_left_business) + Number(member.total_right_business));
        total_business = (Number(member.total_self_business));
        if (total_business >= user_active_range) {
            is_active_icon_class = 'bg-success';
        } else if (total_business > 0) {
            is_active_icon_class = 'bg-warning';
        } else {
            is_active_icon_class = 'bg-danger';
        }
        if (user_type == 'ADMIN' && user_id == member.id) {
            is_admin_active_style = ' style="display:none !important;" ';
        }
        var photo_src = media_url + 'profile_photo/default-img.png';
        if (member.photo)
        {
            photo_src = media_url + 'profile_photo/' + member.photo;
        }
        team_html += '<tr>';
        team_html += '<td class="py-1"><img src="' + photo_src + '" alt="image" /></td>';
        team_html += '<td> ' + member.username + '</td>';
        team_html += '<td> ' + member.associate_name + '</td>';
        team_html += '<td> ' + member.total_left_business + ' </td>';
        team_html += '<td> ' + member.total_right_business + ' </td>';
        team_html += '<td> ' + member.total_matching_amount + ' </td>';
        team_html += '</tr>';
    });
    team_html += '</tbody></table></div></div>';
    $('#' + node).html(team_html);
    generateDataTable2(table_id);
}