<?php
include_once 'common_html.php';
include_once 'header_frontend.php';
echo $common['main_container_navigation'];
echo $common['dotted_navigation'];
?>
<style>
    .mt-70 {
        margin-top: 70px;
    }

    .inputCaptcha {
        display: inline-block;
        width: auto !important;
        vertical-align: top;
        margin-top: 15px !important;
    }
    #contact_us_form label.error{color:#ff0000; float:left; margin-bottom:3px;}
</style>

<!-- CONTENT -->
<section id="home" class="xl-py t-center fullwidth">
    <!-- Background image - you can choose parallax ratio and offset -->
    <div class="bg-parallax skrollr" data-anchor-target="#home" data-0="transform:translate3d(0, 0px, 0px);" data-900="transform:translate3d(0px, 150px, 0px);" data-background="images/contact-us.jpg"></div>

</section>
<!-- END CONTENT -->


<!-- CONTACT SECTION -->
<section id="contact" class="pt-5 pb-5 relative border-1 border-gray1 bg-gray1 mt-70">
    <!-- Divider - Parent section should have .relative class -->
    <a href="#contact" class="icon-divider icon-md font-18 extrabold-subtitle gray5 bg-white border-1 border-gray1 circle">
        <i class="icon-envelope-letter"></i>
    </a>

    <div class="t-center">
        <h1 class="bold-title lh-sm">
            Drop Us a Message
        </h1>
    </div>

    <!-- Container for form -->
    <div class="container">
        <!-- Form -->
        <div id="form" class="sm-mt t-center gray7">
            <!-- Contact Form -->
            <form name="contact_us_form" id="contact_us_form" method="post" action="#">
                <!-- Half Inputs -->
                <div class="half clearfix">
                    <!-- Name -->
                    <div>
                        <input type="text" name="contact_name" id="contact_name" placeholder="Name" class="classic_form big radius-lg bg-white bs-light-focus required">
                    </div>
                    <!-- Phone -->
                    <div>
                        <input type="numbers" name="contact_phone" id="contact_phone" placeholder="Phone" class="classic_form big radius-lg bg-white bs-light-focus required ">
                    </div>
                </div>
                <!-- Mail -->
                <div>
                    <input type="email" name="contact_email" id="contact_email" placeholder="E-Mail" class="classic_form big radius-lg bg-white bs-light-focus required ">
                </div>
                <!-- Message -->
                <div>
                    <textarea name="contact_message" id="contact_message" placeholder="Message" class="classic_form big radius bg-white bs-light-focus required "></textarea>
                </div>
                <!-- Half Inputs -->

                <div class="clearfix"></div>
                <!-- Send Button -->
                <button type="submit" id="contact_us_form_submit" class="bg-colored1 xl-btn font-12 long-btn xxs-mt slow width-auto click-effect white bold qdr-hover-6 radius-lg" style="padding: 15px 40px">SEND MESSAGE</button>
            </form>
            <!-- End Form -->
        </div>
        <!-- End #form div -->
    </div>
    <!-- Divider -->
    <div class="divider-1 font-11 gray6 uppercase container extrabold sm-mt xs-mb">
        <span>Stalk Us</span>
    </div>

    <!-- Buttons -->
    <div class="qdr-col-4 gap-15 container t-center">
        <!-- Button -->
        <div><a href="https://m.facebook.com/Obedientgroup/" target="_blank" class="xl-btn block-im qdr-hover-3 fa fa-facebook facebook-bg white radius-lg bs-inset-hover qdr-hover-4">Facebook</a></div>
        <!-- Button -->
        <div><a href="https://twitter.com/GroupObedient" target="_blank" class="xl-btn block-im qdr-hover-3 fa fa-twitter twitter-bg white radius-lg bs-inset-hover qdr-hover-4">Twitter</a></div>
        <!-- Button -->
        <div><a href="https://www.instagram.com/obedientgroup" target="_blank" class="xl-btn block-im qdr-hover-3 fa fa-instagram instagram-bg white radius-lg bs-inset-hover qdr-hover-4">Instagram</a></div>
        <!-- Button -->
		<div><a href="https://www.youtube.com/channel/UCGlcQ2yzdb8gT4QlOXngo3Q" target="_blank" class="xl-btn block-im qdr-hover-3 fa fa-youtube youtube-bg white radius-lg bs-inset-hover qdr-hover-4">Youtube</a></div>
        <!-- Button -->
    </div>

</section>
<!-- END CONTACT SECTION -->





<!-- GOOGLE MAP -->
<div class="fullwidth">
    <!-- Map -->
    <div id="">
        <!-- Google Map Script -->
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14409.946140127015!2d81.8350541!3d25.4554245!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9eb290e50a3463e7!2sOBEDIENT%20INFRA%20DEVELOPMENT%20PVT.%20LTD.!5e0!3m2!1sen!2sin!4v1582019963309!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        <!-- Google Map ID -->
    </div>
</div>
<!-- END GOOGLE MAP -->




<!-- FOOTER -->
<?php include_once 'footer_frontend.php'; ?>
<!-- SEARCH FORM FOR NAV -->
<?php echo $common['search_form']; ?>


<!-- jQuery -->
<script src="js/jquery.min.js?v=2.3"></script>
<!-- MAIN SCRIPTS - Classic scripts for all theme -->
<script src="js/scripts.js?v=2.3.1"></script>
<!-- END JS FILES -->
<script src="assets/vendors/sweetalert/sweetalert.min.js "></script>
<script type='text/javascript' src='js/site.js'></script>
<script src="assets/js/alerts.js "></script>
<script type='text/javascript'>
    $(document).ready(function () {
        $("#contact_us_form").submit(function (e) {
            e.preventDefault();
            var contact_frm = $("#contact_us_form");
            contact_frm.validate({
                rules: {
                    contact_phone: {
                        number: true
                    },
                },
                errorPlacement: function errorPlacement(error, element) {
                    element.before(error);
                }
            });

            if ($("#contact_us_form").valid())
            {
                showLoader();
                var params = {
                    name: $('#contact_name').val(),
                    phone: $('#contact_phone').val(),
                    email: $('#contact_email').val(),
                    message: $('#contact_message').val(),
                };
                var url = 'http://demos.sappleserve.com/obedient_api/public/api/add-contact-request';
                $.ajax({
                    url: url,
                    type: 'post',
                    data: params,
                    success: function (response) {
                        console.log(response);
                        if (response.status == 'success') {
                            showSwal('success', 'Contact Saved', 'Contact saved successfully');
                        } else {
                            showSwal('error', 'Contact Not Saved', response.data);
                        }
                        document.getElementById('contact_us_form').reset();
                        hideLoader();

                    },
                    error: function (response) {
                        console.log(response);
                    }
                });

            }//end if

        });
    }); //document

    function showLoader() {
        $('#loader_bg').css('display', 'block');
    }

    function hideLoader() {
        $('#loader_bg').css('display', 'none');
    }
</script>

</body>
<!-- Body End -->
</html>