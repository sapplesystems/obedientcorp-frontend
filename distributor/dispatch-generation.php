<?php
include_once 'header-copy.php';
if (empty($_SESSION['distributor_login_resp']['id']) || $_SESSION['distributor_login_resp']['id'] == '') {
    echo '<script type="text/javascript">window.location.href = "login";</script>';
    exit;
}
?>
<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-4">Dispatch Generation</h4>
                        <div id="errors_div"></div>
                        <form class="forms-sample" id="dispatch-gen-form" name="dispatch-gen-form" method="post">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Select Distributor</label>
                                <div class="col-sm-4">
                                    <select class="form-control " id="dist-list" name="dist_list"></select>
                                </div>
                                <div class="col-sm-2" id="distributor">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Dispatch type</label>
                                <div class="col-sm-4">
                                    <select class="form-control " id="dispatch-type" name="dispatch_type">
                                        <option value="">Select Type</option>
                                        <option value="normal">Normal</option>
                                        <option value="return">Return</option>
                                    </select>
                                </div>
                                <label class="col-sm-2 col-form-label">Date:</label>
                                <div class="col-sm-4" id="date">

                                </div>
                            </div>
                        </form>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="search-product" name="search_product" placeholder="Search Product">
                        </div>
                        <div class="form-group row">
                            <div class="overflowAuto">
                                <table class="table table-bordered custom_action " id="product-listing">
                                    <thead>
                                        <tr>
                                            <th width="10%">Items Name</th>
                                            <th width="20%">Qty</th>
                                            <th width="10%">Dealer Price</th>
                                            <th width="10%">Cgst</th>
                                            <th width="10%">Sgst</th>
                                            <th width="10%">Igst</th>
                                            <th width="10%">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody id="item-list">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Sub Total</label>
                            <div class="col-sm-4" id="subTotal-amount">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Total</label>
                            <div class="col-sm-4" id="total-amount"></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Note:(optional)</label>
                            <div class="col-sm-4">
                                <textarea class="form-control" rows="5" id="note"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Shiping Details:(optional)</label>
                            <div class="col-sm-4">
                                <textarea class="form-control" rows="5" id="shipping-detail"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Expected delivery Date</label>
                            <div class="col-sm-4 date datepicker">
                                <input type="text required" class="form-control required" id="delivery-date" name="delivery_date" placeholder="">
                                <span class="input-group-addon input-group-append border-left">
                                    <span class="mdi mdi-calendar input-group-text bg-dark"></span>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 text-right">
                                <button type="button" class="btn btn-gradient-success btn-sm mt-2" id="generate-invoice" onclick="generationDispatch();">Generate</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- content-wrapper ends -->
    <?php include_once 'footer-copy.php'; ?>
    <script src="<?php echo $home_url; ?>assets/javascript/distributor/dispatch-generate.js"></script>