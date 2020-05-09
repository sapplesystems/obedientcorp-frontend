<?php
include_once 'header.php';
?>
<!-- partial -->
<style>
    .custom_overflow{overflow:auto;}
    .custom_overflow table tr th:last-child, .custom_overflow table tr td:last-child{white-space: nowrap !important; width:200px !important}
</style>
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row">
            <div class="col-12 marginLR-m">
                <div class="form-group row">
                    <label class="col-form-label col-sm-2">Agent ID</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="agent_list"></select>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="card">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-4">Self Business Volume</h4>
                        <div class="overflowAuto custom_overflow">
                            <table class="table table-bordered custom_action" id="pin_bonus_listing"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <?php include_once 'footer.php'; ?>
    <script src="assets/javascript/pin_bonus.js"></script>