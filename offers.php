<?php
include_once 'header.php';
if ($user_type != 'ADMIN') {
    echo '<script type="text/javascript">window.location.href="dashboard.php";</script>';
}
?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper ">
        <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <a href="add-offer" class="btn btn-gradient-primary">Add New Offer</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-4">Edit/View Offer</h4>
                        <div class="overflowAuto">
                            <table class="table table-bordered custom_action " id="order-listing">
                                <thead><tr>
                                        <th width="10%">Sr No.</th>
                                        <th width="20%">Offer Name</th>
                                        <th width="10%">Amount</th>
                                        <th width="10%">Business</th>
                                        <th width="10%">Start Date</th>
                                        <th width="10%">End Date</th>
                                        <th width="10%">Action</th>
                                    </tr></thead>
                                <tbody id="offers_list">
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
    <script src="assets/javascript/offer.js"></script>