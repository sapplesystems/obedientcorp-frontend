<?php include_once 'header.php'; ?>
<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper">
        <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
                </div>
            </div>
        </div>
        <form action="" id="agent-buisness-form">
            <div class="row">
                <div class="col-12">
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label>Agent Code :</label>
                            <select class="form-control required" id="agent_listing" name="agent_listing"></select>
                        </div>

                        <div class="col-sm-3">
                            <label>From :</label>
                            <div class="input-group date datepicker p-0">
                                <input type="text" class="form-control" readonly placeholder="" id="from_date" name="from_date" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd-mm-yyyy" />
                                <span class="input-group-addon input-group-append border-left">
                                    <span class="mdi mdi-calendar input-group-text bg-dark"></span>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label>To :</label>
                            <div class="input-group date datepicker p-0">
                                <input type="text" class="form-control" readonly placeholder="" id="to_date" name="to_date" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd-mm-yyyy" />
                                <span class="input-group-addon input-group-append border-left">
                                    <span class="mdi mdi-calendar input-group-text bg-dark"></span>
                                </span>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <label class="d-block">&nbsp;</label>
                            <button type="submit" id="agent_form" class="btn btn-gradient-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <!--<h4 class="card-title mb-4">Edit/View Customer</h4>-->
                        <div class="overflowAuto">
                            <table class="table table-bordered custom_action" id="order-listing">
                                <thead>
                                    <tr>
                                        <th>Customer id</th>
                                        <th>date</th>
                                        <th>Amount</th>
                                        <th>Coupon Code</th>
                                    </tr>

                                </thead>
                                <tbody id="agent-business-list">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <?php include_once 'footer.php'; ?>
    <script src="assets/javascript/agent-business.js"></script>