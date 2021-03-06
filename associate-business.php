<?php 
include_once 'header.php'; 
if ($user_type != 'ADMIN') {
    echo '<script type="text/javascript">window.location.href="dashboard";</script>';
}
?>
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
                            <label>Associate ID:</label>
                            <select class="form-control" id="agent_listing" name="agent_listing"></select>
                        </div>

                        <div class="col-sm-3">
                            <label>From :</label>
                            <div class="input-group date datepicker p-0">
                                <input type="text" class="form-control" readonly placeholder="" id="start-date" name="start-date" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd-mm-yyyy" />
                                <span class="input-group-addon input-group-append border-left">
                                    <span class="mdi mdi-calendar input-group-text bg-dark"></span>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label>To :</label>
                            <div class="input-group date datepicker p-0">
                                <input type="text" class="form-control" readonly placeholder="" id="end-date" name="end-date" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd-mm-yyyy" />
                                <span class="input-group-addon input-group-append border-left">
                                    <span class="mdi mdi-calendar input-group-text bg-dark"></span>
                                </span>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <label class="d-block">&nbsp;</label>
                            <button type="submit" id="agent_form" class="btn btn-gradient-success">Submit</button>
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
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Shopping Card Code</th>
                                        <th>Shopping Card Type</th>
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