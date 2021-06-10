<?php

session_start();
if (empty($_SESSION['distributor_login_resp']['id']) || $_SESSION['distributor_login_resp']['id'] == '') {
    echo '<script type="text/javascript">window.location.href = "login";</script>';
    exit;
} else {
    echo '<script type="text/javascript">window.location.href = "dashboard";</script>';
    exit;
}
?>