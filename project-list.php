<?php include_once 'header.php'; ?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper ">
        <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <a href="add-project" class="btn btn-gradient-primary">Add New Project</a>
                        <a href="add-sub-project" class="btn btn-gradient-primary">Add New Sub Project</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-4">Edit/View Project</h4>
                        <div class="overflowAuto">
                            <table class="table table-bordered custom_action " id="order-listing">
                                <thead><tr>
                                        <th width="10%">Sr No.</th>
                                        <th width="20%">Project Name</th>
                                        <th width="10%">Parent</th>
                                        <th width="10%">Unit Price</th>
                                        <th width="10%">Description</th>
                                        <th width="10%">Action</th>
                                    </tr></thead>
                                <tbody id="project_list">
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
    <script src="assets/javascript/project_validation.js"></script>