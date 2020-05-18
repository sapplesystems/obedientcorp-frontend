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
            url: base_url + 'rewards',
            type: 'post',
            success: function (response) {
                if (response.status == "success") {
                    var rewards = '';
                    $.each(response.data, function (key, value) {
                        var path = 'images/' + value.photo;
                        rewards += '<li><div id="f1_container"><div id="f1_card"><i class="mdi mdi-bookmark"><i class="mdi mdi-check-circle-outline"></i></i><div class="front face"><span>&#8377; ' + value.amount + ' &nbsp;-&nbsp;</span><img src="' + path + '" /></div><div class="back face center"><p class="head_p">You need X more business on right and Y more business on left to get this reward</p></div></div></div></li>'
                    });
                    $('.rewards_all_main').append(rewards);

                } else {
                    console.log("Not any image");
                }
            }
        });

    }
</script>