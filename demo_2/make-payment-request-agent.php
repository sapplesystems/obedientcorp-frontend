<?php include_once 'header.php'; ?>
<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-form-label float-left mr-3">Agent ID</label>
                                    <div class="float-left">
                                        <select class="form-control" id="agent-list" onchange="get_customer_list(this.value);">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                            <div class="form-group">
                                    <label class="col-form-label float-left mr-3">Customer ID</label>
                                    <div class="float-left">
                                        <select class="form-control" id="customer-list" onchange="get_payament_details(this.value);">
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 customTabs">
                                <table class="table table-striped payment_request_details" id="customer_payment">
                                    
                                </table>

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
                                            <form id="payment-form" name="payment-form" method="post" enctype="multipart/form-data" >
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-sm-4 text-right">Payment Mode:</label>
                                                            <div class="col-sm-8">
                                                                <select class="form-control required" id="payment_mode" name="payment_mode">
                                                                    <option value="">Select</option>
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
                                                                <input type="text" class="form-control required" id="payment_number" name="payment_number">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 bank-name">
                                                        <div class="form-group row ">
                                                            <label class="col-form-label col-sm-4 text-right">Bank Name:</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control required" id="bank_name" name="bank_name">
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
                                            <button type="submit" class="btn btn-success" id="save_value">Submit</button>
                                            <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                        </div>
                                            </form>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 text-right">
                                <button type="button" class="btn btn-gradient-success btn-sm mt-2" id="make_request">Make Request</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <?php include_once 'footer.php'; ?>
    <script src="../assets/javascript/customer_payment_detail.js"></script>