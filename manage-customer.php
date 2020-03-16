<?php include_once 'header.php'; ?>
<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <a href="add-customer.php" class="btn btn-gradient-primary">Add Customer</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Select Agent :</label>
                    <div class="col-sm-4">
                        <select class="form-control required" id="agent_listing" name="agent_listing"></select>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-4">Edit/View Customer</h4>
                        <div class="overflowAuto">
                            <table class="table table-bordered custom_action" id="order-listing">
                                <thead>
                                    <tr>
                                        <th>Customer Name</th>
                                        <th>Sex</th>
                                        <th>Mobile</th>
                                        <th>Address</th>
                                        <th>Age</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="customers_list"></tbody>
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
    <script src="assets/javascript/add_customer.js"></script>