<?php
include_once 'header.php';
?>
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
                            offers += '<li><div id="f1_container"><div id="f1_card"><div class="front face "><span>&#8377; ' + value.offer_business + ' &nbsp;-&nbsp;</span><img src="' + path + '" /></div><div class="back face center"><p class="head_p">' + message + '</p></div></div></div></li>'
                        });
                        $('.rewards_all_main').append(offers);

                    }
                }
            });
        });
    </script>