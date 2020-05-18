<?php
include_once 'header.php';
?>
<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-0">Rewards</h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- BOXES -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <ul class="bg_hint">
                            <li><span></span> &nbsp;Achieved Reward</li>
                            <li><span></span> &nbsp;Current Reward</li>
                            <li><span></span> &nbsp;Next Reward</li>
                        </ul>
                        <div class="clearfix"></div>
                        <ul class="rewards_all_main">
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>

    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <?php include_once 'footer.php'; ?>
    <script type="text/javascript">
        getRewards();

        function getRewards() {
            $.ajax({
                url: base_url + 'reward-display',
                type: 'post',
                data: {
                    user_id: user_id
                },
                success: function(response) {

                    if (response.status == "success") {
                        var rewards = '';
                        var left_more = '';
                        var right_more = '';
                        var dynamic_msg = '';
                        $.each(response.data.rewards_list, function(key, value) {
                            var current_class = '';
                            dynamic_msg = 'You need ' + value.right_more + ' more business on right and ' + value.left_more + ' more business on left to get this reward';
                            if (value.current == 1) {
                                current_class = 'rank2';

                            } else if (value.achieved == 1) {
                                current_class = 'rank1';
                                dynamic_msg = 'You have already achieved this reward';
                            } else if (value.achieved == 0 && value.current == 0) {
                                current_class = 'rank3';
                            }
                            var path = 'images/' + value.photo;
                            
                            rewards += '<li><div id="f1_container"><div id="f1_card"><div class="front face ' + current_class + '"><span>&#8377; ' + value.amount + ' &nbsp;-&nbsp;</span><img src="' + path + '" /></div><div class="back face center"><p class="head_p">' + dynamic_msg + '</p></div></div></div></li>'
                        });
                        $('.rewards_all_main').append(rewards);

                    } else {
                        console.log("Not any image");
                    }
                }
            });

        }
    </script>