<?php include_once 'header.php'; ?>
            <!-- partial -->
            <div class="main-panel ">
                <div class="content-wrapper ">
                    <div class="row">
                        <div class="col-sm-9">
                            <button class="btn btn-gradient-primary  btn-sm" data-toggle="modal" data-target="#exampleModal">Generate Coupon</button>
                        </div>
                        <div class="col-sm-3">
                            <div class="div-total">
                                <h5>Your Wallet Balance: <span>&#8377 1250000</span></h5>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <!-- <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                                </div> -->
                                <div class="modal-body">
                                    <div class="row grid-margin">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body p-3">
                                                    <!-- <h4 class="card-title mb-4">Add Coupon</h4> -->
                                                    <div class="row">
                                                        <div class="col-sm-9">
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label mb-0">Generated For:</label>
                                                                <div class="col-sm-2 p-0">
                                                                    <select class="form-control blackOption">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                      </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="div-total float-left">
                                                                <h5>Your Wallet Balance: <span>&#8377 1250000</span></h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <!-- <div class="col-sm-5">
                                                <ul class="coupon_list">
                                                    <li><div class="coupon_div bg-info">Coupon Rs 5000</div> <input type="text" class="input-group input_digit" /></li>
                                                    <li><div class="coupon_div bg-info">Coupon Rs 1000</div> <input type="text" class="input-group input_digit" /></li>
                                                    <li><div class="coupon_div bg-info">Coupon Rs 500</div> <input type="text" class="input-group input_digit" /></li>
                                                    <li><div class="coupon_div bg-info">Coupon Rs 200</div> <input type="text" class="input-group input_digit" /></li>
                                                </ul>
                                            </div> -->
                                                        <!-- <div class="col-sm-1"></div> -->
                                                        <div class="col-sm-8">
                                                            <h4 class="card-title mb-4">Amount Calculation</h4>
                                                            <ul class="cal_amount">
                                                                <li>
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label mb-0">&#8377 500 <span class="multiplyFont">X</span></label>
                                                                        <div class="col-sm-2 p-0">
                                                                            <select class="form-control blackOption">
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                              </select>
                                                                        </div>
                                                                        <label class="col-sm-3 col-form-label mb-0">= &#8377 250000</label>
                                                                        <!-- <button type="button" class="btn btn-gradient-primary btn-sm">Delete</a> -->
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label mb-0">&#8377 500 <span class="multiplyFont">X</span></label>
                                                                        <div class="col-sm-2 p-0">
                                                                            <select class="form-control blackOption">
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                              </select>
                                                                        </div>
                                                                        <label class="col-sm-3 col-form-label mb-0">= &#8377 250000</label>
                                                                        <!-- <button type="button" class="btn btn-gradient-primary btn-sm">Delete</a> -->
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label mb-0">&#8377 500 <span class="multiplyFont">X</span></label>
                                                                        <div class="col-sm-2 p-0">
                                                                            <select class="form-control blackOption">
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                              </select>
                                                                        </div>
                                                                        <label class="col-sm-3 col-form-label mb-0">= &#8377 250000</label>
                                                                        <!-- <button type="button" class="btn btn-gradient-primary btn-sm">Delete</a> -->
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label mb-0">&#8377 500 <span class="multiplyFont">X</span></label>
                                                                        <div class="col-sm-2 p-0">
                                                                            <select class="form-control blackOption">
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                              </select>
                                                                        </div>
                                                                        <label class="col-sm-3 col-form-label mb-0">= &#8377 250000</label>
                                                                        <!-- <button type="button" class="btn btn-gradient-primary btn-sm">Delete</a> -->
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label mb-0">&#8377 500 <span class="multiplyFont">X</span></label>
                                                                        <div class="col-sm-2 p-0">
                                                                            <select class="form-control blackOption">
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                              </select>
                                                                        </div>
                                                                        <label class="col-sm-3 col-form-label mb-0">= &#8377 250000</label>
                                                                        <!-- <button type="button" class="btn btn-gradient-primary btn-sm">Delete</a> -->
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="hrDiv"></div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="div-total float-left">
                                                                        <h5>Total</h5>
                                                                    </div>
                                                                    <div class="div-price float-right">
                                                                        <p>&#8377 1250000</p>
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
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-gradient-secondary btn-sm" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-gradient-primary  btn-sm">Generate</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body p-3">
                                    <h4 class="card-title mb-4">Manage Coupon</h4>
									
                                    <div class="overflowAuto">
                                        <table class="table table-bordered custom_action" id="order-listing">
                                            <thead>
                                                <tr>
                                                    <th> Sr No. </th>
                                                    <th> Coupon ID</th>
                                                    <th> Coupon Price </th>
                                                    <th> Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td> 1 </td>
                                                    <td> OBEDIENT CORPORATION GREEN CITY </td>
                                                    <td> 12600 </td>
                                                    <td> <a href="javascript:void(0);" class="btn btn-gradient-primary btn-sm">Change coupon status</a> &nbsp &nbsp <a href="javascript:void(0);" class="btn btn-gradient-primary btn-sm">Extend Coupon availability</a>                                                        </td>
                                                </tr>
                                                <tr>
                                                    <td> 2 </td>
                                                    <td> OBEDIENT CORPORATION GREEN CITY </td>
                                                    <td> 12600 </td>
                                                    <td> <a href="javascript:void(0);" class="btn btn-gradient-primary btn-sm">Change coupon status</a> &nbsp &nbsp <a href="javascript:void(0);" class="btn btn-gradient-primary btn-sm">Extend Coupon availability</a>                                                        </td>
                                                </tr>
                                                <tr>
                                                    <td> 3 </td>
                                                    <td> OBEDIENT CORPORATION GREEN CITY </td>
                                                    <td> 12600 </td>
                                                    <td> <a href="javascript:void(0);" class="btn btn-gradient-primary btn-sm">Change coupon status</a> &nbsp &nbsp <a href="javascript:void(0);" class="btn btn-gradient-primary btn-sm">Extend Coupon availability</a>                                                        </td>
                                                </tr>
                                                <tr>
                                                    <td> 4 </td>
                                                    <td> OBEDIENT CORPORATION GREEN CITY </td>
                                                    <td> 12600 </td>
                                                    <td> <a href="javascript:void(0);" class="btn btn-gradient-primary btn-sm">Change coupon status</a> &nbsp &nbsp <a href="javascript:void(0);" class="btn btn-gradient-primary btn-sm">Extend Coupon availability</a>                                                        </td>
                                                </tr>
                                                <tr>
                                                    <td> 5 </td>
                                                    <td> OBEDIENT CORPORATION GREEN CITY </td>
                                                    <td> 12600 </td>
                                                    <td> <a href="javascript:void(0);" class="btn btn-gradient-primary btn-sm">Change coupon status</a> &nbsp &nbsp <a href="javascript:void(0);" class="btn btn-gradient-primary btn-sm">Extend Coupon availability</a>                                                        </td>
                                                </tr>
                                                <tr>
                                                    <td> 6 </td>
                                                    <td> OBEDIENT CORPORATION GREEN CITY </td>
                                                    <td> 12600 </td>
                                                    <td> <a href="javascript:void(0);" class="btn btn-gradient-primary btn-sm">Change coupon status</a> &nbsp &nbsp <a href="javascript:void(0);" class="btn btn-gradient-primary btn-sm">Extend Coupon availability</a>                                                        </td>
                                                </tr>
                                                <tr>
                                                    <td> 7 </td>
                                                    <td> OBEDIENT CORPORATION GREEN CITY </td>
                                                    <td> 12600 </td>
                                                    <td> <a href="javascript:void(0);" class="btn btn-gradient-primary btn-sm">Change coupon status</a> &nbsp &nbsp <a href="javascript:void(0);" class="btn btn-gradient-primary btn-sm">Extend Coupon availability</a>                                                        </td>
                                                </tr>
                                                <tr>
                                                    <td> 8 </td>
                                                    <td> OBEDIENT CORPORATION GREEN CITY </td>
                                                    <td> 12600 </td>
                                                    <td> <a href="javascript:void(0);" class="btn btn-gradient-primary btn-sm">Change coupon status</a> &nbsp &nbsp <a href="javascript:void(0);" class="btn btn-gradient-primary btn-sm">Extend Coupon availability</a>                                                        </td>
                                                </tr>
                                                <tr>
                                                    <td> 9 </td>
                                                    <td> OBEDIENT CORPORATION GREEN CITY </td>
                                                    <td> 12600 </td>
                                                    <td> <a href="javascript:void(0);" class="btn btn-gradient-primary btn-sm">Change coupon status</a> &nbsp &nbsp <a href="javascript:void(0);" class="btn btn-gradient-primary btn-sm">Extend Coupon availability</a>                                                        </td>
                                                </tr>
                                                <tr>
                                                    <td> 10 </td>
                                                    <td> OBEDIENT CORPORATION GREEN CITY </td>
                                                    <td> 12600 </td>
                                                    <td> <a href="javascript:void(0);" class="btn btn-gradient-primary btn-sm">Change coupon status</a> &nbsp &nbsp <a href="javascript:void(0);" class="btn btn-gradient-primary btn-sm">Extend Coupon availability</a>                                                        </td>
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