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
                <div class="card bg-gradient-success card-img-holder text-white ">
                    <div class="card-body">
                        <img src="assets/images/dashboard/circle.svg " class="card-img-absolute " alt="circle-image " />
                        <h4 class="font-weight-normal mb-3 ">Matching Income <i class="mdi mdi-diamond mdi-24px float-right "></i></h4>
                        <h2 class="">&#x20b9;
                            <a href="income-fund-history" class="dashboard-box">
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
                        <h4 class="font-weight-normal mb-3 ">Total Earning <i class="mdi mdi-bookmark-outline mdi-24px float-right "></i></h4>
                        <h2 class="">&#x20b9;
                            <span id="total_income">0.00</span>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin ">
                <div class="card bg-gradient-warning card-img-holder text-white ">
                    <div class="card-body">
                        <img src="assets/images/dashboard/circle.svg " class="card-img-absolute " alt="circle-image " />
                        <h4 class="font-weight-normal mb-3 ">Total Left BV<i class="mdi mdi-arrange-send-backward mdi-24px float-right "></i></h4>
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
                        <h4 class="font-weight-normal mb-3 ">Total Right BV<i class="mdi mdi-briefcase-check mdi-24px float-right "></i></h4>
                        <h2 class=""> 
                            <span id="total_right_business">0.00</span>
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
                    <div class="card-body" id="current_next_reward"></div>
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