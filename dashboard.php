<?php include_once 'header.php'; ?>
<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body p-3">
                        <marquee>
                            <h4 class="mb-0">*WELCOME TO OBEDIENT GROUP*</h4>
                        </marquee>
                    </div>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-md-4 stretch-card grid-margin ">
                <div class="card bg-gradient-danger card-img-holder text-white ">
                    <div class="card-body ">
                        <img src="assets/images/dashboard/circle.svg " class="card-img-absolute " alt="circle-image " />
                        <h4 class="font-weight-normal mb-3 ">PinBonus <i class="mdi mdi-chart-line mdi-24px float-right "></i>
                        </h4>
                        <h2 class="mb-5">&#x20b9; <span id="pin_bonus">0.00</span></h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin ">
                <div class="card bg-gradient-info card-img-holder text-white ">
                    <div class="card-body ">
                        <img src="assets/images/dashboard/circle.svg " class="card-img-absolute " alt="circle-image " />
                        <h4 class="font-weight-normal mb-3 ">Matching Income <i class="mdi mdi-bookmark-outline mdi-24px float-right "></i>
                        </h4>
                        <h2 class="mb-5">&#x20b9; <span id="matching_income">0.00</span></h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin ">
                <div class="card bg-gradient-success card-img-holder text-white ">
                    <div class="card-body ">
                        <img src="assets/images/dashboard/circle.svg " class="card-img-absolute " alt="circle-image " />
                        <h4 class="font-weight-normal mb-3 ">Total Earning <i class="mdi mdi-diamond mdi-24px float-right "></i>
                        </h4>
                        <h2 class="mb-5">&#x20b9; <span id="total_earning">0.00</span></h2>
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
                        <div class="d-flex ">
                            <div class="d-flex align-items-center text-muted font-weight-light ">
                                <i class="mdi mdi-clock icon-sm mr-2 "></i>
                                <span>October 3rd, 2018</span>
                            </div>
                        </div>
                        <div class="row mt-3 ">
                            <div class="col-6 pr-1 ">
                                <img src="assets/images/dashboard/img_1.jpg " class="mb-2 mw-100 w-100 rounded " alt="image ">
                                <img src="assets/images/dashboard/img_4.jpg " class="mw-100 w-100 rounded " alt="image ">
                            </div>
                            <div class="col-6 pl-1 ">
                                <img src="assets/images/dashboard/img_2.jpg " class="mb-2 mw-100 w-100 rounded " alt="image ">
                                <img src="assets/images/dashboard/img_3.jpg " class="mw-100 w-100 rounded " alt="image ">
                            </div>
                        </div>
                        <div class="d-flex mt-5 align-items-top ">
                            <img src="assets/images/faces/face3.jpg " class="img-sm rounded-circle mr-3 " alt="image ">
                            <div class="mb-0 flex-grow ">
                                <h5 class="mr-2 mb-2 ">School Website - Authentication Module.</h5>
                                <p class="mb-0 font-weight-light ">It is a long established fact that a reader will be distracted by the readable content of a page.</p>
                            </div>
                            <div class="ml-auto ">
                                <i class="mdi mdi-heart-outline text-muted "></i>
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
                        <h4 class="card-title ">My Referals</h4>
                        <div class="table-responsive ">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th> Assignee </th>
                                        <th> Subject </th>
                                        <th> Status </th>
                                        <th> Tracking ID </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <img src="assets/images/faces/face1.jpg " class="mr-2 " alt="image "> David Grey </td>
                                        <td> Fund is not recieved </td>
                                        <td>
                                            <label class="badge badge-gradient-success ">DONE</label>
                                        </td>
                                        <td> WD-12345 </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="assets/images/faces/face2.jpg " class="mr-2 " alt="image "> Stella Johnson </td>
                                        <td> High loading time </td>
                                        <td>
                                            <label class="badge badge-gradient-warning ">PROGRESS</label>
                                        </td>
                                        <td> WD-12346 </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="assets/images/faces/face3.jpg " class="mr-2 " alt="image "> Marina Michel </td>
                                        <td> Website down for one week </td>
                                        <td>
                                            <label class="badge badge-gradient-info ">ON HOLD</label>
                                        </td>
                                        <td> WD-12347 </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="assets/images/faces/face4.jpg " class="mr-2 " alt="image "> John Doe </td>
                                        <td> Loosing control on server </td>
                                        <td>
                                            <label class="badge badge-gradient-danger ">REJECTED</label>
                                        </td>
                                        <td> WD-12348 </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <?php include_once 'footer.php'; ?>
    <script src="assets/javascript/dashboard.js"></script>