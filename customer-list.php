<?php include_once 'header.php'; ?>
<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row">
            <div class="col-12">
                <div class="form-group row">
                    <label class="col-form-label col-sm-2">Agent ID</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="agent_list"></select>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="card">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-4">Customer List</h4>
                        <div class="overflowAuto">
                            <table class="table table-bordered custom_action" id="customers_list"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <?php include_once 'footer.php'; ?>
    <script src="assets/javascript/customer_list.js"></script>