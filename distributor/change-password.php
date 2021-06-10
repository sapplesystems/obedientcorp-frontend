<?php include_once 'header-copy.php'; ?>
<!-- partial -->
<div class="main-content">
        <section class="section">
        <div class="row grid-margin">
            <div class="col-12">
                <div class="card">
					<div class="card-header">
                        <h4>Change Login Password</h4>
						</div>
						<div class="card-body">
                        <div id="errors_div"></div>
                        <form class="forms-sample" method="post" action="" id="change_password_form" name="change_password_form">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Old Password</label>
                                        <input type="password" class="form-control required" placeholder="Old Password" id="old_password" name="old_password">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input type="password" class="form-control required" placeholder="New Password" id="new_password" name="new_password">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" class="form-control required" placeholder="Confirm Password" id="confirm_password" name="confirm_password">
                                    </div>
                                </div>
								<div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="d-none-m">&nbsp;</label>
                                        <input type="hidden" id="plot_id" />
										<button type="submit" class="btn btn-dark">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
						</div>
                </div>
            </div>
        </div>
		</section>
    </div>


    <!-- content-wrapper ends -->
    <?php include_once 'footer-copy.php'; ?>
    <script>
        $(document).ready(function() {
            $("#change_password_form").submit(function(e) {
                e.preventDefault();

                var change_password_form = $("#change_password_form");
                change_password_form.validate({
                    rules: {
                        new_password: {
                            minlength: 8
                        },
                        confirm_password: {
                            minlength: 8,
                            equalTo: "#new_password"
                        }
                    },
                    errorPlacement: function errorPlacement(error, element) {
                        element.before(error);
                    }
                });

                if ($("#change_password_form").valid()) {
                    showLoader();
                    $.ajax({
                        method: "POST",
                        url: base_url + 'distributor/change-password   ',
                        data: {
                            id: distributor_id,
                            old_password: $('#old_password').val(),
                            new_password: $('#new_password').val()
                        },
                        success: function(response) {
                            showSwal(response.status, response.data);
                            document.getElementById('change_password_form').reset();
                            showSwal('success','Password Successfully Changed');
                            hideLoader();
                        },
                        error: function(response) {
                            error_html = '';
                            var error_object = JSON.parse(response.responseText);
                            var message = error_object.message;
                            var errors = error_object.errors;


                            $.each(errors, function(key, value) {
                                error_html += '<div class="alert alert-danger" role="alert">' + value[0] + '</div>';
                            });
                            $('#errors_div').html(error_html);
                            hideLoader();
                        }
                    });
                }
            });



        }); //document ready
    </script>