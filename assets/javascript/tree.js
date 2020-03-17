getTree(user_id);

$(document).ready(function () {
    $(document).on('click', '.info_click', function () {
        $(this).find('label').toggle();
    });
});

function associateId() {
    var code = document.getElementById('associate_code');
    if (code.value == '') {
        code.focus();
        return false;
    }
    $.ajax({
        url: base_url + 'associate-id',
        type: 'post',
        data: {introducer_code: code.value},
        success: function (response) {
            if (response.status == "success") {
                getTree(response.data.id);
            }
            else {
                showSwal('error', 'Failed', 'Something went wrong.');
            }

        }
    });
}

function getTree(user_id) {
    showLoader();
    $('.hv-item').removeClass("animated fadeInDown1").css("opacity", "0");
    setEmptyNode('node1');
    setEmptyNode('node2');
    setEmptyNode('node3');
    setEmptyNode('node4');
    setEmptyNode('node5');
    setEmptyNode('node6');
    setEmptyNode('node7');
    $.ajax({
        url: base_url + 'tree',
        type: 'post',
        data: {id: user_id},
        success: function (response) {
            if (response.status == "success") {
                $('#total_left_member').html('<span><strong>Left Members</strong><br><img src="assets/images/members.png" /> ' + response.data.total_left_member + '</span>');
                $('#total_right_member').html('<span><strong>Right Members</strong><br><img src="assets/images/members.png" /> ' + response.data.total_right_member + '</span>');
                $('#all_member').html('<span><strong>All Members</strong><br><img src="assets/images/members.png" /> ' + response.data.all_member + '</span>');
                var node1 = response.data.node1;
                var node2 = response.data.node2;
                var node3 = response.data.node3;
                var node4 = response.data.node4;
                var node5 = response.data.node5;
                var node6 = response.data.node6;
                var node7 = response.data.node7;
                if (node1 && node1.id) {
                    setNode(node1, 'node1', '');
                }
                if (node2 && node2.id) {
                    setNode(node2, 'node2', '1');
                }
                if (node3 && node3.id) {
                    setNode(node3, 'node3', '1');
                }
                if (node4 && node4.id) {
                    setNode(node4, 'node4', '1');
                }
                if (node5 && node5.id) {
                    setNode(node5, 'node5', '1');
                }
                if (node6 && node6.id) {
                    setNode(node6, 'node6', '1');
                }
                if (node7 && node7.id) {
                    setNode(node7, 'node7', '1');
                }
                $('.hv-item').addClass("animated fadeInDown1").css("opacity", "0");
                hideLoader();
            }
            else {
                showSwal('error', 'Failed', 'Something went wrong.');
                hideLoader();
            }

        }
    });
}

function setNode(object, node_id, link) {
    var photo_src = media_url + 'profile_photo/' + object.photo;
    var html = '<img src="' + photo_src + '" class="">' + object.username;
    if (link && link != '') {
        html = '<span class="main_div_img"><img src="' + photo_src + '" class=""><i class="bg-danger"></i></span>' + object.username;
        html += '<a href="javascript:void(0);" class="view_det" onclick="getTree(' + object.id + ');">[ View Team ]</a>';
    }

    $('#' + node_id).html('<p>\n\
                            <span>\n\
                                <strong>' + object.associate_name + '</strong>\n\
                                <span class="info_click">\n\
                                    <i class="mdi mdi-information-outline"></i>\n\
                                    <label><strong>Sponser Id</strong> - ' + object.introducer_code + '<br />\n\
                                        <strong>Sponser Name</strong> - ' + object.introducer_name + '<br />\n\
                                        <strong>Joining Date</strong> - ' + object.joining_date + '</label>\n\
                                </span>\n\
                            </span>\n\
                            ' + html + '<br>\n\
                            <span class="width50"><strong>Left Business</strong><br>\n\&#8377 ' + object.total_left_business + '</span>\n\
                            <span class="width50 marginLeft5">\n\
                                <strong>Right Business</strong>\n\\n\
                                <br>&#8377 ' + object.total_right_business + '</span>\n\
                        </p>');
}

function setEmptyNode(node_id) {
    $('#' + node_id).html('<p><span><strong class="text-danger">Empty</strong></span><img src="assets/images/default-img.png" class=""></p>');
}