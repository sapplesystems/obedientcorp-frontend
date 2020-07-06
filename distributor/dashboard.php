<?php

include_once 'header-copy.php';
if (empty($_SESSION['distributor_login_resp']['id']) || $_SESSION['distributor_login_resp']['id'] == '') {
    echo '<script type="text/javascript">window.location.href = "login";</script>';
    exit;
}
?>
<div class="main-content">
        <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-3">
                        <h4 class="card-title mb-4">Dashboard</h4>
                        <div class="overflowAuto custom_overflow"></div>
                    </div>
                </div>
            </div>
        </div>
		</section>
    </div>
<?php
include_once 'footer-copy.php';
?>