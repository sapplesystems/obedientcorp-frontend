<style>
.members_img{    height: 16px;
    border-radius: 0;
    margin-right: 0px;
    width: auto;}
</style>
<div class="card">
    <div class="card-body p-3">
        <div class="row">
            <div class="col-md-8">
                <h4 class="card-title mb-4">Team Graphics View</h4>
            </div>
            <div class="col-md-4">
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
                <!-- Main component -->
                <div class="hv-wrapper paddTB pt-0">
                    <div class="hv-item hv-item-div">
							<ul class="top_row_members mb-4">
							<li id="total_left_member"><span><strong>Left Members</strong><br><img class="members_img" src="assets/images/members.png" /> 0</span></li>
							<li id="all_member"><span><strong>Total Members</strong><br><img class="members_img"  src="assets/images/members.png" /> 0</span></li>
							<li id="total_right_member"><span><strong>Right Members</strong><br><img class="members_img"  src="assets/images/members.png" /> 0</span></li>
						</ul>
                        <button class="btn btn-sm btn-gradient-primary back_to_me" type="button" onclick="getTree(user_id);">Back to me</button>
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