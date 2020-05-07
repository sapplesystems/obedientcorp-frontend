<?php include_once 'header.php'; ?>
<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="type_text">
                            <p class="mb-0">Welcome to <span class="typed-text"></span><span class="cursor">&nbsp;</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-md-4 stretch-card grid-margin ">
                <div class="card bg-gradient-danger card-img-holder text-white ">
                    <div class="card-body">
                        <img src="assets/images/dashboard/circle.svg " class="card-img-absolute " alt="circle-image " />
                        <h4 class="font-weight-normal mb-3 ">PinBonus <i class="mdi mdi-chart-line mdi-24px float-right "></i></h4>
                        <h2 class="mb-5">&#x20b9; 
                            <a href="pin-bonus" class="dashboard-box">
                                <span id="pin_bonus">0.00</span>
                            </a>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin ">
                <div class="card bg-gradient-info card-img-holder text-white ">
                    <div class="card-body">
                        <img src="assets/images/dashboard/circle.svg " class="card-img-absolute " alt="circle-image " />
                        <h4 class="font-weight-normal mb-3 ">Matching Income <i class="mdi mdi-bookmark-outline mdi-24px float-right "></i></h4>
                        <h2 class="mb-5">&#x20b9; 
                            <a href="matching-income" class="dashboard-box">
                                <span id="matching_income">0.00</span>
                            </a>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin ">
                <div class="card bg-gradient-success card-img-holder text-white ">
                    <div class="card-body">
                        <img src="assets/images/dashboard/circle.svg " class="card-img-absolute " alt="circle-image " />
                        <h4 class="font-weight-normal mb-3 ">Total Earning <i class="mdi mdi-diamond mdi-24px float-right "></i></h4>
                        <h2 class="mb-5">&#x20b9; 
                            <a href="income-fund-history" class="dashboard-box">
                                <span id="total_earning">0.00</span>
                            </a>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="clearfix">
                            <h4 class="card-title float-left">Business</h4>
                            <div id="visit-sale-chart-legend" class="rounded-legend legend-horizontal legend-top-right float-right"></div>
                        </div>
                        <canvas id="user_business_chart" class="mt-4"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-6 grid-margin stretch-card">
                <div class="card ">
                    <div class="card-body ">
                        <h4 class="card-title ">Rewards</h4>
                        <div class="d-block mt-4">
                            <div class="d-inline-block align-items-center text-muted font-weight-light ">
                                <i class="mdi mdi-trophy icon-sm mr-2 "></i>
                                <span>Current Rewards</span>
                            </div>
                            <div class="d-inline-block align-items-center text-muted font-weight-light float-right">
                                <i class="mdi mdi-trophy icon-sm mr-2 "></i>
                                <span>Next Rewards</span>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-sm-12">
                                <ul class="rewards_all">
                                    <li><span>&#8377; 25000 &nbsp;-&nbsp;</span><div><img src="images/img-1.jpg" /><span class="overlay"><span class="text_overlay">Bike</span></span></div></li>
                                    <li><span>&#8377; 70000 &nbsp;-&nbsp;</span><div><img src="images/img-2.jpg" /><span class="overlay"><span class="text_overlay">Renault Kwid</span></span></div></li>
                                </ul>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-12 text-right">
                                <a href="rewards" class="btn btn-primary btn-sm">View More</a>
                            </div>
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
                            <table class="table" id="due_payment_list"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <?php include_once 'footer.php'; ?>
    <script src="assets/javascript/dashboard.js"></script>