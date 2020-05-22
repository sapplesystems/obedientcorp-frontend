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
            <div class="col-12">
                <div class="form-group">
                </div>
                <div class="clearfix"></div>
                <div class="card">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-4">Rankers List</h4>
                        <div class="overflowAuto custom_overflow">
                            <table class="table table-bordered custom_action rankers_list" id="order-listing" >
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Associate Name</th>
                                        <th>Associate Designation </th>
                                    </tr>
                                </thead>
                                <tbody id="rankers_list"></tbody>
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
    <script src="assets/javascript/rankers_list.js"></script>