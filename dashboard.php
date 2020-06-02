<?php include_once 'header.php'; ?>

<?php
$news_part = '<div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body ">
                        <div class="type_text">
                            <p class="mb-0">News Updates</p>
                        </div>
                        <div class="news_update mt-4">
                            <marquee scrollamount="3" direction="up" onmouseover="stop();" onmouseout="start();" id="news-list">
                            </marquee>
                        </div>
                    </div>
                </div>
            </div>';
$all_menus = '<div class="col-xl-12 col-lg-12 col-md-12 col-sm-6 stretch-card">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="btn-group-vertical custom__vertical" role="group" aria-label="Basic example">
                                <a class="btn btn-success" href="rewards">View All Rewards</a>
                                <a class="btn btn-info" href="offers">View All Offers</a>
                                <a class="btn btn-warning" href="ranks">View All Ranks</a>
                                <a class="btn btn-primary" href="rankers">View All Rankers</a>
                            </div>
                        </div>
                    </div>
                </div>';
?>

<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper ">
        <?php if ($user_type == 'ADMIN') { ?>
            <div class="row custom_dashboard_card">
                <div class="col-12 grid-margin pending_req">
                    <div class="card">
                        <div class="row">
                            <div class="card-col col-md-4 border-right">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-center flex-column flex-sm-row">
                                        <a href="real-state-request">
                                            <span class="mr-0 mr-sm-3 font-32 text-primary" id="real_estate_pending_request">0</span>
                                        </a>
                                        <div class="wrapper text-center text-sm-left">
                                            <p class="card-text mb-0">Pending Requests</p>
                                            <div class="fluid-container">
                                                <h4 class="mb-0 font-weight-medium">Real Esate</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-col col-md-4 border-right">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-center flex-column flex-sm-row">
                                        <a href="consumer-goods-request">
                                            <span class="mr-0 mr-sm-3 font-32 text-danger" id="fmcg_pending_request">0</span>
                                        </a>
                                        <div class="wrapper text-center text-sm-left">
                                            <p class="card-text mb-0">Pending Requests</p>
                                            <div class="fluid-container">
                                                <h4 class="mb-0 font-weight-medium">FMCG</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-col col-md-4 border-right">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-center flex-column flex-sm-row">
                                        <a href="reward-request">
                                            <span class="mr-0 mr-sm-3 font-32 text-success" id="reward_pending_request">0</span>
                                        </a>
                                        <div class="wrapper text-center text-sm-left">
                                            <p class="card-text mb-0">Pending Requests</p>
                                            <div class="fluid-container">
                                                <h4 class="mb-0 font-weight-medium">Rewards</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-col col-md-4 border-right">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-center flex-column flex-sm-row">
                                        <a href="offer-request">
                                            <span class="mr-0 mr-sm-3 font-32 text-warning" id="offer_pending_request">0</span>
                                        </a>
                                        <div class="wrapper text-center text-sm-left">
                                            <p class="card-text mb-0">Pending Requests</p>
                                            <div class="fluid-container">
                                                <h4 class="mb-0 font-weight-medium">Offers</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-col col-md-4">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-center flex-column flex-sm-row">
                                        <a href="associate-list">
                                            <span class="mr-0 mr-sm-3 font-32 text-warning" id="kyc_pending_request">0</span>
                                        </a>
                                        <div class="wrapper text-center text-sm-left">
                                            <p class="card-text mb-0">Pending Requests</p>
                                            <div class="fluid-container">
                                                <h4 class="mb-0 font-weight-medium">KYC</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } else if ($user_type == 'AGENT') { ?>
            <div class="row custom_dashboard_card">
                <div class="col-md-4 stretch-card grid-margin ">
                    <div class="card bg-gradient-primary card-img-holder text-white ">
                        <div class="card-body">
                            <img src="assets/images/dashboard/circle.svg " class="card-img-absolute " alt="circle-image " />
                            <h4 class="font-weight-normal mb-3 ">Self Business Volume <i class="mdi mdi-chart-line mdi-24px float-right "></i></h4>
                            <h2 class="">
                                <a href="self-business-volume" class="dashboard-box">
                                    <span id="pin_bonus">0.00</span>
                                </a>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 stretch-card grid-margin ">
                    <div class="card bg-gradient-warning card-img-holder text-white ">
                        <div class="card-body">
                            <img src="assets/images/dashboard/circle.svg " class="card-img-absolute " alt="circle-image " />
                            <h4 class="font-weight-normal mb-3 ">Total Left BV<i class="mdi mdi-briefcase  mdi-24px float-right "></i></h4>
                            <h2 class="">
                                <span id="total_left_business">0.00</span>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 stretch-card grid-margin ">
                    <div class="card bg-gradient-danger card-img-holder text-white ">
                        <div class="card-body">
                            <img src="assets/images/dashboard/circle.svg " class="card-img-absolute " alt="circle-image " />
                            <h4 class="font-weight-normal mb-3 ">Total Right BV<i class="mdi mdi-briefcase mdi-24px float-right "></i></h4>
                            <h2 class=""> 
                                <span id="total_right_business">0.00</span>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 stretch-card grid-margin ">
                    <div class="card bg-gradient-success card-img-holder text-white ">
                        <div class="card-body">
                            <img src="assets/images/dashboard/circle.svg " class="card-img-absolute " alt="circle-image " />
                            <h4 class="font-weight-normal mb-3 ">Matching Income <i class="mdi mdi-chart-bar font24 float-right"></i></h4>
                            <h2 class="">&#x20b9;
                                <a href="matching-income" class="dashboard-box">
                                    <span id="matching_income">0.00</span>
                                </a>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 stretch-card grid-margin ">
                    <div class="card bg-gradient-info card-img-holder text-white ">
                        <div class="card-body">
                            <img src="assets/images/dashboard/circle.svg " class="card-img-absolute " alt="circle-image " />
                            <h4 class="font-weight-normal mb-3 ">Total Earning <i class="mdi mdi-bank mdi-24px float-right "></i></h4>
                            <h2 class="">&#x20b9;
                                <a href="income-fund-history" class="dashboard-box">
                                    <span id="total_earning">0.00</span>
                                </a>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if ($user_type == 'ADMIN') { ?>
            <!--PAYOUT DETAIL ROW START HERE-->
            <div class="row">
                <div class="col-md-12 mb-2 stretch-card">
                    <h4 class="card-title ">Payout Cycle Details</h4>
                </div>
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-6 grid-margin stretch-card">
                            <div class="card card-statistics">
                                <div class="card-body aligner-wrapper">
                                    <div class="absolute left top bottom h-100 v-strock-2 bg-warning"></div>
                                    <div class="clearfix">
                                        <div>
                                            <h3 class="font-weight-medium mb-3 text-warning">
                                                <i class="mdi mdi-calendar-today menu-icon icon-lg"></i> 
                                                <span class="float-right mt-4" id="last_week_no">Week 0</span>
                                            </h3>
                                            <div class="fluid-container">
                                                <p class="mb-1">Last Cycle : <span class="text-muted" id="last_cycle">-</span></p>
                                                <p class="mb-1">Total Payout : <span class="text-muted" id="total_payout">00.00</span></p>
                                                <p>Payout Date : <span class="text-muted" id="last_payout_date">-</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-6 grid-margin stretch-card">
                            <div class="card card-statistics">
                                <div class="card-body aligner-wrapper">
                                    <div class="absolute left top bottom h-100 v-strock-2 bg-danger"></div>
                                    <div class="clearfix">
                                        <div>
                                            <h3 class="font-weight-medium mb-3 text-danger">
                                                <i class="mdi mdi-calendar-today menu-icon icon-lg"></i>
                                                <span class="float-right mt-4" id="current_week_no">Week 0</span>
                                            </h3>
                                            <div class="fluid-container">
                                                <p class="mb-1">Current Cycle : <span class="text-muted" id="current_cycle">-</span></p>
                                                <p class="mb-1">Estimated Payout : <span class="text-muted" id="estimated_payout">00.00</span></p>
                                                <p>Upcoming Payout Date : <span class="text-muted" id="upcoming_payout_date">-</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo $all_menus; ?>
                    </div>
                </div>
                <?php echo $news_part; ?>
            </div>
            <!--PAYOUT DETAIL ROW END HERE-->
        <?php } else if ($user_type == 'AGENT') { ?>
            <!--LAST/NEXT REWARD ROW START HERE-->
            <div class="row">
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-6 grid-margin stretch-card">
                            <div class="card card-statistics">
                                <div class="card-body aligner-wrapper">
                                    <div class="absolute left top bottom h-100 v-strock-2 bg-warning"></div>
                                    <div class="clearfix">
                                        <div class="float-left">
                                            <i class="mdi mdi-receipt text-warning icon-lg"></i>
                                        </div>
                                        <div class="float-right mt-3">
                                            <p class="mb-0 text-right">Last Reward</p>
                                            <div class="fluid-container">
                                                <h3 class="font-weight-medium text-right mb-0" id="last_reward">&#8377; 0.00</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-6 grid-margin stretch-card">
                            <div class="card card-statistics">
                                <div class="card-body aligner-wrapper">
                                    <div class="absolute left top bottom h-100 v-strock-2 bg-danger"></div>
                                    <div class="clearfix">
                                        <div class="float-left">
                                            <i class="mdi mdi-cube text-danger icon-lg"></i>
                                        </div>
                                        <div class="float-right mt-3">
                                            <p class="mb-0 text-right">Next Reward</p>
                                            <div class="fluid-container">
                                                <h3 class="font-weight-medium text-right mb-0" id="current_reward">&#8377; 0.00</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo $all_menus; ?>
                    </div>
                </div>
                <?php echo $news_part; ?>
            </div>
            <!--LAST/NEXT REWARD ROW END HERE-->
        <?PHP } ?>
        <div class="row ">
            <div class="col-lg-12 grid-margin">
                <div class="card">
                    <div class="card-body ">
                        <h4 class="card-title ">Due Payments</h4>
                        <div class="table-responsive ">
                            <table class="table table-striped" id="due_payment_list"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <?php include_once 'footer.php'; ?>
    <script src="assets/javascript/dashboard.js"></script>