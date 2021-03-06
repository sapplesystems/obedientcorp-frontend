<?php include_once 'header.php'; ?>
<!-- partial -->
<style>
    .white_space tr th, .white_space tr td{white-space: nowrap !important;}
</style>
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="col-md-12 customTabs">
                            <ul class="nav nav-pills nav-pills-custom diff-color" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link bg_due active" id="pills-due-tab" data-toggle="pill" href="#pills-due" role="tab" aria-controls="pills-due" aria-selected="true">Due </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link bg_pending" id="pills-pending-tab" data-toggle="pill" href="#pills-pending" role="tab" aria-controls="pills-pending" aria-selected="false"> Pending </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link bg_approved" id="pills-approve-tab" data-toggle="pill" href="#pills-approve" role="tab" aria-controls="pills-approve" aria-selected="false"> Approved </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link bg_rejected" id="pills-reject-tab" data-toggle="pill" href="#pills-reject" role="tab" aria-controls="pills-reject" aria-selected="false"> Rejected </a>
                                </li>
                            </ul>
                        </div>
                        <div class="row mb-3 marginLR-m">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-3">Associate ID</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" id="agent-list" onchange="get_customer_list(this.value);">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-10-m">
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-3">Customer ID</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" id="customer-list" onchange="getCustomerPaymentList(this.value);">
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button type="button" class="btn btn-gradient-success btn-sm mt-2" id="make_request">Request For EMI</button>
                            </div>
                            <div class="col-md-12 tab-content tab-content-custom-pill overflowAuto custom_overflow white_space" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-due" role="tabpanel" aria-labelledby="pills-pending-tab">
                                    <table class="table table-striped payment_request" id="due_payment_list"></table>
                                </div>
                                <div class="tab-pane fade " id="pills-pending" role="tabpanel" aria-labelledby="pills-pending-tab">
                                    <table class="table table-striped payment_request" id="pending_payment_list"></table>
                                </div>
                                <div class="tab-pane fade" id="pills-approve" role="tabpanel" aria-labelledby="pills-approve-tab">
                                    <table class="table table-striped payment_request" id="approved_payment_list"></table>
                                </div>
                                <div class="tab-pane fade" id="pills-reject" role="tabpanel" aria-labelledby="pills-reject-tab">
                                    <table class="table table-striped payment_request" id="reject_payment_list"></table>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="modal fade" id="makeRequest" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                <div class="modal-dialog payment-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ModalLabel">Make Request</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="payment-form" name="payment-form" method="post" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-sm-4 text-right">Payment Mode:</label>
                                                            <div class="col-sm-8">
                                                                <select class="form-control required" id="payment_mode" name="payment_mode">
                                                                    <option value="Cheque">Cheque</option>
                                                                    <option value="Cash">Cash</option>
                                                                    <option value="Online">Online</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row payment-number-div">
                                                            <label class="col-form-label col-sm-4 text-right " id="payment-number-div">Cheque Number:</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control required" id="payment_number" name="payment_number" placeholder="Enter Cheque Number.">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 bank-name">
                                                        <div class="form-group row ">
                                                            <label class="col-form-label col-sm-4 text-right">Bank Name:</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control required" id="bank_name" name="bank_name" placeholder="Enter Bank Name">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-sm-4 text-right">Upload Image:</label>
                                                            <div class="input-group col-sm-8">
                                                                <input type="file" name="upload_image" id="upload-image" class="file-upload-default required">
                                                                <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                                                <span class="input-group-append">
                                                                    <button class="file-upload-browse btn btn-gradient-primary pl-3 pr-3" type="button">Upload</button>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row ">
                                                            <label class="col-form-label col-sm-4 text-right">Amount:</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control required" id="amount" name="amount">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row ">
                                                            <label class="col-form-label col-sm-4 text-right">Date of Payment:</label>
                                                            <div class="col-sm-8">
                                                                <div class="input-group date datepicker p-0">
                                                                    <input type="text required" class="form-control required" id="date_of_payment" name="date_of_payment" value="<?php echo date('d-M-Y'); ?>" readonly>
                                                                    <span class="input-group-addon input-group-append border-left">
                                                                        <span class="mdi mdi-calendar input-group-text bg-dark"></span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group row mb-0">
                                                            <label for="message-text" class="col-form-label col-sm-2 text-right">Comment:</label>
                                                            <div class="col-sm-10">
                                                                <textarea rows="6" class="form-control required" id="comment" name="comment"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer text-center">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-success" id="save_value">Submit</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!--end div-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <?php include_once 'footer.php'; ?>
    <script src="assets/javascript/collect_emi.js"></script>