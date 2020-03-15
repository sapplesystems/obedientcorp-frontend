<?php include_once 'header.php'; ?>
<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-md-9">
                                <h4 class="card-title mb-4">Team Graphics View</h4>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="associate_code" placeholder="Enter Associate ID">
                                        <div class="input-group-append">
                                            <button class="btn btn-sm btn-gradient-primary" type="button" onclick="associateId();">View Team</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="top_row_members">
                                    <li id="total_left_member"><span><strong>Left Members</strong><br><img src="assets/images/members.png" /> 0</span></li>
                                    <li id="all_member"><span><strong>Total Members</strong><br><img src="assets/images/members.png" /> 0</span></li>
                                    <li id="total_right_member"><span><strong>Right Members</strong><br><img src="assets/images/members.png" /> 0</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Main component -->
                                <div class="hv-wrapper paddTB">
                                    <div class="hv-item">
                                        <div class="hv-item-parent" id="node1"></div>
                                        <div class="hv-item-children">
                                            <div class="hv-item-child">
                                                <div class="hv-item">
                                                    <div class="hv-item-parent" id="node2"></div>
                                                    <div class="hv-item-children second_div">
                                                        <div class="hv-item-child" id="node4"></div>
                                                        <div class="hv-item-child" id="node5"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="hv-item-child">
                                                <div class="hv-item">
                                                    <div class="hv-item-parent" id="node3"></div>
                                                    <div class="hv-item-children third_div">
                                                        <div class="hv-item-child" id="node6"></div>
                                                        <div class="hv-item-child" id="node7"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <!-- Main component Reversed-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <?php include_once 'footer.php'; ?>
        <script type="text/javascript">
            getTree(user_id);

            $(document).ready(function () {
                $('.hv-item').addClass("animated fadeInDown1").css("opacity", "0");
                $(document).on('click', '.info_click', function () {
                    $('.info_click label').hide()
                    $(this).find('label').show();
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
                        }
                        else {
                            showSwal('error', 'Failed', 'Something went wrong.');
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
        </script>