<?php include_once 'header.php'; ?>
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-md-12 customTabs">
                                <ul class="nav nav-pills nav-pills-custom" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-health" role="tab" aria-controls="pills-home" aria-selected="true"> Pending Approval </a>
                                    </li>
                                    <!--<li class="nav-item">
                                                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-career" role="tab" aria-controls="pills-profile" aria-selected="false"> Referal Income </a>
                                                        </li>-->
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-music" role="tab" aria-controls="pills-contact" aria-selected="false"> Upcoming </a>
                                    </li>
                                </ul>
                                <div class="tab-content tab-content-custom-pill" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-health" role="tabpanel" aria-labelledby="pills-home-tab">

                                        <table class="table table-striped payment_request">
                                            <thead>
                                                <tr>
                                                    <th> Type </th>
                                                    <th> Amount </th>
                                                    <th> Agent </th>
                                                    <th> Details </th>
                                                    <th> Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="py-1">
                                                        <i class="mdi mdi-ticket"></i>
                                                    </td>
                                                    <td> Rs. 55000 </td>
                                                    <td>
                                                        Ramesh (OA1030)
                                                    </td>
                                                    <td> <a href="javascript:void(0);">View More Details</a> </td>
                                                    <td> <i class="mdi mdi-check-circle" onclick="showSwal('success-message')"></i> &nbsp;<i class="mdi mdi-close-circle" onclick="showSwal('warning-message-and-cancel')"></i> </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-1">
                                                        <i class="mdi mdi-ticket"></i>
                                                    </td>
                                                    <td> Rs. 55000 </td>
                                                    <td>
                                                        Ramesh (OA1030)
                                                    </td>
                                                    <td> <a href="javascript:void(0);">View More Details</a> </td>
                                                    <td> <i class="mdi mdi-check-circle" onclick="showSwal('success-message')"></i> &nbsp;<i class="mdi mdi-close-circle" onclick="showSwal('warning-message-and-cancel')"></i> </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-1">
                                                        <i class="mdi mdi-ticket"></i>
                                                    </td>
                                                    <td> Rs. 55000 </td>
                                                    <td>
                                                        Ramesh (OA1030)
                                                    </td>
                                                    <td> <a href="javascript:void(0);">View More Details</a> </td>
                                                    <td> <i class="mdi mdi-check-circle" onclick="showSwal('success-message')"></i> &nbsp;<i class="mdi mdi-close-circle" onclick="showSwal('warning-message-and-cancel')"></i> </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-1">
                                                        <i class="mdi mdi-ticket"></i>
                                                    </td>
                                                    <td> Rs. 55000 </td>
                                                    <td>
                                                        Ramesh (OA1030)
                                                    </td>
                                                    <td> <a href="javascript:void(0);">View More Details</a> </td>
                                                    <td> <i class="mdi mdi-check-circle" onclick="showSwal('success-message')"></i> &nbsp;<i class="mdi mdi-close-circle" onclick="showSwal('warning-message-and-cancel')"></i> </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-1">
                                                        <i class="mdi mdi-ticket"></i>
                                                    </td>
                                                    <td> Rs. 55000 </td>
                                                    <td>
                                                        Ramesh (OA1030)
                                                    </td>
                                                    <td> <a href="javascript:void(0);">View More Details</a> </td>
                                                    <td> <i class="mdi mdi-check-circle" onclick="showSwal('success-message')"></i> &nbsp;<i class="mdi mdi-close-circle" onclick="showSwal('warning-message-and-cancel')"></i> </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-1">
                                                        <i class="mdi mdi-ticket"></i>
                                                    </td>
                                                    <td> Rs. 55000 </td>
                                                    <td>
                                                        Ramesh (OA1030)
                                                    </td>
                                                    <td> <a href="javascript:void(0);">View More Details</a> </td>
                                                    <td> <i class="mdi mdi-check-circle" onclick="showSwal('success-message')"></i> &nbsp;<i class="mdi mdi-close-circle" onclick="showSwal('warning-message-and-cancel')"></i> </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                    <!--<div class="tab-pane fade" id="pills-career" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <table class="table table-striped">
                                                                    <thead>
                                                                        <tr>
                                                                            <th> User </th>
                                                                            <th> First name </th>
                                                                            <th> Progress </th>
                                                                            <th> Amount </th>
                                                                            <th> Deadline </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="py-1">
                                                                                <img src="../assets/images/faces-clipart/pic-1.png" alt="image" />
                                                                            </td>
                                                                            <td> Herman Beck </td>
                                                                            <td>
                                                                                <div class="progress">
                                                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td> $ 77.99 </td>
                                                                            <td> May 15, 2015 </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="py-1">
                                                                                <img src="../assets/images/faces-clipart/pic-2.png" alt="image" />
                                                                            </td>
                                                                            <td> Messsy Adam </td>
                                                                            <td>
                                                                                <div class="progress">
                                                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td> $245.30 </td>
                                                                            <td> July 1, 2015 </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="py-1">
                                                                                <img src="../assets/images/faces-clipart/pic-3.png" alt="image" />
                                                                            </td>
                                                                            <td> John Richards </td>
                                                                            <td>
                                                                                <div class="progress">
                                                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td> $138.00 </td>
                                                                            <td> Apr 12, 2015 </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="py-1">
                                                                                <img src="../assets/images/faces-clipart/pic-4.png" alt="image" />
                                                                            </td>
                                                                            <td> Peter Meggik </td>
                                                                            <td>
                                                                                <div class="progress">
                                                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td> $ 77.99 </td>
                                                                            <td> May 15, 2015 </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                          </div>-->
                                    <div class="tab-pane fade" id="pills-music" role="tabpanel" aria-labelledby="pills-contact-tab">
                                        <table class="table table-striped payment_request">
                                            <thead>
                                                <tr>
                                                    <th> Type </th>
                                                    <th> Amount </th>
                                                    <th> Agent </th>
                                                    <th> Details </th>
                                                    <th> Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="py-1">
                                                        <i class="mdi mdi-ticket"></i>
                                                    </td>
                                                    <td> Rs. 55000 </td>
                                                    <td>
                                                        Ramesh (OA1030)
                                                    </td>
                                                    <td> <a href="javascript:void(0);">View More Details</a> </td>
                                                    <td> <i class="mdi mdi-check-circle" onclick="showSwal('success-message')"></i> &nbsp;<i class="mdi mdi-close-circle" onclick="showSwal('warning-message-and-cancel')"></i> </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-1">
                                                        <i class="mdi mdi-ticket"></i>
                                                    </td>
                                                    <td> Rs. 55000 </td>
                                                    <td>
                                                        Ramesh (OA1030)
                                                    </td>
                                                    <td> <a href="javascript:void(0);">View More Details</a> </td>
                                                    <td> <i class="mdi mdi-check-circle" onclick="showSwal('success-message')"></i> &nbsp;<i class="mdi mdi-close-circle" onclick="showSwal('warning-message-and-cancel')"></i> </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-1">
                                                        <i class="mdi mdi-ticket"></i>
                                                    </td>
                                                    <td> Rs. 55000 </td>
                                                    <td>
                                                        Ramesh (OA1030)
                                                    </td>
                                                    <td> <a href="javascript:void(0);">View More Details</a> </td>
                                                    <td> <i class="mdi mdi-check-circle" onclick="showSwal('success-message')"></i> &nbsp;<i class="mdi mdi-close-circle" onclick="showSwal('warning-message-and-cancel')"></i> </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-1">
                                                        <i class="mdi mdi-ticket"></i>
                                                    </td>
                                                    <td> Rs. 55000 </td>
                                                    <td>
                                                        Ramesh (OA1030)
                                                    </td>
                                                    <td> <a href="javascript:void(0);">View More Details</a> </td>
                                                    <td> <i class="mdi mdi-check-circle" onclick="showSwal('success-message')"></i> &nbsp;<i class="mdi mdi-close-circle" onclick="showSwal('warning-message-and-cancel')"></i> </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-1">
                                                        <i class="mdi mdi-ticket"></i>
                                                    </td>
                                                    <td> Rs. 55000 </td>
                                                    <td>
                                                        Ramesh (OA1030)
                                                    </td>
                                                    <td> <a href="javascript:void(0);">View More Details</a> </td>
                                                    <td> <i class="mdi mdi-check-circle" onclick="showSwal('success-message')"></i> &nbsp;<i class="mdi mdi-close-circle" onclick="showSwal('warning-message-and-cancel')"></i> </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-1">
                                                        <i class="mdi mdi-ticket"></i>
                                                    </td>
                                                    <td> Rs. 55000 </td>
                                                    <td>
                                                        Ramesh (OA1030)
                                                    </td>
                                                    <td> <a href="javascript:void(0);">View More Details</a> </td>
                                                    <td> <i class="mdi mdi-check-circle" onclick="showSwal('success-message')"></i> &nbsp;<i class="mdi mdi-close-circle" onclick="showSwal('warning-message-and-cancel')"></i> </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once 'footer.php'; ?>