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
<style>
.overflowAuto{overflow:auto;}
.overflowAuto table{min-width:1400px;}
.custom_qua input{width:68%; display:inline-block;}
</style>
<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-4">Dispatch Item Received</h4>
                        <div class="overflowAuto custom_recieved">
                            <table class="table table-bordered custom_action" id="recieved-detail">
                            </table>
                        </div>
                    </div>
                </div>
            </div>
			<div class="col-12">
                <label class="col-sm-2 col-form-label pl-0">Note</label>
				<textarea class="form-control" rows="6" id="note"></textarea>
            </div>

            <div class="col-12 text-right mt-4">
                <button type="button" class="btn btn-gradient-success btn-sm" onclick="updateDispatchItems();" id="update-items">Update Items</button>&nbsp;<a class="btn btn-danger btn-sm" href="item-received-list">Back</a>
            </div>
        </div>

    </div>

    <!-- content-wrapper ends -->
    <?php include_once 'footer-copy.php'; ?>
    <script type="text/javascript">
        var dispatch_id = "<?php echo $dispatch_id; ?>";
    </script>
    <script src="<?php echo $home_url; ?>assets/javascript/distributor/dispatch-item-recieved.js"></script>