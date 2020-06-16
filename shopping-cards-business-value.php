<?php
include_once 'header.php';
if ($user_type != 'ADMIN') {
    echo '<script type="text/javascript">window.location.href="dashboard";</script>';
}
?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper ">
        <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <a href="shopping-cards-business-value-add" class="btn btn-gradient-primary">Add New Shopping Card Business Value</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-4">Shopping Card Business Value</h4>
                        <div class="overflowAuto">
                            <table class="table table-bordered custom_action" id="shopping_card_bv_tbl">
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Name</th>
                                        <th>Business Value</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <?php include_once 'footer.php'; ?>

    <script type="text/javascript">
        function bvListing() {
            $.ajax({
                url: base_url + 'coupon-business-values',
                type: 'post',
                data: {},
                success: function (response) {
                    if (response.status == "success") {
                        var data = response.data;
                        var bv_table = '<thead><tr><th>Sr No.</th><th>Name</th><th>Business Value</th><th>Image</th><th>Action</th></tr></thead><tbody>';
                        var i = 1;
                        var edit_url = '';
                        var image;
                        $.each(data, function (key, val) {
                            image = '';
                            if (val.image != '') {
                                var img_url = media_url + 'coupon_bv/' + val.image;
                                image = '<img src="' + img_url + '" />';
                            }
                            edit_url = 'shopping-cards-business-value-add.php?bvid=' + val.id;
                            bv_table += '<tr id="tr_' + val.id + '" role="row" >\n\
                                    <td class="sorting_1">' + i + '</td>\n\
                                    <td>' + val.name + '</td>\n\
                                    <td>' + val.business_value + '</td>\n\
                                    <td>' + image + '</td>\n\
                                    <td><a href="' + edit_url + '"> <i class="mdi mdi-pencil text-info"></i></a> &nbsp <a href="javascript:void(0);" onclick="deleteBv(event, ' + val.id + ');"><i class="mdi mdi-delete text-danger"></i></a> </td>\n\
                                </tr>';
                            i++;
                        });
                        bv_table += '</tbody>';
                        $('#shopping_card_bv_tbl').html(bv_table);
                        generateDataTable('shopping_card_bv_tbl');
                    }

                }
            });
        }

        function deleteBv(e, bvid) {
            e.preventDefault();
            $.ajax({
                url: base_url + 'coupon-business-value/delete',
                type: 'post',
                data: {id: bvid},
                success: function (response) {
                    if (response.status == 'success') {
                        bvListing();
                    }
                    showSwal(response.status, response.data, response.data);
                }
            });
        }

        bvListing();
    </script>