<?php include_once 'header.php'; ?>
<style>
.team_style .dataTables_length label, .team_style .dataTables_filter label{display:inline-block !important;}
</style>
<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-md-12 customTabs team_style">
                                <ul class="nav nav-tabs border-0" role="tablist">
                                    <li class="nav-item">
                                        <a class="p-1 border-0 bg-transparent nav-link active" id="detail-view" data-toggle="tab" href="#detail-view-1" role="tab" aria-controls="detail-view" aria-selected="true"><i class="mdi mdi-format-list-bulleted icon-sm my-0 "></i></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="p-1 border-0 bg-transparent nav-link" id="compact-view" data-toggle="tab" href="#compact-view-1" role="tab" aria-controls="compact-view" aria-selected="false"><i class="mdi mdi-view-headline icon-sm my-0 "></i></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="p-1 border-0 bg-transparent nav-link" id="tree-view" data-toggle="tab" href="#tree-view-1" role="tab" aria-controls="tree-view" aria-selected="false"><i class="mdi mdi-file-tree icon-sm my-0 "></i></a>
                                    </li>
                                </ul>
                                <div class="tab-content border-0 p-0 mt-3">
                                    <div class="tab-pane fade show active" id="detail-view-1" role="tabpanel" aria-labelledby="detail-view">
                                        <ul class="nav nav-pills nav-pills-custom pl-3" id="pills-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="all_members" data-toggle="pill" href="#all-members" role="tab" aria-controls="pills-detail-view" aria-selected="true"> All Members List </a>
                                            </li>
                                            <!--li class="nav-item">
                                                <a class="nav-link" id="referral_members" data-toggle="pill" href="#referral-members" role="tab" aria-controls="pills-compact-view" aria-selected="false"> Referral Members List </a>
                                            </li-->
                                            <li class="nav-item">
                                                <a class="nav-link" id="members_in_left" data-toggle="pill" href="#members-in-left" role="tab" aria-controls="pills-tree-view" aria-selected="false"> Members in Left </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="members_in_right" data-toggle="pill" href="#members-in-right" role="tab" aria-controls="pills-tree-view" aria-selected="false"> Members in Right </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content tab-content-custom-pill" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="all-members" role="tabpanel" aria-labelledby="pills-detail-view"></div>
                                            <div class="tab-pane fade" id="referral-members" role="tabpanel" aria-labelledby="pills-compact-view"> </div>
                                            <div class="tab-pane fade" id="members-in-left" role="tabpanel" aria-labelledby="pills-tree-view"></div>
                                            <div class="tab-pane fade" id="members-in-right" role="tabpanel" aria-labelledby="pills-tree-view"></div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="compact-view-1" role="tabpanel" aria-labelledby="compact-view">
                                        <ul class="nav nav-pills nav-pills-custom" id="pills-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="list-all-members-tab" data-toggle="pill" href="#list-all-members" role="tab" aria-controls="pills-detail-view-2" aria-selected="true"> All Members List </a>
                                            </li>
                                            <!--li class="nav-item">
                                                <a class="nav-link" id="list-referral-members-tab" data-toggle="pill" href="#list-referral-members" role="tab" aria-controls="pills-compact-view-2" aria-selected="false"> Referral Members List </a>
                                            </li-->
                                            <li class="nav-item">
                                                <a class="nav-link" id="list-members-in-left-tab" data-toggle="pill" href="#list-members-in-left" role="tab" aria-controls="pills-tree-view-2" aria-selected="false"> Members in Left </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="list-members-in-right-tab" data-toggle="pill" href="#list-members-in-right" role="tab" aria-controls="pills-tree-view-2" aria-selected="false"> Members in Right </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content tab-content-custom-pill" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="list-all-members" role="tabpanel" aria-labelledby="pills-detail-view"></div>
                                            <div class="tab-pane fade" id="list-referral-members" role="tabpanel" aria-labelledby="pills-compact-view"></div>
                                            <div class="tab-pane fade" id="list-members-in-left" role="tabpanel" aria-labelledby="pills-tree-view"></div>
                                            <div class="tab-pane fade" id="list-members-in-right" role="tabpanel" aria-labelledby="pills-tree-view"></div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tree-view-1" role="tabpanel" aria-labelledby="tree-view">
                                        <div class="clearfix"></div>
                                        <?php include_once 'tree_view.php'; ?>
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
    <script type="text/javascript" src="assets/javascript/team.js"></script>
    <script type="text/javascript" src="assets/javascript/tree.js"></script>