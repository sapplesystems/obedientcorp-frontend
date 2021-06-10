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
                        <h4 class="card-title mb-0">Ranks</h4>
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
                            <li><span></span> &nbsp;Achieved Rank</li>
                            <li><span></span> &nbsp;Current Rank</li>
                            <li><span></span> &nbsp;Next Rank</li>
                        </ul>
                        <div class="clearfix"></div>
        <ul class="rewards_all_main">
        </ul>
		</div>
		</div>
		</div>
    </div>
    <div class="clearfix"></div>
	<div class="row mt-4"><div class="col-md-12 text-right"><a href="dashboard" class="btn btn-gradient-danger">Back</a></div></div>
		
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <?php include_once 'footer.php'; ?>
	<script type="text/javascript">
    getRewards();
    function getRewards() {
        $.ajax({
            url: base_url + 'rank-display',
            type: 'post',
            data:{user_id:user_id},
            success: function (response) {
                if (response.status == "success") {
                    var ranks = '';
                    var add_class = '';
                    var left_right_business ='';
                    $.each(response.data, function (key, value) {
                        left_right_business = ' <table class="table">\n\
                        <thead><tr><th></th><th>Target</th><th>Achieved</th><th>Required</th></tr></thead>\n\
                        <tbody>\n\
                        <tr><td><strong>Left BV</strong></td><td>'+value.left_target+'</td><td>'+value.left_achieved+'</td><td>'+value.left_required+'</td></tr>\n\
                        <tr><td><strong>Right BV</strong></td><td>'+value.right_target+'</td><td>'+value.right_achieved+'</td><td>'+value.right_required+'</td></tr>\n\
                        </tbody></table>';
                        if(value.achieved == 1)
                        {
                            add_class = 'rank1';
                            left_right_business = '<p class="head_p">You have already achieved this rank. </p>';
                        } else if(value.current == 1)
                        {
                            add_class = 'rank2';
                        }else if(value.next == 1)
                        {
                            add_class = 'rank3';
                        }
                        //rewards += '<li><div id="f1_container" class="height100"><div id="f1_card"><i class="mdi mdi-check-circle"></i><div class="front face"><div class="row mt-3"><div class="col-sm-4"><strong>Rank Achieved :</strong></div><div class="col-sm-8 text-left">Distributer</div></div></div><div class="back face center"><div class="row mt-3"><div class="col-sm-4"><h5 class="border-bottom pb-1"> Target </h5> <div>33673.73</div></div><div class="col-sm-4"><h5 class="border-bottom pb-1"> Achieved </h5><div>500.00</div></div><div class="col-sm-4"><h5 class="border-bottom pb-1"> Required </h5><div>500.00</div></div></div></div></div></div></li>'
                        ranks += '<li>\n\
                        <div class="main_hover">\n\
                        <div class="hoverClass height150 '+add_class+'"><div class="row">\n\
                        <div class="col-sm-4 col-4"><strong>Rank :</strong></div>\n\
                        <div class="col-sm-8 col-8 text-left">'+value.rank_title+'</div></div></div>\n\
                        <div class="hoverText center">\n\
						<div>\n\
                        '+left_right_business+'\n\
						</div>\n\
                       </div>\n\
                        </div></li>'
                    });
                    $('.rewards_all_main').append(ranks);

                } else {
                    console.log("Not any image");
                }
            }
        });

    }
</script>