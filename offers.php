<?php
include_once 'header.php';
?>
<style>
    ul.rewards_all_main li img{max-height: 120px;margin-bottom: 20px;margin-top: 10px;}
    ul.rewards_all_main li p span{color:#b66dff;font-size: .9375rem !important;margin-right: 0 !important;}
    ul.rewards_all_main li h3{ margin-bottom: 10px;font-size: 20px;}
    ul.rewards_all_main li .mdi.mdi-trophy-award{position:inherit !important;}
</style>
<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper ">
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-0">Offers <a href="dashboard" class="btn btn-danger btn-sm">Back</a></h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- BOXES -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="clearfix"></div>
                        <ul class="rewards_all_main"></ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>

    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <?php include_once 'footer.php'; ?>
    <script type="text/javascript">
        $(document).ready(function () {
            $.ajax({
                url: base_url + 'offer-display',
                type: 'post',
                data: {
                    user_id: user_id
                },
                success: function (response) {
                    if (response.status == "success") {
                        var offers = "";
                        $.each(response.data, function (key, value) {
                            var path = media_url + 'offer_photos/' + value.offer_photo;
                            var message = value.detail.message
                            offers += '<li>\n\
                                            <div id="f1_container"><div id="f1_card">\n\
                                                <div class="front face ">\n\
                                                    <h3><i class="mdi mdi-trophy-award"></i> ' + value.offer_name + '</h3>\n\
                                                    <span>' + value.offer_business + ' BV &nbsp;-&nbsp;</span><img src="' + path + '" />\n\
                                                    <p><span>Offer Duration:</span> ' + value.offer_start_date + ' till ' + value.offer_end_date + '</p>\n\
                                                </div>\n\
                                                <div class="back face center">\n\
                                                    <p class="head_p">' + message + '</p>\n\
                                                </div>\n\
                                            </div>\n\
                                        </li>';
                        });
                        $('.rewards_all_main').append(offers);

                    }
                }
            });
        });
    </script>