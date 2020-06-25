<?php
include_once 'header.php';
?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper ">
        <?php if ($user_type == 'ADMIN') { ?>
            <div class="row grid-margin">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body p-3">
                            <a href="add-offer" class="btn btn-gradient-primary">Add New Offer</a>
                            <!--<a href="dashboard" class="btn btn-gradient-danger">Back</a>-->
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-4">Offers List</h4>
                        <div class="overflowAuto">
                            <table class="table table-bordered custom_action " id="order-listing">
                                <thead><tr>
                                        <th>Sr No.</th>
                                        <th>Offer Name</th>
                                        <th>Business Volume</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <?php if ($user_type == 'ADMIN') { ?>
                                            <th>Action</th>
                                        <?php } ?>
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