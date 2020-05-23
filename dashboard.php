<?php include_once 'header.php'; ?>

<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper ">
        <!--<div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="type_text">
                            <p class="mb-0">Welcome to <span class="typed-text"></span><span class="cursor">&nbsp;</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
        <div class="row custom_dashboard_card">
            <div class="col-md-4 stretch-card grid-margin ">
                <div class="card bg-gradient-primary card-img-holder text-white ">
                    <div class="card-body">
                        <img src="assets/images/dashboard/circle.svg " class="card-img-absolute " alt="circle-image " />
                        <h4 class="font-weight-normal mb-3 ">Self Business Volume <i class="mdi mdi-briefcase  mdi-24px float-right "></i></h4>
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
                        <h4 class="font-weight-normal mb-3 ">Matching Income <i class="mdi mdi-bank mdi-24px float-right "></i></h4>
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
                                <span id="total_income">0.00</span>
                            </a>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!--<div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="clearfix">
                            <h4 class="card-title float-left">Business</h4>
                            <div id="visit-sale-chart-legend" class="rounded-legend legend-horizontal legend-top-right float-right"></div>
                        </div>
                        <canvas id="user_business_chart" class="mt-4"></canvas>
                    </div>
                </div>
            </div>-->

            <div class="col-md-4 grid-margin stretch-card">
                <div class="row" id="current_next_reward">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-6 grid-margin stretch-card">
                        <div class="card card-statistics">
                            <div class="card-body aligner-wrapper">
                                <div class="absolute left top bottom h-100 v-strock-2 bg-warning"></div>
                                <div class="clearfix">
                                    <div class="float-left">
                                        <i class="mdi mdi-receipt text-warning icon-lg"></i>
                                    </div>
                                    <div class="float-right mt-3">
                                        <p class="mb-0 text-right">Current Reward</p>
                                        <div class="fluid-container">
                                            <h3 class="font-weight-medium text-right mb-0">&#8377; 0.00</h3>
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
                                            <h3 class="font-weight-medium text-right mb-0">&#8377; 0.00</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-6 stretch-card">
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
                    </div>
                </div>
            </div>

            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body ">
                        <div class="type_text">
                            <p class="mb-0">Welcome to <span class="typed-text"></span><span class="cursor">&nbsp;</span></p>
                        </div>
                        <div class="news_update mt-4">
                            <marquee scrollamount="3" direction="up" onmouseover="stop();" onmouseout="start();">
                                <div class="list-item">
                                    <div class="preview-image">
                                        <img class="img-sm rounded-circle" src="images/logo_header.png" alt="profile image">
                                    </div>
                                    <div class="content">
                                        <div class="d-flex align-items-center">
                                            <h6 class="product-name">Obedient Group</h6>
                                            <small class="time ml-3">08.34 AM</small>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <p class="review-text d-block textFull">We are one of leading Indian Company in Site Development, Land Development, Construction etc. Our Company is incorporated as 'Obedient Corporation' from 20 June 2018, and now this Company incorporated as Obedient Infra Development Pvt. Ltd. A Private Limited Company under the Companies Act, 2013 pursuant to Certificate of Incorporation dated September 29, 2018.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-item">
                                    <div class="preview-image">
                                        <img class="img-sm rounded-circle" src="images/logo_header.png" alt="profile image">
                                    </div>
                                    <div class="content">
                                        <div class="d-flex align-items-center">
                                            <h6 class="product-name">Obedient Group</h6>
                                            <small class="time ml-3">08.34 AM</small>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <p class="review-text d-block textFull">We are one of leading Indian Company in Site Development, Land Development, Construction etc. Our Company is incorporated as 'Obedient Corporation' from 20 June 2018, and now this Company incorporated as Obedient Infra Development Pvt. Ltd. A Private Limited Company under the Companies Act, 2013 pursuant to Certificate of Incorporation dated September 29, 2018.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-item">
                                    <div class="preview-image">
                                        <img class="img-sm rounded-circle" src="images/logo_header.png" alt="profile image">
                                    </div>
                                    <div class="content">
                                        <div class="d-flex align-items-center">
                                            <h6 class="product-name">Obedient Group</h6>
                                            <small class="time ml-3">08.34 AM</small>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <p class="review-text d-block textFull">We are one of leading Indian Company in Site Development, Land Development, Construction etc. Our Company is incorporated as 'Obedient Corporation' from 20 June 2018, and now this Company incorporated as Obedient Infra Development Pvt. Ltd. A Private Limited Company under the Companies Act, 2013 pursuant to Certificate of Incorporation dated September 29, 2018.</p>
                                        </div>
                                    </div>
                                </div>
                            </marquee>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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