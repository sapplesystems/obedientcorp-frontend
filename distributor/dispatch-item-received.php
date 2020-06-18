<?php
include_once 'header-copy.php';
if (empty($_SESSION['distributor_login_resp']['id']) || $_SESSION['distributor_login_resp']['id'] == '') {
    echo '<script type="text/javascript">window.location.href = "login";</script>';
    exit;
}

$dispatch_id = 0;
if (isset($_REQUEST['dispatch_id'])) {
    $dispatch_id = $_REQUEST['dispatch_id'];
}
?>
<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-4">Dispatch Item Received</h4>
                        <div class="overflowAuto">
                            <table class="table table-bordered custom_action" id="recieved-detail">
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Note</label>
                <div class="col-sm-8">
                    <textarea class="form-control" rows="6" id="note"></textarea>
                </div>
            </div>

            <div class="col-sm-12 text-right">
                <button type="button" class="btn btn-gradient-success btn-sm mt-2" onclick="updateDispatchItems();" id="update-items">Update Items</button>
                <a class="btn btn-danger btn-sm" href="item-received-list">Back</a>&nbsp;
            </div>
        </div>

    </div>

    <!-- content-wrapper ends -->
    <?php include_once 'footer-copy.php'; ?>
    <script type="text/javascript">
        var dispatch_id = "<?php echo $dispatch_id; ?>";
    </script>
    <script src="<?php echo $home_url; ?>assets/javascript/distributor/dispatch-item-recieved.js"></script>