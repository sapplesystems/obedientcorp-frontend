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
                        <h4 class="card-title mb-0">Rankers</h4>
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
                        //rewards += '<li><div id="f1_container" class="height100"><div id="f1_card"><i class="mdi mdi-check-circle"></i><div class="front face"><div class="row mt-3"><div class="col-sm-4"><strong>Rank Achieved :</strong></div><div class="col-sm-8 text-left">Distributer</div></div></div><div class="back face center"><div class="row mt-3"><div class="col-sm-4"><h5 class="border-bottom pb-1"> Target </h5> <div>33673.73</div></div><div class="col-sm-4"><h5 class="border-bottom pb-1"> Achieved </h5><div>500.00</div></div><div class="col-sm-4"><h5 class="border-bottom pb-1"> Required </h5><div>500.00</div></div></div></div></div></div></li>'
						rewards += '<li><div id="f1_container" class="height150"><div id="f1_card"><i class="mdi mdi-check-circle"></i><div class="front face"><div class="row mt-40"><div class="col-sm-5"><strong>Rank Achieved :</strong></div><div class="col-sm-7 text-left">Distributer</div></div></div><div class="back face center"><table class="table"><thead><tr><th></th><th>Target</th><th>Achieved</th><th>Required</th></tr></thead><tbody><tr><td><strong>Left Business</strong></td><td>33673.73</td><td>33673.73</td><td>33673.73</td></tr><tr><td><strong>Right Business</strong></td><td>33673.73</td><td>33673.73</td><td>33673.73</td></tr></tbody></table></div></div></div></li>'
                    });
                    $('.rewards_all_main').append(rewards);

                } else {
                    console.log("Not any image");
                }
            }
        });

    }
</script>