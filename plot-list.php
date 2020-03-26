<?php include_once 'header.php'; ?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper ">
        <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <a href="add-plot" class="btn btn-gradient-primary">Add New Plot</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-4">Edit/View Plot</h4>
                        <div class="overflowAuto">
                            <table class="table table-bordered custom_action plot_list" id="order-listing">
                                <thead>
                                    <tr>
                                        <th> Sr No. </th>
                                        <th> Project Name </th>
                                        <th> Sub Project Name </th>
                                        <th> Plot No. </th>
                                        <th> Plot Area </th>
                                        <th> Availability </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody id="plot_list"></tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <?php include_once 'footer.php'; ?>
    <script src="assets/javascript/plot.js"></script>