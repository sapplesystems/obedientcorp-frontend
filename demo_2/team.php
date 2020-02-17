<?php include_once 'header.php'; ?>
            <!-- partial -->
            <div class="main-panel ">
                <div class="content-wrapper ">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body p-3">
                                    <div class="row">
                                        <div class="col-md-12 customTabs">
                                            <ul class="nav nav-tabs border-0" role="tablist">
                                                <li class="nav-item">
                                                    <a class="p-1 border-0 bg-transparent nav-link active" id="home-tab" data-toggle="tab" href="#home-1" role="tab" aria-controls="home" aria-selected="true"><i class="mdi mdi-format-list-bulleted icon-sm my-0 "></i></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="p-1 border-0 bg-transparent nav-link" id="profile-tab" data-toggle="tab" href="#profile-1" role="tab" aria-controls="profile" aria-selected="false"><i class="mdi mdi-menu icon-sm my-0 "></i></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="p-1 border-0 bg-transparent nav-link" id="contact-tab" data-toggle="tab" href="#contact-1" role="tab" aria-controls="contact" aria-selected="false"><i class="mdi mdi-file-tree icon-sm my-0 "></i></a>
                                                </li>
                                            </ul>
                                            <div class="tab-content  border-0 p-0 mt-3">
                                                <div class="tab-pane fade show active" id="home-1" role="tabpanel" aria-labelledby="home-tab">
                                                    <ul class="nav nav-pills nav-pills-custom" id="pills-tab" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-health" role="tab" aria-controls="pills-home" aria-selected="true"> All Members List </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-career" role="tab" aria-controls="pills-profile" aria-selected="false"> Referal Members List </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-music" role="tab" aria-controls="pills-contact" aria-selected="false"> Members in Left </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-vibes" role="tab" aria-controls="pills-contact" aria-selected="false"> Members in Right </a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content tab-content-custom-pill" id="pills-tabContent">
                                                        <div class="tab-pane fade show active" id="pills-health" role="tabpanel" aria-labelledby="pills-home-tab">
                                                            <div class="col-md-12 mb-3 border p-0">
                                                                <div class="card rounded shadow-none">
                                                                    <div class="card-body pt-3 pb-3">
                                                                        <div class="row">
                                                                            <div class="col-sm-6 col-lg-5 d-lg-flex">
                                                                                <div class="user-avatar mb-auto">
                                                                                    <img src="../assets/images/faces/face1.jpg" alt="profile image" class="profile-img img-lg rounded-circle">
                                                                                    <span class="edit-avatar-icon bg-success"></span>
                                                                                </div>
                                                                                <div class="wrapper pl-lg-4">
                                                                                    <div class="wrapper d-flex align-items-center mt-2">
                                                                                        <h4 class="mb-0 font-weight-medium">Danny Santiago</h4>
                                                                                    </div>
                                                                                    <div class="wrapper d-flex align-items-center mt-1">
                                                                                        <h6 class="mb-0 font-weight-light">OA32675</h6>
                                                                                    </div>
                                                                                    <div class="wrapper d-flex align-items-center mt-1">
                                                                                        <h6 class="mb-0 font-weight-light">Senior Associate Partner</h6>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6 col-lg-5">
                                                                                <div class="d-flex align-items-center w-100">
                                                                                    <p class="mb-0 mr-3 font-weight-semibold">Progress</p>
                                                                                    <div class="progress progress-md w-100">
                                                                                        <div class="progress-bar bg-success" role="progressbar" style="width: 67%" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100"></div>
                                                                                    </div>
                                                                                    <p class="mb-0 ml-3 font-weight-semibold">67%</p>
                                                                                </div>
                                                                                <div class="row mt-3">
                                                                                    <div class="col d-flex">
                                                                                        <div class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted">
                                                                                            <i class="mdi mdi-star-circle icon-sm my-0 "></i>
                                                                                        </div>
                                                                                        <div class="wrapper pl-3">
                                                                                            <p class="mb-0 font-weight-medium text-muted">TOTAL LEFT</p>
                                                                                            <h4 class="font-weight-semibold mb-0">350,897</h4>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col d-flex">
                                                                                        <div class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted">
                                                                                            <i class="mdi mdi-star-circle icon-sm my-0 "></i>
                                                                                        </div>
                                                                                        <div class="wrapper pl-3">
                                                                                            <p class="mb-0 font-weight-medium text-muted">TOTAL RIGHT</p>
                                                                                            <h4 class="font-weight-semibold mb-0">2,356</h4>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6 col-lg-2">
                                                                                <div class="wrapper d-flex">
                                                                                    <div class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted">
                                                                                        <i class="mdi mdi-account-plus icon-sm my-0 "></i>
                                                                                    </div>
                                                                                    <div class="wrapper pl-3">
                                                                                        <p class="mb-0 font-weight-medium text-muted">INTRODUCER</p>
                                                                                        <h4 class="font-weight-semibold mb-0 text-primary">Sapple Systems</h4>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="pills-career" role="tabpanel" aria-labelledby="pills-profile-tab">
                                                            <div class="media">
                                                                <div class="col-md-12 mb-4 border p-0">
                                                                    <div class="card rounded shadow-none">
                                                                        <div class="card-body pt-3 pb-3">
                                                                            <div class="row">
                                                                                <div class="col-sm-6 col-lg-5 d-lg-flex">
                                                                                    <div class="user-avatar mb-auto">
                                                                                        <img src="../assets/images/faces/face1.jpg" alt="profile image" class="profile-img img-lg rounded-circle">
                                                                                        <span class="edit-avatar-icon bg-success"></span>
                                                                                    </div>
                                                                                    <div class="wrapper pl-lg-4">
                                                                                        <div class="wrapper d-flex align-items-center mt-2">
                                                                                            <h4 class="mb-0 font-weight-medium">Danny Santiago</h4>
                                                                                        </div>
                                                                                        <div class="wrapper d-flex align-items-center mt-1">
                                                                                            <h6 class="mb-0 font-weight-light">OA32675</h6>
                                                                                        </div>
                                                                                        <div class="wrapper d-flex align-items-center mt-1">
                                                                                            <h6 class="mb-0 font-weight-light">Senior Associate Partner</h6>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6 col-lg-5">
                                                                                    <div class="d-flex align-items-center w-100">
                                                                                        <p class="mb-0 mr-3 font-weight-semibold">Progress</p>
                                                                                        <div class="progress progress-md w-100">
                                                                                            <div class="progress-bar bg-success" role="progressbar" style="width: 67%" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100"></div>
                                                                                        </div>
                                                                                        <p class="mb-0 ml-3 font-weight-semibold">67%</p>
                                                                                    </div>
                                                                                    <div class="row mt-3">
                                                                                        <div class="col d-flex">
                                                                                            <div class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted">
                                                                                                <i class="mdi mdi-star-circle icon-sm my-0 "></i>
                                                                                            </div>
                                                                                            <div class="wrapper pl-3">
                                                                                                <p class="mb-0 font-weight-medium text-muted">TOTAL LEFT</p>
                                                                                                <h4 class="font-weight-semibold mb-0">350,897</h4>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col d-flex">
                                                                                            <div class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted">
                                                                                                <i class="mdi mdi-star-circle icon-sm my-0 "></i>
                                                                                            </div>
                                                                                            <div class="wrapper pl-3">
                                                                                                <p class="mb-0 font-weight-medium text-muted">TOTAL RIGHT</p>
                                                                                                <h4 class="font-weight-semibold mb-0">2,356</h4>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6 col-lg-2">
                                                                                    <div class="wrapper d-flex">
                                                                                        <div class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted">
                                                                                            <i class="mdi mdi-account-plus icon-sm my-0 "></i>
                                                                                        </div>
                                                                                        <div class="wrapper pl-3">
                                                                                            <p class="mb-0 font-weight-medium text-muted">INTRODUCER</p>
                                                                                            <h4 class="font-weight-semibold mb-0 text-primary">Sapple Systems</h4>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="pills-music" role="tabpanel" aria-labelledby="pills-contact-tab">
                                                            <div class="media">
                                                                <div class="col-md-12 mb-4 border p-0">
                                                                    <div class="card rounded shadow-none">
                                                                        <div class="card-body pt-3 pb-3">
                                                                            <div class="row">
                                                                                <div class="col-sm-6 col-lg-5 d-lg-flex">
                                                                                    <div class="user-avatar mb-auto">
                                                                                        <img src="../assets/images/faces/face1.jpg" alt="profile image" class="profile-img img-lg rounded-circle">
                                                                                        <span class="edit-avatar-icon bg-success"></span>
                                                                                    </div>
                                                                                    <div class="wrapper pl-lg-4">
                                                                                        <div class="wrapper d-flex align-items-center mt-2">
                                                                                            <h4 class="mb-0 font-weight-medium">Danny Santiago</h4>
                                                                                        </div>
                                                                                        <div class="wrapper d-flex align-items-center mt-1">
                                                                                            <h6 class="mb-0 font-weight-light">OA32675</h6>
                                                                                        </div>
                                                                                        <div class="wrapper d-flex align-items-center mt-1">
                                                                                            <h6 class="mb-0 font-weight-light">Senior Associate Partner</h6>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6 col-lg-5">
                                                                                    <div class="d-flex align-items-center w-100">
                                                                                        <p class="mb-0 mr-3 font-weight-semibold">Progress</p>
                                                                                        <div class="progress progress-md w-100">
                                                                                            <div class="progress-bar bg-success" role="progressbar" style="width: 67%" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100"></div>
                                                                                        </div>
                                                                                        <p class="mb-0 ml-3 font-weight-semibold">67%</p>
                                                                                    </div>
                                                                                    <div class="row mt-3">
                                                                                        <div class="col d-flex">
                                                                                            <div class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted">
                                                                                                <i class="mdi mdi-star-circle icon-sm my-0 "></i>
                                                                                            </div>
                                                                                            <div class="wrapper pl-3">
                                                                                                <p class="mb-0 font-weight-medium text-muted">TOTAL LEFT</p>
                                                                                                <h4 class="font-weight-semibold mb-0">350,897</h4>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col d-flex">
                                                                                            <div class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted">
                                                                                                <i class="mdi mdi-star-circle icon-sm my-0 "></i>
                                                                                            </div>
                                                                                            <div class="wrapper pl-3">
                                                                                                <p class="mb-0 font-weight-medium text-muted">TOTAL RIGHT</p>
                                                                                                <h4 class="font-weight-semibold mb-0">2,356</h4>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6 col-lg-2">
                                                                                    <div class="wrapper d-flex">
                                                                                        <div class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted">
                                                                                            <i class="mdi mdi-account-plus icon-sm my-0 "></i>
                                                                                        </div>
                                                                                        <div class="wrapper pl-3">
                                                                                            <p class="mb-0 font-weight-medium text-muted">INTRODUCER</p>
                                                                                            <h4 class="font-weight-semibold mb-0 text-primary">Sapple Systems</h4>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="pills-vibes" role="tabpanel" aria-labelledby="pills-contact-tab">
                                                            <div class="media">
                                                                <div class="col-md-12 mb-4 border p-0">
                                                                    <div class="card rounded shadow-none">
                                                                        <div class="card-body pt-3 pb-3">
                                                                            <div class="row">
                                                                                <div class="col-sm-6 col-lg-5 d-lg-flex">
                                                                                    <div class="user-avatar mb-auto">
                                                                                        <img src="../assets/images/faces/face1.jpg" alt="profile image" class="profile-img img-lg rounded-circle">
                                                                                        <span class="edit-avatar-icon bg-success"></span>
                                                                                    </div>
                                                                                    <div class="wrapper pl-lg-4">
                                                                                        <div class="wrapper d-flex align-items-center mt-2">
                                                                                            <h4 class="mb-0 font-weight-medium">Danny Santiago</h4>
                                                                                        </div>
                                                                                        <div class="wrapper d-flex align-items-center mt-1">
                                                                                            <h6 class="mb-0 font-weight-light">OA32675</h6>
                                                                                        </div>
                                                                                        <div class="wrapper d-flex align-items-center mt-1">
                                                                                            <h6 class="mb-0 font-weight-light">Senior Associate Partner</h6>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6 col-lg-5">
                                                                                    <div class="d-flex align-items-center w-100">
                                                                                        <p class="mb-0 mr-3 font-weight-semibold">Progress</p>
                                                                                        <div class="progress progress-md w-100">
                                                                                            <div class="progress-bar bg-success" role="progressbar" style="width: 67%" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100"></div>
                                                                                        </div>
                                                                                        <p class="mb-0 ml-3 font-weight-semibold">67%</p>
                                                                                    </div>
                                                                                    <div class="row mt-3">
                                                                                        <div class="col d-flex">
                                                                                            <div class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted">
                                                                                                <i class="mdi mdi-star-circle icon-sm my-0 "></i>
                                                                                            </div>
                                                                                            <div class="wrapper pl-3">
                                                                                                <p class="mb-0 font-weight-medium text-muted">TOTAL LEFT</p>
                                                                                                <h4 class="font-weight-semibold mb-0">350,897</h4>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col d-flex">
                                                                                            <div class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted">
                                                                                                <i class="mdi mdi-star-circle icon-sm my-0 "></i>
                                                                                            </div>
                                                                                            <div class="wrapper pl-3">
                                                                                                <p class="mb-0 font-weight-medium text-muted">TOTAL RIGHT</p>
                                                                                                <h4 class="font-weight-semibold mb-0">2,356</h4>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6 col-lg-2">
                                                                                    <div class="wrapper d-flex">
                                                                                        <div class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted">
                                                                                            <i class="mdi mdi-account-plus icon-sm my-0 "></i>
                                                                                        </div>
                                                                                        <div class="wrapper pl-3">
                                                                                            <p class="mb-0 font-weight-medium text-muted">INTRODUCER</p>
                                                                                            <h4 class="font-weight-semibold mb-0 text-primary">Sapple Systems</h4>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="profile-1" role="tabpanel" aria-labelledby="profile-tab">
                                                    <ul class="nav nav-pills nav-pills-custom" id="pills-tab" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" id="pills-home-2-tab" data-toggle="pill" href="#pills-health-2" role="tab" aria-controls="pills-home-2" aria-selected="true"> All Members List </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="pills-profile-2-tab" data-toggle="pill" href="#pills-career-2" role="tab" aria-controls="pills-profile-2" aria-selected="false"> Referal Members List </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="pills-contact-2-tab" data-toggle="pill" href="#pills-music-2" role="tab" aria-controls="pills-contact-2" aria-selected="false"> Members in Left </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="pills-list-2-tab" data-toggle="pill" href="#pills-vibes-2" role="tab" aria-controls="pills-contact-2" aria-selected="false"> Members in Right </a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content tab-content-custom-pill" id="pills-tabContent">
                                                        <div class="tab-pane fade show active" id="pills-health-2" role="tabpanel" aria-labelledby="pills-home-tab">
                                                            <div class="col-md-12 mb-3 border p-0">
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
                                                                        <tr>
                                                                            <td class="py-1">
                                                                                <img src="../assets/images/faces-clipart/pic-1.png" alt="image" />
                                                                            </td>
                                                                            <td> Edward </td>
                                                                            <td>
                                                                                <div class="progress">
                                                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td> $ 160.25 </td>
                                                                            <td> May 03, 2015 </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="py-1">
                                                                                <img src="../assets/images/faces-clipart/pic-2.png" alt="image" />
                                                                            </td>
                                                                            <td> John Doe </td>
                                                                            <td>
                                                                                <div class="progress">
                                                                                    <div class="progress-bar bg-info" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td> $ 123.21 </td>
                                                                            <td> April 05, 2015 </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="py-1">
                                                                                <img src="../assets/images/faces-clipart/pic-3.png" alt="image" />
                                                                            </td>
                                                                            <td> Henry Tom </td>
                                                                            <td>
                                                                                <div class="progress">
                                                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                                                </div>
                                                                            </td>
                                                                            <td> $ 150.00 </td>
                                                                            <td> June 16, 2015 </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="pills-career-2" role="tabpanel" aria-labelledby="pills-profile-tab">
                                                            <div class="media">
                                                                <div class="col-md-12 mb-4 border p-0">
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
                                                                            <tr>
                                                                                <td class="py-1">
                                                                                    <img src="../assets/images/faces-clipart/pic-1.png" alt="image" />
                                                                                </td>
                                                                                <td> Edward </td>
                                                                                <td>
                                                                                    <div class="progress">
                                                                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                                                                    </div>
                                                                                </td>
                                                                                <td> $ 160.25 </td>
                                                                                <td> May 03, 2015 </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="py-1">
                                                                                    <img src="../assets/images/faces-clipart/pic-2.png" alt="image" />
                                                                                </td>
                                                                                <td> John Doe </td>
                                                                                <td>
                                                                                    <div class="progress">
                                                                                        <div class="progress-bar bg-info" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                                                                    </div>
                                                                                </td>
                                                                                <td> $ 123.21 </td>
                                                                                <td> April 05, 2015 </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="py-1">
                                                                                    <img src="../assets/images/faces-clipart/pic-3.png" alt="image" />
                                                                                </td>
                                                                                <td> Henry Tom </td>
                                                                                <td>
                                                                                    <div class="progress">
                                                                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                                                    </div>
                                                                                </td>
                                                                                <td> $ 150.00 </td>
                                                                                <td> June 16, 2015 </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="pills-music-2" role="tabpanel" aria-labelledby="pills-contact-tab">
                                                            <div class="media">
                                                                <div class="col-md-12 mb-4 border p-0">
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
                                                                            <tr>
                                                                                <td class="py-1">
                                                                                    <img src="../assets/images/faces-clipart/pic-1.png" alt="image" />
                                                                                </td>
                                                                                <td> Edward </td>
                                                                                <td>
                                                                                    <div class="progress">
                                                                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                                                                    </div>
                                                                                </td>
                                                                                <td> $ 160.25 </td>
                                                                                <td> May 03, 2015 </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="py-1">
                                                                                    <img src="../assets/images/faces-clipart/pic-2.png" alt="image" />
                                                                                </td>
                                                                                <td> John Doe </td>
                                                                                <td>
                                                                                    <div class="progress">
                                                                                        <div class="progress-bar bg-info" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                                                                    </div>
                                                                                </td>
                                                                                <td> $ 123.21 </td>
                                                                                <td> April 05, 2015 </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="py-1">
                                                                                    <img src="../assets/images/faces-clipart/pic-3.png" alt="image" />
                                                                                </td>
                                                                                <td> Henry Tom </td>
                                                                                <td>
                                                                                    <div class="progress">
                                                                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                                                    </div>
                                                                                </td>
                                                                                <td> $ 150.00 </td>
                                                                                <td> June 16, 2015 </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="pills-vibes-2" role="tabpanel" aria-labelledby="pills-contact-tab">
                                                            <div class="media">
                                                                <div class="col-md-12 mb-4 border p-0">
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
                                                                            <tr>
                                                                                <td class="py-1">
                                                                                    <img src="../assets/images/faces-clipart/pic-1.png" alt="image" />
                                                                                </td>
                                                                                <td> Edward </td>
                                                                                <td>
                                                                                    <div class="progress">
                                                                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                                                                    </div>
                                                                                </td>
                                                                                <td> $ 160.25 </td>
                                                                                <td> May 03, 2015 </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="py-1">
                                                                                    <img src="../assets/images/faces-clipart/pic-2.png" alt="image" />
                                                                                </td>
                                                                                <td> John Doe </td>
                                                                                <td>
                                                                                    <div class="progress">
                                                                                        <div class="progress-bar bg-info" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                                                                    </div>
                                                                                </td>
                                                                                <td> $ 123.21 </td>
                                                                                <td> April 05, 2015 </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="py-1">
                                                                                    <img src="../assets/images/faces-clipart/pic-3.png" alt="image" />
                                                                                </td>
                                                                                <td> Henry Tom </td>
                                                                                <td>
                                                                                    <div class="progress">
                                                                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                                                    </div>
                                                                                </td>
                                                                                <td> $ 150.00 </td>
                                                                                <td> June 16, 2015 </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="contact-1" role="tabpanel" aria-labelledby="contact-tab">
                                                    <h4>Contact us </h4>
                                                    <p> Feel free to contact us if you have any questions! </p>
                                                    <p>
                                                        <i class="mdi mdi-phone text-info"></i> +123456789 </p>
                                                    <p>
                                                        <i class="mdi mdi-email-outline text-success"></i> contactus@example.com </p>
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