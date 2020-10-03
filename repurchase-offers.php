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
                <?php if ($_SESSION['login_resp']['user_type'] == 'ADMIN') { ?>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2">Associate ID</label>
                        <div class="col-sm-4">
                            <select class="form-control" id="agent_list"></select>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                <?php } ?>
                <div class="card">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-4">Repurchase Offers</h4>
                        <div class="overflowAuto custom_overflow">
                            <table class="table table-bordered custom_action" id="repurchase_offer_listing"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <?php include_once 'footer.php'; ?>
    <script type="text/javascript">
        function getRepurchaseOfferList(params) {
            showLoader();
            $.ajax({
                url: base_url + 'repurchase-offers',
                type: 'post',
                data: params,
                success: function (response) {
                    var table_data = '<thead>\n\
                                            <tr>\n\
                                                <th>Sr.No</th>\n\
                                                <th>Associate Name</th>\n\
                                                <th>Amount</th>\n\
                                                <th>Gift</th>\n\
                                                <th>Date</th>\n\
                                                <th>Coupon Code</th>\n\
                                            </tr>\n\
                                        </thead>\n\
                                        <tbody>';
                    if (response.status == "success") {
                        var counter = 0;
                        $.each(response.data, function (key, value) {
                            counter = counter + 1;
                            table_data += '<tr id="tr_' + key + '">\n\
                                                <td>' + counter + '</td>\n\
                                                <td>' + value.associate_name + '</td>\n\
                                                <td>' + value.amount + '</td>\n\
                                                <td>' + value.gift + '</td>\n\
                                                <td>' + value.achieved_date + '</td>\n\
                                                <td>' + value.coupon_code + '</td>\n\
                                           </tr>';
                        });
                        table_data += '</tbody>';
                        $("#repurchase_offer_listing").html(table_data);
                        generateDataTable('repurchase_offer_listing');
                        hideLoader();
                    }
                    else {
                        table_data += '</tbody>';
                        $("#repurchase_offer_listing").html(table_data);
                        generateDataTable('repurchase_offer_listing');
                        hideLoader();
                    }

                }
            });
        }

        getRepurchaseOfferList();

        $(document).ready(function () {
            $("#agent_list").html(down_the_line_members);
            $(document).on('change', '#agent_list', function () {
                getRepurchaseOfferList({user_id: $(this).val()});
            });
        });
    </script>